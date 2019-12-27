<?php

class Matkul extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        // $this->load->model('M_Absensidosen');
        $this->load->model('M_Matkul');
    
    }

    public function setMataKuliah(){
        $id_dosen =$this->input->get("id_dosen");
        $nama_dosen =$this->input->get("nama_dosen");
         
        
        // $id_dosen =$this->input->get("id_dosen"); 
        $mata_kuliah = $this->input->post("matkul");
        // echo $matkul."<br>";
        // echo $id_dosen;
        $insert = $this->M_Matkul->setMataKuliah($mata_kuliah, $id_dosen);

        if($insert){	
            redirect(base_url("absensidosen/list_absensi?id_dosen=$id_dosen&nama_dosen=$nama_dosen"));
            // $this->load->view('v_upload_sukses');
        }else{
            echo "gagal";
        }
    }

    public function deleteDataMatkul(){
        $id_matkul = $this->input->get('id_matkul');
        $id_dosen = $this->input->get('id_dosen');
        $nama_dosen = $this->input->get('nama_dosen');
        echo "id matkul".$id_matkul."<br>";
        echo "id dosen".$id_dosen."<br>";
        echo "nama dosen".$nama_dosen."<br>";
        
        $delete = $this->M_Matkul->deleteMataKuliah($id_matkul);

        if($delete){
            redirect(base_url("absensidosen/list_absensi?id_dosen=$id_dosen&nama_dosen=$nama_dosen"));
        }else{
            echo "gagal";

        }
    }


    public function addListMataKuliah(){
        $kode_kuliah =$this->input->post("kodeKuliah");
        $mata_kuliah = $this->input->post("mataKuliah");
        echo "kode kuliah".$kode_kuliah;
        echo "<br>mata kuliah".$mata_kuliah;

        $insert = $this->M_Matkul->createMataKuliah($kode_kuliah,$mata_kuliah);
         
       if($insert){
          redirect(base_url('matkul/index'));
				  // $this->load->view('v_upload_sukses');
			}else{
			  	echo "gagal";
      } 


        // $kode_kuliah;
    }

    public function editListMataKuliah(){
        $id_kuliah = $this->input->get("id_kuliah");
        
        $kode_kuliah =$this->input->post("kodeKuliah");
        $mata_kuliah = $this->input->post("mataKuliah");
        echo 'id matkul'.$id_kuliah;
        echo "kode kuliah".$kode_kuliah;
        echo "<br>mata kuliah".$mata_kuliah;

        $edit=$this->M_Matkul->updateMataKuliah($id_kuliah,$kode_kuliah,$mata_kuliah);
        if($edit){
            redirect(base_url('matkul/index'));
	    }else{
			echo "gagal";
        } 
    }


    public function deleteListMataKuliah(){
       $id_kuliah = $this->input->get("id_kuliah");
        echo $id_kuliah;
        $delete=$this->M_Matkul->deleteListMataKuliah($id_kuliah);

        if($delete){
            redirect(base_url('matkul/index'));
	    }else{
			echo "gagal";
        } 
    }


    public function index(){
        $this->load->database();
		$jumlah_data = $this->M_Matkul->jumlah_data();
		$this->load->library('pagination');
		$config['base_url'] = base_url().'/matkul/index';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);		
		$data['matkul'] = $this->M_Matkul->data($config['per_page'],$from);
		//$this->load->view('v_data',$data);



        //$data['matkul'] = $this->M_Matkul->getAllMatkul()->result();
        $this->load->view('admin/list_matakuliah',$data);

    }


}
?>