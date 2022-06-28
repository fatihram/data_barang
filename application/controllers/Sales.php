<?php 

class Sales extends CI_controller
{

    function __construct()
    {
   parent::__construct();
   check_not_login();
    $this->load->model('Sales_m');
       
    }
    public function index()
    {
          $data['row'] = $this->Sales_m->get();
          $this->template->load('Template','sales/sales_data',$data);
    }




    public function delete($id)
    {
        $this->Sales_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan','data berhasil di hapus');
        }
        redirect('Sales');
    }


       public function add()
       {
             $Sales = new stdClass();
             $Sales->sales_id = null;
              $Sales->kode_sales = null;
               $Sales->name = null;
                $Sales->gender = null;
                 $Sales->alamat = null;
                 $Sales->handphone = null;
                  $data = array(
                                   'page' => 'add',
                                   'row' =>  $Sales,
                    );
                    $this->template->load('Template','sales/sales_form',$data);
       }




       public function edit($id)
       {
             $query =  $this->Sales_m->get($id);
                if ($query->num_rows() > 0) {
                       $Sales = $query->row();
                 $data = array(
                           'page' => 'edit',
                           'row' =>  $Sales,
                         );
                          $this->template->load('Template','sales/sales_form',$data);
           }else {
                  $this->session->set_flashdata('messages','data tidak ada di database!');
                    redirect('Sales');
             
           }
                }
       



       public function proses()
       {
              $post = $this->input->post(null, TRUE);
              if (isset($_POST['add'])) {
                    $this->Sales_m->add($post);
              }elseif (isset($_POST['edit'])) 
              {
                 $this->Sales_m->edit($post);
              }if ($this->db->affected_rows() > 0 ) {
                    $this->session->set_flashdata('pesan','data berhasil di simpan');                             
                  }
                  redirect('Sales');
              }
       }





?>