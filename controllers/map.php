<?php

class Map extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array(
            'map/js/modernizr.custom.17475.js',
            'map/js/jquery.elastislide.js',
            'map/js/jquery.masonry.js',
            'map/js/jquery.smoothzoom.js',
            'map/js/zoom.js',
            'map/js/custom.js');  
    }
    function index() {
        $this->view->render('error/index');
    }
    public function view($url,$pic=true) {
        $this->view->zoom=true;
        $this->view->url=$url;
        $this->view->page=$this->model->getPage($url);
        $this->view->gallery=$this->model->getGallery($this->view->page['id']);
        $this->view->render('map/index');
    }
    

}