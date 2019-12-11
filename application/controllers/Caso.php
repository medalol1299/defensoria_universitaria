<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Caso extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MCaso');
    }

    public function index() {
        $data['registros'] = $this->MCaso->mostrar_registros();
        $this->load->view('header');
        $this->load->view('caso/index', $data);
        $this->load->view('footer');
    }

    public function nuevo() {
        $this->load->view('header');
        $this->load->view('caso/nuevo');
        $this->load->view('footer');
    }
    
    public function editar($idcaso){
        $data['registro']=$this->MCaso->editar_registro($idcaso);
        $this->load->view('header');
        $this->load->view('caso/nuevo', $data);
        $this->load->view('footer');
    }

    public function agregar() {
        $this->load->model('MCaso');
        $data = array(
            'caso' => $this->input->post('caso'),
            'descripcion' => $this->input->post('descripcion'),
            'estado' => 'A'
        );
        $this->MCaso->nuevo_registro($data);
        header("Location: ".base_url()."caso");
    }
    
    public function modificar() {
        $this->load->model('MCaso');
        $caso = array(
            'caso' => $this->input->post('caso'),
            'descripcion' => $this->input->post('descripcion'),
        );
        $id = $this->input->post('id');
        $this->MCaso->modificar_registro($caso, $id);
        header("Location: " . base_url() . "caso");
    }

    public function borrar($id) {
        $this->load->model('MCaso');
        $this->MCaso->eliminar_registro($id);
        header("Location: " . base_url() . "caso");
    }

}
