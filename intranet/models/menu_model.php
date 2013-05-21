<?php

class Menu_Model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getListByMenu() {
        $menus = $this->db->select("SELECT * FROM menu WHERE parent=0");
        $b=array();
        foreach ($menus as $parent) {
            $lista = $this->db->select("SELECT * FROM menu WHERE parent=:menu ORDER BY orden", array('menu' => $parent['id']));
            $b[$parent['id']]['menuName']=$parent['name'];
            $b[$parent['id']]['sort']=true;
            $b[$parent['id']][0] = array(
                array(
                    "title" => 'Id',
                    "width" => "5%",
                ),
                array(
                    "title" => $parent['name'],
                    "width" => "80%",
                    "colspan" => "4"
                )
            );

            foreach ($lista as $key => $value) {
                $gsent = $this->db->prepare("SELECT * FROM page WHERE id=:id");
                $gsent->execute(array('id' => $value['page']));
                $elem = $gsent->fetch();
                $b[$parent['id']][] =
                array(
                    "id" => $elem['id'],
                    "name" => $elem['name']
                );
            }
        }
        return $b;
    }

    public function sort() { 
        $sort= array_diff($_POST['choices'], array('titleTable'));
        $cont=0;
        foreach ($sort as $key => $value) {
            $cont++;
            $data = array(
                'orden' => $cont
            );
            $this->db->update('menu', $data, "`id` = '{$value}'");
        }
        exit;
    }

}