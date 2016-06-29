<?php

   if(true){
      function prova($string1, $string2 = null)/* :string per specificare il tipo in casting del valore di ritorno (PHP7)*/{
         
         if(!function_exists('prova2')){
            function prova2 ($string){
               return strtoupper($string);
            }
         }
         
         if($string2 == null)
            return $string1;
         else
            return $string1 . $string2;
      }
      
      
      function upper(&$string1, $string2 = null){ //passaggio del primo parametro per riferimento
         $string1 = strtoupper($string1);
         return $string1;
      }
      
      function mySort(array $a){//il parametro deve essere un array
         
      }
   }
   
   // function decremento($intero){
   //    if($intero < 0)
   //       return;
         
   //    var_dump($intero);
   //    $intero--;
   //    decremento($intero);
   // }
   // decremento(10);
   
   
   
   $a = prova('Mar');
   $a = prova2($a);
   var_dump($a);
   
   $a = prova('Mar', 'co');
   var_dump($a);
   
   
   $nome = 'Nome';
   var_dump(upper($nome, 'Congome'));
   var_dump($nome);
   
   
   
   
?>