@component('admin.components.form.section', [
    'title' => 'menu.title',
    'description' => 'menu.description'
])
    <div class="row">
        <div class="col-md-10">
            @include('admin.components.form.text', [
                'model' => $menu,
                'name' => 'title',
                'required' => true,
                'label' => 'title',
                'autofocus' => true
            ])
        </div>

        <div class="col-md-2">
            @include('admin.components.form.switch', [
                'model' => $menu,
                'name' => 'active',
                'checked' => true,
                'label' => 'active'
            ])
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            @include('admin.components.form.select', [
                'model' => $menu,
                'options' => $parents,
                'comparableKey' => 'parent_id',
                'name' => 'parent_id',
                'label' => 'parent',
            ])
        </div>
    </div>
@endcomponent

@component('admin.components.form.section', [
    'title' => 'url.title',
    'description' => 'url.description'
])
    <div class="row">
        <div class="col-md-12">
            @include('admin.components.form.text', [
                'model' => $menu,
                'name' => 'url',
                'label' => 'url'
            ])
        </div>
    </div>

    <div class="row">
        @module('pages')
            <div class="col-md-6">
                @include('admin.components.form.select', [
                    'model' => $menu,
                    'options' => $pages,
                    'name' => 'page_id',
                    'label' => 'page',
                ])
            </div>
        @endmodule

        @module('posts')
            <div class="col-md-6">
                @include('admin.components.form.select', [
                    'model' => $menu,
                    'options' => $posts,
                    'name' => 'post_id',
                    'label' => 'post',
                ])
            </div>
        @endmodule
    </div>
@endcomponent
