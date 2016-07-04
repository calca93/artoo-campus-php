<?php

   class Utente {
      public $UtenteID;
      public $Creato;
      public $Modificato;
      public $RuoloID;
      public $NomeUtente;
      public $Nome;
      public $Cognome;
      public $Email;
      public $Abilitato;
      private static $nome_tabella = 'Utenti';
      
      public static function CreaNuovoUtente(Database $db, array $parametri){
         try{
            $parametri['nomeutente'] = self::CleanString($parametri['nomeutente']);
            $parametri['nome'] = self::CleanString($parametri['nome']);
            $parametri['cognome'] = self::CleanString($parametri['cognome']);
            $parametri['email'] = self::CleanString($parametri['email']);
            
            $query = "
               INSERT INTO Utenti (Creato, RuoloID, NomeUtente, Nome, Cognome, Email, Abilitato) 
               VALUES (
                  NOW(), 
                  '{$parametri['ruolo']}', 
                  '{$parametri['nomeutente']}', 
                  '{$parametri['nome']}', 
                  '{$parametri['cognome']}', 
                  '{$parametri['email']}', ".
                  (isset($parametri['abilitato']) ? 1 : 0) ."
               )";
            $ok = $db->executeQuery($query);
            return true;
         }catch (Exception $e){
            switch($e->getCode()){
               case 1062:
                  return "Nome utente gia utilizzato";
               default:
                  return $e -> getMessage() ." : ". $e -> getCode();
            }
         }   
         return $ok;
      }
      
      private static function CleanString($string){
         return str_replace("'","''", $string);
      }
      
      public static function LeggiUtente(Database $db, $id){
         try{
            $result = $db -> executeQuery("SELECT * FROM Utenti WHERE UtenteID = ". (int) $id);
            $utente = null;
            
            foreach($result as $r){
               $utente = new Utente;
               foreach($r as $prop => $value){
                  $utente -> $prop = $value;
               }
            }
            return $utente;
            
         }catch (Exception $e){
            return $e -> getMessage() ." : ". $e -> getCode();
         }
      }
   }
?>