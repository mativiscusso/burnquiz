<?php
session_start();
require_once('db/databases.php');
$db = obtenerBaseDeDatos();
function titulo()
{
    echo "Burn Quiz | Ranking";
}
function ranking(PDO $db)
{
    $consulta = $db->prepare("SELECT nombre, usuario, puntaje FROM usuarios ORDER BY puntaje DESC");
    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    return $resultado;
}
$ranking = ranking($db);
$a = 1;

?>

<?php include("header.php"); ?>
<div class="container py-5">
    <h3>
        <p class="descripcion">RANKING DE USUARIOS</p>
    </h3>
</div>
<div class="container py-1">
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Usuario</th>
      <th scope="col">Puntaje</th>
    </tr>
  </thead>
  <?php foreach($ranking as $value):?>
   <tbody>
    <tr>
      <th scope="row"><?=$a++?></th>
      <td><?=$value['nombre']?></td>
      <td><?=$value['usuario']?></td>
      <td><?=$value['puntaje']?></td>
    </tr>
   </tbody>
  <?php endforeach;?>
</table>

</div>

<?php include("footer.php"); ?>

</body>

</html>