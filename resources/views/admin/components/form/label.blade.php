@isset($label)
    <label class="form-control-label" for="{{ str_replace('.', '-', $name) }}">
        @lang('admin.modules.' . $willcard . '.fields.' . $label)

        @if (isset($required) && $required)
            <span class="required">*</span>
        @endif
    </label>
@endisset
