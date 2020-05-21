@php
    $value = old($name, optional($model)->{$name});
@endphp

<div class="form-group date">
    @include('admin.components.form.label')

    @include('admin.components.form.prefix')

    <input type="{{ $type ?? 'text' }}"
           name="{{ $name }}"
           data-datepicker
           data-toggle="datetimepicker"
           data-target="#{{ $name }}"
           {{ isset($autofocus) ? 'autofocus' : '' }}
           value="{{ !$value ? '' : ($value instanceof \DateTime ? $value : new \DateTime(parse_date($value)))->format(trans('admin.locale.datetime')) }}"
           id="{{ $name }}"
           class="form-control datetimepicker-input{{ $errors->has($name) ? ' is-invalid' : '' }}{{ isset($small) ? ' form-control-sm' : '' }}" />

    @include('admin.components.form.suffix')

    @include('admin.components.form.error-message')
</div>
