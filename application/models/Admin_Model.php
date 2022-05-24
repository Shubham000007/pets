<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Admin_Model extends CI_Model
{


    //*Check Login Info

    function getUserInfo($email, $password)
    {
        $this->db->select('name,email');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $this->db->where('status', "1");
        $this->db->from('user_master');
        return $this->db->get()->row_array();
    }

    //*Check Login Info Ends


    //!class Ends
}
