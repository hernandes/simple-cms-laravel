<?php
namespace App\Http\Controllers\Web;

use App\Models\Banner;
use App\Models\Page;

class HomeController extends Controller
{

    public function index()
    {
        $page = Page::first();
        $page->configSeo();

        $banners = Banner::activated()
            ->ordered()
            ->get();

        return view('web.pages.home', compact('page', 'banners'));
    }

}
