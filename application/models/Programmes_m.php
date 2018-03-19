<?php

class Programmes_m extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_total_count() {
        return $this->db->count_all('programmes');
    }

    public function get_all() {
        $query = $this->db->get('programmes');
        return $query->result();
    }

    public function get_page($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('programmes');
        return $query->result();
    }

    public function get_all_only_entitled() {
        $this->db->select('IDP, INTITULEP');
        $query = $this->db->get('programmes');
        $aProgrammes = $query->result();

        $aReturn = array();
        foreach ($aProgrammes as $oProgramme) {
            $aReturn[$oProgramme->IDP] = $oProgramme->INTITULEP;
        }
        return $aReturn;
    }

    public function get_by_idP($idP) {
        $query = $this->db->get_where('programmes', array('IDP' => $idP));
        return $query->row();
    }

    public function add() {
        return $this->db->insert('programmes', array(
                    'INTITULEP' => html_escape($this->input->post('intitule')),
                    'EXPLICATION' => html_escape($this->input->post('explication'))
        ));
    }

    public function edit_by_idP($idP) {
        $this->db->set(array(
            'INTITULEP' => html_escape($this->input->post('intitule')),
            'EXPLICATION' => html_escape($this->input->post('explication'))
        ));
        $this->db->where('IDP', $idP);
        $this->db->update('programmes');
    }

    public function delete_by_idP($idP) {
        $this->db->delete('programmes', array('IDP' => $idP));
    }

}
