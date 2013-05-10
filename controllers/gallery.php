<?php

class Gallery extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('gallery/js/jquery.ez-bg-resize.js','gallery/js/sly.js','gallery/js/custom.js');
        $this->view->css = array('gallery/css/horizontal.css');
    }
    
    function index() {
        $this->view->render('gallery/index');
    }
    public function view($url,$pic=true) {
        $this->view->url=$url;
        $this->view->page=$this->model->getPage($url);
        $this->view->gallery=$this->model->getGallery($this->view->page['id']);
        $this->view->render('gallery/index');
    }
    
}