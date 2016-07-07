<?php
   
   class Post{
      private $titolo;
      private $user;
      
      private function __construct($title, $user){
         $this -> titolo = $title;
         $this -> user = $user;
      }
      
      public static function CreaPost($title, $user){
         if(!is_string($title))
            throw new Exception ("Titolo non stringa");
         if(!($user instanceof Utente))
            throw new Exception ("User non valido");
         
         return new Post ($title, $user);
            
      }
      
   }