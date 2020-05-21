<?php

return [
    'meta' => [
        'defaults'       => [
            'title'        => env('SEO.TITLE', env('APP_NAME')),
            'titleBefore'  => false,
            'description'  => env('SEO.DESCRIPTION'),
            'separator'    => ' - ',
            'keywords'     => explode(',', env('SEO.KEYWORDS', '')),
            'canonical'    => null, // Set null for using Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],

        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],
    ],
    'opengraph' => [
        'defaults' => [
            'title'       => env('SEO.TITLE', env('APP_NAME')),
            'description' => env('SEO.DESCRIPTION'),
            'url'         => false,
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        'defaults' => [
            'title'       => env('SEO.TITLE', env('APP_NAME')),
            'description' => explode(',', env('SEO.KEYWORDS', '')),
            'url'         => false,
            'type'        => 'WebPage',
            'images'      => [],
        ],
    ],
];
