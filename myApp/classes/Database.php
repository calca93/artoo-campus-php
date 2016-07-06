<?php

   class Database extends mysqli{
      private $_servername;
      private $_username;
      private $_pass;
      private $_database;
      private $_dbport;
      
      public function __construct($servername, $username, $pass){
         @parent::__construct($servername, $username, $pass);
         
         $this -> _servername = $servername;
         $this -> _username = $username;
         $this -> _pass = $pass;
         
         if($this -> connect_errno > 0)
            throw new Exception ($this -> connect_error, $this -> connect_errno);
      }
      
      public function getTables(){
         return $this -> executeQuery("SHOW TABLES");
      }
      
      public function getAllRecords($table){
         return $this -> executeQuery("SELECT * FROM $table");
      }
      
      public function getDatabases(){
         return $this -> executeQuery("SHOW DATABASES");
      }
      
      public function useDatabase($database){
         return $this -> executeQuery("USE $database");
      }
      
      public function executeQuery($query){
         //Query execution
         $result = $this -> query($query);
         
         //There is error?
         if($this -> errno > 0){
         //IF yes
            throw new Exception ($this -> error, $this -> errno);
         }
         else{
            if($result instanceof mysqli_result){
               // return $result -> fetch_all();
               $data = array();
               while(($r = $result -> fetch_object()) != null)
                  $data[] = $r;
               return $data;
            }
            else 
               return true;
         }
      }
      
   }