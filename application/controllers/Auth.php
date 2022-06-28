<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function login()
	{
	       check_already_login();
		   $this->load->view('login');
    }
    

    public function proses()
    {
          $post =  $this->input->post(null, TRUE);
          if (isset($_POST['login'])) {
                 $this->load->model('User_m');
                   $query = $this->User_m->login($post);
                   if ($query->num_rows() > 0 ) {
                      $row = $query->row();
                      $params = array(
                                        'user_id' => $row->user_id,
                                         'level'  => $row->level,
                                     );
                                      $this->session->set_userdata($params);
                                      echo"
                                           <script>
                                              alert('SELAMAT LOGIN BERHASIL!');
                                              window.location='".site_url('Dashboard')."';
                                           </script>
                                          ";
                   }else {
                     $this->session->set_flashdata('error','maaf username dan password anda salah??');
                     redirect('Auth/login');
                   }

          }
    }




    public function logout()
    {
       $keluar = array('user_id','level');
         $this->session->unset_userdata($keluar);
          redirect('Home');
    }
}