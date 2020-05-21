<?php
namespace App\Http\Controllers\Admin;

use App\Models\Media;
use App\Models\Product;
use Uploader;

class ProductMediasController extends Controller
{

    protected $willcard = 'product-medias';

    public function create(Product $product)
    {
        $model = null;
        return view('admin.' . $this->willcard . '.create', compact('model', 'product'));
    }

    public function store(Product $product)
    {
        request()->validate([
            'file' => 'required',
            'active' => 'boolean'
        ]);

        $product->medias()->create(request()->all());

        return success(trans('admin.modules.' . $this->willcard . '.messages.success_update'),
            route('admin.products.edit', $product->id), true);
    }

    public function edit(Product $product, Media $media)
    {
        return view('admin.' . $this->willcard . '.edit', [
            'model' => $media,
            'product' => $product
        ]);
    }

    public function update(Product $product, Media $media)
    {
        request()->validate([
            'file' => 'required',
            'active' => 'boolean'
        ]);

        request()->merge([
            'active' => request()->has('active')
        ]);
        $media->update(request()->all());

        return success(trans('admin.modules.' . $this->willcard . '.messages.success_update'),
            route('admin.products.edit', $product->id), true);
    }

    public function destroy(Product $product, Media $media)
    {
        $media->delete();

        return success(trans('admin.modules.' . $this->willcard . '.messages.success_destroy'),
            route('admin.products.edit', $product->id), true);
    }

    public function reorder()
    {
        Media::setNewOrder(array_values(request('order')));
    }

    public function upload()
    {
        request()->validate([
            'file' => 'required|image|max:2048'
        ]);

        return to_json(Media::upload('medias', 'file'));
    }

}
