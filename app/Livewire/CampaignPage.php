<?php

namespace App\Livewire;

use App\Http\Controllers\Utilities\Helpers;
use App\Models\Campaigns\Campaign;
use App\Models\Campaigns\Category;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class CampaignPage extends Component
{
    use WithPagination;
    #[Url()]
    public $query = '';
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['category' => ['except' => ''], 'category2' => ['except' => '']];
    #[Url(keep: true)]
    public $category = '';

    #[Url(keep: true)]
    public $category2 = '';

    public function clearFilters()
    {
        $this->category = '';
        $this->query = '';
        $this->category2 = '';
    }
    public function placeholder()
    {
        return view('livewire.placeholders.skeleton');
    }
    public function search()
    {
        $this->resetPage();
    }

    public function render(Request $request)
    {
        $category = $this->category;
        $category2 = $this->category2;
        $campaignsQuery = Campaign::where('visibility', 'public')
            ->where('status', 'approved')->where('name', 'like', '%' . $this->query . '%')
            ->where('visibility', 'public')
            ->when($this->category, function ($query) use ($category) {
                $query->where('category', $this->category);
            })->when($this->category2, function ($query) use ($category2) {
                $query->orWhere('category', $this->category2); // Use 'orWhere' to include campaigns matching category2
            });
        $campaigns = $campaignsQuery->paginate(103);

        $categoriesWithCounts = Category::withCount('campaigns')->get();

        return view('livewire.campaign-page', [
            'campaigns' => $campaigns,
            'categoriesWithCounts' => $categoriesWithCounts,
        ]);
    }

}
