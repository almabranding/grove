<?php

class Page extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('team/js/custom.js');
    }
    
    function index() {
        $this->view->msg = 'This page doesnt exist';
        $this->view->render('error/index');
    }
    public function view($url,$pic=true) {
        $this->view->url=$url;
        $this->view->page=$this->model->getPage($url);
        $this->view->gallery=$this->model->getGallery($this->view->page['id']);
        $this->view->render('page/index');
    }
    
}