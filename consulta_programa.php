<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <link href="css/boostrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="estilos.css">
    <script src="js/bootstrap.js"></script>
    <title>Consulta de Aprendices</title>
</head>
<body>
    <div id="divconsulta" class="container">
        <br>
        <div id="div2">
            <div id="div4" >
                <form name="formulario" role="form" method="post">
                    <div class="col-md-12">
                        <strong class="lgris"> Ingrese criterio de busqueda </strong>

                        <br><br>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <input class="form-control" type="number" name="numid" min="9999" max="99999999999999" value="" placeholder="IDENTIFICACION"/>
                                
                            <div class="form-group col-md-3">
                                <input class="btn btn-primary" type="submit" value="Consultar">
                            </div>
                        </div>
                        <br>
                    </div>
                </form>
                <br>
            </div>

            <div id="divconsulta2">
            <?php
            if ($_SERVER['REQUEST_METHOD']==='POST')
                {
                    include('funciones.php');
                    $vnumid=$_POST['numid'];
                    $vnombres=$_POST['nombres'];
                    $vapellidos=$_POST['apellidos'];
                    $conexion=conectar_bd('localhost', 'root', '', 'sena_bd' );
                    $resultado=consulta($conexion, "select * from aprendices where trim(apre_numid) like '%{$vnumid}% and (trim(apre_nombres) like '%{$vnombres}%' and trim(apre_apellidos) like '%{$vapellidos}%')");
                    if ($resultado->num_rows>0)
                        {
                            while ($fila = $resultado->fetch_object())
                            {
                                echo $fila->Apre_id." ".$fila->Apre_tipoid." ".$fila->apre_numid." ".$fila->Apre_nombres." ".$fila->Apre_apellidos." ".$fila->Apre_direccion." ".$fila->apre_telefono." ".$fila->apre_ficha."<br>";
                            }
                        }
                    else{
                        echo "No existen registros";
                        }   
                    $conexion->close();
                    }?>
            </div>
        </div>
    </div>
    
</body>
</html>