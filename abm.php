<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/estilosIndex.css">
    <link rel="stylesheet" href="css/abm.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ce5356fa46.js"></script>
    <title>Creá tus preguntas</title>
</head>
<body>
<?php include("header.php"); ?>

    <div class="preguntas">
        <img src="img/burnquiz_logo.png" id="img" alt="logo">
    <form action="validar.php" method="get">
        <label for="pregunta">Sumá tu pregunta.</label>
        <br>
        <textarea name="pregunta" id="pregunta" cols="10" rows="5"></textarea>
        <br>
        <label>Y ahora las posibles respuestas.</label>
        <br>
        <label for="respuesta1">Respuesta 1:</label>
        <br>
        <input type="text" id="respuesta1" class="preg" name="resp1">
        <br>
        <label for="respuesta2">Respuesta 2:</label>
        <br>
        <input type="text" id="respuesta2" class="preg" name="resp2">
        <br>
        <label for="respuesta3">Respuesta 3:</label>
        <br>
        <input type="text" id="respuesta3" class="preg" name="resp3">
        <br>
        <label for="respuesta4">Respuesta 4:</label>
        <br>
        <input type="text" id="respuesta4" class="preg" name="resp4">
        <br>
        <button type="submit" class="btn-primary">Cargar</button>
    </form>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>