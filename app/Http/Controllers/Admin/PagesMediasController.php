<?php
namespace App\Http\Controllers\Admin;

use App\Models\Page;
use App\Models\Media;

class PagesMediasController extends Controller
{

    protected $willcard = 'page-medias';

    public function create(Page $page)
    {
        $model = null;
        return view('admin.' . $this->willcard . '.create', compact('model', 'page'));
    }

    public function store(Page $page)
    {
        request()->validate([
            'key' => 'required',
            'file' => 'required_if:type,image',
            'video_url' => 'required_if:type,video',
            'active' => 'boolean'
        ]);

        $data = request()->all();

        if (request('type') === 'video') {
            $data['file'] = $data['video_url'];
        }
        unset($data['video_url']);

        $page->medias()->create($data);

        return success(trans('admin.modules.' . $this->willcard . '.messages.success_update'),
            route('admin.pages.edit', $page->id), true);
    }

    public function edit(Page $page, Media $media)
    {
        return view('admin.' . $this->willcard . '.edit', [
            'model' => $media,
            'page' => $page
        ]);
    }

    public function update(Page $page, Media $media)
    {
        request()->validate([
            'key' => 'required',
            'file' => 'required_if:type,image',
            'video_url' => 'required_if:type,video',
            'active' => 'boolean'
        ]);

        request()->merge([
            'active' => request()->has('active')
        ]);

        $data = request()->all();
        if (request('type') === 'video') {
            $data['file'] = $data['video_url'];
        }
        unset($data['video_url']);

        $media->update($data);

        return success(trans('admin.modules.' . $this->willcard . '.messages.success_update'),
            route('admin.pages.edit', $page->id), true);
    }

    public function destroy(Page $page, Media $media)
    {
        $media->delete();

        return success(trans('admin.modules.' . $this->willcard . '.messages.success_destroy'),
            route('admin.pages.edit', $page->id), true);
    }

    public function reorder()
    {
        Media::setNewOrder(array_values(request('order')));

        return to_json([
            'message' => trans('admin.modules.blocks.messages.success_order'),
        ]);
    }

    public function upload()
    {
        request()->validate([
            'file' => 'required|image|max:2048'
        ]);

        return to_json(Media::upload('medias', 'file'));
    }

}
