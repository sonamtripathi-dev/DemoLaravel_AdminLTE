<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function withSubMenus() {
        $menuList = Menu::orderBy('order')->get();
        $menus = array();
        foreach ($menuList as $menu) {
            $menus[] = $menu->toArray();
        }
        $menus = $this->buildTree($menus);
        return $menus;
    }

    public function buildTree(array $elements, $parentId = 0)
    {
        $branch = array();
        foreach ($elements as $element) {
            if ($element['parent_menu_id'] == $parentId) {
                $children = $this->buildTree($elements, $element['id']);
                if ($children) {
                    $element['SubMenu'] = $children;
                }
                $branch[] = $element;
            }
        }
        return $branch;
    }


}
