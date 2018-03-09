<?php

class Universites_m extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_all() {
        $query = $this->db->get('universites');
        return $query->result();
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

    public function add() {
        
    }

    public function get_by_codeU($codeU) {
        $query = $this->db->get_where('universites', array('CODEU =' => $codeUs));
        return $query->row();
    }

    public function edit_by_codeU($codeU) {
        
    }

}
