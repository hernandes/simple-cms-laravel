@component('admin.components.form.section', [
    'title' => 'group.title',
    'description' => 'group.description'
])
    <div class="row">
        <div class="col-md-4">
            @include('admin.components.form.text', [
                'model' => $model,
                'name' => 'key',
                'label' => 'key',
                'autofocus' => true
            ])
        </div>

        <div class="col-md-8">
            @include('admin.components.form.text', [
                'model' => $model,
                'name' => 'subject',
                'label' => 'subject'
            ])
        </div>
    </div>
@endcomponent

@component('admin.components.form.section', [
    'title' => 'recipients.title',
    'description' => 'recipients.description'
])
    @include('admin.components.form.checkbox', [
        'model' => $model,
        'options' => $recipients,
        'name' => 'recipients',
        'multiple' => true,
        'display' => 'email'
    ])
@endcomponent
