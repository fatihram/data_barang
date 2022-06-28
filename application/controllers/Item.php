<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {
      
     function __construct()
    {
      parent::__construct();
      check_not_login();
      $this->load->model(['Item_m','Gudang_m','Distributor_m','Unit_m','Category_m']);
    }

    //
 function get_ajax() {
        $list = $this->Item_m->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $item->barcode.'';
            $row[] = $item->name;
            $row[] = $item->categori_name;
            $row[] = indo_currency($item->price);
            $row[] = $item->unit_name;
            $row[] = $item->stock;
             $row[] = $item->gudang_name;
            $row[] = $item->distributor_name;
            $row[] = $item->image != null ? '<img src="'.base_url('image/product/'.$item->image).'" class="img" style="width:100px">' : null;
            // add html for action
            $row[] = '<a href="'.site_url('Item/edit/'.$item->item_id).'" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> </a> 
                    <a href="'.site_url('Item/delete/'.$item->item_id).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->Item_m->count_all(),
                    "recordsFiltered" => $this->Item_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }



//batas


	public function index()
	{
        $data['row']  =  $this->Item_m->get();
    $this->template->load('Template','item/item_data', $data);
    
  }




  public function delete($id)
    {
                                 $item = $this->Item_m->get($id)->row();
                                               if ($item->image) {
                                                   $target_file = './image/product/'.$item->image;
                                                   unlink( $target_file);
                                               }

        $this->Item_m->delete($id);
        $error = $this->db->error();
		 if($error['code'] != 0) {
			$this->session->set_flashdata('error','Data Tidak dapat di hapus (sudah berelasi Atau sedang di gunakan di Tabel lain)!');
		 }
         if ($this->db->affected_rows() > 0 ){
            $this->session->set_flashdata('pesan','data berhasil di hapus');                             
                  }
                  redirect('Item');

                                                   
           
         
    }
  

  public function add()
  {
          $Item = new stdclass();
          $Item->item_id = null;
          $Item->barcode = null;
          $Item->name = null;
          $Item->price = null;
          $Item->stock = null;
          $Item->gudang_id = null;
          $Item->unit_id = null;
          $Item->categori_id = null;
          $Item->distributor_id = null;
           
           
           
                   $Gudang = $this->Gudang_m->get();
                   $Distributor = $this->Distributor_m->get();
                   $Unit = $this->Unit_m->get();
                   $Category = $this->Category_m->get();
                      $data = array(
                                  'page' =>  'add',
                                  'row'   => $Item,
                                   'Gudang' => $Gudang,
                                   'Unit' => $Unit,
                                   'Distributor' => $Distributor,
                                   'Category' => $Category,
                );
                $this->template->load('Template','item/item_form', $data);
  }




  


  public function edit($id)
  {
   $query =   $this->Item_m->get($id);
     if ($query->num_rows() > 0 ) {
                   $Item = $query->row();
                   $Gudang = $this->Gudang_m->get();
                   $Distributor = $this->Distributor_m->get();
                   $Unit = $this->Unit_m->get();
                   $Category = $this->Category_m->get();
                        $data = array(
                                  'page' =>  'edit',
                                  'row'   => $Item,
                                   'Gudang' => $Gudang,
                                   'Unit' => $Unit,
                                   'Distributor' => $Distributor,
                                   'Category' => $Category,
                );
                $this->template->load('Template','item/item_form', $data);
     }
  }





                                          public function proses()
                                                               {

                                                $config['upload_path']          = './image/product/';
                                                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                                                $config['max_size']             = 2048;
                                                $config['file_name']            = 'item-'.date('ymd').'-'.substr(md5(rand()),0,10);
                                                $this->load->library('upload', $config);

                              $post =  $this->input->post(null, TRUE);
                              if (isset($_POST['add'])) {
                                 if ($this->Item_m->checek_barcode($post['barcode'])->num_rows() > 0) 
                                 {
                                    $this->session->set_flashdata('error',"barcode, $post[barcode] sudah dipakai barang lain");
                                    redirect('Item/add');
                                 }else {
                                          if (@$_FILES['image']['name']) {
                                            if ($this->upload->do_upload('image'))
                                          {
                                              $post[image]= $this->upload->data('file_name');
                                               $this->Item_m->add($post);
                                              if ($this->db->affected_rows() > 0) {
                                                   $this->session->set_flashdata('pesan', 'data berhasil di simpan');
                                             }
                                                redirect('Item'); 

                                             }else {
                                                    $error = $this->upload->display_errors();
                                                           $this->session->set_flashdata('error',$error);
                                                           redirect('Item'); 
                                                  }
                                       }else {
                                                 $post[image]= null;
                                                    $this->Item_m->add($post);
                                                  if ($this->db->affected_rows() > 0) {
                                                   $this->session->set_flashdata('pesan', 'data berhasil di simpan');
                                             }
                                                redirect('Item');
                                            
                                       }
                                 }
                                   
                                }elseif (isset($_POST['edit'])) {
                                    if ($this->Item_m->checek_barcode($post['barcode'], $post['id'])->num_rows() > 0) 
                                 {
                                    $this->session->set_flashdata('error',"barcode, $post[barcode] sudah dipakai barang lain");
                                    redirect('Item/edit/'.$post['id']);
                                    }else {
                                         if (@$_FILES['image']['name']) {
                                            if ($this->upload->do_upload('image'))
                                          {

                                                  //script untuk replace image & script ini juga bisa di gunanakan untuk hapus image di function hapus tetapi
                                                  // di bagian get($post['id'])di ganti  get($id) untuk bagian hapus ya suhu.

                                              $item = $this->Item_m->get($post['id'])->row();
                                               if ($item->image) {
                                                   $target_file = './image/product/'.$item->image;
                                                   unlink( $target_file);
                                               }

                                              $post[image]= $this->upload->data('file_name');
                                                $this->Item_m->edit($post);
                                              if ($this->db->affected_rows() > 0) {
                                                   $this->session->set_flashdata('pesan', 'data berhasil di simpan');
                                             }
                                                redirect('Item'); 

                                             }else {
                                                    $error = $this->upload->display_errors();
                                                           $this->session->set_flashdata('error',$error);
                                                           redirect('Item'); 
                                                  }
                                       }else {
                                                 $post[image]= null;
                                                  $this->Item_m->edit($post);
                                                  if ($this->db->affected_rows() > 0) {
                                                   $this->session->set_flashdata('pesan', 'data berhasil di update');
                                             }
                                                redirect('Item');
                                            
                                       }
                                      
                                    }
                           }
                         }




                        
   public function barcode_qrcode($id)
    {
    $data['row'] = $this->Item_m->get($id)->row();
      $this->template->load('Template','item/barcode_qrcode',$data);
  }




                  



     public function exportexcel()
     {
        $data['title'] = 'exportexcel';
         $data['row'] = $this->Item_m->get();
         $this->load->view('item/exportexcel',$data);
     }



      public function exportpdf()
       {

           $data['row'] = $this->Item_m->gets();
           $html = $this->load->view('item/exportpdf', $data, true);
           $this->fungsi->Pdf_generator($html,'data-inventory','A4','potrait');
       }

        
       
      public function print()
      {
          $data['title'] = 'print data';
          $data['row'] = $this->Item_m->getz();
          $this->load->view('item/print',$data);
      }


}
