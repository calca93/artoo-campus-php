<?php
   
   
   $servername = getenv('IP');
   $username = ('marco');
   $pass = 'ZSuXmVMBbbBRuUBx';
   $database = "c9";
   $dbport = 3306;
   
   require_once './Database.php';
   require_once './Ruolo.php';
   
   try{
      //Connection
      $db = new Database($servername, $username, $pass);
      
      //Query
      $result = $db -> getDatabases();
      //var_dump($result);
      
      $db -> useDatabase('c9');
      
      $tables = $db -> getTables();
      //var_dump($tables);
      
      // $records = $db -> getAllRecords('ruoli');
      // foreach($records as $numero_record => $dati_record){
      //    foreach($dati_record as $field => $value){
      //       echo "Record n. $numero_record -> $field : $value";
      //    }
      //    echo "<br />";
      // }
      // var_dump($records);
      
      $ruoli = Ruolo::getRoles($db);
      var_dump($ruoli);
         
      
      
      
      $db -> close();
   } catch(Exception $e){
      echo "Exception: ". $e -> getMessage() . " - Code: ". $e -> getCode();
   }
   
   
   
   
   // // la @ non permette alle funzioni di far visualizzare warnings
   // $db = @mysqli_connect($servername, $username, $pass);//, $database, $dbport);
   
   // if(mysqli_connect_errno() > 0)
   //    var_dump(mysqli_connect_error());
   // else
   //    echo "Connected successfully (". $db -> host_info .")";
      
      
   // $myDB = @new mysqli ($servername, $username, $pass, $database, $dbport);
   // if ($myDB->connect_error)
   //    die("Connection failed: " . $myDB->connect_error);
   // else 
   //    echo "Connected successfully (".$myDB->host_info.")";
      