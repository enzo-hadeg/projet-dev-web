<?php include("inc/header.inc.php");?> 
<?php
if (!empty($_POST)) {
    $titre= htmlentities($_POST["titre"], ENT_QUOTES);
    $prix = htmlentities($_POST["prix"], ENT_QUOTES);
    $description = htmlentities($_POST["description"], ENT_QUOTES);
    $date = htmlentities($_POST["date_annonce"], ENT_QUOTES);

    $result = $dbh->exec($requeteSQL);
    echo $result . ' nouvelle annonce <br>';

 if(isset($_FILES['image']) AND !empty($_FILES['image']['name'])) {
    $tailleMax = 2097152;
    $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
    if($_FILES['image']['size'] <= $tailleMax) {
        $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
        if(in_array($extensionUpload, $extensionsValides)) {
            $chemin = "annonce/images/".$_FILES['image']['name'];
            
            if(move_uploaded_file($_FILES['image']['tmp_name'], $chemin)) {
                $requeteSQL = "INSERT INTO annonces (`Titre`, `Prix`, `Description`, `Date_annonce`, `image`)";
                $requeteSQL .= " VALUE (:titre, :prix, :description, :date, :image)";
                $updateavatar = $dbh->prepare($requeteSQL);
                $updateavatar->execute(array(
                    'image'         => $_FILES['image']['name'],
                    'titre'         => htmlentities($_POST["titre"], ENT_QUOTES),
                    'prix'          => htmlentities($_POST["prix"], ENT_QUOTES),
                    'description'   => htmlentities($_POST["description"], ENT_QUOTES),
                    'date'          => htmlentities($_POST["date_annonce"], ENT_QUOTES)
                    ));
                header('Location: annonce.php');
            } else {
                $msg = "Erreur durant l'importation de votre photo de profil";
            }
        } else {
            $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
        }
    } else {
        $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
    }
}

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