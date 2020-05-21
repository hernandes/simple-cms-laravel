@component('admin.components.form.section', [
    'title' => 'faq.title',
    'description' => 'faq.description'
])
    <div class="row">
        <div class="col-md-10">
            @include('admin.components.form.text', [
                'model' => $model,
                'autofocus' => true,
                'required' => true,
                'name' => 'question',
                'label' => 'question'
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

    @include('admin.components.form.textarea', [
        'model' => $model,
        'required' => true,
        'name' => 'answer',
        'editor' => true,
        'label' => 'answer'
    ])
@endcomponent
