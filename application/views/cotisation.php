<!DOCTYPE html>
<html>
	<head>
		<meta charset="charset=utf-8" />
		<title>Cotisations</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"></link>
        <link rel="stylesheet" type="text/css" href="../assets/css/styleCotisations.css"></link>
        <script src="../assets/javascript/jquery-3.1.1.min.js"></script>
        <script src="../assets/javascript/app.js"></script>
        <script src="../assets/javascript/bootstrap.min.js"></script> 
	</head>
<body>
<?php
    if(empty($_SESSION['id_admin'])) {
        echo "Accès refusé";
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
    echo '<br/><br/><br/>';
    echo form_open(''); 
    echo '<fieldset>';
    echo '<legend> Validation des cotisations </legend>';
    echo '<div class="form-style-5">';
    echo '<label class="control-label col-lg-12"> Adhérent </label>';
    echo '<select name="adherent">';
    foreach($this->cotisation->getNumLicence() as $row) {
        if($this->cotisation->getCotisationPayee($row->Num_Licence)[0]->Date_Paiement == NULL) {
            echo '<option value='.$row->Num_Licence.'>'; echo $row->Nom; echo '</option>';
        }
    }
    echo '</select>'; 

    $nomPayeur = array(
    'name'=>'nomPayeur',
    'placeholder'=>'Nom du payeur',
    'value'=> set_value('nomPayeur'));
    echo '<label class="control-label col-lg-12"> Nom du payeur </label>';
    echo form_input($nomPayeur);

    echo '<label class="control-label col-lg-12"> Type de paiement </label>';

    echo '<select name="typePaiement">';
    echo '<option value="Carte bleue">'; echo "Carte bleue"; echo '</option>';
    echo '<option value="Chèque">'; echo "Chèque"; echo '</option>';
    echo '<option value="Espèces">'; echo "Espèces"; echo '</option>';
    echo '</select>';

    $datePaiement = array(
    'type' => 'date',
    'name'=>'datePaiement',
    'value'=> set_value('datePaiement'));
    echo '<label class="control-label col-lg-12"> Date du paiement </label>';
    echo form_input($datePaiement);

    echo form_submit('envoi', 'Valider'); 
    echo form_close();   
    echo '</div>';  
    echo '</fieldset>';
?>
</body>
</html> 