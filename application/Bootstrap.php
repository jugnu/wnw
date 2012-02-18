<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initAutoload() {

        //Initializing default module//
        $modelLoader = new Zend_Application_Module_Autoloader(array(
                    'namespace' => '',
                    'basePath' => APPLICATION_PATH . '/modules/default'));

        /// checking current user and setting the name to registry
        if (Zend_Auth::getInstance()->hasIdentity()) {
            Zend_Registry::set('username', Zend_Auth::getInstance()->getStorage()->read()->username);
        } else {
            Zend_Registry::set('username', 'guest');
        }

        ///getting module name from current request///
        $layout = explode('/', $_SERVER['REQUEST_URI']);
        if (in_array('admin', $layout)) {
            $layout_dir = 'admin';
        } else {
            $layout_dir = 'layout';
        }

//        ///setting layout based on current module///
        $options = array(
            'layout' => $layout_dir,
            'layoutPath' => APPLICATION_PATH . "/layouts/scripts/" . $layout_dir,
        );
        Zend_Layout::startMvc($options);

        return $modelLoader;
    }

    function _initViewHelper() {

        ///// defining view helpers to use in our layout/////
        $this->bootstrap('layout');
        $layout = $this->getResource('layout');



        $view = $layout->getView();

        $view->doctype('HTML4_STRICT');

        $view->headMeta()->appendHttpEquiv('content-type', 'text/html;cahrset=utf-8')
                ->appendName('description', 'Using Zend view Helper');

        $view->headTitle()->setSeparator(' - ');
        $view->headTitle('Wear and Walk');

        $view->admin = Zend_Registry::get('username');
    }

}

