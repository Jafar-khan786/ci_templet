<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class Orders extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('Orders_model');
          $this->load->library("pagination");
          
    }  


    public function select_all_order(){ 
            $config = array();
 
       $config["base_url"] = base_url() . "Orders/select_all_order";
 
       $config["total_rows"] = $this->Orders_model->record_count();
 
       $config["per_page"] = 10;
 
       $config["uri_segment"] = 3;
 
       $this->pagination->initialize($config);
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       $sdate = $this->input->post('sdate');
       $edate = $this->input->post('edate');
       //$user =  $this->input->post('usr');
      
 
       $data["view"] = $this->Orders_model->
 
           fetch_departments($config["per_page"], $page,$sdate,$edate);
 
       $data["links"] = $this->pagination->create_links();
    
      $this->load->view('view_orders', $data);
        }


    public function select_order()
    {
         $ids = $this->uri->segment('3');
        $data['ordetail'] = $this->Orders_model->select_all_order_detail($ids);
        $this->load->view('view_order_alldetail',$data);
    }
       
   }     