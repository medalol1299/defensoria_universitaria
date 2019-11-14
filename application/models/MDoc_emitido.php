<?php

class MDoc_emitido extends CI_Model {
    
    public function mostrar_registros(){
        $query = $this->db->query("SELECT * FROM doc_emitido d INNER JOIN tipo_documento t ON d.idtipo_documento=t.idtipo_documento"
                . " LEFT JOIN caso c ON d.idcaso=c.idcaso WHERE d.estado='A' ");
        return $query->result();
    }
    
    public function obtener_registro(){
        $query = $this->db->get_where('doc_emitido', array('estado'=>'A','idcaso'=>NULL));
        return $query->result();
    }

    public function nuevo_registro($data) {
        $this->db->insert('doc_emitido',$data);
    }
    public function editar_registro($id){
        $query=  $this->db->query("SELECT * FROM doc_emitido d INNER JOIN tipo_documento t ON d.idtipo_documento=t.idtipo_documento WHERE iddoc_emitido='$id'");
        return $query->result();
    }
    public function modificar_registro($data,$id){
        $this->db->where('iddoc_emitido', $id);
        $this->db->update('doc_emitido',$data);
    }
    public function eliminar_registro($id){
        $this->db->where('iddoc_emitido', $id);
        $data=array(
            'estado'=>'I'
        );
        $this->db->update('doc_emitido',$data);
    }
    public function mostrar_registro($id){
        $query=$this->db->query("SELECT * FROM doc_emitido WHERE iddoc_emitido='$id' ");
        return $query->result();
    }

}