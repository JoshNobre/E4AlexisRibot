<?php

class TableauAdherent extends CI_Controller
{
	public function __construc()
	{
		parent::__construc();
	}
    public function adherent()
    {
      	$this->load->model('tableauAdherent_model', 'tableauAdherent');
      	$this->load->view('tableauAdherent');
    }
}

?>