<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gudang extends CI_Controller {

	    function __construct()
	   {
		  parent::__construct();
			check_not_login();
		  $this->load->model('Gudang_m');
	   }


	public function index()
	{
		 $data['row'] =  $this->Gudang_m->get();
	   $this->template->load('Template','gudang/gudang_data', $data);
	}






	public function add()
	{
		 $Gudang =  new stdClass();
		   $Gudang->gudang_id = null;
			 $Gudang->name = null;
			 	 $Gudang->kode_gudang = null;
			   $data = array(
							 'page' => 'add',
							 'row'  => $Gudang,
				  );
				    $this->template->load('Template','gudang/gudang_form', $data);
	}



	public function proses()
	{
		$post =  $this->input->post(null,  TRUE);
		   if (isset($_POST['add'])) {
			     $this->Gudang_m->add($post);
		   }else if (isset($_POST['edit'])) {
			      $this->Gudang_m->edit($post);
		   }if ( $this->db->affected_rows() > 0 ) {
			      $this->session->set_flashdata('pesan','data berhasil di simpan');
		   }
		    redirect('Gudang');
	}



	    public function delete($id)
		{
			   $this->Gudang_m->delete($id);
				 $error = $this->db->error();
				 if($error['code'] != 0) {
					$this->session->set_flashdata('error','Data Tidak dapat di hapus (sudah berelasi Atau sedang di gunakan di Tabel lain)!');
				 }
			   if ( $this->db->affected_rows() > 0 ) {
			      $this->session->set_flashdata('pesan','data berhasil di hapus');
		   }
		    redirect('Gudang');

		}



	public function edit($id)
			{
				$query = $this->Gudang_m->get($id);
				if ($query->num_rows() > 0) {
					  $Gudang = $query->row();
					  $data = array(
						'page' => 'edit',
						'row' => $Gudang,
					);
					    $this->template->load('Template', 'gudang/gudang_form',$data);
				}else {
						$this->session->set_flashdata('pesan', 'data tidak di temukan!');
						 redirect('Gudang');
				}
			}


}

