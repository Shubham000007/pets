<?php defined('BASEPATH') or exit('No direct script access allowed');
class Pets_Model extends CI_Model
{

    //* Get Banners

    function get_active_banner()
    {
        $this->db->select('banner_image');
        $this->db->where('status', "1");
        $this->db->from('banner_master');
        return $this->db->get()->row_array();
    }

    //* Get Banners Ends


    //* Gallery

    function get_gallery()
    {
        $this->db->select('image,title');
        $this->db->from('gallery_master');
        return $this->db->get()->result_array();
    }

    //* Gallery Ends


    //! class Ends
}
