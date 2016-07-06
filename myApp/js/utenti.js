$('.delete_utente').on('click', function (event) {
   if (!confirm('Sei sicuro di voler eliminare questo utente?')) {
      event.preventDefault();
   }
});

$('#cerca_utenti button').click(function(event){
   var text = $('#cerca_utenti_input').val();
   if(text.length > 0){
      $.ajax({
         url: 'ajax_cerca_utenti.php',
         method:'get',
         dataType: 'json',
         data:{
            text_ricerca: text,
         },
         success: function(json){
            console.log(json);
         },
         error: function(error){
            console.error(error.responseText);
         },
      });
   }
});