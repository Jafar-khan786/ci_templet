<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        //$this->load->model('Home_model');
          $this->load->library("pagination");
    }    
    
public function index()
  {
   /* $this->load->model('Home_model');
    $data['viewuser']=$this->Home_model->selectuser();
     $data['viesbad']=$this->Home_model->selectsubadmin();
     $data['advertise']=$this->Home_model->selectadvertisement();
     $data['actusr']=$this->Home_model->select_all_active_user();
 
    $this->load->view('home',$data);*/
    $this->load->view('home');
  }
}