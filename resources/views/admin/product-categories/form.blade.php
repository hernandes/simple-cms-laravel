@component('admin.components.form.section', [
    'title' => 'product-category.title',
    'description' => 'product-category.description'
])
    <div class="row">
        <div class="col-md-8">
            @include('admin.components.form.text', [
                'model' => $model,
                'name' => 'name',
                'required' => true,
                'label' => 'name',
                'autofocus' => true
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

        <div class="col-md-2">
            @include('admin.components.form.switch', [
                'model' => $model,
                'name' => 'featured',
                'label' => 'featured'
            ])
        </div>
    </div>

    @include('admin.components.form.text', [
        'model' => $model,
        'name' => 'slug',
        'label' => 'slug'
    ])

    @include('admin.components.form.textarea', [
        'model' => $model,
        'name' => 'description',
        'label' => 'description',
        'editor' => true
    ])

    <div class="row">
        <div class="col-md-4">
            @include('admin.components.form.select', [
                'model' => $model,
                'options' => $parents,
                'comparableKey' => 'parent_id',
                'name' => 'parent_id',
                'label' => 'parent',
            ])
        </div>
    </div>

    @include('admin.components.form.image', [
        'model' => $model,
        'name' => 'image',
        'width' => 150,
        'height' => 150,
        'url' => route('admin.' . $willcard . '.upload'),
        'label' => 'image'
    ])
@endcomponent
