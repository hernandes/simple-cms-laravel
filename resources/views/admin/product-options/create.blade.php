<div class="modal-header">
    <h5 class="modal-title">@lang('admin.actions.new') @lang('admin.modules.' . $willcard . '.singular')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>

<form data-ajax-modal action="{{ route('admin.' . $willcard . '.store', $product->id) }}" method="post">
    @csrf

    <div class="modal-body">
        @include('admin.' . $willcard . '.form')
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-success offset-md-3">@lang('admin.actions.save')</button>
    </div>
</form>
