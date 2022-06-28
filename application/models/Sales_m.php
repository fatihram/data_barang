<?php
class sales_m extends Ci_model
{
      public function get($id = null)
      {
            $this->db->from('sales');
            if ($id != null) {
                   $this->db->where('sales_id',$id);
            }
             $query = $this->db->get();
                return $query;
      }


      public function add($post)
      {
          $params = [
                    'name' => $post['name'],
                       'kode_sales' => $post['kode_sales'],
                          'gender' => $post['gender'],
                             'alamat' => $post['alamat'],
                              'handphone' => $post['handphone'],
                   ];
                     $this->db->insert('sales',$params);
      }


      public function delete($id)
      {
        $this->db->where('sales_id',$id);
        $this->db->delete('sales');
      }


      
      public function edit($post)
      {
          $params = [
                    'name' => $post['name'],
                       'kode_sales' => $post['kode_sales'],
                          'gender' => $post['gender'],
                             'alamat' => $post['alamat'],
                              'handphone' => $post['handphone'],
                   ];
                      $this->db->where('sales_id',$post['id']);
                     $this->db->update('sales',$params);
      }
}




?>