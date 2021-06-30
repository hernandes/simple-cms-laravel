<?php

return [
    'auth' => [
        'login' => [
            'title' => 'Sign in to start your session',

            'fields' => [
                'email' => 'E-mail',
                'password' => 'Password',
                'remember_me' => 'Remember me'
            ],

            'sign_in' => 'Sign in',
            'forgot_password' => 'I forgot my password',

            'messages' => [
                'failed' => 'User and/or password are incorrect'
            ]
        ],

        'register' => [
            'title' => 'Register',

            'fields' => [
                'email' => 'E-mail'
            ]
        ],

        'password' => [
            'title' => 'Forgot password',

            'fields' => [
                'email' => 'E-mail'
            ],

            'send_mail' => 'Send Password Reset Link'
        ]
    ],

    'errors' => [
        '404' => [
            'title' => 'Page not found'
        ]
    ],

    'actions' => [
        'back' => 'Back',
        'continue' => 'Continue'
    ],

    'banner' => [
        'read_more' => 'Read more'
    ],

    'pages' => [
        'contact' => [
            'message_success' => '',

            'fields' => [
                'name' => 'Name',
                'email' => 'E-mail',
                'phone' => 'Phone',
                'message' => 'Message'
            ]
        ]
    ]
];
