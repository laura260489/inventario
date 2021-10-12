$(document).ready(function(){

    $.ajax({
        type: 'POST',
        url: 'php/cargar_sede.php'
      })
      .done(function(listas_rep){
        $('#lista_sede').html(listas_rep)
      })
      .fail(function(){
        alert('Hubo un errror al cargar la lista de equipos')
    })

    $('#lista_sede').on('change', function(){
        var sede_id = $('#lista_sede').val()
        $.ajax({
          type: 'POST',
          url: 'php/cargar_dependencia.php',
          data: {'sede_id': sede_id}
        })
        .done(function(lista_dep){
          $('#lista_dependencia').html(lista_dep)
        })
        .fail(function(){
          alert('Hubo un errror al cargar los colaboradores')
        })
    
        $('#lista_dependencia').on('change', function(){
          var dependencia_id=$('#lista_dependencia').val();
    
          $.ajax({
    
            type: 'POST',
            url: 'php/cargar_colaboradores.php',
            data: {'dependencia_id': dependencia_id}
          })
          .done(function(lista_dep){
            $('#colaborador').html(lista_dep)
          })
          .fail(function(){
            alert('Hubo un errror al cargar los colaboradores')
    
          })

        })
    })


})