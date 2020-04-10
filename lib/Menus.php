<?php
namespace App\Lib;

use App\Menu;

class Menus {

    private function menusList(){
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
    private function getSonsInfo(array $items,$pid=0,$deep=0)
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

    /**
     * @return string
     */
    public function echoMenus() {
        $html = '';
        $url =  env('APP_URL');
        $menusList = $this->menusList();
        foreach ($menusList as $value) {
            $html .= '<li class="layui-nav-item">
                <a href="javascript:;"><i class=". $value[\'icon\'] ."></i> '. $value['menu_name'] .'<span class="layui-nav-more"></span></a>';
            if (isset($value['son']) && !empty($value['son'])) {
                foreach ($value['son'] as $val) {
                    $route = $val['route'];
                    $route = str_replace('.', '/', $route);
                    $single_url = $url . '/' . $route . '/';

                    $html .= '<dl class="layui-nav-child">
                    <dd><a href="' . $single_url . '">' . $val['menu_name'] . '</a></dd>
                    </dl>';
                }
            }
        $html .= '</li>';
        return $html;
    }
}
