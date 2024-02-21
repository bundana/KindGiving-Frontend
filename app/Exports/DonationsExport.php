<?php

namespace App\Exports;

use App\Models\Campaigns\Donations;
use App\Models\Campaigns\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class DonationsExport implements FromView
{
    protected $campaign_id;
    protected $keyword;
    protected $startDate;
    protected $endDate;
    protected $date_range;
    public $request, $method;

    public function __construct(Request $request, $campaign_id, $keyword, $date_range, $method = null)
    {
        $this->campaign_id = $campaign_id;
        $this->keyword = $keyword;
        $this->date_range = $date_range;
        $this->method = $method;
        // Ensure the request is available for any additional use
        $this->request = $request;
    }

    public function view(): View
    {
        $campaign = Campaign::where('campaign_id', $this->campaign_id)->first();

        // Check if the campaign exists; if not, return an empty collection
        if (!$campaign) {
            $data = collect();
        } else {
            // Query donations based on the search keyword and date range
            $method = $this->method;
            $keyword = $this->keyword;
            $dateRange = $this->date_range;

            $data = Donations::when($this->method, function ($query) {
                $query->where('method', $this->method);
            })
                ->when($this->keyword, function ($query) {
                    $query->where(function ($query) {
                        $query->where('donation_ref', 'like', "%$this->keyword%")
                            ->orWhere('momo_number', "$this->keyword")
                            ->orWhere('method', "$this->keyword")
                            ->orWhere('amount', 'like', "%$this->keyword%")
                            ->orWhere('donor_name', 'like', "%$this->keyword%")
                            ->orWhere('method', 'like', "%$this->keyword%")
                            ->orWhere('status', 'like', "%$this->keyword%");
                    });
                })
                ->when($this->date_range, function ($query) {
                    $dateRange = explode(' - ', $this->date_range);
                    $startDate = date('Y-m-d', strtotime($dateRange[0]));
                    $endDate = date('Y-m-d', strtotime($dateRange[1]));
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                })
                ->latest()
                ->get(); 
        }

        return view('layouts/exports/campaigns/donations', [
            'campaign' => $campaign,
            'data' => $data,
        ]);
    }
}
