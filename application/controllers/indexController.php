<?php

class indexController extends mainController

{


    public function indexAction()
    {

        $this->view->test = 123;
        $this->view->display( 'index' );
    }

    public function listmarkiAction()
    {

        $Cars = new Cars();

        $this->Cars = $Cars;

        $this->view->data = $Cars->getMarki();


        $this->view->display( 'marki' );
    }



}