<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Kolkata');

class Admin extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_Model');
    }


    function login()
    {
        if ($this->session->userdata('email')) {
            redirect("Admin/dashboard");
        }
        $this->load->view("Admin/login");
    }



    //*Authenticate user 


    function authauthorize_user()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $email = trim($this->input->post('email'));
        $password = trim($this->input->post('password'));
        $hash = md5($password);

        $checkUSer = $this->Admin_Model->getUserInfo($email, $hash);
        if (empty($checkUSer)) {
            echo "unmatched";
        } else {
            $sessionData = array(
                'name' => $checkUSer['name'],
                'email' => $checkUSer['email']
            );
            $this->session->set_userdata($sessionData);
            if ($this->session->userdata('email')) {
                echo "success";
            } else {
                echo "failed";
            }
        }
    }

    //*Authenticate user Ends



    //* Logout user 

    function logout()
    {
        $this->session->sess_destroy();
        redirect("admin/login");
    }

    //* Logout user Ends


    // Dashbaord 
    // function dashboard()
    // {
    //     if (!$this->session->userdata('email')) {
    //         redirect("admin");
    //     }
    //     $this->adminTheme('Admin/dashboard');
    // }
    // Dashbaord Ends


    //*Manage Banner
    function manage_banner()
    {
        if (!$this->session->userdata('email')) {
            redirect("admin/login");
        }
        $this->adminTheme('Admin/manage_banner');
    }
    //*Manage Banner Ends

    //* Manage Gallery 

    function manage_gallery()
    {
        if (!$this->session->userdata('email')) {
            redirect("admin/login");
        }
        $this->adminTheme('Admin/manage_gallery');
    }

    //* Manage Gallery  Ends

    //* Add Banner 

    function add_banners()
    {
        if (!$this->session->userdata('email')) {
            redirect("admin/login");
        }
        $this->adminTheme('Admin/add_banners');
    }

    //* Add Banner  ENds

    //* upload Banner

    function upload_banner()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        if (!is_dir(DocumentRoot . "assets/banners")) {
            mkdir(DocumentRoot . "assets/banners", 0777, TRUE);
        }

        if ($_FILES['choose_banner']['size'] != 0) {
            $upload_dir = DocumentRoot . "assets/banners";
            $config['upload_path'] = $upload_dir;
            $config['allowed_types'] = '*';
            $config['file_name'] =  time() . mt_rand(100, 100000000000) . '_banners';
            $config['overwrite'] = false;
            $config['remove_spaces'] = true;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('choose_banner')) {
                $banner = $this->upload->data();
                $banner = $banner['file_name'];
            } else {
                // echo $this->upload->display_errors();
                echo "failed";
                exit();
            }
        } else {
            echo "failed";
            exit();
        }

        $insertBanner = array(
            'banner_image	' => $banner,
            'upload_by' => trim($this->session->userdata('name'))
        );
        $insert = $this->db->insert('banner_master', $insertBanner);
        if ($insert) {
            echo "success";
        } else {
            echo "failed";
        }
    }

    //* upload Banner Ends


    //* Show All banners 

    function show_all_banners()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $requestData    = $_REQUEST;
        $columns = array(
            0 => 'id',
            1 => 'action',
            2 => 'banner_image',
            3 => 'status',
            4 => 'upload_by'
        );

        $sql = "SELECT *  FROM `" . $this->db->dbprefix('banner_master') . "` WHERE 1=1";

        if (!empty($requestData['search']['value'])) {
            $sql .= " AND (upload_by LIKE '" . $requestData['search']['value'] . "%')";
        }


        $totalFiltered = $this->db->query($sql)->num_rows();
        $totalData     = $totalFiltered;
        $sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "  LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
        $query['data'] = $this->db->query($sql)->result_array();
        $data          = array();
        $counter       = 0;
        foreach ($query['data'] as $val) {
            $nestedData = array();
            $counter++;
            $id = $val['id'];

            if (($val['status'] == "0")) {
                $action = '&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="deleteBanner(' . "'" .  $val['id'] . "'" . ',' . "'" .  $val['banner_image'] . "'" . ')"  data-toggle="tooltip" data-placement="bottom" title="Delete Banner"><i class="fas fa-trash-alt" aria-hidden="true" style="color:darkorange;"></i></span></a>&nbsp;';
                $action .= '&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="activate_banner(' . "'" .  $val['id'] . "'" . ')"  data-toggle="tooltip" data-placement="bottom" title="Activate Banner"><i class="fas fa-check" aria-hidden="true" style="color:dodgerblue;"></i></span></a>&nbsp;';
            } else {
                $action = '-';
            }

            if ((!empty($val['banner_image']))) {
                $imagePath = base_url() . "assets/banners/" . $val['banner_image'];
                $path = '<a href="' . $imagePath . '" target="_blank"><img src="' . $imagePath . '" width="60" height="60" title="Click to View Image" /></a>';
            } else {
                $path = "-";
            }

            if (($val['status'] == "0")) {
                $status = "<p class='text-danger font-weight-bold'>Not Active</p>";
            } else {
                $status = "<p class='text-success font-weight-bold'>Active</p>";
            }


            if (!empty($id)) {
                $nestedData = array(
                    'id' => $counter,
                    'action' => $action,
                    'banner_image' => $path,
                    'status' => $status,
                    'upload_by' => $val['upload_by'],
                );
            }
            $data[] = $nestedData;
        }


        $json_data = array(
            "draw" => intval($requestData['draw']),
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered),
            "records" => $data // total data array
        );

        echo json_encode($json_data);
    }

    //* Show All banners Ends

    //* Delete Banner 
    function delete_banner()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $id = $_REQUEST['id'];
        $imageName = $_REQUEST['imageName'];


        $unlink = DocumentRoot . "assets/banners/" . $imageName;
        if (unlink($unlink)) {
            $this->db->where('id', $id);
            $delete = $this->db->delete('banner_master');
            if ($delete) {
                echo "success";
            } else {
                echo "failed";
            }
        } else {
            echo "failed";
        }
    }
    //* Delete Banner  Ends

    //* Activate Banner

    function activate_banner()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $id = $_REQUEST['id'];

        //* deactiving older  banenr
        $deactiveBanner = array(
            'status' => '0',
        );
        $this->db->where('status', "1");
        $update = $this->db->update('banner_master', $deactiveBanner);
        if ($update) {
            $activateBanner = array(
                'status' => '1',
            );
            $this->db->where('id', $id);
            $update2 = $this->db->update('banner_master', $activateBanner);
            if (($update2)) {
                echo "success";
            } else {
                echo "failed";
            }
        } else {
            echo "failed";
        }
    }

    //* Activate Banner Ends


    //* upload Gallery Image

    function add_gallery_form_data()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        if (!is_dir(DocumentRoot . "assets/gallery")) {
            mkdir(DocumentRoot . "assets/gallery", 0777, TRUE);
        }

        if ($_FILES['choose_gallery_image']['size'] != 0) {
            $upload_dir = DocumentRoot . "assets/gallery";
            $config['upload_path'] = $upload_dir;
            $config['allowed_types'] = '*';
            $config['file_name'] =  time() . mt_rand(100, 100000000000) . '_gallery_image';
            $config['overwrite'] = false;
            $config['remove_spaces'] = true;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('choose_gallery_image')) {
                $gallery = $this->upload->data();
                $gallery = $gallery['file_name'];
            } else {
                // echo $this->upload->display_errors();
                echo "failed";
                exit();
            }
        } else {
            echo "failed";
            exit();
        }

        $insertGalleryImage = array(
            'image	' => $gallery,
            'title	' => $this->input->post('image_title'),
            'upload_by' => trim($this->session->userdata('name'))
        );
        $insert = $this->db->insert('gallery_master', $insertGalleryImage);
        if ($insert) {
            echo "success";
        } else {
            echo "failed";
        }
    }

    //* upload Gallery Image Ends

    //* Show All Gallery Images

    function show_all_gallery_images()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
        $requestData    = $_REQUEST;
        $columns = array(
            0 => 'id',
            1 => 'action',
            2 => 'image',
            3 => 'title',
            4 => 'upload_by'
        );

        $sql = "SELECT *  FROM `" . $this->db->dbprefix('gallery_master') . "` WHERE 1=1";

        // if (!empty($requestData['search']['value'])) {
        //     $sql .= " AND (upload_by LIKE '" . $requestData['search']['value'] . "%')";
        // }


        $totalFiltered = $this->db->query($sql)->num_rows();
        $totalData     = $totalFiltered;
        $sql .= " ORDER BY " . $columns[$requestData['order'][0]['column']] . "   " . $requestData['order'][0]['dir'] . "  LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
        $query['data'] = $this->db->query($sql)->result_array();
        $data          = array();
        $counter       = 0;
        foreach ($query['data'] as $val) {
            $nestedData = array();
            $counter++;
            $id = $val['id'];

            $action = '&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" onclick="deleteGalleryImage(' . "'" .  $val['id'] . "'" . ',' . "'" .  $val['image'] . "'" . ')"  data-toggle="tooltip" data-placement="bottom" title="Delete Image"><i class="fas fa-trash-alt" aria-hidden="true" style="color:darkorange;"></i></span></a>&nbsp;';

            if ((!empty($val['image']))) {
                $imagePath = base_url() . "assets/gallery/" . $val['image'];
                $path = '<a href="' . $imagePath . '" target="_blank"><img src="' . $imagePath . '" width="60" height="60" title="Click to View Image" /></a>';
            } else {
                $path = "-";
            }


            if (!empty($id)) {
                $nestedData = array(
                    'id' => $counter,
                    'action' => $action,
                    'image' => $path,
                    'title' => $val['title'],
                    'upload_by' => $val['upload_by'],
                );
            }
            $data[] = $nestedData;
        }


        $json_data = array(
            "draw" => intval($requestData['draw']),
            "recordsTotal" => intval($totalData), // total number of records
            "recordsFiltered" => intval($totalFiltered),
            "records" => $data // total data array
        );

        echo json_encode($json_data);
    }

    //* Show All Gallery Images Ends


    //* Delete Gallery Images

    function delete_gallery_image()
    {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $id = $_REQUEST['id'];
        $imageName = $_REQUEST['imageName'];


        $unlink = DocumentRoot . "assets/gallery/" . $imageName;
        if (unlink($unlink)) {
            $this->db->where('id', $id);
            $delete = $this->db->delete('gallery_master');
            if ($delete) {
                echo "success";
            } else {
                echo "failed";
            }
        } else {
            echo "failed";
        }
    }

    //* Delete Gallery Images Ends


    //! Class Ends
}
