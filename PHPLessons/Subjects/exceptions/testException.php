<?php

   //final indica che la classe non è piu estendibile
   final class NonStringaException extends Exception {
      public function __construct(){
         $this -> message = "Il parametro non e' una stringa";
         $this -> code = 666;
      }
   }
   
   function len ($string){
      if(is_string($string))
         return strlen($string);
      throw new NonStringaException ();
   }
   
      function printlen($string){
      $len = len($string);
      echo "la stringa è lunga $len";
   }
   
   try {
      printlen(1);
   // } catch (NonStringaException $e){
   //    echo "Errore: {$e -> getMessage()} ({$e -> getCode()})";
   } catch (Exception $e){ // Tutte le eccezioni non gestite finiscono qui
      if($e instanceof NonStringaException)
         var_dump('NonStringaException');
      elseif ($e instanceof Exception)
         var_dump('Exception');
   } finally {
      echo 'Finally';
   }
   
   $a = 0;
   var_dump($a);