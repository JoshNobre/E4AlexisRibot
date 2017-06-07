<!DOCTYPE html>
<html>
	<head>
		<meta charset="charset=utf-8" />
		<title>Matériel</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"></link>
        <link rel="stylesheet" type="text/css" href="../assets/css/materielAdherent.css"></link>
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
      <li><a href="../licence/formlicence">Licence</a></li>
      <li><a href="../tournoisAdherent/tournoisListe">Tournois</a></li>
      <li><a href="#">Stages</a></li>
      <li class="active"><a href="#">Matériel</a></li>
      <li><a href="../deconnexion/deco">Déconnexion</a></li>
    </ul>
  </div>
</nav>
<?php 
    echo '<br/><br/><br/>';
    echo form_open('');
    echo '<fieldset>';
    echo '<legend> Achat ou location de matériel </legend>';
    echo '<label> Matériel </label>';

    echo '<select id="achat" name="materiel">';
    foreach($this->materielAdherent->getMateriel() as $row) {
        echo '<option value='.$row->Id_Materiel.'#'.$row->Nom_Materiel.'#'.$row->Prix_Achat.'>'; echo $row->Nom_Materiel . ' : ' . $row->Prix_Achat.'€'; 
        echo '</option>';
    }
    echo '</select>'; 

    echo '<select id="location" name="materiel" style="display:none">';
    foreach($this->materielAdherent->getMateriel() as $row) {
        echo '<option value='.$row->Id_Materiel.'#'.$row->Nom_Materiel.'#'.$row->Prix_Location.'>'; echo $row->Nom_Materiel . ' : ' . $row->Prix_Location.'€'; 
        echo '</option>';
    }
    echo '</select>'; 

        $temps = array(
        'name'=>'temps');
    echo '<label> Temps de location </label>';
    echo form_input($temps);
    echo '</div>';
    echo '<br/>';

    $achat = array(
        'name'=>'achatLocate',
        'id' => 'achatCheck',
        'onclick' => 'changeDisplayOfMateriel()',
        'value' => 'acheter');
    echo '<label> Acheter';
    echo ' ';
    echo form_radio($achat);
    echo '</label>';

    $location = array(
        'name'=>'achatLocate',
        'id' => 'locationCheck',
        'onclick' => 'changeDisplayOfMateriel()',
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
    echo '</fieldset>';
    echo form_close(); 
?>
</body>
</html> 