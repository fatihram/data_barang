<?php

class Unit_m extends CI_model
{
    public function get($id = null)
    {
         $this->db->from('unit');
         if ($id != null) {
           $this->db->where('unit_id',$id);
         }
         $query = $this->db->get();
            return $query;
    }

    public function delete($id)
    {
        $this->db->where('unit_id', $id);
        $this->db->delete('unit');
    }

    public function add($post)
    {
      $params = [
            'name' => $post['name'],
      ];
       $this->db->insert('unit',$params);
    }
    
    public function edit($post)
    {
      $params = [
            'name' => $post['name'],
            'updated' => date('Y-m-d H:i:s')
      ];
      $this->db->where('unit_id', $post['id']);
       $this->db->update('unit',$params);
    }
}





?>