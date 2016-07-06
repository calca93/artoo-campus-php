   
   $('#button_crea').on('click', function (event) {
      var espressione = /^[a-zA-Z]+$/;
      
      if(!espressione.test($('input[name="titolo"]').val())){
         alert("titolo vuoto");
         event.preventDefault();
      }
      else{
         if (!confirm('Sei sicuro di voler creare questo post?'))
         event.preventDefault();
      }
   });
