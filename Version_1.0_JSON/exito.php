<?php
include_once('validar.php');
function titulo()
{
    echo "Burn Quiz | VICTORIA";
}
?>

<?php include("header.php"); ?>

<div id="portada" class="container.fluid">
    <main class="row">
        <div id="left" class="col-12 col-md-6 py-3">
            <span id="tituloexito"><?=$_SESSION['userLoged']['name']?></span><br>
            <br>
            <span id="tituloexito"><?=" Su puntaje es " . $_SESSION['userLoged']['puntaje']; ?></span><br>
        </div>
        <div id="right" class="col-12 col-md-6 py-3">
            <img src="img/bebe_exitoso.png" alt="">
        </div>
    </main>
    
    
    
</div>


<?php include("footer.php"); ?>
</body>

</html>