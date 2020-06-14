<?php

include 'class.database.php';

if (!isset($conn)){        
    $conn = mysqli_connect("anatodtest.c75o4mima6rb.us-east-1.rds.amazonaws.com", "test", "test5678", "test_anatod");
}

//Selección de los campos a mostrar

$consulta = "SELECT clientes.cliente_id, clientes.cliente_nombre, clientes.cliente_dni, localidades.localidad_nombre, provincias.provincia_nombre FROM clientes JOIN localidades ON clientes.cliente_localidad = localidades.localidad_id JOIN provincias  ON localidades.localidad_provincia = provincias.provincia_id ORDER BY clientes.cliente_id";
    
$resultado = mysqli_query($conn,$consulta);

//Muestra los campos seleccionados
    
if($resultado){
    while($row = mysqli_fetch_array($resultado)){
        $id = $row['cliente_id'];
        $nombre = $row['cliente_nombre'];
        $dni = $row['cliente_dni'];
        $localidad = $row['localidad_nombre'];
        $provincia = $row['provincia_nombre'];
        ?>
        <div>
            <h1><?php echo $nombre; ?></h1>
            <div>
                <p>
                    <b>ID: </b><?php echo $id; ?><br>
                    <b>DNI: </b><?php echo $dni; ?><br>
                    <b>Localidad: </b><?php echo $localidad; ?><br>
                    <b>Provincia: </b><?php echo $provincia; ?><br>
                </p>
            </div>
        </div>
        <?php
    }
}

mysqli_close($conn);

?>

<!DOCTYPE html>

<button class="contact1-form-btn" onclick=" relocate_home()">
    <script>
		function relocate_home()
		{
    	location.href = "Index.php";
														}	 
	</script>
		<span>
			regresar
			<i class="fa fa-long-arrow-left" aria-hidden="true"></i>
		</span>
</button>