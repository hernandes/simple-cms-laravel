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

            @if ($settings->isEmpty())
                @include('admin.components.helpers.no-records')
            @else
                <div class="card">
                    <div class="card-body p-0">
                        <table class="datatable table table-hover table-striped table-md">
                            <thead>
                                <tr>
                                    <th width="250">@lang('admin.modules.' . $willcard . '.fields.key')</th>
                                    <th class="desktop">@lang('admin.modules.' . $willcard . '.fields.value')</th>
                                    <th class="all" data-orderable="false" width="10"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($settings as $record)
                                    <tr>
                                        <td>{{ $record->key }}</td>
                                        <td>{{ $record->value }}</td>
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
            @endif
        </div>
    </div>
@endsection
