<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_documento extends CI_Controller {
    
    public function index() {
        $this->load->model('MTipo_documento');
        $data['registros']=$this->MTipo_documento->mostrar_registros();
        $this->load->view('header');
        $this->load->view('tipo_documento/index',$data);
        $this->load->view('footer');
    }
    
    public function nuevo(){
        $this->load->view('header');
        $this->load->view('tipo_documento/nuevo');
        $this->load->view('footer');
    }
    
    public function agregar(){
        $this->load->model('MTipo_documento');
        $tipo_documento= $this->input->post('tipo_documento');
        $this->MTipo_documento->nuevo_registro($tipo_documento);
        header("Location: ".base_url()."tipo_documento");
    }
    public function editar(){
        $this->load->model('MTipo_documento');
        $id=$this->uri->segment(3);
        $data['registro']=$this->MTipo_documento->editar_registro($id);
        $this->load->view('header');
        $this->load->view('tipo_documento/nuevo',$data);
        $this->load->view('footer');
    }
    public function modificar(){
        $this->load->model('MTipo_documento');
        $data['tipo_documento']=  $this->input->post('tipo_documento');
        $id=  $this->input->post('id');
        $this->MTipo_documento->modificar_registro($data,$id);
        header("Location: ".base_url()."tipo_documento");
    }
    public function borrar($id){
        $this->load->model('MTipo_documento');
        $this->MTipo_documento->eliminar_registro($id);
        header("Location: ".base_url()."tipo_documento");
        
    }

}
