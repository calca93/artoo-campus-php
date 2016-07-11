<?php

   class TabellaDatabase {
      
      protected static $nomeTabella;
      
      
      public static function FindByPk($pk){
         $db = Application::GetIstanza() -> db;
         $query = "SELECT * FROM ". static::$nomeTabella ." WHERE ". static::GetPk() .' = '. $pk;
         
         $result = $db -> query($query);
         if($result -> num_rows != 1){
            return null;
         }
         
         $result = $result -> fetch_object();
         
         $obj = new static;
         // $a = static::class;
         // $obj = $a;
         
         
         foreach($result as $k => $v)
            $obj -> $k = $v;
         
         
         return $obj;
      }
      
      protected function GetPk(){
         $db = Application::GetIstanza() -> db;
         
         $query = "SHOW COLUMNS FROM ". static::$nomeTabella;
         $result = $db -> query($query) -> fetch_all();
         foreach($result as $row)
            foreach($row as $k => $v)
               if($k == 3 && $v == 'PRI')
                  return ($row[0]);
      }
      
      public static function FindAll($order = null){
         $db = Application::GetIstanza() -> db;
         
         $query = "SELECT * FROM ". static::$nomeTabella;
         if($order)
            $query .= " ORDER BY ". $order;
            
         $result = $db -> query($query);
         
         if($result -> num_rows > 0){
            $data = array();
            
            while(($r = $result -> fetch_object()) != null ){
               $obj = new static;
               foreach ($r as $k => $v)
                  $obj -> $k = $v;
               $data[] = $obj;
            }
            var_dump($data);
            return $data;
         }
      }
      
      public function FindByCondition($order = null, $condition){
         $db = Application::GetIstanza() -> db;
         
         $query = "SELECT * FROM ". static::$nomeTabella. " WHERE ". $condition;
         if($order)
            $query .= " ORDER BY ". $order;
            
         $result = $db -> query($query);
         
         if($result -> num_rows > 0){
            $data = array();
            
            while(($r = $result -> fetch_object()) != null ){
               $obj = new static;
               foreach ($r as $k => $v)
                  $obj -> $k = $v;
               $data[] = $obj;
            }
            
            return $data;
         }
      }
   }