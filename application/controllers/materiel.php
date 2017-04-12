<?php

class Materiel extends CI_Controller
{
	public function __construc()
	{
		parent::__construc();
	}
    public function matos()
    {
        $nomMateriel = $this->input->get_post('nomMateriel');
        $qteStock = $this->input->get_post('qteStock');
        $prix = $this->input->get_post('prix');

        $this->load->library('form_validation');
    	$this->load->helper('form');
        $this->load->model('materiel_model', 'materiel');
        $this->load->view('materiel');

        $this->form_validation->set_rules('nomMateriel', '"Le nom du matériel"', 'trim|required');
        $this->form_validation->set_rules('qteStock', '"La quantité en stock"', 'trim|required');
        $this->form_validation->set_rules('prix', '"Le prix"', 'trim|required');

        if($this->form_validation->run() == false) {
  			    echo validation_errors();
  		} else {
            $this->materiel->addMateriel($nomMateriel, $qteStock, $prix);

  		}

    }
}

?>