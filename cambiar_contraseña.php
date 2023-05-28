<!DOCTYPE html>
<html>

<head>
    <title>Cambiar contraseña</title>
    <br>
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
        input[type="text"],
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
    </style>

</head>

<body>
    <center>
        <h2>Cambiar contraseña</h2>
    </center>
    <form action="cambiar_contraseña.php" method="post">
        Email: <input type="email" name="email" required><br>
        Nombre de usuario: <input type="text" name="username" required><br>
        Respuesta de seguridad: <input type="text" name="pregunta" required><br>
        Nueva contraseña: <input type="password" name="nueva_contraseña" required><br>
        <input type="submit" value="Cambiar contraseña">
    </form>
    <center>
        <p><a href="login.php">Iniciar Sesión</a></p>
    </center>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $username = $_POST["username"];
        $pregunta = $_POST["pregunta"];
        $nuevaContraseña = $_POST["nueva_contraseña"];

        // Conexión a la base de datos
        $con = mysqli_connect("localhost", "root", "", "pelisdb");

        // Verificar si el usuario y la pregunta de seguridad coinciden
        $query = "SELECT * FROM usuarios WHERE email='$email' AND nombre='$username' AND respuesta_seguridad='$pregunta'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 1) {
            // Actualizar la contraseña
            $query = "UPDATE usuarios SET password='$nuevaContraseña' WHERE email='$email'";
            if (mysqli_query($con, $query)) {
                echo "Contraseña actualizada correctamente.";
            } else {
                echo "Error al actualizar la contraseña: " . mysqli_error($con);
            }
        } else {
            echo "Usuario o pregunta de seguridad incorrectos.";
        }

        mysqli_close($con);
    }
    ?>
</body>

</html>