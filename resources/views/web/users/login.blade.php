@extends('web.layouts.app')

@section('content')
    <div class="container">
        <div class="page-container">
            <div class="page-title">
                <h1>Title</h1>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="login">
                        <h4>@lang('web.auth.login.title')</h4>

                        <form method="POST" action="{{ route('web.login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="email">@lang('web.auth.login.fields.email')</label>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="password">@lang('web.auth.login.fields.password')</label>

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    @lang('web.auth.login.sign_in')
                                </button>

                                <a class="btn btn-link" href="{{ route('web.password') }}">
                                    @lang('web.auth.login.forgot_password')
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="register">
                        <h4>@lang('web.auth.register.title')</h4>

                        <form method="POST" action="{{ route('web.login') }}">
                            @csrf

                            <div class="form-group">
                                <label for="register-email">@lang('web.auth.register.fields.email')</label>

                                <input id="register-email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    @lang('web.actions.continue')
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
