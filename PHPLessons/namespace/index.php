<?php

   namespace mionamespace{
      
      //Questa classe definita fuori dal namespace darebbe errore
      class Exception{
         
      }
      
      function connect(){
         throw new \mionamespace\Exception;
      }
   }
   
   
   namespace mionamespace\db {
      class Exception{
         
      }
   }
   
   $ex = new Exception;//Global exception
   $ex1 = new \mionamespace\Exception;//Namespaces exceptions
   $ex2 = new \mionamespace\db\Exception;