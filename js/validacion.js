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

      var placa = document.getElementById("placa_servidor").value
      var modelo=document.getElementById("modelo_servidor").value
      var marca=document.getElementById("marca_servidor").value
      var procesador=document.getElementById("procesador_servidor").value
      var ram=document.getElementById("ram_servidor").value
      var almacenamiento=document.getElementById("almacenamiento_servidor").value

      if (placa == "" || modelo=="" || marca=="" || procesador=="" || ram=="" || almacenamiento==""){
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


    }else if(objeto==9){

      var placa = document.getElementById("placa_estabilizador").value
      var voltios=document.getElementById("voltios_estabilizador").value
      var marca=document.getElementById("marca_estabilizador").value

      if (placa == "" || voltios=="" || marca==""){
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

    }else if(objeto==10){

      var placa = document.getElementById("placa_rack").value

      if (placa == ""){
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

    }else if(objeto==11){

      var placa = document.getElementById("placa_switch").value
      var modelo=document.getElementById("modelo_switch").value
      var marca=document.getElementById("marca_switch").value
      var puerto=document.getElementById("puerto_switch").value

      if (placa == "" || modelo=="" || marca=="" || puerto==""){
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

    }else if(objeto==14){

      var placa = document.getElementById("placa_videobeam").value
      var modelo=document.getElementById("modelo_videobeam").value
      var marca=document.getElementById("marca_videobeam").value

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

    }

    
  }