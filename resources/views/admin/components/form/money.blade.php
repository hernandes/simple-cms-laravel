@php
    $value = old($name, optional($model)->{$name});
@endphp

<div class="form-group date">
    @include('admin.components.form.label')

    @include('admin.components.form.prefix')

    <input type="{{ $type ?? 'text' }}"
           name="{{ $name }}"
           data-currency
           {{ isset($autofocus) ? 'autofocus' : '' }}
           value="{{ $value ? number_format(to_float($value), 2, ',', '.') : $value }}"
           id="{{ $name }}"
           class="form-control datetimepicker-input{{ $errors->has($name) ? ' is-invalid' : '' }}{{ isset($small) ? ' form-control-sm' : '' }}" />

    @include('admin.components.form.suffix')

    @include('admin.components.form.error-message')
</div>
