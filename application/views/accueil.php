<!DOCTYPE html>
<html>
	<head>
		<meta charset="charset=utf-8" />
		<title>Index</title>
	    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"></link>
        <script src="../assets/javascript/jquery-3.1.1.min.js"></script>
        <script src="../assets/javascript/app.js"></script>
        <script src="../assets/javascript/bootstrap.min.js"></script> 
	</head>
<body>
<?php
    if(empty($_SESSION['id_user']) && !empty($_SESSION['id_admin'])) { ?>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Plume cévenole</a>
          </div>
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo site_url('accueil/pagePrincipale') ?>">Accueil</a></li>
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
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Cotisations
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
      } else if(!empty($_SESSION['id_user']) && empty($_SESSION['id_admin'])) { ?>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="#">Plume cévenole</a>
            </div>
            <ul class="nav navbar-nav">
              <li class="active"><a href="<?php echo site_url('pagePrincipale') ?>">Accueil</a></li>
              <li><a href="<?php echo site_url('licence/formlicence') ?>">Licence</a></li>
              <li><a href="<?php echo site_url('tournoisAdherent/tournoisListe') ?>">Tournois</a></li>
              <li><a href="#">Stages</a></li>
              <li><a href="<?php echo site_url('materielAdherent/materiel') ?>">Matériel</a></li>
            </ul>
          </div>
      </nav>
<?php
      } else {
        echo "Veuillez vous connecter pour consulter cette page";
        exit(1);
      }
    
?>
</body>
</html> 