<?php

namespace App\Livewire;

use App\Http\Controllers\Utilities\Helpers;
use App\Models\Campaigns\Campaign;
use App\Models\Campaigns\Donations;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class CampaignViewPage extends Component
{
    use WithPagination;
    #[Url()]
    public $query = '';
    protected $paginationTheme = 'bootstrap';
    public $campaign;
    public $organizer;
    public $perPage = 5; // Number of items to load initially
    public $showModal = false;
    #[Url()]
    public $donor = '';
    #[Url()]
    public $date = '';
    public $showFullDescription = false;

    public function search()
    {
        $this->resetPage();
    }


    public function showAllDonors()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function loadMore()
    {
        $this->perPage += 5;
    }

    public function filterByDonor($donor)
    {
        $this->donor = $donor;
        $this->resetPage();
    }

    public function filterByDate($date)
    {
        $this->date = $date;
        $this->resetPage();
    }
    public function toggleDescription()
    {
        $this->showFullDescription = !$this->showFullDescription;
    }
    public function render(Request $request)
    {
        $campaign_id = $this->campaign->campaign_id;
        $donationsQuery = Donations::where('campaign_id', $campaign_id)->where('status', 'paid');

        if ($this->donor) {
            $donationsQuery->where('donor_name', $this->donor);
        }

        if ($this->date) {
            $donationsQuery->whereDate('created_at', $this->date);
        }

        $donations = $donationsQuery->paginate($this->perPage);

        $filterDonations = Donations::where('campaign_id', $campaign_id)->where('status', 'paid')->paginate(1);

        return view('livewire.campaign-view-page', [
            'donations' => $donations,
            'filterDonations' => $filterDonations
        ]);
    }
}
