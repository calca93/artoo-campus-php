<?php

   class SiteController extends Controller{
      
      public function actionHome(){
         
         $utenti = array('pippo', 'pluto', 'severino');
         
         #render
         self::render('home', array('utenti' => $utenti, 'titolo' => 'Home Page'));
      }
   }