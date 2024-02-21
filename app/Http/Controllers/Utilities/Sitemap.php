<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;

use App\Models\{Election, ElectionCandidates};
use App\Models\Campaigns\Campaign;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Routing\RouteCollection;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\Sitemap as SitemapSitemap;

class Sitemap extends Controller
{
    public function toSitemapTag()
    {
        $sitemap = SitemapSitemap::create();

        // Add active campaigns to the sitemap
        Campaign::get()->each(function ($campaign) use ($sitemap) {
            $sitemap->add(Url::create(route('view-campaign', ['id' => $campaign->slug]))
                ->setPriority(0.8)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_HOURLY));
            $sitemap->add(Url::create(route('campaign-donate', ['id' => $campaign->slug]))
                ->setPriority(0.8)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_HOURLY));
        });


        // Add other static URLs to the sitemap
        $sitemap->add(Url::create('/')->setPriority(1)->setChangeFrequency(Url::CHANGE_FREQUENCY_HOURLY))
            ->add(Url::create('/contact-us')->setPriority(0.5)->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY))
            ->add(Url::create('/about-us')->setPriority(0.5)->setChangeFrequency(Url::CHANGE_FREQUENCY_HOURLY))
            ->add(Url::create('/campaigns')->setPriority(0.5)->setChangeFrequency(Url::CHANGE_FREQUENCY_HOURLY));

        // Write the sitemap to a file
        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
