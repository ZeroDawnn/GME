<?php

class Cours_m extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_total_count() {
        return $this->db->count_all('cours');
    }

    public function get_by_codeD_total_count($codeD) {
        $this->db->select('CODECOURS');
        $this->db->from('cours');
        $this->db->join('progdiplome', 'cours.CODECOURS = progdiplome.CODECOURS');
        $this->db->where('CODEDIP',$codeD);
        return $this->db->count_all_results();
    }

    public function get_all() {
        $query = $this->db->get('cours');
        return $query->result();
    }

    public function get_page($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get('cours');
        return $query->result();
    }

    public function get_by_codeD_page($codeD, $limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->select('*');
        $this->db->from('cours');
        $this->db->join('progdiplome', 'cours.CODECOURS = progdiplome.CODECOURS');
        $this->db->where('CODEDIP',$codeD);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_by_codeC($codeC) {
        $query = $this->db->get_where('cours', array('CODECOURS' => $codeC));
        return $query->row();
    }

    public function add() {
        return $this->db->insert('cours', array(
                    'LIBELLECOURS' => html_escape($this->input->post('libelle')),
                    'NBECTS' => html_escape($this->input->post('ECTS'))
        ));
    }

    public function edit_by_codeC($codeC) {
        $this->db->set(array(
            'LIBELLECOURS' => html_escape($this->input->post('libelle')),
            'NBECTS' => html_escape($this->input->post('ECTS'))
        ));
        $this->db->where('CODECOURS', $codeC);
        $this->db->update('cours');
    }

    public function delete_by_codeC($codeC) {
        $this->db->delete('cours', array('CODECOURS' => $codeC));
    }

}
