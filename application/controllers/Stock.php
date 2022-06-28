<?php


class Stock extends  CI_controller
{


     function __construct()
          {
             parent::__construct();
             $this->load->model(['Stock_m','Distributor_m','Item_m']);
          }
        
    public function stock_in_data()
    {
        $data['row'] = $this->Stock_m->get_stock_in()->result();
            $this->template->load('Template','stock/stock_in/stock_in_data',$data);
    }



    
    public function stock_in_add()
    {
           $item =$this->Item_m->get()->result();
           $distributor =$this->Distributor_m->get()->result();
           $data = ['item' => $item, 'distributor' =>  $distributor];
	     $this->template->load('Template','stock/stock_in/stock_in_form',$data);
          
    }

        public function proses()
   {
         if (isset($_POST['in_add'])) {
               $post = $this->input->post(null, TRUE);
               $this->Stock_m->add_stock_in($post);
                 $this->Item_m->update_stock_in($post);

               if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('pesan','data stock-in berhasil di simpan');
                        redirect('Stock/in');
               }
         }
   }


      
   public function stock_in_delete()
   {
       $stock_id = $this->uri->segment(4);
          $item_id = $this->uri->segment(5);
            $qty =  $this->Stock_m->get($stock_id)->row()->qty;
              $data = ['qty' => $qty,  'item_id' => $item_id ];
                   $this->Item_m->update_stock_out( $data);
                   $this->Stock_m->delete($stock_id);
                     if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('pesan','data stock-in berhasil di hapus');
                        redirect('Stock/in');
               }
   }



   public function exportExcel()
   {
      $data['title'] = 'exportExcel';
       $data['row'] = $this->Stock_m->gets();
       $this->load->view('Stock/stock_in/exportExcel',$data);
   }


   
   public function exportPdf()
   {
       $data['row'] = $this->Stock_m->gets();
       $html = $this->load->view('Stock/stock_in/exportPdf', $data, true);
       $this->fungsi->Pdf_generator($html,'data-inventory','A4','potrait');
   }

    



   //batas script coding  stock in dan stock out
      public function stock_out_data()
    {
            $data['row'] = $this->Stock_m->get_stock_out()->result();
               $this->template->load('Template','stock/stock_out/stock_out_data',$data);
    }


    public function stock_out_add()
    {
          
            $item =$this->Item_m->get()->result();
            $data = ['item' => $item];
            $this->template->load('Template','stock/stock_out/stock_out_form',$data);
          
    }

   
   


   public function prosess()
   {
       
         if (isset($_POST['out_add'])) 
           {
               $post = $this->input->post(null, TRUE);
               $row_item = $this->Item_m->get($this->input->post('item_id'))->row();
               if ($row_item->stock < $this->input->post('qty')) {
                $this->session->set_flashdata('error','Qty Melebihi Stock Barang');
                redirect('Stock/out/add');
               }else {
                $this->Stock_m->add_stock_out($post);
                $this->Item_m->update_stock_out($post);
             if ($this->db->affected_rows() > 0) {
                       $this->session->set_flashdata('pesan','data stock-out berhasil di simpan');
                       redirect('Stock/out');
              }
               }
               
         }
   }




    public function stock_out_delete()
   {
       $stock_id = $this->uri->segment(4);
          $item_id = $this->uri->segment(5);
            $qty =  $this->Stock_m->get($stock_id)->row()->qty;
              $data = ['qty' => $qty,  'item_id' => $item_id ];
                   $this->Item_m->updated_stock_out( $data);
                   $this->Stock_m->delete($stock_id);
                     if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('pesan','data stock-out berhasil di hapus');
                        redirect('Stock/out');
               }
   }



   public function exportExcelOut()
   {
      $data['title'] = 'exportExcel';
       $data['row'] = $this->Stock_m->getsOut();
       $this->load->view('Stock/stock_out/exportExcel',$data);
   }


   
   public function exportPdfOut()
   {
       $data['row'] = $this->Stock_m->getsOut();
       $html = $this->load->view('Stock/stock_out/exportPdf', $data, true);
       $this->fungsi->Pdf_generator($html,'data-inventory','A4','potrait');
   }

  

}



?>