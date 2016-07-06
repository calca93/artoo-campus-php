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
            $query = "SELECT * FROM ". self::$nome_tabella;
            $posts = $db -> executeQuery($query);
            $data = array();
            foreach($posts as $p){
               $obj = new Post;
               foreach($p as $k => $v){
                  $obj -> $k = $v;
               }
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
   }
?>