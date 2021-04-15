<?php

$router = Zend_Controller_Front::getInstance()->getRouter();

$router->addRoute(
    'todo-edit',
    new Zend_Controller_Router_Route('todo/edit/:id',
                                     array('controller' => 'todo',
                                           'action' => 'edit'))
);
$router->addRoute(
    'todo-view',
    new Zend_Controller_Router_Route('todo/:id',
                                     array('controller' => 'todo',
                                           'action' => 'view'))
);

$router->addRoute(
    'user',
    new Zend_Controller_Router_Route('user/:username',
                                     array('controller' => 'user',
                                           'action' => 'info'))
);

/*
$route = new Zend_Controller_Router_Route(
    'todo',
    array(
        'controller' => 'todo',
        'action'     => 'index'
    ) 
);
$router->addRoute('todo', $route);*/
