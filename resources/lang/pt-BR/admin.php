<?php

return [
    'locale' => [
        'date' => 'd/m/Y',
        'datetime' => 'd/m/Y H:i'
    ],

    'title' => 'Administração',

    'header' => [
        'logout' => 'Sair do sistema',
    ],

    'footer' => [
        'licensed_to' => 'Licenciado para'
    ],

    'menu' => [
        'headers' => [
            'components' => 'Componentes',
            'system' => 'Sistema'
        ],

        'items' => [
            'dashboard' => 'Dashboard',
            'products' => [
                'title' => 'Produtos',
                'all' => 'Produtos',
                'categories' => 'Categorias'
            ],
            'posts' => [
                'title' => 'Notícias',
                'all' => 'Notícias',
                'categories' => 'Categorias'
            ],
            'pages' => 'Páginas',
            'menus' => 'Menus',
            'banners' => 'Banners',
            'faq' => 'FAQ',
            'partners' => 'Parceiros',
            'testimonials' => 'Depoimentos',
            'modals' => 'Modais',
            'users' => [
                'title' => 'Usuários',
                'all' => 'Usuários',
                'roles' => 'Cargos/Funções'
            ],
            'emails' => [
                'title' => 'E-mails',
                'contacts' => 'Contatos',
                'groups' => 'Grupos',
                'recipients' => 'Recipientes'
            ],
            'logs' => 'Atividades',
            'settings' => 'Configurações'
        ]
    ],

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

    'words' => [
        'yes' => 'Sim',
        'no' => 'Não',
        'by' => 'Por',
        'deleted' => 'Deletado',
        'created' => 'Criado',
        'updated' => 'Editado',
        'image' => 'Imagem',
        'video' => 'Vídeo'
    ],

    'actions' => [
        'add' => 'Adicionar novo',
        'new' => 'Novo',
        'show' => 'Visualizar',
        'edit' => 'Editar',
        'list' => 'Listar',
        'save' => 'Salvar',
        'cancel' => 'Cancelar'
    ],

    'messages' => [
        'confirm_delete' => 'Tem certeza que deseja excluir este registro?'
    ],

    'modules' => [
        'users' => [
            'title' => 'Usuários',
            'singular' => 'Usuário',

            'fields' => [
                'name' => 'Nome',
                'active' => 'Ativo',
                'email' => 'E-mail',
                'password' => 'Senha',
                'super_user' => 'Super usuário',
                'updated_at' => 'Atualizado em',
                'avatar' => 'Avatar'
            ],

            'sections' => [
                'user' => [
                    'title' => 'Usuário',
                    'description' => ''
                ],
                'groups' => [
                    'title' => 'Grupos',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => 'Usuário adicionado com sucesso!',
                'success_update' => 'Usuário editado com sucesso!',
                'success_destroy' => 'Usuário exluído com sucesso!'
            ]
        ],

        'pages' => [
            'title' => 'Páginas',
            'singular' => 'Página',

            'fields' => [
                'title' => 'Título',
                'active' => 'Ativo',
                'slug' => 'URL',
                'body' => 'Conteúdo',
                'key' => 'Identificação',
                'featured' => 'Destaque',
                'seo_title' => 'Title',
                'seo_keywords' => 'Keywords',
                'seo_description' => 'Description'
            ],

            'sections' => [
                'page' => [
                    'title' => 'Página',
                    'description' => ''
                ],
                'blocks' => [
                    'title' => 'Blocos',
                    'description' => ''
                ],
                'medias' => [
                    'title' => 'Mídias',
                    'description' => ''
                ],
                'seo' => [
                    'title' => 'SEO',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => 'Página adicionado com sucesso!',
                'success_update' => 'Página editado com sucesso!',
                'success_destroy' => 'Página exluído com sucesso!'
            ]
        ],

        'page-blocks' => [
            'title' => 'Blocos',
            'singular' => 'Bloco',

            'fields' => [
                'title' => 'Título',
                'body' => 'Conteúdo',
                'key' => 'Identificação',
                'active' => 'Ativo',
                'image' => 'Imagem'
            ],

            'messages' => [
                'success_create' => 'Bloco adicionado com sucesso!',
                'success_update' => 'Bloco editado com sucesso!',
                'success_destroy' => 'Bloco exluído com sucesso!',
                'success_order' => 'Blocos ordenados com sucesso!'
            ]
        ],

        'page-medias' => [
            'title' => 'Mídias',
            'singular' => 'Mídia',

            'fields' => [
                'title' => 'Título',
                'alt' => 'Alt',
                'description' => 'Description',
                'image' => 'Imagem',
                'key' => 'Identificação',
                'active' => 'Ativo',
                'video_url' => 'Código vídeo (youtube)',
                'type' => 'Tipo'
            ],

            'messages' => [
                'success_create' => 'Mídia adicionada com sucesso!',
                'success_update' => 'Mídia editada com sucesso!',
                'success_destroy' => 'Mídia exluída com sucesso!',
                'success_order' => 'Mídias ordenadas com sucesso'
            ]
        ],

        'posts' => [
            'title' => 'Notícias',
            'singular' => 'Notícia',

            'fields' => [
                'title' => 'Título',
                'active' => 'Ativo',
                'slug' => 'URL',
                'image' => 'Imagem de Capa',
                'body' => 'Notícia',
                'published_at' => 'Publicado em'
            ],

            'sections' => [
                'post' => [
                    'title' => 'Notícia',
                    'description' => ''
                ],

                'categories' => [
                    'title' => 'Categorias',
                    'description' => ''
                ],

                'body' => [
                    'title' => 'Notícia',
                    'description' => ''
                ],

                'tags' => [
                    'title' => 'Tags',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => 'Notícia adicionada com sucesso!',
                'success_update' => 'Notícia editada com sucesso!',
                'success_destroy' => 'Notícia exluída com sucesso!',
            ]
        ],

        'post-categories' => [
            'title' => 'Categorias de Notícias',
            'singular' => 'Categoria de Notícia',

            'fields' => [
                'name' => 'Nome',
                'active' => 'Active',
                'slug' => 'URL'
            ],

            'sections' => [
                'category' => [
                    'title' => 'Categoria de Notícia',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => 'Categoria de Notícia adicionada com sucesso!',
                'success_update' => 'Categoria de Notícia editada com sucesso!',
                'success_destroy' => 'Categoria de Notícia exluída com sucesso!',
                'success_order' => 'Categoria de Notícia ordenadas com sucesso'
            ]
        ],

        'menus' => [
            'title' => 'Menus',
            'singular' => 'Menu',

            'fields' => [
                'title' => 'Título',
                'active' => 'Ativo',
                'url' => 'URL',
                'parent' => 'Menu Pai',
                'page' => 'Página',
                'post' => 'Notícia'
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
                'success_create' => 'Menu adicionado com sucesso!',
                'success_update' => 'Menu editado com sucesso!',
                'success_destroy' => 'Menu exluído com sucesso!'
            ]
        ],

        'settings' => [
            'title' => 'Configurações',
            'singular' => 'Configuração',

            'fields' => [
                'key' => 'Identificação',
                'value' => 'Valor',
                'description' => 'Descrição',
                'type' => 'Tipo'
            ],

            'sections' => [
                'setting' => [
                    'title' => 'Configuração',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => 'Configuração adicionada com sucesso!',
                'success_update' => 'Configuração editada com sucesso!',
                'success_destroy' => 'Configuração exluída com sucesso!'
            ]
        ],

        'email-groups' => [
            'title' => 'Grupos de E-mail',
            'singular' => 'Grupo de E-mail',

            'fields' => [
                'key' => 'Identificação',
                'subject' => 'Assunto'
            ],

            'sections' => [
                'group' => [
                    'title' => 'Grupo',
                    'description' => ''
                ],
                'recipients' => [
                    'title' => 'Recipientes',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => 'Grupo de E-mail adicionado com sucesso!',
                'success_update' => 'Grupo de E-mail editado com sucesso!',
                'success_destroy' => 'Grupo de E-mail exluído com sucesso!'
            ]
        ],

        'email-recipients' => [
            'title' => 'Recipientes de E-mail',
            'singular' => 'Recipiente de E-mail',

            'fields' => [
                'name' => 'Nome',
                'email' => 'E-mail'
            ],

            'sections' => [
                'recipient' => [
                    'title' => 'Recipiente',
                    'description' => ''
                ],
                'groups' => [
                    'title' => 'Grupos',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => 'Recipiente de E-mail adicionado com sucesso!',
                'success_update' => 'Recipiente de E-mail editado com sucesso!',
                'success_destroy' => 'Recipiente de E-mail exluído com sucesso!'
            ]
        ],

        'email-forms' => [
            'title' => 'Contatos Enviados',
            'singular' => 'Contato Enviado',

            'fields' => [
                'name' => 'Nome',
                'email' => 'E-mail',
                'ip' => 'IP',
                'group' => 'Grupo',
                'created_at' => 'Enviado em'
            ]
        ],

        'activities' => [
            'title' => 'Atividades',
            'singular' => 'Atividade',

            'fields' => [
                'causer' => 'Causador',
                'subject' => 'Model',
                'subject_id' => 'Model ID',
                'description' => 'Tipo',
                'created_at' => 'Criado em'
            ]
        ],

        'roles' => [
            'title' => 'Cargos/Funções',
            'singular' => 'Cargo/Função',

            'fields' => [
                'name' => 'Nome'
            ],

            'sections' => [
                'role' => [
                    'title' => 'Cargo/Função',
                    'description' => ''
                ],
                'permissions' => [
                    'title' => 'Permissões',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => 'Cargo/Função adicionado com sucesso!',
                'success_update' => 'Cargo/Função editado com sucesso!',
                'success_destroy' => 'Cargo/Função exluído com sucesso!'
            ]
        ],

        'banners' => [
            'title' => 'Banners',
            'singular' => 'Banner',

            'fields' => [
                'image' => 'Imagem',
                'url' => 'URL',
                'active' => 'Ativo',
                'phrases' => 'Frases'
            ],

            'sections' => [
                'banner' => [
                    'title' => 'Banner',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => 'Banner adicionado com sucesso!',
                'success_update' => 'Banner editado com sucesso!',
                'success_destroy' => 'Banner exluído com sucesso!'
            ]
        ],

        'faqs' => [
            'title' => 'FAQs',
            'singular' => 'FAQ',

            'fields' => [
                'question' => 'Pergunta',
                'answer' => 'Resposta',
                'active' => 'Ativo'
            ],

            'sections' => [
                'faq' => [
                    'title' => 'FAQ',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => 'FAQ adicionada com sucesso!',
                'success_update' => 'FAQ editada com sucesso!',
                'success_destroy' => 'FAQ exluída com sucesso!',
                'success_order' => 'FAQ ordenada ordenados com sucesso'
            ]
        ],

        'partners' => [
            'title' => 'Parceiros',
            'singular' => 'Parceiro',

            'fields' => [
                'logo' => 'Logo',
                'site_url' => 'URL',
                'active' => 'Ativo',
                'name' => 'Nome'
            ],

            'sections' => [
                'partner' => [
                    'title' => 'Parceiro',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => 'Parceiro adicionado com sucesso!',
                'success_update' => 'Parceiro editado com sucesso!',
                'success_destroy' => 'Parceiro exluído com sucesso!',
                'success_order' => 'Parceiros ordenado ordenados com sucesso'
            ]
        ],

        'testimonials' => [
            'title' => 'Depoimentos',
            'singular' => 'Depoimento',

            'fields' => [
                'name' => 'Nome',
                'image' => 'Imagem',
                'company' => 'Empresa/Cargo',
                'active' => 'Ativo',
                'body' => 'Depoimento'
            ],

            'sections' => [
                'testimonial' => [
                    'title' => 'Depoimento',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => 'Depoimento adicionado com sucesso!',
                'success_update' => 'Depoimento editado com sucesso!',
                'success_destroy' => 'Depoimento exluído com sucesso!'
            ]
        ],

        'modals' => [
            'title' => 'Modais',
            'singular' => 'Modal',

            'fields' => [
                'title' => 'Título',
                'body' => 'Conteúdo',
                'active' => 'Ativo',
                'image' => 'Imagem',
                'only_home' => 'Somente HOME'
            ],

            'sections' => [
                'modal' => [
                    'title' => 'Modal',
                    'description' => ''
                ],
                'times' => [
                    'title' => 'Tempos',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => 'Modal adicionada com sucesso!',
                'success_update' => 'Modal editada com sucesso!',
                'success_destroy' => 'Modal exluída com sucesso!'
            ]
        ],

        'products' => [
            'title' => 'Produtos',
            'singular' => 'Produto',

            'fields' => [
                'name' => 'Nome',
                'description' => 'Descrição',
                'active' => 'Ativo',
                'featured' => 'Destaque',
                'allow_price' => 'Exibir preço',
                'price' => 'Preço',
                'promotional_price' => 'Preço Promocional',
                'availability' => 'Disponibilidade',
                'released' => 'Lançamento',
                'stock' => 'Estoque',
                'slug' => 'URL',
                'sku' => 'SKU',
                'weight' => 'Peso',
                'width' => 'Largura',
                'height' => 'Altura',
                'length' => 'Comprimento',
            ],

            'sections' => [
                'product' => [
                    'title' => 'Produto',
                    'description' => ''
                ],

                'price' => [
                    'title' => 'Preço',
                    'description' => ''
                ],

                'delivery' => [
                    'title' => 'Entrega',
                    'description' => ''
                ],

                'stock' => [
                    'title' => 'Estoque',
                    'description' => ''
                ],

                'categories' => [
                    'title' => 'Categorias',
                    'description' => ''
                ],

                'options' => [
                    'title' => 'Variações',
                    'description' => ''
                ],

                'medias' => [
                    'title' => 'Mídias',
                    'description' => ''
                ],

                'tags' => [
                    'title' => 'Tags',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => 'Produto adicionado com sucesso!',
                'success_update' => 'Produto editado com sucesso!',
                'success_destroy' => 'Produto exluído com sucesso!'
            ]
        ],

        'product-options' => [
            'title' => 'Variações',
            'singular' => 'Variação',

            'fields' => [
                'name' => 'Nome',
                'values' => 'Variações'
            ],

            'messages' => [
                'success_create' => 'Variação adicionada com sucesso!',
                'success_update' => 'Variação editada com sucesso!',
                'success_destroy' => 'Variação exluída com sucesso!'
            ]
        ],

        'product-medias' => [
            'title' => 'Mídias',
            'singular' => 'Mídia',

            'fields' => [
                'title' => 'Título',
                'alt' => 'Alt',
                'description' => 'Description',
                'image' => 'Imagem',
                'key' => 'Identificação',
                'active' => 'Ativo'
            ],

            'messages' => [
                'success_create' => 'Mídia adicionada com sucesso!',
                'success_update' => 'Mídia editada com sucesso!',
                'success_destroy' => 'Mídia exluída com sucesso!',
                'success_order' => 'Mídias ordenadas com sucesso'
            ]
        ],

        'product-categories' => [
            'title' => 'Categorias de Produto',
            'singular' => 'Categoria de Produto',

            'fields' => [
                'name' => 'Nome',
                'parent' => 'Categoria Pai',
                'active' => 'Ativo',
                'description' => 'Descrição',
                'featured' => 'Destaque',
                'image' => 'Imagem',
                'slug' => 'URL'
            ],

            'sections' => [
                'product-category' => [
                    'title' => 'Categoria de Produto',
                    'description' => ''
                ]
            ],

            'messages' => [
                'success_create' => 'Categoria de Produto adicionada com sucesso!',
                'success_update' => 'Categoria de Produto editada com sucesso!',
                'success_destroy' => 'Categoria de Produto exluída com sucesso!',
                'success_order' => 'Categoria de Produto ordenadas com sucesso'
            ]
        ]
    ]
];
