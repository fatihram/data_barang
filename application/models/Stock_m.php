<?php 
class Stock_m extends CI_model
{


  public function get($id = null)
  {
      $this->db->from('t_stock');
      if ($id != null) {
                  $this->db->where('stock_id', $id);
      }
             $query =  $this->db->get();
             return  $query;
  }



    public function delete($id)
    {
           $this->db->where('stock_id', $id);
           $this->db->delete('t_stock');
    }






   public function get_stock_in()
   { 
               $this->db->select('t_stock.stock_id,item.barcode,item.name as item_name, qty,date,detail,distributor.name as distributor_name, item.item_id');
               $this->db->from('t_stock');
               $this->db->join('item','t_stock.item_id = item.item_id');
               $this->db->join('distributor','t_stock.distributor_id = distributor.distributor_id','left');
               $this->db->where('type','in');
               $this->db->order_by('stock_id','desc');
                $query = $this->db->get();
                   return  $query;

   }






      public function add_stock_in($post)
      {
          $params = [
            'item_id' => $post['item_id'],
              'type' =>'in',
                'detail' => $post['detail'],
                  'distributor_id' => $post['distributor'] == '' ? null : $post['distributor'],
                   'qty' => $post['qty'],
                    'date' => $post['date'],
                      'user_id' => $this->session->userdata('user_id'),
      ];
       $this->db->insert('t_stock',$params);
      }

      
      // public function gets($id = null)
      // {
      //     $this->db->from('t_stock');
      //     if ($id != null) {
      //                 $this->db->where('stock_id', $id);
      //     }
      //            $query =  $this->db->get();
      //            return  $query;
      // }

      public function gets()
      { 
                  $this->db->select('t_stock.stock_id,item.barcode,item.name as item_name, qty,date,detail,type,distributor.name as distributor_name, item.item_id');
                  $this->db->from('t_stock');
                  $this->db->join('item','t_stock.item_id = item.item_id');
                  $this->db->join('distributor','t_stock.distributor_id = distributor.distributor_id','left');
                  $this->db->where('type','in');
                  $this->db->order_by('stock_id','desc');
                   $query = $this->db->get();
                      return  $query;
   
      }
    


      //batas model stock in dan out

   public function get_stock_out()
   { 
               $this->db->select('t_stock.stock_id,item.barcode,item.name as item_name, qty,date,detail,distributor.name as distributor_name, item.item_id');
               $this->db->from('t_stock');
               $this->db->join('item','t_stock.item_id = item.item_id');
               $this->db->join('distributor','t_stock.distributor_id = distributor.distributor_id','left');
               $this->db->where('type','out');
               $this->db->order_by('stock_id','desc');
                $query = $this->db->get();
                   return  $query;

   }



     public function add_stock_out($post)
      {
          $params = [
            'item_id' => $post['item_id'],
              'type' =>'out',
                'detail' => $post['detail'],
                   'qty' => $post['qty'],
                    'date' => $post['date'],
                      'user_id' => $this->session->userdata('user_id'),
      ];
       $this->db->insert('t_stock',$params);
      }



    


      public function getsOut()
      { 
                  $this->db->select('t_stock.stock_id,item.barcode,item.name as item_name, qty,date,detail,type,distributor.name as distributor_name, item.item_id');
                  $this->db->from('t_stock');
                  $this->db->join('item','t_stock.item_id = item.item_id');
                  $this->db->join('distributor','t_stock.distributor_id = distributor.distributor_id','left');
                  $this->db->where('type','out');
                  $this->db->order_by('stock_id','desc');
                   $query = $this->db->get();
                      return  $query;
   
      }






    
}

   


?>