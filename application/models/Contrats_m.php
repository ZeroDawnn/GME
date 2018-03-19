<?php

class Contrats_m extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_total_count() {
        return $this->db->count_all('contrats');
    }

    public function get_all() {
        $query = $this->db->get('contrats');
        return $query->result();
    }

    public function get_page($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('contrats');
        return $query->result();
    }

    public function get_by_idC($idC) {
        $query = $this->db->get_where('contrats', array('IDCONTRAT' => $idC));
        return $query->row();
    }

    public function add() {
        return $this->db->insert('contrats', array(
                    'CODEDIP' => html_escape($this->input->post('codeD')),
                    'REFDEMMOB' => html_escape($this->input->post('refDemMob')),
                    'IDP' => html_escape($this->input->post('idP')),
                    'DUREE' => html_escape($this->input->post('duree')),
                    'ETATCONTRAT' => html_escape($this->input->post('etat')),
                    'ORDRE' => html_escape($this->input->post('ordre'))
        ));
    }

    public function edit_by_idC($idC) {
        $this->db->set(array(
            'CODEDIP' => html_escape($this->input->post('codeD')),
            'REFDEMMOB' => html_escape($this->input->post('refDemMob')),
            'IDP' => html_escape($this->input->post('idP')),
            'DUREE' => html_escape($this->input->post('duree')),
            'ETATCONTRAT' => html_escape($this->input->post('etat')),
            'ORDRE' => html_escape($this->input->post('ordre'))
        ));
        $this->db->where('IDCONTRAT', $idC);
        $this->db->update('contrats');
    }

    public function delete_by_idC($idC) {
        $this->db->delete('contrats', array('IDCONTRAT' => $idC));
    }

}
