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

            

                $('#guardar_registro').on('click',function(){
                    var url = "php/guardar_registro_traspaso_cm.php";
                    var colaborador=$('#colaborador').val();
                    var id_objeto='4';                            
                
                    $.ajax({                        
                        type: "POST",              
                        url: url,                    
                        data: {'id_objeto': id_objeto,
                        'colaborador':colaborador,
                        'dependencia_id':dependencia_id,
                        'sede_id':sede_id},
                        success: function(data)            
                        {
                        $('#resp').html(data);           
                        }
                    });
            
        
                swal.fire({
                title: "EXITO!",
                text: "Se ha registrado en el inventario!",
                type: "success"
                }).then(function() {
                window.location = "busqueda.php";
                })

            })

        })
    })

})