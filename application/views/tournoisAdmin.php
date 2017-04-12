<!DOCTYPE html>
<html>
	<head>
		<meta charset="charset=utf-8" />
		<title>Administration des tournois</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"></link>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/form-elements.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <script src="../assets/javascript/jquery-3.1.1.min.js"></script>
        <script src="../assets/javascript/app.js"></script>
        <script src="../assets/javascript/bootstrap.min.js"></script> 
	</head>
<body>
<?php 
    if(empty($_SESSION['id_admin'])) {
        if(!empty($_SESSION['id_user'])) {
          echo "Accès refusé, vous allez être redirigé dans 5 secondes";
          header('refresh:5;url=../connexion/accueil');
          exit(1);
        } else {
          echo "Veuillez vous connecter pour consulter cette page";
          exit(1);
        }
    } else {
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
        <li class="dropdown active">
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
    echo form_open(''); 
    echo '<div class="col-lg-3">';
    $nomTournoi = array(
        'name' => 'nomTournoi',
        'class' => 'form-control name-saisie',
        'placeholder' => 'Nom du tournoi');
        echo '<label class="control-label col-lg-8"> Nom du tournoi </label>';
        echo form_input($nomTournoi);
        echo '<br/>';

    $dateTournoi = array(
        'type' => 'date',
        'name' => 'dateTournoi',
        'class' => 'form-control name-saisie',
        'placeholder' => 'Date du tournoi');
        echo '<label class="control-label col-lg-8"> Date du tournoi </label>';
        echo form_input($dateTournoi);
        echo '<br/>';

    $adresseGymnase = array(
        'name' => 'adresseGymnase',
        'class' => 'form-control name-saisie',
        'placeholder' => 'Adresse du gymnase');
        echo '<label class="control-label col-lg-8"> Adresse du gymnase </label>';
        echo form_input($adresseGymnase);
        echo '<br/>';

    $cp = array(
        'name' => 'cp',
        'class' => 'form-control name-saisie',
        'placeholder' => 'Code postal');
        echo '<label class="control-label col-lg-8"> Code postal </label>';
        echo form_input($cp);
        echo '<br/>';

    $ville = array(
        'name' => 'ville',
        'class' => 'form-control name-saisie',
        'placeholder' => 'Ville');
        echo '<label class="control-label col-lg-8"> Ville </label>';
        echo form_input($ville);
        echo '<br/>';

    $pays = array(
        'name' => 'pays',
        'class' => 'form-control name-saisie',
        'placeholder' => 'Pays');
        echo '<label class="control-label col-lg-8"> Pays </label>';
        echo form_input($pays);
        echo '<br/>';

   echo form_submit('envoi', 'Créer le tournoi'); 
   echo '</div>';
   echo form_close(); 
 }
?>
</body>
</html> 