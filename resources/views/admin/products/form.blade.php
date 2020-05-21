@component('admin.components.form.section', [
    'title' => 'product.title',
    'description' => 'product.description'
])
    <div class="row">
        <div class="col-md-6">
            @include('admin.components.form.text', [
                'model' => $model,
                'name' => 'name',
                'label' => 'name',
                'autofocus' => true,
                'required' => true
            ])
        </div>

        <div class="col-md-2">
            @include('admin.components.form.switch', [
                'model' => $model,
                'name' => 'active',
                'checked' => true,
                'label' => 'active'
            ])
        </div>

        <div class="col-md-2">
            @include('admin.components.form.switch', [
                'model' => $model,
                'name' => 'featured',
                'label' => 'featured'
            ])
        </div>

        <div class="col-md-2">
            @include('admin.components.form.switch', [
                'model' => $model,
                'name' => 'released',
                'label' => 'released'
            ])
        </div>
    </div>

    @if ($model)
        @include('admin.components.form.text', [
            'model' => $model,
            'required' => true,
            'name' => 'slug',
            'label' => 'slug'
        ])
    @endif

    @include('admin.components.form.text', [
        'model' => $model,
        'name' => 'sku',
        'label' => 'sku',
        'required' => true
    ])

    @include('admin.components.form.textarea', [
        'model' => $model,
        'name' => 'description',
        'label' => 'description',
        'required' => true,
        'editor' => true
    ])
@endcomponent

@if (config('modules.products.config.with_price'))
    @component('admin.components.form.section', [
        'title' => 'price.title',
        'description' => 'price.description'
    ])
        <div class="row">
            <div class="col-md-2">
                @include('admin.components.form.switch', [
                    'model' => $model,
                    'name' => 'allow_price',
                    'checked' => true,
                    'toggleVisibility' => '.price-field',
                    'label' => 'allow_price'
                ])
            </div>

            <div class="col-md-3 price-field">
                @include('admin.components.form.money', [
                    'model' => $model,
                    'name' => 'price',
                    'required' => true,
                    'label' => 'price'
                ])
            </div>

            <div class="col-md-3 price-field">
                @include('admin.components.form.money', [
                    'model' => $model,
                    'name' => 'promotional_price',
                    'label' => 'promotional_price'
                ])
            </div>
        </div>
    @endcomponent
@endif

@if (config('modules.products.config.with_delivery'))
    @component('admin.components.form.section', [
        'title' => 'delivery.title',
        'description' => 'delivery.description'
    ])
        <div class="row">
            <div class="col-md-3">
                @include('admin.components.form.text', [
                    'model' => $model,
                    'name' => 'weight',
                    'label' => 'weight'
                ])
            </div>

            <div class="col-md-3">
                @include('admin.components.form.text', [
                    'model' => $model,
                    'name' => 'width',
                    'label' => 'width'
                ])
            </div>

            <div class="col-md-3">
                @include('admin.components.form.text', [
                    'model' => $model,
                    'name' => 'height',
                    'label' => 'height'
                ])
            </div>

            <div class="col-md-3">
                @include('admin.components.form.text', [
                    'model' => $model,
                    'name' => 'length',
                    'label' => 'length'
                ])
            </div>
        </div>
    @endcomponent
@endif

@if (config('modules.products.config.with_stock'))
    @component('admin.components.form.section', [
        'title' => 'stock.title',
        'description' => 'stock.description'
    ])
        <div class="row">
            <div class="col-md-2">
                @include('admin.components.form.text', [
                    'model' => $model,
                    'name' => 'stock',
                    'required' => true,
                    'value' => 0,
                    'label' => 'stock'
                ])
            </div>

            <div class="col-md-3">
                @include('admin.components.form.select', [
                    'model' => $model,
                    'options' => [
                        'D' => 'Disponível',
                        'I' => 'Indisponível',
                        'V' => 'Venda encerrada',
                        'S' => 'Sob consulta'
                    ],
                    'name' => 'availability',
                    'label' => 'availability'
                ])
            </div>
        </div>
    @endcomponent
@endif

@if (config('modules.products.config.with_categories'))
    @component('admin.components.form.section', [
        'title' => 'categories.title',
        'description' => 'categories.description'
    ])
        @include('admin.components.form.checkbox', [
            'model' => $model,
            'options' => $categories,
            'name' => 'categories',
            'multiple' => true,
            'display' => 'name',
            'flat' => true
        ])
    @endcomponent
@endif

@if (config('modules.products.config.with_options') && $model)
    @component('admin.components.form.section', [
        'title' => 'options.title',
        'description' => 'options.description'
    ])
        @if ($model->options->isEmpty())
            @include('admin.components.helpers.no-records')
        @else
            <table class="table table-hover table-striped table-md">
                <thead>
                    <tr>
                        <th>@lang('admin.modules.product-options.fields.name')</th>
                        <th data-orderable="false" width="10"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($model->options as $record)
                        <tr>
                            <td>{{ $record->name }}</td>
                            <td class="actions">
                                @permission('edit product-option')
                                    <a data-toggle="modal" data-target="#modal-edit-option" href="{{ route('admin.product-options.edit', [$model->id, $record->id]) }}" class="btn btn-sm btn-default">@lang('admin.actions.edit')</a>
                                @endpermission

                                @permission('destroy product-option')
                                    <a href="{{ route('admin.product-options.destroy', [$model->id, $record->id]) }}" data-delete class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                @endpermission
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="text-right">
            <a data-toggle="modal" data-target="#modal-add-option" href="{{ route('admin.product-options.create', $model->id) }}" class="btn btn-sm btn-success">@lang('admin.actions.add')</a>
        </div>
    @endcomponent
@endif

@if ($model)
    @component('admin.components.form.section', [
        'title' => 'medias.title',
        'description' => 'medias.description'
    ])
        @if ($model->medias->isEmpty())
            @include('admin.components.helpers.no-records')
        @else
            <table data-table-sortable data-url="{{ route('admin.product-medias.reorder', $model->id) }}" class="table table-hover table-striped table-md">
                <thead>
                    <tr>
                        <th width="10"></th>
                        <th width="250"></th>
                        <th>@lang('admin.modules.product-medias.fields.title')</th>
                        <th data-orderable="false" width="10"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($model->medias as $record)
                        <tr id="order_{{ $record->id  }}" class="{{ $record->active ? '' : 'bg-inactive' }}">
                            <td>
                                <i class="fa fa-bars draggable"></i>
                            </td>
                            <td>
                                <img src="{{ $record->file_url }}" style="max-width:200px" />
                            </td>
                            <td>{{ $record->title }}</td>
                            <td class="actions">
                                @permission('edit product-media')
                                    <a data-toggle="modal" data-target="#modal-edit-media" href="{{ route('admin.product-medias.edit', [$model->id, $record->id]) }}" class="btn btn-sm btn-default">@lang('admin.actions.edit')</a>
                                @endpermission

                                @permission('destroy product-media')
                                    <a href="{{ route('admin.product-medias.destroy', [$model->id, $record->id]) }}" data-delete class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                @endpermission
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="text-right">
            <a data-toggle="modal" data-target="#modal-add-media" href="{{ route('admin.product-medias.create', $model->id) }}" class="btn btn-sm btn-success">@lang('admin.actions.add')</a>
        </div>
    @endcomponent
@endif

@if (config('modules.products.config.with_tags'))
    @component('admin.components.form.section', [
        'title' => 'tags.title',
        'description' => 'tags.description'
    ])
        @include('admin.components.form.tags', [
            'model' => $model,
            'name' => 'tags'
        ])
    @endcomponent
@endif
