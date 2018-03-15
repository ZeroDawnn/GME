<?php

class Diplomes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('diplomes_m');
        $this->load->model('universites_m');
        $this->load->helper('url_helper');
    }

    public function index($page = 1) {
        $this->load->library('pagination');

        $limit = 10;
        $aData['aUniversites'] = $this->universites_m->get_all_only_name();
        $aData['aDiplomes'] = $this->diplomes_m->get_page($limit, $page * $limit - $limit);

        $config['base_url'] = base_url() . '/Diplomes/page';
        $config['total_rows'] = $this->diplomes_m->get_total_count();
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $aData['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header', $aData);
        $this->load->view('diplomes/index.php', $aData);
        $this->load->view('templates/footer', $aData);
    }

    public function editer($codeD = null) {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
                array(
                    array(
                        'field' => 'universite',
                        'label' => 'Université',
                        'rules' => 'required'
                    ), array(
                        'field' => 'intitule',
                        'label' => 'Intitulé',
                        'rules' => 'required'
                    ), array(
                        'field' => 'adresseWeb',
                        'label' => 'Adresse Web',
                        'rules' => 'required'
                    ), array(
                        'field' => 'niveau',
                        'label' => 'Niveau',
                        'rules' => 'required'
                    )
                )
        );

        if ($this->form_validation->run() === FALSE) {
            $aData['action'] = 'edit';
            $aData['aUniversites'] = $this->universites_m->get_all_only_name();
            $aData['oDiplome'] = $this->diplomes_m->get_by_codeD($codeD);


            $this->load->view('templates/header', $aData);
            $this->load->view('diplomes/editer.php', $aData);
            $this->load->view('templates/footer', $aData);
        } else {
            $this->diplomes_m->edit_by_codeD($codeD);

            redirect('/Diplomes');
        }
    }

    public function ajouter() {
        $aData['action'] = 'add';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
                array(
                    array(
                        'field' => 'universite',
                        'label' => 'Université',
                        'rules' => 'required'
                    ), array(
                        'field' => 'intitule',
                        'label' => 'Intitulé',
                        'rules' => 'required'
                    ), array(
                        'field' => 'adresseWeb',
                        'label' => 'Adresse Web',
                        'rules' => 'required'
                    ), array(
                        'field' => 'niveau',
                        'label' => 'Niveau',
                        'rules' => 'required'
                    )
                )
        );

        if ($this->form_validation->run() === FALSE) {
            $aData['aUniversites'] = $this->universites_m->get_all_only_name();

            $this->load->view('templates/header', $aData);
            $this->load->view('diplomes/ajouter.php', $aData);
            $this->load->view('templates/footer', $aData);
        } else {
            $this->diplomes_m->add();

            redirect('/Diplomes');
        }
    }

}
