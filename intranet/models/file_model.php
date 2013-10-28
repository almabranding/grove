<?php
class File_Model extends Model {
    public function __construct() {
        parent::__construct();
    }  
    
    public function getInfo($id){
        return $this->db->select('SELECT * FROM files WHERE id = :id', 
           array('id' => $id));
    }
    public function delete($id){
         foreach ($this->getInfo($id) as $value){
            $this->db->delete('files', "`id` = {$id}");
            @unlink(UPLOAD.$value['page'].'/'.$value['name']);
         } 
    }
}