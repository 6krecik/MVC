<?php

class autaController extends mainController
{
    public function listAction()
    {

        $Cars = new Cars();
        $page = $this->request->getParam( 'page', 1 );
        $limit = 10;
        $from = ( $page - 1 ) * $limit;

        $this->view->pagerConfig = array
        (
            'url' => Url::getUrl( 'auta', 'list', array
            (
                'page' => 'key_page'

            )),
            'count' => $Cars->carCount($this->request->getParam('id_marki')),
            'pack' => $limit,
            'page' => $page
        );

        if(!empty($this->request->getParam('id_marki')))
        {
            $this->view->pagerConfig['url'] = Url::getUrl('auta', 'list', array('page' => 'key_page', 'id_marki'=>$this->request->getParam('id_marki')));
        }

        $this->view->data = (!empty($this->request->getParam('id_marki')))? $Cars->getData( $from, $limit, $this->request->getParam('id_marki') ):$Cars->getData( $from, $limit );
        $this->view->id_marki=$this->request->getParam('id_marki');


        $this->view->display( 'auta' );
    }

/*
    public function listAction()
    {

        $Cars = new Cars();


        $this->view->data = $Cars->getAuta();


        $this->view->display( 'auta' );
    }
*/

    public function usunAction()
    {

        $id = $this->request->getParam('id');
        $Cars = new Cars();
        $Cars->deleteAuta($id);
        if(empty($this->request->getParam('id_marki')))
        {

            header('Location: '. Url::getUrl('auta','list',null) );
        }
        else
        {
            header('Location: '. Url::getUrl('auta','list',array('id_marki'=> $this->request->getParam('id_marki'))) );

        }

    }

    public function edytujAction()
{

        $id = $this->request->getParam('id');

        $this->view->id_edycja=$id;

        $Cars = new Cars();

        $this->view->data = $Cars->getAuta();

        $this->view->display('edycjaAuta');
}


    public function zapiszEdycjeAction()
    {

        $post = $this->request->getPost();

        $file = $this->request->getFiles();

        $auta_id = $this->request->getParam('id');


        if(!empty($post['nazwa']) || !empty($post['opis']) || !empty($file['zdjecie']['name'])) {

            $nazwa = '';
            $opis = '';
            $zdjecie = '';
            $przecinek = '';

            $baza_nazwa = '';
            $baza_opis = '';
            $baza_zdjecie = '';

            If (!empty($post['nazwa'])) {
                $nazwa = "'" . $post['nazwa'] . "'";
                $baza_nazwa = "nazwa=";
                $przecinek = ',';
            }

            If (!empty($post['opis'])) {
                $opis = "'" . $post['opis'] . "'";
                $baza_opis = $przecinek . ' opis=';
                $przecinek = ',';
            }

            If (!empty($file['zdjecie']['name'])) {
                $new_name = time() . $file['zdjecie']['name'];
                $zdjecie = "'" . $new_name . "'";
                $baza_zdjecie = $przecinek . ' zdjecie=';
                $image = WideImage::load('zdjecie');
                $resized = $image->resize(400, 300);
                $resized->saveToFile("./images/" . $new_name . "");
                $resized = $image->resize(10, 10);
                $resized->saveToFile("./images/mini" . $new_name . "");

            }



            $Cars = new Cars();

           if($Cars->zapiszEdycjeAuta($nazwa, $opis, $zdjecie, $baza_nazwa, $baza_opis, $baza_zdjecie, $auta_id) && isset($post['zdjecie']) && !empty($file['zdjecie']['name']))
           {
              unlink('./images/' . $post['zdjecie']);
               unlink('./images/mini' . $post['zdjecie']);
           }

            //$this->view->display('index');

           // $this->listAction();


        }
        header('Location: '. Url::getUrl('auta','list',null) );


    }


    public function wyswietlDodajAction()
    {
        $marka=new markiController();

        $this->view->data = $marka->wypiszAction(true);

        $this->view->display( 'dodajAuto' );
    }


    public function dodajAction()
    {

        $post = $this->request->getPost();

        $file = $this->request->getFiles();

        if(isset($post['nazwa'])  && isset($post['opis']) && isset($post['marka']))
        {
            if (!empty($file['zdjecie']['name']))
            {
                $file['zdjecie']['name'] = time() . $file['zdjecie']['name'];
            }

            $tab = array
            (
            'nazwa'=>$post['nazwa'],
            'opis'=>$post['opis'],
            'marka'=>$post['marka'],
            'zdjecie'=>$file['zdjecie']['name']

            );

            $Cars = new Cars();

            if($Cars->zapiszAuta($tab))
            {
                if (!empty($file['zdjecie']['name'])) {
                    $image = WideImage::load('zdjecie');
                    $resized = $image->resize(400, 300);
                    $resized->saveToFile("./images/" . $file['zdjecie']['name'] . "");
                    $resized = $image->resize(10, 10);
                    $resized->saveToFile("./images/mini" . $file['zdjecie']['name'] . "");
                }

                header('Location: '. Url::getUrl('auta','list',null) );
            }

            else
            {
                $this->view->info ='nie udalo sie';
                $this->wyswietlDodajAction();
                header('Location: '. Url::getUrl('auta','wyswietlDodaj',array( 'info'=>'nie udalo sie')) );
            }

        }

    }

    public function  wyswietlKategorieAction()
    {
        $id= $this->request->getParam('id');
        $Cars= new Cars();
        $this->view->data = $Cars->getKategorieAuta($id);
        $this->view->display( 'auta' );

    }

}