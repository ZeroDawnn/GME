<?php

class Programmes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('programmes_m');
        $this->load->helper('url_helper');
    }

    public function index($page = 1) {
        $this->load->library('pagination');

        $limit = 10;
        $aData['aProgrammes'] = $this->programmes_m->get_page($limit, $page * $limit - $limit);       

        $config['base_url'] = base_url() . '/Programmes/page';
        $config['total_rows'] = $this->programmes_m->get_total_count();
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $aData['pagination'] = $this->pagination->create_links();

        $this->load->view('templates/header', $aData);
        $this->load->view('programmes/index.php', $aData);
        $this->load->view('templates/footer', $aData);
    }

    public function editer($idP = null) {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
                array(
                    array(
                        'field' => 'intitule',
                        'label' => 'Intitulé',
                        'rules' => 'required'
                    ), array(
                        'field' => 'explication',
                        'label' => 'Explication',
                        'rules' => 'required'
                    )
                )
        );

        if ($this->form_validation->run() === FALSE) {
            $aData['action'] = 'edit';
            // $aData['aProgrammes'] = $this->programmes_m->get_all_intitule();
            $aData['oProgrammes'] = $this->programmes_m->get_by_idP($idP);

            $this->load->view('templates/header', $aData);
            $this->load->view('programmes/editer.php', $aData);
            $this->load->view('templates/footer', $aData);
        } else {
            $this->programmes_m->edit_by_idP($idP);

            redirect('/Programmes');
        }
    }

    public function ajouter() {
        $aData['action'] = 'add';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
                array(
                    array(
                        'field' => 'intitule',
                        'label' => 'Intitulé',
                        'rules' => 'required'
                    ), array(
                        'field' => 'explication',
                        'label' => 'Explication',
                        'rules' => 'required'
                    )
                )
        );

        if ($this->form_validation->run() === FALSE) {
            // $aData['aProgrammes'] = $this->programmes_m->get_all_intitule();

            $this->load->view('templates/header', $aData);
            $this->load->view('programmes/ajouter.php', $aData);
            $this->load->view('templates/footer', $aData);
        } else {
            $this->programmes_m->add();

            redirect('/Programmes');
        }
    }
    
    public function supprimer($idP = null){
        $this->programmes_m->delete_by_idP($idP);
        redirect('/Programmes');
    }

}
