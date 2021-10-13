
$(document).ready(function(){

  $.ajax({
    type: 'POST',
    url: 'php/cargar_listas.php'
  })
  .done(function(listas_rep){
    $('#lista_reproduccion').html(listas_rep)
  })
  .fail(function(){
    alert('Hubo un errror al cargar la lista de equipos')
  })

  $('#lista_reproduccion').on('change', function(){
    var id = $('#lista_reproduccion').val()
    $.ajax({
      type: 'POST',
      url: 'php/cargar_videos.php',
      data: {'id': id}
    })
    .done(function(listas_rep){
      $('#videos').html(listas_rep)
    })
    .fail(function(){
      alert('Hubo un errror al cargar los vídeos')
    })

    $('#enviar').on('click',function(){

      function sendForm(event){
        event.preventDefault();
    }
      
      var url = "php/guardar_item.php";

      if (id==1){

        var placa_portatil = $("#placa_portatil").val();
        var velocidad_portatil=$('#velocidad_portatil').val();
        var modelo_portatil=$('#modelo_portatil').val();
        var ram_portatil=$('#ram_portatil').val();
        var procesador_portatil=$('#procesador_portatil').val();
        var tamaño_portatil=$('#tamaño_portatil').val();                    
  
        $.ajax({                        
            type: "POST",              
            url: url,                    
            data: {'id': id,
            'placa_portatil':placa_portatil,
            'velocidad_portatil':velocidad_portatil,
            'modelo_portatil':modelo_portatil,
            'ram_portatil':ram_portatil,
            'procesador_portatil':procesador_portatil,
            'tamaño_portatil':tamaño_portatil
             },
            
            success: function(data)            
            {
              $('#resp').html(data);           
            }
        });

      }else if(id==2){

        var placa_mouse = $("#placa_mouse").val();
        var modelo_mouse=$('#modelo_mouse').val();                          
  
        $.ajax({                        
            type: "POST",              
            url: url,                    
            data: {'id': id,
            'placa_mouse':placa_mouse,
            'modelo_mouse':modelo_mouse},
            success: function(data)            
            {
              $('#resp').html(data);           
            }
        });


      }else if(id==3){

        var placa_cpu = $("#placa_cpu").val();
        var modelo_cpu=$('#modelo_cpu').val();                          
  
        $.ajax({                        
            type: "POST",              
            url: url,                    
            data: {'id': id,
            'placa_cpu':placa_cpu,
            'modelo_cpu':modelo_cpu},
            success: function(data)            
            {
              $('#resp').html(data);           
            }
        });


      }else if(id==4){

        var placa_computador_mesa = $("#placa_computador_mesa").val();
        var modelo_computador_mesa=$('#modelo_computador_mesa').val(); 
        var velocidad_computador_mesa=$('#velocidad_computador_mesa').val();
        var ram_computador_mesa=$('#ram_computador_mesa').val();
        var procesador_computador_mesa=$('#procesador_computador_mesa').val();                    
  
        $.ajax({                        
            type: "POST",              
            url: url,                    
            data: {'id': id,
            'placa_computador_mesa':placa_computador_mesa,
            'modelo_computador_mesa':modelo_computador_mesa,
            'velocidad_computador_mesa':velocidad_computador_mesa,
            'ram_computador_mesa':ram_computador_mesa,
            'procesador_computador_mesa':procesador_computador_mesa},
            success: function(data)            
            {
              $('#resp').html(data);           
            }
        });


      }else if(id==5){

        var placa_escaner = $("#placa_escaner").val();
        var modelo_escaner=$('#modelo_escaner').val();
        var marca_escaner=$('#marca_escaner').val();                       
  
        $.ajax({                        
            type: "POST",              
            url: url,                    
            data: {'id': id,
            'placa_escaner':placa_escaner,
            'modelo_escaner':modelo_escaner,
            'marca_escaner':marca_escaner},
            success: function(data)            
            {
              $('#resp').html(data);           
            }
        });


      }else if(id==6){

        var placa_disco = $("#placa_disco").val();
        var modelo_disco=$('#modelo_disco').val();                          
  
        $.ajax({                        
            type: "POST",              
            url: url,                    
            data: {'id': id,
            'placa_disco':placa_disco,
            'modelo_disco':modelo_disco},
            success: function(data)            
            {
              $('#resp').html(data);           
            }
        });


      }else if(id==7){

        var placa_impresora = $("#placa_impresora").val();
        var modelo_impresora=$('#modelo_impresora').val();
        var marca_impresora=$('#marca_impresora').val();                          
  
        $.ajax({                        
            type: "POST",              
            url: url,                    
            data: {'id': id,
            'placa_impresora':placa_impresora,
            'marca_impresora':marca_impresora,
            'modelo_impresora':modelo_impresora},
            success: function(data)            
            {
              $('#resp').html(data);           
            }
        });


      }else if(id==8){

        var placa_monitor = $("#placa_monitor").val();
        var modelo_monitor=$('#modelo_monitor').val();                          
  
        $.ajax({                        
            type: "POST",              
            url: url,                    
            data: {'id': id,
            'placa_monitor':placa_monitor,
            'modelo_monitor':modelo_monitor},
            success: function(data)            
            {
              $('#resp').html(data);           
            }
        });


      }
   
    });

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
        var url = "php/guardar_registro_inventario.php";
        var colaborador=$('#colaborador').val();                               
    
        $.ajax({                        
            type: "POST",              
            url: url,                    
            data: {'id': id,
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
          window.location = "index.php";
      });
    
        
    });


  });

  });

 });

});

