<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $apellido = md5 ($_POST["apellido"]);
    $edad = $_POST["edad"];

    $sql = "INSERT INTO registros (nombre, apellido, edad) VALUES ('$nombre', '$apellido', $edad)";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
