<?php
// Inicia la sesión de usuario
session_start();

// Conexión a la base de datos
require("conn.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/img/minilogo.png" />
    <link rel="stylesheet" href="assets/css/login.css" />
    <!-- cdn toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <!-- cdn bostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <title>login</title>
</head>

<body>

    <div class="container">
        <br>
        <form action="login.php" method="post" class="form login">
            <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>

            <div class="login">
                <div class="login-header">
                    <h1>Login</h1>
                </div>
                <div class="login-form">
                    <h3>Email:</h3>
                    <input type="text" placeholder="Email" name="email" /><br>
                    <h3>Password:</h3>
                    <input type="password" placeholder="Password" name="password" />
                    <br>
                    <input type="submit" value="Iniciar sesión" class="btn btn-dark">
                    <br>
                    <a class="sign-up">Sign Up!</a>
                    <br>
                    <h6 class="no-access">Can't access your account?</h6>
                </div>
            </div>
            <!-- <div class="error-page">
                <div class="try-again">Error: Try again?</div>
            </div> -->

        </form>

    </div>

</body>

</html>

<?php
// Verifica que el formulario se envió
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtiene los datos ingresados por el usuario
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta la base de datos para verificar las credenciales
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($query);


    // Si se encontró un registro, inicia la sesión y redirige según el rol
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user_role'] = $user['role'];
        if ($user['role'] == 'admin') {
            header('Location: admin.php');
        } else {
            header('Location: index.php');
        }
        exit;
    } else {
        // Si la contraseña es incorrecta, muestra una alerta con "toastr"
        echo "<script>iziToast.error({
            title: 'Error',
            message: 'Contraseña incorrecta',
            position: 'topRight'
          });</script>";
    }
}
?>