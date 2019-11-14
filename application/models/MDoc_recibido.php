<?php

class MDoc_recibido extends CI_Model {
    
    public function mostrar_registros(){
        $query = $this->db->query("SELECT * FROM doc_recibido d INNER JOIN tipo_documento t ON d.idtipo_documento=t.idtipo_documento"
                . " LEFT JOIN caso c ON d.idcaso=c.idcaso WHERE d.estado='A' ");
        return $query->result();
    }
    public function obtener_registro(){
        $query = $this->db->get_where('doc_recibido', array('estado'=>'A','idcaso'=>NULL));
        return $query->result();
    }

    public function nuevo_registro($data) {
        $this->db->insert('doc_recibido',$data);
    }
    public function editar_registro($id){
        $query=  $this->db->query("SELECT * FROM doc_recibido d INNER JOIN tipo_documento t ON d.idtipo_documento=t.idtipo_documento WHERE iddoc_recibido='$id'");
        return $query->result();
    }
    public function modificar_registro($data,$id){
        $this->db->where('iddoc_recibido', $id);
        $this->db->update('doc_recibido',$data);
    }
    public function eliminar_registro($id){
        $this->db->where('iddoc_recibido', $id);
        $data=array(
            'estado'=>'I'
        );
        $this->db->update('doc_recibido',$data);
    }
    public function mostrar_registro($id){
        $query=$this->db->query("SELECT * FROM doc_recibido WHERE iddoc_recibido='$id' ");
        return $query->result();
    }
}