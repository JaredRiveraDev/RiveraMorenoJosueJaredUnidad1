<!DOCTYPE html>
<html>

<head>
    <title>Registro</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        h2 {
            color: #FFA500;
        }

        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="email"],
        input[type="password"] {
            padding: 8px;
            border: none;
            background-color: #fff;
            color: #000;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #FFA500;
            border: none;
            color: #fff;
            cursor: pointer;
        }

        a {
            color: #FFA500;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        p {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <center>
        <h2>Registro</h2>
    </center>
    <form action="registro.php" method="post">
        Nombre: <input type="text" name="nombre" required><br>
        Email: <input type="email" name="email" required><br>
        Contraseña: <input type="password" name="password" required><br>
        Pregunta de seguridad: <input type="text" name="pregunta" required><br>
        Respuesta de seguridad: <input type="text" name="respuesta" required><br>
        <input type="submit" value="Registrarse">
    </form>
    <center>
        <p><a href="login.php">Iniciar Sesión</a></p>
    </center>

    <?php
    // Conexión a la base de datos
    $con = mysqli_connect("localhost", "root", "", "pelisdb");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $pregunta = $_POST["pregunta"];
        $respuesta = $_POST["respuesta"];

        // Verificar si el usuario ya existe en la base de datos
        $query = "SELECT * FROM usuarios WHERE email='$email'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "El email ya está registrado.";
        } else {
            // Insertar el nuevo usuario en la base de datos
            $query = "INSERT INTO usuarios (nombre, email, password, pregunta_seguridad, respuesta_seguridad) 
                      VALUES ('$nombre', '$email', '$password', '$pregunta', '$respuesta')";

            if (mysqli_query($con, $query)) {
                echo "Registro exitoso. <a href='login.php'>Iniciar sesión</a>";
            } else {
                echo "Error en el registro: " . mysqli_error($con);
            }
        }

        mysqli_close($con);
    }
    ?>
</body>

</html>