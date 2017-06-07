<!DOCTYPE html>
<html>
	<head>
		<meta charset="charset=utf-8" />
		<title>Matériel</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"></link>
        <link rel="stylesheet" type="text/css" href="../assets/css/materiel.css"></link>
        <script src="../assets/javascript/jquery-3.1.1.min.js"></script>
        <script src="../assets/javascript/app.js"></script>
        <script src="../assets/javascript/bootstrap.min.js"></script> 
	</head>
<body>
<?php
    if(empty($_SESSION['id_admin'])) {
      echo "Vous devez être connecté pour consulter cette page";
      exit();
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
            <li class="active"><a href="<?php echo site_url('materiel/matos') ?>">Matériel</a></li>
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
    echo form_open(''); 
    echo '<fieldset>';
    echo '<legend> Ajout de matériel </legend>';
    $nomMateriel = array(
        'type'=>'text',
        'class' => 'form-control name-saisie',
        'name'=>'nomMateriel',
        'placeholder' => 'Nom du matériel');
    echo '<label class="control-label col-lg-5"> Nom du matériel </label>';
    echo form_input($nomMateriel);
    echo '<br/>';

    $qteStock = array(
        'type'=>'text',
        'class' => 'form-control name-saisie',
        'name'=>'qteStock',
        'placeholder' => 'Quantité en stock');
    echo '<label class="control-label col-lg-5"> Quantité en stock </label>';
    echo form_input($qteStock);
    echo '<br/>';

    $prixAchat = array(
        'type'=>'text',
        'class' => 'form-control name-saisie',
        'name'=>'prixAchat',
        'placeholder' => 'Prix achat');
    echo '<label class="control-label col-lg-5"> Prix achat </label>';
    echo form_input($prixAchat);
    echo '<br/>';

        $prixLocation = array(
        'type'=>'text',
        'class' => 'form-control name-saisie',
        'name'=>'prixLocation',
        'placeholder' => 'Prix location');
    echo '<label class="control-label col-lg-5"> Prix location </label>';
    echo form_input($prixLocation);
    echo '<br/>';

        echo form_submit('envoi', 'Ajouter le matériel'); 
    echo '</div>';
    echo form_close(); 
    echo '</fieldset>';
?>
</body>
</html> 