<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	 function __construct()
	{
		 parent::__construct();
		  check_not_login();
		  $this->load->model('Category_m');
	}

	
	public function index()
	{
       $data['row'] = $this->Category_m->get();
	   $this->template->load('Template','Category/category_data',$data);
	}


	 public function add()
	 {
			 $Category = new stdClass(); 
			   $Category->categori_id = null;
				 $Category->name = null;
				  $data = array(
							   'page' => 'add',
							   'row'  =>  $Category
						 );
						  $this->template->load('Template','Category/category_form',$data);
	 }

   public function proses()
	{
		$post =  $this->input->post(null,  TRUE);
		   if (isset($_POST['add'])) {
			     $this->Category_m->add($post);
		   }else if (isset($_POST['edit'])) {
			      $this->Category_m->edit($post);
		   }if ( $this->db->affected_rows() > 0 ) {
			      $this->session->set_flashdata('pesan','data berhasil di simpan!');
		   }
		    redirect('Category');
	}



	public function delete($id)
	{
		     	$this->Category_m->delete($id);
					 $error = $this->db->error();
					 if($error['code'] != 0) {
						$this->session->set_flashdata('error','Data Tidak dapat di hapus (sudah berelasi Atau sedang di gunakan di Tabel lain)!');
					 }
			if ( $this->db->affected_rows() > 0 ) {
			      $this->session->set_flashdata('pesan','data berhasil di hapus!');
		   }
		    redirect('Category');
	}




	public function edit($id)
	{
		$query =    $this->Category_m->get($id);
		if ($query->num_rows() > 0) {
			 $Category = $query->row();
			   $data = array(
							   'page' => 'edit',
							   'row'  =>  $Category
						 );
						 $this->template->load('Template','Category/category_form',$data);
	}
		}

			  

	
}
