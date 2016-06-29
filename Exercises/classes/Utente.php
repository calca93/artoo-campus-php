<?php

class Utente {
   
   //non accessibile direttamente dalle istanze
   private $username = 'default value'; 
   
   // visibile
   public $abilitato = true;
   
   //Visibile non dalle istanze ma solo dalle sottoclassi
   protected $test = 'ciao'; 
   
   public function __construct($username){
      $this->username = $username;
   }
   
   public function getUsername(){
      return $this->username;
   }
   
   public function setUsername($name){
      if(is_string($name))
         $this->username = $name;
   }
}



?>