<div class="form-group">
    @include('admin.components.form.label')

    @include('admin.components.form.prefix')

    @php
        $hasImage = old($name, $model ? $model->{$name} : null);
    @endphp

    <div class="image-upload form-control{{ $errors->has($name) ? ' is-invalid' : '' }}" style="width:{{ $width ?? 200 }}px;height:{{ $height ?? 200 }}px;">
        <div class="preview" style="display:{{ $hasImage ? 'block' : 'none' }}">
            <div class="image">
                <img src="{{ $hasImage ? old($name, null) ? asset('storage/' . old($name)) : $model->{$name . '_url'} : '' }}" style="max-width:{{ ($width ?? 200) - 20 }}px;max-height:{{ ($height ?? 200) - 20 }}px;" />
            </div>
            <i class="image-close fa fa-times-circle"></i>
        </div>

        <div class="upload" style="display:{{ !$hasImage ? 'block' : 'none' }}">
            <label for="{{ $name }}" class="image-icon">
                <i class="fa fa-upload"></i>
            </label>

            <input
                data-image-upload
                data-url="{{ $url ?? url('upload') }}"
                style="display: none"
                type="file"
                data-name="{{ $name }}"
                id="{{ $name }}"
                accept="images/*"
            />

            <input type="hidden" id="post-{{ $name }}" name="{{ $name }}" value="{{ old($name, $model ? $model->{$name} : null) }}" />

            <div class="image-spinner" style="display:none;"></div>
        </div>
    </div>

    @include('admin.components.form.suffix')

    @include('admin.components.form.error-message')
</div>
