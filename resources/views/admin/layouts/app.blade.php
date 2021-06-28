<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}" />

        <title>{{ env('APP_NAME') }} | @lang('admin.title')</title>

        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">

        <link rel="stylesheet" href="{{ asset('/vendor/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendor/adminlte/plugins/datatables/dataTables.bootstrap4.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendor/adminlte/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') }}">
        <script src="//cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/translations/{{ strtolower(app()->getLocale()) }}.js"></script>
        <link rel="stylesheet" href="{{ asset('/vendor/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendor/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendor/adminlte/plugins/bootstrap-toggle/css/bootstrap-toggle.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendor/adminlte/plugins/nprogress/nprogress.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendor/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendor/adminlte/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('/vendor/tagsinput/tagsinput.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/admin/app.css') }}" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>

    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
        <div id="app" class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    @if (config('app.translatable'))
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="flag-icon flag-icon-{{ strtolower(locale_to_code(app()->getLocale())) }}"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-0">
                                @foreach (config('translatable.locales') as $locale => $name)
                                    @if ($locale !== app()->getLocale())
                                        <a href="{{ route('admin.lang.switch', $locale) }}" class="dropdown-item{{ $locale === app()->getLocale() ? ' active' : '' }}">
                                            <i class="flag-icon flag-icon-{{ strtolower(locale_to_code($locale)) }} mr-2"></i> {{ $name }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                            {{ auth()->user()->name }}
                            <i class="fa fa-angle-down ml-2"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('admin.logout') }}" class="dropdown-item">
                                <i class="fa fa-sign-out-alt"></i> @lang('admin.header.logout')
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <aside class="main-sidebar sidebar-dark-primary">
                <a href="{{ route('admin.dashboard') }}" class="brand-link">
                    <img src="{{ asset('images/simple-logo.png') }}" alt="{{ env('APP_NAME') }}" class="brand-image img-circle" />
                    <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
                </a>

                <div class="sidebar">
                    <nav class="mt-2">
                        @navigation('admin', [
                            'class' => 'nav nav-pills nav-sidebar flex-column',
                            'data-widget' => 'treeview',
                            'role' => 'menu',
                            'data-accordion' => 'false'
                        ], [
                            'class' => 'nav nav-treeview'
                        ])
                    </nav>
                </div>
            </aside>

            <div class="content-wrapper">
                <div class="ajax-container">
                    @yield('content')
                </div>
            </div>

            <footer class="main-footer">
                <strong>Copyright &copy; {{ date('Y') }} <a href="{{ config('app.author_url') }}">{{ config('app.author') }}</a>.</strong> @lang('admin.footer.licensed_to') {{ env('APP_NAME') }}
            </footer>
        </div>

        <script>
            window.user = @json(auth()->user());
            window.default_locale = "{{ config('app.locale') }}";
            window.fallback_locale = "{{ config('app.fallback_locale') }}";
            window.messages = @json($messages);
        </script>

        <script src="{{ asset('/vendor/adminlte/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('/vendor/adminlte/plugins/moment/locale/' . strtolower(app()->getLocale()) . '.js') }}"></script>
        <script src="{{ asset('/vendor/adminlte/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('/vendor/adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('/vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/vendor/adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('/vendor/adminlte/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
        <script src="{{ asset('/vendor/adminlte/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('/vendor/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <script src="{{ asset('/vendor/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}} "></script>
        <script src="{{ asset('/vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('/vendor/adminlte/plugins/bootstrap-toggle/js/bootstrap-toggle.min.js') }}"></script>
        <script src="{{ asset('/vendor/adminlte/plugins/jquery.nestable.js') }}"></script>
        <script src="{{ asset('/vendor/adminlte/plugins/jquery.repeatable/jquery.repeatable.js') }}"></script>
        <script src="{{ asset('/vendor/adminlte/plugins/jquery.pjax.js') }}"></script>
        <script src="{{ asset('/vendor/adminlte/plugins/langjs/lang.min.js') }}"></script>
        <script src="{{ asset('/vendor/adminlte/plugins/maskmoney/jquery.maskMoney.min.js') }}"></script>
        <script src="{{ asset('/vendor/tagsinput/tagsinput.js') }}"></script>

        <script src="{{ asset('/js/admin/helpers.js') }}"></script>
        <script src="{{ asset('/js/admin/app.js') }}"></script>
    </body>
</html>
