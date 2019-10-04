<?php
class MOcurrencia extends CI_Model {

    public function mostrar_registros() {
        $query = $this->db->get_where('ocurrencia', array('estado' => 'A'));
        return $query->result();
    }

    public function validar_ocurrencia($ocurrencia, $clave) {
        $this->db->where('ocurrencia',$ocurrencia);
        $this->db->where('clave',$clave);
        $q=  $this->db->get('ocurrencia');
        return $q->result();
    }

    public function nuevo_registro($ocurrencia) {
        $this->db->insert('ocurrencia', $ocurrencia);
    }

    public function editar_registro($id) {
        $query = $this->db->query("SELECT * FROM ocurrencia WHERE idocurrencia='$id'");
        return $query->result();
    }

    public function modificar_registro($data, $id) {
        $this->db->where('idocurrencia', $id);
        $this->db->update('ocurrencia', $data);
    }

    public function eliminar_registro($id) {
        $this->db->where('idocurrencia', $id);
        $data = array(
            'estado' => 'I'
        );
        $this->db->update('ocurrencia', $data);
    }

}

