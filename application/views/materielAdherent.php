<!DOCTYPE html>
<html>
	<head>
		<meta charset="charset=utf-8" />
		<title>Matériel</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"></link>
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css"></link>
        <script src="../assets/javascript/jquery-3.1.1.min.js"></script>
        <script src="../assets/javascript/app.js"></script>
	</head>
<body>
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
    echo '<br/><br/><br/>';
    echo form_open('');
    echo '<div class="form-style-5">'; 
    echo '<label class="control-label col-lg-12"> Matériel </label>';
    echo '<select name="materiel">';
    foreach($this->materielAdherent->getMateriel() as $row) {
      echo '<option value='.$row->Id_Materiel.'#'.$row->Nom_Materiel.'#'.$row->Prix_Materiel.'>'; echo $row->Nom_Materiel . ' : ' . $row->Prix_Materiel.'€'; 
      echo '</option>';
    }
    echo '</select>'; 
    echo '<br/>';

    $achat = array(
        'name'=>'achatLocate',
        'value' => 'acheter');
    echo '<label class="control-label col-lg-6"> Acheter';
    echo ' ';
    echo form_radio($achat);
    echo '</label>';

    $location = array(
        'name'=>'achatLocate',
        'value' => 'louer');
    echo '<label class="control-label col-lg-6"> Louer';
    echo ' ';
    echo form_radio($location);
    echo '</label>';
    echo '<br/><br/>';

    $qte = array(
        'type'=>'text',
        'class' => 'form-control name-saisie',
        'name'=>'qte',
        'placeholder' => 'Quantité désirée');
    echo '<label class="control-label col-lg-12"> Quantité désirée </label>';
    echo form_input($qte);
    echo '<br/>';

        echo form_submit('envoi', 'Valider'); 
    echo '</div>';
    echo form_close(); 
?>
</body>
</html> 