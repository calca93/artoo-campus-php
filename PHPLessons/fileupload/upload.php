<?php

   var_dump(__DIR__);
   // var_dump($_POST);
   
   if(count($_FILES) > 0){
      var_dump($_FILES['file_da_caricare']);
      $datiFiles = $_FILES['file_da_caricare'];
      
      foreach($datiFiles['error'] as $k => $v)
         if($datiFiles['error'][$k] == UPLOAD_ERR_OK)
            $result[] = move_uploaded_file($datiFiles['tmp_name'][$k], __DIR__ . $_FILES['file_da_caricare']['name']);
      
      
      //$result = move_uploaded_file($fileTempName, __DIR__ . '/files/' . $_FILES['file_da_caricare']['name']);
   }
?>


<form enctype="multipart/form-data" method="post" action="">
   <input type="hidden" name="MAX_FILE_SIZE" value="50000" />
   <input type="file" name="file_da_caricare[]" multiple="" />
   <input type="text" name="testo" />
   <button type="submit">Carica</button>
</form>

<?php if(isset($result)){ ?>
   <?php foreach($result as $i => $risultato){ ?>
      <p>Caricamento file <? $i ?> : <?= $risultato ? 'OK' : 'NON OK' ; ?> </p>
   <?php }} ?>