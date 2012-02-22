<?php

class Admin_Model_Product extends Zend_Db_Table_Abstract {

    protected $_name = 'products';
    protected $_dependentTables = array('Admin_Model_ProductColors', 'Admin_Model_ProductSize');
    protected $_referenceMap = array(
        'category' => array(
            'columns' => array('category_id'),
            'refTableClass' => 'Admin_Model_Category',
            'refColumns' => array('id'),
            'onDelete' => self::CASCADE,
            'onUpdate' => self::RESTRICT
        )
    );

}

