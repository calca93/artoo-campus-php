<?php

   var_dump(__DIR__);
   // var_dump($_POST);
   var_dump($_FILES['file_da_caricare']);
   
   $fileTempName = $_FILES['file_da_caricare']['tmp_name'];
   
   $dir = __DIR__;
   
   $result = move_uploaded_file($fileTempName, $dir. '/files/' . $_FILES['file_da_caricare']['name']);
   
?>


<form enctype="multipart/form-data" method="post" action="">
   <input type="hidden" name="MAX_FILE_SIZE" value="50000" />
   <input type="file" name="file_da_caricare" />
   <input type="text" name="testo" />
   <button type="submit">Carica</button>
</form>

<?php
   echo 'Caricamento: ' . ($result ? 'OK' : 'NON OK');
?>