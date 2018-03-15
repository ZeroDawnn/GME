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

}
