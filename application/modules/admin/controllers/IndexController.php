<?php

class Admin_IndexController extends Zend_Controller_Action {

    public function init() {
        if (!Zend_Auth::getInstance()->hasIdentity()) {
            $this->_redirect('/admin/authentication/login');
        }
        /* Initialize action controller here */
    }

    public function indexAction() {
        $this->view->title = 'Home';
        // action body
    }

}

