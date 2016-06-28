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
    
    echo $db->query("SELECT *;");
    
    $db->close();
?>