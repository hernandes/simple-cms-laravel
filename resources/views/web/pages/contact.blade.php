@extends('web.layouts.app')

@push('head')
    {!! Recaptcha::renderJs() !!}
@endpush

@section('content')
    @include('web.partials.simple-breadcrumb')

    <div class="container">
        <div class="page-container">
            <div class="page-title">
                <h1>{{ $page->title }}</h1>
            </div>

            @if ($page->body)
                <div class="page-content">{!! $page->body !!}</div>
            @endif

            @include('flash::message')

            @include('web.partials.form-contact')
        </div>
    </div>
@endsection
