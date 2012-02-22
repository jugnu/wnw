<?php

class Admin_ProductsController extends Zend_Controller_Action {

    public function init() {
        if (!Zend_Auth::getInstance()->hasIdentity()) {
            $this->_redirect('/admin/authentication/login');
        }
    }

    public function indexAction() {
        $this->view->title = 'Products';
        $productModel = new Admin_Model_Product();
        $products = $productModel->fetchAll()->toArray();
        $i = 0;
        $result = array();
        foreach ($products as $p) {
            $productRow = $productModel->find($p['id'])->current();
            $category = $productRow->findParentRow('Admin_Model_Category');
            $color = $productRow->findDependentRowset('Admin_Model_ProductColors')->toArray();
            $sizes = $productRow->findDependentRowset('Admin_Model_ProductSize')->toArray();

            $result[$i]['product'] = $p;
            $result[$i]['category'] = $category['cat_name'];
            $result[$i]['color'] = $color;
            $result[$i]['size'] = $sizes;

            $i++;
        }
        
        $paginator = new Zend_Paginator(new Zend_Paginator_Adapter_Array($result));
        $paginator->setItemCountPerPage('1')
                ->setCurrentPageNumber($this->_getParam('page', '1'));
        $this->view->paginator = $paginator;
    }

    public function addAction() {
        $this->view->title = 'Add Product';
        $form = new Admin_Form_AddProduct();

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($form->isValid($_POST)) {
                $product = new Admin_Model_Product();
                $date = new Zend_Date();

                $row = $product->createRow($form->getValues());
                $current_date = $date->get(Zend_Date::ISO_8601);
                $row->created_on = $current_date;
                $row->updated_on = $current_date;
                if ($row->save()) {
                    $this->view->message = "Congratulations !";
                    $this->_forward('confirmation');
                }
            }
        }

        $form->setMethod('post');
        $form->setAction(Zend_Controller_Front::getInstance()->getBaseUrl() . '/admin/products/add');
        $this->view->form = $form;
    }

    public function confirmationAction() {
        // action body
        echo 'aaaaaaaaaaaaaaaaaaaaa';
    }

}

