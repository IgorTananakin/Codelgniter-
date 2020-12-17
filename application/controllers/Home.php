<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("home_model");
    }
    public function index() {
        $data['title'] = "Товары";
        $data['items']= $this->home_model->getItems();
        // $data['text'] = "This is view page1.php. Text from controller";
        // $data['names'] = array("Ivan", "Oleg", "Ann", "Egor", "Kate", "Irina");

        $this->load->view('page1', $data);
    }
    public function getItemInfo2(){
        if(!$this->input->post('send')){
            $data['list'] = $this->home_model->getItems();
            $this->load->view('form_item_id2',$data);

        } else{
            $id=$this->input->post('itemid');
            $item= $this->home_model->getItemById($id);

            $data['item']=$item;
            $data['title']="Карточка товара № ".$id;
            $this->load->view('item_info',$data);

        }
    }
    public function uploadImages(){
        if(!$this->input->post('send')){
            $this->load->view('form_upload', $data);

        } else {
            $config['upload_path'] = './assets/images/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = 2048;

            $this->load->library('upload',$config);

            if(!$this->upload->do_upload('image')){
                $data = array('error'=>$this->upload->display_errors());
                $this->load->view('form_upload', $data);

            } else {
                $into = array('upload_data'=>$this->upload->data());
                $path = 'assets/images/';
                $data = array('itemid'=>1,'imagepath'=>$path.$info['upload']);

                $itemid = $this->home_model->addImages($data);
                if($itemid != false){
                    $info = array('result'=>'Картинка'.$itemid.'Успешно добавлены');
                    $this->load->view('form_upload',$info);
                }
            }

        }
    }

    public function addImages($data) {
        $insert = $this->db->insert('Images', $data);
        if($insert){
            return $this->db->insert_id();   
        } else {
            return false;
        }
    }
}
