@component('admin.components.form.section', [
    'title' => 'post.title',
    'description' => 'post.description'
])
    <div class="row">
        <div class="col-md-10">
            @include('admin.components.form.text', [
                'model' => $model,
                'name' => 'title',
                'label' => 'title',
                'autofocus' => true,
                'required' => true
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

    @if ($model)
        @include('admin.components.form.text', [
            'model' => $model,
            'name' => 'slug',
            'label' => 'slug'
        ])
    @endif

    @include('admin.components.form.image', [
        'model' => $model,
        'name' => 'image',
        'width' => 200,
        'height' => 150,
        'url' => route('admin.' . $willcard . '.upload'),
        'label' => 'image'
    ])

    <div class="row">
        <div class="col-md-3">
            @include('admin.components.form.datetime', [
                'model' => $model,
                'name' => 'published_at',
                'label' => 'published_at'
            ])
        </div>
    </div>
@endcomponent

@if (config('modules.posts.config.with_categories'))
    @component('admin.components.form.section', [
        'title' => 'categories.title',
        'description' => 'categories.description'
    ])
        @include('admin.components.form.checkbox', [
            'model' => $model,
            'options' => $categories,
            'name' => 'categories',
            'multiple' => true,
            'display' => 'name'
        ])
    @endcomponent
@endif

@component('admin.components.form.section', [
    'title' => 'body.title',
    'description' => 'body.description'
])
    @include('admin.components.form.textarea', [
        'model' => $model,
        'name' => 'body',
        'required' => true,
        'editor' => true
    ])
@endcomponent

@if (config('modules.posts.config.with_tags'))
    @component('admin.components.form.section', [
        'title' => 'tags.title',
        'description' => 'tags.description'
    ])
        @include('admin.components.form.tags', [
            'model' => $model,
            'name' => 'tags'
        ])
    @endcomponent
@endif
