<?php
   // $a = array('a' => 1, 'b' => 2);
   // echo json_encode($a);
   
   // Restituisce tutti i record della tabella utenti
   // che hanno il valore NomeUtente 'simile' al testo ricercato
   // Return array di oggetti di classe Utente
   
   require_once './classes/Database.php';
   require_once './classes/Ruolo.php';
   require_once './classes/Utente.php';
   
   $servername = getenv('IP');
   $username = ('marco');
   $pass = 'ZSuXmVMBbbBRuUBx';

   $db = new Database($servername, $username, $pass);
   $db->useDatabase('myApp');
   
   $utenti = Utente::CercaUtenti($db, $_GET);
   
   require 'html_cerca_utenti.php';
   
   // $a = array(
   //    'error' => 0,
   //    'data' => null,
   // );
   
   // if(is_string($utenti)){
   //    $a['error'] = $utenti;
   // }
   // else {
   //    $a['data'] = $utenti;
   // }   
   // echo json_encode($a);
?>