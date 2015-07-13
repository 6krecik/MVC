<?php

class userController extends mainController
{

    public function wyswietlLogowanieAction()
    {
       $this->view->display('logowanie');
    }

    public function logujAction()
    {
        $login = $this->request->getPost('login');
        $haslo = sha1($this->request->getPost('haslo'));
        $User= new Users();
        $User = $User->loguj($login, $haslo);
        if(empty($User))
        {
            header('Location: '. Url::getUrl('user','wyswietlLogowanie',array( 'info'=>'bledne dane logowanie')) );
        }
        else
        {

            $this->UserStorage->setUserData(array($login));
            header('Location: '. Url::getUrl('auta','list',null) );
        }

    }

    public function wyswietlRejestracjeAction()
    {
        $this->view->display('rejestracja');
    }

    public function rejestrujAction()
    {
        $login=$this->request->getPost('login');
        $haslo=sha1($this->request->getPost('haslo'));
        $haslo2=sha1($this->request->getPost('haslo2'));
        $User = new Users();

        if (!empty($User->sprawdzCzyWBazie($login)))
        {
            header('Location: '. Url::getUrl('user','wyswietlRejestracje',array( 'info'=>'podany uzytkownik juz istnieje')) );
            die();
        }

        if($haslo!=$haslo2)
        {
            header('Location: '. Url::getUrl('user','wyswietlRejestracje',array( 'info'=>'podane hasla sie nie zgadzaja')) );
            die();
        }

        if(!empty($login) && !empty($haslo) && !empty($haslo2));
        {
            IF($User->zapiszRejestracje($login, $haslo))
            {
                header('Location: '. Url::getUrl('user','wyswietlLogowanie',array( 'info'=>'jestes zarejestrowany zaloguj sie')) );
            }
            else
            {
                header('Location: '. Url::getUrl('user','wyswietlRejestracje',array( 'info'=>'problem z baza')) );
            }
        }
    }


    public function wylogujAction()
    {
        $this->UserStorage->logout();
        header('Location: '. Url::getUrl('user','wyswietlLogowanie',array( 'info'=>'zostales wylogowany')) );
    }




}