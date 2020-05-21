@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">@lang('admin.modules.' . $willcard . '.title')</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid pb-3">
            @include('flash::message')

            <div class="card">
                <div class="card-body p-0">
                    <table class="datatable table table-hover table-striped table-md">
                        <thead>
                            <tr>
                                <th class="desktop">@lang('admin.modules.activities.fields.causer')</th>
                                <th>@lang('admin.modules.activities.fields.subject')</th>
                                <th class="desktop">@lang('admin.modules.activities.fields.description')</th>
                                <th class="desktop">@lang('admin.modules.activities.fields.created_at')</th>
                                <th data-orderable="false" class="all" width="10"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($activities as $record)
                                <tr>
                                    <td>{{ $record->causer ? $record->causer->name : 'System' }}</td>
                                    <td>{{ $record->subject_type }} ({{ $record->subject_id }})</td>
                                    <td>@lang('admin.words.' . $record->description)</td>
                                    <td>@datetime($record->created_at)</td>
                                    <td class="actions">
                                        @permission('show activity')
                                            <a data-ajax href="{{ route('admin.' . $willcard . '.show', $record->id) }}" class="btn btn-sm btn-default">@lang('admin.actions.show')</a>
                                        @endpermission
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
