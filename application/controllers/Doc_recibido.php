<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Doc_recibido extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MTipo_documento');
        $this->load->model('MDoc_recibido');
        $this->load->model('MCaso');
    }

    public function index($mensaje = '') {
        if ($mensaje == 'correcto') {
            $data['error'] = 'Fichero Subido de Forma Correcta';
        }
        if ($mensaje == 'error') {
            $data['error'] = 'Error de subida de Archivo';
        }
        $data['registros'] = $this->MDoc_recibido->mostrar_registros();
        $this->load->view('header');
        $this->load->view('doc_recibidos/index', $data);
        $this->load->view('footer');
    }

    public function nuevo() {
        $data['tipo_documentos'] = $this->MTipo_documento->mostrar_registros();
        $data['casos'] = $this->MCaso->mostrar_registros();
        $this->load->view('header');
        $this->load->view('doc_recibidos/nuevo', $data);
        $this->load->view('footer');
    }

    public function descargar($name) {
        $this->load->helper('download');
        $data = file_get_contents('./public/archivos/recibido/' . $name);
        force_download($name, $data);
    }

    public function subir_archivo($id) {
        $data['registro'] = $this->MDoc_recibido->mostrar_registro($id);
        $data['id'] = $id;
        $this->load->view('header');
        $this->load->view('doc_recibidos/subir_archivo', $data);
        $this->load->view('footer');
    }

    public function guardar_archivo($id) {
        $this->load->library('upload');
        $config['upload_path'] = './public/archivos/recibido';
        $config['file_name'] = $this->input->post('codigo');
        $config['allowed_types'] = 'jpg|png|txt|docx|doc';
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('archivo')) {
            header("Location: " . base_url() . "doc_recibido/index/error");
        } else {
            $data['archivo'] = $this->upload->data('file_name');
            $this->MDoc_recibido->modificar_registro($data, $id);
            header("Location: " . base_url() . "doc_recibido/index/correcto");
        }
    }

    public function agregar() {
        $this->load->library('upload');
        $config['upload_path'] = './public/archivos/recibido';
        $config['file_name'] = $this->input->post('codigo');
        $config['allowed_types'] = 'jpg|png|txt|docx|doc';
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('archivo')) {
            $data = array(
                'codigo' => $this->input->post('codigo'),
                'fecha_ingreso' => $this->input->post('fecha'),
                'remitente' => $this->input->post('remitente'),
                'asunto' => $this->input->post('asunto'),
                'observaciones' => $this->input->post('observaciones'),
                'idtipo_documento' => $this->input->post('idtipo_documento'),
                'idcaso' => $this->input->post('idcaso'),
                'estado' => 'A'
            );
            $this->MDoc_recibido->nuevo_registro($data);
            header("Location: " . base_url() . "doc_recibido/index/error");
        } else {
            $data = array(
                'codigo' => $this->input->post('codigo'),
                'fecha_ingreso' => $this->input->post('fecha'),
                'archivo' => $this->upload->data('file_name'),
                'remitente' => $this->input->post('remitente'),
                'asunto' => $this->input->post('asunto'),
                'observaciones' => $this->input->post('observaciones'),
                'idtipo_documento' => $this->input->post('idtipo_documento'),
                'idcaso' => $this->input->post('idcaso'),
                'estado' => 'A'
            );
            $this->MDoc_recibido->nuevo_registro($data);
            header("Location: " . base_url() . "doc_recibido/index/correcto");
        }
    }

    public function editar($id) {
        $data['tipo_documentos'] = $this->MTipo_documento->mostrar_registros();
        $data['registro'] = $this->MDoc_recibido->editar_registro($id);
        $data['casos'] = $this->MCaso->mostrar_registros();
        $this->load->view('header');
        $this->load->view('doc_recibidos/editar', $data);
        $this->load->view('footer');
    }

    public function modificar() {
        $this->load->library('upload');
        $config['upload_path'] = './public/archivos/recibido';
        $config['file_name'] = $this->input->post('codigo');
        $config['allowed_types'] = 'jpg|png|txt|docx|doc';
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('archivo')) {
            $data = array(
                'fecha_ingreso' => $this->input->post('fecha'),
                'asunto' => $this->input->post('asunto'),
                'observaciones' => $this->input->post('observaciones'),
                'remitente' => $this->input->post('remitente'),
                'idcaso' => $this->input->post('idcaso'),
                'idtipo_documento' => $this->input->post('idtipo_documento')
            );
            $id = $this->input->post('id');
            $this->MDoc_recibido->modificar_registro($data, $id);
            header("Location: " . base_url() . "doc_recibido/index/error");
        } else {
            $data = array(
                'fecha_ingreso' => $this->input->post('fecha'),
                'asunto' => $this->input->post('asunto'),
                'archivo' => $this->upload->data('file_name'),
                'observaciones' => $this->input->post('observaciones'),
                'remitente' => $this->input->post('remitente'),
                'idcaso' => $this->input->post('idcaso'),
                'idtipo_documento' => $this->input->post('idtipo_documento')
            );
            $id = $this->input->post('id');
            $this->MDoc_recibido->modificar_registro($data, $id);
            header("Location: " . base_url() . "doc_recibido/index/mensaje");
        }
    }

    public function borrar($id) {
        $this->MDoc_recibido->eliminar_registro($id);
        header("Location: " . base_url() . "doc_recibido");
    }

}
