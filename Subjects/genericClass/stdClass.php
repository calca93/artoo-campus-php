<?php 

   $array = array();
   $array['prop1'] = 'pippo';
   $array['prop2'] = 'pluto';
   
   $oggetto = new stdClass();
   $oggetto -> prop1 = 'pippo';
   $oggetto -> prop2 = 'pluto';
   
   $pippo = $array['prop1'];
   $pluto = $oggetto -> prop2;