<?php

class Team extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('team/js/jquery.ez-bg-resize.js','team/js/custom.js');
    }
    
    function index() {
        $this->view->render('team/index');
    }
    
}