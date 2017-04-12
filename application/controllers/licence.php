<?php

class Licence extends CI_Controller
{
	public function __construc()
	{
		parent::__construc();
	}
    public function formlicence()
    {
        $premiereInscription = $this->input->get_post('premiereInscription');
  		  $photo = $this->input->get_post('photo');
  		  $surname = $this->input->get_post('surname');
        $name = $this->input->get_post('name');
  		  $sexeOpts = $this->input->get_post('sexe');
  		  $dateNaiss = $this->input->get_post('dateNaiss');
        $nationalite = $this->input->get_post('nationalite');
  		  $adresse = $this->input->get_post('adresse');
  		  $ville = $this->input->get_post('ville');
        $cp = $this->input->get_post('cp');
  		  $email = $this->input->get_post('email');
  		  $fixe = $this->input->get_post('fixe');
        $portable = $this->input->get_post('portable');
  		  $justification = $this->input->get_post('justificatif');
  		  $autorisation = $this->input->get_post('autorisation');
        $nomTraitementFiche = 'a determiner';
        $dateRefus = $this->input->get_post('dateRefus');
        $lieu = $this->input->get_post('lieu');
        $certif = $this->input->get_post('certif');
        $idGrp = null;
        
        if($this->session->userdata('adulte') == 'adulte') {
            $profession = $this->input->get_post('profession');
            $optionFit = $this->input->get_post('optionFit');
            $optionMuscu = $this->input->get_post('optionMuscu');
        }

        if($this->session->userdata('enfant') == 'enfant') {
            $nomUrgence = $this->input->get_post('nomUrgence');
            $telUrgence = $this->input->get_post('telUrgence');
            $autorisationMesureNecessaires = $this->input->get_post('autorisationMesureNecessaires');
            $telMere = $this->input->get_post('telMere');
            $telPere = $this->input->get_post('telPere');
            $professionMere = $this->input->get_post('professionMere');
            $professionPere = $this->input->get_post('professionPere');
            $nomParent = $this->input->get_post('nomParent');
            $autorisationSortieGymnase = $this->input->get_post('autorisationSortieGymnase');
            $autorisationDeplacement = $this->input->get_post('autorisationDeplacement');
            $autorisationParticipationCompet = $this->input->get_post('autorisationParticipationCompet');
            $deplacementNecessaires = $this->input->get_post('deplacementNecessaires');
            $autorisationDeplacementPropreMoyens = $this->input->get_post('autorisationDeplacementPropreMoyens');
        }

    	  $this->load->library('form_validation');
    	  $this->load->helper('form');
        $this->load->view('licence');
        $this->load->model('licence_model', 'licence');
        
  		  $this->form_validation->set_rules('photo', '"La photo"', 'trim|required');
		    $this->form_validation->set_rules('surname', '"Le nom"', 'trim|required');
        $this->form_validation->set_rules('name', '"Le prénom"', 'trim|required');
		    $this->form_validation->set_rules('dateNaiss', '"La date de naissance"', 'trim|required|');
        $this->form_validation->set_rules('nationalite', '"La nationalité"', 'trim|required');
		    $this->form_validation->set_rules('ville', '"La ville"', 'trim|required');
        $this->form_validation->set_rules('email', '"L email"', 'trim|required');
  		  $this->form_validation->set_rules('fixe', '"Le tel fixe"', 'trim|required');
		    $this->form_validation->set_rules('portable', '"Le tel portable"', 'trim|required');
        if($this->form_validation->run() == false) {
  			    echo validation_errors();
  		  } else {
              $id = $this->session->userdata('id_user');
  			      $resultat = $this->licence->ajouter_adherent($premiereInscription, $photo, $surname, $name, $sexeOpts, $dateNaiss, $nationalite, $adresse, $ville, $cp, $email, $fixe, $portable, $justification, $autorisation, $nomTraitementFiche, $dateRefus, $lieu, $certif, $id, $idGrp);
            
              $numLicence = $this->licence->getNumLicence($id)[0]->Num_Licence;

              if($this->session->userdata('adulte') == 'adulte') {
                  $resultat2 = $this->licence->ajouter_adulte($profession, $optionFit, $optionMuscu, $numLicence);
              }

              if($this->session->userdata('enfant') == 'enfant') {
                  $resultat3 = $this->licence->ajouter_enfant($nomUrgence, $telUrgence, $autorisationMesureNecessaires, $telMere, $telPere, $professionMere, $professionPere, $nomParent, $autorisationSortieGymnase, $autorisationDeplacement, $autorisationParticipationCompet, $deplacementNecessaires, $autorisationDeplacementPropreMoyens, $numLicence);
              }
  		      }

          }
        }

?>