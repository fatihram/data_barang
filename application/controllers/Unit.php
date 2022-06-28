<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Unit extends CI_controller
{

    function __construct()
    {
           parent::__construct();
           check_not_login();
           $this->load->model('Unit_m');
    }

    public function index()
    {
         $data['row'] = $this->Unit_m->get();
        $this->template->load('Template', 'unit/unit_data',$data);
    }


    public function delete($id)
    {
      $this->Unit_m->delete($id);
      $error = $this->db->error();
	 if($error['code'] != 0) {
	$this->session->set_flashdata('error','Data Tidak dapat di hapus (sudah berelasi Atau sedang di gunakan di Tabel lain)!');
		 }
       if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan','data berhasil di hapus');
       }
        redirect('Unit');
    }


    public function add()
    {
         $Unit = new stdClass();
         $Unit->unit_id = null;
          $Unit->name = null;
          $data = array(
                    'page' => 'add',
                    'row' => $Unit,
                 );
                  $this->template->load('Template', 'unit/unit_form',$data);
    }

    public function proses()
    {
       $post = $this->input->post();
       if (isset($post['add'])) {
            $this->Unit_m->add($post);
       }elseif (isset($post['edit'])) {
             $this->Unit_m->edit($post);
       }if ($this->db->affected_rows() > 0) {
       $this->session->set_flashdata('pesan','data berhasil di simpan');
       }
    redirect('Unit');
    }

    public function edit($id)
    {
      $query =  $this->Unit_m->get($id);
        if ($query->num_rows() > 0) {
               $Unit = $query->row();
               $data = array(
                 'page' => 'edit',
                    'row' => $Unit,
                 );
                  $this->template->load('Template', 'unit/unit_form',$data);   
        }else {
             $this->session->set_flashdata('pesan','data tidak ditemukan');
                   redirect('Unit');
        }

    }
}


