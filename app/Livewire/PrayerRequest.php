<?php

namespace App\Livewire;

use App\Models\Campaigns\Campaign;
use App\Models\Campaigns\Prayer;
use Livewire\Component;
use Illuminate\Support\Facades\Schema;

class PrayerRequest extends Component
{
    //campaign info
    public $campaign, $organizer, $donations, $totalAmount, $category;

    //donor info
    public $name, $email, $prayer;
    public $isLoading = false; // Flag to track loading state 


    public $serverError, $serverSuccess, $checkoutUrl = '';


    public function rules()
    {
        return [
            'name' => 'required|min:5|string',
            'email' => 'required|email',
            'prayer' => 'required|profanity|min:5|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email',
            'email.email' => 'Please enter a valid email',
            'prayer.required' => 'Please enter your prayer request',
            'prayer.min' => 'Your prayer request is too short',
            'prayer.profanity' => 'Your prayer request contains inappropriate words'
        ];
    }
    public function submitPrayer()
    {
        if (!$this->campaign) {
            $this->serverError = 'Campaign not found';
            return;
        }
        $campaign = Campaign::where('campaign_id', $this->campaign->campaign_id)->first();
        if (!$campaign) {
            $this->serverError = 'Campaign not found';
            return;
        }
        $this->serverSuccess = '';
        $this->validate();
        $this->serverError = '';
        $this->serverSuccess = '';
        $prayer = Prayer::create([
            'name' => $this->name,
            'email' => $this->email,
            'prayer' => $this->prayer,
            'campaign_id' => $this->campaign->campaign_id
        ]);

        if ($prayer) {
            $this->serverSuccess = 'Prayer request submitted successfully';
            $this->name = '';
            $this->email = '';
            $this->prayer = '';
        }
    }


    public function render()
    {
        return view('livewire.prayer-request');
    }
}
