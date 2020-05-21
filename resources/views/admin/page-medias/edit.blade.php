<div class="modal-header">
    <h5 class="modal-title">@lang('admin.actions.edit') @lang('admin.modules.' . $willcard . '.singular')</h5>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>

<form data-ajax-modal action="{{ route('admin.' . $willcard . '.update', [$page->id, $model->id]) }}" method="post">
    @csrf
    @method('PUT')

    <div class="modal-body">
        @include('admin.' . $willcard . '.form')
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-success offset-md-3">@lang('admin.actions.save')</button>
    </div>
</form>
