<?php

   class SiteController extends Controller{
      
      public $layout = 'main';
      
      public function actionHome(){
         
         // $this -> layout = 'main2';
         
         $utenti = array('pippo', 'pluto', 'severino');
         
         #render
         self::render('home', array('utenti' => $utenti, 'titolo' => 'Home Page'));
      }
   }