<?php
// incluye la clase Db
require_once('conexion.php');

class Empleado {
    private $id;
    private $nombre;
    private $direccion;
    private $telefono;
    private $correo;

    function __construct(){}

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    // método para insertar, recibe como parámetro un objeto de tipo empleado
    public function insertar($empleado){
        $db = Db::conectar();
        $insert = $db->prepare('INSERT INTO empleados VALUES (NULL, :nombre, :direccion, :telefono, :correo)');
        $insert->bindValue('nombre', $empleado->getNombre());
        $insert->bindValue('direccion', $empleado->getDireccion());
        $insert->bindValue('telefono', $empleado->getTelefono());
        $insert->bindValue('correo', $empleado->getCorreo());
        $insert->execute();
    }

    // método para mostrar todos los empleados
    public function mostrar(){
        $db = Db::conectar();
        $listaEmpleados = [];
        $select = $db->query('SELECT * FROM empleados');

        foreach($select->fetchAll() as $empleado){
            $myEmpleado = new Empleado();
            $myEmpleado->setId($empleado['id']);
            $myEmpleado->setNombre($empleado['nombre']);
            $myEmpleado->setDireccion($empleado['direccion']);
            $myEmpleado->setTelefono($empleado['telefono']);
            $myEmpleado->setCorreo($empleado['correo']);
            $listaEmpleados[] = $myEmpleado;
        }
        return $listaEmpleados;
    }

    // método para eliminar un empleado, recibe como parámetro el id del empleado
    public function eliminar($id){
        $db = Db::conectar();
        $eliminar = $db->prepare('DELETE FROM empleados WHERE id=:id');
        $eliminar->bindValue('id', $id);
        $eliminar->execute();
    }

    // método para buscar un empleado, recibe como parámetro el id del empleado
    public function obtenerEmpleado($id){
        $db = Db::conectar();
        $select = $db->prepare('SELECT * FROM empleados WHERE id=:id');
        $select->bindValue('id', $id);
        $select->execute();
        $empleado = $select->fetch();
        $myEmpleado = new Empleado();
        $myEmpleado->setId($empleado['id']);
        $myEmpleado->setNombre($empleado['nombre']);
        $myEmpleado->setDireccion($empleado['direccion']);
        $myEmpleado->setTelefono($empleado['telefono']);
        $myEmpleado->setCorreo($empleado['correo']);
        return $myEmpleado;
    }

    // método para actualizar un empleado, recibe como parámetro el empleado
    public function actualizar($empleado){
        $db = Db::conectar();
        $actualizar = $db->prepare('UPDATE empleados SET nombre=:nombre, direccion=:direccion, telefono=:telefono, correo=:correo WHERE id=:id');
        $actualizar->bindValue('id', $empleado->getId());
        $actualizar->bindValue('nombre', $empleado->getNombre());
        $actualizar->bindValue('direccion', $empleado->getDireccion());
        $actualizar->bindValue('telefono', $empleado->getTelefono());
        $actualizar->bindValue('correo', $empleado->getCorreo());
        $actualizar->execute();
    }
}
?>
