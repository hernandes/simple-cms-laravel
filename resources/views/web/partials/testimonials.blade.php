@if ($testimonials->count())
    <div class="container my-5">
        <h2>Depoimentos</h2>
        <div class="testimonials">
            @foreach ($testimonials as $testimonial)
                <div class="testimonial">
                    <div class="testimonial__image">
                        <img src="{{ $testimonial->image_url }}" class="img-fluid" />
                    </div>

                    <div class="testimonial__name">
                        {{ $testimonial->name }}
                    </div>

                    <div class="testimonial__body">
                        {!! $testimonial->body !!}
                    </div>

                    <svg preserveAspectRatio="xMidYMid meet" data-bbox="0 19.7 200 161.209" xmlns="http://www.w3.org/2000/svg" viewBox="0 19.7 200 161.209" role="presentation" aria-hidden="true">
                        <g>
                            <path d="M78.2 19.8L85.7 33c.8 1.4 1.7 2.9 2.7 4.5-3.9 2.3-7.7 4.7-11.5 6.9-12.7 7.3-24.2 16.2-33.4 27.8-8.9 11.2-13 24.1-14.3 38.5 4.4 0 8.6-.4 12.8.1 6.8.7 13.9 1.1 20.3 3.3 13.1 4.4 19.5 14.3 20.7 27.9.6 7.4-.5 14.4-4.2 20.9-7.8 13.6-20.5 19.7-37.3 17.5-21.8-2.6-33.5-13.5-38.7-36.3-1.2-5.3-1.9-10.7-2.8-16v-15.4c.2-.6.5-1.2.6-1.9 1-10 4-19.3 8.8-28.1 11.1-20.4 27-36.3 46.3-48.9 7.2-4.7 14.5-9.4 21.8-14.1.2.1.4.1.7.1z"></path>
                            <path d="M189.4 19.8c3.5 5.8 6.9 11.6 10.6 17.8-1.7 1-3.4 2.1-5.1 3-13.4 7.8-26.3 16.1-36.8 27.9-10.7 12-15.9 26-17.4 42.3 1.4 0 2.8-.1 4.2 0 8.3.6 16.8.2 24.8 2.1 18.9 4.4 26.1 18.9 24.8 36.6-1.3 16.9-15.3 30.5-31.9 31.3-12.2.6-23.9-1.1-33.5-9.5-8.7-7.6-12.6-17.9-15.1-28.8-7.2-32.2 2.1-59.7 23.9-83.6 11-12 23.8-21.8 37.6-30.3 4.5-2.8 8.8-5.8 13.3-8.8h.6z"></path>
                        </g>
                    </svg>
                </div>
            @endforeach
        </div>
    </div>
@endif
