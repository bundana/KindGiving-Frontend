<?php

use App\Http\Controllers\Frontend\{CamapaignPageController};
use App\Http\Controllers\Utilities\Sitemap;
use App\Models\Campaigns\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function (Request $request) {
    return view('index');
})->name('home');
Route::get('/about-us', function (Request $request) {
    return view('about-us');
})->name('about-us');
Route::get('/why-us', function (Request $request) {
    return view('why-us');
})->name('why-us');

Route::get('/contact-us', function (Request $request) {
    return view('contact-us');
})->name('contact-us');

Route::get('/campaigns', [CamapaignPageController::class, 'index'])->name('campaigns');

Route::get('/campaigns/{id}', [CamapaignPageController::class, 'show'])->name('view-campaign');

Route::get('/campaigns/{id}/donate', [CamapaignPageController::class, 'donate'])->name('campaign-donate');
Route::get('/campaigns/{id}/print', [CamapaignPageController::class, 'print'])->name('print-campaign');
Route::get('/campaigns/{id}/qr', [CamapaignPageController::class, 'qr'])->name('campaign-qr');

Route::get('sitemap', [Sitemap::class, 'toSitemapTag']);


