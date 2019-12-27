<?php

class M_Berita extends CI_Model{


    public $id_berita;
    public $judul;
    public $isi_berita;
    public $gambar;
    public $tanggal;

    public function getAllDataBerita(){
        return $this->db->get('berita');
    }   
    
    public function getDataBerita(){
        $sql = "SELECT * FROM `berita` ORDER BY id_berita DESC LIMIT 3";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function insertBerita($photoName){
        $tanggalUpload = date("Y-m-d h:i:a");
        $judulBerita = $this->input->post('judul');
        $isiBerita = $this->input->post('isiBerita');
      

        $data = array(
            'id_berita'=>'',
            'judul' => $judulBerita,
            'isi_berita' => $isiBerita,
            'gambar'=> $photoName,
            'tanggal' => $tanggalUpload
        );

        return $this->db->insert('berita', $data);
    }

    public function getDataById($id){
        
        $this->db->where('id_berita',$id);
        return $this->db->get('berita');
    }

    public function delete_berita($id){
        
        echo "id di model : ".$id;
        $this->db->where('id_berita',$id);
        //nama table yang dipakai untuk dihapus
        return $this->db->delete('berita');
    }

    
    function edit_berita($where,$table){		
        return $this->db->get_where($table,$where);
    }

    public function updateBerita($id, $photoName){
        $tanggalUpload = date("Y-m-d h:i:a");

        $data = array(
            'judul' => $this->input->post('judulBerita'),
            'isi_berita' => $this->input->post('isiBerita'),
            'gambar'=> $photoName,
            'tanggal' => $tanggalUpload
        );

        $where = array(
            'id_berita' => $id
        );

        //$this->M_Informasi->update_data($where,$data,'user');

        $this->db->where($where);
        $this->db->update("berita",$data);
        
	    redirect(base_url('berita/index'));

    }


    public function getBeritaById($id){
        
        $this->db->where('id_berita',$id);
        return $this->db->get('berita');
    }

}
?>