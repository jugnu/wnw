<?php

class Admin_CategoriesController extends Zend_Controller_Action
{

    public function init()
    {
        if (!Zend_Auth::getInstance()->hasIdentity()) {
            $this->_redirect('/admin/authentication/login');
        }
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        echo '<pre>';
        $category = new Admin_Model_Category();
        $result = $category->getCategories();
        $this->view->cat = $result;
        
    }

    public function addAction()
    {
        
        $form = new Admin_Form_AddCategory();
        $request = $this->getRequest();
        if($request->isPost()){
            print_r($form->getValue('name'));
        }
        
        $this->view->form = $form;
    }


}



