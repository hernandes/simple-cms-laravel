<?php

return [
    'locale' => [
        'date' => 'd/m/Y',
        'datetime' => 'd/m/Y H:i'
    ],

    'title' => 'Administration',

    'header' => [
        'logout' => 'Sing out',
    ],

    'footer' => [
        'licensed_to' => 'Licensed to'
    ],

    'menu' => [
        'headers' => [
            'components' => 'Components',
            'system' => 'System'
        ],

        'items' => [
            'dashboard' => 'Dashboard',
            'products' => [
                'title' => 'Products',
                'all' => 'All Products',
                'categories' => 'Categories'
            ],
            'posts' => [
                'title' => 'Posts',
                'all' => 'All Posts',
                'categories' => 'Categories'
            ],
            'pages' => 'Pages',
            'menus' => 'Menus',
            'banners' => 'Banners',
            'faq' => 'FAQ',
            'partners' => 'Partners',
            'testimonials' => 'Testimonials',
            'modals' => 'Modals',
            'users' => [
                'title' => 'Users',
                'all' => 'All Users',
                'roles' => 'Roles'
            ],
            'emails' => [
                'title' => 'E-mails',
                'contacts' => 'Contacts',
                'groups' => 'Groups',
                'recipients' => 'Recipients'
            ],
            'logs' => 'Activities',
            'settings' => 'Settings'
        ]
    ],

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
        ]
    ],

    'words' => [
        'yes' => 'Yes',
        'no' => 'No',
        'by' => 'By',
        'deleted' => 'Deleted',
        'created' => 'Created',
        'updated' => 'Updated',
        'image' => 'Image',
        'video' => 'Video'
    ],

    'actions' => [
        'add' => 'Add New',
        'new' => 'New',
        'show' => 'Show',
        'edit' => 'Edit',
        'list' => 'List',
        'save' => 'Save',
        'cancel' => 'Cancel'
    ],

    'messages' => [
        'confirm_delete' => 'Are you sure to delete this record?'
    ],

    'modules' => [
        'users' => [
            'title' => 'Users',
            'singular' => 'User',

            'fields' => [
                'name' => 'Name',
                'active' => 'Active',
                'email' => 'E-mail',
                'password' => 'Password',
                'super_user' => 'Super user',
                'updated_at' => 'Updated at',
                'avatar' => 'Avatar'
            ],

            'sections' => [
                'user' => [
                    'title' => 'User',
                    'description' => ''
                ],
                'groups' => [
                    'title' => 'Groups',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => '',
                'success_update' => '',
                'success_destroy' => ''
            ]
        ],

        'pages' => [
            'title' => 'Pages',
            'singular' => 'Page',

            'fields' => [
                'title' => 'Title',
                'active' => 'Active',
                'slug' => 'URL',
                'body' => 'Body',
                'key' => 'Key',
                'featured' => 'Featured',
                'seo_title' => 'Title',
                'seo_keywords' => 'Keywords',
                'seo_description' => 'Description'
            ],

            'sections' => [
                'page' => [
                    'title' => 'Page',
                    'description' => ''
                ],
                'blocks' => [
                    'title' => 'Blocks',
                    'description' => ''
                ],
                'medias' => [
                    'title' => 'Medias',
                    'description' => ''
                ],
                'seo' => [
                    'title' => 'SEO',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => '',
                'success_update' => '',
                'success_destroy' => ''
            ]
        ],

        'page-blocks' => [
            'title' => 'Blocks',
            'singular' => 'Block',

            'fields' => [
                'title' => 'Title',
                'body' => 'Body',
                'key' => 'Key',
                'active' => 'Active',
                'image' => 'Image'
            ],

            'messages' => [
                'success_create' => '',
                'success_update' => '',
                'success_destroy' => '',
                'success_order' => ''
            ]
        ],

        'page-medias' => [
            'title' => 'Medias',
            'singular' => 'Media',

            'fields' => [
                'title' => 'Title',
                'alt' => 'Alt',
                'description' => 'Description',
                'image' => 'Image',
                'key' => 'Key',
                'active' => 'Active',
                'video_url' => 'Video URL',
                'type' => 'Type'
            ],

            'messages' => [
                'success_create' => '',
                'success_update' => '',
                'success_destroy' => '',
                'success_order' => ''
            ]
        ],

        'posts' => [
            'title' => 'Posts',
            'singular' => 'Post',

            'fields' => [
                'title' => 'Title',
                'active' => 'Active',
                'slug' => 'URL',
                'image' => 'Cover Image',
                'body' => 'Body',
                'published_at' => 'Published at'
            ],

            'sections' => [
                'post' => [
                    'title' => 'Post',
                    'description' => ''
                ],

                'categories' => [
                    'title' => 'Categories',
                    'description' => ''
                ],

                'body' => [
                    'title' => 'Body',
                    'description' => ''
                ],

                'tags' => [
                    'title' => 'Tags',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => '',
                'success_update' => '',
                'success_destroy' => ''
            ]
        ],

        'post-categories' => [
            'title' => 'Post Categories',
            'singular' => 'Post Category',

            'fields' => [
                'name' => 'Name',
                'active' => 'Active',
                'slug' => 'URL'
            ],

            'sections' => [
                'category' => [
                    'title' => 'Post Category',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => '',
                'success_update' => '',
                'success_destroy' => '',
                'success_order' => ''
            ]
        ],

        'menus' => [
            'title' => 'Menus',
            'singular' => 'Menu',

            'fields' => [
                'title' => 'Title',
                'active' => 'Active',
                'url' => 'URL',
                'parent' => 'Parent Menu',
                'page' => 'Page',
                'post' => 'Post'
            ],

            'sections' => [
                'menu' => [
                    'title' => 'Menu',
                    'description' => ''
                ],
                'url' => [
                    'title' => 'URL',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => '',
                'success_update' => '',
                'success_destroy' => ''
            ]
        ],

        'settings' => [
            'title' => 'Settings',
            'singular' => 'Setting',

            'fields' => [
                'key' => 'Key',
                'value' => 'Value',
                'description' => 'Description',
                'type' => 'Type'
            ],

            'sections' => [
                'setting' => [
                    'title' => 'Setting',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => '',
                'success_update' => '',
                'success_destroy' => ''
            ]
        ],

        'email-groups' => [
            'title' => 'Email Groups',
            'singular' => 'Email Group',

            'fields' => [
                'key' => 'Key',
                'subject' => 'Subject'
            ],

            'sections' => [
                'group' => [
                    'title' => 'Group',
                    'description' => ''
                ],
                'recipients' => [
                    'title' => 'Recipients',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => '',
                'success_update' => '',
                'success_destroy' => ''
            ]
        ],

        'email-recipients' => [
            'title' => 'Email Recipients',
            'singular' => 'Email Recipient',

            'fields' => [
                'name' => 'Name',
                'email' => 'E-mail'
            ],

            'sections' => [
                'recipient' => [
                    'title' => 'Recipients',
                    'description' => ''
                ],
                'groups' => [
                    'title' => 'Groups',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => '',
                'success_update' => '',
                'success_destroy' => ''
            ]
        ],

        'email-forms' => [
            'title' => 'Email Forms',
            'singular' => 'Email Form',

            'fields' => [
                'name' => 'Name',
                'email' => 'E-mail',
                'ip' => 'IP',
                'group' => 'Group',
                'created_at' => 'Created at'
            ]
        ],

        'activities' => [
            'title' => 'Activities',
            'singular' => 'Activity',

            'fields' => [
                'causer' => 'Causer',
                'subject' => 'Subject',
                'subject_id' => 'Subject ID',
                'description' => 'Description',
                'created_at' => 'Created at'
            ]
        ],

        'roles' => [
            'title' => 'Roles',
            'singular' => 'Role',

            'fields' => [
                'name' => 'Name'
            ],

            'sections' => [
                'role' => [
                    'title' => 'Role',
                    'description' => ''
                ],
                'permissions' => [
                    'title' => 'Permissions',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => '',
                'success_update' => '',
                'success_destroy' => ''
            ]
        ],

        'banners' => [
            'title' => 'Banners',
            'singular' => 'Banner',

            'fields' => [
                'image' => 'Image',
                'url' => 'URL',
                'active' => 'Active',
                'phrases' => 'Phrases'
            ],

            'sections' => [
                'banner' => [
                    'title' => 'Banner',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => '',
                'success_update' => '',
                'success_destroy' => ''
            ]
        ],

        'faqs' => [
            'title' => 'FAQs',
            'singular' => 'FAQ',

            'fields' => [
                'question' => 'Question',
                'answer' => 'Answer',
                'active' => 'Active'
            ],

            'sections' => [
                'faq' => [
                    'title' => 'FAQ',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => '',
                'success_update' => '',
                'success_destroy' => ''
            ]
        ],

        'partners' => [
            'title' => 'Partners',
            'singular' => 'Partners',

            'fields' => [
                'logo' => 'Logo',
                'site_url' => 'URL',
                'active' => 'Active',
                'name' => 'Name'
            ],

            'sections' => [
                'partner' => [
                    'title' => 'Partner',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => '',
                'success_update' => '',
                'success_destroy' => '',
                'success_order' => ''
            ]
        ],

        'testimonials' => [
            'title' => 'Testimonials',
            'singular' => 'Testimonial',

            'fields' => [
                'name' => 'Name',
                'image' => 'Imagem',
                'company' => 'Company',
                'active' => 'Active',
                'body' => 'Testimonial'
            ],

            'sections' => [
                'testimonial' => [
                    'title' => 'Testimonial',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => '',
                'success_update' => '',
                'success_destroy' => '',
                'success_order' => ''
            ]
        ],

        'modals' => [
            'title' => 'Modals',
            'singular' => 'Modal',

            'fields' => [
                'title' => 'Title',
                'body' => 'Content',
                'active' => 'Active',
                'image' => 'Image',
                'only_home' => 'Only HOME'
            ],

            'sections' => [
                'modal' => [
                    'title' => 'Modal',
                    'description' => ''
                ],
                'times' => [
                    'title' => 'Times',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => '',
                'success_update' => '',
                'success_destroy' => ''
            ]
        ],

        'products' => [
            'title' => 'Products',
            'singular' => 'Product',

            'fields' => [
                'name' => 'Name',
                'description' => 'Description',
                'active' => 'Active',
                'featured' => 'Featured',
                'allow_price' => 'Allow Price',
                'price' => 'Price',
                'released' => 'Released',
                'promotional_price' => 'Promotional Price',
                'availability' => 'Availability',
                'stock' => 'Stock',
                'slug' => 'URL',
                'sku' => 'SKU',
                'weight' => 'Weight',
                'width' => 'Width',
                'height' => 'Height',
                'length' => 'Length',
            ],

            'sections' => [
                'product' => [
                    'title' => 'Product',
                    'description' => ''
                ],

                'price' => [
                    'title' => 'Price',
                    'description' => ''
                ],

                'delivery' => [
                    'title' => 'Delivery',
                    'description' => ''
                ],

                'stock' => [
                    'title' => 'Stock',
                    'description' => ''
                ],

                'categories' => [
                    'title' => 'Categories',
                    'description' => ''
                ],

                'options' => [
                    'title' => 'Options',
                    'description' => ''
                ],

                'medias' => [
                    'title' => 'Medias',
                    'description' => ''
                ],

                'tags' => [
                    'title' => 'Tags',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => '',
                'success_update' => '',
                'success_destroy' => ''
            ]
        ],

        'product-options' => [
            'title' => 'Options',
            'singular' => 'Option',

            'fields' => [
                'name' => 'Name',
                'values' => 'Options'
            ],

            'messages' => [
                'success_create' => '',
                'success_update' => '',
                'success_destroy' => ''
            ]
        ],

        'product-medias' => [
            'title' => 'Medias',
            'singular' => 'Media',

            'fields' => [
                'title' => 'Title',
                'alt' => 'Alt',
                'description' => 'Description',
                'image' => 'Image',
                'key' => 'Key',
                'active' => 'Active'
            ],

            'messages' => [
                'success_create' => '',
                'success_update' => '',
                'success_destroy' => '',
                'success_order' => ''
            ]
        ],

        'product-categories' => [
            'title' => 'Product Categories',
            'singular' => 'Product Category',

            'fields' => [
                'name' => 'Name',
                'parent' => 'Parent Category',
                'description' => 'Description',
                'active' => 'Active',
                'featured' => 'Featured',
                'image' => 'Image',
                'slug' => 'URL'
            ],

            'sections' => [
                'product-category' => [
                    'title' => 'Product Category',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => '',
                'success_update' => '',
                'success_destroy' => ''
            ]
        ]
    ]
];
