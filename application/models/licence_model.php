<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Licence_model extends CI_Model
{
    protected $table = 'adherent';
    protected $table2 = 'adulte';
    protected $table3 = 'enfant';
    protected $table4 = 'utilisateur';
    
    public function ajouter_adherent($premiereInscription, $photo, $surname, $name, $sexeOpts, $dateNaiss, $nationalite, 
        $adresse, $ville, $cp, $email, $fixe, $portable, $justificatif, $autorisation, $nomTraitementFiche, $dateRefus, $lieu, $certif, $id, $idGrp)
    {
        $this->db->set('PremiereInscription', $premiereInscription);
        $this->db->set('Photo_Adherent', $photo);
        $this->db->set('Nom', $surname);
        $this->db->set('Prenom', $name);
        $this->db->set('Sexe', $sexeOpts);
        $this->db->set('DateNaissance', date('d-m-Y', strtotime($dateNaiss)));
        $this->db->set('Nationalite', $nationalite);
        $this->db->set('Adresse', $adresse);
        $this->db->set('Ville', $ville);
        $this->db->set('CP', $cp);
        $this->db->set('Mail', $email);
        $this->db->set('Fixe', $fixe);
        $this->db->set('Portable', $portable);
        $this->db->set('Justificatif', $justificatif);
        $this->db->set('AutorisationDiffusion', $autorisation);
        $this->db->set('DateRefus', date('d-m-Y', strtotime($dateRefus)));
        $this->db->set('NomTraitementFiche', $nomTraitementFiche);
        $this->db->set('Lieu', $lieu);
        $this->db->set('certif', $certif);
        $this->db->set('Id', $id);
        $this->db->set('Id_Groupe', $idGrp);
        $this->db->set('Date_Soumission', date('d-m-Y'));
        
        return $this->db->insert($this->table);
    }

    public function update_adherent($premiereInscription, $photo, $surname, $name, $sexeOpts, $dateNaiss, $nationalite, 
        $adresse, $ville, $cp, $email, $fixe, $portable, $justificatif, $autorisation, $nomTraitementFiche, $dateRefus, $lieu, $certif, $id, $idGrp)
    {
        $data = array('PremiereInscription' => $premiereInscription,
        'Photo_Adherent' => $photo,
        'Nom' => $surname,
        'Prenom' => $name,
        'Sexe' => $sexeOpts,
        'DateNaissance' => date('d-m-Y', strtotime($dateNaiss)),
        'Nationalite' => $nationalite,
        'Adresse' => $adresse,
        'Ville' => $ville,
        'CP' => $cp,
        'Mail' => $email,
        'Fixe' => $fixe,
        'Portable' => $portable,
        'Justificatif' => $justificatif,
        'AutorisationDiffusion' => $autorisation,
        'DateRefus' => date('d-m-Y', strtotime($dateRefus)),
        'NomTraitementFiche' => $nomTraitementFiche,
        'Lieu' => $lieu,
        'certif' => $certif,
        'Id' => $id,
        'Id_Groupe' => $idGrp,
        'Date_Soumission' => date('d-m-Y'));
        
        $this->db->where('Id', $id);
        $this->db->update('adherent', $data);
    }


    public function getNumLicence($id) {
            return $this->db->select('Num_Licence')
                        ->from($this->table)
                        ->where('Id', $id)
                        ->get()
                        ->result();
    }       

    public function getId($login) {
        return $this->db->select('Id')
                        ->from($this->table4)
                        ->where('Login', $login)
                        ->get()
                        ->result();
    }  

    public function ajouter_adulte($profession, $optionFit, $optionMuscu, $numLicence) {
        $this->db->set('Profession', $profession);
        $this->db->set('Option_Fit', $optionFit);
        $this->db->set('OptionMuscu', $optionMuscu);
        $this->db->set('Num_Licence', $numLicence);

        return $this->db->insert($this->table2);
    }
    public function ajouter_enfant($nomUrgence, $telUrgence, $autorisationMesuresNecessaires, $telMere, $telPere, $professionMere, $professionPere, $nomParent, $autorisationSortieGymnase, $autorisationDeplacement, $autorisationParticipationCompet, $deplacementNecessaires, $autorisationDeplacementPropreMoyens, $numLicence) {
        $this->db->set('NomUrgence', $nomUrgence);
        $this->db->set('TelUrgence', $telUrgence);
        $this->db->set('AutorisationMesuresNecessaires', $autorisationMesuresNecessaires);
        $this->db->set('TelMere', $telMere);
        $this->db->set('TelPere', $telPere);
        $this->db->set('ProfessionMere', $professionMere);
        $this->db->set('ProfessionPere', $professionPere);
        $this->db->set('AutorisationSortieGymnase', $autorisationSortieGymnase);
        $this->db->set('AutorisationDeplacement', $autorisationDeplacement);
        $this->db->set('AutorisationParticipationCompet', $autorisationParticipationCompet);
        $this->db->set('DeplacementNecessaires', $deplacementNecessaires);
        $this->db->set('AutorisationDeplacementPropreMoyens', $autorisationDeplacementPropreMoyens);
        $this->db->set('Num_Licence', $numLicence);

        return $this->db->insert($this->table3);
    }

    public function update_adulte($profession, $optionFit, $optionMuscu, $numLicence) {
        $data = array('Profession' => $profession,
        'Option_Fit' => $optionFit,
        'OptionMuscu' => $optionMuscu,
        'Num_Licence' => $numLicence);
        
        $this->db->where('Id', $id);
        $this->db->update('adulte', $data);
    }
    
    public function update_enfant($nomUrgence, $telUrgence, $autorisationMesuresNecessaires, $telMere, $telPere, $professionMere, $professionPere, $nomParent, $autorisationSortieGymnase, $autorisationDeplacement, $autorisationParticipationCompet, $deplacementNecessaires, $autorisationDeplacementPropreMoyens, $numLicence) {
        $data = array('NomUrgence' => $profession,
        'TelUrgence' => $optionFit,
        'AutorisationMesuresNecessaires' => $optionMuscu,
        'TelMere' => $numLicence,
        'TelPere' => $telPere,
        'ProfessionMere' => $professionMere,
        'ProfessionPere' => $professionPere,
        'NomParent' => $nomParent,
        'AutorisationSortieGymnase' => $autorisationSortieGymnase,
        'AutorisationDeplacement' => $autorisationDeplacement,
        'AutorisationParticipationCompet' => $autorisationParticipationCompet,
        'DeplacementNecessaires' => $deplacementNecessaires,
        'AutorisationDeplacementPropreMoyens', $autorisationDeplacementPropreMoyens,
        'Num_Licence', $numLicence);
        
        $this->db->where('Id', $id);
        $this->db->update('enfant', $data);
    }

    public function getDateSoumission($id) {
        return $this->db->select('Date_Soumission')
            ->from($this->table)
            ->where('Id', $id)
            ->get()
            ->result();
    }
}