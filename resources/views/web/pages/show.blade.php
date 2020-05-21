@extends('web.layouts.app')

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

            @if ($blocks)
                <div class="page-blocks">
                    @php $index = 0; @endphp
                    @foreach ($blocks as $block)
                        <div class="page-block">
                            <h3>{{ $block->title }}</h3>

                            @if ($block->image)
                                @php $index++; @endphp
                                <div class="row{{ $index % 2 === 0 ? ' row-reverse' : '' }}">
                                    <div class="col-md-6">
                                        <img class="img-fluid" src="{{ $block->image_url }}" />
                                    </div>

                                    <div class="col-md-6">
                                        <div class="page-block-content">
                                            {!! $block->body !!}
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="page-block-content">
                                            {!! $block->body !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
