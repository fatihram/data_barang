<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    

    function __construct()
    {
         parent::__construct();
          check_not_login();
          $this->load->model('User_m');
          $this->load->library('form_validation');

    }

	public function index()
	{
        
        $data['row'] = $this->User_m->get();
		$this->template->load('Template','user/user_data', $data);
    }


    public function delete($id)
    {
         $this->User_m->delete($id);
          if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan','data berhasil di hapus');
          }
    redirect('User');
    }
    

    public function add()
    {
           $this->form_validation->set_rules('username', 'username', 'required|min_length[6]|is_unique[user.username]');
           $this->form_validation->set_rules('name', 'name', 'required');
             $this->form_validation->set_rules('password', 'password', 'required|min_length[5]');
             $this->form_validation->set_rules('passconf', 'konfirmasi password', 'required|matches[password]', array('matches'=> '{field}, tidak sesuai dengan password'));
             $this->form_validation->set_rules('level', 'level', 'required');
             $this->form_validation->set_rules('address', 'address', 'required');


            $this->form_validation->set_message('required', '{field}  masih kosong , silakan di isi dulu?');
            $this->form_validation->set_message('min_length', '{field}  minimal panjang 5 karakter?');
            $this->form_validation->set_message('is_unique', '{field} sudah digunakan silakan ganti yg lain?');

               $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');


             if ($this->form_validation->run() == FALSE)
                {
                    $this->template->load('Template','user/user_form_add');
                }
                else
                {
                       $post =  $this->input->post(null,true);
                          $this->User_m->add($post);
                          if ($this->db->affected_rows() > 0) {
                               $this->session->set_flashdata('pesan','data berhasil di simpan');
                          }
                          redirect('User');

                }
    }



     public function edit($id)
    {
          
          
           $this->form_validation->set_rules('username', 'username', 'required|min_length[6]|callback_username_check');
            $this->form_validation->set_rules('name', 'name', 'required');

          if ($this->input->post('password')) {
           $this->form_validation->set_rules('password', 'password', 'required|min_length[6]');
           $this->form_validation->set_rules('passconf', 'password konfirmasi', 'required|matches[password]'
           ,array('matches' => '{field} ,tidak sesuai dengan password?'));
            }


               if ($this->input->post('passconf')) {
           $this->form_validation->set_rules('passconf', 'password konfirmasi', 'required|matches[password]'
           ,array('matches' => '{field} ,tidak sesuai dengan password?'));
            }

             $this->form_validation->set_rules('level', 'level', 'required');
             $this->form_validation->set_rules('address', 'address', 'required');
           


            $this->form_validation->set_message('required', '{field}  masih kosong , silakan di isi dulu?');
            $this->form_validation->set_message('min_length', '{field}  minimal panjang 6 karakter?');
            $this->form_validation->set_message('is_unique', '{field} sudah digunakan silakan ganti yg lain?');

               $this->form_validation->set_error_delimiters('<span class="help-block">','</span>');


             if ($this->form_validation->run() == FALSE)
                {
                   $query =  $this->User_m->get($id);
                         if ($query->num_rows() > 0) {
                              $data['row'] = $query->row();
                             $this->template->load('Template','user/user_form_edit',$data);
                         }else {
                                echo"<script>
                                   alert('data tidak ditemukan');
                                window.location='".site_url('User')."';
                               </script>";
                         }
                        
                   
                }
                else
                {
                       $post =  $this->input->post(null,true);
                          $this->User_m->edit($post);
                          if ($this->db->affected_rows() > 0) {
                              $this->session->set_flashdata('pesan','data berhasil di edit');
                          }
                         redirect('User');
                }
    }

 function username_check() {
	  	$post =  $this->input->post(null, TRUE);
	  	$query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
	  	if($query->num_rows() > 0) {
                      $this->form_validation->set_message('username_check', '{field} ini sudah dipakai,ganti yg lain');
	  		 return FALSE;
	  	}else{
	  		return TRUE;
	  	}
	  	
	  }


}
