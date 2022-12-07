 <?php
	 if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class Validate_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }
	
		
function valid_email($str) {
return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}

function valid_name($name)
	{
	  return (preg_match("#^[a-zA-Z-'\s]+$#", $name))? FALSE : TRUE;
	}



}


?>