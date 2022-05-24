<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->clear_cache();
    }

    function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }


    // For ADmin Theme 

    function adminTheme($view)
    {
        $this->load->view("Admin/header.php");
        // $this->load->view("Admin/navbar.php");
        $this->load->view("Admin/sidebar.php");
        $this->load->view($view);
        $this->load->view("Admin/footer.php");
    }

    function adminThemeData($view, $data)
    {
        $this->load->view("Admin/header.php");
        // $this->load->view("Admin/navbar.php");
        $this->load->view("Admin/sidebar.php");
        $this->load->view($view, $data);
        $this->load->view("Admin/footer.php");
    }

    // For ADmin Theme Ends

    // For Website 

    function homeTheme($view)
    {
        $this->load->view("Website/Home/header.php");
        $this->load->view($view);
        $this->load->view("Website/footer.php");
    }


    function homeThemeData($view, $data)
    {
        $this->load->view("Website/Home/header.php");
        $this->load->view($view);
        $this->load->view("Website/footer.php");
    }



    function theme($view)
    {
        $this->load->view("Website/header.php");
        $this->load->view($view);
        $this->load->view("Website/footer.php");
    }


    function themeData($view, $data)
    {
        $this->load->view("Website/header.php");
        $this->load->view($view, $data);
        $this->load->view("Website/footer.php");
    }



    // For Website  Ends
}
