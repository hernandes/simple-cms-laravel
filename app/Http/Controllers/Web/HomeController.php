<?php
namespace App\Http\Controllers\Web;

use App\Models\Banner;
use App\Models\Page;
use App\Models\Testimonial;

class HomeController extends Controller
{

    public function index()
    {
        $page = Page::first();
        $page->configSeo();

        $banners = Banner::activated()
            ->ordered()
            ->get();

        $testimonials = Testimonial::take(3)->get();

        return view('web.pages.home', compact(
            'page', 'banners', 'testimonials'
        ));
    }

}
