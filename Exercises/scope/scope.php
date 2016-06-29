<?php

   include 'vars.php';
   
   $arr = require 'return.php';
   
   var_dump($arr);
   
   $json = json_decode(require 'json.php');
   var_dump(($json));
?>