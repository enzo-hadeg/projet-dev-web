<?php include("inc/header.inc.php"); ?>

<section class="newsletter">
<form>
  <div class="row">
    <div class="col">
      <input type="text" class="form-control" placeholder="Produit rechercher">
    </div>
  </div>
</form>
<button type="button" class="btn btn-dark">rechercher</button>
</section>    
<section class="last-product">   
    <h2 class="h2 " align ="center" > Dernier produit poster </h2>
        <div class="grid-item">
        <img src="img/produit.jpg" alt="product" class="rounded" >
            <p>produit</p>
            <p>79,95€</p>
        </div>
        <div class="grid-item">
        <img src="img/produit.jpg" alt="product" class="rounded" >
            <p>produit</p>
            <p>79,95€</p>
        </div>
        <div class="grid-item">
        <img src="img/produit.jpg" alt="product" class="rounded" >
            <p>produit</p>
            <p>79,95€</p>
        </div>
        
        <div>
            <button class="home-button" onClick="document.location.href='annonce.php'">TOUTES LES ANNONCES</button>
        </div>
</section>         
    <img src="img/présentation.png" alt="home-hero" class="home-hero">  

    <?php include("inc/footer.inc.php"); ?>