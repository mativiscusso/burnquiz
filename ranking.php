<?php  
include_once('validar.php');   
function titulo(){
    echo "Burn Quiz | Ranking";
}
?>

<?php include("header.php"); ?>
    <div class="container py-5">
        <h3>
            <p class="descripcion" id="contacto">RANKING DE USUARIOS</p>
        </h3>
    </div>
    <div class="container py-5" id="contacto">
      <?php getAllUsersRanking()?> 
    
    </div>

<?php include("footer.php"); ?>

</body>
</html>