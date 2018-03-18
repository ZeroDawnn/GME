<?php

class Universites_m extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_all_only_name() {
        $this->db->select('CODEU, NOMU');
        $query = $this->db->get('universites');
        $aUniversites = $query->result();
        
        $aReturn = array();
        foreach ($aUniversites as $oUniversite) {
            $aReturn[$oUniversite->CODEU] = $oUniversite->NOMU;
        }
        return $aReturn;
    }

}
