<?php

   include_once './trait/Trait1.php';
   include_once './trait/Trait2.php';
   include_once './classes/Utente.php';
   
   class testTrait extends Utente{
      
      use Trait1, Trait2{
         Trait2::getString insteadof Trait1;
         Trait1::getString as getString2;
      }
      
      // public function getString(){ //Sovrascrive i due TRAIT
      //    return 'CLASS GETSTRING';
      // }
      
   }
   
   $t1 = new TestTrait('Frank');
   $t1 -> attr1 = 'pippo';
   var_dump($t1->getString());
   var_dump($t1->getString2());