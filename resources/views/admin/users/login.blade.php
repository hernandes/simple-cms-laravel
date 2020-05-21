@extends('admin.layouts.auth')

@section('content')
    <p class="login-box-msg">@lang('admin.auth.login.title')</p>

    @include('flash::message')

    <form action="{{ route('admin.login') }}" method="post">
        @csrf

        <div class="input-group mb-3">
            <input type="email" autofocus value="{{ old('email') }}" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="@lang('admin.auth.login.fields.email')">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="@lang('admin.auth.login.fields.password')">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">
                        @lang('admin.auth.login.fields.remember_me')
                    </label>
                </div>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">@lang('admin.auth.login.sign_in')</button>
            </div>
        </div>
    </form>
@endsection
