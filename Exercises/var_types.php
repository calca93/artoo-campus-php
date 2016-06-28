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
   // echo $stringa;
   
   // $stringa = "cia'o!\n\r\t";
   // $stringa[0] = 'C';
   
   // echo strlen($stringa);
   
   // $array = array(1=>10,2=>20,3=>30);
   // $array2 = [1,2,3];
   
   // var_dump($intero);
   // var_dump($stringa1);
   
   // var_dump($array[0]);
   // var_dump($array2[0]);
   
   // $array = array('1'=>10,'2'=>20,'2'=>30);
   // var_dump($array['2']);
   
   // $array = [1, 6=>2, 3];
   // var_dump($array);

   // $array = ['num1'=>1, 'num3'=>2, 'num4'=>3, 80];
   // var_dump($array);
   
   // $array = [
   //    'num1'=>1,
   //    'num3'=>2,
   //    'num4'=>3,
   //    80=>array(
   //       'a'=>1,
   //       'b'=>array(
   //          0=>'pippo',
   //          1=>'pluto',
   //       )
   //    )
   // ];
   // var_dump(($array));
   // var_dump(($array[80]['b'][1]));
   
   // unset($array['num1']);
   // $array['num1'];
   // echo isset($array['num1']);
   // echo count($array);
   // echo is_array($array);
   
   // $b = array_reverse($array);
   // array_search(40, $array);
   // $a = array_merge($$array, $array2);
   // rsort($$array);
   // $ks = array_keys($array);
   
   //----------------------------------------------------
   
   //Recupera il primo ed il penultimo valore dell'array
   $array = array(
      'Lu'=>'Lunedì',
      'Ma'=>'Martedì',
      'Me'=>'Meroledì',
      'Gi'=>'Giovedì',
      'Ve'=>'Venerdì',
      'Sa'=>'Sabato',
      'Do'=>'Domenica',
   );
   
   
   $i = 0;
   $length = count($array)-2;
   foreach($array as $x => $x_value) {
      if($i == 0 || $i == $length)
         var_dump($x_value);
      $i++;
   }
   
   //----------------------------------------------------
   
   $a = 'pippo';
   $b = &$a;
   $a = 'pluto';
   var_dump($b);
   
   //----------------------------------------------------
   
   $stringa = "Mi chiamo $a";
   $stringa = "Mi chiamo {$a}s";
   $stringa = "Mi chiamo {$array[10]}s";
   
   //----------------------------------------------------
   
   const COSTANTE = 'pippo';
   var_dump(COSTANTE);
   define(COSTANTE, 'pluto');//questa non funziona
   var_dump(COSTANTE);
   var_dump(__FILE__);
   
?>