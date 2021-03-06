@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h1 class="m-0 text-dark">@lang('admin.actions.edit') @lang('admin.modules.' . $willcard . '.singular')</h1>
                </div>

                <div class="col-6 d-flex justify-content-end">
                    <a data-ajax href="{{ route('admin.' . $willcard . '.index') }}" class="btn btn-default">@lang('admin.actions.list')</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid pb-3">
            @include('flash::message')

            <div class="card">
                <form data-ajax action="{{ route('admin.' . $willcard . '.update', $menu->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="card-body px-2 py-0">
                        @include('admin.' . $willcard . '.form')
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success offset-md-3">@lang('admin.actions.save')</button>
                        <a data-ajax href="{{ route('admin.' . $willcard . '.index') }}" class="btn btn-link">@lang('admin.actions.cancel')</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
