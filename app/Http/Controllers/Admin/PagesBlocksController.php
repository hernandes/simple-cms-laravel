<?php
namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Models\PageBlock;
use Flash;
use Rymanalu\LaravelSimpleUploader\Support\Uploader;

class PagesBlocksController extends Controller
{

    protected $willcard = 'page-blocks';

    public function create(Page $page)
    {
        $model = null;
        return view('admin.' . $this->willcard . '.create', compact('model', 'page'));
    }

    public function store(Page $page)
    {
        request()->validate([
            'key' => 'required',
            'active' => 'boolean'
        ]);

        $page->blocks()->create(request()->all());

        return success(trans('admin.modules.' . $this->willcard . '.messages.success_update'),
            route('admin.pages.edit', $page->id), true);
    }

    public function edit(Page $page, PageBlock $block)
    {
        return view('admin.' . $this->willcard . '.edit', [
            'model' => $block,
            'page' => $page
        ]);
    }

    public function update(Page $page, PageBlock $block)
    {
        request()->validate([
            'key' => 'required',
            'active' => 'boolean'
        ]);

        request()->merge([
            'active' => request()->has('active')
        ]);
        $block->update(request()->all());

        return success(trans('admin.modules.' . $this->willcard . '.messages.success_update'),
            route('admin.pages.edit', $page->id), true);
    }

    public function destroy(Page $page, PageBlock $block)
    {
        $block->delete();

        return success(trans('admin.modules.' . $this->willcard . '.messages.success_destroy'),
            route('admin.pages.edit', $page->id), true);
    }

    public function reorder()
    {
        PageBlock::setNewOrder(array_values(request('order')));

        return to_json([
            'message' => trans('admin.modules.' . $this->willcard . '.messages.success_order'),
        ]);
    }

    public function upload()
    {
        request()->validate([
            'image' => 'required|image|max:2048'
        ]);

        return to_json(PageBlock::upload('page-blocks'));
    }

}
