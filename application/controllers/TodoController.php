<?php

class TodoController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        $todos = new Application_Model_TodoMapper();
        $this->view->entries = $todos->fetchAll();

    }

    public function createAction()
    {
        $request = $this->getRequest();
        $form    = new Application_Form_Todo();
 
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $comment = new Application_Model_Todo($form->getValues());
                $mapper  = new Application_Model_TodoMapper();
                $mapper->save($comment);
                return $this->_helper->redirector('index');
            } else {
                //echo '<pre>';print( $form->isValid($request->getPost() ) );echo '</pre>';
                //echo '<pre>';print_r( $form->isValid($request->getPost() ) );echo '</pre>';
                //die( 'post is invalid' );
            }
        }
 
        $this->view->form = $form;
    }

    public function storeAction()
    {
        // action body
    }

    public function editAction()
    {
        
        // action body
        $id = (int) $this->getParam( 'id' );
        $form    = new Application_Form_Todo( array( 'id' => $id ));
        
        $todo = new Application_Model_Todo();
        $todos = new Application_Model_TodoMapper();
        $todos->find( $id, $todo );
        
        if ($this->getRequest()->isPost()) {
            $request = $this->getRequest();

            if ($form->isValid($request->getPost())) {

                //echo 'Update::<pre>';print_r( $form->getValues() );echo '</pre>';
                $comment = new Application_Model_Todo($form->getValues());
                $mapper  = new Application_Model_TodoMapper();
                $mapper->save($comment);
                return $this->_helper->redirector('index');
            }
        }

        $form->populate( $todo->getForm() );
        $this->view->form = $form;

    }

    public function viewAction()
    {
        $id = (int) $this->getParam( 'id' );

        $todo = new Application_Model_Todo();
        $todos = new Application_Model_TodoMapper();
        $todos->find( $id, $todo );

        $this->view->todo = $todo;

    }

    public function destroyAction(){
        $id = (int) $this->getParam( 'id' );

        $todo = new Application_Model_Todo();
        $todos = new Application_Model_TodoMapper();
        $todos->find( $id, $todo );
        if( $todo && $todos->delete( $todo->id ) ){
            $this->_helper->json( ['code' => 1, 'msg' => 'todo is deleted!!!', 'todo-id' => $todo->id ] );
        }
        // return response json not view
        $this->_helper->json( ['code' => 0, 'msg' => 'Fatal Error on system!!!'] );
    }


}











