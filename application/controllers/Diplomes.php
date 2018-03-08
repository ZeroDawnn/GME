<?php

class Diplomes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('diplomes_m');
        $this->load->helper('url_helper');
    }

    public function index() {

        $aData['aDiplomes'] = $this->diplomes_m->get_all();

        $this->load->view('templates/header', $aData);
        $this->load->view('diplomes/index.php', $aData);
        $this->load->view('templates/footer', $aData);
    }

    public function editer($codeD) {
        $aData['oDiplome'] = $this->diplomes_m->get_by_codeD($codeD);

        $this->load->view('templates/header', $aData);
        $this->load->view('diplomes/editer.php', $aData);
        $this->load->view('templates/footer', $aData);
    }

}
