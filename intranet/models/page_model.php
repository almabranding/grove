<?php
class Page_Model extends Model {
    public function __construct() {
        parent::__construct();
    }
    public function form($type='add',$id='null') {
        $action=($type=='add')?URL.LANG.'/page/create':URL.LANG.'/page/edit/'.$id;
        if ($type=='edit')
            foreach ($this->getInfo($id) as $project);
        $atributes=array(
            'enctype'    => 'multipart/form-data',
        );
        $form = new Zebra_Form('addProject','POST',$action,$atributes);
        
        $form->add('hidden', '_add', 'project');

        $form->add('label', 'label_name', 'name', 'Name');
        $form->add('text', 'name', $project['name_'.LANG], array('autocomplete' => 'off','required'  =>  array('error', 'Name is required!')));
        
        $form->add('label', 'label_template', 'template', 'Template');
        $obj = $form->add('select', 'template', $project['template'], array('autocomplete' => 'off'));
        foreach($this->getTemplate() as $key => $value) {
            $templ[$value['id']]=$value['name'];
        }
        $obj->add_options($templ);
        
        $form->add('label', 'label_menu', 'menu', 'Menu');
        $obj = $form->add('select', 'menu', $project['menu'], array('autocomplete' => 'off'));
        foreach($this->getMenu() as $key => $value) {
            $menu[$value['id']]=$value['name_'.LANG];
        }
        $obj->add_options($menu);
        if($this->gettemplate($project['template'],'name')=='video'){
            $form->add('label', 'label_vimeo', 'vimeo', 'Vimeo');
            $form->add('text', 'vimeo', $project['vimeo'], array('autocomplete' => 'off','required'  =>  array('error', 'Video is required!')));
        }
        $form->add('label', 'label_description', 'description', 'Description');
        $obj=$form->add('textarea', 'description', $project['description'], array('autocomplete' => 'off'));

        if($type=='edit'){
            $obj=$form->add('label', 'label_content', 'content', 'Content');
            $obj->set_attributes(array(
                'style'    => 'float:none',
            ));
            $obj=$form->add('textarea', 'content', htmlentities($project['content_'.LANG]), array('autocomplete' => 'off'));
            $obj->set_attributes(array(
                'class'    => 'wysiwyg',
            ));
        }
        
        
        $form->add('submit', '_btnsubmit', 'Submit');
        $form->validate();
        return $form;
    }
    
    public function getList() {
        $lista=$this->db->select("SELECT * FROM page");
        $b['sort']=true;
        $b[0]=array(
           array(
               "title"  =>"Id",
               "width"  =>"5%"
           ),array(
               "title"  =>"Name",
               "width"  =>"10%"
           ),array(
               "title"  =>"Template",
               "width"  =>"20%"
           ),array(
               "title"  =>"Menu",
               "width"  =>"20%"
           ),array(
               "title"  =>"URL",
               "width"  =>"20%"
           ),array(
               "title"  =>"Options",
               "width"  =>"10%"
           ));       
        foreach($lista as $key => $value) {
            $url=TEMPDIR.LANG.'/'.strtolower($this->getTemplate($value['template'],'url').$value['url']);
            $b[]=   
            array(
                "id"  =>$value['id'],
                "name"  =>$value['name_'.LANG],
                "template"  =>$this->gettemplate($value['template'],'name'),
                "Menu"  =>$this->getMenu($value['menu'],'name_'.LANG),
                "URL"  =>'<a target="_blank" href="'.$url.'">'.$url.'</a>',
                "Options"  =>'<a href="'.URL.LANG.'/page/view/'.$value['id'].'"><div class="edit"></div></a><a href="'.URL.LANG.'/page/delete/'.$value['id'].'"><div class="delete"></div></a>'
            );
        }
        return $b;
    }
    public function getInfo($id){
         $consulta=$this->db->select('SELECT * FROM page WHERE id = :id', 
            array('id' => $id));
         return $consulta;
    }
    public function getGallery($id){
         return $this->db->select('SELECT * FROM images WHERE page = :id ORDER by orden', 
            array('id' => $id));
    } 
    public function getFiles($id){
         return $this->db->select('SELECT * FROM files WHERE page = :id AND (lang="'.LANG.'" OR lang=null) ORDER by orden', 
            array('id' => $id));
    }
    
    public function create() {
        $menu=($_POST['menu']!='')?$_POST['menu']:-1;
        $data = array(
            'name_'.LANG => $_POST['name'],
            'template' => $_POST['template'],
            'menu' => $menu,
            'description' => $_POST['description'],
            'url' => filter_var(urlencode(strtolower($_POST['name'])), FILTER_SANITIZE_URL)
        );
        $page=$this->db->insert('page', $data);
        if($_POST['menu']!='')$_POST['menu']=-1;
        $data = array(
            'name_'.LANG => $_POST['name'],
            'url' => strtolower($this->getTemplate($_POST['template'],'url').urlencode($_POST['name'])),
            'parent' => $menu,
            'page' => $page
        );
        $this->db->insert('menu', $data);
    }
    public function edit($id){
        $menu=($_POST['menu']!='')?$_POST['menu']:-1;
        $data = array(
            'name_'.LANG => $_POST['name'],
            'template' => $_POST['template'],
            'description' => $_POST['description'],
            'content_'.LANG => stripslashes($_POST['content']),
            'vimeo' => $_POST['vimeo'],
            'url' => filter_var(urlencode(strtolower($_POST['name'])), FILTER_SANITIZE_URL),
            'menu' => $menu
        );
        $this->db->update('page', $data, 
            "`id` = '{$id}'");
            
        $data = array(
            'name_'.LANG => $_POST['name'],
            'url' => strtolower($this->getTemplate($_POST['template'],'url').urlencode($_POST['name'])),
            'parent' => $menu
        );
        $this->db->update('menu', $data, 
            "`page` = '{$id}'");
    }
    public function delete($id){
         $this->db->delete('menu', "`page` = {$id}");
         $this->db->delete('page', "`id` = {$id}");
         $this->delTree(UPLOAD.$id);
    }   
    public function sort(){
        foreach($_POST['foo'] as $key=>$value){
            $data = array(
                'orden' => $key
            );
             $this->db->update('images', $data, 
            "`id` = '{$value}'");
        }
        exit;
    }   
}