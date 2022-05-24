<?php
class Pets extends CI_Controller
{

    //* Cache function
    function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }

    function __construct()
    {
        parent::__construct();
        $this->clear_cache();
        $this->load->model('Pets_Model');
    }


    //* Index page 

    function index()
    {
        $data['banner'] = $this->Pets_Model->get_active_banner();
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('index', $data);
        $this->load->view('footer');
    }

    //* Index page  Ends


    //* About Us Page

    function about()
    {
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('about_us');
        $this->load->view('footer');
    }

    //* About Us Page Ends


    //* Booking Enquiry Page 

    function booking_eqnuiry()
    {
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('booking_eqnuiry');
        $this->load->view('footer');
    }

    //* Booking Enquiry Page Ends


    //* Privacy Policies Pages

    function privacy_policies()
    {
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('privacy_policies');
        $this->load->view('footer');
    }

    //* Privacy Policies Pages Ends


    //! Class ends
}
