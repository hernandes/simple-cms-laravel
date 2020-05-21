@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h1 class="m-0 text-dark">@lang('admin.actions.show') @lang('admin.modules.' . $willcard . '.singular')</h1>
                </div>

                <div class="col-6 d-flex justify-content-end">
                    <a data-ajax href="{{ route('admin.' . $willcard . '.index') }}" class="btn btn-default">@lang('admin.actions.list')</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label>@lang('admin.modules.' . $willcard . '.fields.name')</label>
                        <input readonly class="form-control-plaintext" value="{{ $model->name }}" />
                    </div>

                    <div class="form-group">
                        <label>@lang('admin.modules.' . $willcard . '.fields.email')</label>
                        <input readonly class="form-control-plaintext" value="{{ $model->email }}" />
                    </div>

                    <div class="form-group">
                        <label>@lang('admin.modules.' . $willcard . '.fields.ip')</label>
                        <input readonly class="form-control-plaintext" value="{{ $model->ip }}" />
                    </div>

                    <div class="form-group">
                        <label>@lang('admin.modules.' . $willcard . '.fields.group')</label>
                        <input readonly class="form-control-plaintext" value="{{ optional($model->group)->name }}" />
                    </div>

                    <div class="form-group">
                        <label>@lang('admin.modules.' . $willcard . '.fields.created_at')</label>
                        <input readonly class="form-control-plaintext" value="@datetime($model->created_at)" />
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-header">
                    <h4>@lang('admin.modules.' . $willcard . '.fields.email')</h4>
                </div>
                <div class="card-body">
                    {!! $content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
