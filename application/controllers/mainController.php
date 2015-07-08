<?php


class mainController
{
    public $request;

    public $view;

    public function __construct()
    {
        $this->request = new Request();

        $this->view = new View();

    }


}
