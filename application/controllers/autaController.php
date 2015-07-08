<?php

class autaController extends mainController
{
    public function listAction()
    {

        $Cars = new Cars();


        $this->view->data = $Cars->getAuta();


        $this->view->display( 'auta' );
    }

    public function usunAction()
    {

        $id = $this->request->getParam('id');
        $Cars = new Cars();
        $Cars->deleteAuta($id);
        $this->listAction();

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
        $this->listAction();

    }

    public function wyswietlDodajAction()
    {
        $marka=new markiController();
        $this->view->data = $marka->wypiszAction();
        $this->view->display( 'dodajAuto' );
    }

    public function dodajAction()
    {
        $this->view->display( 'dodajAuto' );
        if(isset( $this->request['nazwa'])  && isset($this->request['opis']) && isset($this->request['marka']))
        {
            $marka=new markiController();

        }

    }

}