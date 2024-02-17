<html>
<head>
	<title> Ingresar Empleado</title>
</head>
<header>
Ingresa los datos del Empleado
</header>
<form action='controladorEmpleado.php' method='post'>
	<table>
		<tr>
			<td>Nombre empleado:</td>
			<td> <input type='text' name='nombre'></td>
		</tr>
		<tr>
			<td>Direccion:</td>
			<td><input type='text' name='direccion' ></td>
		</tr>
		<tr>
			<td>Telefono:</td>
			<td><input type='text' name='telefono' ></td>
		</tr>
		<tr>
			<td>Correo:</td>
			<td><input type='text' name='correo' ></td>
		</tr>
		<input type='hidden' name='insertar' value='insertar'>
	</table>
	<input type='submit' value='Guardar'>
	<a href="index.php">Volver</a>
</form>
 
</html>