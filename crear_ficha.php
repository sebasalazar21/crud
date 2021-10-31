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
            <img src="IMAGENES/banner1.jpg" alt=""> <?php } ?>
                <div id="div3">
                    <?php 
                    if ($_SESSION['Tipo_usuario']=='ADMINISTRADOR')
                    { 
                    ?>
                    <form id="formulario" role="form" method="post" action="guardado_fichas.php">
                        <div class="col-md-12">
                            <strong class="lgris">Ingrese los datos de la ficha</strong>
                            <br>

                            <label class="lgris">Elegir programa:</label>
                            <div class="form-row">
                            <select class="form-control" style="text-transform:uppercase;" name="programa" aria-placeholder="Programa">
                                <option value="1">Analisis y desarrollo de sistemas de informacion</option>
                                <option value="2">Ganaderia</option>
                                <option value="3">Reposteria</option>
                            </select>
                            </div>

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