<?php include("inc/header.inc.php"); ?>
<?php 
if (!empty($_POST)) {
  $titre = htmlentities($_POST["titre"], ENT_QUOTES);
  $prix = htmlentities($_POST["prix"], ENT_QUOTES);
  $description = htmlentities($_POST["description"], ENT_QUOTES);
  $date_annonce = htmlentities($_POST["date_annonce"], ENT_QUOTES);

        $requeteSQL = "DELETE FROM annonces WHERE";
        $requeteSQL .= " Titre = '$titre' AND Prix = '$prix' AND Description = '$description' AND Date = '$date_annonce'";
        $result = $dbh->exec($requeteSQL);
        echo $result . 'annonce supprimer <br>';
}
?>
<section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="annonce">
      <div class="w-100">
        <h2 class="mb-5">Annonce</h2>
<?php
try {
$stmt = $dbh->prepare("SELECT * FROM annonces");

  $stmt->execute();

 $rows = $stmt->fetchAll();
 foreach ($rows as $rs)
{
?>
<div class="card mb-3">
  <img src="" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title" ><?php echo $rs["Titre"] ?></h5>
    <p class="card-text"><?php echo $rs["Prix"] ?></p>
    <p class="card-text"><?php echo $rs["Description"] ?></p>
    <p class="card-text"><small class="text-muted"><?php echo $rs["Date_annonce"] ?></small></p>
  </div>
          <form method="post">
            <input type="hidden" name="Titre" value="<?php echo $rs["Titre"] ?>" />
            <input type="hidden" name="prix" value="<?php echo $rs["Prix"] ?>" />
            <input type="hidden" name="eescription" value="<?php echo $rs["Description"] ?>" />
            <input type="hidden" name="date" value="<?php echo $rs["Date_annonce"] ?>" />
            <input type="submit" value="SUPPRIMER" />
          </form>
</div>
<?php
}
unset($stmt);
} catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
}
?>

    </div>

</section>