<?php
   
   error_reporting(E_ERROR);
   
   require 'framework/Application.php';
   require 'framework/Controller.php';
   require 'framework/TabellaDatabase.php';
   require 'models/Utente.php';
   
   require 'config/main.php';
   
   
   $app = Application::GetIstanza($configurazione);
   
   $app -> run();
   