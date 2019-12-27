<?php
class M_Absensidosen extends CI_Model{

    public $id_absensi_dosen;
    public $jumlah_absensi_per_bulan;
    public $bulan;
    public $semester;
    public $tahun;
    public $mata_kuliah;
    public $nama_dosen;


    public function getDetailAbsenDosen($id_dosen){

        //ambil nama tabel
        $this->db->where('id_dosen',$id_dosen);
        return $this->db->get('absensi');
    
    }

    // public function insertDataDosen($namaDosen,$nip){
    //     $data = array(
    //         'id_dosen'=>'',
    //         'nip'=> $nip,
    //         'nama_dosen '=>$namaDosen
    //     );

    //     return $this->db->insert('dosen', $data);
    // }

   

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

    // public function getNamaDosen(){

    //     //ambil nama tabel
    //     return $this->db->get('dosen');
    
    // }

    


    // public function getDataDosenById($id){

    //     $this->db->where('iddokumen',$id);  
    //     //nama kolom file 
    //     return $this->db->get('dokumen');
    // }

    // public function getDataDosenById($id){
        
    //     $this->db->where('id_dosen',$id);
    //     return $this->db->get('dosen');
    // }

    // public function setMataKuliah($id_matkul, $id_dosen){
    //     $data = array(
    //         'id_dosen'=>$id_dosen,
    //         'id_matkul'=> $id_matkul
        
    //     );
    //     return $this->db->insert('matkul_yang_diambil', $data);
    // }

    public function getDataBulan(){

        //ambil nama tabel
        return $this->db->get('bulan');
    
    }

    public function insertDataAbsensi($id_dosen, $id_matkul, $bulan, $jumlahAbsensi, $semester, $tahun){
            $data = array(
                'jumlah_absen_per_bulan'=>$jumlahAbsensi,
                'semester'=>$semester,
                'tahun'=>$tahun,
                'id_dosen'=>$id_dosen,
                'id_matkul'=>$id_matkul,
                'id_bulan'=>$bulan
            );
            //echo "<script>window.alert('absensi berhasil ditambahkan')</script>";
            return $this->db->insert('absensi_dosen', $data);
        
    }

// menampilkan absensi semester ganjil
    public function getAbsensiBySemesterGanjil($id_matkul, $id_dosen){
        // $semesterGanjil = $this->db->query("SELECT * FROM absensi_dosen where id_dosen = $id_dosen AND semester = 1");
        $tahun = date('Y');
        $sql = "
        SELECT ad.id_absensi_dosen, bln.bulan, ad.jumlah_absen_per_bulan AS total_absen, ad.semester ,ad.tahun, mk.kode_matkul, mk.nama_matkul,ad.id_bulan
        FROM absensi_dosen ad
        JOIN matkul mk
        ON ad.id_matkul = mk.id_matkul
        JOIN bulan bln
        ON bln.id_bulan = ad.id_bulan
        WHERE ad.id_dosen = $id_dosen AND ad.id_matkul = $id_matkul AND bln.semester = 1 AND ad.tahun = $tahun
        ORDER BY ad.id_bulan ASC";
        $query = $this->db->query($sql);

        return $query->result();
    }

    public function hitungAbsensiSemGanjil($id_matkul, $id_dosen){
        $tahun = date('Y');

        $sql = "SELECT ad.id_dosen , SUM(ad.jumlah_absen_per_bulan) AS total_absen, ad.semester ,ad.tahun, mk.kode_matkul, mk.nama_matkul,ad.id_bulan
        FROM absensi_dosen ad
        JOIN matkul mk
        ON ad.id_matkul = mk.id_matkul
        JOIN bulan bln
        ON bln.id_bulan = ad.id_bulan
        WHERE ad.id_dosen = $id_dosen AND ad.id_matkul = $id_matkul AND bln.semester = 1 AND tahun = $tahun";

        $query = $this->db->query($sql);
        return $query->result();
        
    }

    public function hitungAbsensiSemGenap($id_matkul, $id_dosen){
        $tahun = date('Y');

        $sql = "SELECT ad.id_dosen , SUM(ad.jumlah_absen_per_bulan) AS total_absen, ad.semester ,ad.tahun, mk.kode_matkul, mk.nama_matkul,ad.id_bulan
        FROM absensi_dosen ad
        JOIN matkul mk
        ON ad.id_matkul = mk.id_matkul
        JOIN bulan bln
        ON bln.id_bulan = ad.id_bulan
        WHERE ad.id_dosen = $id_dosen AND ad.id_matkul = $id_matkul AND bln.semester = 2 AND tahun = $tahun";

        $query = $this->db->query($sql);
        return $query->result();
        
    }


// menampilkan absensi semester genap
    public function getAbsensiBySemesterGenap($id_matkul, $id_dosen){
         $tahun = date('Y');
        $sql = "
        SELECT ad.id_absensi_dosen, bln.bulan, ad.jumlah_absen_per_bulan AS total_absen, ad.semester ,ad.tahun, mk.kode_matkul, mk.nama_matkul,ad.id_bulan
        FROM absensi_dosen ad
        JOIN matkul mk
        ON ad.id_matkul = mk.id_matkul
        JOIN bulan bln
        ON bln.id_bulan = ad.id_bulan
        WHERE ad.id_dosen = $id_dosen AND ad.id_matkul = $id_matkul AND bln.semester = 2 AND tahun = $tahun
        ORDER BY ad.id_bulan ASC";
        $query = $this->db->query($sql);

        return $query->result();  
    }


    public function getDetailAbsensiDosenDariMatkul($id_matkul, $id_dosen){
        $sql = "
        SELECT ad.id_absensi_dosen, bln.bulan, ad.jumlah_absen_per_bulan AS total_absen, ad.semester ,ad.tahun, mk.kode_matkul, mk.nama_matkul,ad.id_bulan
        FROM absensi_dosen ad
        JOIN matkul mk
        ON ad.id_matkul = mk.id_matkul
        JOIN bulan bln
        ON bln.id_bulan = ad.id_bulan
        WHERE ad.id_dosen = $id_dosen AND ad.id_matkul = $id_matkul AND bln.semester = 2";
        $query = $this->db->query($sql);

        return $query->result();
    }




    // menampilkan semua absensi 
    public function getAllAbsensi($id_matkul, $id_dosen){
        $sql = "
        SELECT ad.id_absensi_dosen, bln.bulan, ad.jumlah_absen_per_bulan AS total_absen, ad.semester ,ad.tahun, mk.kode_matkul, mk.nama_matkul,ad.id_bulan
        FROM absensi_dosen ad
        JOIN matkul mk
        ON ad.id_matkul = mk.id_matkul
        JOIN bulan bln
        ON bln.id_bulan = ad.id_bulan
        WHERE ad.id_dosen = $id_dosen AND ad.id_matkul = $id_matkul";
        $query = $this->db->query($sql);

        return $query->result();
    }

    // public function edit_dosen($id_dosen, $nip,$nama_dosen){

    //     $data = array(
    //         'nip'=>$nip,
    //         'nama_dosen'=>$nama_dosen
    //     );
    //     $where = array(
    //         'id_dosen' => $id_dosen
    //     );

    //     $this->db->where($where);
    //     $this->db->update("dosen",$data);
        
    //     redirect(base_url('absensidosen/index'));

    // }

    // public function delete_dosen($id_dosen){
    //     $this->db->where('id_dosen',$id_dosen);
    //     //nama table yang dipakai untuk dihapus
    //     return $this->db->delete('dosen');
    // }

    // public function deleteMataKuliah($id_matkul){
    //     $this->db->where('id_matkul_yang_diambil',$id_matkul);
    //     //nama table yang dipakai untuk dihapus
    //     return $this->db->delete('matkul_yang_diambil');
    // }

    public function delete_absensi($id_absensi){
        $this->db->where('id_absensi_dosen',$id_absensi);
        //nama table yang dipakai untuk dihapus
        return $this->db->delete('absensi_dosen');
    }

    public function update_absensi($id_absensi, $jumlahAbsensi){
        $id_dosen = $this->input->get("id_dosen");
        $nama_dosen =$this->input->get("nama_dosen");
        $id_matkul = $this->input->get("id_matkul");
        
        $data = array(
            'jumlah_absen_per_bulan'=>$jumlahAbsensi
        );
        $where = array(
            'id_absensi_dosen' => $id_absensi
        );

        $this->db->where($where);
        $this->db->update("absensi_dosen",$data);
        
        // redirect(base_url("absensidosen/detail_absensi?id_matkul=$id_matkul&id_dosen=$id_dosen&nama_dosen=$nama_dosen"));

    }


}
?>