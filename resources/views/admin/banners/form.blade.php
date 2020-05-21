@component('admin.components.form.section', [
    'title' => 'banner.title',
    'description' => 'banner.description'
])
    <div class="row">
        <div class="col-md-12">
            @include('admin.components.form.text', [
                'model' => $model,
                'multiple' => true,
                'name' => 'phrases',
                'label' => 'phrases'
            ])
        </div>
    </div>

    <div class="row">
        <div class="col-md-10">
            @include('admin.components.form.text', [
                'model' => $model,
                'name' => 'url',
                'label' => 'url'
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

    <div class="row">
        <div class="col-md-12">
            @include('admin.components.form.image', [
                'model' => $model,
                'name' => 'image',
                'required' => true,
                'width' => 300,
                'height' => 150,
                'url' => route('admin.' . $willcard . '.upload'),
                'label' => 'image'
            ])
        </div>
    </div>
@endcomponent
