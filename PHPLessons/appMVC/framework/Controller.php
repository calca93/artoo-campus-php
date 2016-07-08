<?php

   class Controller {
      public $layout ='';
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
               
               if(strlen($this -> layout) > 0){
                  $layout = str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']) . 'views/layout/'. $this->layout .'.php';
                  
                  if(file_exists($layout)){
                     $contenutoPagina = $file;
                     require $layout;
                  }else die("Il layout $layout non è stato trovato");
               }else require $file;
               
            }else die('Nessun parametro passato alla view');
            
         }else die('View '. $view .' alla posizione /views/'. $controller .' non trovata');
      }
   }