<?php

    session_start();
    session_destroy();
    echo "<script language='javascript'>alert('Usted ha salido de la sesión');window.location.href='../index.php'</script>";



?>