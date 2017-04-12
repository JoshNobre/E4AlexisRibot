<?php

class ReceptionLicence extends CI_Controller
{
	public function __construc()
	{
		parent::__construc();
	}
    public function test()
    {
        $numLicence = $this->input->get_post('adherent');
        $nomTraitementFiche = $this->input->get_post('nomTraitementFiche');
        $dateEnregistrementLigue = $this->input->get_post('dateEnregistrementLigue');
        $idGrp = $this->input->get_post('idGrp');

    	  $this->load->library('form_validation');
    	  $this->load->helper('form');
        $this->load->model('receptionLicence_model', 'receptionLicence');
        $this->load->view('receptionLicence');
        
  		  $this->form_validation->set_rules('nomTraitementFiche', '"Le nom"', 'trim|required');
        
        if($this->form_validation->run() == false) {
  			    echo validation_errors();
  		  } else {
            $isAdulte = $this->receptionLicence->getNumLicenceAdulte($numLicence)[0]->Num_Licence;
  			    $this->receptionLicence->valider_licence($numLicence, $nomTraitementFiche, $dateEnregistrementLigue);
            if(!empty($isAdulte)) {
              $this->receptionLicence->set_grp($idGrp, $numLicence);
            }
  		  }

    }
}

?>