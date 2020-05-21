@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0 text-dark">@lang('admin.modules.' . $willcard . '.title')</h1>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid pb-3">
            @include('flash::message')

            @if ($forms->isEmpty())
                @include('admin.components.helpers.no-records')
            @else
                <div class="card">
                    <div class="card-body p-0">
                        <table class="datatable table table-hover table-striped table-md">
                            <thead>
                                <tr>
                                    <th>@lang('admin.modules.' . $willcard . '.fields.name')</th>
                                    <th class="desktop">@lang('admin.modules.' . $willcard . '.fields.email')</th>
                                    <th class="desktop">@lang('admin.modules.' . $willcard . '.fields.ip')</th>
                                    <th class="desktop">@lang('admin.modules.' . $willcard . '.fields.group')</th>
                                    <th class="desktop">@lang('admin.modules.' . $willcard . '.fields.created_at')</th>
                                    <th data-orderable="false" class="all" width="10"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($forms as $record)
                                    <tr>
                                        <td>{{ $record->name }}</td>
                                        <td>{{ $record->email }}</td>
                                        <td>{{ $record->ip }}</td>
                                        <td>{{ optional($record->group)->name }}</td>
                                        <td>@datetime($record->created_at)</td>
                                        <td class="actions">
                                            @permission('show email-form')
                                                <a data-ajax href="{{ route('admin.' . $willcard . '.show', $record->id) }}" class="btn btn-sm btn-default">@lang('admin.actions.show')</a>
                                            @endpermission
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
