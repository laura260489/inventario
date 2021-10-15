
$(document).ready(function(){

    $.ajax({
      type: 'POST',
      url: 'php/cargar_sede.php'
    })
    .done(function(listas_rep){
      $('#lista_sede').html(listas_rep)
    })
    .fail(function(){
      alert('Hubo un errror al cargar la lista de sedes')
    })

  $('#lista_sede').on('change', function(){

    $("#lista_sede option:selected").each(function () {
    var sede_id = $(this).val()
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

      return false;

    })

    $('#lista_dependencia').on('change', function(){

      $("#lista_dependencia option:selected").each(function () {
      var dependencia_id=$(this).val();

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

        return false;
      })
    
      

  });

  });

  $('#guardar_registro').on('click',function(){
    var url = "php/guardar_registro_inventario.php";
    var bloque=$("#bloque").val();

    $("#colaborador option:selected").each(function () {
    var colaborador=$(this).val();                               

    $.ajax({                        
        type: "POST",              
        url: url,                    
        data: {
        'colaborador':colaborador,
        'bloque':bloque},
        success: function(data)            
        {
          $('#resp').html(data);           
        }
    });

    return false;
  })
    swal.fire({
      title: "EXITO!",
      text: "Se ha registrado en el inventario!",
      type: "success"
    }).then(function() {
      window.location = "index2.php";
  });

    
});

});

