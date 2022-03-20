@if ($page->count())
    <div class="businesses-container">
        <div class="container">
            <h2>{{ $page->title }}</h2>
            <div class="businesses owl-carousel" data-items="4" data-nav="true">
                @foreach ($pages as $p)
                    <div class="business">
                        <div class="business__image">
                            <img src="{{ optional($p->media('icon'))->file_url }}" class="img-fluid" />
                        </div>

                        <div class="business__text">
                            <div class="business__title">
                                {{ $p->title }}
                            </div>

                            <a href="{{ url($p->slug) }}" class="business__more">Ver mais +</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
