@include('admin.components.form.text', [
    'model' => $model,
    'required' => true,
    'name' => 'key',
    'label' => 'key',
    'autofocus' => true
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

@include('admin.components.form.image', [
    'model' => $model,
    'name' => 'image',
    'width' => 200,
    'height' => 150,
    'url' => route('admin.' . $willcard . '.upload', $page->id),
    'label' => 'image'
])

@include('admin.components.form.textarea', [
    'model' => $model,
    'name' => 'body',
    'editor' => true,
    'label' => 'body',
])
