<?php
class Gudang_m extends CI_model
{
    public function get($id = null)
    {
       $this->db->from('gudang');
         if ($id != null) {
               $this->db->where('gudang_id',$id);
         }
             $query = $this->db->get();
              return $query;
    }

    public function add($post)
    {
           $params = [
                'name' => $post['name'],
                  'kode_gudang' => $post['kode_gudang'],
           ];
              $this->db->insert('gudang', $params);
    }



    public function delete($id)
    {
          $this->db->where('gudang_id', $id);
             $this->db->delete('gudang');

    }

    public function edit($post)
    {
           $params = [
                'name' => $post['name'],
                  'kode_gudang' => $post['kode_gudang'],
                  'updated'  => date('Y-m-d  H-i-s'),
           ];
               $this->db->where('gudang_id',$post['id'],);
              $this->db->update('gudang', $params);
    }

}












?>