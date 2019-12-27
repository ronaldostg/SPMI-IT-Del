<?php
class M_Spmi extends CI_Model{

    public function getDataBerita(){
        $sql = "SELECT * FROM `berita` ORDER BY id_berita DESC LIMIT 3";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getDataSop(){
        $this->db->where('kategori',2);
        return $this->db->get('dokumen');
    }

    public function getDataSkrektor(){
        $this->db->where('kategori',3);
        return $this->db->get('dokumen');
    }

    public function getBeritaById($id){
        
        $this->db->where('id_berita',$id);
        return $this->db->get('berita');
    }

}

?>