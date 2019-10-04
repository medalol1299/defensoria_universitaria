<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Doc_emitido extends CI_Controller {

    public function index() {
        $this->load->model('MDoc_emitido');
        $data['registros'] = $this->MDoc_emitido->mostrar_registros();
        $this->load->view('header');
        $this->load->view('doc_emitidos/index', $data);
        $this->load->view('footer');
    }

    public function nuevo() {
        $this->load->model('MTipo_documento');
        $data['tipo_documentos'] = $this->MTipo_documento->mostrar_registros();
        $this->load->view('header');
        $this->load->view('doc_emitidos/nuevo', $data);
        $this->load->view('footer');
    }

    public function agregar() {
        $this->load->model('MDoc_emitido');
        $data = array(
            'codigo' => $this->input->post('codigo'),
            'fecha_emision' => $this->input->post('fecha'),
            'destinatario' => $this->input->post('destinatario'),
            'asunto' => $this->input->post('asunto'),
            'observaciones' => $this->input->post('observaciones'),
            'idtipo_documento' => $this->input->post('idtipo_documento'),
            'estado' => 'A'
        );
        $this->MDoc_emitido->nuevo_registro($data);
        header('Location:' . base_url() . 'doc_emitido');
    }

    public function editar($id) {
        $this->load->model('MDoc_emitido');
        $this->load->model('MTipo_documento');
        $data['tipo_documentos'] = $this->MTipo_documento->mostrar_registros();
        $data['registro'] = $this->MDoc_emitido->editar_registro($id);
        $this->load->view('header');
        $this->load->view('doc_emitidos/nuevo', $data);
        $this->load->view('footer');
    }

    public function modificar() {
        $this->load->model('MDoc_emitido');
        $data = array(
            'codigo' => $this->input->post('codigo'),
            'fecha_emision' => $this->input->post('fecha'),
            'asunto' => $this->input->post('asunto'),
            'observaciones' => $this->input->post('observaciones'),
            'destinatario' => $this->input->post('destinatario'),
            'idtipo_documento' => $this->input->post('idtipo_documento')
        );
        $id = $this->input->post('id');
        $this->MDoc_emitido->modificar_registro($data, $id);
        header("Location: " . base_url() . "doc_emitido");
    }

    public function borrar($id) {
        $this->load->model('MDoc_emitido');
        $this->MDoc_emitido->eliminar_registro($id);
        header("Location: " . base_url() . "doc_emitido");
    }

}
