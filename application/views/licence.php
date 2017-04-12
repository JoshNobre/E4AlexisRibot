<!DOCTYPE html>
<html>
	<head>
		<meta charset="charset=utf-8" />
		<title>Licence</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"></link>
        <link rel="stylesheet" type="text/css" href="../assets/css/style2.css"></link>
        <script src="../assets/javascript/jquery-3.1.1.min.js"></script>
        <script src="../assets/javascript/app.js"></script>
	</head>
<body>
<?php 
    if(empty($_SESSION['id_user']) && !empty($_SESSION['id_admin'])) {
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
      <li class="active"><a href="<?php echo site_url('licence/fromlicence') ?>">Licence</a></li>
      <li><a href="<?php echo site_url('tournoisAdherent/tournoisListe') ?>">Tournois</a></li>
      <li><a href="#">Stages</a></li>
      <li><a href="<?php echo site_url('materielAdherent/materiel') ?>">Matériel</a></li>
      <li><a href="<?php echo site_url('deconnexion/deco') ?>">Déconnexion</a></li>
    </ul>
  </div>
</nav>
<?php 
    $this->load->model('connexion_model', 'connexion');
    echo '<br/><br/><br/>';
    echo form_open('');
    echo '<div class="form-style-5">'; 
    $premiereInscription = array(
        'name' => 'premiereInscription',
        'value' => '0',
        'onclick' => 'changeValueOfCheckboxes(this)');
        echo '<label class="control-label col-lg-3"> Première inscription';
        echo ' ';
        echo form_checkbox($premiereInscription);
        echo '</label>';
    
    $photo = array(
        'name' => 'photo',
        'class' => 'col-lg-3');
        echo '<label class="control-label col-lg-1"> Photo </label>';
        echo form_upload($photo);

    $surname = array(
    	'type'=>'text',
      'class' => 'form-control name-saisie',
    	'name'=>'surname',
    	'placeholder'=>'Nom');
    echo '<label class="control-label col-lg-1"> Nom </label>';
    echo '<div class="col-lg-4">';
    echo form_input($surname);
    echo '</div>';

    $name = array(
    	'type'=>'text',
      'class' => 'form-control name-saisie',
    	'name'=>'name',
    	'placeholder'=>'Prénom');
    echo '<label class="control-label col-lg-2"> Prénom </label>';
    echo '<div class="col-lg-3">';
    echo form_input($name);
    echo '</div>';
      
   $sexeOpts = array(
       'masculin' => 'M',
       'feminin' => 'F',);
    echo '<label class="control-label col-lg-1"> Sexe </label>';
    echo '<div class="col-lg-1">';
    echo form_dropdown('sexe', $sexeOpts);
    echo '</div>';
  
    $dateNaiss = array(
        'type'=>'date',
        'class' => 'form-control name-saisie',
        'name'=>'dateNaiss',
        'placeholder' => 'Date de naissance');
    echo '<label class="control-label col-lg-2"> Date de naissance </label>';
    echo '<div class="col-lg-3">';
    echo form_input($dateNaiss);
    echo '</div>';
    
    $adresse = array(
        'name'=>'adresse',
        'class' => 'form-control name-saisie',
        'placeholder' => 'Adresse');
    echo '<label class="control-label col-lg-2"> Adresse </label>';
    echo '<div class="col-lg-3">';
    echo form_input($adresse);
    echo '</div>';

    $nationalite = array(
        'type'=>'text',
        'class' => 'form-control name-saisie',
        'name'=>'nationalite',
        'placeholder' => 'Nationalité');
    echo '<label class="control-label col-lg-2"> Nationalité </label>';
    echo '<div class="col-lg-3">';
    echo form_input($nationalite);
    echo '</div>';
    
    $ville = array(
        'type'=>'text',
        'class' => 'form-control name-saisie',
        'name'=>'ville',
        'placeholder' => 'Ville');
    echo '<label class="control-label col-lg-1"> Ville </label>';
    echo '<div class="col-lg-2">';
    echo form_input($ville);
    echo '</div>';
    
    $cp = array(
        'type'=>'text',
        'class' => 'form-control name-saisie',
        'name'=>'cp',
        'placeholder' => 'Code postal');
    echo '<label class="control-label col-lg-2"> Code postal </label>';
    echo '<div class="col-lg-2">';
    echo form_input($cp);
    echo '</div>';
    
    $email = array(
        'type'=>'email',
        'class' => 'form-control name-saisie',
        'name'=>'email',
        'placeholder' => 'Email');
    echo '<label class="control-label col-lg-2"> Email </label>';
    echo '<div class="col-lg-2">';
    echo form_input($email);
    echo '</div>';
    
    $fixe = array(
        'type'=>'text',
        'class' => 'form-control name-saisie',
        'name'=>'fixe',
        'placeholder' => 'Tél fixe');
    echo '<label class="control-label col-lg-2"> Téléphone fixe </label>';
    echo '<div class="col-lg-2">';
    echo form_input($fixe);
    echo '</div>';
    
    $portable = array(
        'type'=>'text',
        'class' => 'form-control name-saisie',
        'name'=>'portable',
        'placeholder' => 'Tél portable');
    echo '<label class="control-label col-lg-2"> Téléphone portable </label>';
    echo '<div class="col-lg-2">';
    echo form_input($portable);
    echo '</div>';

    $justificatif = array(
        'name'=>'justificatif',
        'value' => '0',
        'onclick' => 'changeValueOfCheckboxes(this)');
    echo '<label class="control-label col-lg-8"> Obtenir un justificatif du comité d entreprise </label>';
    echo '<div class="col-lg-1">';
    echo form_checkbox($justificatif);
    echo '</div>';
    
    $autorisation = array(
        'name'=>'autorisation',
        'value' => '0', 
        'onclick' => 'changeValueOfCheckboxes(this)');
        echo '<label class="control-label col-lg-8"> J autorise le club à me prendre en photo et/ou me prendre en vidéo et à les diffuser sur le site du club, ainsi que de les utiliser pour tout autre publicité </label>';
            echo '<div class="col-lg-1">';
    echo form_checkbox($autorisation);
        echo '</div>';   

    $dateRefus = array(
        'type' => 'date',
        'name'=>'dateRefus',
        'class' => 'form-control name-saisie');
    echo '<label class="control-label col-lg-5"> Date refus d assurance </label>';
    echo '<div class="col-lg-3">';
    echo form_input($dateRefus);
    echo '</div>';
    
    $lieu = array(
        'name'=>'lieu',
        'class' => 'form-control name-saisie');
    echo '<label class="control-label col-lg-5"> Fait à : </label>';
    echo '<div class="col-lg-3">';
    echo form_input($lieu);
    echo '</div>';

    $certif = array(
        'name'=>'certif',
        'class' => 'form-control name-saisie');
    echo '<label class="control-label col-lg-5"> Certificat médical </label>';
        echo '<div class="col-lg-3">';
    echo form_upload($certif);
    echo '<br/><br/>';
        echo '</div>'; 
   if($this->connexion_model->getTypeOfUser($this->session->userdata('login_user'))[0]->Type_Utilisateur == 'adulte') {
       $profession = array('name' => 'profession', 
        'class' => 'form-control name-saisie',
        'placeholder' => 'Profession', 
        'onclick' => 'changeValueOfCheckboxes(this)');
       echo '<label class="control-label col-lg-2"> Profession </label>';
           echo '<div class="col-lg-3">';
       echo form_input($profession);
       echo '<br/>';
           echo '</div>';
       $optionFit = array('name' => 'optionFit', 'value' => 0, 'onclick' => 'changeValueOfCheckboxes(this)');
       echo '<label class="control-label col-lg-10"> Option Fit Minton </label>';
           echo '<div class="col-lg-3">';
       echo form_checkbox($optionFit);
       echo '<br/>';
           echo '</div>';
       $optionMuscu = array('name' => 'optionMuscu', 'value' => 0, 'onclick' => 'changeValueOfCheckboxes(this)');
       echo '<label class="control-label col-lg-10"> Option musculation </label>';
           echo '<div class="col-lg-3">';
       echo form_checkbox($optionMuscu);
       echo '<br/>';
           echo '</div>';
   } else {
       $nomUrgence = array('name' => 'nomUrgence',
        'class' => 'form-control name-saisie', 
        'placeholder' => 'Nom d urgence');
       echo '<label class="control-label col-lg-10"> Personne à prévenir en cas d urgence </label>';
       echo form_input($nomUrgence);
       echo '<br/>';

       $telUrgence = array('name' => 'telUrgence',
        'class' => 'form-control name-saisie',
        'placeholder' => 'Telephone Urgence');
       echo '<label class="control-label col-lg-2"> Téléphone </label>';
       echo form_input($telUrgence);
       echo '<br/>';

       $autorisationMesuresNecessaires = array('name' => 'autorisationMesuresNecessaires', 
        'value' => 0, 
        'onclick' => 'changeValueOfCheckboxes(this)');
       echo '<label class="control-label col-lg-10"> J autorise l entraineur et les membres du conseil d administration du badminton club à prendre toutes les mesures nécessaires pour mon enfant </label>';
       echo form_checkbox($autorisationMesuresNecessaires);
       echo '<br/>';

       $telMere = array('name' => 'telMere', 
        'class' => 'form-control name-saisie',
        'placeholder' => 'Téléphone mère');
       echo '<label class="control-label col-lg-10"> Téléphone de la mère </label>';
       echo form_input($telMere);
       echo '<br/>';

       $telPere = array('name' => 'telPere', 
        'class' => 'form-control name-saisie',
        'placeholder' => 'Téléphone père');
       echo '<label class="control-label col-lg-10"> Téléphone du père </label>';
       echo form_input($telPere);
       echo '<br/>';

       $professionPere = array('name' => 'professionPere', 
        'class' => 'form-control name-saisie',
        'placeholder' => 'Profession père');
       echo '<label class="control-label col-lg-10"> Profession du père </label>';
       echo form_input($professionPere);
       echo '<br/>';

       $professionMere = array('name' => 'professionMere',
        'class' => 'form-control name-saisie',
        'placeholder' => 'Profession mère');
       echo '<label class="control-label col-lg-10"> Profession de la mère </label>';
       echo form_input($professionMere);
       echo '<br/>';

       $nomParent = array('name' => 'nomParent', 
        'class' => 'form-control name-saisie',
        'placeholder' => 'Nom parent');
       echo '<label class="control-label col-lg-10"> Nom du responsable légal </label>';
       echo form_input($nomParent);
       echo '<br/>';

       $autorisationSortieGymnase = array('name' => 'autorisationSortieGymnase', 
        'value' => 0, 
        'onclick' => 'changeValueOfCheckboxes(this)');
       echo '<label class="control-label col-lg-12"> Il/Elle n est pas autorisé(e) à quitter le gymnase seul(e), je m engage à le/la récupérer à l intérieur du gymnase à l horaire de fin de l entrainement </label>';
       echo form_checkbox($autorisationSortieGymnase);
       echo '<br/>';

       $autorisationDeplacement = array('name' => 'autorisationDeplacement', 'value' => 0, 'onclick' => 'changeValueOfCheckboxes(this)');
       echo '<label class="control-label col-lg-12"> Il/Elle est autorisé(e) à effectuer les déplacements entre mon domicile et la salle de badminton par ses propres moyens et décharge le club de toute responsabilité </label>';
       echo form_checkbox($autorisationSortieGymnase);
       echo '<br/>';

       $autorisationParticipationCompet = array('name' => 'autorisationParticipationCompet', 'value' => 0, 'onclick' => 'changeValueOfCheckboxes(this)');
       echo '<label class="control-label col-lg-12"> Autorise celui ou celle-ci à participer aux compétitions fédérales auxquelles il/elle pourra être inscrit dans le cadre du club et à s y rendre véhiculé(e) par les parents disponibles </label>';
       echo form_checkbox($autorisationSortieGymnase);
       echo '<br/>';

       $deplacementNecessaires = array('name' => 'deplacementNecessaires', 'value' => 0, 'onclick' => 'changeValueOfCheckboxes(this)');
       echo '<label class="control-label col-lg-12"> Je m engage à effectuer tous les déplacements nécessaires pour que mon enfant participe à toutes les compétitions auxquelles il sera inscrit au sein du club </label>';
       echo form_checkbox($autorisationSortieGymnase);
       echo '<br/>';

       $autorisationDeplacementPropreMoyens = array('name' => 'autorisationDeplacementPropreMoyens', 'value' => 0, 'onclick' => 'changeValueOfCheckboxes(this)');
      echo '<label class="control-label col-lg-12"> Autorise celui ou celle-ci à se rendre par ses propres moyens aux stages ou compétitions auxquels il/elle pourra être inscrit dans le cadre du club </label>';
       echo form_checkbox($autorisationSortieGymnase);
       echo '<br/>';
   }
   echo form_submit('envoi', 'Valider'); 
   echo '</div>';
   echo form_close(); 
    
?>
</body>
</html> 