@permission('edit ' . \Str::singular($willcard))
    <a data-ajax href="{{ route('admin.' . $willcard . '.edit', $record->id) }}" class="btn btn-sm btn-default">@lang('admin.actions.edit')</a>
@endpermission
