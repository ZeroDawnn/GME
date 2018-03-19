<?php

class Demandes_mobilites_m extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_all_only_ref() {
        $this->db->select('REFDEMMOB');
        $query = $this->db->get('demandesmobilites');
        $aDemandesMobilites = $query->result();

        $aReturn = array();
        foreach ($aDemandesMobilites as $oDemandeMobilites) {
            $aReturn[$oDemandeMobilites->REFDEMMOB] = $oDemandeMobilites->REFDEMMOB;
        }
        return $aReturn;
    }

}
