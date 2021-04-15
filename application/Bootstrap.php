<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');

        // https://framework.zend.com/manual/1.12/fr/learning.view.placeholders.standard.html
        //$view->headLink()->prependStylesheet('/css/global.css');

        //$view->headScript()->prependFile('/js/site.js');
    }

    protected function _initRoutes(){
        $router = Zend_Controller_Front::getInstance()->getRouter();
        include APPLICATION_PATH . "/configs/routes.php";
    }

}

