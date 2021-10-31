<?php 
include('funciones.php');

    $vprogra=$_POST['programa'];

    $conexion=conectar_bd('localhost', 'root', '', 'sena_bd' );
    $resultado=consulta($conexion, "insert into ficha (ficha_programa) values ('{$vprogra}') ");
    if ($resultado)
        {
            echo "Guardado exitoso";
        }
    ?>