<?php


class mainController
{
    public $request;

    public $view;

    public $layout;

    public function __construct()
    {
        $this->request = new Request();

        $this->view = new View();

        $this->layout = new Layout();

        $this->layout->info= (!empty($this->request->getParam('info')))? $this->request->getParam('info') :null;

    }




}
