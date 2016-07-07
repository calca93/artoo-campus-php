<?php

class Utente{
   private $nome;
   private $ruolo; // INT
   private $email;
   
   private function __construct($name, $intRuolo) {
      $this->nome = $name;
      $this->ruolo = $intRuolo;
   }
   
   public static function CreaUtente($name, $role){
      //Controllo che i paramtri siano stringhe
      if(!is_string($name) || !is_string($role))
         throw new Exception ("Parametri non validi");
      
      // Porto le stringhe lowercase per un controllo generico
      $arr = array_map('strtolower', Ruolo::getRuoli());
      $role = strtolower($role);
      
      // Cerco la stringa role nell'array dei ruoli e mi prendo la chiave
      $key = array_search($role, $arr);
      
      // Se trovo la chiave creo l'oggeto e lo ritorno
      if($key != false)
         return new Utente ($name, $key);
         
      throw new Exception("Ruolo non trovato");
   }
   
   public function setEmail ($email){
      if (!filter_var($email, FILTER_VALIDATE_EMAIL))
         throw new Exception ("Email non valida");
      $this -> email = $email;
   }
   
   public function getEmail (){
      return $this -> $email;
   }
   
}