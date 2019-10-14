<?php    
    function titulo(){
      echo "Burn Quiz | FAQs";
    }
    ?>

  <?php include("header.php"); ?>
    
    <div id="portada" class="container.fluid">
        <main class="row">
            <div id="left" class="col-12 col-md-6 py-2">
                <span id="titulo">BURN</span>
                <span id="titulo">Quiz</span>
            </div>
            <div id="right" class="col-12 col-md-6 py-2">
                <img src="img/burnquiz_logo.png"  alt=""><br>
                <input type="checkbox" id="cb1" /><label id="cb2" for="cb1"><a id="start" href="juego.php">Start</a></label>
            </div>
        </main>
    </div>
    
        <section>
            <!-- descripcion -->
            <p class="descripcion">Burn Quiz es un juego desarrollado con el fin de ser presentado como trabajo integrador en el curso de Diseño Web FullStack dictado por Digital House.</p>
            <p class="descripcion">La trivia estara compuesta por preguntas capciosas o de pensamiento logico, las cuales tendran 3 posibles respuestas. El objetivo del juego es acumular la mayor cantidad de preguntas acertadas en un lapso de tiempo determinado.</p>
        </section>
    
    
<?php include("footer.php"); ?>
    

</body>
</html>