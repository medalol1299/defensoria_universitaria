<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Doc_emitido extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('MTipo_documento');
        $this->load->model('MDoc_emitido');
        $this->load->model('MCaso');
    }

    public function index($mensaje = '') {
        if ($mensaje == 'correcto') {
            $data['error'] = 'Fichero Subido de Forma Correcta';
        }
        if ($mensaje == 'error') {
            $data['error'] = 'Error de subida de Archivo';
        }
        $data['registros'] = $this->MDoc_emitido->mostrar_registros();
        $this->load->view('header');
        $this->load->view('doc_emitidos/index', $data);
        $this->load->view('footer');
    }

    public function nuevo() {
        $data['tipo_documentos'] = $this->MTipo_documento->mostrar_registros();
        $data['casos'] = $this->MCaso->mostrar_registros();
        $this->load->view('header');
        $this->load->view('doc_emitidos/nuevo', $data);
        $this->load->view('footer');
    }

    public function descargar($name) {
        $this->load->helper('download');
        $data = file_get_contents('./public/archivos/emitido' . $name);
        force_download($name, $data);
    }

    public function subir_archivo($id) {
        $data['registro'] = $this->MDoc_emitido->mostrar_registro($id);
        $data['id'] = $id;
        $this->load->view('header');
        $this->load->view('doc_emitidos/subir_archivo', $data);
        $this->load->view('footer');
    }

    public function guardar_archivo($id) {
        $this->load->library('upload');
        $config['upload_path'] = './public/archivos/emitido';
        $config['file_name'] = $this->input->post('codigo');
        $config['allowed_types'] = 'jpg|png|txt|docx|doc';
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('archivo')) {
            header("Location: " . base_url() . "doc_emitido/index/error");
        } else {
            $data['archivo'] = $this->upload->data('file_name');
            $this->MDoc_emitido->modificar_registro($data, $id);
            header("Location: " . base_url() . "doc_emitido/index/correcto");
        }
    }

    public function agregar() {
        $this->load->library('upload');
        $config['upload_path'] = './public/archivos/emitido';
        $config['file_name'] = $this->input->post('codigo');
        $config['allowed_types'] = 'jpg|png|txt|docx|doc';
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('archivo')) {
            $data = array(
                'codigo' => $this->input->post('codigo'),
                'fecha_emision' => $this->input->post('fecha'),
                'destinatario' => $this->input->post('destinatario'),
                'asunto' => $this->input->post('asunto'),
                'observaciones' => $this->input->post('observaciones'),
                'idtipo_documento' => $this->input->post('idtipo_documento'),
                'idcaso' => $this->input->post('idcaso'),
                'estado' => 'A'
            );
            $this->MDoc_emitido->nuevo_registro($data);
            header("Location: " . base_url() . "doc_emitido/index/error");
        } else {
            $data = array(
                'codigo' => $this->input->post('codigo'),
                'fecha_emision' => $this->input->post('fecha'),
                'archivo' => $this->upload->data('file_name'),
                'destinatario' => $this->input->post('destinatario'),
                'asunto' => $this->input->post('asunto'),
                'observaciones' => $this->input->post('observaciones'),
                'idtipo_documento' => $this->input->post('idtipo_documento'),
                'idcaso' => $this->input->post('idcaso'),
                'estado' => 'A'
            );
            $this->MDoc_emitido->nuevo_registro($data);
            header("Location: " . base_url() . "doc_emitido/index/correcto");
        }
    }

    public function editar($id) {
        $data['tipo_documentos'] = $this->MTipo_documento->mostrar_registros();
        $data['registro'] = $this->MDoc_emitido->editar_registro($id);
        $data['casos'] = $this->MCaso->mostrar_registros();
        $this->load->view('header');
        $this->load->view('doc_emitidos/editar', $data);
        $this->load->view('footer');
    }

    public function modificar() {
        //$file = "./public/archivos".$this->input->post('archivo_e'); 
        //unlink($file);
        //delete_files('./public/archivos/'.$this->input->post('archivo_e'));
        $this->load->library('upload');
        $config['upload_path'] = './public/archivos/emitido';
        $config['file_name'] = $this->input->post('codigo');
        $config['allowed_types'] = 'jpg|png|txt|docx|doc';
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('archivo')) {
            $data = array(
                'fecha_emision' => $this->input->post('fecha'),
                'destinatario' => $this->input->post('destinatario'),
                'asunto' => $this->input->post('asunto'),
                'observaciones' => $this->input->post('observaciones'),
                'idtipo_documento' => $this->input->post('idtipo_documento'),
                'idcaso' => $this->input->post('idcaso')
            );
            $id = $this->input->post('id');
            $this->MDoc_emitido->modificar_registro($data, $id);
            header("Location: " . base_url() . "doc_emitido/index/error");
        } else {
            $data = array(
                'fecha_emision' => $this->input->post('fecha'),
                'asunto' => $this->input->post('asunto'),
                'archivo' => $this->upload->data('file_name'),
                'observaciones' => $this->input->post('observaciones'),
                'destinatario' => $this->input->post('destinatario'),
                'idtipo_documento' => $this->input->post('idtipo_documento'),
                'idcaso' => $this->input->post('idcaso')
            );
            $id = $this->input->post('id');
            $this->MDoc_emitido->modificar_registro($data, $id);
            header("Location: " . base_url() . "doc_emitido/index/mensaje");
        }
    }

    public function borrar($id) {
        $this->MDoc_emitido->eliminar_registro($id);
        header("Location: " . base_url() . "doc_emitido");
    }

}
