<?php

class Admin_Model_Category extends Zend_Db_Table_Abstract {

    protected $_name = 'categories';
    protected $_dependentTables = array('Admin_Model_Product');

//    protected $_referenceMap = array(
//        'category' => array(
//            'columns' => array('parent_id'),
//            'refTableClass' => 'Admin_Model_Category',
//            'refColumns' => array('id'),
//            'onDelete' => self::CASCADE,
//            'onUpdate' => self::RESTRICT
//        )
//    );

    public function getCategories() {

        $select = $this->select()->from($this)->order('parent_id ASC');
        $result = $this->fetchAll($select);
        $catArray = array();
        
        foreach ($result as $val) {
            $catArray[] = array(
                'id' => $val->id,
                'cat_name' => $this->getPath($val->id)
            );
        }
        return $catArray;
    }
    public function getPath($category_id){
        
        $category = $this->find($category_id);
        if($category[0]['parent_id']){
            return $this->getPath($category[0]['parent_id']).' > '.$category[0]['cat_name'];
        }else{
            return $category[0]['cat_name'];
        }
    }
    
    

}

