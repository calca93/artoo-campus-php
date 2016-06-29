<?php

abstract class Object {
   
   public function funzione(){
      var_dump('test');
   }
   
   abstract public function test2(array $params);
   
   abstract public function getString();
}