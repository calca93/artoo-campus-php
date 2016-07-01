<?php

   include_once 'Ruolo.php';
   include_once 'Utente.php';
   include_once 'Post.php';
   
   try{
      $utente1 = Utente::CreaUtente('Frenk', 'amministratore');
      $utente1 -> setEmail('emaildasdas@gail.com');
      
      $post1 = Post::CreaPost('Titolo', $utente1);
      var_dump($post1);
   } catch (Exception $e){ echo $e -> getMessage(); }
      
   
   