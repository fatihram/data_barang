<?php

class Distributor_m extends CI_model
{
    public function get($id = null)
    {
       $this->db->from('distributor');
       if ($id != null) {
          $this->db->where('distributor_id', $id);
       }
        $query = $this->db->get();
                   return  $query;
    }

    public function add($post)
    {
       $params = [
               'name' => $post['name'],
                'phone' => $post['phone'],
                'address' => $post['address'],
                'description' => $post['description'],
                 'image' => $post['image'],
       ];
        $this->db->insert('distributor', $params);
    }

    public function delete($id)
    {
       $this->db->where('distributor_id', $id);
       $this->db->delete('distributor');
    }


   public function edit($post)
    {
          $params = [
               'name' => $post['name'],
                'phone' => $post['phone'],
                'address' => $post['address'],
                'description' => $post['description'],
                 'updated' => date('Y-m-d H-i-s'),
       ];
           

           if ($post['image'] != null) {
              $params['image'] = $post['image'];
           }
           $this->db->where('distributor_id', $post['id']);
           $this->db->update('distributor', $params);
    }

}







?>
