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

            @if ($partners->isEmpty())
                @include('admin.components.helpers.no-records')
            @else
                <div class="card">
                    <div class="card-body p-0">
                        <table data-table-sortable data-url="{{ route('admin.' . $willcard . '.reorder') }}" class="table table-hover table-striped table-md">
                            <thead>
                                <tr>
                                    <th width="10"></th>
                                    <th width="100">@lang('admin.modules.' . $willcard . '.fields.logo')</th>
                                    <th>@lang('admin.modules.' . $willcard . '.fields.name')</th>
                                    <th data-orderable="false" width="10"></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($partners as $record)
                                    <tr id="order_{{ $record->id  }}" class="{{ $record->active ? '' : 'bg-inactive' }}">
                                        <td>
                                            <i class="fa fa-bars draggable"></i>
                                        </td>
                                        <td><img src="{{ $record->logo_url  }}" style="max-width:70px" /></td>
                                        <td>{{ $record->name }}</td>
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
