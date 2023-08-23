<?php
class Image_model extends CI_Model
{
   
    public function insertImage($filename)
    {
        $data = array(
            'image' => $filename
        );

        $this->db->insert('image',$data);
    }

    public function fetch_image()
    {
       return $this->db->get('image')->result();
    }
}
?>
