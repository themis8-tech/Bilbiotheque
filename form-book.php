<?php
include_once "config/config.php";
include_once "config/db_connect.php";

// valeur des champs

$book_title =  null;
$book_author = null;
$book_type = null;
$book_price = null;
$book_description =  null;
$book_image = "assets/img/no-cover.jpg";

include_once HEADER_PATH;
include_once SECURITY_FORM;
?>

<!-- ======================================================= -->

<br>
<h1 class="text-center">Ajouter un livre</h1>
<br>


<form method="POST" enctype="multipart/form-data" novalidate>

   <div class="row">
      <!-- titre du book -->
      <div class="col-6">

         <div class="form-group ">
            <label class="sr-only " for="title">Titre du livre</label>
            <input type="text" class="form-control <?= isset($errors['title']) ? "is-invalid" : null ?> " name="title" id="title" placeholder="Titre de livre" required value=<?= $book_title ?>>

            <!-- message d'erreur -->
            <?php if (isset($errors['title'])) : ?>
               <div class="invalid-feedback"><?= $errors['title'] ?></div>
            <?php endif ?>

         </div>
      </div>

      <!-- auteur -->
      <div class="col-6">

         <div class="form-group ">
            <label class="sr-only " for="author">Titre du livre</label>
            <input type="text" class="form-control <?= isset($errors['author']) ? "is-invalid" : null ?> " name="author" id="author" placeholder="Auteur" required value=<?= $book_author ?>>

            <!-- message d'erreur -->
            <?php if (isset($errors['author'])) : ?>
               <div class="invalid-feedback"><?= $errors['author'] ?></div>
            <?php endif ?>

         </div>
      </div>
   </div>
   <!-- type de book -->
   <div class="row offset-md-2">

      <div class="col-4">

         <div class="form-group ">
            <label class="sr-only" for="type">Genre du livre</label>
            <select class="form-control <?= isset($errors['type']) ? 'is-invalid' : null ?>" name="type" id="type" required>
               
               <?php foreach ($genre_list as $key => $value) : ?>
                  <option value="<?= $key ?>" <?= $book_type == $key ? "selected" : null ?>><?= $value ?></option>
               <?php endforeach; ?>
            </select>

            <?php if (isset($errors['type'])) : ?>
               <div class="invalid-feedback"> <?= $errors['type'] ?></div>
            <?php endif; ?>
         </div>
      </div>
      <!-- prix du book -->
      <div class="col-4">

         <div class="form-group ">
            <label class="sr-only" for="price">Prix du livre</label>
            <input type="text" class="form-control <?= isset($errors['price']) ? 'is-invalid' : null ?>" name="price" id="price" placeholder="Prix" required value=<?= $book_price ?>></input>

            <?php if (isset($errors['price'])) : ?>
               <div class="invalid-feedback"> <?= $errors['price'] ?></div>
            <?php endif; ?>
         </div>
      </div>


   </div>

   <!-- description du book -->
   <div class="form-group col-10 offset-md-1">
      <label class="sr-only" for="description">Description du livre</label>
      <textarea class="form-control <?= isset($errors['description']) ? 'is-invalid' : null ?>" name="description" id="description" rows="10" placeholder="Description du livre" required></textarea>

      <?php if (isset($errors['description'])) : ?>
         <div class="invalid-feedback"> <?= $errors['description'] ?></div>
      <?php endif; ?>

   </div>


   <!-- upload cover book -->
   <div class="row offset-md-3">

      <div class="form-group col-5">

         <label class="sr-only " for="cover">Choisir une image de couverture</label>
         <input type="file" class="form-control <?= isset($errors['cover']) ? "is-invalid" : null ?> " name="cover" id="cover" value="<?= $cover ?>" required>


         <?php if (isset($errors['cover'])) : ?>
            <div class="invalid-feedback"> <?= $errors['cover'] ?></div>
         <?php endif; ?>

      </div>


      <div class="col-4">
         <button type="submit" class="btn btn-info btn-block">Ajouter à la bibliothèque</button>
      </div>

   </div>



</form>






<!-- ======================================================= -->



<?php include_once FOOTER_PATH ?>