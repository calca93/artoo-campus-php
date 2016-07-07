<?php

   final class Application{
      #singleton: una e una sola istanza
      #non deve essere instanziabile
      #non deve essere estensibile
      
      private static $instance;
      
      public static function GetIstanza(){
         if(self::$instance == null)
            self::$instance = new self;
         
         return self::$instance;
      }
      
      /* .../controller/azione */
      public function run(){
         
      }
      
      private function __construct(){
         
      }
      
      
   }