<?php
//valida que el usuario presiono el reCAPTCHA
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $ip = $_SERVER["REMOTE_ADDR"];
  $captcha = $_POST['g-recaptcha-response'];
  $secretKey = '6LdaODQmAAAAANwgfEpuL2XmO4PjYsI_mvm9kirg';

  $errors = array();

  $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captcha}&remoteip={$ip}");

  $atributos = json_decode($response, TRUE);

  if (!$atributos['success']) {
    $errors[] = 'Verifica el captcha';
  } else {
    header("Location: peli.php");
    exit();
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FilmHub</title>
  <link rel="icon" href="img/icono.jpg">
    <link rel="stylesheet" href="css/ofertas.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <style>
    .modal-dialog {
      max-width: 300px;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
      padding: 0;
    }

    .modal-content {
      background-color: transparent;
      border: none;
      box-shadow: none;
    }

    .modal-header {
      border-bottom: none;
    }
  </style>
    <script>
    function onSubmit(token) {
      document.getElementById("ver").submit();
    }

    function submitForm() {
      document.querySelector('form').submit();
    }
  </script>
</head>
<body>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<header>
  <nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <img class="icono" src="img/icono.jpg" alt="">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categorias
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#accion">Acción</a></li>
            <li><a class="dropdown-item" href="#aven">Aventura</a></li>
            <li><a class="dropdown-item" href="#beli">Bélico</a></li>
            <li><a class="dropdown-item" href="#cien">Ciencia Ficción</a></li>
            <li><a class="dropdown-item" href="#come">Comedia</a></li>
            <li><a class="dropdown-item" href="#dram">Drama</a></li>
            <li><a class="dropdown-item" href="#terr">Terror</a></li>
            <li><hr class="dropdown-divider"></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br><br><br>
</header>


<section>
<center>
<img class="film" src="img/film.png" alt="">
</center>
</section>
<br><br><br><br><br><br><br><br><br>

<!-- Messenger Plugin de chat Code -->
<div id="fb-root"></div>

<!-- Your Plugin de chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "105574405890239");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v17.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>



<center><h1 id="accion" class="titulo">Acción</h1></center>
<div class="wrapper1">
  <div class="card1">
    <img src="img/aka.jpg" alt="">
    <div class="info">
      <h1>AKA</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
     
    </div>
  </div>
</div>

<div class="wrapper2">
  <div class="card1">
    <img src="img/escuadron.jpg" alt="">
    <div class="info">
      <h1>Escuadron 6</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>

<div class="wrapper3">
  <div class="card1">
    <img src="img/sobre.jpg" alt="">
    <div class="info">
      <h1>El Sobreviviente</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>

<div class="wrapper4">
  <div class="card1">
    <img src="img/john.webp" alt="">
    <div class="info">
      <h1>John Wick</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>
<br><br><br>

<center><h1 id="aven" class="titulo">Aventura</h1></center>
<div class="wrapper5">
  <div class="card1">
    <img src="img/india.jpg" alt="">
    <div class="info">
      <h1>Indiana Jones</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>

<div class="wrapper6">
  <div class="card1">
    <img src="img/fly.jpg" alt="">
    <div class="info">
      <h1>Flynn</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>

<div class="wrapper7">
  <div class="card1">
    <img src="img/momia.jpg" alt="">
    <div class="info">
      <h1>La Momia</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>

<div class="wrapper8">
  <div class="card1">
    <img src="img/piratas.jpg" alt="">
    <div class="info">
      <h1>Piratas del Caribe</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>
<br><br><br>

<center><h1 id="beli" class="titulo">Bélico</h1></center>
<div class="wrapper9">
  <div class="card1">
    <img src="img/19.webp" alt="">
    <div class="info">
      <h1>1917</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>

<div class="wrapper10">
  <div class="card1">
    <img src="img/salvar.jpg" alt="">
    <div class="info">
      <h1>Salvar al soldado Ryan</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>

<div class="wrapper11">
  <div class="card1">
    <img src="img/sin.jpg" alt="">
    <div class="info">
      <h1>Sin Novedad En El Frente</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>

<div class="wrapper12">
  <div class="card1">
    <img src="img/ultimo.jpg" alt="">
    <div class="info">
      <h1>Hasta el ultimo Hombre</h1>
      <p> </p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>
<br><br><br>

<center><h1 id="cien" class="titulo">Ciencia Ficción</h1></center>
<div class="wrapper9">
  <div class="card1">
    <img src="img/guar.jpg" alt="">
    <div class="info">
      <h1>Guardianes de la Galaxia</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>

<div class="wrapper10">
  <div class="card1">
    <img src="img/inter.jpg" alt="">
    <div class="info">
      <h1>Interstellar</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>

<div class="wrapper11">
  <div class="card1">
    <img src="img/negros.webp" alt="">
    <div class="info">
      <h1>Hombres de Negro</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>

<div class="wrapper12">
  <div class="card1">
    <img src="img/tron.webp" alt="">
    <div class="info">
      <h1>Tron</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>
<br><br><br>

<center><h1 id="come" class="titulo">Comedia</h1></center>
<div class="wrapper9">
  <div class="card1">
    <img src="img/chiquito.jpg" alt="">
    <div class="info">
      <h1>Chiquito pero Peligroso</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>

<div class="wrapper10">
  <div class="card1">
    <img src="img/no.jpg" alt="">
    <div class="info">
      <h1>No se aceptan devoluciones</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>

<div class="wrapper11">
  <div class="card1">
    <img src="img/que.jpg" alt="">
    <div class="info">
      <h1>¿Que paso Ayer?</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>

<div class="wrapper12">
  <div class="card1">
    <img src="img/scary.jpg" alt="">
    <div class="info">
      <h1>Scary Movie</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>
<br><br><br>

<center><h1 id="drma" class="titulo">Drama</h1></center>
<div class="wrapper9">
  <div class="card1">
    <img src="img/cambio.jpg" alt="">
    <div class="info">
      <h1>Cambio de Reinas</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>

<div class="wrapper10">
  <div class="card1">
    <img src="img/cher.jpg" alt="">
    <div class="info">
      <h1>Chernobyl</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>

<div class="wrapper11">
  <div class="card1">
    <img src="img/king.jpg" alt="">
    <div class="info">
      <h1>The King</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>

<div class="wrapper12">
  <div class="card1">
    <img src="img/padri.jpg" alt="">
    <div class="info">
      <h1>El Padrino</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>
<br><br><br>

<center><h1 id="terr" class="titulo">Terror</h1></center>
<div class="wrapper9">
  <div class="card1">
    <img src="img/conjuro.jpeg" alt="">
    <div class="info">
      <h1>El Conjuro</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>

<div class="wrapper10">
  <div class="card1">
    <img src="img/ins.jpg" alt="">
    <div class="info">
      <h1>La Noche Del Demonio</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>

<div class="wrapper11">
  <div class="card1">
    <img src="img/it.jpg" alt="">
    <div class="info">
      <h1>IT</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>

<div class="wrapper12">
  <div class="card1">
    <img src="img/smile.webp" alt="">
    <div class="info">
      <h1>Smile</h1>
      <p></p>
      <button class="btn" data-toggle="modal" data-target="#myModal">Comprar</button>
    </div>
  </div>
</div>
<br><br><br>
<!-- modal -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        </div>
        <!-- reCAPTCHA -->
        <form id="ver" action="" method="post">
          <div class="modal-body" style="text aling-center">
            <div class="mb-3">
              <div class="g-recaptcha" data-sitekey="6LdaODQmAAAAAERG16xF_IbvqQT2tztjuIa4wTlb"
                data-callback="submitForm"></div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>



