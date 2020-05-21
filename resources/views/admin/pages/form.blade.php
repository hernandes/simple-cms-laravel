@component('admin.components.form.section', [
    'title' => 'page.title',
    'description' => 'page.description'
])
    @include('admin.components.form.text', [
            'model' => $model,
            'required' => true,
            'name' => 'key',
            'label' => 'key',
            'autofocus' => true
        ])

    <div class="row">
        <div class="col-md-{{ config('modules.pages.config.with_featured') ? 8 : 10 }}">
            @include('admin.components.form.text', [
                'model' => $model,
                'required' => true,
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

        @if (config('modules.pages.config.with_featured'))
            <div class="col-md-2">
                @include('admin.components.form.switch', [
                    'model' => $model,
                    'name' => 'featured',
                    'label' => 'featured'
                ])
            </div>
        @endif
    </div>

    @if ($model)
        <div class="row">
            <div class="col-md-12">
                @include('admin.components.form.text', [
                    'model' => $model,
                    'name' => 'slug',
                    'label' => 'slug'
                ])
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            @include('admin.components.form.textarea', [
                'model' => $model,
                'name' => 'body',
                'editor' => true,
                'label' => 'body',
            ])
        </div>
    </div>
@endcomponent

@includeWhen($model, 'admin.' . $willcard . '.blocks-medias')

@component('admin.components.form.section', [
    'title' => 'seo.title',
    'description' => 'seo.description'
])
    <div class="row">
        <div class="col-md-12">
            @include('admin.components.form.text', [
                'model' => optional($model)->seo,
                'name' => 'title',
                'belongs' => 'seo',
                'label' => 'seo_title',
            ])
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @include('admin.components.form.text', [
                'model' => optional($model)->seo,
                'name' => 'keywords',
                'belongs' => 'seo',
                'label' => 'seo_keywords',
            ])
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @include('admin.components.form.textarea', [
                'model' => optional($model)->seo,
                'name' => 'description',
                'belongs' => 'seo',
                'label' => 'seo_description',
            ])
        </div>
    </div>
@endcomponent
