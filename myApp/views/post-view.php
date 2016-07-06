<html>
   
   <?-- HEAD  -->
   <?php require'./html/head.html' ?> 
   
   <body>
      
      <?php require './html/navBar.html' ?>
      
      <!-- form post -->
      <?php if(is_array($utenti) && count($utenti) > 0) : ?>
         
         <form action="" method="post">
            <label>Utente</label>
            <select name="utenteid">
               <?php foreach($utenti as $u) : ?>
                  <option value="<?= $u -> UtenteID ?>">
                     <?= $u -> NomeUtente ?>
                  </option>
               <?php endforeach; ?>
            </select><br />
            
            <label>Titolo</label>
            <input id="text_titolo" type="text" name="titolo"></input><br />
            
            <label>Contenuto</label>
            <textarea name="contenuto" rows="3" cols="50"/></textarea><br />
            
            <button id="button_crea" class="submit" type="submit">Crea</button>
            
         </form>
         
      <?php else: ?>
         <em>Lista utenti non disponibile</em>
      <?php endif; ?>
      
      <?php if($message !== null) echo "<div>$message</div>"; ?>
      
   </body>
   
   <?php
      $file = 'js/post.js';
      require_once './html/footer.php'
   ?>
</html>