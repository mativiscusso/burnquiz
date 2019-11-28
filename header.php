<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <link rel="shortcut icon" href="img/burnquiz_logow.png">
  <link rel="stylesheet" href="css/estilosIndex.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="source/jquery-labelauty.js"></script>
	<link rel="stylesheet" type="text/css" href="source/jquery-labelauty.css">
  <script src="js/barra.js"></script>
  <title>
    <?php
    titulo();
    ?>
  </title>
</head>

<body>
  <header>
    <nav id="menu" class="navbar navbar-expand-lg navbar-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span id="iconboton" class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <ul class="navbar-nav mr-auto" style="
    margin-left: 0px">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="faq.php">FAQs</a>
          </li>
          <?php
          if (!isLogged()) {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="registro.php">REGISTRO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">LOGIN</a>
            </li>
          <?php
          }
          ?>
          <?php
          if (isLogged()) {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="abm.php">ABM</a>
            </li>
          <?php
          }
          ?>
          <li class="nav-item">
            <a class="nav-link" href="ranking.php">RANKING</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contacto.php">CONTACTO</a>
          </li>
        </ul>
        <?php
        if (!isLogged()) {
          ?>
          <span class="navbar-text">
            <img src="img/burnquiz_logow.png" width="10%" alt="">
          </span>
        <?php
        }
        ?>
        <?php
        if (isLogged()) {
          ?>
          <li id="menulogueado">
            <a href=""><?= $_SESSION['userLoged']['name'] ?></a>
            <img id="imgperfil" src="files/avatars/<?= $_SESSION['userLoged']['avatar']; ?>">
            <a href="perfil.php">Mi perfil</a> |
            <a href="logout.php">Salir</a>
          </li>
        <?php
        }
        ?>
      </div>
    </nav>
  </header>