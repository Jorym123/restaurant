<?php
    require_once __DIR__ .'/functions.php';
    $clientes = obtenerClientes();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Tareas de Cursos</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Gestión de Registros</h1>

        <?php if (isset($mensaje)): ?>
            <div class="<?php echo $count > 0 ? 'success' : 'error'; ?>">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>

        <a href="agregar.php" class="button">Agregar Nuevo registro</a>

        <h2>Lista de Registros</h2>
        <table border =1>
            <tr>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Fecha de registro</th>
                <th>cancelado</th>
                <th>Acciones</th>
            </tr>
            <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?php echo htmlspecialchars($cliente['nombre']); ?></td>
                <td><?php echo htmlspecialchars($cliente['dni']); ?></td>
                <td><?php echo formatDate($cliente['fecharegistro']); ?></td>
                <td><?php if (isset($cliente['cancelado'])) { ?>
                 <?php echo $cliente['cancelado'] ? 'Sí' : 'No'; ?>
                   <?php } else { ?>
                 No definida
                  <?php } ?></td>
                <td class="actions">
                    <a href="editar.php?id=<?php echo $cliente['_id']; ?>" class="button">Editar</a>
                    <a href="functions.php?accion=eliminarCliente=<?php echo $cliente['_id']; ?>" class="button" onclick="return confirm('¿Estas seguro de que quieres eliminar este registro?');">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>

