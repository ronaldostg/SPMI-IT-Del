<?php

class M_Dokumen extends CI_Model{


    public $iddokumen;
    public $nama_dokumen;
    public $tanggal_upload;
    public $kategori;


    public function getDataDokumen(){

        //ambil nama tabel
        return $this->db->get('dokumen');
    
    }


    public function getDataByCategory($kategori){
        $this->db->where('kategori',$kategori);
        return $this->db->get('dokumen');
    }
    

    public function getDataById($id_dokumen){

        $this->db->where('iddokumen',$id_dokumen);  
        //nama kolom file 
        return $this->db->get('dokumen');
    }

    public function hapusFile($id_dokumen){ 

        $this->db->where('iddokumen', $id_dokumen);
        //nama table yang dipakai untuk dihapus
        return $this->db->delete('dokumen');

    }


    // public function insertData($nama_dokumen){
    //     $tanggalUpload = date("Y-m-d h:i:a");
    //     $data = array(
    //         'iddokumen'=>'',
    //         'nama_dokumen' => $nama_dokumen,
    //         'tanggal_upload' => $tanggalUpload,
    //         'kategori'=> 3,
    //     );

    //     return $this->db->insert('dokumen', $data);
    // }
    

    public function addDokumen($nama_dokumen, $kategori){
        $tanggalUpload = date("Y-m-d h:i:a");
        $data = array(
            'iddokumen'=>'',
            'nama_dokumen' => $nama_dokumen,
            'tanggal_upload' => $tanggalUpload,
            'kategori'=> $kategori,
        );

        return $this->db->insert('dokumen', $data);
    }
    




}

?>