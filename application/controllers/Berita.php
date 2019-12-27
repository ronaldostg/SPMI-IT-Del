<?php
defined('BASEPATH') OR exit('No direct script acccess allowed');
?>

<?php
class Berita extends CI_Controller{


    function __construct(){
		    parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_Berita');
    }

    public function index(){


      $data['info'] = $this->M_Berita->getAllDataBerita()->result();

      $this->load->view('admin/berita', $data);    
      //$data['error'] = ''; 
    }

    // public function update(){
    //   $id = $this->input->post('id');
    //   $nama = $this->input->post('nama');
    //   $alamat = $this->input->post('alamat');
    //   $pekerjaan = $this->input->post('pekerjaan');
     
    //   $data = array(
    //     'nama' => $nama,
    //     'alamat' => $alamat,
    //     'pekerjaan' => $pekerjaan
    //   );
     
    //   $where = array(
    //     'id' => $id
    //   );
     
    //   $this->m_data->update_data($where,$data,'user');
    //   redirect('crud/index');
    // }


    public function addBerita(){


      $tglCreate = date('d_m_Y');
      $config['upload_path']          = './foto_berita/';
      $config['allowed_types']        = 'png|jpg|jpeg';
      $config['file_name']           = 'IMG-'.$tglCreate;
		  //max_size dihitung berdasarkan kilobyte
      $config['max_size']             = 20048;
      // $config['max_width']            = 1024;
      // $config['max_height']           = 768;
       $this->load->library('upload', $config);

       if(!$this->upload->do_upload('uploadGambar')){

          $error = array('error' => $this->upload->display_errors());
          $this->load->view('v_upload_sukses', $error);
       }else{

         $upload_data = $this->upload->data();
         $namaFoto = $upload_data['file_name'];
         
       }
       $insert = $this->M_Berita->insertBerita($namaFoto);
         
       if($insert){
          redirect(base_url('berita/index'));
				  // $this->load->view('v_upload_sukses');
			}else{
			  	echo "gagal";
      } 
      
    }


    // public function editBerita(){
    //   $this->load->view()
    // }

    public function deleteBerita($id){


      $data = $this->M_Berita->getDataById($id)->row();
      $nama = './foto_berita/'.$data->gambar;

      if(is_readable($nama)&&	unlink($nama)){
        //hapus data dari database 
        $delete = $this->M_Berita->delete_berita($id);
        redirect(base_url('berita/index'));
      }else{
        echo "gagal";
      }
    }

    public function queryDetail($id){
      $query = $this->db->get_where('', array('slug' => $id))->row();
      return $query;
    } 

    
    
    // public function editBerita($id){
    //   $where = array('id_berita' => $id);
    //   $data['detail'] = $this->M_Berita->edit_berita($where,'berita')->result();
    //   //$data['id_informasi'] = $id;
	  //   $this->load->view('informasi/informasi_detail',$data);
    // }  

    public function updateBerita(){
      $id_berita = $this->input->get('id_berita');
      $judulBerita = $this->input->post('judulBerita');
      $isiBerita = $this->input->post('isiBerita');
      // echo "<br>id berita".$id_berita;
      // echo "<br>judul berita".$judulBerita;
      // echo "<br>isi berita".$isiBerita;
      $tglCreate = date('d_m_Y');
      $config['upload_path']          = './foto_berita/';
      $config['allowed_types']        = 'png|jpg|jpeg';
      $config['file_name']           = 'IMG-'.$tglCreate;
		  //max_size dihitung berdasarkan kilobyte
      $config['max_size']             = 20048;
      // $config['max_width']            = 1024;
      // $config['max_height']           = 768;
       $this->load->library('upload', $config);

       if(!$this->upload->do_upload('uploadGambar')){

          $error = array('error' => $this->upload->display_errors());
          $this->load->view('v_upload_sukses', $error);
       }else{

         $upload_data = $this->upload->data();
         $namaFoto = $upload_data['file_name'];
         
       }
       $update = $this->M_Berita->updateBerita($id_berita,$namaFoto);
         
       if($update){
          redirect(base_url());
				  // $this->load->view('v_upload_sukses');
			}else{
			  	echo "gagal";
      }
    }

    public function getDataBerita(){
      $sql = "SELECT * FROM `berita` ORDER BY id_berita DESC LIMIT 3";
      $query = $this->db->query($sql);
      return $query->result();
  }
    

}


?>