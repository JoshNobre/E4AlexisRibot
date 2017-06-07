<?php

class Connexion extends CI_Controller
{
	public function __construc()
	{
		parent::__construc();
	}
    public function accueil()
    {
        $login = $this->input->get_post('login');
        $mdp = $this->input->get_post('mdp');
        $mdp = sha1($mdp); 
        
        $this->load->library('form_validation');
    	$this->load->helper('form');
        
        $this->form_validation->set_rules('login', '"Identifiant"', 'trim|required');
        $this->form_validation->set_rules('mdp', '"Mot de passe"', 'trim|required');
        
        $this->load->view('connexion');
    	$this->load->model('connexion_model', 'connexion');

        $result = $this->connexion_model->accept($login, $mdp);
        $result3 = $this->connexion_model->getNumLicence();
        
        if($this->form_validation->run() == false)
        {
            echo validation_errors();
        }
        else if($this->form_validation->run() == true && empty($result))
        {
            echo 'Aucun compte ne correspond à vos identifiants ';

        }
        else
        { 
            $result2 = $this->connexion_model->get_admin($result[0]->Id);
            if(!empty($result2)) {
                $this->session->set_userdata('id_admin', $result[0]->Id);
                $this->session->set_userdata('nom_admin', $result2[0]->Nom_Personnel);
                $this->session->set_userdata('prenom_admin', $result2[0]->Prenom_Personnel);
                $this->session->set_userdata('droit_admin', $result2[0]->Fonction_Personnel);
            } else {
                $this->session->set_userdata('id_user', $result[0]->Id);
                $this->session->set_userdata('login_user', $result[0]->Login);
                $this->session->set_userdata('numLicence', $result3[0]->Num_Licence);
                $this->session->set_userdata('type_user', $this->connexion->getTypeOfUser($login)[0]->Type_Utilisateur);
            }  
            redirect('accueil/pagePrincipale');      
        }
	   
    }
}

?>