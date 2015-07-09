<?php
 class markiController extends mainController
 {


     public function wypiszAction($auta = false)
     {


         $Marki = new Marki();

         $data=$Marki->getMarki();

         if($auta==false)
         {

             $this->view->data = $data;

             $this->view->display('marki');

         }

         elseif($auta==true)
         {
             return $data;
         }


     }


     public function wyswietlDodajAction()
     {
        //$this->info();
         $this->view->display( 'dodajMarke' );
     }

     public function zapiszAction()
     {
         $post = $this->request->getPost('marka');
         if(!empty($post))
         {

             $Marki = new Marki();


             if($Marki->zapiszMarki($post))
             {
                 $this->wypiszAction();
             }
             else
             {
                 header('Location: '. Url::getUrl('marki','wyswietlDodaj',array( 'info'=>'wystapil blad bazy danych')) );
             }

         }

         else
         {

            header('Location: '. Url::getUrl('marki','wyswietlDodaj',array( 'info'=>'nie podales marki')) );
         }


     }

     public function usunAction()
     {
         $id = $this->request->getParam('id');
         $Marki = new Marki();
         if($Marki->usunMarki($id))
         {
             header('Location: '. Url::getUrl('marki','wypisz',null) );
         }

         else
         {
             $this->view->info='wystapil blad bazy danych';
             header('Location: '. Url::getUrl('marki','wypisz',array( 'info'=>'wystapil blad bazy danych')) );
         }



     }

 }