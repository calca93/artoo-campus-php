<?php

   final class Application{
      #singleton: una e una sola istanza
      #non deve essere instanziabile
      #non deve essere estensibile
      
      private static $instance;
      private $_config;
      public $db;
      
      private function __construct(){
         
      }
      
      public static function GetIstanza(array $config = null){
         if(self::$instance == null)
            self::$instance = new self;
            
         if(self::$instance -> _config == null)
            self::$instance -> _config = $config;
         
         if(isset($config['db'])){
            
            // Create connection
            self::$instance -> db = new mysqli(
               $config['db']['host'], 
               $config['db']['user'], 
               $config['db']['password'], 
               $config['db']['database']
               );
         }
         
         if((self::$instance -> db -> connect_errno ) > 0 )
            throw new Exception (self::$_instance -> db -> connect_error, self::$instance -> db -> connect_errno);
         
         return self::$instance;
      }
      
      /* .../controller/azione */
      public function run(){
         $script = str_replace("index.php", "", $_SERVER['SCRIPT_NAME']);
         $ca = str_replace($script, "", $_SERVER['REQUEST_URI']);
         
         $ca = self::_elaboraRichiesta($ca);
      

         $cartella = str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']);
         $controller = self::_primaLetteraMaiuscola($ca['controller']).'Controller';
         $controllerFile = $controller . '.php';
         
         if(file_exists($cartella .'/controllers/' . $controllerFile)){
            
            require_once 'controllers/' . $controllerFile;
            
            if(class_exists($controller)){
               $metodo = 'action'. self::_primaLetteraMaiuscola($ca['action']);
               
               if(method_exists($controller, $metodo)){
                  $c = new $controller;
                  $c -> _controller = $ca['controller'];
                  $c -> $metodo();
               }
               else die('Azione '. $ca['action'] .' non presente nella classe '. $controller);
            }
            else die('Classe '. $controller .' non presente nel file /controllers/'. $controller );
         }
         else die('File '. $controller .'.php non presente nella cartella controllers');
      }
      
      /* controller/action */
      private function _elaboraRichiesta($controllerAction){
         $a = split('/', $controllerAction);
         // var_dump($a);
         
         return array(
            'controller' => $a[0],
            'action' => $a[1]
         );
      }
      
      private function _primaLetteraMaiuscola($str){
         return strtoupper($str[0]).substr($str, 1);
      }
      
      private function _server(){
         foreach($_SERVER as $k => $v)
            echo "$k : $v<br />";
      }
      
   }