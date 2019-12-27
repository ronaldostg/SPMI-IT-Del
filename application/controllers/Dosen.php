<?php
class Dosen extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        // $this->load->model('M_Absensidosen');
        $this->load->model('M_Dosen');
    
    }
 
    public function addDosen(){
        $namaDosen  = $this->input->post('nama_dosen');
        $nip = $this->input->post('nip');

        // $insert =
        $insert = $this->M_Dosen->insertDataDosen($namaDosen,$nip);
        
        if($insert){	
            redirect(base_url("absensidosen/index"));
            // $this->load->view('v_upload_sukses');
        }else{
            echo "gagal";
        }
    }

    public function editDataDosen(){
        $id_dosen = $this->input->get('id_dosen');
        $nip = $this->input->post('nip');
        $nama_dosen = $this->input->post('nama_dosen');
        echo $id_dosen."<br>";
        echo $nip."<br>";
        echo $nama_dosen."<br>";

        $update = $this->M_Dosen->edit_dosen($id_dosen, $nip,$nama_dosen);
        // edit_dosen($id_dosen, $nip,$nama_dosen);

        if($update){
            redirect(base_url("absensidosen/index"));
        }else{
            echo "gagal";

        }
    }

    public function deleteDataDosen(){
        $id_dosen = $this->input->get('id_dosen');
        // echo $id_dosen;
        $delete = $this->M_Dosen->delete_dosen($id_dosen);

        if($delete){
            redirect(base_url("absensidosen/index"));
        }else{
            echo "gagal";

        }

    }


}

?>