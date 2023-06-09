<!DOCTYPE html>
<html>

<head>
    <title>Iniciar sesión</title>
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
        <h2>Iniciar sesión</h2>
    </center>
    <br>
    <form action="login.php" method="post">
        Email: <input type="email" name="email" required><br>
        Contraseña: <input type="password" name="password" required><br>
        <input type="submit" value="Iniciar sesión">
    </form>
    <center>
        <p><a href="registro.php">Registrarse</a></p>
        <p><a href="cambiar_contraseña.php">¿Olvidaste tu contraseña?</a></p>
    </center>

    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        // Conexión a la base de datos
        $con = mysqli_connect("localhost", "root", "", "pelisdb");

        // Verificar las credenciales del usuario
        $query = "SELECT * FROM usuarios WHERE email='$email' AND password='$password'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 1) {
            // Inicio de sesión exitoso, guardar la información en la sesión
            $_SESSION["email"] = $email;
            header("Location: vistaprincipal.php");
        } else {
            echo "Credenciales inválidas.";
        }

        mysqli_close($con);
    }
    ?>
</body>

</html>