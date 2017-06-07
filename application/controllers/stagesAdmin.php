<?php

class StagesAdmin extends CI_Controller
{
	public function __construc()
	{
		parent::__construc();
	}
    public function stages()
    {
        $nomStage = $this->input->get_post('nomStage');
        $dateStage = $this->input->get_post('dateStage');
        $adresseGymnase = $this->input->get_post('adresseGymnase');
        $cp = $this->input->get_post('cp');
        $ville = $this->input->get_post('ville');
        $pays = $this->input->get_post('pays');
        

    	$this->load->library('form_validation');
    	$this->load->helper('form');
        $this->load->model('stagesAdmin_model', 'stagesAdmin');
        $this->load->view('stagesAdmin');

        $this->form_validation->set_rules('nomStage', '"Le nom du stage"', 'trim|required');
        $this->form_validation->set_rules('dateStage', '"La date du stage"', 'trim|required');
        $this->form_validation->set_rules('adresseGymnase', '"L adresse du gymnase"', 'trim|required');
        $this->form_validation->set_rules('cp', '"Le code postal"', 'trim|required');
        $this->form_validation->set_rules('ville', '"La ville"', 'trim|required');
        $this->form_validation->set_rules('pays', '"Le pays"', 'trim|required');
      
        if($this->form_validation->run() == false) {
  			    echo validation_errors();
  		} else {
  			$this->stagesAdmin->ajouter_tournoi($nomStage);
            $this->stagesAdmin->ajouter_lieu($adresseGymnase, $cp, $ville, $pays);
  		}

    }
}

?>