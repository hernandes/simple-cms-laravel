<?php
namespace App\Http\Controllers\Web;

use App\Models\Page;

class PagesController extends Controller
{

    public function show($slug = null)
    {
        $page = Page::whereTranslation('slug', $slug)->firstOrFail();
        $page->configSeo();

        $blocks = $page->block('block_*');

        return view('web.pages.show', compact('page', 'blocks'));
    }

}
