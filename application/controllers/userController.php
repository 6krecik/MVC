<?php

class userController extends mainController
{

    public function wyswietlAction()
    {
       $this->view->display('loguj');
    }

    public function logujAction()
    {
        $login = $this->request->getPost('login');
        $haslo = sha1($this->request->getPost('haslo'));
        $User= new Users();
        if(empty($User->loguj($login, $haslo)))
        {
            header('Location: '. Url::getUrl('user','wyswietl',array( 'info'=>'bledne dane logowanie')) );
        }
        else
        {
            header('Location: '. Url::getUrl('user','wyswietl',array( 'info'=>'zalogowales sie')) );
        }

    }

}