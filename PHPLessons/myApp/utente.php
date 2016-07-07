<?php
   require_once './classes/Database.php';
   require_once './classes/Ruolo.php';
   require_once './classes/Utente.php';
   
   session_start();
   
   $servername = getenv('IP');
   $username = ('marco');
   $pass = 'ZSuXmVMBbbBRuUBx';
   
   $db = new Database($servername, $username, $pass);
   $db->useDatabase('myApp');
   
   $ruoli = Ruolo::getRoles($db);
   $title = 'utente';
   $message = null;
   $dati = null;
   $nuovo = true;
   
   
   var_dump($_POST);
   $errore = null;
   if(count($_POST) > 0){
      $dati = $_POST;
      
      $ok = Utente::CreaOAggiornaUtente($db, $_POST);
      if(isset($_POST['UtenteID']) && (int) $_POST['UtenteID'] > 0)
         $nuovo = false;
         
      
      if(is_integer($ok))
         header("Location: /myApp/utente.php?utenteid=" .$ok);
      elseif(is_string($ok))
         $message = $ok;
         
   }
   elseif(count($_GET) > 0){
      if (isset($_GET['utenteid'])) :
         $utente = Utente::LeggiUtente($db, $_GET['utenteid']); # oggetto di classe Utente
         if ($utente == null) :
            $errore = "ERRORE: utente inesistente...";
         elseif (is_string($utente)) :
            $errore = "ERRORE: " . $utente;
         else :
            $nuovo = false;
            $dati = array();
            $dati['ruolo'] = $utente->RuoloID;
            $dati['nomeutente'] = $utente->NomeUtente;
            $dati['nome'] = $utente->Nome;
            $dati['cognome'] = $utente->Cognome;
            $dati['email'] = $utente->Email;
            $dati['abilitato'] = $utente->Abilitato;
         endif;
    endif;
   }
   
   
?>
<html>
   
   <?-- HEAD  -->
   <?php 
      require'./html/head.html' 
   ?> 
   
   <body>
      
      <?php require './html/navBar.html' ?>
      
      <?php if($message !== null) echo "<div>$message</div>"; ?>
      
      <?php if(isset($_SESSION['messaggio_utente'])) { ?>
         <div>
            <?php
               echo $_SESSION['messaggio_utente'];
               unset($_SESSION['messaggio_utente']);
            ?>
         </div>
         <?php } ?>
      
      <div class="container jumbotron">
         
         
         <?php if ($errore == null) : var_dump($dati); ?>
         
         <form action="" method="post">
            <input name="utenteid" type="hidden"
               value="<?php echo isset($_GET['utenteid']) ? $_GET['utenteid'] : null; ?>" />
            <label>Ruolo</label>
            
            <select name="ruolo">
            <?php foreach ($ruoli as $ruolo) : ?>
               <option value="<?php echo $ruolo->RuoloID; ?>"
                  <?php echo isset($dati['ruolo']) && $ruolo->RuoloID == $dati['ruolo'] ? 'selected="selected"' : null; ?>>
                  <?php echo $ruolo->Descrizione; ?>
               </option>
            <?php endforeach; ?>
            </select><br />
            
            <label>Nome utente</label>
            <input name="nomeutente" type="text" 
               value="<?php echo isset($dati['nomeutente']) ? $dati['nomeutente'] : null; ?>" /><br />
            
            <label>Nome</label>
            <input name="nome" type="text"
               value="<?php echo isset($dati['nome']) ? $dati['nome'] : null; ?>" /><br />
            
            <label>Cognome</label>
            <input name="cognome" type="text"
               value="<?php echo isset($dati['cognome']) ? $dati['cognome'] : null; ?>" /><br />
            
            <label>Email</label>
            <input name="email" type="text" 
               value="<?php echo isset($dati['email']) ? $dati['email'] : null; ?>" /><br />
            
            <label for="abilitato">Abilitato</label>
            <input id="abilitato" name="abilitato" type="checkbox" 
            
            <?php echo isset($dati['abilitato']) && $dati['abilitato'] ? 'checked' : null ?> />
            <br />
            <button type="submit"><?php echo $nuovo ? 'Crea nuovo utente' : 'Aggiorna utente'; ?></button>
         </form>
         
         <?php else : ?>
            <div style="color: red;"><?= $errore; ?></div>
         <?php endif; ?>
         
      </div>
   </body>
</html>