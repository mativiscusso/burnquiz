<?php

function titulo()
{
    echo "Burn Quiz | VICTORIA";
}
?>

<?php include("header.php"); ?>

<div id="portada" class="container.fluid">
    <main class="row">
        <div id="left" class="col-12 col-md-6 py-3">
            <span id="titulo">Victoria</span>
        </div>
        <div id="right" class="col-12 col-md-6 py-3">
            <img src="img/bebe_exitoso.png" alt="">
        </div>
    </main>
    <h3><?= "Felicitaciones " . $_SESSION['userLoged'] . " Su puntaje es " . $_SESSION['userLoged']['puntaje']; ?></h3>
</div>


<?php include("footer.php"); ?>
</body>

</html>