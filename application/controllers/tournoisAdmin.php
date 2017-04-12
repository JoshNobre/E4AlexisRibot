<?php

class TournoisAdmin extends CI_Controller
{
	public function __construc()
	{
		parent::__construc();
	}
    public function tournois()
    {
        $nomTournoi = $this->input->get_post('nomTournoi');
        $dateTournoi = $this->input->get_post('dateTournoi');
        $adresseGymnase = $this->input->get_post('adresseGymnase');
        $cp = $this->input->get_post('cp');
        $ville = $this->input->get_post('ville');
        $pays = $this->input->get_post('pays');
        

    	$this->load->library('form_validation');
    	$this->load->helper('form');
        $this->load->model('tournoisAdmin_model', 'tournoisAdmin');
        $this->load->view('tournoisAdmin');

        $this->form_validation->set_rules('nomTournoi', '"Le nom du tournoi"', 'trim|required');
        $this->form_validation->set_rules('dateTournoi', '"La date du tournoi"', 'trim|required');
        $this->form_validation->set_rules('adresseGymnase', '"L adresse du gymnase"', 'trim|required');
        $this->form_validation->set_rules('cp', '"Le code postal"', 'trim|required');
        $this->form_validation->set_rules('ville', '"La ville"', 'trim|required');
        $this->form_validation->set_rules('pays', '"Le pays"', 'trim|required');
      
        if($this->form_validation->run() == false) {
  			    echo validation_errors();
  		} else {
  			$this->tournoisAdmin->ajouter_tournoi($nomTournoi);
            $this->tournoisAdmin->ajouter_lieu($adresseGymnase, $cp, $ville, $pays);
  		}

    }
}

?>