<?php
$nombre = '';
$email = '';
$telefono = '';
if ($_POST) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

}
$validNombre = "";
$validEmail = "";
$validTel = "";
if ($_POST) {
        if ($_POST['nombre'] == "") {
          $validNombre = "El campo esta vacio";
        }
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {
          $validEmail = "El campo no contiene un email correcto";
        }
        if (is_numeric($_POST['telefono']) == false) {
          $validTel = "El campo no es un numero telefonico";
        }
        else header('Location: http://www.google.com/');
      }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilosIndex.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="img/burnquiz_logow.png">
    <title>Burn Quiz</title>
</head>
<?php include("header.php"); ?>
    <div class="container-fluid fondoama">
    <p class="descripcion" id="contacto">CONTACTANOS</p>
        <main class="row">
            <div id="left" class="container py-5">
                <form action="contacto.php" method="POST">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nombre</label>
                        <input type="text" class="form-control" id="formGroupExampleInput" name="nombre" value="<?=$nombre?>">
                       <?= $validNombre;?>    
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Email</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" name="email" value="<?=$email?>">
                        <?= $validEmail;?>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Telefono</label>
                        <input type="text" class="form-control" id="formGroupExampleInput2" name="telefono" value="<?=$telefono?>">
                        <?= $validTel;?>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2"></label>
                        <textarea name="comentario" id="" cols="90" rows="20"></textarea>
                    </div>
                    <button class="btn btn-dark" type="submit">Enviar</button>
                </form>
            </div>
     
            <div class="container py-5">
                <section>
                <iframe class="container" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.282049390131!2d-60.65268828599803!3d-32.94356205604301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b7ab3f847dc269%3A0xa8a707d0dded8c7e!2sC%C3%B3rdoba%202035%2C%20S2000AXG%20Rosario%2C%20Santa%20Fe!5e0!3m2!1ses-419!2sar!4v1569074935124!5m2!1ses-419!2sar" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe> 
                </section>
            </div>
    </main>
<?php include("footer.php"); ?>

</body>
</html>