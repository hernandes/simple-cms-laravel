@include('admin.components.form.image', [
    'model' => $model,
    'name' => 'file',
    'required' => true,
    'autofocus' => true,
    'url' => route('admin.' . $willcard . '.upload', $product->id),
    'label' => 'image'
])

<div class="row">
    <div class="col-md-10">
        @include('admin.components.form.text', [
            'model' => $model,
            'name' => 'title',
            'label' => 'title'
        ])
    </div>

    <div class="col-md-2">
        @include('admin.components.form.switch', [
            'model' => $model,
            'name' => 'active',
            'checked' => true,
            'label' => 'active'
        ])
    </div>
</div>

@include('admin.components.form.text', [
    'model' => $model,
    'name' => 'alt',
    'label' => 'alt',
])
