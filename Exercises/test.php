<?php

   // Include_once permette di importare piu volte la stessa risorsa
   // senza dare errori
include_once './classes/Utente.php';
   include_once './classes/UtenteConEmail.php';
   
   $utente1 = new Utente('Pape');
   // var_dump($utente1->getUsername());
   
   
   $utente2 = new UtenteConEmail('Frank','ciccio@azz.it');
   // $utente2->username = 'pippo'; //Crea variabile pubblica con nome username
   // var_dump($utente2->getUsername);
   // var_dump($utente2->test());
   var_dump($utente2->getUsername());
   
   var_dump(Utente::getVersion());
   
   var_dump(Utente::getN());
   
   var_dump(Utente::VERSION);
   

?>