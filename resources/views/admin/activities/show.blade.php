@extends('admin.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <h1 class="m-0 text-dark">@lang('admin.modules.' . $willcard . '.singular')</h1>
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
                <div class="card-body pb-2 px-0">
                    <ul class="timeline timeline-inverse mb-0">
                        @foreach ($activities as $activity)
                            <li>
                                <i class="fas fa-{{ $activity->icon }} bg-{{ $activity->color }}"></i>

                                <div class="timeline-item">
                                    <span class="time">@datetime($activity->created_at)</span>

                                    <h3 class="timeline-header border-0">
                                        @lang('admin.words.' . $activity->description)
                                        {{ $activity->subject_type }} ({{ $activity->subject_id }})

                                        @lang('admin.words.by')

                                        @if ($activity->causer)
                                            <a data-ajax href="{{ route('admin.users.edit', $activity->causer->id) }}">{{ $activity->causer->name }}</a>
                                        @else
                                            System
                                        @endif
                                    </h3>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
