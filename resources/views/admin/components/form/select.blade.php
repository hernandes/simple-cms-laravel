<div class="form-group">
    @include('admin.components.form.label')

    @include('admin.components.form.prefix')

    <select name="{{ $name }}"
           {{ isset($autofocus) ? 'autofocus' : '' }}
           id="{{ $name }}"
           class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }}{{ isset($small) ? ' form-control-sm' : '' }}">
        @if (!isset($required) || isset($empty))
            <option value=""></option>
        @endif

        @foreach ($options as $value => $option)
            <option value="{{ $value }}"{{ $model && $model->{$comparableKey ?? $name} === $value ? ' selected' : '' }}>{{ $option }}</option>
        @endforeach
    </select>

    @include('admin.components.form.suffix')

    @include('admin.components.form.error-message')
</div>
