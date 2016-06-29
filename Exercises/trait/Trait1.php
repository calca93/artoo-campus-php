<?php


   trait Trait1 {
      
      public $attr1 = 'default';
      
      public function func1(){
         var_dump($this -> attr1);
      }
      
      public function getString(){
         return 'TRAIT 1';
      }
   }