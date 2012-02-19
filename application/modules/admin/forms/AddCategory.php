<?php

class Admin_Form_AddCategory extends Zend_Form {

    public function init() {
        /* Form Elements & Other Definitions Here ... */
        $category = new Admin_Model_Category();
        $data = $category->getCategories();
        $select = new Zend_Form_Element_Select('category');
        $select->setRequired(TRUE);
        $select->setLabel('Choose Parent Category');
        $select->addMultiOption('0', 'Parent');
        foreach ($data as $val) {
            $select->addMultiOption($val['id'], $val['cat_name']);
        }

        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Category name');
        $name->setRequired(TRUE);

        $login = new Zend_Form_Element_Submit('submit');
        $login->setLabel('Add');
        
        $this->addElements(array($select, $name,$login));

        $this->setMethod('post');
        $this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl() . '/admin/categories/add');
    }

}

