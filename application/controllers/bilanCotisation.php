<?php

class BilanCotisation extends CI_Controller
{
	public function __construc()
	{
		parent::__construc();
	}
    public function bilan()
    {
      	$this->load->model('bilanCotisation_model', 'bilanCotisation');
      	$this->load->view('bilanCotisation');
	}
}

?>