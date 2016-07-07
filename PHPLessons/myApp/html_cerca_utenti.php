


<?php if(is_string($utenti)): ?>

   <span style="color: red;"><?php $utenti ?></span>
   
<?php else : ?>

   <?php if(count($utenti) > 0) : ?>
   
      <ul>
         <?php foreach($utenti as $u) : ?>
         <li>
            <a href="/myApp/utente.php?utenteid=<?= $u -> UtenteID; ?>">
               <?= $u -> NomeUtente ?>
            </a>
         </li>
         <?php endforeach; ?>
      </ul>
   
   <?php else: ?>
   
      <em>La ricerca non ha prodotto risultati</em>
      
   <?php endif; ?>

<?php endif; ?>
