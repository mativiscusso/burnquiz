<?php
    function titulo(){
      echo "Burn Quiz | ABM";
    }
?>
<?php include("header.php"); ?>

    <div class="preguntas">
        <img id="imgpreguntas" src="img/burnquiz_logo.png" id="img" alt="logo">
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
        <br>
        <button type="submit" class="btn-primary">Cargar</button>
    </form>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>