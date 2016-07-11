<?php

   class SiteController extends Controller{
      
      public $layout = 'main';
      
      public function actionHome(){
         
         $utenti = array('pippo', 'pluto', 'severino');
         
         Utente::FindByPk(1);
         Utente::FindAll();
         
         #render
         self::render('home', array('utenti' => $utenti, 'titolo' => 'Home Page'));
      }
   }