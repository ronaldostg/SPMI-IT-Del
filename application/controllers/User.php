<?php
class User extends CI_Controller{

    public function index()
	{
		$this->load->view('user/login');
  	}

  	public function process()
    {
        $post = $this->input->post(null, TRUE);
        if(isset($post['login']))
        {
           $this->load->model('M_User'); //diload dulu
           $query = $this->M_User->login($post); // user punya function login dengan parameter $post

           if($query->num_rows() > 0)
           {
               $row = $query->row();

               //echo $row->username;
               $params = array(
                    'id_user' => $row->id_user,
                    'username'=>$row->username,
                    'nama' => $row->nama
               );
               $this->session->set_userdata($params);
               echo "<script>
               alert('Login berhasil');
               window.location='".site_url('admin/index')."';
               </script>";
           } else {
                echo "<script>
                alert('Login gagal, username atau password salah');
                window.location='".site_url('user/index')."';
                </script>";
           }
        }
    }

  public  function logout(){
    $this->session->sess_destroy();
    redirect(base_url('user/index'));
  }

}


?>