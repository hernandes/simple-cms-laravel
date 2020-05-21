@component('admin.components.form.section', [
    'title' => 'category.title',
    'description' => 'category.description'
])
    <div class="row">
        <div class="col-md-10">
            @include('admin.components.form.text', [
                'model' => $model,
                'autofocus' => true,
                'required' => true,
                'name' => 'name',
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

    @if ($model)
        @include('admin.components.form.text', [
            'model' => $model,
            'name' => 'slug',
            'label' => 'slug'
        ])
    @endif
@endcomponent
