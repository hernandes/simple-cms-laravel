@extends('web.layouts.app')

@section('content')
    <div class="container">
        <div class="page-container">
            <div class="page-title">
                <h1>@lang('web.auth.password.title')</h1>
            </div>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="forgot-password">
                <form method="POST" action="{{ route('web.password.email') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email">@lang('web.auth.password.fields.email') <span class="required">*</span></label>

                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            @lang('web.auth.password.send_mail')
                        </button>

                        <a class="btn btn-link" href="{{ route('web.login') }}">
                            @lang('web.actions.back')
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
