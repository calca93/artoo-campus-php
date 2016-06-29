<?php

include_once 'Object.php';
include_once './interfaces/Component.php';

class Utente extends Object implements Component{
   
   const VERSION = '1.0 const';
   
   //non accessibile direttamente dalle istanze
   private $username = 'default value'; 
   
   // visibile
   public $abilitato = true;
   
   //Visibile non dalle istanze ma solo dalle sottoclassi
   protected $test = 'ciao';
   
   // static quindi non modificabile e uguale per tutte le instanze
   private static $version = '1.0';
   
   // variabile che tiene conto del numero di instanze create dalla classe
   private static $n = 0;
   
   public function __construct($username){
      $this->username = $username;
      self::$n ++;
   }
   
   public function getUsername(){
      return $this->username;
   }
   
   public function setUsername($name){
      if(is_string($name))
         $this->username = $name;
   }
   
   public static function getVersion(){
      // return $this.version; // sbagliato
      return Utente::$version;
   }
   
   public static function getN(){
      return self::$n;
   }
   
   public function test2(array $param){
      ;
   }
   
   public function getString(){
      
   }
   
   public function getInteger(array $array){
      return 1;
   }
}



?>