@component('admin.components.form.section', [
    'title' => 'blocks.title',
    'description' => 'blocks.description'
])
    @if ($model->blocks->isEmpty())
        @include('admin.components.helpers.no-records')
    @else
        <table data-table-sortable data-url="{{ route('admin.page-blocks.reorder', $model->id) }}" class="table table-hover table-striped table-md">
            <thead>
                <tr>
                    <th width="10"></th>
                    <th width="250">@lang('admin.modules.page-blocks.fields.key')</th>
                    <th>@lang('admin.modules.page-blocks.fields.title')</th>
                    <th data-orderable="false" width="10"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($model->blocks as $record)
                    <tr id="order_{{ $record->id  }}" class="{{ $record->active ? '' : 'bg-inactive' }}">
                        <td>
                            <i class="fa fa-bars draggable"></i>
                        </td>
                        <td>{{ $record->key }}</td>
                        <td>{{ $record->title }}</td>
                        <td class="actions">
                            @permission('edit page-block')
                                <a data-toggle="modal" data-target="#modal-edit-block" href="{{ route('admin.page-blocks.edit', [$model->id, $record->id]) }}" class="btn btn-sm btn-default">@lang('admin.actions.edit')</a>
                            @endpermission

                            @permission('destroy page-block')
                                <a href="{{ route('admin.page-blocks.destroy', [$model->id, $record->id]) }}" data-delete class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            @endpermission
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="text-right">
        <a data-toggle="modal" data-target="#modal-add-block" href="{{ route('admin.page-blocks.create', $model->id) }}" class="btn btn-sm btn-success">@lang('admin.actions.add')</a>
    </div>
@endcomponent

@component('admin.components.form.section', [
    'title' => 'medias.title',
    'description' => 'medias.description'
])
    @if ($model->medias->isEmpty())
        @include('admin.components.helpers.no-records')
    @else
        <table data-table-sortable data-url="{{ route('admin.page-medias.reorder', $model->id) }}" class="table table-hover table-striped table-md">
            <thead>
                <tr>
                    <th width="10"></th>
                    <th width="250"></th>
                    <th>@lang('admin.modules.page-medias.fields.key')</th>
                    <th data-orderable="false" width="10"></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($model->medias as $record)
                    <tr id="order_{{ $record->id  }}" class="{{ $record->active ? '' : 'bg-inactive' }}">
                        <td>
                            <i class="fa fa-bars draggable"></i>
                        </td>
                        <td>
                            <img src="{{ $record->thumb }}" style="max-width:200px" />
                        </td>
                        <td>{{ $record->key }}</td>
                        <td class="actions">
                            @permission('edit page-media')
                                <a data-toggle="modal" data-target="#modal-edit-media" href="{{ route('admin.page-medias.edit', [$model->id, $record->id]) }}" class="btn btn-sm btn-default">@lang('admin.actions.edit')</a>
                            @endpermission

                            @permission('destroy page-media')
                                <a href="{{ route('admin.page-medias.destroy', [$model->id, $record->id]) }}" data-delete class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            @endpermission
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="text-right">
        <a data-toggle="modal" data-target="#modal-add-media" href="{{ route('admin.page-medias.create', $model->id) }}" class="btn btn-sm btn-success">@lang('admin.actions.add')</a>
    </div>
@endcomponent
