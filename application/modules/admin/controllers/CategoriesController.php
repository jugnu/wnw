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
        if ($request->isPost()) {
            if ($form->isValid($_POST)) {
                $date = new Zend_Date();
                $current_date = $date->get(Zend_Date::ISO_8601);
                $category = new Admin_Model_Category();
                $row = $category->createRow();
                $row->cat_name = $form->getValue('name');
                $row->parent_id = $form->getValue('category');
                $row->created_on = $current_date;
                $row->updated_on = $current_date;
//                $row->save();
                if($row->save()){
                    $this->view->message = 'Congratulations! category added';
                    $this->_forward('confirmation');
                }
            }
        }

        $this->view->form = $form;
    }

    public function confirmationAction()
    {
        // action body
    }


}



