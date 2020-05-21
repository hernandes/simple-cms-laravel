<?php
namespace App\Http\Controllers\Web;

use App\Models\Menu;

class SitemapController extends Controller
{

    public function index()
    {
        $sitemap = app('sitemap');

        Menu::sitemap($sitemap);

        return $sitemap->render('xml', null);
    }

    public function xml()
    {
        $sitemap = app('sitemap');

        Menu::sitemap($sitemap);

        return $sitemap->render('xml', null);
    }

}
