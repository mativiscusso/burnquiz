<?php
session_start();
function titulo()
{
    echo "Burn Quiz | FINISH";
}
?>

<?php include("header.php"); ?>

<div id="portada" class="container py-5">
            <h1><?= "EL JUEGO HA TERMINADO"?></h1>
            <h2>USUARIO: <?=$_SESSION['correo']?>
            <h2>SU PUNTAJE ES:  <?=$_SESSION['puntaje']; ?></h2><br>
            <input type="checkbox" id="cb1" /><label id="cb2" for="cb1"><a id="start" href="juego.php" onclick="<?php $_SESSION['posicion'] = 9;?>">Juego Nuevo</a></label>
</div>


<?php include("footer.php"); ?>
</body>

</html>