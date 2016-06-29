<?php

   function params($base){
      
      $sum = $base;
      for($i=1, $n = func_num_args(); $i < $n ; $i++)
         $sum += (int) func_get_arg($i);
         
      return $sum;
   }
   
   var_dump(params(20, 1,2,3,4,5,6));


?>