<?php

class Cotisation extends CI_Controller
{
	public function __construc()
	{
		parent::__construc();
	}
    public function gestionCotisation()
    {
    	$numLicence = $this->input->get_post('adherent');
    	$nomPayeur = $this->input->get_post('nomPayeur');
  		$typePaiement = $this->input->get_post('typePaiement');
  		$datePaiement = $this->input->get_post('datePaiement');

    	$this->load->library('form_validation');
    	$this->load->helper('form');
    	$this->load->model('cotisation_model', 'cotisation');
    	$this->load->model('receptionLicence_model', 'receptionLicence');
    	$this->load->view('cotisation');


      $this->form_validation->set_rules('nomPayeur', '"Le nom du payeur"', 'trim|required');
      $this->form_validation->set_rules('typePaiement', '"Le type de paiement"', 'trim|required');
    	$this->form_validation->set_rules('datePaiement', '"La date de paiement"', 'trim|required');

		if($this->form_validation->run() == false) {
			echo validation_errors();
		} else {
       $idCotisation = $this->cotisation->getCotisation($numLicence)[0]->Id_Cotisation;
		   $this->cotisation->insertPaiement($numLicence, $typePaiement, $datePaiement);
		   $this->cotisation->updateCotisation($idCotisation, $nomPayeur);
		}
	}
}

?>