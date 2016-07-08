<?php

   class Controller {
      
      public $_controller;
      
      public function render($view, array $parametri = null){
         
         // var_dump(self::class); // Produce 'Controller'
         // var_dump(static::class); // Produce 'NomeController'
         
         $file = str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']) . 'views/'. $this->_controller .'/'. $view .'.php';
         
         if(file_exists($file)){
            if(isset($parametri)){
               $title = $parametri['titolo'];
               echo "<h2> $title </h2>";
               foreach($parametri['utenti'] as $v)
                  echo "$v <br />";
            }else die('Nessun parametro passato alla view');
            
         }else die('View '. $view .' alla posizione /views/'. $controller .' non trovata');
      }
   }