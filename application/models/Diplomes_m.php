<?php

class Diplomes_m extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_total_count() {
        return $this->db->count_all('diplomes');
    }

    public function get_all() {
        $query = $this->db->get('diplomes');
        return $query->result();
    }

    public function get_all_only_entitled() {
        $this->db->select('CODEDIP, INTITULEDIP');
        $query = $this->db->get('diplomes');
        $aDiplomes = $query->result();

        $aReturn = array();
        foreach ($aDiplomes as $oDiplome) {
            $aReturn[$oDiplome->CODEDIP] = $oDiplome->INTITULEDIP;
        }
        return $aReturn;
    }

    public function get_page($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('diplomes');
        return $query->result();
    }

    public function get_by_codeD($codeD) {
        $query = $this->db->get_where('diplomes', array('CODEDIP =' => $codeD));
        return $query->row();
    }

    public function add() {
        return $this->db->insert('diplomes', array(
                    'NUMETUDIANT' => $this->input->post('numE'),
                    'CODEU' => $this->input->post('universite'),
                    'INTITULEDIP' => $this->input->post('intitule'),
                    'ADRESSEWEBD' => $this->input->post('adresseWeb'),
                    'NIVEAU' => $this->input->post('niveau')
        ));
    }

    public function edit_by_codeD($codeD) {
        $this->db->set(array(
            'CODEU' => $this->input->post('universite'),
            'INTITULEDIP' => $this->input->post('intitule'),
            'ADRESSEWEBD' => $this->input->post('adresseWeb'),
            'NIVEAU' => $this->input->post('niveau')
        ));
        $this->db->where('CODEDIP', $codeD);
        $this->db->update('diplomes');
    }

    public function delete_by_codeD($codeD) {
        $this->db->delete('diplomes', array('CODEDIP' => $codeD));
    }

}
