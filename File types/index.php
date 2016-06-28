<?php
   $booleano = true;
   $booleano1 = FALSE;
   
   $intero = 432;
   $intero_ottale = 0321;
   $intero_esadecimale = 0x53abc;
   $intero_binario = 0b0101;
   
   $float1 = 0.523;
   $float = 1e2;
   $float = 3.14E-2;
   
   $stringa1 = 'Ciao"\n';
   echo $stringa;
   
   $stringa = "cia'o!\n\r\t";
   $stringa[0] = 'C';
   
   echo strlen($stringa);
   
   $array = array(1=>10,2=>20,3=>30);
   $array2 = [1,2,3];
   
   var_dump($intero);
   var_dump($stringa1);
   
   var_dump($array[0]);
   var_dump($array2[0]);
   
   $array = array('1'=>10,'2'=>20,'2'=>30);
   var_dump($array['2']);
   
   $array = [1, 6=>2, 3];
   var_dump($array);

   $array = ['num1'=>1, 'num3'=>2, 'num4'=>3, 80];
   var_dump($array);
   
   $array = [
      'num1'=>1,
      'num3'=>2,
      'num4'=>3,
      80=>array(
         'a'=>1,
         'b'=>array(
            0=>'pippo',
            1=>'pluto',
         )
      )
   ];
   var_dump(($array));
   var_dump(($array[80]['b'][1]));
   
   
?>