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
    <link rel="shortcut icon" href="img/burnquiz_logow.png">
    <title>Burn Quiz</title>
</head>
<body>
  <?php include("header.php"); ?>
    
    <div id="portada" class="container.fluid">
        <main class="row">
            <div id="left" class="col-12 col-md-6 py-5">
                <span id="titulo">BURN</span>
                <span id="titulo">Quiz</span>
            </div>
            <div id="right" class="col-12 col-md-6 py-5">
                <img src="img/burnquiz_logo.png"  alt="">
            </div>
        </main>
    </div>
    <div class="container py-5">
        <section>
            <!-- descripcion -->
            <p class="descripcion">Burn Quiz es un juego desarrollado con el fin de ser presentado como trabajo integrador en el curso de Diseño Web FullStack dictado por Digital House.</p>
            <p class="descripcion">La trivia estara compuesta por preguntas capciosas o de pensamiento logico, las cuales tendran 3 posibles respuestas. El objetivo del juego es acumular la mayor cantidad de preguntas acertadas en un lapso de tiempo determinado.</p>
        </section>
    </div>

<?php include("footer.php"); ?>

</body>
</html>