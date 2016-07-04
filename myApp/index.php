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
         <?php if(count($array) > 0){ ?>
            
               <ul>
                  <?php foreach($array as $k => $elem) { ?>
                     <li> <?= "$k : $elem" ?> </li>
                  <?php } ?>
               </ul>
               
         <?php } else { ?>
               <p>Non ci sono elementi nell'array</p>;
         <?php } ?>
      
      </div>
   </body>
</html>