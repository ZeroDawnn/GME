<?php

class Diplomes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('diplomes_m');
        $this->load->model('universites_m');
        $this->load->helper('url_helper');
    }

    public function index($page = 1, $codeU = null) {
        $this->load->library('pagination');
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
                array(
                    array(
                        'field' => 'universite',
                        'label' => 'Université',
                        'rules' => 'required'
                    )
                )
        );

        if ($this->form_validation->run() != FALSE) {
            redirect('/Universites/' . $this->input->post('universite') . '/Diplomes/page');
        }

        $limit = 10;
        //Si aucune université n'est selectionné alors on récupere tous les diplômes sinon on récupere seulement ce de l'université en question
        $aData['aDiplomes'] = $codeU == null ? $this->diplomes_m->get_page($limit, $page * $limit - $limit) : $this->diplomes_m->get_by_codeU_page($codeU, $limit, $page * $limit - $limit);
        //On précise l'url des pages en fonctions de l'université sélectionné.
        $config['base_url'] = $codeU == null ? base_url() . '/Diplomes/page' : base_url() . 'Universites/' . $codeU . '/Diplomes/page';
        $config['total_rows'] = $codeU == null ? $this->diplomes_m->get_total_count():$this->diplomes_m->get_by_codeU_total_count($codeU);
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $aData['codeU'] = $codeU;
        $aData['aUniversites'] = $this->universites_m->get_all_only_name();
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

    public function supprimer($codeD = null) {
        $this->diplomes_m->delete_by_codeD($codeD);
        redirect('/Diplomes');
    }

}
