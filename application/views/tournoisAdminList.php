<!DOCTYPE html>
<html>
	<head>
		<meta charset="charset=utf-8" />
		<title>Liste des participants aux tournois</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"></link>
        <script src="../assets/javascript/jquery-3.1.1.min.js"></script>
        <script src="../assets/javascript/app.js"></script>
        <script src="../assets/javascript/bootstrap.min.js"></script> 
	</head>
<body>
<?php 
    if(empty($_SESSION['id_user']) && empty($_SESSION['id_admin'])) {
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
        echo '<select name="tournoi">';
        foreach($this->tournoisAdminList->getTournoi() as $row) {
          echo '<option value='.$row->Id_Tournoi.'>'; echo $row->Nom_Tournoi; echo '</option>';
        }
        echo '</select>'; 

        echo '<select name="adherent">';
        foreach($this->tournoisAdminList->getAdherent() as $row) {
          echo '<option value='.$row->Num_Licence.'>'; echo $row->Nom . ' ' . $row->Prenom; echo '</option>';
        }

        echo '</select>'; 

    $dateTournoi = array(
        'type'=>'text',
        'class' => 'form-control name-saisie',
        'name'=>'dateTournoi',
        'placeholder' => 'Date du tournoi');
        echo '<label class="control-label col-lg-5"> Date du tournoi </label>';
        echo form_input($dateTournoi);
        echo '<br/>';

        echo '<select name="lieu">';
        foreach($this->tournoisAdminList->getLieu() as $row) {
          echo '<option value='.$row->Id_Lieu.'>'; echo $row->Ville_Lieu; echo '</option>';
        }

        echo '</select>'; 

        echo form_submit('envoi', 'Inscrire l adherent'); 
    echo '</div>';
    echo form_close(); 
?>
</body>
</html> 