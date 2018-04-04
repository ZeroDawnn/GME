<?php

class Cours extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('cours_m');
        $this->load->helper('url_helper');
    }

    public function index($page = 1, $codeD = null) {
        $this->load->library('pagination');
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
                array(
                    array(
                        'field' => 'diplome',
                        'label' => 'Diplôme',
                        'rules' => 'required'
                    )
                )
        );

        if ($this->form_validation->run() != FALSE) {
            redirect('/Diplomes/' . $this->input->post('diplome') . '/Cours/page');
        }

        $this->load->model('diplomes_m');

        $limit = 10;
        $aData['codeD'] = $codeD;
        $aData['aDiplomes'] = $this->diplomes_m->get_all_only_entitled();
        //Si aucun diplome n'est selectionné alors on récupere tous les cours sinon on récupere seulement ceux du diplome en question
        $aData['aCours'] = $codeD == null ? $this->cours_m->get_page($limit, $page * $limit - $limit) : $this->cours_m->get_by_codeD_page($codeD, $limit, $page * $limit - $limit);
        //On précise l'url des pages en fonctions du diplome sélectionné.
        $config['base_url'] = $codeD == null ? base_url() . '/Cours/page' : base_url() . 'Diplomes/' . $codeD . '/Cours/page';
        $config['total_rows'] = $codeD == null ? $this->cours_m->get_total_count() : $this->cours_m->get_by_codeD_total_count($codeD);
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
