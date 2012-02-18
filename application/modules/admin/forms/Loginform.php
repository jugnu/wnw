<?php

class Admin_Form_Loginform extends Zend_Form {

    public function init($options = null) {
        /* Form Elements & Other Definitions Here ... */
        $this->setName("Login");

        $username = new Zend_Form_Element_Text('username');
        $username->setLabel('User Name:')
                ->setRequired();
//
        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('password')
                ->setRequired(TRUE);

        $login = new Zend_Form_Element_Submit('submit');
        $login->setLabel('login');

        $this->addElements(array($username, $password, $login));
        $this->setMethod('post');
        $this->setAction(Zend_Controller_Front::getInstance()->getBaseUrl() . '/admin/authentication/login');
    }

}

