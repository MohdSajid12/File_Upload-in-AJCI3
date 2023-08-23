<?php

class Upload extends CI_Controller
{
    public function index()
    {
        $this->load->view('upload');
    }

    public function addData()
{
    $config['allowed_types'] = 'jpg|png|jpeg|mp4';
    $config['upload_path'] = './uploads/images';

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('image')) {
        $imageData = $this->upload->data();
        $filename = $imageData['file_name'];

        $image_path =  base_url('uploads/images/'. $filename);
    
        $this->load->model('Image_model');
       $this->Image_model->insertImage( $image_path);

        print_r("Successfully inserted");
        redirect('Upload/showImage');
    } else {
        echo $this->upload->display_errors();
    }
}


    public function showImage()
    {
        $this->load->model('Image_model'); 
        $data['images'] = $this->Image_model->fetch_image();
        $this->load->view('show_image', $data); 
    
}

public function getImageData()

{

    $this->load->model('Image_model');
    $imageData = $this->Image_model->fetch_image();
    echo json_encode($imageData);

}


}
