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

            <div class="row">
                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13851.878143753438!2d-51.1484204!3d-29.7785224!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x835c47d8f6385c2f!2sPRD!5e0!3m2!1spt-BR!2sbr!4v1635786320486!5m2!1spt-BR!2sbr" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>

                <div class="col-md-6">
                    @include('web.partials.form-contact')
                </div>
            </div>
        </div>
    </div>
@endsection
