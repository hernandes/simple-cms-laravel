<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Menu as Model;
use Menu;

class MenuServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if (app()->runningInConsole()) return;

        Menu::make('admin', function ($menu) {
            $this->makeAdminMenu($menu, config('menus'));
        });

        $this->app->booted(function () {
            Menu::make('main', function ($menu) {
                $menus = Model::defaultOrder()
                    ->get()
                    ->toTree();

                $this->makeMenu($menu, $menus);
            });
        });

    }

    protected function makeAdminMenu($menu, $items)
    {
        foreach ($items as $sidebar => $its) {
            $menu->raw(trans($sidebar), [
                'class' => 'nav-header'
            ]);

            foreach ($its as $item) {
                $this->addAdminItemMenu($menu, $item);

                if (!empty($item['children'])) {
                    $this->makeAdminSubMenu($menu->item($item['title']), $item['children']);
                }
            }
        }
    }

    protected function makeAdminSubMenu($menu, $items)
    {
        foreach ($items as $item) {
            $this->addAdminItemMenu($menu, $item);

            if (!empty($item['children'])) {
                $this->makeAdminSubMenu($menu->item($item['title']), $item['children']);
            }
        }
    }

    private function addAdminItemMenu($menu, $item)
    {
        $modules = config('modules');
        if ((!isset($item['module']) || $modules[$item['module']]['active']) && $menu !== null) {
            $url = '#';
            if (!isset($item['children']) && isset($item['url'])) {
                if (app()->getLocale() === config('app.fallback_locale')) {
                    $url = url('/admin' . $item['url']);
                } else {
                    $url = url('/admin/' . app()->getLocale() . $item['url']);
                }
            }

            $menu->add(trans($item['title']), [
                'class' => 'nav-item' . (isset($item['children']) ? ' has-treeview' : '')
            ])
                ->nickname($item['title'])
                ->append((!empty($item['children']) ? '<i class="right fas fa-angle-left"></i>' : '') . '</p>')
                ->prepend('<i class="nav-icon ' . (isset($item['icon']) ? 'fas ' . $item['icon'] : 'far fa-circle') . '"></i> <p>')
                ->link->attr(['class' => 'nav-link', 'data-ajax' => 'true'])->href($url);
        }
    }

    protected function makeMenu($menu, $items)
    {
        foreach ($items as $item) {
            $this->addItemMenu($menu, $item);

            if ($item->children->isNotEmpty()) {
                $this->makeSubMenu($menu->item('item-' . $item->id), $item->children);
            }
        }
    }

    protected function makeSubMenu($menu, $items)
    {
        foreach ($items as $item) {
            $this->addItemMenu($menu, $item);

            if ($item->children->isNotEmpty()) {
                $this->makeSubMenu($menu->item('item-' . $item->id), $item->children);
            }
        }
    }

    private function addItemMenu($menu, $item)
    {
        $url = $item->path();

        $menu->add($item->title, [
            'class' => 'nav-item' . ($item->children->isNotEmpty() ? ' dropdown' : '')
        ])
            ->nickname('item-' . $item->id)
            ->link->attr(array_merge([
                'class' => 'nav-link' . ($item->children->isNotEmpty() ? ' dropdown-toggle' : '')
            ], ($item->children->isNotEmpty() ? ['data-toggle' => 'dropdown'] : [])))
            ->href($url);
    }
}
