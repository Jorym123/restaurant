<?php
    require_once __DIR__ .'/../config/database.php';

    function obtenerClientes() {
        global $tasksCollection;
        return $tasksCollection->find();
    }

    function formatDate($dateString) {
        $dateTime = new DateTime($dateString);
        return $dateTime->format('Y-m-d');
    }
    function agregarCliente($nombre, $dni, $fecharegistro,) {
        global $tasksCollection;
        $newTask = [
            'nombre' => $nombre,
            'dni' => $dni,
            'fecharegistro' => $fecharegistro,
        ];
        return $tasksCollection->insertOne($newTask);
    }
    function obtenerclientePorId($id) {
        global $tasksCollection;
        return $tasksCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    }
    function actualizarRegistro($id, $nombre, $dni, $fecharegistro, $cancelado) {
        global $tasksCollection;
        $update = [
            '$set' => [
                'nombre' => $nombre,
                'dni' => $dni,
                'fecharegistro' => $fecharegistro,
                'cancelado' => $cancelado
            ]
        ];
        return $tasksCollection->updateOne(['_id' => new MongoDB\BSON\ObjectId($id)], $update);
    }
    function eliminarCliente(){
    if (isset($_GET['action']) && $_GET['action'] == 'eliminar') {
        $id = $_GET['id'];
        eliminarCliente($id);
        header('Location: index.php');
    }
   }
    
?>