<?php
namespace App\Providers;

use App\Support\Validator;
use Illuminate\Support\ServiceProvider;

class BrValidatorServiceProvider extends ServiceProvider
{

    protected $defer = false;

    public function boot()
    {
        $me = $this;

        $this->app['validator']->resolver(function ($translator, $data, $rules, $messages, $customAttributes) use($me)  {
            $messages += $me->getMessages();
            return new Validator($translator, $data, $rules, $messages, $customAttributes);
        });
    }

    protected function getMessages()
    {
        return [
            'cellphone' => 'O campo :attribute não é um celular válido',
            'cellphone_ddd' => 'O campo :attribute não é um celular com DDD válido',
            'cnh' => 'O campo :attribute não é uma carteira nacional de habilitação válida',
            'cnpj' => 'O campo :attribute não é um CNPJ válido',
            'cpf' => 'O campo :attribute não é um CPF válido',
            'date' => 'O campo :attribute não é uma data com formato válido',
            'cnpj_format' => 'O campo :attribute não possui o formato válido de CNPJ',
            'cpf_format' => 'O campo :attribute não possui o formato válido de CPF',
            'phone' => 'O campo :attribute não é um telefone válido',
            'phone_ddd' => 'O campo :attribute não é um telefone com DDD válido',
            'cep_format' => 'O campo :attribute não possui um formato válido de CEP'
        ];
    }

    public function provides()
    {
        return array();
    }

}
