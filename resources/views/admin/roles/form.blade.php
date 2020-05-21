@component('admin.components.form.section', [
    'title' => 'role.title',
    'description' => 'role.description'
])
    <div class="row">
        <div class="col-md-12">
            @include('admin.components.form.text', [
                'model' => $model,
                'name' => 'name',
                'label' => 'name',
                'autofocus' => true
            ])
        </div>
    </div>
@endcomponent

@component('admin.components.form.section', [
    'title' => 'permissions.title',
    'description' => 'permissions.description',
])
    @include('admin.components.form.checkbox', [
        'model' => $model,
        'options' => $permissions,
        'grid' => 4,
        'name' => 'permissions',
        'multiple' => true,
        'display' => 'name'
    ])
@endcomponent
