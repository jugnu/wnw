<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class MyApp_Plugin_Module extends Zend_Controller_Plugin_Abstract {

    public function preDispatch(Zend_Controller_Request_Abstract $request) {
        die('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa');
        $module = $request->getModuleName();
        $layout = Zend_Layout::getMvcInstance();

        // check module and automatically set layout
        $layoutsDir = $layout->getLayoutPath();
        var_dump($layoutsDir);
        // check if module layout exists else use default
//        if (file_exists($layoutsDir . DIRECTORY_SEPARATOR . $module . ".phtml")) {
//            $layout->setLayout($module);
//        } else {
//            $layout->setLayout("default");
//        }
    }

}

?>
