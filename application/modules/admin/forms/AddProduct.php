<?php

class Admin_Form_AddProduct extends Zend_Form {

    public function init() {
        $category = new Admin_Model_Category();
        $data = $category->getCategories();
        $select = new Zend_Form_Element_Select('category_id');

        $select->setLabel('Choose Category');
        $select->setRequired(TRUE);
        $select->addMultiOption('', '- - -');
        foreach ($data as $val) {
            $select->addMultiOption($val['id'], $val['cat_name']);
        }

        $name = new Zend_Form_Element_Text('title');
        $name->setLabel('Product Titile');
        $name->setRequired();

        $description = new Zend_Form_Element_Textarea('description');
        $description->setLabel('Description');
        $description->setAttrib('rows', '5')
                ->setAttrib('cols', '30');

        $material = new Zend_Form_Element_Text('material');
        $material->setLabel('Material');
        $material->setRequired();

        $price = new Zend_Form_Element_Text('price');
        $price->setLabel('price');
        $price->setRequired();

        $Discounted_price = new Zend_Form_Element_Text('discountPrice');
        $Discounted_price->setLabel('Discounted Price');
        $Discounted_price->setRequired();

        $units_in_stock = new Zend_Form_Element_Text('units_in_stock');
        $units_in_stock->setLabel('Units in Stock');
        $units_in_stock->setRequired();

        $active = new Zend_Form_Element_Radio('is_active');
        $active->addMultiOptions(array(
            '1' => 'Active'
        ));
        $active->setAttrib('checked', 'checked');

        $featured = new Zend_Form_Element_Radio('is_featured');
        $featured->addMultiOptions(array(
            '1' => 'featured'
        ));
        

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Add');

        $this->addElements(array($select, $name, $description, $material, $price, $Discounted_price, $units_in_stock, $active, $featured, $submit));
    }

}

