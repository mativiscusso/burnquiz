<?php
include_once('validar.php');
function titulo()
{
    echo "Burn Quiz | ABM";
}
if ($_POST) {
    $pyrArray[] = $_POST;
}
?>
<?php include("header.php"); ?>

<div class="preguntas">
    <img id="imgpreguntas" src="img/burnquiz_logo.png" id="img" alt="logo">

    <form action="cargarpregunta.php" method="POST">
        <label for="pregunta">Sumá tu pregunta.</label>
        <br>
        <textarea name="pregunta" id="pregunta" cols="10" rows="5"></textarea>
        <br>
        <label>Y ahora las posibles respuestas.</label>
        <br>
        <label for="0">Respuesta 1:</label>
        <br>
        <input type="text" name="0" id="0">
        <br>
        <label for="1">Respuesta 2:</label>
        <br>
        <input type="text" name="1" id="1">
        <br>
        <label for="2">Respuesta Correcta:</label>
        <br>
        <input type="text" name="2" id="2">
        <br>
        <br>
        <button type="submit" class="btn-primary">Cargar</button>
    </form>
</div>
<?php include("footer.php"); ?>
</body>

</html>