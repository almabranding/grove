<?php

class Menu extends Model
{   
    public function __construct() 
    {
        parent::__construct();
    }
    public function getMenu($url = '') {
        $model=new Model();
        $m.='<ul class="header_menu">';
        $m.='<li class="menuTitle"><ul>';
        $menu=$model->db->select("SELECT * FROM menu WHERE parent=1");
        foreach($menu as $value)
            $m.='<li class="menuLink"><a href="' . URL . $value['url'].'">'.$value['name'].'</a></li>';
        $m.='</ul></li>';
        $m.='<li class="menuTitle"><ul>';
        $menu=$model->db->select("SELECT * FROM menu WHERE parent=2");
        foreach($menu as $value)
            $m.='<li class="menuLink"><a href="' . URL . $value['url'].'">'.$value['name'].'</a></li>';
        
        $m.='</ul></li>';
        return $m;
    }
}