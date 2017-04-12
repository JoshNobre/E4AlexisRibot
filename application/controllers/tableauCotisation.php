<?php

class TableauCotisation extends CI_Controller
{
	public function __construc()
	{
		parent::__construc();
	}
    public function cotisation()
    {
      	$this->load->model('tableauCotisation_model', 'tableauCotisation');
      	$this->load->view('tableauCotisation');
    }
}

?>