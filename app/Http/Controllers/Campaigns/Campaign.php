<?php

namespace App\Http\Controllers\Campaigns;

use App\Mail\Campaigns\Delete;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities\Helpers;
use App\Mail\Campaigns\StatusChange;
use App\Models\Campaigns\{Campaign as CampaignModel, CampaignAgent};
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Str;

class Campaign extends Controller
{
    public $campaign_id;

    public function new(Request $request)
    {

        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:5',],
            'description' => ['required'],
            'agent_commission' => ['required', 'numeric'],
            'image' => ['required', 'image', File::image()
                ->min('1kb')
                ->max('10mb')], // Adjusted image validation
            'category' => ['required'],
        ], [
            // 'manager_id.required' => 'The manager_id is required.',
            'name.required' => 'The campaign name is required.',
            'agent_commission.required' => 'The agent commission is required.',
            'agent_commission.numeric' => 'The agent commission must be a number.',
            'description.required' => 'The description/story is required.',
            'category.required' => 'The category is required.',
            'image.required' => 'The image is required.',
            'image.image' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image must be at most 10 megabytes.',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();
        if (!$user) {
            return back()->withErrors($validator)->withInput();
        }
        $creator = '';
        $role_ = '';
        if ($user->role == 'admin') {
            // Validate the request
            $validator = Validator::make($request->all(), [
                'status' => ['required'],
                'user' => ['required', 'digits:10']
            ], [
                'status.required' => 'The campaign status is required.',
                'user.required' => 'The fundraiser or user is required',
            ]);

            $creator = $request->input('user');
            $role_ = 'admin';
        } else {
            $creator = $user->user_id;
            $role_ = 'manager';
        }
        // Get File Extension
        $extension = $request->file('image')->getClientOriginalExtension();
        $subfolder = 'cdn/campaigns-images/'; // Generate Filename with Sub folder
        $filenametostore = $subfolder . Str::uuid() .time() . '.' . $extension;

        // Upload File to External Server (FTP)
        // Helpers::uploadImageToFTP($filenametostore, $request->file('image'));
        // Get Full Path URL
        $basePath = "https://assets.kindgiving.org/"; // Replace with your actual base URL
        $imagefullPathUrl = $basePath . $filenametostore;
        $imagefullPathUrl ='http://donation.local/img/favicon.png';
        // Set initial values
        $campaign_id = Str::random(12);
        $slug = Str::slug($request->input('name'));

        // Check if the generated slug is unique
        $uniqueSlug = $this->generateUniqueSlug($slug);

        $hide_target = $request->input('hide_target') ? "yes" : "no";
        $hide_raised = $request->input('hide_raised') ? "yes" : "no";

        // Create the campaign with unique slug and category_id
        CampaignModel::create([
            'manager_id' => $creator,
            'campaign_id' => $campaign_id,
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'target' => $request->input('goal'),
            'image' => $imagefullPathUrl,
            'slug' => $uniqueSlug,
            'status' => $request->input('status') ?: 'pending',
            'agent_commission' => $request->input('agent_commission'),
            'end_date' => $request->input('end_date'),
            'hide_target' => $hide_target,
            'hide_raised' => $hide_raised,
            'visibility' => 'private'
        ]);

        // Redirect to the dashboard with success message
        return redirect()->route($role_ . '.campaigns')->with('success', 'Campaign created successfully.');
    }

    public function edit(Request $request)
    {
        $campaign_id = $request->id;

        $campaign = CampaignModel::where('campaign_id', $campaign_id)->first();
        if (!$campaign) {
            return back()->with('error', 'Campaign not found');
        }

        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:5',],
            'description' => ['required'],
            'agent_commission' => ['required', 'numeric'],
            'image' => ['image', File::image()
                ->min('1kb')
                ->max('10mb')], // Adjusted image validation
            'category' => ['required'],
        ], [
            // 'manager_id.required' => 'The manager_id is required.',
            'name.required' => 'The campaign name is required.',
            'description.required' => 'The description/story is required.',
            'agent_commission.required' => 'The agent commission is required.',
            'agent_commission.numeric' => 'The agent commission must be a number.',
            'category.required' => 'The category is required.',
            'image.image' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image must be at most 10 megabytes.',
        ]);
        $user = Auth::user();
        if (!$user) {
            return back()->withErrors($validator)->withInput();
        }
        if ($user->role == 'admin') {
            // Validate the request
            $validator = Validator::make($request->all(), [
                'status' => ['required'],
            ], [
                'status.required' => 'The campaign status is required.',
            ]);
        }

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'User not found or can\'t perform action');
        }

        // Get File Extension
        $imagefullPathUrl = "";
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $subfolder = 'campaigns-images/'; // Generate Filename with Subfolder
            $filenametostore = $subfolder . Str::uuid() .time() . '.' . $extension;
            // Upload File to External Server (FTP)
            Helpers::uploadImageToFTP($filenametostore, $request->file('image'));

            // Get Full Path URL
            $basePath = "https://asset.kindgiving.org/cdn/"; // Replace with your actual base URL
            $imagefullPathUrl = $basePath . $filenametostore;
        } else {
            $imagefullPathUrl = $campaign->image;
        }
        $slug = Str::slug($request->input('name'));

        // Check if the generated slug is unique
        $uniqueSlug = $this->generateUniqueSlug($slug);
        $hide_target = $request->input('hide_target') ? "yes" : "no";
        $hide_raised = $request->input('hide_raised') ? "yes" : "no";
        $status = '';

        if ($user->role != 'admin') {
            if ($request->input('name') != $campaign->name || $request->input('category') != $campaign->category) {
                $status = 'pending';
            } else {
                $status = $campaign->status;
            }
        } else {
            $status = $request->input('status');
        }

        // Update the campaign with the unique slug
        $campaign->update([
            'manager_id' => $campaign->manager_id,
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'description' => $request->input('description'),
            'target' => $request->input('goal'),
            'image' => $imagefullPathUrl,
            'slug' => $uniqueSlug,
            'status' => $status,
            'agent_commission' => $request->input('agent_commission'),
            'end_date' => $request->input('end_date'),
            'hide_target' => $hide_target,
            'hide_raised' => $hide_raised
        ]);

        // Redirect to the dashboard with success message
        return redirect()->back()->with('success', 'Campaign updated successfully.');
    }

    public function delete(Request $request)
    {
        $campaign = CampaignModel::where('campaign_id', $request->id)->first();
        if (!$campaign) {
            return back()->with('error', 'Campaign not found');
        }
        $manager = User::where('user_id', $campaign->manager_id)->first();
        if (!$manager) {
            return back()->with('error', 'Campaign Creator/Fundraiser not found');
        }
        if ($request->action == 'archive') {
            $campaign->update([
                'status' => 'archived',
            ]);
            $agents = CampaignAgent::where('campaign_id', $campaign->campaign_id)->get() ?? [];
            foreach ($agents as $agent) {
                $agent->update([
                    'status' => 'inactive',
                ]);
            }
            //mail user
            $subject = $campaign->name . ' Archived Successfully';
            //    Mail::to(auth()->user()->email)->send(new Delete($subject, $campaign, $agents, 'archived'));
            // return (new Delete($subject, $campaign, $agents, 'archived'))->render();

            return redirect()->back()->with('success', 'Campaign archived successfully and all agents are deactivated.');
        } elseif ($request->action == 'delete') {
            $agents = CampaignAgent::where('campaign_id', $campaign->campaign_id)->get() ?? [];
            foreach ($agents as $agent) {
                //  $agent->delete();
            }
            $subject = $campaign->name . ' Deleted Successfully';
            //      Mail::to(auth()->user()->email)->send(new Delete($subject, $campaign, $agents, 'deleted'));
            // $campaign->delete();
            return redirect(route('manager.campaigns'))->with('success', 'Campaign deleted successfully, all agents were deleted.');
        } elseif ($request->action == 'approve') {
            $campaign->update([
                'status' => 'approved',
            ]);
            $subject = $campaign->name . ' Approved Successfully';

            Mail::to($manager->email)->send(new  StatusChange($subject, $campaign, 'approved', $manager->name));
            // return (new StatusChange($subject, $campaign, 'approved', $manager->name))->render();

            return redirect()->back()->with('success', 'Campaign approved successfully.');
        }
    }

    private function generateUniqueSlug($slug)
    {
        $count = 1;
        $originalSlug = $slug;

        // Check if the slug already exists in the database
        while (CampaignModel::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
