<?php

class Cours extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('cours_m');
        $this->load->helper('url_helper');
    }

    public function index($page = 1) {
        $this->load->library('pagination');

        $limit = 10;
        $aData['aCours'] = $this->cours_m->get_page($limit, $page * $limit - $limit);

        $config['base_url'] = base_url() . '/Cours/page';
        $config['total_rows'] = $this->cours_m->get_total_count();
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $aData['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header', $aData);
        $this->load->view('cours/index.php', $aData);
        $this->load->view('templates/footer', $aData);
    }

    public function editer($codeC = null) {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
                array(
                    array(
                        'field' => 'libelle',
                        'label' => 'Libellé',
                        'rules' => 'required'
                    ), array(
                        'field' => 'ECTS',
                        'label' => ' Crédits ECTS ',
                        'rules' => 'required'
                    )
                )
        );

        if ($this->form_validation->run() === FALSE) {
            $aData['action'] = 'edit';
            $aData['oCours'] = $this->cours_m->get_by_codeC($codeC);


            $this->load->view('templates/header', $aData);
            $this->load->view('cours/editer.php', $aData);
            $this->load->view('templates/footer', $aData);
            echo 'non';
        } else {
            $this->cours_m->edit_by_codeC($codeC);
            redirect('/Cours');
        }
    }

    public function ajouter() {
        $aData['action'] = 'add';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
                array(
                    array(
                        'field' => 'libelle',
                        'label' => 'Libellé',
                        'rules' => 'required'
                    ), array(
                        'field' => 'ECTS',
                        'label' => ' Crédits ECTS ',
                        'rules' => 'required'
                    )
                )
        );

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $aData);
            $this->load->view('cours/ajouter.php', $aData);
            $this->load->view('templates/footer', $aData);
        } else {
            $this->cours_m->add();

            redirect('/Cours');
        }
    }

    public function supprimer($codeC = null) {
        $this->cours_m->delete_by_codeC($codeC);
        redirect('/Cours');
    }

}
