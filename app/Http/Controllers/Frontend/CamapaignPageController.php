<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Campaigns\Campaign;
use App\Models\Campaigns\Donations;
use App\Models\User;
use Illuminate\Http\Request;

class CamapaignPageController
{
    private $shortUrl;
    private const SHORT_URL_API_KEY = '6Lfz5mMpAAAAAAAA';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('all-campaigns');
    }

    public function show(Request $request)
    {
        $campaign_id = $request->id;
        $campaign = Campaign::where('slug', $campaign_id)
            ->orWhere('campaign_id', $campaign_id)
            ->where('visibility', 'public')
            ->where('status', 'approved')->first();

        if (!$campaign) {
            abort(404);
        }
        $organizer = User::where('user_id', $campaign->manager_id)->first();
        $donations = Donations::where('campaign_id', $campaign->campaign_id)
            ->where('status', 'paid')->get();

        $shortUrl = $campaign->short_url;
        if (!$shortUrl || $shortUrl == null) {
            $shortUrl = $this->generateShortUrl(route('view-campaign', $campaign->slug));
            $campaign->short_url = $shortUrl;
            $campaign->save();
        }
        return view('view-campaign', compact('campaign', 'organizer', 'donations', 'shortUrl'));
    }
    public function donate(Request $request)
    {
        $campaign_id = $request->id;
        $campaign = Campaign::where('slug', $campaign_id)
            ->orWhere('campaign_id', $campaign_id)
            ->where('visibility', 'public')
            ->where('status', 'approved')->first();

        if (!$campaign) {
            abort(404);
        }
        $organizer = User::where('user_id', $campaign->manager_id)->first();
        $donations = Donations::where('campaign_id', $campaign->campaign_id)
            ->where('status', 'paid')->get();

        $shortUrl = $campaign->short_url;
        if (!$shortUrl || $shortUrl == null) {
            $shortUrl = $this->generateShortUrl(route('view-campaign', $campaign->slug));
            $campaign->short_url = $shortUrl;
            $campaign->save();
        }

        return view('campaign-donate', compact('campaign', 'organizer', 'donations', 'shortUrl'));
    }

    public function print(Request $request)
    {
        $campaign_id = $request->id;
        $campaign = Campaign::where('slug', $campaign_id)
            ->orWhere('campaign_id', $campaign_id)
            ->where('visibility', 'public')
            ->where('status', 'approved')->first();

        if (!$campaign) {
            abort(404);
        }
        $organizer = User::where('user_id', $campaign->manager_id)->first();
        $donations = Donations::where('campaign_id', $campaign->campaign_id)
            ->where('status', 'paid')->get();

        $shortUrl = $campaign->short_url;
        if (!$shortUrl || $shortUrl == null) {
            $shortUrl = $this->generateShortUrl(route('view-campaign', $campaign->slug));
            $campaign->short_url = $shortUrl;
            $campaign->save();
        }
        return view('print-campaign', compact('campaign', 'organizer', 'donations', 'shortUrl', ));
    }

    public function qr(Request $request)
    {
        $campaign_id = $request->id;
        $campaign = Campaign::where('slug', $campaign_id)
            ->orWhere('campaign_id', $campaign_id)
            ->where('visibility', 'public')
            ->where('status', 'approved')->first();

        if (!$campaign) {
            abort(404);
        }
        $organizer = User::where('user_id', $campaign->manager_id)->first();
        $donations = Donations::where('campaign_id', $campaign->campaign_id)->get();
        $shortUrl = $campaign->short_url;
        if (!$shortUrl || $shortUrl == null) {
            $shortUrl = $this->generateShortUrl(route('view-campaign', $campaign->slug));
            $campaign->short_url = $shortUrl;
            $campaign->save();
        }
        return view('campaign-qrcode', compact('campaign', 'organizer', 'donations', 'shortUrl'));
    }

    private function generateShortUrl($url)
    {
        $curl = curl_init();

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'https://kdgiv.in/api/generate/shorturl',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode(
                    array(
                        'url' => $url,
                        'activateAt' => '',
                        'deactivateAt' => ''
                    )
                ),
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . self::SHORT_URL_API_KEY
                ),
            )
        );

        $response = curl_exec($curl);
        $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if ($http_status != 200) {
            // Handle HTTP error
            return null;
        }

        curl_close($curl);

        $response = json_decode($response, true);

        // Check if the response is successful
        if (isset($response['response']) && $response['response'] == 'success' && isset($response['short_url'])) {
            return $response['short_url'];
        } else {
            // Handle API response error
            return null;
        }
    }
}

