<?php

class MActividad extends CI_Model {

    public function nuevo_registro($data) {
        $data['estado'] = 'A';
        $this->db->insert('actividad', $data);
        return $this->db->insert_id();
    }

    public function buscar_por_id($id) {
        $query = $this->db->get_where('actividad', array('idactividad' => $id));
        return $query->row();
    }

    public function obtener_registros() {
        $query = $this->db->get_where('actividad', array('estado' => 'A'));
        return $query->result();
    }

    public function eliminar_registro($id) {
        $this->db->where('idactividad', $id);
        $this->db->update('actividad', array('estado'=>'I'));
    }
    public function modificar_registro($id,$data){
        $this->db->where('idactividad', $id);
        $this->db->update('actividad', $data);
    }

}
