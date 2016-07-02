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
   echo "Connected successfully (".$db->host_info.")\n\n";
    
   
   
   $sql ="";
      
   $result = $db->query($sql);
   if($result->num_rows == 0)
      echo 'not found';
   else
      echo 'found';
   
   // //CREAZIONE TABELLA
   // $sql = "CREATE TABLE MyGuests (
   //    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
   //    firstname VARCHAR(30) NOT NULL,
   //    lastname VARCHAR(30) NOT NULL,
   //    email VARCHAR(50),
   //    reg_date TIMESTAMP
   //    )";
   
   // if ($db->query($sql) === TRUE) {
   //     echo "Table MyGuests created successfully";
   // } else {
   //     echo "Error creating table: " . $conn->error;
   // }
    
   $db->close();
   
?>