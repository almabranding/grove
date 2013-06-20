<?php

class uploadFile extends Controller {

    function __construct() {
        parent::__construct();
        if(!Session::get('loggedIn')) header('location: '.URL);
    }
    function upload($project=0) {
       $page=$this->model->getPageInfo($project);
       $img=$this->model->upload($project);
       if(!$img['name']) return;
       $img['video']=($page[0]['template']==4)?'1':0;
       ($img['img'])?$this->model->insertImg($img,$project):$this->model->insertFile($img,$project);
    }
    function crop() {
       $this->model->crop();
       header('location: ' . URL . 'image/view/'.$_POST['id']);
    }
}