
<?php
include("conexion.php");

// Obtener el ID de la solicitud (GET o POST)
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
} else {
    echo "Parámetros no válidos";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Obtener los datos del registro a editar
        $sql = "SELECT * FROM registros WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
            $edad = $row['edad'];
        } else {
            echo "Registro no encontrado";
            exit();
        }
    } else {
        echo "ID no proporcionado";
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Resto del código para manejar la actualización
} else {
    echo "Método de solicitud no válido";
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Actualizar el registro con los nuevos datos
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $edad = $_POST["edad"];

    $sql = "UPDATE registros SET nombre='$nombre', apellido='$apellido', edad=$edad WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


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

        input[type="submit"] {
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
    <h2>Editar Registro</h2>
    <form action="editar.php?id=<?php echo $id; ?>" method="POST">
        <label for="nombre">Usuario:</label>
        <input type="text" name="nombre" value="<?php echo $nombre; ?>" required>

        <label for="apellido">Contraseña:</label>
        <input type="password" name="apellido" value="<?php echo $apellido; ?>" required readonly>



        <label for="edad">Edad:</label>
        <input type="number" name="edad" value="<?php echo $edad; ?>" required>

        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
