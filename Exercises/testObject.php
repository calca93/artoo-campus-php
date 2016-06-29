<?php

   include_once './classes/Object.php';
   include_once './classes/Utente.php';
   
   function prova (Object $obj){
      $obj->getString();
      // if($obj instanceof Object)
      //    return 'OK';
      
      // return 'Errore';
   }
   
   $utente = new Utente('pippo');
   var_dump(prova($utente)); // Un'instanza di utente ritorna OK