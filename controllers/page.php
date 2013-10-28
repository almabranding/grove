<?php

class Page extends Controller {
    function __construct() {
        parent::__construct();
    }
    
    function index() {
        $this->view->msg = 'This page doesnt exist';
        $this->view->render('error/index');
    }
    public function view($url,$pic=true) {
        $this->view->js = array('page/js/custom.js');
        $this->view->url=$url;
        $this->view->page=$this->model->getPage($url);
        $this->view->gallery=$this->model->getGallery($this->view->page['id']);
        $this->view->render('page/index');
    }
    public function frame($url,$pic=true) {
        $this->view->js = array('page/js/custom.js');
        $this->view->url=$url;
        $this->view->page=$this->model->getPage($url);
        $this->view->render('page/frame');
    }
    public function section($url,$pic=true) {
        $this->view->js = array('page/js/custom.js');
        $this->view->url=$url;
        $this->view->page=$this->model->getPage($url);
        $this->view->gallery=$this->model->getGallery($this->view->page['id']);
        $this->view->render('page/section');
    }
    public function video($url,$pic=true) {
        $this->view->js = array('video/js/custom.js');
        $this->view->url=$url;
        $this->view->page=$this->model->getPage($url);
        $this->view->gallery=$this->model->getGallery($this->view->page['id']);
        $this->view->render('video/index');
    }
    public function map($url,$pic=true) {
        $this->view->js = array(
            'map/js/jquery.smoothzoom.js',
            'map/js/custom.js'); 
        $this->view->css = array('map/css/custom.css');
        $this->view->zoom=true;
        $this->view->url=$url;
        $this->view->page=$this->model->getPage($url);
        if($this->view->page['name_EN']=='Area'){
            $this->view->css = array('map/css/custom.css','map/css/map.css');
            $this->view->js[]='map/js/map.js';
        }
        $this->view->files=$this->model->getFiles($this->view->page['id']); 
        $this->view->gallery=$this->model->getGallery($this->view->page['id']);
        $this->view->render('map/index');
    }
    public function gallery($url,$pic=true) {
        $this->view->js = array('gallery/js/sly.js','gallery/js/custom.js','gallery/js/jquery.backgroundpos.min.js');
        $this->view->css = array('gallery/css/horizontal.css');
        $this->view->url=$url;
        $this->view->page=$this->model->getPage($url);
        $this->view->gallery=$this->model->getGallery($this->view->page['id']);
        $this->view->render('gallery/index');
    }
    public function images($url,$pic=true) {
        $this->view->js = array('images/js/sly.js','images/js/custom.js','images/js/jquery.backgroundpos.min.js');
        $this->view->css = array('images/css/horizontal.css');
        $this->view->url=$url;
        $this->view->page=$this->model->getPage($url);
        $this->view->gallery=$this->model->getGallery($this->view->page['id']);
        $this->view->render('images/index');
    }
    public function panoramic($url='') {
        $this->view->js = array('panoramic/js/custom.js');
        $this->view->panoramic=$url;
        $this->view->render('panoramic/index',true);
    }
    
}