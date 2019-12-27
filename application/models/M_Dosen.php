<?php

class M_Dosen extends CI_Model{
    public $id_dosen;
    public $nip;
    public $nama_dosen;

    public function insertDataDosen($namaDosen,$nip){
        $data = array(
            'id_dosen'=>'',
            'nip'=> $nip,
            'nama_dosen '=>$namaDosen
        );

        return $this->db->insert('dosen', $data);
    }

    public function edit_dosen($id_dosen, $nip,$nama_dosen){

        $data = array(
            'nip'=>$nip,
            'nama_dosen'=>$nama_dosen
        );
        $where = array(
            'id_dosen' => $id_dosen
        );

        $this->db->where($where);
        $this->db->update("dosen",$data);
        
        redirect(base_url('absensidosen/index'));

    }

    public function delete_dosen($id_dosen){
        $this->db->where('id_dosen',$id_dosen);
        //nama table yang dipakai untuk dihapus
        return $this->db->delete('dosen');
    }

    public function getNamaDosen(){

        //ambil nama tabel
        return $this->db->get('dosen');
    
    }

}
?>