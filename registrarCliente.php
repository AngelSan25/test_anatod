<?php

include 'class.database.php';

if (!isset($conn)){        
    $conn = mysqli_connect("anatodtest.c75o4mima6rb.us-east-1.rds.amazonaws.com", "test", "test5678", "test_anatod");
}

$nombreCliente = $_POST["Nombre"];
$dniCliente = $_POST["DNI"];
$localidadCliente =$_POST["Localidad(Provincia)"];

//insertar cliente

$insertarCliente = "INSERT INTO clientes (cliente_nombre,cliente_dni,cliente_localidad) VALUES ('$nombreCliente','$dniCliente','$localidadCliente')";

//Comprobación de la operación

$exito = mysqli_query($conn,$insertarCliente);

?>

<!DOCTYPE HTML>

<html lang="en">
<head>
    <title>Registrar_Cliente</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<section class="homeRegistrarCliente">
<section class="msg1RegistrarCliente">
    <h1><?php
        if (!$exito){
            echo 'Error de conexión o insertar nombre';
        }else{
            echo '¡Registro realizado con éxito! ';
        ?>
    </h1>
</section>
<?php
    //Devolver ID del Cliente para que pueda realizar cambios a futuro

    $consulta = "SELECT cliente_id FROM clientes WHERE cliente_nombre = '$nombreCliente' AND cliente_dni = '$dniCliente' AND cliente_localidad = '$localidadCliente'";
    
    $resultado = mysqli_query($conn,$consulta);
?>
<section class="msg2RegistrarCliente">
    <h2><?php
            if(!$resultado){
                echo 'Error al obtener su ID';
            }else{
                $idCliente = mysqli_fetch_array($resultado);
                echo 'Su número de cliente es: '.$idCliente[0];
            } 
        }

        mysqli_close($conn);
    
        ?>
    </h2>
</section>
    
<section class="botonVolverRegCliente">
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
</section>
</section>