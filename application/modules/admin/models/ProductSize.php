<?php

class Admin_Model_ProductSize extends Zend_Db_Table_Abstract {

    protected $_name = 'product_sizes';
    protected $_referenceMap = array(
        'products' => array(
            'columns' => array('product_id'),
            'refTableClass' => 'Admin_Model_Product',
            'refColumns' => array('id'),
            'onDelete' => self::CASCADE,
            'onUpdate' => self::RESTRICT
        )
    );

}

