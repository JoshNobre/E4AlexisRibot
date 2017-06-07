<?php

class Inscription extends CI_Controller
{
	public function __construc()
	{
		parent::__construc();
	}
    public function accueil()
    {
        $username = $this->input->get_post('username');
  		  $mdp = $this->input->get_post('password');
  		  $mdp2 = $this->input->get_post('password2');
        $adulte = $this->input->get_post('choix');
        $dateInscription = date('d-m-Y h:i:s');

      	$this->load->library('form_validation');
      	$this->load->helper('form');
      	$this->load->view('inscription');
      	$this->load->model('inscription_model', 'inscription');

     		$this->form_validation->set_rules('username', '"Le user"', 'trim|required');
      	$this->form_validation->set_rules('password', '"Le pwd"', 'trim|required');
    		$this->form_validation->set_rules('password2', '"Le pwd2"', 'trim|required|matches[password]');

    		if($this->form_validation->run() == false) {
    			echo validation_errors();
    		} else {
            $mdp = sha1($mdp);
    		    $resultat = $this->inscription->ajouter_utilisateur($username, $mdp, $adulte, $dateInscription);
            $this->session->set_userdata('adulte', $adulte);
            $this->session->set_userdata('id', $this->inscription->getId($username)[0]->Id);
            $this->session->set_userdata('username', $username);
    			  redirect('connexion/accueil');
    		}
	   
    }

}

?>