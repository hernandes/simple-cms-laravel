@if ($page->count())
    <div class="info-container">
        <div class="container">
            <h2>{{ $page->title }}</h2>
            <div class="infos">
                @foreach ($page->blocks as $block)
                    <div class="info">
                        <div class="info__intro">
                            <span class="primary">+</span>de
                        </div>
                        <div class="info__detail">
                            <p class="primary"> {{ $block->subtitle }}</p>
                            <p class="secondary"> {{ $block->title }} </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
