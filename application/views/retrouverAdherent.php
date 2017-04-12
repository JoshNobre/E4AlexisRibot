<!DOCTYPE html>
<html>
	<head>
		<meta charset="charset=utf-8" />
		<title>Adhérents</title>
        <script src="../assets/javascript/jquery-3.1.1.min.js"></script>
        <script src="../assets/javascript/app.js"></script>
	</head>
<body>
<?php 

    foreach($this->retrouverAdherent->getGroupe() as $row) {
      echo $row->Categorie_Groupe . ' ' . $row->Num_Groupe;
      echo '<br/>';
          foreach ($this->retrouverAdherent->getAdherent($row->Id_Groupe) as $row) {
        echo $row->Nom . ' ' . $row->Prenom;
        echo '<br/>';
    }
    }

?>
</body>
</html> 