<?php


 Class Fungsi
{
    protected $ci;

    function __construct()
    {
        $this->ci =&  get_instance();
    }

    function user_login() 
    {
           $this->ci->load->model('User_m');
           $user_id = $this->ci->session->userdata('user_id');
           $user_data = $this->ci->User_m->get($user_id)->row();
           return $user_data;

    }


     public function count_distributor()
    {
     $this->ci->load->model('Distributor_m');
       return $this->ci->Distributor_m->get()->num_rows();
    }

     public function count_gudang()
    {
     $this->ci->load->model('Gudang_m');
       return $this->ci->Gudang_m->get()->num_rows();
    }

      public function count_user()
    {
     $this->ci->load->model('User_m');
       return $this->ci->User_m->get()->num_rows();
    }


      public function count_item()
    {
     $this->ci->load->model('Item_m');
       return $this->ci->Item_m->get()->num_rows();
    }


   

    public function Pdf_generator($html, $filename, $paper , $orentation)
    {
     // instantiate and use the dompdf class
       $dompdf = new  Dompdf\Dompdf();
       $dompdf->loadHtml($html);

       // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orentation);

       // Render the HTML as PDF
        $dompdf->render();

       // Output the generated PDF to Browser
          $dompdf->stream($filename, array('attachment' => 0));
    
    }
}