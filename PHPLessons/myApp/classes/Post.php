<?php

   class Post {
      
      public $PostID;
      public $Creato;
      public $Modificato;
      public $Titolo;
      public $Contenuto;
      public $UtenteID;
      public $Utente; #oggetto di classe Utente corrispondente
      private static $nome_tabella = 'Posts';


      public static function CreaNuovoPost(Database $db, array $parametri){
         try{
            $parametri['titolo'] = self::CleanString($parametri['titolo']);
            $parametri['contenuto'] = self::CleanString($parametri['contenuto']);
            
            
            $query = "INSERT INTO ". self::$nome_tabella ." (Creato, Titolo, Contenuto, UtenteID)
               VALUES (".
               "NOW(),
               '{$parametri['titolo']}',
               '{$parametri['contenuto']}',
               '{$parametri['utenteid']}'
               )";
            $db -> executeQuery($query);
            return true;
            
            
         }catch(Exception $e){
            switch ($e->getCode()) :
               
               case 1062:
               return "Nome utente già utilizzato!";
               
               default :
               return $e->getMessage() . ' (' . $e->getCode() . ')';
            endswitch;
         }
      }
      
      public static function GetAll(Database $db){
         try{
            
            //Query ottimizzata per le prestazioni
            // $query = "
            //    SELECT Posts.*, Utenti.Creato AS UCreato, Utenti.Modificato AS UModificato 
            //    FROM Posts
            //    JOIN Utenti USING (UtenteID)
            //    ORDER BY Posts.Creato DESC";
            
            $query = "SELECT * FROM ". self::$nome_tabella;
            $posts = $db -> executeQuery($query);
            $data = array();
            
            foreach($posts as $p){
               $obj = new Post;
               foreach($p as $k => $v){
                  $obj -> $k = $v;
               }
               
               $p -> Utente = Utente::LeggiUtente($db, $p -> UtenteID);
               
               $obj -> Utente = $p -> Utente;
               
               $data[] = $obj;
            }
            
            return $data;
         }catch(Exception $e){
            switch ($e->getCode()) :
               
               case 1062:
               return "Nome utente già utilizzato!";
               
               default :
               return $e->getMessage() . ' (' . $e->getCode() . ')';
            endswitch;
         }
      }
      
      private static function CleanString($string){
         return str_replace("'","''", $string);
      }
      
      public static function EliminaPostDiUtente(Database $db, $id){
         try{
            $query = "
               DELETE 
               FROM ". self::$nome_tabella ."
               WHERE UtenteID=". (int) $id ."
               ";
            $db -> executeQuery($query);
            return true;
            
         }catch(Exception $e){
            throw $e;
            switch ($e->getCode()) :
               
               case 1062:
               return "Nome utente già utilizzato!";
               
               default :
               return $e->getMessage() . ' (' . $e->getCode() . ')';
            endswitch;
         }
      }
   }
?>