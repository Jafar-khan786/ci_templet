<?php
	 if(!defined('BASEPATH'))
        exit('No direct script access allowed');
        
    class Common_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }    
	
		function check_value($where,$tbl)     
			{
			    $this->db->where($where);
			    $query = $this->db->get($tbl)->result_array();
			    if (count($query) > 0){
			        return $query[0]['user_id'];
			    }
			    else{
			        return false;
		   }
		
	}
public function count_row($tbl,$whr)
  {
    $res = $this->db->where($whr)->count_all_results($tbl);   
    return $res;


    }

	public function user_save ($tbl,$data)
			{
					$res = $this->db->insert($tbl,$data);

				return ($res)? $this->db->insert_id() : false;

			}

		public function get_data ($tbl,$data)
			{
					$res = $this->db->where($data)->get($tbl)->result();

				return $res;

			}
	
		public function deleteRecord($tbl,$wh)
			 {

			    $this->db->where($wh);
			    $del=$this->db->delete($tbl);   
			    return $del;

			}
	
/*=============================*/
	public function user_update($tbl,$wh,$tag)
	{
	   return  $res = $this->db->where($wh)->update($tbl, $tag);

	}

   


public function export_csv($m_id ,$date)
	{
		 /*$q2 = "SELECT b.user_name ,c.meeting_name,a.time,a.date FROM chat_message as a join user_tbl as b on b.user_id = a.user_id  join meeting_tbl as c on c.m_random_id = a.m_random_id  WHERE c.meet_id  = '$m_id' and a.date = '$date'";*/
		
		$this->db->select("b.user_name ,c.meeting_name,a.massege,a.time,a.date")
			->from('chat_message as a')
			->join('meeting_tbl as c','c.m_random_id = a.m_random_id','INNER')
			->join('user_tbl as b','b.user_id = a.user_id','INNER')
			->where('c.meet_id',$m_id)
			->where('a.date',$date);
				
		return 	$data1 = $this->db->get()->result_array();
				// print_r($data1); die();
				
			
		}
	public function host_group($host_id)
	{
		$wh = ['host_id'=>$host_id];
							//$this->db->select('*');
			$res = $this->db->where($wh)
					->order_by("g_id", "desc")
			->get('host_group_create_tbl')->result_array();
			$arr =[]; $job =[];
		foreach ($res as  $val) {
			
			$arr['g_id']	= $val['g_id'];
			$arr['host_id']	= $val['host_id'];
			$arr['g_name']	= $val['g_name'];
			$arr['date']	= $val['date'];
			$whr = ['group_id' =>$val['g_id']];
			$arr['count_u']= ($val['g_id'])? $this->count_row('group_users_tbl',$whr):"0";
			$job[] = $arr;
		}
			
			return $job;
	}
	
	
	public function poll_quiz ($host_id,$meet_id)
	{
              $q = "select * from quiz_test where host_id = '$host_id'and meet_id = '$meet_id'" ;
                
                 $res = $this->db->query($q)->result();
           
            if(count($res)== 0)
            {
                return false;
                
            }
                 $arr = array();  $job = array();
                 
                  //print_r($res); die();
                   
                   foreach ($res as $val)
                       {
                           $arr['test_name'] =   $val->test_name;
                           $arr['test_type'] =   $val->test_type;
                           $arr['time_limit'] =   $val->time_limit;
                          
                           $arr['data'] = $this->poll_quiz_child($val->test_id);
                           
                           $job[] = $arr;
                       }
                       
                    
                     
    		
			return $job;
	}
	function poll_quiz_child($test_id)
	    {
	       $q = $this->db->where('test_id',$test_id)->get('question_table')->result();
	       $arr = array();$job = array();
	       $count = count($q); $j = 1;
	       foreach ($q as $val)
	       {        
	           $arr['last_val'] = ($j == $count)? 1:0;
	           $arr['question_name'] = $val->question;
	           $arr['question_option'] = $this->poll_quiz_child_2($val->question_id);
	            
	           $job[] = $arr;
	           $j++;
	       }
	       
	       return $job;
	    }
	
	function poll_quiz_child_2($question_id)
	    {
	         $q = $this->db->select('options')->where('question_id',$question_id)->get('answer_table')->result();
	     
	       $arr = array();$job = array();
	       foreach ($q as $val)
	       {
	           $arr['options'] = $val->options;
	          
	           $job[] = $arr;
	       }
	     
	       return $job;
	      
	    }
	function tag_val($tag_name,$tag_val,$serch,$tbl)
	    {
	        $res = $this->db->select($serch)->where($tag_name,$tag_val)->get($tbl)->result();
	        
	        return $res[0]->$serch;
	    }
	  
	  
         function meail_send($to_email,$from_email,$id)
        	 {
        	        $wh = ['meet_id'=>$id ];
						$data = $this->get_data('meeting_tbl',$wh);

							$type = (count($data))? $data[0]->m_type:'';
							$pass = (count($data))? $data[0]->pass:'';
							$host = (count($data))? $data[0]->host_id:'';
							$meet_name = (count($data))? $data[0]->meeting_name :'';
						
							$date = (count($data))? $data[0]->date:'';
							$from_time = (count($data))? $data[0]->from_time:'';
                          
                            /*==========cheng date and time formet ===================*/
                                 $date_4 = $from_time . ',' . $date;
						 	 	   	              
                                 $new_time =  date('h:i a', strtotime($date_4));
                                       $yrdata= strtotime($date);
                                     $new_date =  date('d-M-Y', $yrdata);
                             /*==========cheng date and time formet end===================*/
                                
						        $aa ="";
							
                                        $ww = ['user_id'=>$host];
                                        $re = $this->get_data('user_tbl',$ww);
                                        $m_random_id = (count($re))? $re[0]->m_random_id : "" ;
                                        
                                        $host_name = (count($re))? $re[0]->user_name : "" ;    
                                        
                        	if($type == 2)
                                     {     
                                        $aa =  base64_encode('public,'.$m_random_id.','.$pass);
                                        }else{
                                                 $aa =  base64_encode('private,'.$id.','.$pass);
                                           }
                             $url = "https://ailive.in/meet/HomeController/index/?meet_id=".$aa;              
                                           
                          //   echo  $host_name. "  ==$host = jk=".$id."==  " .$meet_name; die();
                               
                                                  
                     $srk = "
                            <div style ='background-color:silver; border-radius: 15px;padding: 10px;' >
                                
                        <p style ='background-color:silver;padding: 10px;'>Thank you for using AILive.  The best in Industry Video Conferencing Platform.  Below are your meeting details:</p>
                            <br>
                            <br>
                            <table style ='background-color:silver;padding: 10px;'>
                              <tr>   
                                <th style = 'width: 40%' ></th>
                                <th style = 'width: 50%;  margin-left: 10px;' ></th>
                                
                               
                               <tr>   
                                <td >Host Name:</td>
                                <td >".$host_name."</td>   
                                </tr> 
                                <tr>
                                <td >Meeting Name:</td>
                                <td >".$meet_name."</td>
                                </tr>
                                <tr>
                                <td >Date:</td>
                                <td >".$new_date."</td>
                                </tr>
                                <tr>
                                <td >Time:</td>
                                <td >".$new_time."</td>
                                </tr>
                                <tr>
                                <td >Meeting URL:</td>
                                <td >".$url."</td>
                              </tr>
                              
                            </table>
                            <br>
                            <br>
                             <p style ='background-color:silver;padding: 10px;'>Disclaimer:  Please do not respond to
                                    this email.  This email address is not monitored for responses.  You may contact us at contactus@ailive.in
                                    in case you have questions or queries.</p>
                            <br>
                            <br>
                            <p style ='background-color:silver;padding: 10px;'>Thanks & Regards,
                               <br> Team AILive </p>
                               </div>
                            ";   
                              
                    $from_email = 'info@ailive.in';
        	         $to =  $to_email;
                    $subject = "Join this Url";
                    $txt = $srk;
                   
                    $header = 'From: <info@ailive.in>' . "\r\n";
                     $header .= 'Content-type:text/html;charset=UTF-8' . "\r\n";
                           
                   
                   
                    
                    if(mail($to,$subject,$txt,$header))
                    {   
                        return true;
                        
                    }else{
                            return false;
                             }
        	     
        	 }
	  function check_recoding($i_meet_id)    
	   { 
	        $checksum = sha1("getRecordingsrecordID=".$i_meet_id."F6zvjud7xTCCqxJUd0R3j6mvJDSYefxU8AAClYgjo");
          	$ur = "https://meet.ailive.in/bigbluebutton/api/getRecordings?recordID=".$i_meet_id."&checksum=".$checksum;
                     
                      $curl_handle=curl_init();
                          curl_setopt($curl_handle,CURLOPT_URL,$ur);
                          curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);              
                          curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);      
                          $buffer = curl_exec($curl_handle);
                          curl_close($curl_handle);     
                             
                         if(!empty($buffer))    
                              {
  		                              $val_1 = explode("<messageKey>", $buffer);
                                       $val_2 =  explode("</messageKey>", $val_1[1]);
                                     $val =  $val_2[0]; 
                                 return  $res =  ($val == 'true')? true: false;
                              }else{
                              			 return false;
                                    }    
	           
	   }
 function delete_recording($i_meet_id)         
	   { 
	        $checksum = sha1("deleteRecordingsrecordID=".$i_meet_id."F6zvjud7xTCCqxJUd0R3j6mvJDSYefxU8AAClYgjo");
          	$ur = "https://meet.ailive.in/bigbluebutton/api/deleteRecordings?recordID=".$i_meet_id."&checksum=".$checksum;
                     
                      $curl_handle=curl_init();
                          curl_setopt($curl_handle,CURLOPT_URL,$ur);
                          curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);              
                          curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);      
                          $buffer = curl_exec($curl_handle);
                          curl_close($curl_handle);     
                             
                         if(!empty($buffer))    
                              {
  		                              /*$val_1 = explode("<messageKey>", $buffer);
                                       $val_2 =  explode("</messageKey>", $val_1[1]);
                                     $val =  $val_2[0]; 
                                 return  $res =  ($val == 'true')? true: true;*/
                                 
                                 return true;
                              }else{
                              			 return false;
                                    }            
	                        
	   }          
	   
    
       function check_recording_meet($i_meet_id)       
        	   { 
        	       //$checksum = sha1("publishRecordingsrecordID=".$i_meet_id."&publish=trueF6zvjud7xTCCqxJUd0R3j6mvJDSYefxU8AAClYgjo");
        	       $checksum = sha1("getRecordingsrecordID=".$i_meet_id."F6zvjud7xTCCqxJUd0R3j6mvJDSYefxU8AAClYgjo");
             
              $url ="https://meet.ailive.in/bigbluebutton/api/getRecordings?recordID=".
        	                $i_meet_id."&checksum=".$checksum;   
        	            $curl_handle=curl_init();
                          curl_setopt($curl_handle,CURLOPT_URL,$url);    
                          curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);          
                          curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);   
                          $buffer = curl_exec($curl_handle);
                          curl_close($curl_handle);
                          if (empty($buffer))
                          {
                              return false;
                           }
                             else{
                                 $val_1 = explode("<recordings>", $buffer);
                                 $val_2 =  explode("</recordings>", $val_1[1]);
                                 $val =  $val_2[0];
                                 return $res =  ($val == '')? false: true;
                             }
        	   } 
        	   
      public function check_premium_user($tbl,$user_id)                   
			{
			    $date = date('Y-m-d');
				$q = "select count(*) as count  from $tbl where user_id = '$user_id' and start_date <= '$date' and end_date >= '$date' ";
					$res = $this->db->query($q)->result_array();
                $count = $res[0]['count'];
          	   
				return ($count > '0')?  true : false ;
     
			}  	   
	function check_url_meeting($meet_id)
	   {        
	       $dx = array();
	       $dx  = $this->get_data("meeting_tbl",['meet_id' =>$meet_id]);
	       $host_id = (count($dx)> 0)? $dx[0]->host_id : "";
	      	$premium_user = $this->check_premium_user('order_detail',$host_id) ;
	      	
	      	if(!$premium_user)
	      	{
	      	         $checksum = sha1("isMeetingRunningmeetingID=".$meet_id."6Me62Jphn4gU1lTvTfCHd4zfZ2VEyevaeNCfGAURtVo");
                     $url = "https://live.ailive.in/bigbluebutton/api/isMeetingRunning?meetingID=".$meet_id."&checksum=".$checksum;
    	           
	      	}else{
	                $checksum = sha1("isMeetingRunningmeetingID=".$meet_id."F6zvjud7xTCCqxJUd0R3j6mvJDSYefxU8AAClYgjo");
                     $url = "https://meet.ailive.in/bigbluebutton/api/isMeetingRunning?meetingID=".$meet_id."&checksum=".$checksum;
    	           }
	                                     
	                                        $curl_handle=curl_init();
                                              curl_setopt($curl_handle,CURLOPT_URL,$url);
                                              curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
                                              curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
                                              $buffer = curl_exec($curl_handle);
                                              curl_close($curl_handle);
                                              if (empty($buffer))
                                              {
                                                  return false;
                                                }
                                                 else{
                                                     $val_1 = explode("<running>", $buffer);
                                                     $val_2 =  explode("</running>", $val_1[1]);
                                                     $val =  $val_2[0];
                                                    
                                                   // echo "sk==".$val; die();
                                                    
                                                     return $res =  ($val == 'true')? true:false;
                                                 }
	   }
	  
	   function api_check_url_meeting($meet_id)
	   { 
	       $checksum = sha1("isMeetingRunningmeetingID=".$meet_id."F6zvjud7xTCCqxJUd0R3j6mvJDSYefxU8AAClYgjo");
          $url = "https://meet.ailive.in/bigbluebutton/api/isMeetingRunning?meetingID=".$meet_id."&checksum=".$checksum;
	       
	                                        $curl_handle=curl_init();
                                              curl_setopt($curl_handle,CURLOPT_URL,$url);
                                              curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
                                              curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
                                              $buffer = curl_exec($curl_handle);
                                              curl_close($curl_handle);
                                              if (empty($buffer))
                                              {
                                                  return false;
                                                }
                                                 else{
                                                     $val_1 = explode("<running>", $buffer);
                                                     $val_2 =  explode("</running>", $val_1[1]);
                                                     $val =  $val_2[0];
                                                    
                                                   // echo "sk==".$val; die();
                                                    
                                                     return $res =  ($val == 'true')? true:false;
                                                 }
	   } 
	   
  

	   
	function send_url($url)
	   {     
	        $curl_handle=curl_init();
              curl_setopt($curl_handle,CURLOPT_URL,$url);
              curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
              curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
              $buffer = curl_exec($curl_handle);
              curl_close($curl_handle);
              if (empty($buffer))
              {
                  return false;
                }
                 else{
	                    return true;
                 }
	    
	   }
	   
    function send_url_internal_meeting_id($url,$meet_id)
	   {     
	        $curl_handle=curl_init();
              curl_setopt($curl_handle,CURLOPT_URL,$url);
              curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
              curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
              $buffer = curl_exec($curl_handle);
              curl_close($curl_handle);
              if (empty($buffer))
              {
                  return false;
                }
                 else{
                    	 $val_1 = explode("<internalMeetingID>", $buffer);
                         $val_2 =  explode("</internalMeetingID>", $val_1[1]);
                         $val =  $val_2[0];
                        if($val)
                        {
                             $this->user_update('meeting_tbl',['meet_id'=>$meet_id],['internal_meet_id'=> $val,'create_url'=> $url]);
                        }
	                    return $res =  ($val)? true: false;
                 }
	    
	   }	   
	   
	   
	   
	   
function random_strings($length_of_string)
{ 
    $str_result = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefgh'; 
  
    return substr(str_shuffle($str_result),  
                       0, $length_of_string); 
} 

public function inserts_inquiry($data = array()){
     
         $inserts = $this->db->insert('inquirys',$data);
        if($inserts){
             return $this->db->insert_id();
         } else {
             return false;    
         }
     }



/*===========================this function use for two time ================================= */

   public function getTimeDiff($dtime,$atime)
    {
        $nextDay = $dtime>$atime?1:0;   
        $dep = explode(':',$dtime);
        $arr = explode(':',$atime);
        $diff = abs(mktime($dep[0],$dep[1],0,date('n'),date('j'),date('y'))-mktime($arr[0],$arr[1],0,date('n'),date('j')+$nextDay,date('y')));
        $hours = floor($diff/(60*60));
        $mins = floor(($diff-($hours*60*60))/(60));
        $secs = floor(($diff-(($hours*60*60)+($mins*60))));
        if(strlen($hours)<2){$hours="0".$hours;}
        if(strlen($mins)<2){$mins="0".$mins;}
        if(strlen($secs)<2){$secs="0".$secs;}
        return $hours.':'.$mins;
    }


}



?>






