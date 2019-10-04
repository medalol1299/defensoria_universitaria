<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ocurrencia extends CI_Controller {
    public function index() {
        $this->load->model('MOcurrencia');
        $data['registros'] = $this->MOcurrencia->mostrar_registros();
        $this->load->view('header');
        $this->load->view('ocurrencia/index', $data);
        $this->load->view('footer');
    }

    public function nuevo() {
        $this->load->view('header');
        $this->load->view('ocurrencia/nuevo');
        $this->load->view('footer');
    }

    public function agregar() {
        $this->load->model('MOcurrencia');
        $ocurrencia = array(
            'ocurrencia' => $this->input->post('ocurrencia'),
            'fecha' => $this->input->post('fecha'),
            'estado' => 'A'
        );
        $this->MOcurrencia->nuevo_registro($ocurrencia);
        header("Location: " . base_url() . "ocurrencia");
    }

    public function editar($id) {
        $this->load->model('MOcurrencia');
        $data['registro'] = $this->MOcurrencia->editar_registro($id);
        $this->load->view('header');
        $this->load->view('ocurrencia/nuevo', $data);
        $this->load->view('footer');
    }

    public function modificar() {
        $this->load->model('MOcurrencia');
        $ocurrencia = array(
            'ocurrencia' => $this->input->post('ocurrencia'),
            'fecha' => $this->input->post('fecha'),
        );
        $id = $this->input->post('id');
        $this->MOcurrencia->modificar_registro($ocurrencia, $id);
        header("Location: " . base_url() . "ocurrencia");
    }

    public function borrar($id) {
        $this->load->model('MOcurrencia');
        $this->MOcurrencia->eliminar_registro($id);
        header("Location: " . base_url() . "ocurrencia");
    }

}
