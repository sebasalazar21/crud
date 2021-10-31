<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="css/boostrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="estilos.css">
    <script src="js/bootstrap.js"></script>
    <title>Crear fichas</title>
</head>
<body>
    <div id="div1" class="container">
    <br>
        <div id="div2">
            <?php session_start(); if(! empty($_SESSION['Tipo_usuario'])) { ?> 
            <img src="IMAGENES/banner3.png" alt=""> <?php } ?>
                <div id="div3">
                    <?php 
                    if ($_SESSION['Tipo_usuario']=='ADMINISTRADOR')
                    { 
                    ?>
                    <form id="formulario" role="form" method="post" action="guardado_programa.php">
                        <div class="col-md-12">
                            <strong class="lgris">Ingrese los datos del programa</strong>
                            <br>
                            <label class="lgris">Nombre programa: </label>
                                <input class="form-control" style="text-transform:uppercase;" type="text" name="nombre" value="" placeholder="Nombre programa" required/>
                                
                            <label class="lgris">Tipo programa: </label>
                                    <?php 
                                        include 'funciones.php';
                                        $conexion=conectar_bd('localhost', 'root', '', 'sena_bd' );
                                        $consulta="SELECT * FROM tiposprograma";
                                        $ejecutar=mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
                                    ?>
                                <select name="tipo" class="lgris"> 
                                    <?php  while ($opciones = $ejecutar -> fetch_object()){ ?>
                                        <option value="<?php echo $opciones-> tiposp_id ?>"><?php echo $opciones ->tiposp_tipo?></option>
                                    <?php }?>
                                 
                                </select>
                                <input class="btn btn-primary" type="submit" value="Guardar">
                        </div>
                    
                    </form>
                <?php
                    }
                    else
                    {
                        echo "No tiene permisos para realizar esta accion";
                    }
                ?>
                <br>
                </div>
        </div>
    </div>
    
</body>
</html>