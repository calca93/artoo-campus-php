<?php

include_once './iterator/Iterabile.php';

$iterabile = new Iterabile(array(
   1 => 312,
   '321as' => array(1,2,3),
   true,
));

foreach ($iterabile as $k => $v){
   // echo "$k : $v <br />";
   var_dump($k);
   var_dump($v);
}

