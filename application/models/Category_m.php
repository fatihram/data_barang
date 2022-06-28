<?php 

class Category_m extends CI_model
{
    public function get($id = null)
    {
       $this->db->from('category');
         if ($id != null) {
               $this->db->where('categori_id',$id);
         }
             $query = $this->db->get();
              return $query;
    }



    public function add($post)
    {
       $params = [
           'name' => $post['name'],
       ];
          $this->db->insert('category',$params);
    }



    public function delete($id)
    {
         $this->db->where('categori_id',$id);
           $this->db->delete('category');
    }


      public function edit($post)
    {
       $params = [
           'name' => $post['name'],
           'updated' => date('Y-m-d H-i-s'),
       ];
          $this->db->where('categori_id',$post['id']);
          $this->db->update('category',$params);
    }
}





























?>