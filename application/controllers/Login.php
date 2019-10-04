<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $this->load->view('login');
    }

    public function validar() {
        $this->load->model('MUsuario');
        $usuario=$this->input->post('usuario');
        $clave=$this->input->post('clave');
        $query = $this->MUsuario->validar_usuario($usuario, $clave);
        if ($query!=NULL) {
            foreach ($query as $fila) {
                $data= array(
                    'nombre' =>$fila->nombre,
                    'usuario' =>$fila->usuario,
                    'clave' =>$fila->clave,
                    'apellido'=>$fila->apellido,
                    'perfil'=>$fila->perfil,
                    'grado'=>$fila->grado,
                    'cargo'=>$fila->cargo
                );
            }
            $this->session->set_userdata($data);
            header('Location: '.base_url().'home');
        } else {
            $data['mensaje']= 'Datos incorrectos';
            $this->load->view('login',$data);
        }
    }
    public function cerrar(){
        $this->session->sess_destroy();
        header('Location: '.base_url());
    }

}
