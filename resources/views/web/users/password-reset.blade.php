@extends('web.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ trans('Reset Password') }}</div>

                    <div class="card-body">
                        <form action="{{ route('web.password.reset.perform') }}" method="post">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}" />

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input class="form-control form-control-solid placeholder-no-fix" id="email" placeholder="E-Mail" name="email" />

                                @if ($errors->has('email'))
                                    <span class="help-block help-block-error">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" class="form-control" id="password" placeholder="Nova senha" name="password" />

                                @if ($errors->has('password'))
                                    <span class="help-block help-block-error">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" id="password-confirmation" placeholder="Confirmação senha" name="password_confirmation" />
                            </div>

                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-site">Alterar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
