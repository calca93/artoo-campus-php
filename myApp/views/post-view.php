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
               <option value="0">--- Seleziona un utente ---</option>
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
      
      
      
      <!-- lista post -->
      <?php if(is_array($posts)) :?>
      
         <ul style="list-style-type: none">
            <?php foreach($posts as $p) : ?>
            <li style="border-style: solid; border-width: 1px; margin-bottom: 5px;">
               <div>
                  <div>
                     <p><?= $p -> Utente -> NomeUtente ?> - <?= $p -> Creato ?></p>
                  </div>
                  <div style="font-size: 20px; font-style: italic"><?= $p -> Titolo ?></div>
                  <div><?= $p -> Contenuto ?></div>
               </div>
            </li>
            <?php endforeach; ?>
         </ul>
         
      <?php else :?>
      
      <?php endif; ?>
      
   </body>
   
   <?php
      $file = 'js/post.js';
      require_once './html/footer.php'
   ?>
</html>