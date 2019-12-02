<?php
include('validar.php');


function titulo()
{
    echo "Burn Quiz | Contacto";
}
?>

<?php include("header.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="author" content="" -->>
    <link rel="icon" href="../image/favicon.ico">

    <title>Contacto</title>
</head>


<body>


<section>
    <div class="container">
        <div class="container">
            <h4></h4>
            <div class="container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.2602246461024!2d-60.6533856842138!3d-32.944138379092315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95b7ab6f7af376c1%3A0xcf2755869f7067ec!2sPunto%20ian%20Co.!5e0!3m2!1ses!2sar!4v1574108485740!5m2!1ses!2sar" style="border:0" allowfullscreen="" frameborder="0" height="250" width="100%"></iframe>
            </div>
            <strong>Contactenos</strong><br><strong>Oficina:</strong> 123456789
            <hr>
        </div>
        <div class="container">
            <form role="form" id="Formulario" action="contacto.php" method="POST">
                <div class="form-group">
                    <label class="control-label" for="Nombre">Nombres</label>
                    <input type="text" class="form-control" id="Nombre" name="nombre" placeholder="Introduzca su nombre" required autofocus value="" />
                </div>            
                

                <div class="form-group">
                    <label class="control-label" for="Correo">Dirección de Correo Electrónico</label>
                    <input type="email" class="form-control" id="Correo" name="email" placeholder="Introduzca su correo electrónico" required value=""/>
                </div>
                <div class="form-group">
                    <label class="control-label" for="Empresa">Telefono</label>
                    <input type="text" class="form-control" id="Empresa" name="telefono" placeholder="Introduzca el nombre de su empresa" required value="" />
                </div>
                <div class="form-group">
                    <label class="control-label" for="Mensaje">Mensaje</label>
                    <textarea rows="5" cols="30" class="form-control" id="Mensaje" name="mensaje" placeholder="Introduzca su mensaje" required ></textarea>
                </div>
                <div class="form-group">                
                    <input type="submit" class="btn btn-primary" value="Enviar">
                    <input type="reset" class="btn btn-light" value="Limpiar">                
                </div>
                <div id="respuesta" style="display: none;"></div>
            </form>
        </div>       
    </div>
</section>
</body>
</html>










    


































    <?php include("footer.php"); ?>

    </body>

    </html>