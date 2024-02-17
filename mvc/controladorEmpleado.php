<?php
// Incluye la clase Empleado
require_once('modeloEmpleado.php');

$empleado = new Empleado();
$controladorEmpleado = new ControladorEmpleado();

// Si el elemento insertar no viene nulo llama al crud e inserta un empleado
if (isset($_POST['insertar'])) {
    $controladorEmpleado->insertar($_POST['nombre'], $_POST['direccion'], $_POST['telefono'], $_POST['correo']);
    header('Location: index.php');
// Si el elemento de la vista con nombre actualizar no viene nulo, llama al crud y actualiza el empleado
} elseif (isset($_POST['actualizar'])) {
    $controladorEmpleado->actualizar($_POST['id'], $_POST['nombre'], $_POST['direccion'], $_POST['telefono'], $_POST['correo']);
    header('Location: index.php');
// Si la variable accion enviada por GET es == 'e' llama al crud y elimina un empleado
} elseif (isset($_GET['accion'])) {
    if ($_GET['accion'] == 'e') {
        $controladorEmpleado->eliminar($_GET['id']);
        header('Location: index.php');
    // Si la variable accion enviada por GET es == 'a', envía a la página actualizar.php
    } elseif ($_GET['accion'] == 'a') {
        header('Location: vistaActualizar.php?id=' . $_GET['id']);
    }
}

class ControladorEmpleado {
    function __construct() {}

    // Método para mostrar todos los empleados
    public function mostrar() {
        $empleado = new Empleado();
        $listaEmpleados = $empleado->mostrar();
        return $listaEmpleados;
    }

    public function obtenerEmpleado($id) {
        $actEmpleado = new Empleado();
        return $actEmpleado->obtenerEmpleado($id);
    }

    public function insertar($nombre, $direccion, $telefono, $correo) {
        $nuevoEmpleado = new Empleado();
        $nuevoEmpleado->setNombre($nombre);
        $nuevoEmpleado->setDireccion($direccion);
        $nuevoEmpleado->setTelefono($telefono);
        $nuevoEmpleado->setCorreo($correo);
        // Llama a la función insertar definida en el CRUD
        $nuevoEmpleado->insertar($nuevoEmpleado);
    }

    // Método para eliminar un empleado, recibe como parámetro el id del empleado
    public function eliminar($id) {
        $eliminarEmpleado = new Empleado();
        $eliminarEmpleado->eliminar($id);
    }

    // Método para actualizar un empleado, recibe como parámetro el empleado
    public function actualizar($id, $nombre, $direccion, $telefono, $correo) {
        $actEmpleado = new Empleado();
        $actEmpleado->setId($id);
        $actEmpleado->setNombre($nombre);
        $actEmpleado->setDireccion($direccion);
        $actEmpleado->setTelefono($telefono);
        $actEmpleado->setCorreo($correo);
        $actEmpleado->actualizar($actEmpleado);
    }
}
?>
