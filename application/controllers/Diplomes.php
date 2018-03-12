<?php

class Diplomes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('diplomes_m');
        $this->load->model('universites_m');
        $this->load->helper('url_helper');
    }

    public function index() {
        $aData['aUniversites'] = $this->universites_m->get_all_only_name();
        $aData['aDiplomes'] = $this->diplomes_m->get_all();

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

}
