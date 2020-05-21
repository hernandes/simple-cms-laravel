<?php

return [

    'activities' => [
        'active' => true,
        'controllers' => [
            'ActivitiesController'
        ]
    ],

    'banners' => [
        'active' => true,
        'controllers' => [
            'BannersController'
        ]
    ],

    'emails' => [
        'active' => true,
        'controllers' => [
            'EmailFormsController',
            'EmailGroupsController',
            'EmailRecipientsController'
        ]
    ],

    'menus' => [
        'active' => true,
        'controllers' => [
            'MenusController'
        ]
    ],

    'pages' => [
        'active' => true,
        'controllers' => [
            'PagesController',
            'PagesBlocksController',
            'PagesMediasController'
        ],
        'config' => [
            'with_featured' => true
        ]
    ],

    'posts' => [
        'active' => true,
        'controllers' => [
            'PostsController',
            'PostsCategoriesController'
        ],
        'config' => [
            'with_categories' => true,
            'with_comments' => true,
            'with_tags' => true
        ]
    ],

    'settings' => [
        'active' => true,
        'controllers' => [
            'SettingsController'
        ]
    ],

    'partners' => [
        'active' => true,
        'controllers' => [
            'PartnersController'
        ]
    ],

    'testimonials' => [
        'active' => true,
        'controllers' => [
            'TestimonialsController'
        ]
    ],

    'modals' => [
        'active' => true,
        'controllers' => [
            'ModalsController'
        ]
    ],

    'products' => [
        'active' => true,
        'controllers' => [
            'ProductsController',
            'ProductCategoriesController'
        ],
        'config' => [
            'with_categories' => true,
            'with_price' => true,
            'with_stock' => true,
            'with_delivery' => true,
            'with_options' => true,
            'with_tags' => true
        ]
    ],

    'faqs' => [
        'active' => true,
        'controllers' => [
            'FaqController'
        ]
    ]

];
