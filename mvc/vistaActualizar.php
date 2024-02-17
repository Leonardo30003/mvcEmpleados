<?php
//incluye la clase Empleado y CrudEmpleado
	require_once('controladorEmpleado.php');
	require_once('modeloEmpleado.php');
	$controladorEmpleado= new $controladorEmpleado();
	$empleado=new Empleado();
	//busca el empleado utilizando el id, que es enviado por GET desde la vista mostrar.php
	$empleado=$controladorEmpleado->obtenerEmpleado($_GET['id']);
?>
<html>
<head>
	<title>Actualizar Empleado</title>
</head>
<body>
	<form action='controladorEmpleado.php' method='post'>
	<table>
		<tr>
			<input type='hidden' name='id' value='<?php echo $empleado->getId()?>'>
			<td>Nombre Empleado:</td>
			<td> <input type='text' name='nombre' value='<?php echo $empleado->getNombre()?>'></td>
		</tr>
		<tr>
			<td>Direccion:</td>
			<td><input type='text' name='direccion' value='<?php echo $empleado->getDireccion()?>' ></td>
		</tr>
		<tr>
			<td>Telefono:</td>
			<td><input type='text' name='telefono' value='<?php echo $empleado->getTelefono() ?>'></td>
		</tr>
		<tr>
			<td>Correo:</td>
			<td><input type='text' name='correo' value='<?php echo $empleado->getCorreo() ?>'></td>
		</tr>
		<input type='hidden' name='actualizar' value'actualizar'>
	</table>
	<input type='submit' value='Guardar'>
	<a href="index.php">Volver</a>
</form>
</body>
</html>