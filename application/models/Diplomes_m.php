<?php

class Diplomes_m extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_all() {
        $query = $this->db->get('diplomes');
        return $query->result();
    }

    public function add() {
        
    }

    public function get_by_codeD($codeD) {
        $query = $this->db->get_where('diplomes', array('CODEDIP =' => $codeD));
        return $query->row();
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

}
