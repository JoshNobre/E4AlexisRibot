<!DOCTYPE html>
<html>
	<head>
		<meta charset="charset=utf-8" />
		<title>Licence</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"></link>
        <script src="../assets/javascript/jquery-3.1.1.min.js"></script>
        <script src="../assets/javascript/app.js"></script>
	</head>
<body>
<?php 
    if(empty($_SESSION['id_user'])) {
      if(!empty($_SESSION['id_admin'])) {
        echo "Accès refusé";
        exit();
      } else {
          echo "Vous devez être connecté pour consulter cette page";
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
      <li class="active"><a href="formlicence">Licence</a></li>
      <li><a href="#">Tournois</a></li>
      <li><a href="#">Stages</a></li>
      <li><a href="#">Matériel</a></li>
    </ul>
  </div>
</nav>
<?php 
    foreach($this->tournoisAdminList->getTournoi() as $row) {
        $nomTournoi = $row->Nom_Tournoi;
        echo $row->Nom_Tournoi;
        echo '<br/>';
        foreach ($this->tournoisAdherent->getParticipants($nomTournoi) as $row) {
            echo $row->Nom . ' ' . $row->Prenom;
            echo '<br/>';
        }
    }

?>
</body>
</html> 