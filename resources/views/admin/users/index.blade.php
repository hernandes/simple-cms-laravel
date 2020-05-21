@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h1 class="m-0 text-dark">@lang('admin.modules.' . $willcard . '.title')</h1>
                </div>

                <div class="col-6 d-flex justify-content-end">
                    @include('admin.components.links.add')
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
                                <th data-orderable="false" width="10"></th>
                                <th>@lang('admin.modules.' . $willcard . '.fields.name')</th>
                                <th class="desktop" class="text-center" width="150">@lang('admin.modules.' . $willcard . '.fields.super_user')</th>
                                <th class="desktop" class="text-center" width="160">@lang('admin.modules.' . $willcard . '.fields.updated_at')</th>
                                <th class="all" data-orderable="false" width="10"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $record)
                                <tr class="{{ $record->active ? '' : 'bg-inactive' }}">
                                    <td><img src="{{ $record->avatar_url }}" width="40" height="40" class="img-circle" /></td>
                                    <td>
                                        <strong>{{ $record->name }}</strong><br />
                                        {{ $record->email }}
                                    </td>
                                    <td class="text-center">@flag($record->super_user)</td>
                                    <td class="text-center">@datetime($record->created_at)</td>
                                    <td class="actions">
                                        @include('admin.components.links.edit')
                                        @include('admin.components.links.destroy')
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
