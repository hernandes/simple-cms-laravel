@extends('web.layouts.app')

@section('content')
    @include('web.partials.simple-breadcrumb')

    <div class="container">
        <div class="page-container">
            <div class="page-title">
                <h1>{{ $page->title }}</h1>
            </div>

            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-md-4">
                        <div class="post">
                            <div class="post__image">
                                <img src="{{ $post->image_url }}" class="img-fluid" />
                            </div>

                            <div class="post__container">
                                <div class="post__title">
                                    {{ $post->title }}
                                </div>

                                <div class="post__body">
                                    {!! Str::limit($post->body) !!}
                                </div>

                                <div class="text-right">
                                    <a href="{{ url('noticia/' . $post->slug) }}" class="btn btn-primary btn-sm">Ler mais</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
