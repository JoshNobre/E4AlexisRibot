<!DOCTYPE html>
<html>
	<head>
		<meta charset="charset=utf-8" />
		<title>Adhérents</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"></link>
        <link rel="stylesheet" type="text/css" href="../assets/css/tableauAdherent.css"></link>
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
            <li class="dropdown active">
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
    echo '<table border=1>';
    echo '<tr>';
    echo '<td>'; echo 'Nom'; echo '</td>';
    echo '<td>'; echo 'Prenom'; echo '</td>';
    echo '<td>'; echo 'Sexe'; echo '</td>';
    echo '<td>'; echo 'Date de naissance'; echo '</td>';
    echo '<td>'; echo 'Nationalité'; echo '</td>';
    echo '<td>'; echo 'Adresse'; echo '</td>';
    echo '<td>'; echo 'Ville'; echo '</td>';
    echo '<td>'; echo 'Code postal'; echo '</td>';
    echo '<td>'; echo 'Adresse e-mail'; echo '</td>';
    echo '<td>'; echo 'N° fixe'; echo '</td>';
    echo '<td>'; echo 'N° portable'; echo '</td>';
    echo '<td>'; echo 'Justificatif'; echo '</td>';
    echo '<td>'; echo 'Autorisation de diffusion'; echo '</td>';
    echo '<td>'; echo 'Date d enregistrement'; echo '</td>';
    echo '<td>'; echo 'Date de refus d assurance'; echo '</td>';
    echo '<td>'; echo 'Certificat médical'; echo '</td>';
    echo '<tr/>';
    foreach($this->tableauAdherent->getInfosAdherent() as $row) {
        echo '<tr>';
        echo '<td>'; echo $row->Nom; '</td>';
        echo '<td>'; echo $row->Prenom; '</td>';
        echo '<td>'; echo $row->Sexe; '</td>';
        echo '<td>'; echo $row->DateNaissance; '</td>';
        echo '<td>'; echo $row->Nationalite; '</td>';
        echo '<td>'; echo $row->Adresse; '</td>';
        echo '<td>'; echo $row->Ville; '</td>';
        echo '<td>'; echo $row->CP; '</td>';
        echo '<td>'; echo $row->Mail; '</td>';
        echo '<td>'; echo $row->Fixe; '</td>';
        echo '<td>'; echo $row->Portable; '</td>';
        echo '<td>'; echo $row->Justificatif; '</td>';
        echo '<td>'; echo $row->AutorisationDiffusion; '</td>';
        echo '<td>'; echo $row->DateEnregistrementLigue; '</td>';
        echo '<td>'; echo $row->DateRefus; '</td>';
        echo '<td>'; echo $row->certif; '</td>';
        echo '</tr>';
    }
    echo '</table>';
?>
</body>
</html> 