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

    //* gallery Pages

    function gallery()
    {
        $data['gallery'] = $this->Pets_Model->get_gallery();
        $this->load->view('header');
        $this->load->view('navigation');
        $this->load->view('gallery', $data);
        $this->load->view('footer');
    }

    //* gallery Pages Ends


    //* Add Booking form Data

    function booking_enq_form_data()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }


        $insertBookingData = array(
            'returning_new' => trim($this->input->post('new_returning')),
            'first_name' => trim($this->input->post('name')),
            'last_name' => trim($this->input->post('surname')),
            'street_address' => trim($this->input->post('address')),
            'address_line_2' => trim($this->input->post('address_line_2')),
            'city' => trim($this->input->post('city')),
            'state' => trim($this->input->post('state')),
            'contact_number' => trim($this->input->post('phone')),
            'email' => trim($this->input->post('email')),
            'drop_off_date' => trim($this->input->post('drop_of_date')),
            'drop_off_eta' => trim($this->input->post('drop_of_eta')),
            'pick_up_date' => trim($this->input->post('pick_up_date')),
            'collection_io_eta' => trim($this->input->post('collection_eta')),
            'animal_booking_for' => trim($this->input->post('animal_looking_for')),
            'animal_name' => trim($this->input->post('animal_name')),
            'is_animal_desexed' => $this->input->post('is_desexed') ?? "",
            'animal_vaccine_requirement' => $this->input->post('vaccine_info') ?? "",
            'animal_age' => trim($this->input->post('animal_age')),
            'animal_dob' => trim($this->input->post('animal_dob')),
            'animal_gender' => $this->input->post('animal_gender')?? "",
            'animal_breed' => trim($this->input->post('breed')),
            'current_vet_clinic' => trim($this->input->post('current_clinic')),
            'medication_required' => trim($this->input->post('medication_required')),
            'behaviour_issue' => trim($this->input->post('behaviourial_issue')),
            'accomodation' => $this->input->post('accoumodation')?? "",
        );

        $insert = $this->db->insert('booking_enquiry_master', $insertBookingData);
        if ($insert) {
            echo "success";
        } else {
            echo "failed";
        }
    }

    //* Add Booking form Data ENds


    //! Class ends
}
