<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <title>login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilos.css">
    <title>consulta de aprendices</title>
</head>
<body>
    <div id="divconsulta" class="container"> 
        <br>
        <div id="div2"> 
            <div id="div3">
                <form name="formulario" role="form" method="POST">
                    <div class="col-md-12">
                        <strong class="lgris">ingrese criterio de busqueda</strong>
                        <br><br>
                        <div class="form-row">
                            <div class="form-group cold-md-3">
                                <input type="number" class="form-control" name="numid" min="9999" max="99999999999" value="" placeholder="IDENTIFICACION">
                            </div>
                            <br>
                            <div class="form-group cold-md-3">
                                <input type="text" class="form-control" name="nombres" style="text-transform: uppercase;"  value="" placeholder="Nombres">
                            </div>
                            <br>
                            <div class="form-group cold-md-3">
                                <input type="text" class="form-control" style="text-transform: uppercase;" name="apellidos"  value="" placeholder="Apellidos">
                            </div>
                            <br>
                            <div class="form-group col-md-3">
                                <input type="submit" class="btn btn-primary" value="consulta">
                            </div>
                        </div>
                        <br>
                    </div>
                </form>
                <br>
            </div>

            <div id="consulta2">
                <?php
                if($_SERVER['REQUEST_METHOD']==='POST')
                {
                    include('funciones.php');
                    $vnumid=$_POST['numid'];
                    $vnombres=$_POST['nombres'];
                    $vapellidos=$_POST['apellidos'];
                    $miconexion=conectar_bd('localhost', 'root', '', 'sena_bd');
                    $resultado=consulta($miconexion,"select * from aprendices where trim(apre_numid) like'%{$vnumid}%' and trim(apre_nombres) like '%{$vnombres}%' and trim(apre_apellidos) like '%{$vapellidos}%'");
                    if($resultado->num_rows>0)
                    {
                        while ($fila =$resultado->fetch_object())
                        {
                            echo $fila->apre_id." ".$fila->apre_tipoid." ".$fila->apre_numid." ".$fila->apre_nombres." ".$fila->apre_apellidos." ".$fila->apre_direccion." ".$fila->apre_telefono." ".$fila->apre_ficha." "."<br>";
                        }
                    }
                    else{
                        echo"No existe registro";
                    }
                    $miconexion->close();
                }?>
            </div>
        </div>
    </div>
</body>
</html>