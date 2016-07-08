<?php

   class Controller {
      
      public $_controller;
      
      public function render($view, array $parametri = null){
         
         // var_dump(self::class); // Produce 'Controller'
         // var_dump(static::class); // Produce 'NomeController'
         
         $file = str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']) . 'views/'. $this->_controller .'/'. $view .'.php';
         
         if(file_exists($file)){
            if(isset($parametri)){
               
               // Utilizzando questa funzione, generalizzo il contenuto dell array
               // quindi creo variabili con nome uguale ad ogni chiave del vettore
               extract($parametri);
               
               // OPPURE
               // foreach ($parametri as $k => $v)
               //    ${$key} = $value;
               
               // Non va bene eseguire i seguenti comandi perche come sviluppatore
               // del framework bisogna astenersi dal contenuto dell array
               // $title = $parametri['titolo'];
               // $utenti = $parametri['utenti'];
               
               require $file;
               
            }else die('Nessun parametro passato alla view');
            
         }else die('View '. $view .' alla posizione /views/'. $controller .' non trovata');
      }
   }