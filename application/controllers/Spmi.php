<?php
class Spmi extends CI_Controller{
   
    function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_Spmi');
        $this->load->model('M_Berita');

    }



    public function index(){
        $data['berita'] = $this->M_Berita->getDataBerita();
        $this->load->view('frontend/index', $data);
    }

    public function visimisi(){
    	$data['berita'] = $this->M_Berita->getDataBerita();
        $this->load->view('frontend/visimisi',$data);
    }

    public function struktur_organisasi(){
    	// echo "Struktur organisasi";
        $data['berita'] = $this->M_Berita->getDataBerita();
        $this->load->view('frontend/struktur_organisasi',$data);
    }

    public function kegiatan(){
    	// echo "kegiatan";
        $data['berita'] = $this->M_Berita->getDataBerita();
        $this->load->view('frontend/kegiatan',$data);
    }

    public function skrektor(){
    	// echo "sk rektor";
        $data['berita'] = $this->M_Berita->getDataBerita();
        $data['skrektor'] = $this->M_Dokumen->getDataByCategory(3)->result();
        $this->load->view('frontend/skrektor',$data);
    }

    public function akreditasi(){
    	$data['berita'] = $this->M_Berita->getDataBerita();
        
        $this->load->view('frontend/akreditasi',$data);
    }

    public function galeri(){
        // echo "akreditasi";
        // $data['berita'] = $this->M_Spmi->getDataBerita();
        $this->load->view('frontend/galeri');
    }


    // public function dokumen(){
    // 	echo "dokumen";
    //     // $data['berita'] = $this->M_Spmi->getDataBerita();
    //     // $this->load->view('frontend/index', $data);
    // }

    
    
    public function berita_detail(){
        $data['berita'] = $this->M_Berita->getDataBerita();
        $id_berita = $this->input->get("id_berita");
        // echo $id_berita;
        $data['detailBerita'] = $this->M_Berita->getBeritaById($id_berita)->result();
        $this->load->view('frontend/berita',$data);
    	// $id_berita = $this->input->get('id_berita');
    	// echo $id_berita;
    }
    


    public function sop(){
    	// echo "sk rektor";
        $data['berita'] = $this->M_Berita->getDataBerita();
        $data['sop'] = $this->M_Dokumen->getDataByCategory(2)->result();
        $this->load->view('frontend/sop',$data);
    }
}

?>