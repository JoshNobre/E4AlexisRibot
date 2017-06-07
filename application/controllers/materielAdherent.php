<?php

class MaterielAdherent extends CI_Controller
{
	public function __construc()
	{
		parent::__construc();
	}
    public function materiel()
    {
        $dateAchat = date('d-m-Y h:i:s');
        $numLicence = $this->session->userdata('numLicence');
        $achatLocate = $this->input->get_post('achatLocate');
        $materiel = $this->input->get_post('materiel');
        $materielSplit = explode('#', $materiel);
        $qte = $this->input->get_post('qte');
        $idMateriel = $materielSplit[0];
        $typeCotisation = @$materielSplit[1];
        $prix = @$materielSplit[2];
        $montantCotisation = $qte * $prix;
        $temps = $this->input->get_post('temps');

        $this->load->library('form_validation');
    	$this->load->helper('form');
        $this->load->model('materielAdherent_model', 'materielAdherent');
        $this->load->view('materielAdherent');

        $this->form_validation->set_rules('qte', '"La quantité"', 'trim|required');
        $this->form_validation->set_rules('achatLocate', '"Achat ou location"', 'trim|required');

        if($this->form_validation->run() == false) {
  			    echo validation_errors();
  		} else {
            if($achatLocate == 'acheter') {
                $this->materielAdherent->insertAchat($dateAchat, $numLicence, $idMateriel, $qte);
                $this->materielAdherent->insertCotisation($montantCotisation, $typeCotisation);
                $idCotisation = $this->materielAdherent->getIdCotisation()[0]->Id_Cotisation;
                $this->materielAdherent->insertPaiement($numLicence, $idCotisation);
        } else {
            $this->materielAdherent->insertLocation($dateAchat, $numLicence, $idMateriel, $qte, $temps);
            $this->materielAdherent->insertCotisation($montantCotisation * $temps, $typeCotisation);
            $idCotisation = $this->materielAdherent->getIdCotisation()[0]->Id_Cotisation;
            $this->materielAdherent->insertPaiement($numLicence, $idCotisation);
        }

  		}

    }
}

?>