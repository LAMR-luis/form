<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>UPVT</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 15px;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-image: url("fondo1.jpeg");
            background-size: cover;
        }

        h2 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            width: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #FF6E33;
        }

        label {
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            width: 20%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"], button {
            background-color: #E9FF33;
            color: black;
            cursor: pointer;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            background-color: #F3DA36;
        }

        th {
            background-color: #E9FF33;
            color: black;
        }

        .edit, .delete {
            display: inline-block;
            padding: 5px 10px;
            margin: 5px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        .edit {
            background-color: #2196F3;
        }

        .delete {
            background-color: #f44336;
        }
    </style>
</head>
<body>

<button onclick="window.location.href='Index.html'">Regresar</button>
<?php
include("conexion.php");

$sql = "SELECT * FROM registros";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Contraseña</th>
            <th>Edad</th>
            <th></th>
          </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["nombre"] . "</td>";
        echo "<td>" . $row["apellido"] . "</td>";
        echo "<td>" . $row["edad"] . "</td>";
        echo '<td><a class="edit" href="editar.php?id=' . $row["id"] . '">Editar</a> | <a class="delete" href="eliminar.php?id=' . $row["id"] . '">Eliminar</a></td>';
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No hay registros</p>";
}

$conn->close();
?>
    
</body>
</html>




