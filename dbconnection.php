<!-- # start MySQL. Will create an empty database on first start-->
<!-- $ mysql-ctl start-->
 
<!-- # stop MySQL-->
<!-- $ mysql-ctl stop-->
 
<!-- # run the MySQL interactive shell-->
<!-- $ mysql-ctl cli-->
<?php
   $servername = getenv('IP');
   $username = getenv('C9_USER');
   $password = "";
   $database = "c9";
   $dbport = 3306;
   
   // Create connection
   $db = new mysqli($servername, $username, $password, $database, $dbport);
   
   if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
   } 
   echo "Connected successfully (".$db->host_info.")";
    
   
   if ($db->query("
      CREATE TABLE Persons
      (
         PersonID int,
         Name varchar(255),
      )")
   ) {
      echo ("Table Persons successfully created.\n");
   }
   $result;
   if($result = $db->query("INSERT INTO Personas VALUES (01, 'Marco'")){
      echo ("Record added");
   }
   
   if ($result = $db->query("SELECT Name FROM Persons LIMIT 10")) {
      echo ("Select returned %d rows.\n". $result->num_rows);

      /* free result set */
      $result->close();
   }
   
   echo ("Select returned %d rows.\n". $result->num_rows);
    
    $db->close();
?>