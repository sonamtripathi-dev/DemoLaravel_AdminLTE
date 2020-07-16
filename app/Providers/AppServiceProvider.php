<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use App\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            $menu  = new Menu;
            $menus = $menu->withSubMenus();
            $menus = json_decode(json_encode($menus));
            foreach($menus as $menu) {
                $arrayMenu = array('text' => '', 'url' => '', 'icon' => '');
                if(!empty($menu->SubMenu)){
                    foreach($menu->SubMenu as $submenu){
                        $arrayMenu[] = array(
                            'text' => trans('menu.'.$submenu->menu_item),
                            'url'  => $submenu->menu_url,
                            'icon' => '',
                        );
                    };
                    $event->menu->add([
                        'text' => trans('menu.'.$menu->menu_item),
                        'icon' => '',
                        'submenu' => $arrayMenu,
                    ]);
                }else{
                    $event->menu->add([
                        'text' => trans('menu.dashboard'),
                        'url' => $menu->menu_url,
                        'icon' => '',
                    ]);
                }
            }
        });
    }
}
