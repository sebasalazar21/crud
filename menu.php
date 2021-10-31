<?php 
    include ( 'funciones.php' );
    session_start ();
  
    $_SESSION['nusuario']=$_POST['usuario'];
    $_SESSION[ 'nclave']= $_POST['clave'];
            

    $conexion = conectar_bd ('localhost','root','' , 'sena_bd' );
    $resultado=consulta($conexion , "select* from usuarios where usua_nomuser='{$_SESSION['nusuario']}' and usua_contra='{$_SESSION ['nclave']}'" );
?>

<!DOCTYPE html >
<html>
<head>
    <title> Menú principalpppp </title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <title>Menu Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos.css">

</head>
    <body>
        <div  id="div1 " class="container">
            <br>
            <div  id="div2">
               <?php if ($resultado->num_rows>0){?> <img src="banner1.jpg"> <?php } ?>
                <div  id = "div3"> 
            <?php
              if ($resultado->num_rows>0)
                 {
                    $fila=$resultado->fetch_object();
                    $_SESSION['Tipo_usuario']=$fila->usua_tipo;
            ?>
            <label class="lgris">Bienvenido <?php echo $_SESSION['nusuario'] ?> </label> <br>                
            <input  style = " width: 30%; " class = " btn btn-primary " type = " button " onclick = " location.href = 'registro_aprendiz.php' " value="Registro de aprendices">
            <input  style = " width: 30%; " class = " btn btn-primary " type = " button " onclick = " location.href = 'consulta_aprendiz.php' " value="Consulta de aprendices">
            <Br> <br>
            <input  style = " width: 30%; " class = " btn btn-primary " type = " button " onclick = " location.href ='modificar_aprendiz.php'" value = " Actualizacion de aprendices " >
            <input  style = " width: 30%; " class = " btn btn-primary " type = " button " onclick = " location.href = 'borrar_aprendiz.php' " value = " Borrar aprendices " >
            <Br> <br>
            <input  style = " width: 30%; " class = " btn btn-primary " type = " button " onclick = " location.href = 'crear_programa.php' " value = " Crear programa " >
            <input  style = " width: 30%; " class = " btn btn-primary " type = " button " onclick = " location.href = 'consulta_programa.php' " value = " Consultar programa " >
            <Br> <br>
            <input  style = " width: 30%; " class = " btn btn-primary " type = " button " onclick = " location.href = 'index.php' " value = " Modificar programa " >
            <input  style = " width: 30%; " class = " btn btn-primary " type = " button " onclick = " location.href = 'index.php' " value = " Eliminar programa " >
            <Br> <br>
            <input  style = " width: 30%; " class = " btn btn-primary " type = " button " onclick = " location.href = 'crear_ficha.php' " value = " Crear ficha " >
            <input  style = " width: 30%; " class = " btn btn-primary " type = " button " onclick = " location.href = 'index.php' " value = " Consultar ficha " >
            <Br> <br>
            <input  style = " width: 30%; " class = " btn btn-primary " type = " button " onclick = " location.href = 'index.php' " value = " Modificar fichar " >
            <input  style = " width: 30%; " class = " btn btn-primary " type = " button " onclick = " location.href = 'index.php' " value = " Eliminar ficha " >
        <?php                       
                }
          else
         {
          echo  "Usuario o clave invalido" ;
         }
         $conexion->close();
        ?>
        <br> <br>
            </div>
        </div>
    </div>
 </body>
</html>