<?php

return [
    'admin.menu.headers.components' => [[
        'title' => 'admin.menu.items.dashboard',
        'url' => '/',
        'icon' => 'fa-columns'
    ], [
        'title' => 'admin.menu.items.products.title',
        'url' => '',
        'icon' => 'fa-box-open',
        'role' => 'products',
        'module' => 'products',
        'children' => [[
            'title' => 'admin.menu.items.products.all',
            'role' => 'products',
            'url' => '/products'
        ], [
            'title' => 'admin.menu.items.products.categories',
            'role' => 'product-categories',
            'url' => '/product-categories'
        ]]
    ], [
        'title' => 'admin.menu.items.pages',
        'url' => '/pages',
        'role' => 'pages',
        'module' => 'pages',
        'icon' => 'fa-file-alt'
    ], [
        'title' => 'admin.menu.items.posts.title',
        'url' => '',
        'icon' => 'fa-bars',
        'role' => 'posts',
        'module' => 'posts',
        'children' => [[
            'title' => 'admin.menu.items.posts.all',
            'role' => 'posts',
            'url' => '/posts'
        ], [
            'title' => 'admin.menu.items.posts.categories',
            'role' => 'post-categories',
            'url' => '/post-categories'
        ]]
    ], [
        'title' => 'admin.menu.items.menus',
        'url' => '/menus',
        'role' => 'menus',
        'module' => 'menus',
        'icon' => 'fa-newspaper'
    ], [
        'title' => 'admin.menu.items.banners',
        'url' => '/banners',
        'role' => 'banners',
        'module' => 'banners',
        'icon' => 'fa-desktop'
    ], [
        'title' => 'admin.menu.items.faq',
        'url' => '/faqs',
        'role' => 'faqs',
        'module' => 'faqs',
        'icon' => 'fa-list'
    ], [
        'title' => 'admin.menu.items.partners',
        'url' => '/partners',
        'role' => 'partners',
        'module' => 'partners',
        'icon' => 'fa-handshake'
    ], [
        'title' => 'admin.menu.items.testimonials',
        'url' => '/testimonials',
        'role' => 'testimonials',
        'module' => 'testimonials',
        'icon' => 'fa-address-card'
    ], [
        'title' => 'admin.menu.items.modals',
        'url' => '/modals',
        'role' => 'modals',
        'module' => 'modals',
        'icon' => 'fa-desktop'
    ]],
    'admin.menu.headers.system' => [[
        'title' => 'admin.menu.items.users.title',
        'icon' => 'fa-users',
        'children' => [[
            'title' => 'admin.menu.items.users.all',
            'role' => 'users',
            'url' => '/users'
        ], [
            'title' => 'admin.menu.items.users.roles',
            'role' => 'roles',
            'url' => '/roles'
        ]]
    ], [
        'title' => 'admin.menu.items.emails.title',
        'icon' => 'fa-envelope',
        'module' => 'emails',
        'children' => [[
            'title' => 'admin.menu.items.emails.contacts',
            'role' => 'email-forms',
            'url' => '/email-forms'
        ], [
            'title' => 'admin.menu.items.emails.groups',
            'role' => 'email-groups',
            'url' => '/email-groups',
        ], [
            'title' => 'admin.menu.items.emails.recipients',
            'role' => 'email-recipients',
            'url' => '/email-recipients',
        ]]
    ], [
        'title' => 'admin.menu.items.logs',
        'role' => 'activities',
        'url' => '/activities',
        'module' => 'activities',
        'icon' => 'fa-history',
    ], [
        'title' => 'admin.menu.items.settings',
        'role' => 'settings',
        'url' => '/settings',
        'module' => 'settings',
        'icon' => 'fa-cogs',
    ]]
];
