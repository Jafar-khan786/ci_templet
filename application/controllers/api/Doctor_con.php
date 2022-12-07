<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class Doctor_con extends REST_Controller {
    
   
    public function __construct() {
       parent::__construct();
                 $this->load->database();

             $this->load->model('common_model', 'cm');   
           
             $this->load->model('Api_doctors_model', 'adm'); 

            
           $token  =  trim($this->input->get_request_header('token'));
         $user_type  =  trim($this->input->get_request_header('user_type'));
        // $doctor_id  =  trim($this->input->post('doctor_id'));
        
         if($user_type != 'doctor')   
           {
               $dataTosend = ['status'=>false, 'msg' => 'Invalid user','body'=>''];
                   echo json_encode($dataTosend); die();
           }   
         
         $one = $this->cm->Count_row('doctor_tbl',['token'=>$token]);  
                                                  //'doctor_id'=>$doctor_id
       
       if($one == 0 )
           {
               $dataTosend = ['status'=>false, 'msg' => 'Invalid user','body'=>''];
                   echo json_encode($dataTosend); die();
           }  
    }
       
   
public function index_post()
    {
       $flag = $this->input->post('flag');
                        
      switch ($flag)
        {
 case "doctor_leave":
   {
           $doctor_id  =  trim($this->input->post('doctor_id'));
           $from_date  =  trim($this->input->post('from_date'));
           $to_date    =  trim($this->input->post('to_date'));
           $leave_slot =  trim($this->input->post('leave_slot'));

            if(empty($doctor_id) || empty($from_date) || empty($to_date))
            {
                $dataTosend = ['status'=>false, 'msg' => 'Enter all parameters!','body'=>''];
                 echo json_encode($dataTosend); die();
             }
          
             $res = $this->cm->user_save('doctor_leaves',['doctor_id'=>$doctor_id,'from_date'=>$from_date,'to_date'=>$to_date,'status'=>'1','leave_slot'=>$leave_slot]);
                 

               if($res){
                     $dataTosend = [ 'status'=>true,'msg'=>'Leaves inserted successfully','body'=> $res];
                     echo json_encode($dataTosend);  

                  }else{
                        $dataTosend = [ 'status'=>false,'msg'=>'Something went wrong, please try again!','body'=>""];
                     echo json_encode($dataTosend);
                      }

                        break;
       }

case "doctor_leave_delete":
  {
                 $leave_id =  $this->input->post('leave_id');

            if(empty($leave_id))
            {
                $dataTosend = ['status'=>false, 'msg' => 'Enter parameter! Mobile No','body'=>''];
                 echo json_encode($dataTosend); die();
             }
            // $contact = md5($contact);

             $res = $this->cm->deleteRecord('doctor_leaves',['leave_id'=>$leave_id]);
                 

              if($res){

                     $dataTosend = [ 'status'=>true,'msg'=>'Leave deleted Successfully','body'=> ''];
                     echo json_encode($dataTosend);  

                  }else{
                        $dataTosend = [ 'status'=>false,'msg'=>'Something went wrong, please try again!','body'=>""];
                     echo json_encode($dataTosend);
                      }

                        break;
             }
 case "view_doctor_patients":
  {
           $doctor_id =  $this->input->post('doctor_id');
           $manage_date =  trim($this->input->post('manage_date'));
     
                  
      if(empty($doctor_id))
            {
                $dataTosend = ['status'=>false, 'msg' => 'Enter parameter! Mobile No','body'=>''];
                 echo json_encode($dataTosend); die();
             }
          
             $res = $this->adm->view_doctor_patients($doctor_id,$manage_date);
            
          if($res){
               $dataTosend = [ 'status'=>true,'msg'=>'success','body'=> $res];
                     echo json_encode($dataTosend);  

                  }else{
                        $dataTosend = [ 'status'=>false,'msg'=>'No data found!','body'=>""];
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