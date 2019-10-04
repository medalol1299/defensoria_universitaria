<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Doc_recibido extends CI_Controller {

    public function index() {
        $this->load->model('MDoc_recibido');
        $data['registros'] = $this->MDoc_recibido->mostrar_registros();
        $this->load->view('header');
        $this->load->view('doc_recibidos/index', $data);
        $this->load->view('footer');
    }

    public function nuevo() {
        $this->load->model('MTipo_documento');
        $data['tipo_documentos'] = $this->MTipo_documento->mostrar_registros();
        $this->load->view('header');
        $this->load->view('doc_recibidos/nuevo', $data);
        $this->load->view('footer');
    }

    public function agregar() {
        $this->load->model('MDoc_recibido');
        $data = array(
            'codigo' => $this->input->post('codigo'),
            'fecha_ingreso' => $this->input->post('fecha'),
            'remitente' => $this->input->post('remitente'),
            'asunto' => $this->input->post('asunto'),
            'observaciones' => $this->input->post('observaciones'),
            'idtipo_documento' => $this->input->post('idtipo_documento'),
            'estado' => 'A'
        );
        $this->MDoc_recibido->nuevo_registro($data);
        header('Location:' . base_url() . 'doc_recibido');
    }

    public function editar($id) {
        $this->load->model('MDoc_recibido');
        $this->load->model('MTipo_documento');
        $data['tipo_documentos'] = $this->MTipo_documento->mostrar_registros();
        $data['registro'] = $this->MDoc_recibido->editar_registro($id);
        $this->load->view('header');
        $this->load->view('doc_recibidos/nuevo', $data);
        $this->load->view('footer');
    }

    public function modificar() {
        $this->load->model('MDoc_recibido');
        $data = array(
            'codigo' => $this->input->post('codigo'),
            'fecha_ingreso' => $this->input->post('fecha'),
            'asunto' => $this->input->post('asunto'),
            'observaciones' => $this->input->post('observaciones'),
            'remitente' => $this->input->post('remitente'),
            'idtipo_documento' => $this->input->post('idtipo_documento')
        );
        $id = $this->input->post('id');
        $this->MDoc_recibido->modificar_registro($data, $id);
        header("Location: " . base_url() . "doc_recibido");
    }

    public function borrar($id) {
        $this->load->model('MDoc_recibido');
        $this->MDoc_recibido->eliminar_registro($id);
        header("Location: " . base_url() . "doc_recibido");
    }

}

