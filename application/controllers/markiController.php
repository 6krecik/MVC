<?php
 class markiController extends mainController
 {
     public function wypiszAction()
     {
         $Marki = new Marki();


         return $Marki->getMarki();
     }
 }