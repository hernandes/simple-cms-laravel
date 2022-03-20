@if ($page->count())
    <div class="posts-container">
        <div class="container">
            <h2>{{ $page->title }}</h2>
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

            <div class="text-right mt-4">
                <a href="{{ url('noticias') }}" class="btn btn-primary">Ver todas</a>
            </div>
        </div>
    </div>
@endif
