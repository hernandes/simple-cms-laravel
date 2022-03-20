@extends('web.layouts.app')

@section('content')
    <div class="breadcrumb-container">
        <div class="container">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('noticias') }}">{{ $page->title }}</a></li>
                    <li class="breadcrumb-item active">{{ $post->title }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="page-container">
            <div class="page-title">
                <h1>{{ $post->title }}</h1>
            </div>

            <div class="page-content">
                <img src="{{ $post->image_url }}" style="float:left;max-width:450px;margin-right:10px;margin-bottom:10px;" class="img-fluid" />
                {!! $post->body !!}
            </div>
        </div>
    </div>
@endsection
