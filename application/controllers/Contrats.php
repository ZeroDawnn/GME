<?php

class Contrats extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('contrats_m');
        $this->load->model('diplomes_m');
        $this->load->model('demandes_mobilites_m');
        $this->load->model('programmes_m');
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
            redirect('/Universites/' . $this->input->post('universite') . '/Contrats/page');
        }

        $this->load->model('universites_m');

        $limit = 10;
        $aData['codeU'] = $codeU;
        $aData['aUniversites'] = $this->universites_m->get_all_only_name();
        $aData['aDiplomes'] = $this->diplomes_m->get_all_only_entitled();
        $aData['aDemandesMobilites'] = $this->demandes_mobilites_m->get_all_only_ref();
        $aData['aProgrammes'] = $this->programmes_m->get_all_only_entitled();
        $aData['aContrats'] = $this->contrats_m->get_page($limit, $page * $limit - $limit);
        $config['base_url'] = base_url() . '/Contrats/page';
        $config['total_rows'] = $this->contrats_m->get_total_count();
        //Si aucune université n'est selectionné alors on récupere tous les contrats sinon on récupere seulement ceux de l'université en question
        $aData['aContrats'] = $codeU == null ? $this->contrats_m->get_page($limit, $page * $limit - $limit) : $this->contrats_m->get_by_codeU_page($codeU, $limit, $page * $limit - $limit);
        //On précise l'url des pages en fonctions de l'université sélectionné.
        $config['base_url'] = $codeU == null ? base_url() . '/Contrats/page' : base_url() . 'Universites/' . $codeU . '/Contrats/page';
        $config['total_rows'] = $codeU == null ? $this->contrats_m->get_total_count() : $this->contrats_m->get_by_codeU_total_count($codeU);

        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $aData['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header', $aData);
        $this->load->view('contrats/index.php', $aData);
        $this->load->view('templates/footer', $aData);
    }

    public function editer($idC = null) {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
                array(
                    array(
                        'field' => 'codeD',
                        'label' => 'Diplôme',
                        'rules' => 'required'
                    ), array(
                        'field' => 'refDemMob',
                        'label' => 'Référence de mobilites',
                        'rules' => 'required'
                    ), array(
                        'field' => 'idP',
                        'label' => 'Programme',
                        'rules' => 'required'
                    ), array(
                        'field' => 'duree',
                        'label' => 'Durée',
                        'rules' => 'required'
                    ), array(
                        'field' => 'etat',
                        'label' => 'État',
                        'rules' => 'required'
                    ), array(
                        'field' => 'ordre',
                        'label' => 'Ordre',
                        'rules' => 'required'
                    )
                )
        );

        if ($this->form_validation->run() === FALSE) {
            $aData['action'] = 'edit';
            $aData['aDiplomes'] = $this->diplomes_m->get_all_only_entitled();
            $aData['aDemandesMobilites'] = $this->demandes_mobilites_m->get_all_only_ref();
            $aData['aProgrammes'] = $this->programmes_m->get_all_only_entitled();
            $aData['oContrat'] = $this->contrats_m->get_by_idC($idC);


            $this->load->view('templates/header', $aData);
            $this->load->view('contrats/editer.php', $aData);
            $this->load->view('templates/footer', $aData);
        } else {
            $this->contrats_m->edit_by_idC($idC);

            redirect('/Contrats');
        }
    }

    public function ajouter() {
        $aData['action'] = 'add';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
                array(
                    array(
                        'field' => 'codeD',
                        'label' => 'Diplôme',
                        'rules' => 'required'
                    ), array(
                        'field' => 'refDemMob',
                        'label' => 'Référence de mobilites',
                        'rules' => 'required'
                    ), array(
                        'field' => 'idP',
                        'label' => 'Programme',
                        'rules' => 'required'
                    ), array(
                        'field' => 'duree',
                        'label' => 'Durée',
                        'rules' => 'required'
                    ), array(
                        'field' => 'etat',
                        'label' => 'État',
                        'rules' => 'required'
                    ), array(
                        'field' => 'ordre',
                        'label' => 'Ordre',
                        'rules' => 'required'
                    )
                )
        );

        if ($this->form_validation->run() === FALSE) {
            $aData['aDiplomes'] = $this->diplomes_m->get_all_only_entitled();
            $aData['aDemandesMobilites'] = $this->demandes_mobilites_m->get_all_only_ref();
            $aData['aProgrammes'] = $this->programmes_m->get_all_only_entitled();

            $this->load->view('templates/header', $aData);
            $this->load->view('contrats/ajouter.php', $aData);
            $this->load->view('templates/footer', $aData);
        } else {
            $this->contrats_m->add();

            redirect('/Contrats');
        }
    }

    public function supprimer($idC = null) {
        $this->contrats_m->delete_by_idC($idC);
        redirect('/Contrats');
    }

}
