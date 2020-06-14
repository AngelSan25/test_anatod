<?php

include 'class.database.php';

if (!isset($conn)){        
    $conn = mysqli_connect("anatodtest.c75o4mima6rb.us-east-1.rds.amazonaws.com", "test", "test5678", "test_anatod");
}
$consulta = "SELECT localidades.localidad_id, localidades.localidad_nombre,provincias.provincia_nombre FROM localidades LEFT JOIN provincias ON localidades.localidad_provincia = provincias.provincia_id ORDER BY localidades.localidad_id;";
$resultado1 = mysqli_query($conn,$consulta); 
$resultado2 = mysqli_query($conn,$consulta);
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manejo_de_clientes</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <script src="https://kit.fontawesome.com/1afd94d30f.js" crossorigin="anonymous"></script>
<body>
<section class="homeIndex">
    <section class="agregarCliente">
    <h1>Agregar Cliente</h1>
        <form action="registrarCliente.php" method="post">
            <input type="text" name="Nombre" placeholder="Nombre y Apellido"><br><br>
            <input type="number" name="DNI" placeholder="DNI"><br><br>
                <select name="Localidad(Provincia)" id="">
                <?php while($row1 = mysqli_fetch_array($resultado1)):;?>
                    <option value="<?php echo $row1['localidad_id'];?>"><?php echo  $row1['localidad_nombre'].' ('.$row1['provincia_nombre'].')'; ?>
                    </option>
                    <?php endwhile;?>
                </select>
            <section class="botonEnviar">
                <input type="submit" value="Enviar">
            </section>
        </form>    
    </section>
    
    <section class="cambiarCliente">
    <h2>Editar Cliente</h2>
        <form action="editarCliente.php" method="post">
            <input type="number" name="IDCliente" placeholder="ID de Cliente"><br><br>
            <input type="text" name="Nombre" placeholder="Nombre y apellido"><br><br>
            <input type="number" name="DNI" placeholder="DNI"><br><br>
                <select name="Localidad(Provincia)" id="">
                    <?php while($row2 = mysqli_fetch_array($resultado2)):;?>
                    <option value="<?php echo $row2['localidad_id'];?>"><?php 
                        echo $row2['localidad_nombre'].' ('.$row2['provincia_nombre'].')'; ?>
                    </option>
                    <?php endwhile;?>
                </select>
            <section class="botonCambios">
                <input type="submit" value="Registrar Cambios">
            </section>
        </form>
    </section>    
    
    <!--<h3>Mostrar Lista de Clientes</h3>
        <form action="mostrarListaClientes.php" method="get"></form>
        <input type="submit" value="Ver listado de clientes" href="mostrarListaClientes.php">-->

    <section class="mostrarClientes">
    <h3>Mostrar Lista de Clientes</h3><br>
        <button class="contact1-form-btn" onclick=" relocate_clientes()">
        <script>
		  function relocate_clientes()
		  {
    	   location.href = "mostrarListaClientes.php";
														}	 
	    </script>
		  <span>
			Ver listado de clientes
		  </span>
        </button>
    </section>
    
    <section class="mostrarProvincias">
    <h4>Mostrar Lista de Provincias</h4><br>
        <!--<form action="mostrarListaProvincias.php" method="get"></form>
            <input type="submit" value="Ver listado de provincias">-->
        <button class="contact1-form-btn" onclick=" relocate_provincias()">
        <script>
		  function relocate_provincias()
		  {
    	   location.href = "mostrarListaProvincias.php";
														}	 
	    </script>
		  <span>
			Ver listado de provincias
		  </span>
        </button>
    </section>
</section>

</body>