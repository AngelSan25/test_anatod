<?php

include 'class.database.php';

if (!isset($conn)){        
    $conn = mysqli_connect("anatodtest.c75o4mima6rb.us-east-1.rds.amazonaws.com", "test", "test5678", "test_anatod");
}

$idCliente = $_POST["IDCliente"];
$nombreCliente = $_POST["Nombre"];
$dniCliente = $_POST["DNI"];
$localidadCliente =$_POST["Localidad(Provincia)"];

//Cambiar Datos Cliente

$cambiarCliente = "UPDATE clientes SET cliente_nombre = '$nombreCliente', cliente_dni = '$dniCliente', cliente_localidad = '$localidadCliente' WHERE cliente_id = '$idCliente'";

//Comprobación de la operación

$resultado = mysqli_query($conn,$cambiarCliente);

if (!$resultado){
    echo 'Error de conexión o al cambiar los datos';
}else{
    echo 'Cambios registrados con éxito';
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