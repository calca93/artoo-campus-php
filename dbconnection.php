<!-- # start MySQL. Will create an empty database on first start-->
<!-- $ mysql-ctl start-->
 
<!-- # stop MySQL-->
<!-- $ mysql-ctl stop-->
 
<!-- # run the MySQL interactive shell-->
<!-- $ mysql-ctl cli-->

<!--mysql> CREATE TABLE utenti (-->
<!--    -> UtenteID INT UNSIGNED AUTO_INCREMENT,-->
<!--    -> NomeUtente VARCHAR(255) NOT NULL,-->
<!--    -> Email VARCHAR (255) NULL,-->
<!--    -> Ruolo VARCHAR (50)-->
<!--    -> ,PRIMARY KEY (UtenteID));-->
<!--Query OK, 0 rows affected (0.02 sec)-->

<!--mysql> CREATE TABLE ruoli (-->
<!--    -> RuoloID INT UNSIGNED AUTO_INCREMENT,-->
<!--    -> Nome VARCHAR (50),-->
<!--    -> Colore VARCHAR (20),-->
<!--    -> PRIMARY KEY (RuoloID));-->
<!--Query OK, 0 rows affected (0.01 sec)-->

<!--mysql> ALTER TABLE ruoli ADD UNIQUE(Nome);-->
<!--Query OK, 0 rows affected (0.02 sec)-->
<!--Records: 0  Duplicates: 0  Warnings: 0-->

<!--mysql> INSERT INTO ruoli(Nome) VALUES ('Amministratore'), ('Editore'), ('Utente');                                                        -->
<!--Query OK, 3 rows affected (0.01 sec)-->
<!--Records: 3  Duplicates: 0  Warnings: 0-->

<!--ALTER TABLE  `utenti` CHANGE  `Ruolo`  `RuoloID` INT( 10 ) NULL DEFAULT NULL ;-->


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