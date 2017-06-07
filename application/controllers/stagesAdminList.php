<?php

class StagesAdminList extends CI_Controller
{
	public function __construc()
	{
		parent::__construc();
	}
    public function stagesList()
    {
        $numLicence = $this->input->get_post('adherent');
        $idLieu = $this->input->get_post('lieu');
        $idStage = $this->input->get_post('stage');
        $dateStage = $this->input->get_post('dateStage');

        $this->load->library('form_validation');
    	$this->load->helper('form');
        $this->load->model('stagesAdminList_model', 'stagesAdminList');
        $this->load->model('receptionLicence_model', 'receptionLicence');
        $this->load->view('stagesAdminList');

        $this->form_validation->set_rules('dateStage', '"La date du tournoi"', 'trim|required');

        if($this->form_validation->run() == false) {
  			    echo validation_errors();
  		} else {
            $this->stagesAdminList->addAdherentTournoi($numLicence, $idStage, $idLieu, $dateStage);

  		}

    }
}

?>