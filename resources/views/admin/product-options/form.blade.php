@include('admin.components.form.text', [
    'model' => $model,
    'name' => 'name',
    'autofocus' => true,
    'required' => true,
    'label' => 'name'
])

@include('admin.components.form.text', [
    'model' => $model,
    'multiple' => true,
    'name' => 'values',
    'keyName' => 'label',
    'label' => 'values'
])
