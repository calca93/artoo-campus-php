<?php

   $array = $_SERVER;
   $host = $_SERVER['HTTP_HOST'];
   
   $title = 'PAGGINA';


?>
<html>
   
   <?-- HEAD  -->
   <?php require'./html/head.html' ?> 
   
   <body>
      
      <?php require './html/navBar.html' ?>
      
      <div>
         <p><a href="/myApp/utente.php">CREA NUOVO UTENTE</a></p>
      </div>
   </body>
</html>