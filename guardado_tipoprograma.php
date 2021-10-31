<?php 
include('funciones.php');

    $vprogra=$_POST['numero'];
    $vnombre=$_POST['nombre'];

    $miconexion=conectar_bd('localhost','roor','','sena_bd');
    $resultado=consulta($miconexion, "insert into ficha (ficha_progra, ficha_nombre) values ('{$vprogra}', '{$vnombre}') ");
    if ($resultado)
        {
            echo "Guardado exitoso";
        }
    ?>