<!DOCTYPE html>
<html>
	<head>
		<meta charset="charset=utf-8" />
		<title>Inscription</title>
	</head>
<body>
<?php echo form_open(''); 
	 $username = array(
  	'name'=>'username',
  	'class'=>'input username',
  	'placeholder'=>'Nom d utilisateur',
  	'value'=> set_value('username'));

  echo form_input($username);

  $password = array(
  	'type'=>'password',
  	'name'=>'password',
  	'placeholder'=>'Mot de passe');

  echo form_input($password);

  $password2 = array(
  	'type'=>'password',
  	'name'=>'password2',
  	'placeholder'=>'Confirmer le mot de passe');
   
   echo form_input($password2);
    
    echo form_label('Adulte');
    
  $adulte = array('name' => 'choix', 'value' => 'adulte');
    echo form_radio($adulte);

    echo form_label('Enfant');  
 $enfant = array('name' => 'choix', 'value' => 'enfant');
    echo form_radio($enfant);
   
   $this->session->set_userdata('choix');
   echo form_submit('envoi', 'Valider'); 
   echo form_close(); 
?>
</body>
</html> 