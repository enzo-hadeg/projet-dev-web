<?php include("inc/header.inc.php"); 

if (isset($_POST['enregistrerAnnonce'])) {
    $id = htmlentities($_POST["id"], ENT_QUOTES);
    $titre = htmlentities($_POST["titre"], ENT_QUOTES);
    $prix = htmlentities($_POST["prix"], ENT_QUOTES);
    $description = htmlentities($_POST["description"], ENT_QUOTES);
    $date_annonce = htmlentities($_POST["date_annonce"], ENT_QUOTES);

    $requeteSQL = "UPDATE annonces SET Titre = '$titre', Prix='$prix', Date_annonce='$date_annonce', Description='$description'";
    $requeteSQL .= " WHERE id_annonce = $id";
    $result = $dbh->exec($requeteSQL);
    echo $result . ' modification enregistrée <br>';
} elseif (isset($_POST['supprimerAnnonce'])) {
    $id = htmlentities($_POST["id_annonce"], ENT_QUOTES);

    $requeteSQL = "DELETE FROM annonces WHERE id_annonce = $id";
    $result = $dbh->exec($requeteSQL);
    echo $result . ' suppression effectuée <br>';
} else {
    $id = htmlentities($_POST["id_annonce"], ENT_QUOTES);
    $titre = htmlentities($_POST["Titre"], ENT_QUOTES);
    $prix = htmlentities($_POST["Prix"], ENT_QUOTES);
    $description = htmlentities($_POST["Description"], ENT_QUOTES);
    $date_annonce = htmlentities($_POST["Date_annonce"], ENT_QUOTES);
?>
<div class="starter-template">  
    <form method="POST" action="" enctype='multipart/form-data'>

        <div class="form-group">
            <label for="titre">Titre</label>
            <input type="texte" class="form-control" id="titre" name="titre" value="<?php echo $titre ?>" />
        </div>

        <div class="form-group">
            <label for="prix">prix</label>
            <input type="texte" class="form-control" id="prix" name="prix" value="<?php echo $prix ?>" />
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea rows="10" class="form-control" id="description" name="description"><?php echo $description ?></textarea>
        </div>

        <div class="form-group">
            <label for="date_annonce">date du poste</label>
            <input type="texte" class="form-control" id="date_annonce" name="date_annonce" value="<?php echo $date_annonce ?>" />
        </div>
        <input type="hidden" name="id" value="<?php echo $id ?>" />
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choisir une image </label>
        </div>
        <button type="submit" class="btn btn-primary" name="enregistrerAnnonce">Enregistrer</button>

    </form>
</div>
<?php
}