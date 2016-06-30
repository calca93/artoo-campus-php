<?php

   class Prova{
      
      public $var = 'aaa';
      private static $i = 0;
      private static $instance;
      
      private function __construct($param){
         
      }
      
      // Funzione statica usata per controllare i parametri in ingresso
      // Se i parametri sono ok, richiama il costruttore e crea l'oggetto
      // Il costruttore necessita essere dichiarato "PRIVATE" per rendere
      // efficace questo metodo !!!
      public static function getInstance($param){
         if(!is_int($param))
            throw new Exception("Parametro non intero");
            
         // IF che permette la creazione di un solo oggetto di questa classe
         // if(self::$i == 0){
         //    self::$i ++;
         //    return new Prova($param);
         // }
         
         // IF che restituisce sempre la stessa instanza
         if(self::$instace == null)
            self::$instance = new Prova($param);
            
         return self::$instance;
      }
      
   }
   
   
   $a = Prova::getInstance('ureure');