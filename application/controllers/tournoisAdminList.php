<?php

class TournoisAdminList extends CI_Controller
{
	public function __construc()
	{
		parent::__construc();
	}
    public function tournoisList()
    {
        $numLicence = $this->input->get_post('adherent');
        $idLieu = $this->input->get_post('lieu');
        $idTournoi = $this->input->get_post('tournoi');
        $dateTournoi = $this->input->get_post('dateTournoi');

        $this->load->library('form_validation');
    	$this->load->helper('form');
        $this->load->model('tournoisAdminList_model', 'tournoisAdminList');
        $this->load->model('receptionLicence_model', 'receptionLicence');
        $this->load->view('tournoisAdminList');

        $this->form_validation->set_rules('dateTournoi', '"La date du tournoi"', 'trim|required');

        if($this->form_validation->run() == false) {
  			    echo validation_errors();
  		} else {
            $this->tournoisAdminList->addAdherentTournoi($numLicence, $idTournoi, $idLieu, $dateTournoi);

  		}

    }
}

?>