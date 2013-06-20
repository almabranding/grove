<?php
class Page_Model extends Model {
    public function __construct() {
        parent::__construct();
    }  
    
    public function getFiles($id){ 
         return $this->db->select('SELECT * FROM files WHERE page = :id ORDER by orden', 
            array('id' => $id));
    }
}