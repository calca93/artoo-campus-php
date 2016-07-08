<html>
   <head>
      <title><?= $titolo ?></title>
   </head>
   <body>
      <?php
         echo "<h2> $titolo </h2>";
         
         echo '<ul>';
         foreach($utenti as $v)
            echo " <li>$v</li> <br />";
         echo '</ul>';
         
      ?>
   </body>
</html>