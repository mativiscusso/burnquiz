<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/recuperar.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Recuperar cuenta</title>
</head>

<body>
    <?php include("header.php"); ?>
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