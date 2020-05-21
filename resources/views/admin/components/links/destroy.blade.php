@permission('destroy ' . \Str::singular($willcard))
    <a href="{{ route('admin.' . $willcard . '.destroy', $record->id) }}" data-delete class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
@endpermission
