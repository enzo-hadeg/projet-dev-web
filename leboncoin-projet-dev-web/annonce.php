<?php include("inc/header.inc.php"); ?>

<button type="button" class="btn btn-secondary" onClick="document.location.href='new-a.php'">poster une annonce</button>
<?php
try {
$stmt = $dbh->prepare("SELECT * FROM ANNONCES");

  $stmt->execute();
 $rows = $stmt->fetchAll();
 foreach ($rows as $rs)
{
?>
<div class="card mb-3">
  <?php 
  if (!empty($rs['image']))
  {
  ?>
  <img src="annonce/images/<?php echo $rs["image"] ?>" class="card-img-top" alt="...">
  <?php
  }
  ?>
  <div class="card-body">
    <h5 class="card-title" ><?php echo $rs["Titre"] ?></h5>
    <p class="card-text"><?php echo $rs["Prix"] ?>€</p>
    <p class="card-text"><?php echo $rs["Description"] ?></p>
    <p class="card-text"><small class="text-muted"><?php echo $rs["Date_annonce"] ?></small></p>
  </div>
  <?php 
if (isset($_POST) && ! empty($_POST)) {
    $id = htmlentities($_POST["id"], ENT_QUOTES);
    $titre = htmlentities($_POST["titre"], ENT_QUOTES);
    $prix = htmlentities($_POST["prix"], ENT_QUOTES);
    $description = htmlentities($_POST["description"], ENT_QUOTES);
    $date_annonce = htmlentities($_POST["date_annonce"], ENT_QUOTES);
    $image = htmlentities($_POST["image"], ENT_QUOTES);    

        $requeteSQL = "DELETE FROM annonces WHERE";
        $requeteSQL .= " Titre = '$titre' AND Prix = '$prix' AND Description = '$description' AND Date = '$date_annonce'";
        $result = $dbh->exec($requeteSQL);
        echo $result . 'annonce supprimer <br>';
        
        while ($row = mysqli_fetch_array($result)) {
          echo "<div id='img_div'>";
            echo "<img src='images/".$row['image']."' >";
          echo "</div>";
        }
      
}
?>
          <form method="post" action="update.php">
            <input type="hidden" name="id_annonce" value="<?php echo $rs["id_annonce"] ?>" />
            <input type="hidden" name="Titre" value="<?php echo $rs["Titre"] ?>" />
            <input type="hidden" name="Prix" value="<?php echo $rs["Prix"] ?>" />
            <input type="hidden" name="Description" value="<?php echo $rs["Description"] ?>" />
            <input type="hidden" name="Date_annonce" value="<?php echo $rs["Date_annonce"] ?>" />
            <div class="btn-group" role="group" aria-label="Basic example">
              <button type="submit" class="btn btn-secondary" name="modifierAnnonce">modifier une annonce</button>
              <button type="submit" class="btn btn-secondary" name="supprimerAnnonce">supprimer</button>
            </div>
          </form>
        </div>
</div>
</div>
<?php
}
unset($stmt);
} catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
}
 include("inc/footer.inc.php"); ?>