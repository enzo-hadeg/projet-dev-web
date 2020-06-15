<?php include("inc/header.inc.php");?> 
<?php
if (!empty($_POST)) {
    $titre= htmlentities($_POST["titre"], ENT_QUOTES);
    $prix = htmlentities($_POST["prix"], ENT_QUOTES);
    $description = htmlentities($_POST["description"], ENT_QUOTES);
    $date = htmlentities($_POST["date_annonce"], ENT_QUOTES);

        $requeteSQL = "INSERT INTO annonces (`Titre`, `Prix`, `Description`, `Date_annonce`)";
        $requeteSQL .= " VALUE ('$titre', '$prix', '$description', '$date')";

        $result = $dbh->exec($requeteSQL);
        echo $result . ' nouvelle annonce <br>';


  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// image file directory
  	$target = "img/".basename($image);

  	$sql = "INSERT INTO  (image, ) VALUES ('$image')";
  	// execute query
  	mysqli_query($dbh, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");
}
?>
<div class="starter-template">  
    <form method="POST" action="" enctype='multipart/form-data'>

        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="texte" class="form-control" id="titre" name="titre">
        </div>

        <div class="form-group">
            <label for="prix">prix</label>
            <input type="texte" class="form-control" id="prix" name="prix">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea rows="10" class="form-control" id="description" name="description"></textarea>
        </div>

        <div class="form-group">
            <label for="date_annonce">date du poste</label>
            <input type="date" class="form-control" id="date_annonce" name="date_annonce">
        </div>
  	<div>
  	  <input type="file" name="image">
  	</div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>

    </form>
</div>
<?php include("inc/footer.inc.php"); ?> 