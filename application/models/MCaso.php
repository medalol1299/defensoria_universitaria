<?php

class MCaso extends CI_Model {

    public function mostrar_registros() {
        $query = $this->db->get_where('caso', array('estado' => 'A'));
        return $query->result();
    }

    public function validar_caso($caso, $clave) {
        $this->db->where('caso', $caso);
        $this->db->where('clave', $clave);
        $q = $this->db->get('caso');
        return $q->result();
    }

    public function nuevo_registro($caso) {
        $this->db->insert('caso', $caso);
    }

    public function editar_registro($id) {
        $query = $this->db->query("SELECT * FROM caso WHERE idcaso='$id'");
        return $query->result();
    }

    public function modificar_registro($data, $id) {
        $this->db->where('idcaso', $id);
        $this->db->update('caso', $data);
    }

    public function eliminar_registro($id) {
        $this->db->where('idcaso', $id);
        $data = array(
            'estado' => 'I'
        );
        $this->db->update('caso', $data);
    }

}
