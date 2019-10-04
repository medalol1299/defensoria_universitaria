<?php

class MUsuario extends CI_Model {

    public function mostrar_registros() {
        $query = $this->db->get_where('usuario', array('estado' => 'A'));
        return $query->result();
    }

    public function validar_usuario($usuario, $clave) {
        $this->db->where('usuario',$usuario);
        $this->db->where('clave',$clave);
        $q=  $this->db->get('usuario');
//        if($q->num_rows()>0){
//            return TRUE;
//        }else{
//            return FALSE;
//        }
        return $q->result();
    }

    public function nuevo_registro($usuario) {
        $this->db->insert('usuario', $usuario);
    }

    public function editar_registro($id) {
        $query = $this->db->query("SELECT * FROM usuario WHERE idusuario='$id'");
        return $query->result();
    }

    public function modificar_registro($data, $id) {
        $this->db->where('idusuario', $id);
        $this->db->update('usuario', $data);
    }

    public function eliminar_registro($id) {
        $this->db->where('idusuario', $id);
        $data = array(
            'estado' => 'I'
        );
        $this->db->update('usuario', $data);
    }

}
