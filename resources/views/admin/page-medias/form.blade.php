@include('admin.components.form.text', [
    'model' => $model,
    'required' => true,
    'name' => 'key',
    'label' => 'key',
    'autofocus' => true
])

<div class="page-media-type">
    @include('admin.components.form.select', [
        'options' => [
            'image' => trans('admin.words.image'),
            'video' => trans('admin.words.video')
        ],
        'flat' => true,
        'model' => $model,
        'required' => true,
        'name' => 'type',
        'label' => 'type'
    ])
</div>

<div class="media-image" style="display:{{ !$model || $model->type === 'image' ? 'block' : 'none' }}">
    @include('admin.components.form.image', [
        'model' => $model,
        'name' => 'file',
        'required' => true,
        'url' => route('admin.' . $willcard . '.upload', $page->id),
        'label' => 'image'
    ])
</div>

<div class="media-video" style="display:{{ $model && $model->type === 'video' ? 'block' : 'none' }}">
    @include('admin.components.form.text', [
        'model' => $model,
        'required' => true,
        'keyName' => 'file',
        'name' => 'video_url',
        'label' => 'video_url'
    ])
</div>

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

@include('admin.components.form.textarea', [
    'model' => $model,
    'name' => 'description',
    'label' => 'description',
])
