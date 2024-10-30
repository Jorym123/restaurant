<?php
    require_once __DIR__.'/functions.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = agregarCliente($_POST['nombre'], $_POST['dni'], $_POST['fecharegistro']);
        if ($id) {
            header("Location: index.php?mensaje=Registro creado con éxito");
            exit;
        } else {
            $error = "No se pudo crear el registro.";
        }
    }
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nueva Tarea</title>
</head>
<body>
<?php if (isset($error)): ?>
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>

    <h1>Agregar Nueva Tarea</h1>
    <form method="POST">
        <label>Nombre:</label><br>
        <input type="text" name="nombre"><br>
        <label>DNI:</label><br>
        <input type="text" name="dni"><br>
        <label>Fecha de registro:</label><br>
        <input type="date" name="fecharegistro"><br>
        <input type="submit" value="Registrar">
    </form><br><br>
    <a href="index.php">Volver a la lista de registros</a>
</body>
</html>