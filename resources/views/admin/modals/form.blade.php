@component('admin.components.form.section', [
    'title' => 'modal.title',
    'description' => 'modal.description'
])
    <div class="row">
        <div class="col-md-8">
            @include('admin.components.form.text', [
                'model' => $model,
                'name' => 'title',
                'label' => 'title',
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
                'name' => 'only_home',
                'label' => 'only_home'
            ])
        </div>
    </div>

    @include('admin.components.form.textarea', [
        'model' => $model,
        'editor' => true,
        'name' => 'body',
        'label' => 'body'
    ])

    @include('admin.components.form.image', [
        'model' => $model,
        'name' => 'image',
        'width' => 200,
        'height' => 200,
        'url' => route('admin.' . $willcard . '.upload'),
        'label' => 'image'
    ])
@endcomponent
