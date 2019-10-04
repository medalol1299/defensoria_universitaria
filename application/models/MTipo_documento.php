<?php

class MTipo_documento extends CI_Model {
    
    public function mostrar_registros(){
        $query = $this->db->get_where('tipo_documento', array('estado' => 'A'));
        return $query->result();
    }

    public function nuevo_registro($tipo_documento) {
        $data=array(
          'tipo_documento' => $tipo_documento
        );
        $this->db->insert('tipo_documento',$data);
    }
    public function editar_registro($id){
        $query=  $this->db->query("SELECT * FROM tipo_documento WHERE idtipo_documento='$id'");
        return $query->result();
    }
    public function modificar_registro($data,$id){
        $this->db->where('idtipo_documento', $id);
        $this->db->update('tipo_documento',$data);
    }
    public function eliminar_registro($id){
        $this->db->where('idtipo_documento', $id);
        $data=array(
            'estado'=>'I'
        );
        $this->db->update('tipo_documento',$data);
    }

}
