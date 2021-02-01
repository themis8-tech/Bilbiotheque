<?php
include_once "config/config.php";
include_once "config/db_connect.php";

//requete liste des livres

$sql = "SELECT `id`,`title`,`description`, `cover` FROM `book`";

$query = $pdo->prepare($sql);
$query->execute();
$books = $query->fetchAll(PDO::FETCH_OBJ);

include_once HEADER_PATH;
?>

<!-- ======================================================= -->
<!-- 1ere lettre en majuscule et le reste en minuscule -->
<h1 class="text-center"><?=ucfirst(strtolower($title_site))?></h1>

<br>

<!-- AFFICHAGE LISTE DES LIVRES -->
<div class="row ">

   <?php foreach($books as $book) : ?>
      <div class="col-3 ">
         <div class="card .card-block">
            <img class="card-img-top"style="max-height:300px;" src="<?= $book->cover ?>" alt="Couverture du livre">
            <div class="card-body">
               <h5 class="card-title text-center"> <a href="book.php?id=<?=$book->id?>" class="text primary"><?= $book->title ?></a></h5>
               <p class="card-text"><?= substr($book->description,0,120) ?></p>
            </div>
         </div>
      </div>
   <?php endforeach; ?>

</div>

<!-- ======================================================= -->

<?php include_once FOOTER_PATH ?>