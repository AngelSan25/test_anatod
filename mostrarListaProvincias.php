<?php

include 'class.database.php';

if (!isset($conn)){        
    $conn = mysqli_connect("anatodtest.c75o4mima6rb.us-east-1.rds.amazonaws.com", "test", "test5678", "test_anatod");
}

//Selección de los campos a mostrar

$consulta = "SELECT provincias.provincia_id, localidades.localidad_nombre, provincias.provincia_nombre, COUNT(clientes.cliente_id) AS cant_clientes FROM localidades JOIN provincias JOIN clientes ON localidades.localidad_provincia = provincias.provincia_id WHERE clientes.cliente_localidad = localidades.localidad_id GROUP BY clientes.cliente_localidad ORDER BY localidades.localidad_id";

//Muestro los campos seleccionados

$resultado = mysqli_query($conn,$consulta);
    if($resultado){
        while($row = mysqli_fetch_array($resultado)){
            $idProvincia = $row['provincia_id'];
            $provincia = $row['provincia_nombre'];
            $localidad = $row['localidad_nombre'];
            $cantClientes = $row['cant_clientes'];
            ?>
            <div>
                <div>
                    <p>
                        <b>ID: </b><?php echo $idProvincia; ?><br>
                        <b>Provincia: </b><?php echo $provincia; ?><br>
                        <b>Localidad: </b><?php echo $localidad; ?><br>
                        <b>Cantidad de Clientes: </b><?php echo $cantClientes; ?><br>
                    </p>
                </div>
            </div>
            <?php
        }
    }

mysqli_close($conn);

?>

