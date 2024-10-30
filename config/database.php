<?php
require_once __DIR__ . '/../vendor/autoload.php';
$mongoClient = new MongoDB\Client("mongodb+srv://Jorym:bWLQVsENVMtcKzZY@cluster0.4921e.mongodb.net/?retryWrites=true&w=majority&appName=Cluster0");
$database =$mongoClient->selectDataBase('restaurante');
$tasksCollection = $database->clientes;