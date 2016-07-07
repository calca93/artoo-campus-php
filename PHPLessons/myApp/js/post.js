   
   $('#button_crea').on('click', function (event) {
      var espressione = /^[a-zA-Z]+$/;
      var id = $('select[name="utenteid"]').val();
      
      if(!espressione.test($('input[name="titolo"]').val()) || id == 0){
         alert("Completare il form");
         event.preventDefault();
      }
      else{
         if (!confirm('Sei sicuro di voler creare questo post?'))
         event.preventDefault();
      }
   });
