<!DOCTYPE html>
<html>
	<head>
		<meta charset="charset=utf-8" />
		<title>Connexion</title>
	</head>
<body>
<?php echo form_open(''); 
    $username = array(
  	'name'=>'login',
  	'placeholder'=>'Nom d utilisateur',
  	'value'=> set_value('username'));

  echo form_input($username);

  $password = array(
  	'type'=>'password',
  	'name'=>'mdp',
  	'placeholder'=>'Mot de passe');

  echo form_input($password);

    
   echo form_submit('envoi', 'Valider'); 
   echo form_close(); 


?>
<a href="<?php echo site_url('inscription/accueil') ?>">S'inscrire</a></li>
</body>
</html> 