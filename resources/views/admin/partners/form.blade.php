@component('admin.components.form.section', [
    'title' => 'partner.title',
    'description' => 'partner.description'
])
    <div class="row">
        <div class="col-md-10">
            @include('admin.components.form.text', [
                'model' => $model,
                'name' => 'name',
                'required' => true,
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

    @include('admin.components.form.text', [
        'model' => $model,
        'name' => 'site_url',
        'label' => 'site_url'
    ])

    <div class="row">
        <div class="col-md-12">
            @include('admin.components.form.image', [
                'model' => $model,
                'name' => 'logo',
                'required' => true,
                'width' => 150,
                'height' => 150,
                'url' => route('admin.' . $willcard . '.upload'),
                'label' => 'logo'
            ])
        </div>
    </div>
@endcomponent
