<!DOCTYPE html>
<html lang="fr">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?=$title_site?></title>

   <!-- CSS only -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

   <!-- Header du site -->
   <header class="main-header">

      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

         <div class="container">

            <a class="navbar-brand" href="index.php"><?=$title_site?></a>

            <!-- burger button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>

            <!-- nav -->
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                     <a class="nav-link active" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="form-book.php">Ajouter un livre</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>

   </header>
   <!-- End header du site -->

   <!-- Balise ouverture content page -->
   <div class="main-content">
      <div class="container">