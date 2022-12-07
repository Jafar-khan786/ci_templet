<?php error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        $this->load->model('User_model');
          $this->load->library("pagination");
          
    }  


    public function index(){ 
      $data['view'] = $this->User_model->select_users();
      $this->load->view('view_user', $data);
        }

      public function add_user()
      {
        $this->load->view('add_user');
      }
      public function add_user_data()
      {
        
     $email=$this->input->post('email');
       $record = $this->User_model->db->where('user_email', $email)->get('user_tbl')->row();
       $uid = $record->user_id;
    
        if($uid)
          { 
 $this->session->set_flashdata('success_msg', 'Email address already register please add another email address.');
          }
          else {


        $otp = rand(1000,99999);
          if(!empty($_FILES['image']['name'])){
                $config['upload_path'] = 'upload/user/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['image']['name'];
                
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('image')){
                    $uploadData = $this->upload->data();
                    $image = $uploadData['file_name'];
                }else{
                    $image = '';
                }
            }else{
                $image = '';
            }
 

        $data = array( 'user_name'=>$this->input->post('fname'),
                       'user_email'=>$this->input->post('email'),
                       'user_contact'=>$this->input->post('contactno'),
                       'user_status'=>'1',
                       'user_password'=>md5($this->input->post('password')),
                       'user_address'=>$this->input->post('add'),
                       'user_dob'=>$this->input->post('db'),
                       'user_gender'=>$this->input->post('gen'),
                       'user_image'=>$image
                    ); 
           $insertUserData = $this->User_model->insert($data);  
          if($insertUserData){
                ?>
                <script> //alert('Special region Successfully Added');</script><?php 
               $this->session->set_flashdata('success_msg', 'User have been added successfully.');
            }
            else{
         $this->session->set_flashdata('error_msg', 'Some problems occured please enter valid data.');
            }
          redirect('User');       
      }
    }

        public function delete(){ 

         $this->load->model('User_model'); 
         $services_id = $this->uri->segment('3'); 
         $this->User_model->delete($services_id); 
   
         redirect('User'); 
      } 
        public function status(){ 
          $status = $_GET['status'];
          $id = $_GET['id'];
          $data = array('user_status'=> $status);
         $this->User_model->update_status($data,$id);
    }


     public function edit(){ 
         $this->load->helper('form');
         $this->load->helper('url'); 
         $services_id = $this->uri->segment('3'); 
         $query = $this->db->get_where("user_management",array("id"=>$services_id));
         $data['records'] = $query->result(); 
         $data['services_id'] = $services_id; 
         $this->load->view('edit_user',$data); 
      } 



  public function update_row()
    {

  $id=$this->input->post('uid');
        $image = $this->input->post('image'); 
            
              if(!empty($_FILES['image']['name'])){
                $config['upload_path'] = 'upload/user/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['image']['name'];
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                
                    if($this->upload->do_upload('image')){
                        $uploadData = $this->upload->data();
                        $image = $uploadData['file_name'];
                    }else{
                        $image = '';
                    }
              }
              else
              {
                $image = $this->input->post('oldimage') ;   
              }

        $data = array( 'user_name'=>$this->input->post('fname'),
                       'user_email'=>$this->input->post('email'),
                       'user_contact'=>$this->input->post('contactno'),
                       'user_gender'=>$this->input->post('gen'),
                       'user_dob'=>$this->input->post('db'),
                       'user_address'=>$this->input->post('add'),
                       'user_image'=>$image
                    ); 
        $this->load->model('User_model');
        $this->User_model->updata($id,$data);
      $this->session->set_flashdata('success_msg', 'User have been updated successfully.');

        redirect('User'); 
}

        

}