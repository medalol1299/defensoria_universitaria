<?php

class MCaso extends CI_Model {

    public function nuevo_registro($data) {
        $data['estado'] = 'A';
        $this->db->insert('caso', array('nombre' => $data['nombre'], 'asunto' => $data['asunto'],'estado' => 'A') );
        $id=$this->db->insert_id();
        foreach ($data['doc_emitidos'] as $value) {
            $this->db->where('iddoc_emitido',$value);
            $this->db->update('doc_emitido', array('idcaso'=>$id));
        }
        foreach ($data['doc_recibidos'] as $value) {
            $this->db->where('iddoc_recibido',$value);
            $this->db->update('doc_recibido', array('idcaso'=>$id));
        }
    }

    public function buscar_por_id($id) {
        $query = $this->db->get_where('caso', array('idcaso' => $id));
        return $query->result();
    }

    public function obtener_registros() {
        $query = $this->db->get_where('caso', array('estado'=>'A'));
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