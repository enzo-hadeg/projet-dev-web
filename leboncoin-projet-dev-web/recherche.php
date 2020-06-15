<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <header>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php">LEBONCOIN</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="recherche.php">Recherce<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="annonce.php">Annonce</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="connexion.php">Connexion</a>
      </li>
      </li>
    </ul>
  </div>
</nav>
    </header>
<form action="" method="post">
<label for="">Search</label>
<input type="text" name="annonces"class="form-control" placeholder="Produit rechercher">
<button type="submit" class="btn btn-secondary" name="submit">Valider</button>
</form>
<?php 
$con = new PDO('mysql:host=localhost;port=3306;dbname=leboncoin-devweb', 'root', '', array( PDO::ATTR_PERSISTENT => false));
if(isset($_POST["submit"])){
   $str=$_POST["annonces"];
   $sth=$con->prepare("SELECT * FROM annonces WHERE Titre LIKE '$str'");

   $sth-> setFetchMode(PDO:: FETCH_OBJ);
   $sth-> execute();

   if($row =$sth->fetch())
   {
      ?>
<div class="card mb-3">
  <img src="" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title" ><?php echo $row->Titre; ?></h5>
    <p class="card-text"><?php echo $row->Description; ?></p>
    <p class="card-text"><?php echo $row->Prix; ?></p>
    <p class="card-text"><small class="text-muted"><?php echo $row->Date_annonce; ?></small></p>
  </div>
<?php 
   }
   else{
      echo"Name Does not exist";
   }
   
}
?>