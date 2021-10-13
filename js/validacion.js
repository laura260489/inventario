function validar(e) {


    var objeto=document.getElementById("lista_reproduccion").value;

    if (objeto==1){

      var placa = document.getElementById("placa_portatil").value
      var modelo=document.getElementById("modelo_portatil").value
      var velocidad=document.getElementById("velocidad_portatil").value
      var ram=document.getElementById("ram_portatil").value
      var procesador=document.getElementById("procesador_portatil").value
      var tamaño=document.getElementById("tamaño_portatil").value

      if (placa == "" || modelo=="" || velocidad=="" || ram=="" || procesador=="" || tamaño==""){
        swal.fire({
        title: "ERROR!",
        text: "Llena el campo vacio!",
        type: "error"
      });
        return false
      }else {
        
        swal.fire({
        title: "EXITO!",
        text: "El item ha sido registrado!",
        type: "success"
        }).then((result) => {
          $("#enviar").prop("disabled", true);
          e.preventDefault();
          $('#form').submit();
          
          
        });
      }

    }else if(objeto==2){

      var placa = document.getElementById("placa_mouse").value
      var modelo=document.getElementById("modelo_mouse").value

      if (placa == "" || modelo==""){
        swal.fire({
        title: "ERROR!",
        text: "Llena el campo vacio!",
        type: "error"
      });
        return false
      }else {
        swal.fire({
        title: "EXITO!",
        text: "El item ha sido registrado!",
        type: "success"
        }).then((result) => {
          $("#enviar").prop("disabled", true);
          e.preventDefault();
          $('#form').submit();
          
          
        });
      }


    }else if(objeto==3){

      var placa = document.getElementById("placa_cpu").value
      var modelo=document.getElementById("modelo_cpu").value

      if (placa == "" || modelo==""){
        swal.fire({
        title: "ERROR!",
        text: "Llena el campo vacio!",
        type: "error"
      });
        return false
      }else {
        swal.fire({
        title: "EXITO!",
        text: "El item ha sido registrado!",
        type: "success"
        }).then((result) => {
          $("#enviar").prop("disabled", true);
          e.preventDefault();
          $('#form').submit();
          
        });
      }


    }else if(objeto==4){

      var placa = document.getElementById("placa_computador_mesa").value
      var modelo=document.getElementById("modelo_computador_mesa").value
      var ram=document.getElementById("ram_computador_mesa").value
      var velocidad=document.getElementById("velocidad_computador_mesa").value
      var procesador=document.getElementById("procesador_computador_mesa").value

      if (placa == "" || modelo=="" || ram=="" || velocidad=="" || procesador==""){
        swal.fire({
        title: "ERROR!",
        text: "Llena el campo vacio!",
        type: "error"
      });
        return false
      }else {
        swal.fire({
        title: "EXITO!",
        text: "El item ha sido registrado!",
        type: "success"
        }).then((result) => {
          $("#enviar").prop("disabled", true);
          e.preventDefault();
          $('#form').submit();
          
        });
      }


    }else if(objeto==5){

      var placa = document.getElementById("placa_escaner").value
      var modelo=document.getElementById("modelo_escaner").value
      var marca=document.getElementById("marca_escaner").value

      if (placa == "" || modelo=="" || marca==""){
        swal.fire({
        title: "ERROR!",
        text: "Llena el campo vacio!",
        type: "error"
      });
        return false
      }else {
        swal.fire({
        title: "EXITO!",
        text: "El item ha sido registrado!",
        type: "success"
        }).then((result) => {
          $("#enviar").prop("disabled", true);
          e.preventDefault();
          $('#form').submit();
             
        });
      }


    }else if(objeto==6){

      var placa = document.getElementById("placa_disco").value
      var modelo=document.getElementById("modelo_disco").value

      if (placa == "" || modelo==""){
        swal.fire({
        title: "ERROR!",
        text: "Llena el campo vacio!",
        type: "error"
      });
        return false
      }else {
        swal.fire({
        title: "EXITO!",
        text: "El item ha sido registrado!",
        type: "success"
        }).then((result) => {
          $("#enviar").prop("disabled", true);
          e.preventDefault();
          $('#form').submit();
          
        });
      }


    }else if(objeto==7){

      var placa = document.getElementById("placa_impresora").value
      var modelo=document.getElementById("modelo_impresora").value

      if (placa == "" || modelo==""){
        swal.fire({
        title: "ERROR!",
        text: "Llena el campo vacio!",
        type: "error"
      });
        return false
      }else {
        swal.fire({
        title: "EXITO!",
        text: "El item ha sido registrado!",
        type: "success"
        }).then((result) => {
          $("#enviar").prop("disabled", true);
          e.preventDefault();
          $('#form').submit();
          
        });
      }


    }else if(objeto==8){

      var placa = document.getElementById("placa_monitor").value
      var modelo=document.getElementById("modelo_monitor").value

      if (placa == "" || modelo==""){
        swal.fire({
        title: "ERROR!",
        text: "Llena el campo vacio!",
        type: "error"
      });
        return false
      }else {
        swal.fire({
        title: "EXITO!",
        text: "El item ha sido registrado!",
        type: "success"
        }).then((result) => {
          $("#enviar").prop("disabled", true);
          e.preventDefault();
          $('#form').submit();
          
        });
      }


    }

    
  }