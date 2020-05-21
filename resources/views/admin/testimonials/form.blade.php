@component('admin.components.form.section', [
    'title' => 'testimonial.title',
    'description' => 'testimonial.description'
])
    <div class="row">
        <div class="col-md-10">
            @include('admin.components.form.text', [
                'model' => $model,
                'name' => 'name',
                'required' => true,
                'autofocus' => true,
                'label' => 'name'
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
        'width' => 100,
        'height' => 100,
        'url' => route('admin.' . $willcard . '.upload'),
        'label' => 'image'
    ])

    @include('admin.components.form.text', [
        'model' => $model,
        'name' => 'company',
        'label' => 'company'
    ])

    <div class="row">
        <div class="col-md-12">
            @include('admin.components.form.textarea', [
                'model' => $model,
                'name' => 'body',
                'required' => true,
                'label' => 'body'
            ])
        </div>
    </div>
@endcomponent
