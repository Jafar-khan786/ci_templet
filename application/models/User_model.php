<?php error_reporting(E_ALL);
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model{
    function __construct() {
        $this->tableName = 'user_management';
       
        $this->primaryKey = 'id';
  
    }
    
    public function insert($data = array()){
     
        $insert = $this->db->insert($this->tableName,$data);
        if($insert){
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }

   public function delete($services_id)
   {
      $this->db->where('user_id',$services_id);
      $this->db->delete('user_tbl');

   }
  public function update_status($data,$id)
  {
    $this->db->where('user_id',$id);
    $this->db->update('user_tbl',$data);
  }
  public function updata($id,$data)
  {
    $this->db->where('user_id',$id);
    $this->db->update('user_tbl',$data);
  }

  
  
public function select_users()
  {
    $this->db->select('*');
    $this->db->from('user_management');
    $this->db->where('user_type',2);
    $this->db->order_by("id", "desc");
    $qry = $this->db->get();
    return $qry->result();
  }

   


}