<!DOCTYPE html>
<html>
  <head>
    <meta charset="charset=utf-8" />
    <title>Bilan des cotisations</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"></link>
    <link rel="stylesheet" type="text/css" href="../assets/css/bilanCotisation.css"></link>
    <script src="../assets/javascript/jquery-3.1.1.min.js"></script>
    <script src="../assets/javascript/app.js"></script>
    <script src="../assets/javascript/bootstrap.min.js"></script> 
  </head>
<body>
<?php
    if(empty($_SESSION['id_user'])) {
      if(empty($_SESSION['id_admin']) || $_SESSION['droit_admin'] != "Trésorier") {
        echo "Accès refusé";
        exit();
      }
    }
?>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Plume cévenole</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="<?php echo site_url('accueil/pagePrincipale') ?>">Accueil</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Licences
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('receptionLicence/test') ?>">Réception des licences</a></li>
                <li><a href="<?php echo site_url('tableauAdherent/adherent') ?>">Liste des adhérents</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tournois
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('tournoisAdmin/tournois') ?>">Ajout d'un tournoi</a></li>
                <li><a href="<?php echo site_url('tournoisAdminList/tournoisList') ?>">Liste des participants</a></li>
              </ul>
            </li>
            <li><a href="#">Stages</a></li>
            <li><a href="<?php echo site_url('materiel/matos') ?>">Matériel</a></li>
            <li class="dropdown active">
              <a class="dropdown-togle" data-toggle="dropdown" href="#">Cotisations
              <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('bilanCotisation/bilan') ?>">Bilan des cotisations</a></li>
                <li><a href="<?php echo site_url('cotisation/gestionCotisation') ?>">Gestion des cotisations</a></li>
                <li><a href="<?php echo site_url('tableauCotisation/cotisation') ?>">Récapitulatif des cotisations</a></li>
              </ul>
            </li>
          </ul>
        </div>
    </nav>
<?php
    foreach($this->bilanCotisation->getCotReelle() as $row) {
      echo "Montant réel des cotisations : " . $row->Montant_Cotisation;
      echo '<br/>';
    }
    foreach($this->bilanCotisation->getCot() as $row) {
      echo "Montant total des cotisations : " . $row->Montant_Cotisation;
      echo '<br/>';
    }
?>
</body>
</html> 