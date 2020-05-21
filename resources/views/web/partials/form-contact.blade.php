@error('g-recaptcha-response')
    <div class="alert alert-danger">{{ $errors->first('g-recaptcha-response') }}</div>
@enderror

<form action="{{ route('web.contact.send') }}" method="post">
    @csrf

    {!! Recaptcha::field('contact') !!}

    <div class="form-group">
        <label for="name">@lang('web.pages.contact.fields.name')</label>
        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" name="name" />

        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
    </div>

    <div class="form-group">
        <label for="email">@lang('web.pages.contact.fields.email')</label>
        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" name="email" />

        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
    </div>

    <div class="form-group">
        <label for="phone">@lang('web.pages.contact.fields.phone')</label>
        <input data-mask-phone class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" name="phone" />

        <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
    </div>

    <div class="form-group">
        <label for="message">@lang('web.pages.contact.fields.message')</label>
        <textarea class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message">{{ old('message') }}</textarea>

        <div class="invalid-feedback">{{ $errors->first('message') }}</div>
    </div>


    <button type="submit" class="btn btn-success">Enviar</button>
</form>

