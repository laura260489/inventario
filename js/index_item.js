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
  
          var placa_servidor = $("#placa_servidor").val();
          var modelo_servidor=$('#modelo_servidor').val();
          var marca_servidor=$('#marca_servidor').val();
          var procesador_servidor=$('#procesador_servidor').val();
          var ram_servidor=$('#ram_servidor').val();
          var almacenamiento_servidor=$('#almacenamiento_servidor').val();                       
    
          $.ajax({                        
              type: "POST",              
              url: url,                    
              data: {'id': id,
              'placa_servidor':placa_servidor,
              'modelo_servidor':modelo_servidor,
              'marca_servidor':marca_servidor,
              'procesador_servidor':procesador_servidor,
              'ram_servidor':ram_servidor,
              'almacenamiento_servidor':almacenamiento_servidor},
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
  
  
        }else if(id==9){
  
          var placa_estabilizador = $("#placa_estabilizador").val();
          var voltios_estabilizador=$('#voltios_estabilizador').val();
          var marca_estabilizador=$('#marca_estabilizador').val();                          
    
          $.ajax({                        
              type: "POST",              
              url: url,                    
              data: {'id': id,
              'placa_estabilizador':placa_estabilizador,
              'marca_estabilizador':marca_estabilizador,
              'voltios_estabilizador':voltios_estabilizador},
              success: function(data)            
              {
                $('#resp').html(data);           
              }
          });
  
        }else if(id==10){
  
          var placa_rack = $("#placa_rack").val();                        
    
          $.ajax({                        
              type: "POST",              
              url: url,                    
              data: {'id': id,
              'placa_rack':placa_rack},
              success: function(data)            
              {
                $('#resp').html(data);           
              }
          });
  
        }else if(id==11){
  
          var placa_switch = $("#placa_switch").val();
          var modelo_switch=$('#modelo_switch').val();
          var marca_switch=$('#marca_switch').val();
          var puerto_switch=$('#puerto_switch').val();                        
    
          $.ajax({                        
              type: "POST",              
              url: url,                    
              data: {'id': id,
              'placa_switch':placa_switch,
              'marca_switch':marca_switch,
              'modelo_switch':modelo_switch,
              'puerto_switch':puerto_switch
              },
              success: function(data)            
              {
                $('#resp').html(data);           
              }
          });
  
        }else if(id==14){
  
          var placa_videobeam = $("#placa_videobeam").val();
          var modelo_videobeam=$('#modelo_videobeam').val();
          var marca_videobeam=$('#marca_videobeam').val();                          
    
          $.ajax({                        
              type: "POST",              
              url: url,                    
              data: {'id': id,
              'placa_videobeam':placa_videobeam,
              'marca_videobeam':marca_videobeam,
              'modelo_videobeam':modelo_videobeam},
              success: function(data)            
              {
                $('#resp').html(data);           
              }
          });
  
  
        }
     
      });

    })
})