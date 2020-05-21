<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        {!! SEO::generate(true) !!}
        <meta name="author" content="Medialine">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="{{ asset('vendor/revslider/css/settings.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/revslider/css/layers.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/revslider/css/navigation.css') }}" />

        <link rel="stylesheet" href="{{ asset('vendor/owlcarousel/assets/owl.carousel.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('vendor/owlcarousel/assets/owl.theme.default.min.css') }}" />

        <link rel="stylesheet" href="{{ asset('vendor/lightcase/css/lightcase.css') }}" />

        <link rel="stylesheet" href="{{ asset('css/web/app.css') }}" />

        @stack('head')
    </head>

    <body>
        @include('web.partials.modal')

        <div class="wrapper">
            <header>
                <div class="top">
                    <div class="container">
                        @auth('web')
                            {{ auth('web')->user()->name }} (<a href="{{ route('web.logout') }}">Sair</a>)
                        @else
                            <a href="{{ route('web.login') }}">Entrar</a>
                        @endauth
                    </div>
                </div>

                <div class="menu" id="header">
                    <div class="container">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{ route('web.home') }}">
                                <img src="{{ asset('images/logo.png') }}" width="100" />
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="slide-collapse" data-target="#navbar" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon hamburger hamburger--collapse">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </span>
                            </button>

                            <div class="collapse navbar-collapse justify-content-end" id="navbar">
                                @navigation('main', [
                                    'class' => 'navbar-nav'
                                ], [
                                    'class' => 'dropdown-menu'
                                ])
                            </div>
                        </nav>
                    </div>
                </div>
            </header>

            <section class="main">
                @yield('content')
            </section>

            <footer>
                <div class="copyright text-center">
                    Site por <a target="_blank" href="http://medialine.com.br">Medialine</a>
                </div>
            </footer>
        </div>

        @if (config()->has('settings.analytics'))
            <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('settings.analytics') }}"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                @foreach (explode(',', config('settings.analytics')) as $tag)
                    gtag('config', '{{ $tag }}');
                @endforeach
            </script>
        @endif

        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script src="{{ asset('vendor/revslider/js/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('vendor/revslider/js/jquery.themepunch.revolution.min.js') }}"></script>
        <script src="{{ asset('vendor/revslider/js/extensions/revolution.extension.actions.min.js') }}"></script>
        <script src="{{ asset('vendor/revslider/js/extensions/revolution.extension.carousel.min.js') }}"></script>
        <script src="{{ asset('vendor/revslider/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
        <script src="{{ asset('vendor/revslider/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
        <script src="{{ asset('vendor/revslider/js/extensions/revolution.extension.migration.min.js') }}"></script>
        <script src="{{ asset('vendor/revslider/js/extensions/revolution.extension.navigation.min.js') }}"></script>
        <script src="{{ asset('vendor/revslider/js/extensions/revolution.extension.parallax.min.js') }}"></script>
        <script src="{{ asset('vendor/revslider/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
        <script src="{{ asset('vendor/revslider/js/extensions/revolution.extension.video.min.js') }}"></script>

        <script src="{{ asset('vendor/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('vendor/lightcase/js/lightcase.js') }}"></script>
        <script src="{{ asset('vendor/maskinput/jquery.mask.min.js') }}"></script>

        <script src="{{ asset('js/web/defaults.js') }}"></script>
    </body>
</html>
