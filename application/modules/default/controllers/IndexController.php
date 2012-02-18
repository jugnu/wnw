<?php

class Default_IndexController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $this->view->headMeta()->appendName('keywords', 'framework, PHP, productivity');
        // action body
        $this->view->headTitle('Home');
    }

}

