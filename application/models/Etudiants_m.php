<?php

class Etudiants_m extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_total_count() {
        return $this->db->count_all('etudiants');
    }

    public function get_all() {
        $query = $this->db->get('etudiants');
        return $query->result();
    }

    public function get_page($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('etudiants');
        return $query->result();
    }

    public function get_by_numE($numE) {
        $query = $this->db->get_where('etudiants', array('NUMETUDIANT' => $numE));
        return $query->row();
    }

    public function add() {
        return $this->db->insert('etudiants', array(
                    'CODEDIP' => html_escape($this->input->post('codeD')),
                    'NOMET' => html_escape($this->input->post('nom')),
                    'PRENOMET' => html_escape($this->input->post('prenom')),
                    'EMAIL' => html_escape($this->input->post('email')),
                    'CV' => html_escape($this->input->post('cv'))
        ));
    }

    public function edit_by_numE($numE) {
        $this->db->set(array(
            'CODEDIP' => html_escape($this->input->post('codeD')),
            'NOMET' => html_escape($this->input->post('nom')),
            'PRENOMET' => html_escape($this->input->post('prenom')),
            'EMAIL' => html_escape($this->input->post('email')),
            'CV' => html_escape($this->input->post('cv'))
        ));
        $this->db->where('NUMETUDIANT', $numE);
        $this->db->update('etudiants');
    }

    public function delete_by_numE($numE) {
        $this->db->delete('etudiants', array('NUMETUDIANT' => $numE));
    }

}
