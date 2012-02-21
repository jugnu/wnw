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

        $this->view->products = $result;
    }

    public function addAction() {
        // action body
    }

}

