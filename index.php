<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Propiedades</title>
</head>
<body>

<?php
    error_reporting(0);
    include('conexion.php');

    $consulta = "SELECT * FROM propiedades;";
    $res = mysqli_query($conexion, $consulta) or die("Consulta incorrecta");

    $n_filas = mysqli_num_rows($res);

    echo "<center><h1>Listado de Propiedades Inmobiliarias</h1></center>";

    echo "<table align=center>\n";
    echo "<tr bgcolor=#ffffaa>\n
            <th>Nombre</th>\n
            <th>Descripción</th>\n
            <th>Precio</th>\n
            <th>Ubicación</th>\n
            <th>Acciones</th>\n
        </tr>\n";

    for ($i = 1; $i <= $n_filas; $i++) {
        $fila = mysqli_fetch_array($res);
        echo "<tr>\n";
        echo "  <td>" . $fila['nombre'] . "</td>\n";
        echo "  <td>" . $fila['descripcion'] . "</td>\n";
        echo "  <td>" . $fila['precio'] . "</td>\n";
        echo "  <td>" . $fila['ubicacion'] . "</td>\n";
        echo "  <td><a href=editar.php?id=" . $fila['id'] . "><img src=ico_modificar.png alt='Editar' style='width: 20px; height: 20px;'></a>";
        echo "  <td><a href=eliminar.php?id=" . $fila['id'] . "><img src=ico_eliminar.png alt='Eliminar' style='width: 20px; height: 20px;'></a>";
        echo "</tr>\n";
    }
    echo "<tr><td colspan=5> <hr>";
    echo "<a href=anadir.php>Añadir Propiedad </a>";
    echo "</td></tr></table>";
?>

</body>
</html>

