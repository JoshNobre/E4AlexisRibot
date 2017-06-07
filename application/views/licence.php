<!DOCTYPE html>
<html>
	<head>
		<meta charset="charset=utf-8" />
		<title>Licence</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"></link>
        <link rel="stylesheet" type="text/css" href="../assets/css/licenceAdherent.css"></link>
        <script src="../assets/javascript/jquery-3.1.1.min.js"></script>
        <script src="../assets/javascript/app.js"></script>
	</head>
<body>
<?php 
    $this->load->model('connexion_model', 'connexion');
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
    echo '<br/><br/><br/>';
    echo form_open('');
    echo '<fieldset>';
    echo '<legend> Inscription ou renouvellement de licence </legend>';
    $premiereInscription = array(
        'name' => 'premiereInscription',
        'value' => '1',
        'id' => 'premiereInscription',
        'checked' => 'checked',
        'onclick' => 'changeValueOfCheckboxes(this)');
        echo '<label> Première inscription </label>';
        echo form_checkbox($premiereInscription);
        
    if($this->session->userdata('valueCheckbox') > 1) {
        echo '<script>
            document.getElementById("premiereInscription").value = 0;
            document.getElementById("premiereInscription").checked = false;
              </script>';
    }
    
    $photo = array(
        'name' => 'photo');
        echo '<label> Photo </label>';
        echo form_upload($photo);

    $surname = array(
    	'type'=>'text',
    	'name'=>'surname',
    	'placeholder'=>'Nom');
    echo '<label> Nom </label>';
    echo form_input($surname);


    $name = array(
    	'type'=>'text',
    	'name'=>'name',
    	'placeholder'=>'Prénom');
    echo '<label> Prénom </label>';
    echo form_input($name);
      
   $sexeOpts = array(
       'masculin' => 'M',
       'feminin' => 'F',);
    echo '<label> Sexe </label>';
    echo form_dropdown('sexe', $sexeOpts);
  
    $dateNaiss = array(
        'type'=>'date',
        'name'=>'dateNaiss',
        'placeholder' => 'Date de naissance');
    echo '<label> Date de naissance </label>';
    echo form_input($dateNaiss);
    
    $adresse = array(
        'name'=>'adresse',
        'placeholder' => 'Adresse');
    echo '<label> Adresse </label>';
    echo form_input($adresse);
  
    $nationalite = array(
        'type'=>'text',
        'name'=>'nationalite',
        'placeholder' => 'Nationalité');
    echo '<label> Nationalité </label>';
    echo form_input($nationalite);
    
    $ville = array(
        'type'=>'text',
        'name'=>'ville',
        'placeholder' => 'Ville');
    echo '<label> Ville </label>';
    echo form_input($ville);
    
    $cp = array(
        'type'=>'text',
        'name'=>'cp',
        'placeholder' => 'Code postal');
    echo '<label> Code postal </label>';
    echo form_input($cp);
    
    $email = array(
        'type'=>'email',
        'name'=>'email',
        'placeholder' => 'Email');
    echo '<label> Email </label>';
    echo form_input($email);

    
    $fixe = array(
        'type'=>'text',
        'name'=>'fixe',
        'placeholder' => 'Tél fixe');
    echo '<label> Téléphone fixe </label>';
    echo form_input($fixe);
    
    $portable = array(
        'type'=>'text',
        'name'=>'portable',
        'placeholder' => 'Tél portable');
    echo '<label> Téléphone portable </label>';
    echo form_input($portable);

    $justificatif = array(
        'name'=>'justificatif',
        'value' => '0',
        'onclick' => 'changeValueOfCheckboxes(this)');
    echo '<label> Obtenir un justificatif du comité d entreprise </label>';
    echo form_checkbox($justificatif);
    
    $autorisation = array(
        'name'=>'autorisation',
        'value' => '0', 
        'onclick' => 'changeValueOfCheckboxes(this)');
        echo '<label class="control-label col-lg-8"> J autorise le club à me prendre en photo et/ou me prendre en vidéo et à les diffuser sur le site du club, ainsi que de les utiliser pour tout autre publicité </label>';
    echo form_checkbox($autorisation);

    $dateRefus = array(
        'type' => 'date',
        'name'=>'dateRefus',
        'class' => 'form-control name-saisie');
    echo '<label> Date refus d assurance </label>';
    echo form_input($dateRefus);
    
    $lieu = array(
        'name'=>'lieu');
    echo '<label> Fait à : </label>';
    echo form_input($lieu);

    $certif = array(
        'name'=>'certif');
    echo '<label> Certificat médical </label>';
    echo form_upload($certif);
    echo '<br/><br/>';
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
       echo form_checkbox($autorisationDeplacement);
       echo '<br/>';

       $autorisationParticipationCompet = array('name' => 'autorisationParticipationCompet', 'value' => 0, 'onclick' => 'changeValueOfCheckboxes(this)');
       echo '<label class="control-label col-lg-12"> Autorise celui ou celle-ci à participer aux compétitions fédérales auxquelles il/elle pourra être inscrit dans le cadre du club et à s y rendre véhiculé(e) par les parents disponibles </label>';
       echo form_checkbox($autorisationParticipationCompet);
       echo '<br/>';

       $deplacementNecessaires = array('name' => 'deplacementNecessaires', 'value' => 0, 'onclick' => 'changeValueOfCheckboxes(this)');
       echo '<label class="control-label col-lg-12"> Je m engage à effectuer tous les déplacements nécessaires pour que mon enfant participe à toutes les compétitions auxquelles il sera inscrit au sein du club </label>';
       echo form_checkbox($deplacementNecessaires);
       echo '<br/>';

       $autorisationDeplacementPropreMoyens = array('name' => 'autorisationDeplacementPropreMoyens', 'value' => 0, 'onclick' => 'changeValueOfCheckboxes(this)');
      echo '<label class="control-label col-lg-12"> Autorise celui ou celle-ci à se rendre par ses propres moyens aux stages ou compétitions auxquels il/elle pourra être inscrit dans le cadre du club </label>';
       echo form_checkbox($autorisationDeplacementPropreMoyens);
       echo '<br/>';
   }
   echo form_submit('envoi', 'Valider'); 
   echo form_close(); 

  
?>
</body>
</html> 