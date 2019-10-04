<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Actividad extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MActividad');
    }

    public function index() {
        $this->load->view('header');
        $this->load->view('actividad/index');
        $this->load->view('footer');
    }

    public function eliminar_evento($id) {
        $this->MActividad->eliminar_registro($id);
        echo json_enconde();
    }

    public function nuevo_evento() {
        $datos = $this->input->post();
        $idactividad = $this->MActividad->nuevo_registro($datos);
        echo json_encode($this->MActividad->buscar_por_id($idactividad));
    }

    public function mostrar_actividades() {
        $result=$this->MActividad->obtener_registros();
        $data=[];
        foreach ($result as $row) {
            $data[]=[
                'id' => $row->idactividad,
                'title' => $row->actividad,
                'start' => $row->fecha,
                'allDay' => true,
                'className' => $row->color,
                'description' => $row->descripcion
            ];
        }
        echo json_encode($data);
    }
    
    public function actualizar_evento($id){
        $datos = $this->input->post();
        $this->MActividad->modificar_registro($id,$datos);
        echo json_enconde();
    }
    

}
