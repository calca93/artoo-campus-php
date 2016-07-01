<?php

   class Iterabile implements Iterator {
      
      private $arr;
      private $i = 0;
      private $n;
      private $keys;
      
      public function __construct(array $param){
         $this -> arr = $param;
         $this -> n = count($param);
         $this -> keys = array_keys($param);
      }
      
      public function current(){
         return (string) $this -> arr[$this -> keys[$this -> i]];
      }
      
      public function key(){
         return $this -> keys[$this -> i];
      }
      
      public function next(){
         $this -> i++;
      }
      
      public function rewind(){
         $this -> i = 0;
      }
      
      public function valid(){
         return ($this -> i < $this -> n);
      }
      
   }