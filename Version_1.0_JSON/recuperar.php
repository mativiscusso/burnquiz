<?php
include('validar.php');
include("header.php");
function titulo()
{
    echo "Burn Quiz";
}
?>
<div id="formulario">
    <div>
        <h1>Recuperar cuenta</h1>
        <hr>
        <form action="validar.php" method="POST">
            <label for="email"> Ingresá tu correo electrónico para buscar tu cuenta.</label>
            <input type="email" name="email" id="email" placeholder="Inserte su email">
            <input type="submit" value="Enviar" id="boton">
        </form>
        <hr>
    </div>
</div>

<?php include("footer.php"); ?>
</body>

</html>