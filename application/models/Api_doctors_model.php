<?php
	 if(!defined('BASEPATH'))
        exit('No direct script access allowed');
        
    class Api_doctors_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();

              $this->load->model('common_model', 'cm'); 
            
        }    
	
		function view_doctor_patients($doctor_id,$manage_date)     
			{
			    $q="select * from token_tbl where doctor_id = '$doctor_id' GROUP BY doctor_id ORDER BY token_id DESC";

			   $res = $this->db->query($q)->result_array();
			   $returnValue = array();
			   foreach ($res as  $rows)
			    {
			    		 $usrid = $rows['user_id'];
			             
			              $dts = ($manage_date) ? $manage_date :  date("Y-m-d");   
			     		
			         $returnValue['total_attend_patient'] = $this->cm->count_row('token_tbl',[ 'doctor_id' => $doctor_id , 'token_date' => $dts,'complete_status' =>'1']);   	

			        $returnValue['current_patient'] = $this->cm->count_row('token_tbl',[ 'doctor_id' => $doctor_id , 'token_date' => $dts,'complete_status' =>'2']);   	
    
			        $returnValue['cancel_patient'] = $this->cm->count_row('token_tbl',[ 'doctor_id' => $doctor_id , 'token_date' => $dts,'complete_status' =>'4']);   	




			              }
			    		

			return $returnValue;    	


		   }
		
	}