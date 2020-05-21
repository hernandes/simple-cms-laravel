@php
    $passname = $name;
    $name = isset($belongs) ? $belongs . '[' . $passname . ']' : $passname;
    $id = isset($belongs) ? $belongs . '.' . $passname : $passname;
@endphp

<div class="form-group">
    @include('admin.components.form.label', ['name' => str_replace('.', '-', $id) ])

    @include('admin.components.form.prefix')

    @isset($multiple)
        @php
            $total = $model && $model->{$name} ? count($model->{$name}) : 0;
        @endphp

        @for($i = 0; $i <= $total; $i++)
            <input type="{{ $type ?? 'text' }}"
                   name="{{ $name }}[]"
                   {{ isset($autofocus) ? 'autofocus' : '' }}
                   value="{{ $model && isset($model->{$name}[$i]) ? is_object($model->{$name}[$i]) ? $model->{$name}[$i]->{$keyName} : $model->{$name}[$i] : null }}"
                   id="{{ $name }}"
                   class="mb-2 form-control{{ $errors->has($name) ? ' is-invalid' : '' }}{{ isset($small) ? ' form-control-sm' : '' }}" />
        @endfor

        <div class="repeatable-container" data-template="#field-{{ $name }}" data-add-trigger=".add-field-{{ $name }}"></div>

        <div class="text-right">
            <a href="#" class="btn btn-sm btn-success add-field-{{ $name }}">@lang('admin.actions.add')</a>
        </div>

        <script type="text/template" id="field-{{ $name }}">
            <input type="{{ $type ?? 'text' }}"
                   name="{{ $name }}[]"
                   id="{{ $name }}-{?}"
                   class="mb-2 form-control{{ isset($small) ? ' form-control-sm' : '' }}" />
        </script>
    @else
        <input type="{{ $type ?? 'text' }}"
               name="{{ $name }}"
               {{ isset($autofocus) ? 'autofocus' : '' }}
               value="{{ isset($value) && !$model ? $value : old($id, optional($model)->{$keyName ?? $name}) }}"
               id="{{ str_replace('.', '-', $id) }}"
               class="form-control{{ $errors->has($id) ? ' is-invalid' : '' }}{{ isset($small) ? ' form-control-sm' : '' }}" />
    @endisset

    @include('admin.components.form.suffix')

    @include('admin.components.form.error-message', ['name' => $id])
</div>
