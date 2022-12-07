<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Api_farmet extends REST_Controller {
    
	 
    public function __construct() {
       parent::__construct();
                 $this->load->database();

             // $this->load->model('common_model', 'cm');   
           //  $this->load->model('Validate_model', 'vm'); 
    }
       
   
public function index_post()
    {
       $flag = $this->input->post('flag');
                        
      switch ($flag)
        {
            case "test_1":
                {
                    echo "jafar khan  login " ;
                        break;
                  }
            case "test_2":
            {
                 echo "jafar khan  5555 " ;
                    break;
             }
            default:
                {      
                  $dataTosend = [ 'status'=>false,'msg'=>'invalid flag value ','body'=>""];
                     echo json_encode($dataTosend);
                     break;
                 }
        }
    }


}