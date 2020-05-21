@component('admin.components.form.section', [
    'title' => 'recipient.title',
    'description' => 'recipient.description',
])
    <div class="row">
        <div class="col-md-4">
            @include('admin.components.form.text', [
                'model' => $model,
                'name' => 'name',
                'label' => 'name',
                'autofocus' => true
            ])
        </div>

        <div class="col-md-8">
            @include('admin.components.form.text', [
                'model' => $model,
                'name' => 'email',
                'label' => 'email'
            ])
        </div>
    </div>
@endcomponent

@component('admin.components.form.section', [
    'title' => 'groups.title',
    'description' => 'groups.description'
])
    @include('admin.components.form.checkbox', [
        'model' => $model,
        'options' => $groups,
        'name' => 'groups',
        'multiple' => true,
        'display' => 'subject'
    ])
@endcomponent
