<?php 
error_reporting(0);
include('funciones.php');

    $vnombre=$_POST['nombre'];
    $vtipo=$_POST['tipo'];


    $conexion=conectar_bd('root', 'sena_bd');
    $resultado=consulta($conexion, "insert into programa (Progra_Nombre, Progra_tipo) values ('{$vnombre}', '{$vtipo}') ");
    if ($resultado)
        {
            echo "Guardado exitoso";
        }
    ?>