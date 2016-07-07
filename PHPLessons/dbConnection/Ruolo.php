<?php 

   class Ruolo {
      public $RuoloID;
      public $Descrizione;
      private static $nome_tabella = "ruoli";
      
      
      public static function getRoles(Database $database){
         $records =  $database -> getAllRecords(self::$nome_tabella);
         var_dump($records);
         
         $data = array();
         
         foreach($records as $n => $obj){
            $r = new Ruolo();
            $r -> RuoloID = $obj -> RuoloID;
            $r -> Descrizione = $obj -> Descrizione;
            
            $data[] = $r;
         }
         
         return $data;
      }
   }