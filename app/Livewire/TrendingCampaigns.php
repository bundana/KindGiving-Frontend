<?php

namespace App\Livewire;

use App\Models\Campaigns\Campaign;
use Livewire\Component;

class TrendingCampaigns extends Component
{
    public $trendingCampaigns;

    public function mount()
    {
        $this->getCampaigns();
    }

    public function getCampaigns()
    {
        // Slow database query
        $this->trendingCampaigns = Campaign::where('visibility', 'public')
            ->where('status', 'approved')
            ->where('hide_target', 'no')
            ->where('hide_raised', 'no')
            ->take(10)
            ->get() ?: [];


        return $this->trendingCampaigns;
    }

    public function placeholder()
    {
        return view('livewire.placeholders.skeleton');
    }

    public function render()
    {
        $this->dispatch('contentChanged');

        return view(
            'livewire.trending-campaigns',
            [
                'trendingCampaigns' => $this->trendingCampaigns,
            ]
        );
    }
}
