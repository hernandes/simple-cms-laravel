<div class="rev_slider_wrapper">
    <div class="rev_slider revslider" data-version="5.0">
        <ul>
            @foreach ($banners as $key => $banner)
                <li data-index="rs-{{ $key }}" data-transition="fade" data-slotamount="7" data-hideafterloop="0"
                    data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300"
                    data-thumb="{{ $banner->image_url }}" data-rotate="0" data-saveperformance="off" data-title="Banner {{ $key + 1 }}"
                    data-description="">

                    <img src="{{ $banner->image_url }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg"
                         data-bgparallax="10" data-no-retina>

                    @if ($banner->phrases)
                        @foreach ($banner->phrases as $index => $phrase)
                            <div class="tp-caption tp-caption-phrase"
                                id="rs-{{ $key }}-layer-{{ $index }}"
                                data-x="['right']"
                                data-hoffset="['30']"
                                data-y="['middle']"
                                data-voffset="['{{ -90 + ($index * 55) }}']"
                                data-fontsize="['{{ 64 - ($index * 10) }}']"
                                data-lineheight="auto"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"
                                data-transform_idle="o:1;s:500"
                                data-transform_in="y:100;scaleX:1;scaleY:1;opacity:0;"
                                data-transform_out="x:left(R);s:1000;e:Power3.easeIn;s:1000;e:Power3.easeIn;"
                                data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                                data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                                data-start="1000"
                                data-splitin="none"
                                data-splitout="none"
                                data-responsive_offset="on">
                                {{ $phrase }}
                            </div>
                        @endforeach
                    @endif

                    @if ($banner->url)
                        <div class="tp-caption" id="rs-{{ $key }}-layer-{{ $banner->phrases ? count($banner->phrases) : 0 }}"
                             data-x="['right']"
                             data-hoffset="['35']"
                             data-y="['middle']"
                             data-voffset="['{{ -90 + (($banner->phrases ? count($banner->phrases) : 0) * 80) }}']"
                             data-width="none"
                             data-height="none"
                             data-whitespace="nowrap"
                             data-transform_idle="o:1;"
                             data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                             data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                             data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
                             data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                             data-start="1400"
                             data-splitin="none"
                             data-splitout="none"
                             data-responsive_offset="on"
                             style="z-index:5;white-space: nowrap;letter-spacing:1px;">
                            <a class="btn btn-primary" href="{{ $banner->url }}">@lang('web.banner.read_more')</a>
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
