<?php include("inc/header.inc.php"); ?>
<?php

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $dbh->prepare('SELECT * FROM user WHERE id_user = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
?>
   <body>
      <div align="center">
         <h2>Profil de <?php echo $userinfo['username']; ?></h2>
         <br /><br />
         Pseudo = <?php echo $userinfo['username']; ?>
         <br />
         Mail = <?php echo $userinfo['mail']; ?>
         <br />
         <?php
         if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
         ?>
         <br />
         <input type="submit" href="profile-edition.php">Modifier</a>
         <?php
         }
         ?>
      </div>
<?php
}
?>