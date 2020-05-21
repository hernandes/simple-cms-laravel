@component('mail::message')
# Formulário pelo site {!! config('app.name') !!}
## Enviado por

### Nome: {!! $name !!}
### Email: {!! $email !!}
### Telefone: {!! $phone !!}

@component('mail::panel')
    {!! $message !!}
@endcomponent
{{ config('app.name') }}
@endcomponent
