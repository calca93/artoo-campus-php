<?php
   
   include_once 'Utente.php';
   
   class UtenteConEmail extends Utente {
      
      private $email = 'dsada@fsd';
      
      // Anchesso override del costruttore della superclass
      // Se non definisco questo costruttore, prende quello della superclass
      // Nel caso sia definito quindi, blocca la ricerca del costruttore a 
      // risalita nei parents
      public function __construct($username, $email){ 
         var_dump('Costruita instanza della classe UtenteConEmail');
         
         //$this->setUsername($username);
         parent::__construct($username);
         
         $this->email = $email;
      }
      
      //OVERRIDE del metodo della superclasse
      public function getUsername(){
         return parent::getUsername() . ' <' . $this->email . '>';
      }
      
      // Return dell'attributo protected della superclass
      public function test(){
         var_dump($this->test);
         return $this->test;
      }
   }

?>