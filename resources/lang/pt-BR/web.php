<?php

return [
    'auth' => [
        'login' => [
            'title' => 'Entre para iniciar sua sessão',

            'fields' => [
                'email' => 'E-mail',
                'password' => 'Senha',
                'remember_me' => 'Lembrar minha senha'
            ],

            'sign_in' => 'Entrar',
            'forgot_password' => 'Esqueci minha senha?',

            'messages' => [
                'failed' => 'Usuário e/ou senha estão incorretos'
            ]
        ]
    ],

    'errors' => [
        '404' => [
            'title' => 'Página não encontrada!'
        ]
    ],

    'actions' => [
        'back' => 'Voltar'
    ],

    'banner' => [
        'read_more' => 'Saiba mais'
    ],

    'pages' => [
        'contact' => [
            'message_success' => 'Contato enviado com sucesso!',

            'fields' => [
                'name' => 'Nome',
                'email' => 'E-mail',
                'phone' => 'Telefone',
                'message' => 'Mensagem'
            ]
        ]
    ],
];
