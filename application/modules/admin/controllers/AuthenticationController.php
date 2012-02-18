<?php

class Admin_AuthenticationController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
//        if (Zend_Auth::getInstance()->hasIdentity()) {
//            $this->_redirect('/admin/index');
//        }
    }

    public function indexAction() {

// action body
    }

    public function loginAction() {

        $this->_helper->layout()->disableLayout();


        $form = new Admin_Form_Loginform();

        $request = $this->getRequest();
        if ($request->isPost()) {
            if ($form->isValid($this->_request->getPost())) {
                $authAdapter = $this->getAuthAdapter();
                $username = $form->getValue('username');
                $password = $form->getValue('password');
                $authAdapter->setIdentity($username)
                        ->setCredential($password);

                $auth = Zend_Auth::getInstance();
                $result = $auth->authenticate($authAdapter);

                if ($result->isValid()) {
                    $identity = $authAdapter->getResultRowObject();

                    $authStorage = $auth->getStorage();
                    $authStorage->write($identity);
//                    $this->_redirect("/");
                    $this->_helper->redirector('index', 'index');
                } else {
                    $this->view->errorMessage = 'user name or password is wrong';
                }
            }
        }

        $this->view->form = $form;
    }

    private function getAuthAdapter() {
        $authAdapter = new Zend_Auth_Adapter_DbTable(Zend_Db_Table::getDefaultAdapter());
        $authAdapter->setTableName('users')
                ->setIdentityColumn('username')
                ->setCredentialColumn('password');
        return $authAdapter;
    }

    public function logoutAction() {
        Zend_Auth::getInstance()->clearIdentity();
        $this->_redirect('/');
    }

}

