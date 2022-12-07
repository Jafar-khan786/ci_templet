<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Login extends REST_Controller {
    
   
    public function __construct() {
       parent::__construct();
                 $this->load->database();

             $this->load->model('common_model', 'cm');   
             $this->load->model('Validate_model', 'vm'); 
    }
       
   
public function index_post()
    {
       $flag = $this->input->post('flag');
                        
      switch ($flag)
        {
    case "doctor_login":
       {
           $contact =  $this->input->post('contact');

        if(empty($contact))
            {
                $dataTosend = ['status'=>false, 'msg' => 'Enter parameter! Mobile No','body'=>''];
                 echo json_encode($dataTosend); die();
             }
          

             $res = $this->cm->get_data('doctor_tbl',['doc_contact'=>$contact]);
                 

                  if($res){

                      $token = $this->cm->random_strings(64);
                    $this->cm->user_update('doctor_tbl',['doc_contact'=>$contact],['token'=>$token]);
                      $job = array();

                      $job['doctor_id'] = $res[0]->doctor_id;
                      $job['email'] = $res[0]->doc_email;
                      $job['mobile'] = $res[0]->doc_contact;
                      $job['token'] = $token;
                      $job['u_type'] = 'doctor';

                     $dataTosend = [ 'status'=>true,'msg'=>'Login Successfully','body'=> $job];
                     echo json_encode($dataTosend);  

                  }else{
                        $dataTosend = [ 'status'=>false,'msg'=>'Invalid Login','body'=>""];
                     echo json_encode($dataTosend);
                      }

                        break;
            }

case "user_login":
{
                 $contact =  $this->input->post('contact');

            if(empty($contact))
            {
                $dataTosend = ['status'=>false, 'msg' => 'Enter parameter! Mobile No','body'=>''];
                 echo json_encode($dataTosend); die();
             }
            // $contact = md5($contact);

             $res = $this->cm->get_data('user_management',['contact'=>$contact]);
                 

                  if($res){

                      $token = $this->cm->random_strings(64);
                    $this->cm->user_update('user_management',['contact'=>$contact],['token'=>$token]);
                      $job = array();

                      $job['user_id'] = $res[0]->id;
                      $job['email'] = $res[0]->email;
                      $job['mobile'] = $res[0]->contact;
                      $job['token'] = $token;
                      $job['u_type'] = 'user';

                     $dataTosend = [ 'status'=>true,'msg'=>'Login Successfully','body'=> $job];
                     echo json_encode($dataTosend);  

                  }else{
                        $dataTosend = [ 'status'=>false,'msg'=>'Invalid Login','body'=>""];
                     echo json_encode($dataTosend);
                      }

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