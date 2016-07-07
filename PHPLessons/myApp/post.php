<?php
   require_once './classes/Database.php';
   require_once './classes/Ruolo.php';
   require_once './classes/Utente.php';
   require_once './classes/Post.php';
   
   $servername = getenv('IP');
   $username = ('marco');
   $pass = 'ZSuXmVMBbbBRuUBx';

   $db = new Database($servername, $username, $pass);
   $db->useDatabase('myApp');
   
   $title = 'Posts';
   $message = null;
   
   $utenti = Utente::GetAll($db);
   $posts = Post::GetAll($db);
   // var_dump($posts);
   
   if(count($_POST) > 0){
      $ok = Post::CreaNuovoPost($db, $_POST);
      
      $message = (is_string($ok) ? 'Errore nel creare il post: '. $ok : 'Post creato!');
      
      if(is_integer($ok))
         // header("Location: /myApp/utente.php?utenteid=" .$ok);
         var_dump($ok);
      elseif(is_string($ok))
         $message = $ok;
      
   }
   
   
   
   require './views/post-view.php';
?>
