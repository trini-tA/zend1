<?php

class Application_Form_Todo extends Zend_Form{

    public function __contruct(  ){
      //It is required to call the parent contructor, else the form will not work
      parent::__contruct();
    }

    public function init(){

        $this->setMethod('post');
        $this->setAttrib('id', 'edit-todo')
            ->setAttrib('class', 'form');

        //We don't want the default decorators
        $this->setDisableLoadDefaultDecorators(true);

        $this->addDecorator('FormElements')
            //->addDecorator('HtmlTag', array('tag' => 'div') )
            ->addDecorator('Form');

        if( !empty( $this->_attribs['id']) && $this->_attribs['id'] > 0 ){
            $this->addElement('hidden', 'id', array());
        }

        
         // Add the comment element
         /*
            <div class="form-group row">
                <label for="comment" class="col-4 col-form-label">Todo comment</label> 
                <div class="col-8">
                <textarea id="comment" name="comment" cols="40" rows="5" class="form-control" required="required"></textarea>
                </div>
            </div> 
         */
         $this->addElement('text', 'title', array(
            'label'      => 'Please Title:',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 255))
            ),
            /*'decorators' => array(
                'Errors',
                array( 'HtmlTag', array('tag' => 'div', 'class' => 'col-8') ),
                array('Label', array('class' => 'col-4 col-form-label')),
                array('ViewHelper', array( 'ViewHelper',
                    //array(array('data' => 'HtmlTag'),  array('tag' =>'div', 'class'=> 'element')),
                    //array(array('emptyrow' => 'HtmlTag'),  array('tag' =>'div', 'class'=> 'element', 'placement' => 'PREPEND')),
                    //array(array('row' => 'HtmlTag'), array('tag' => 'div'))
                    )
                ),
                new Zend_Form_Decorator_HtmlTag( array('tag' => 'div', 'class' => 'form-group row') ),
            )*/
        ));
        
        // Add the comment element
        $this->addElement('textarea', 'comment', array(
            'label'      => 'Please Comment:',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 255))
                )
        ));
 
        // Add a captcha
        $this->addElement('captcha', 'captcha', array(
            'label'      => 'Please enter the 5 letters displayed below:',
            'required'   => true,
            'captcha'    => array(
                'captcha' => 'Figlet',
                'wordLen' => 5,
                'timeout' => 300
            )
        ));
 
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Save',
        ));
 
        // And finally add some CSRF protection
        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));

        $this->setElementDecorators(
            array(
                array('Label', array('class' => 'col-4 col-form-label')),
                array( 'ViewHelper', array('class' => 'form-control')),
                new Zend_Form_Decorator_HtmlTag( array('tag' => 'div', 'class' => 'form-group row') ),
            ), 
            array( 'title', 'comment' )
        );

    }
}

