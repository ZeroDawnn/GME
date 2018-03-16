<?php

class Etudiants extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('etudiants_m');
        $this->load->model('diplomes_m');
        $this->load->helper('url_helper');
    }

    public function index($page = 1) {
        $this->load->library('pagination');

        $limit = 10;
        $aData['aDiplomes'] = $this->diplomes_m->get_all_only_entitled();
        $aData['aEtudiants'] = $this->etudiants_m->get_page($limit, $page * $limit - $limit);

        $config['base_url'] = base_url() . '/Etudiants/page';
        $config['total_rows'] = $this->etudiants_m->get_total_count();
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $aData['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header', $aData);
        $this->load->view('etudiants/index.php', $aData);
        $this->load->view('templates/footer', $aData);
    }

    public function editer($numE = null) {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
                array(
                    array(
                        'field' => 'codeD',
                        'label' => 'Diplôme',
                        'rules' => 'required'
                    ), array(
                        'field' => 'prenom',
                        'label' => 'Prénom',
                        'rules' => 'required'
                    ), array(
                        'field' => 'nom',
                        'label' => 'Nom',
                        'rules' => 'required'
                    ), array(
                        'field' => 'email',
                        'label' => 'E-mail',
                        'rules' => 'required'
                    )
                )
        );

        if ($this->form_validation->run() === FALSE) {
            $aData['action'] = 'edit';
            $aData['aDiplomes'] = $this->diplomes_m->get_all_only_entitled();
            $aData['oEtudiant'] = $this->etudiants_m->get_by_numE($numE);


            $this->load->view('templates/header', $aData);
            $this->load->view('etudiants/editer.php', $aData);
            $this->load->view('templates/footer', $aData);
            echo 'non';
        } else {
            $this->etudiants_m->edit_by_numE($numE);
            redirect('/Etudiants');
        }
    }

    public function ajouter() {
        $aData['action'] = 'add';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
                array(
                    array(
                        'field' => 'numE',
                        'label' => 'Numéro étudiant',
                        'rules' => 'required'
                    ), array(
                        'field' => 'codeD',
                        'label' => 'Diplôme',
                        'rules' => 'required'
                    ), array(
                        'field' => 'prenom',
                        'label' => 'Prénom',
                        'rules' => 'required'
                    ), array(
                        'field' => 'nom',
                        'label' => 'Nom',
                        'rules' => 'required'
                    ), array(
                        'field' => 'email',
                        'label' => 'E-mail',
                        'rules' => 'required'
                    )
                )
        );

        if ($this->form_validation->run() === FALSE) {
            $aData['aDiplomes'] = $this->diplomes_m->get_all_only_entitled();

            $this->load->view('templates/header', $aData);
            $this->load->view('etudiants/ajouter.php', $aData);
            $this->load->view('templates/footer', $aData);
        } else {
            $this->etudiants_m->add();

            redirect('/Etudiants');
        }
    }

    public function supprimer($numE = null) {
        $this->etudiants_m->delete_by_numE($numE);
        redirect('/Etudiants');
    }

}
