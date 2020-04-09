<?php
namespace App\Lib;

use App\Menu;

class Menus {

    public function menusList(){
        $menus = array_reverse(Menu::all()->toArray());//查询所有菜单
        return $this->getSonsInfo($menus,0);
    }

    /**
     * @title 菜单树生成
     * @param array $items - 数据
     * @param int $pid - 父级ID的值
     * @param int $deep - 深度
     * @return array
     */
    protected function getSonsInfo(array $items,$pid=0,$deep=0)
    {
        $lists = [];
        foreach ($items as $item){
            if ($item['pid'] === $pid){
                $item['deep'] = $deep;
                $item['son'] = $this->getSonsInfo($items,$item['id'],$deep+1);
                $lists[] = $item;
            }
        }
        return $lists;
    }
}
