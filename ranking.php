<?php  
include_once('validar.php');   
    function titulo(){
      echo "Burn Quiz | Ranking";
    }
    ?>

<?php include("header.php"); ?>
    <div class="container py-5">
        <section>
            <p class="descripcion" id="contacto">RANKING DE USUARIOS</p>
        </section>
    </div>
    <div class="container py-5" id="contacto">
        <section>
            <h5 id="menu">Top del Mes</h5>
            <p id="portada">Iván</p>
            <p id="portada">Carina</p>
            <p id="portada">Matías</p>
            <p id="portada">Florencia</p>
            <p id="portada">Sebastán</p>
        </section>
        <section>
            <h5 id="menu">Top del Año</h5>
            <p id="portada">Cristian</p>
            <p id="portada">Iván</p>
            <p id="portada">Carina</p>
            <p id="portada">Rupert</p>
            <p id="portada">Marino</p>
        </section>
    </div>

<?php include("footer.php"); ?>

</body>
</html>