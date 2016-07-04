<?php
   require_once './classes/Database.php';
   require_once './classes/Ruolo.php';
   require_once './classes/Utente.php';
   
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
   if(count($_POST) > 0){
      $dati = $_POST;
      
      $ok = Utente::CreaNuovoUtente($db, $_POST);
      
      if($ok === true)
         $message = 'OK! Utente creato';
      elseif(is_string($ok))
         $message = $ok;
         
   }
   elseif(count($_GET) > 0){
      $nuovo = false;
      $utente = Utente::LeggiUtente($db, $_GET['UtenteID']);
      var_dump($utente);
   }
   
   
?>
<html>
   
   <?-- HEAD  -->
   <?php require'./html/head.html' ?> 
   
   <body>
      
      <?php require './html/navBar.html' ?>
      
      <?php if($message !== null) echo "<div>$message</div>"; ?>
      
      <div class="container jumbotron">
         
         <form class="form-group" action="" method="POST">
         
            <label>Ruolo</label>
            <select  class="form-control" name="ruolo" type="text">
               <?php foreach($ruoli as $i => $ruolo) {?>
               <option value="<?= $ruolo->RuoloID ?>"><?= $ruolo->Descrizione ?></option>
               <?php } ?>
            </select><br />
            
            <label>Nome utente</label>
            <input 
               class="form-control" 
               name="nomeutente" 
               type="text" 
               value="<?php echo isset($dati['nomeutente']) ? $dati['nomeutente'] : null ; ?>"
            >
            </input><br />
            
            <label>Nome</label>
            <input 
               class="form-control" 
               name="nome" 
               type="text"
               value="<?php echo isset($dati['nome']) ? $dati['nome'] : null ; ?>"
            >
            </input><br />
            
            <label>Cognome</label>
            <input 
               class="form-control" 
               name="cognome" 
               type="text"
               value="<?php echo isset($dati['cognome']) ? $dati['cognome'] : null ; ?>"
            >
            </input><br />
            
            <label>Email</label>
            <input 
               class="form-control" 
               name="email" 
               type="text"
               value="<?php echo isset($dati['email']) ? $dati['email'] : null ; ?>"
            >
            </input><br />
            
            <label>Abilitato</label>
            <input 
               type="checkbox" 
               name="abilitato"
               <?php echo isset($dati['abilitato']) ? 'checked' : null ; ?>"
            >
            </input><br />
            
            <button class="btn btn-default" type="submit"><?php echo $nuovo ? 'Crea' : 'Modifica' ?></button>
         </form>
         
      </div>
   </body>
</html>