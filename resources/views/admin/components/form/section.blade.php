<div class="row section px-3">
    <div class="col-lg-3 col-md-3 col-sm-12">
        <h5>@lang('admin.modules.' . $willcard . '.sections.' . $title)</h5>
        @isset($description)
            <p>@lang('admin.modules.' . $willcard . '.sections.' . $description)</p>
        @endisset
    </div>
    <div class="col-lg-9 col-md-9 col-sm-12">
        {{ $slot }}
    </div>
</div>
