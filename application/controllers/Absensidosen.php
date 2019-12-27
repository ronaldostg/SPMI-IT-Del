<?php
class Absensidosen extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_Absensidosen');
        $this->load->model('M_Dosen');
        $this->load->model('M_Matkul');
    
    }




    

    public function index(){
        $data['alldosen'] = $this->M_Dosen->getNamaDosen()->result();    
        // $data['sop'] = $this->M_Dokumen->getDataByCategory(2)->result();
        $this->load->view('admin/absensi_dosen', $data);
        //$this->load->view('admin/form_absensi2');
    }

    public function list_absensi(){
        $id_dosen = $this->input->get('id_dosen');
        // echo $id;
         $data['matkul'] = $this->M_Matkul->getDataMatkul($id_dosen);
         $data['mkyd'] = $this->M_Matkul->getAllMatkul()->result();    
        $this->load->view('admin/list_absensi',$data);
    }

    public function detail_absensi(){
        $id_dosen =$this->input->get("id_dosen"); 
        $id_matkul =$this->input->get("id_matkul"); 
        //$data['detail_absen'] = $this->M_Absensidosen->getDetailAbsensiDosenDariMatkul($id_matkul, $id_dosen);
        $data['semGenap'] = $this->M_Absensidosen->getAbsensiBySemesterGenap($id_matkul, $id_dosen);
        $data['semGanjil'] = $this->M_Absensidosen->getAbsensiBySemesterGanjil($id_matkul, $id_dosen);
        
        // menampilkan semua data untukpop up
        $data['allAbsensi'] = $this->M_Absensidosen->getAllAbsensi($id_matkul, $id_dosen);


        // hitung absensi semester ganjil
        $data['totalSemGanjil'] = $this->M_Absensidosen->hitungAbsensiSemGanjil($id_matkul, $id_dosen);   
        // hitung absensi semester genap
        // $data['semGanjil'] = $this->M_Absensidosen->getAbsensiBySemesterGanjil($id_matkul, $id_dosen);   
        $data['totalSemGenap'] = $this->M_Absensidosen->hitungAbsensiSemGenap($id_matkul, $id_dosen);


        $data['bulan'] = $this->M_Absensidosen->getDataBulan()->result(); 
        
        
        $this->load->view('admin/detail_absensi', $data);
    }


    public function addAbsensi(){

        $post = $this->input->post(null, TRUE);

        if(isset($post['tambahAbsensi'])){
            
            $id_dosen =$this->input->get("id_dosen"); 
            $id_matkul =$this->input->get("id_matkul"); 
            
            $bulan = $this->input->post("bulan");
            $jumlahAbsensi = $this->input->post("jumlah_absensi");
            $semester = $this->input->post("semester");
            $tahun = $this->input->post("tahun");
            $nama_dosen =$this->input->get('nama_dosen');    
        // echo "bulan ".$bulan."<br>";
        // echo "jumlah absensi ".$jumlahAbsensi."<br>";
        // echo "semester ".$semester."<br>";
        // echo "tahun ".$tahun."<br>";
        // echo "id dosen ".$id_dosen."<br>";
        // echo "id matkul ".$id_matkul."<br>";


        $insert = $this->M_Absensidosen->insertDataAbsensi($id_dosen, $id_matkul, $bulan, $jumlahAbsensi, $semester, $tahun);

        if($insert){	
            echo "<script>
                alert('Absensi berhasil ditambahkan');
                window.location='".base_url("absensidosen/detail_absensi?id_matkul=$id_matkul&id_dosen=$id_dosen&nama_dosen=$nama_dosen")."';
                </script>";
            // echo"<script>alert(Absensi berhasil ditambahkan)</script>";
            // redirect(base_url("absensidosen/detail_absensi?id_matkul=$id_matkul&id_dosen=$id_dosen&nama_dosen=$nama_dosen"));
            // $this->form_validation->set_message('Mesage', 'Tambah Absensi berhasil.');
            
            // $this->load->view('v_upload_sukses');
        }else{
            echo "gagal";
        }

        }
        

    }



    public function deleteAbsensi(){
        $id_dosen = $this->input->get("id_dosen");
        $id_absensi =$this->input->get("id_absensi");
        $nama_dosen =$this->input->get("nama_dosen");
        $id_matkul = $this->input->get("id_matkul");
        


        $delete = $this->M_Absensidosen->delete_absensi($id_absensi);

        if($delete){
            redirect(base_url("absensidosen/detail_absensi?id_matkul=$id_matkul&id_dosen=$id_dosen&nama_dosen=$nama_dosen"));
        }else{
            echo "gagal";

        }

    }

    public function updateJumlahAbsensi(){
        $id_dosen = $this->input->get("id_dosen");
        $id_absensi =$this->input->get("id_absensi");
        $nama_dosen =$this->input->get("nama_dosen");
        $id_matkul = $this->input->get("id_matkul");
        $jumlahAbsensi = $this->input->post("jumlah_absensi");


        $update = $this->M_Absensidosen->update_absensi($id_absensi, $jumlahAbsensi);

        if($update){
            redirect(base_url("absensidosen/detail_absensi?id_matkul=$id_matkul&id_dosen=$id_dosen&nama_dosen=$nama_dosen"));   
        }else{
            // echo "gagal";
            redirect(base_url("absensidosen/detail_absensi?id_matkul=$id_matkul&id_dosen=$id_dosen&nama_dosen=$nama_dosen"));

        }


    }


}

?>