@component('admin.components.form.section', [
    'title' => 'setting.title',
    'description' => 'setting.description'
])
    <div class="row">
        <div class="col-md-4">
            @include('admin.components.form.select', [
                'model' => $model,
                'options' => config('options.settings.types'),
                'name' => 'type',
                'label' => 'type',
                'autofocus' => true
            ])
        </div>

        <div class="col-md-8">
            @include('admin.components.form.text', [
                'model' => $model,
                'name' => 'key',
                'label' => 'key'
            ])
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @include('admin.components.form.' . ($model ? $model->type : 'textarea'), [
                'model' => $model,
                'name' => 'value',
                'label' => 'value',
            ])
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @include('admin.components.form.textarea', [
                'model' => $model,
                'name' => 'description',
                'label' => 'description',
            ])
        </div>
    </div>
@endcomponent
