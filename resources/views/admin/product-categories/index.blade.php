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

            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <div class="card">
                        <form data-ajax action="{{ route('admin.' . $willcard . '.store') }}" class="form-sm" method="post">
                            @csrf
                            <div class="card-header">
                                <h4 style="margin-bottom:0">@lang('admin.actions.add')</h4>
                            </div>
                            <div class="card-body">
                                @include('admin.components.form.text', [
                                    'model' => $model,
                                    'name' => 'name',
                                    'small' => true,
                                    'required' => true,
                                    'label' => 'name',
                                    'autofocus' => true
                                ])

                                @include('admin.components.form.switch', [
                                    'model' => $model,
                                    'name' => 'active',
                                    'small' => true,
                                    'checked' => true,
                                    'label' => 'active'
                                ])

                                @include('admin.components.form.switch', [
                                    'model' => $model,
                                    'name' => 'featured',
                                    'small' => true,
                                    'label' => 'featured'
                                ])

                                @include('admin.components.form.select', [
                                    'model' => $model,
                                    'options' => $parents,
                                    'small' => true,
                                    'comparableKey' => 'parent_id',
                                    'name' => 'parent_id',
                                    'label' => 'parent',
                                ])
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">@lang('admin.actions.save')</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-8 col-lg-9">
                    @if ($categories->isEmpty())
                        @include('admin.components.helpers.no-records')
                    @else
                        <div class="card p-2">
                            <div class="card-body p-0">
                                {!! nestable($categories, [
                                    'empty_message' => trans('datatable.empty_table'),
                                    'key' => 'name',
                                    'route' => 'product-categories'
                                ]) !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
