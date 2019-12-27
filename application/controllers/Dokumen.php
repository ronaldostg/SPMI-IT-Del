<?php
class Dokumen extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_Dokumen'); 
    }

    public function addDokumenSOP(){
        
        $kategori = 2;
        $tglUpload = date('d_m_Y');
		$namaFileBaru = $this->input->post('judul');

		$config['upload_path']          = './SOP/';
		$config['allowed_types']        = 'pdf|docx';
		//max_size dihitung berdasarkan kilobyte
		$config['max_size']             = 10048;
        $config['file_name'] 			= $namaFileBaru."-".$tglUpload;	
        
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('dokSop')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('sop/sop', $error);
		}else{
            $upload_data = $this->upload->data();
			$namaDokumen = $upload_data['file_name'];
        }
        // echo "nama dokumen".$namaDokumen;
        $insert = $this->M_Dokumen->addDokumen($namaDokumen, $kategori);

        if($insert){
            redirect(base_url('/dokumen/sop'));
            // echo "alert(SOP berhasil ditambahkan)";
        }else{
            echo "gagal";
        } 
        
    }

    public function addDokumenSKRektor(){
        $kategori = 3;
        $tglUpload = date('d_m_Y');
		$namaFileBaru = $this->input->post('judul');
        echo $namaFileBaru;
		$config['upload_path']          = './SKRektor/';
		$config['allowed_types']        = 'pdf|docx';
		//max_size dihitung berdasarkan kilobyte
		$config['max_size']             = 10048;
        $config['file_name'] 			= $namaFileBaru."-".$tglUpload;	
        
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('dokSkrektor')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('sop/sop', $error);
		}else{
            $upload_data = $this->upload->data();
			//$data = array('upload_data' => $this->upload->data());
			//nama yang kita upload
			$namaDokumen = $upload_data['file_name'];
        }
        
        echo "nama dokumen".$namaDokumen;
        $insert = $this->M_Dokumen->addDokumen($namaDokumen, $kategori);

        if($insert){
            redirect(base_url('/dokumen/skrektor'));
            echo "<script>alert(SOP berhasil ditambahkan)</script>";
        }else{
            echo "gagal";
        } 
        
    }

    public function sop(){
        $data['sop'] = $this->M_Dokumen->getDataByCategory(2)->result();
        $this->load->view('admin/sop',$data);
    }

    public function skrektor(){
        $data['skrektor'] = $this->M_Dokumen->getDataByCategory(3)->result();
        $this->load->view('admin/sk_rektor',$data);
    }

    public function hapusSOP($id_dokumen){
		
		$this->load->model('M_Dokumen');
		//mengambil data hanya satu baris
		$data = $this->M_Dokumen->getDataById($id_dokumen)->row();
		//membaca dan mengambil nama folder dari tabel di database 
		$nama = './SOP/'.$data->nama_dokumen;

		//utk memastikan membaca file  dan unlink untuk menghapus file
		if(is_readable($nama)&&	unlink($nama)){
			//hapus data dari database 
			$delete = $this->M_Dokumen->hapusFile($id_dokumen);
			redirect(base_url("/dokumen/sop"));
		}else{
			echo "gagal";
		}

		
    }
    
    public function hapusSKRektor($id_dokumen){
		$this->load->model('M_Dokumen');
		//mengambil data hanya satu baris
		$data = $this->M_Dokumen->getDataById($id_dokumen)->row();
		//membaca dan mengambil nama folder dari tabel di database 
		$nama = './SKRektor/'.$data->nama_dokumen;

		//utk memastikan membaca file  dan unlink untuk menghapus file
		if(is_readable($nama)&&	unlink($nama)){
			//hapus data dari database 
			$delete = $this->M_Dokumen->hapusFile($id_dokumen);
			redirect(base_url("/dokumen/skrektor"));
		}else{
			echo "gagal";
		}

		
	}

}

?>