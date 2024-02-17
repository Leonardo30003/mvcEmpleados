
<?php
//incluye la clase Libro y CrudLibro

require_once('controladorEmpleado.php');

$controladorEmpleado= new $controladorEmpleado();
//obtiene todos los libros con el método mostrar de la clase crud
$listaEmpleados=$controladorEmpleado->mostrar();
?>
 
<html>
<head>
	<title>Mostrar Empleados</title>
</head>
<body>
	<table border=1>
		<head>
			<td>Nombre</td>
			<td>Direccion</td>
			<td>Telefono</td>
			<td>Correo</td>
			<td>Actualizar</td>
			<td>Eliminar</td>
		</head>
		<body>
			<?php foreach ($listaEmpleados as $empleado) {?>
			<tr>
				<td><?php echo $empleado->getNombre() ?></td>
				<td><?php echo $empleado->getDireccion() ?></td>
				<td><?php echo $empleado->getTelefono()?> </td>
				<td><?php echo $empleado->getCorreo()?> </td>
				<td><a href="vistaActualizar.php?id=<?php echo $empleado->getId()?>&accion=a">Actualizar</a> </td>
				<td><a href="controladorEmpleado.php?id=<?php echo $empleado->getId()?>&accion=e">Eliminar</a>   </td>
			</tr>
			<?php }?>
		</body>
	</table>
	<a href="index.php">Volver</a>
</body>
</html>