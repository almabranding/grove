<?php
class Page_Model extends Model {
    public function __construct() {
        parent::__construct();
    }  
    
    public function getFiles($id){ 
         return $this->db->select('SELECT * FROM files WHERE page = :id AND (lang="'.LANG.'" OR lang=null) ORDER by orden', 
            array('id' => $id));
    }
}