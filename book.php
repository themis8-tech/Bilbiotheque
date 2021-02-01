<?php
include_once "config/config.php";
include_once "config/db_connect.php";

include_once HEADER_PATH;
?>

<!-- ======================================================= -->

<!-- requete affichage page unique livre -->

<?php 
      if (isset($_GET ['id']) && intval($_GET['id'])> 0)
   {
      $id = intval($_GET ['id']);
      $sql = "SELECT `title`,`author`,`description`, `price`,`cover`,`type` FROM `book` WHERE `id`=:id";
      $query = $pdo->prepare($sql);

      $query->bindParam(":id", $id, PDO::PARAM_INT);
      $query->execute();

      $single_book= $query->fetch(PDO::FETCH_OBJ);
      ?>

      <div class="container text-center">
         <div class="row">

            <h1><?=$single_book->title?></h1>

            <img style="max-height:300px;" src="<?=$single_book->cover?>" alt="couverture du livre">

            <h2><?=$single_book->author?></h2>

            <h3>Genre:<?=$single_book->type?></h3>

         </div>

         <p>Description:<?=$single_book->description?></p>

         <h3>Prix:<?=$single_book->price?> €</h3>

      </div> 


   <?php      
   }else
      {
      echo "erreur";
      }

   ?>

<?php include_once FOOTER_PATH ?>