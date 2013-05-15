<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('index/js/jquery.ez-bg-resize.js','index/js/custom.js');
    }
    
    function index() {
        $attr = array(
            'col' => 'name',
            'id' => 'Home'
        );
        $template = $this->model->getTemplatebyCol($attr);
        $attr = array(
            'col' => 'template',
            'id' => $template['id']
        );
        $this->view->page = $this->model->getPageByCol($attr);
        $this->view->gallery = $this->model->getGallery($this->view->page['id']);
        $this->view->render('index/index');
    }
    
}