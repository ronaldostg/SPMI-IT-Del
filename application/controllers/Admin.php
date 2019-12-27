<?php
class Admin extends CI_Controller{

    

    function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_Absensidosen');
        $this->load->model('M_Dokumen');
    
    }
    public function index()
    {
        $this->load->view('admin/admin');
    }


    

    // public function form_absensi($id)
    // {
    //     $data['absensi_dosen'] = $this->M_Absensidosen->getDataDosenById($id)->result();
    //     // $data['alldosen'] = $this->M_Absensidosen->getDataDosen()->result();    
    //     // $data['sop'] = $this->M_Dokumen->getDataByCategory(2)->result();
    //     $this->load->view('admin/form_absensi', $data);
    
    // }

}

?>