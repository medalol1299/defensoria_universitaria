<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Caso extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MCaso');
        $this->load->model('MDoc_emitido');
        $this->load->model('MDoc_recibido');
    }

    public function index() {
        $data['registros'] = $this->MCaso->obtener_registros();
        $this->load->view('header');
        $this->load->view('caso/index', $data);
        $this->load->view('footer');
    }

    public function nuevo() {
        $data['doc_emitido'] = $this->MDoc_emitido->obtener_registro();
        $data['doc_recibido'] = $this->MDoc_recibido->obtener_registro();
        $this->load->view('header');
        $this->load->view('caso/nuevo', $data);
        $this->load->view('footer');
    }
    
    public function editar($idcaso){
        $data['registro']=$this->MCaso->buscar_por_id($idcaso);
        $this->load->view('header');
        $this->load->view('caso/nuevo', $data);
        $this->load->view('footer');
    }

    public function agregar() {
        $this->MCaso->nuevo_registro($this->input->post());
        header("Location: ".base_url()."caso");
    }

}
