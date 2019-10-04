<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function index() {
        $this->load->model('MUsuario');
        $data['registros'] = $this->MUsuario->mostrar_registros();
        $this->load->view('header');
        $this->load->view('usuario/index', $data);
        $this->load->view('footer');
    }

    public function nuevo() {
        $this->load->view('header');
        $this->load->view('usuario/nuevo');
        $this->load->view('footer');
    }

    public function agregar() {
        $this->load->model('MUsuario');
        $usuario = array(
            'usuario' => $this->input->post('usuario'),
            'clave' => $this->input->post('clave'),
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),
            'grado' => $this->input->post('grado'),
            'cargo' => $this->input->post('cargo'),
            'perfil' => 'U',
            'estado' => 'A'
        );
        $this->MUsuario->nuevo_registro($usuario);
        header("Location: " . base_url() . "usuario");
    }

    public function editar() {
        $this->load->model('MUsuario');
        $id = $this->uri->segment(3);
        $data['registro'] = $this->MUsuario->editar_registro($id);
        $this->load->view('header');
        $this->load->view('usuario/nuevo', $data);
        $this->load->view('footer');
    }

    public function modificar() {
        $this->load->model('MUsuario');
        $usuario = array(
            'usuario' => $this->input->post('usuario'),
            'clave' => $this->input->post('clave'),
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),
            'grado' => $this->input->post('grado'),
            'cargo' => $this->input->post('cargo')
        );
        $id = $this->input->post('id');
        $this->MUsuario->modificar_registro($usuario, $id);
        header("Location: " . base_url() . "usuario");
    }

    public function borrar($id) {
        $this->load->model('MUsuario');
        $this->MUsuario->eliminar_registro($id);
        header("Location: " . base_url() . "usuario");
    }

}
