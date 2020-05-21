@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <h1 class="m-0 text-dark">@lang('admin.modules.menus.title')</h1>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid pb-3">
            @include('flash::message')

            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <div class="card">
                        <form data-ajax action="{{ route('admin.menus.store') }}" class="form-sm" method="post">
                            @csrf
                            <div class="card-header">
                                <h4 style="margin-bottom:0">@lang('admin.actions.add')</h4>
                            </div>
                            <div class="card-body">
                                @include('admin.components.form.text', [
                                    'model' => $menu,
                                    'name' => 'title',
                                    'small' => true,
                                    'required' => true,
                                    'label' => 'title',
                                    'autofocus' => true
                                ])

                                @include('admin.components.form.switch', [
                                    'model' => $menu,
                                    'name' => 'active',
                                    'small' => true,
                                    'checked' => true,
                                    'label' => 'active'
                                ])

                                @include('admin.components.form.select', [
                                    'model' => $menu,
                                    'options' => $parents,
                                    'small' => true,
                                    'comparableKey' => 'parent_id',
                                    'name' => 'parent_id',
                                    'label' => 'parent',
                                ])

                                @include('admin.components.form.text', [
                                    'model' => $menu,
                                    'small' => true,
                                    'name' => 'url',
                                    'label' => 'url'
                                ])

                                @module('pages')
                                    @include('admin.components.form.select', [
                                        'model' => $menu,
                                        'small' => true,
                                        'options' => $pages,
                                        'name' => 'page_id',
                                        'label' => 'page',
                                    ])
                                @endmodule

                                @module('posts')
                                    @include('admin.components.form.select', [
                                        'model' => $menu,
                                        'small' => true,
                                        'options' => $posts,
                                        'name' => 'post_id',
                                        'label' => 'post',
                                    ])
                                @endmodule
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">@lang('admin.actions.save')</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-8 col-lg-9">
                    @if ($menus->isEmpty())
                        @include('admin.components.helpers.no-records')
                    @else
                        <div class="card p-2">
                            <div class="card-body p-0">
                                {!! nestable($menus, [
                                    'empty_message' => trans('datatable.empty_table')
                                ]) !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
