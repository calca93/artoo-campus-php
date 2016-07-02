<?php 

   class Ruolo {
      public $RuoloID;
      public $Nome;
      public $Colore;
      private static $nome_tabella = "ruoli";
      
      
      public static function getRoles(Database $database){
         $records =  $database -> getAllRecords(self::$nome_tabella);
         
         var_dump($records);
         
         $data = array();
         
         foreach($records as $n => $obj){
            $r = new Ruolo();
            $r -> RuoloID = $obj -> RuoloID;
            $r -> Nome = $obj -> Nome;
            $r -> Colore = $obj -> Colore;
            
            $data[] = $r;
         }
         
         return $data;
      }
   }