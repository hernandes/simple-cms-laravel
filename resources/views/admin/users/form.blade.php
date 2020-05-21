@component('admin.components.form.section', [
    'title' => 'user.title',
    'description' => 'user.description'
])
    <div class="row">
        <div class="col-md-10">
            @include('admin.components.form.text', [
                'model' => $model,
                'name' => 'name',
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
    </div>

    <div class="row">
        <div class="col-md-6">
            @include('admin.components.form.text', [
                'model' => $model,
                'name' => 'email',
                'label' => 'email',
            ])
        </div>

        <div class="col-md-6">
            @include('admin.components.form.text', [
                'model' => $model,
                'name' => 'password',
                'value' => false,
                'label' => 'password',
                'type' => 'password'
            ])
        </div>
    </div>

    @include('admin.components.form.switch', [
        'model' => $model,
        'name' => 'super_user',
        'label' => 'super_user'
    ])

    @include('admin.components.form.image', [
        'model' => $model,
        'name' => 'avatar',
        'width' => 100,
        'height' => 100,
        'url' => route('admin.' . $willcard . '.upload'),
        'label' => 'avatar'
    ])
@endcomponent

@component('admin.components.form.section', [
    'title' => 'groups.title',
    'description' => 'groups.description'
])
    @include('admin.components.form.checkbox', [
        'model' => $model,
        'options' => $roles,
        'name' => 'roles',
        'multiple' => true,
        'display' => 'name'
    ])
@endcomponent
