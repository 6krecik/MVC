<?php


class mainController
{
    public $request;

    public $view;

    public $layout;

    public $UserStorage;

    public function __construct()
    {

        $this->request = new Request();

        $this->view = new View();

        $this->layout = new Layout();

        $this->UserStorage = new UserStorage();

        $this->layout->info= (!empty($this->request->getParam('info')))? $this->request->getParam('info') :null;

        $this->layout->UserStorage = $this->UserStorage;

        $controller = $this->request->getParam('controller');

        $action = $this->request->getParam('action');



        if(!$this->UserStorage->isAuthenticate() && $controller!= 'user' && $action != 'wyswietlLogowanie' && $action != 'loguj' && $action!= 'wyswietlRejestracje' && $action!= 'rejestruj')
        {

            header('Location: '. Url::getUrl('user','wyswietlLogowanie',array( 'info'=>'musisz sie zalogowac')) );


        }
        else
        {

            //$this->layout->wyloguj='<a href="'.Url::getUrl( 'user', 'wyloguj', null  ).'">wyloguj</a>&nbsp;</br>';

        }

    }




}
