<?php
class M_Matkul extends CI_Model{

    public $id_matkul;
    public $kode_matkul;
    public $nama_matkul;

    public function setMataKuliah($id_matkul, $id_dosen){
        $data = array(
            'id_dosen'=>$id_dosen,
            'id_matkul'=> $id_matkul
        
        );
        return $this->db->insert('matkul_yang_diambil', $data);
    }

    public function deleteMataKuliah($id_matkul){
        $this->db->where('id_matkul_yang_diambil',$id_matkul);
        //nama table yang dipakai untuk dihapus
        return $this->db->delete('matkul_yang_diambil');
    }

    public function getDataMatkul($id_dosen){
        $this->db->select('mkyd.id_dosen, mkyd.id_matkul_yang_diambil, mk.id_matkul, mk.nama_matkul');
        $this->db->from('matkul mk');
        $this->db->join('matkul_yang_diambil mkyd ', 'mk.id_matkul = mkyd.id_matkul'); 
        $this->db->where('mkyd.id_dosen',$id_dosen);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllMatkul(){
        return $this->db->get('matkul');
    }

    public function createMataKuliah($kode_matkul,$nama_matkul){
        $data = array(
            'kode_matkul'=>$kode_matkul,
            'nama_matkul'=> $nama_matkul
        
        );
        return $this->db->insert('matkul', $data);
        
    }
    public function updateMataKuliah($id_kuliah,$kode_kuliah,$mata_kuliah){
        $data = array(
            //'id_matkul' => $this->input->post('judulBerita'),
            'kode_matkul' => $kode_kuliah,
            'nama_matkul'=> $mata_kuliah
        );

        $where = array(
            'id_matkul' => $id_kuliah
        );

        //$this->M_Informasi->update_data($where,$data,'user');

        $this->db->where($where);
        $this->db->update("matkul",$data);
        redirect(base_url('matkul/index'));
    }

    public function deleteListMataKuliah($id_matkul){
        $this->db->where('id_matkul',$id_matkul);
        //nama table yang dipakai untuk dihapus
        return $this->db->delete('matkul');
    }

    function data($number,$offset){
		return $query = $this->db->get('matkul',$number,$offset)->result();		
	}
 
	function jumlah_data(){
		return $this->db->get('matkul')->num_rows();
	}
}

?>