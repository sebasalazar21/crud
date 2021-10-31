<!DOCTYPE html >
<html  lang = " es " >
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilos.css">
    <títle> Modificar aprendiz </title>
</head >
<body>
    <div  id = " divconsulta " class = " contenedor " >
        <Br >
        <div  id = " div2 " >
            <div  id = " div4 " >
                <form  class = "formulario" role = " formulario " method= "POST">
                    <div  class = " col-md-12 " >
                        <strong  class = " lgris " > Ingrese criterio de busqueda </strong >
                        <Br > <br >
                        <div  class = " form-row " >
                            <div  class = " form-group col-md-5 " >
                            <input  class = " form-control " type = " number " name = "numid" min = " 9999 " max = " 99999999999 " autofocus  value = "" placeholder = " IDENTIFICACION " >
                            </div >
                            <br>
                            <div  class = " form-group col-md-3 " >
                             <input  class ="btn btn-primary" type ="submit" value ="Consultar">
                            </div >
                        </div >
                        <Br >
                    </div >
                </form>
                <Br>
            </div >
            <div  id = " divconsulta2 " >
            <?php
            if ($_SERVER['REQUEST_METHOD']==='POST')
                {
                include('funciones.php');
                session_start();
                $vnumid=$_POST['numid'];
                $miconexion=conectar_bd(  'localhost', 'root', '', 'sena_bd' );
                $resultado=consulta($miconexion, "select * from aprendices where apre_numid='{$vnumid}'");
                if ($resultado->num_rows >0)
                    {
                    $fila=$resultado->fetch_object();
                    $_SESSION['ide1']=$fila->apre_id;
                    ?>
                <form  id="formulario2" role="form" method="POST" action="actualizar_aprendiz.php">
                        <div  class = " col-md-12" >
                            <strong  class = "lgris"> Datos del aprendiz </strong >
                                <label  class= " lgris " > Id: </label >
                                <input  class = "form-control " type = "text" name ="ide" disabled ="disabled " value ="<?php  echo  $fila->apre_id  ?>"/>

                                <label  for = " lgris "> Nombres: </label >
                                <input  class = " form-control " style = " text-transform: uppercase; " type = " text " name ="nombres" required  value ="<?php  echo  $fila->apre_nombres  ?>"/>

                                <label  for = " lgris " > Apellidos: </label >
                                <input  class = " form-control " style = " text-transform: uppercase; " type = " text " name ="apellidos"   value = " <?php  echo  $fila->apre_apellidos  ?>" required />

                                <label  for = " lgris " > Dirección: </label >
                                <input  class = " form-control " style = " text-transform: uppercase; " type = " text " name = "direccion"   value ="<?php  echo  $fila->apre_direccion  ?>" required />

                                <label  for = " lgris " > Telefono: </label >
                                <input  class = " form-control " style = " text-transform: uppercase; " type = " text " name = "telefono"   value ="<?php  echo  $fila->apre_telefono  ?>" required />

                                <input  class ="btn btn-primary " type ="submit" value ="Actualizar">
                                <Br >
                        </div >
                </form>
                <?php
                        }
                        else {
                            echo  "No existen registros" ;
                        }
                        $miconexion->close();
                    } ?>
            </div >
        </div > 
    </div >
</body >
</html >