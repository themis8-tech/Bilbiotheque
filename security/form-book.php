<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

   $errors = [];

   //Recuperation des données du formulaire

   $book_title = $_POST['title'] ?? null;
   $book_author = $_POST['author'] ?? null;
   $book_type = $_POST['type'] ?? null;
   $book_price = $_POST['price'] ?? null;
   $book_description =  $_POST['description'] ?? null;
   $book_image = $_POST['cover'] ?? null;

   //upload images
   $dossier = "upload/";
   $fichier = basename($_FILES['cover']['name']);
   $taille_maxi = 1000000;
   $taille = filesize($_FILES['cover']['tmp_name']);
   $extensions = array('.png', '.jpg', '.jpeg');
   $extension = strrchr($_FILES['cover']['name'], '.');

   // url de l'image
   $url_image = $dossier . $fichier;


   // verification des champs texte du  formulaire

   if (empty($book_title)) {
      $errors['title'] = "ce champ ne doit pas être vide";
   }


   if (empty($book_author)) {
      $errors['author'] = "ce champ ne doit pas être vide";
   } else if (!preg_match("/^[a-z ,.'-]+$/i", $book_author)) {

      $errors['author'] = "le nom est invalide";
   }


   if (empty ($book_type)) {
      $errors['type'] = "Choisissez un genre";
   }

   if (empty($book_price)) {
      $errors['price'] = "indiquez le prix";
   } else if (!preg_match("/^[0-9]{1,3}.?[0-9]{0,2}$/", $book_price)) {

      $errors['price'] = "le prix est invalide";
   }

   if (empty($book_description)) {
      $errors['description'] = "ce champ ne doit pas être vide";
   }



   //verification  du champ upload image

   if (!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
   {
      $errors['cover'] = 'Vous devez uploader un fichier de type png, jpg, jpeg';
   }
   if ($taille > $taille_maxi) {
      $errors['cover'] = 'Le fichier est trop gros...';
   }
   if (empty($errors)) //S'il n'y a pas d'erreur, on upload
   {
      //On formate le nom du fichier:On remplace les lettres accentutées par les non accentuées dans $fichier.
      //Et on récupère le résultat dans fichier
      $fichier = strtr(
         $fichier,
         'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
         'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy'
      );
      //expression régulière qui remplace tout ce qui n'est pas une lettre non accentuées ou un chiffre
      //dans $fichier par un tiret "-" et qui place le résultat dans $fichier.
      $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

      //Si la fonction renvoie TRUE, c'est que ça fonctionne
      if (move_uploaded_file($_FILES['cover']['tmp_name'], $url_image)) {
         echo 'Upload effectué avec succès !';
      } else //Sinon (la fonction renvoie FALSE).
      {
         echo 'Echec de l\'upload !';
      }
      

      // save in database
      $sql = "INSERT INTO book (`title`,`author`,`description`,`price`, `cover`,`type`) 
               VALUES (:title, :author, :description, :price, :cover, :type )";

      $query = $pdo->prepare($sql);

      $query->bindParam(':title', $book_title, PDO::PARAM_STR);
      $query->bindParam(':author', $book_author, PDO::PARAM_STR);
      $query->bindParam(':description', $book_description, PDO::PARAM_STR);
      $query->bindParam(':price', $book_price, PDO::PARAM_STR);
      $query->bindParam(':cover', $url_image, PDO::PARAM_STR);
      $query->bindParam(':type', $book_type, PDO::PARAM_STR);

      $query->execute();


   } else {
      echo $errors['cover'];
   }

}
