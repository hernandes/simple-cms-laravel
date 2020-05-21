<div class="form-group">
    @include('admin.components.form.label')
    
    <div>
        <input
            type="checkbox"
            value="1"
            data-switch
            name="{{ $name }}"
            {{ (isset($checked) && !old('_token') && !isset($model->{$name})) || old($name, optional($model)->{$name}) ? 'checked' : '' }}
            id="{{ $name }}"
            {{ isset($toggleVisibility) ? 'data-toggle-visibility=' . $toggleVisibility : '' }}
            data-on="@lang('admin.words.yes')"
            data-off="@lang('admin.words.no')"
            data-size="{{ isset($small) ? 'small' : 'normal' }}" />
    </div>
</div>
