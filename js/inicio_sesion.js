$(document).ready(function(){

    $('#iniciar_sesion').on('click',function(){
        var url = "php/iniciar_sesion.php";
        var usuario = $('#usuario').val()
        var contrasena = $('#contrasena').val()

        $.$ajax({

            type: "POST",              
            url: url,                    
            data: {'usuario': usuario,
            'contrasena':contrasena},
            success: function(data)           
            {
              $('#resp').html(data);           
            }


        });




    });


})