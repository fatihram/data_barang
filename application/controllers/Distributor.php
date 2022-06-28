<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class Distributor extends CI_controller
{
    function __construct()
    {
       parent::__construct();
			 check_not_login();
       $this->load->model('Distributor_m');
    }

    public function index()
    {
         $data['row'] = $this->Distributor_m->get();
          $this->template->load('Template','distributor/distributor_data', $data);
    }

    public function add()
    {  
         $Distributor = new stdclass();
          $Distributor->distributor_id = null;
           $Distributor->name = null;
            $Distributor->phone = null;
             $Distributor->address = null;
               $Distributor->description = null;
                   $Distributor->image = null;

              $data = array( 
                           'page' => 'add',
                           'row' =>   $Distributor,
                          );
        $this->template->load('Template','distributor/distributor_form', $data);
    }

   

    public function delete($id)
	{
			$distributor =  $this->Distributor_m->get($id)->row();
			  if ($distributor->image != null) {
				   $target_file = './image/distributor/'.$distributor->image;
				    unlink( $target_file );
			  }

	   $this->Distributor_m->delete($id);
		 $error = $this->db->error();
		 if($error['code'] != 0) {
			$this->session->set_flashdata('error','Data Tidak dapat di hapus (sudah berelasi Atau sedang di gunakan di Tabel lain)!');
		 }
	   if ($this->db->affected_rows() > 0 ) {
		    $this->session->set_flashdata('pesan','data berhasil di Hapus!');
	   }
	  redirect('distributor');
   }
   

    public function edit($id)
			{
				$query = $this->Distributor_m->get($id);
				if ($query->num_rows() > 0) {
					  $Distributor = $query->row();
					  $data = array(
						'page' => 'edit',
						'row' => $Distributor,
					);
					    $this->template->load('Template', 'distributor/distributor_form',$data);
				}else {
						$this->session->set_flashdata('pesan', 'data tidak di temukan!');
						 redirect('Distributor');
				}
         }
         




         public function proses()
	{

		              $config['upload_path']          = './image/distributor/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
					     $config['max_size']             = 2048;
					    $config['file_name']            = 'distributor-'.date('ymd').'-'.substr(md5(rand()),0,10);
					$this->load->library('upload', $config);
					
		  $post = $this->input->post(null, TRUE);
		     if (isset($_POST['add'])) {

			     	if (@$_FILES['image']['name']) {
					 if ($this->upload->do_upload('image'))
                {
				     $post['image'] = $this->upload->data('file_name');
					 $this->Distributor_m->add($post);
						if ($this->db->affected_rows() > 0) {
			              $this->session->set_flashdata('pesan','data berhasil di simpan!');
	                            }
	                          redirect('Distributor');
                }else {
					 $error = $this->upload->display_errors();
                        if ($this->db->affected_rows() > 0) {
			              $this->session->set_flashdata('error',$error);
	                            }
	                          redirect('Distributor');
				}
					 
				}else {
				   $post['image'] = null;
					 $this->Distributor_m->add($post);
						if ($this->db->affected_rows() > 0) {
			              $this->session->set_flashdata('pesan','data berhasil di simpan!');
	                            }
	                          redirect('Distributor');
				}
			    
			 }elseif (isset($_POST['edit'])) {

				if (@$_FILES['image']['name']) {
					 if ($this->upload->do_upload('image'))
                    {
						  $distributor = $this->Distributor_m->get($post['id'])->row();
						  if ($distributor->image != null) {
							   $target_file = './image/distributor/'.$distributor->image;
							   unlink($target_file);
						  }
						  
				     $post['image'] = $this->upload->data('file_name');
					  $this->Distributor_m->edit($post);
						if ($this->db->affected_rows() > 0) {
			              $this->session->set_flashdata('pesan','data berhasil di simpan!');
	                            }
	                          redirect('Distributor');
                }else {
					 $error = $this->upload->display_errors();
                        if ($this->db->affected_rows() > 0) {
			              $this->session->set_flashdata('error',$error);
	                            }
	                          redirect('Distributor');
				}
					 
				}else {
				   $post['image'] = null;
					  $this->Distributor_m->edit($post);
						if ($this->db->affected_rows() > 0) {
			              $this->session->set_flashdata('pesan','data berhasil di simpan!');
	                            }
	                          redirect('Distributor');
				}
				 
			 }
	}

	
}





?>