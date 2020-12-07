<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
class User extends CI_Controller {
    public $DatabaseObj;
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Personal');
        $this->load->helper('url');
        $this->DatabaseObj = new Personal;
    }
    public function index() {
        if (isset($_SESSION['Auth'])) {
            $this->load->helper('url');
            redirect('http://localhost:8000/dashboard');
        } else {
            if (uri_string() == "login") {
                $this->load->view('login');
            } elseif (uri_string() == "register") {
                $this->load->view('register');
            }
        }
    }
    public function login() {
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        $email = $obj->email;
        $password = $obj->password;
        $data['data'] = $this->DatabaseObj->loginModel($email, $password);
        $flag = $data['data'];
        if ($flag['flag'] == true) {
            $_SESSION['Auth'] = true;
            $_SESSION['s_id'] = $flag['s_id'];
            $response['success'] = true;
            $response['s_id'] = $flag['s_id'];
            $response['data'] = $data;
            $this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
        } else {
            $response['success'] = true;
            $response['data'] = $data;
            $this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
        }
    }
    public function register() {
        $json = file_get_contents('php://input');
        $obj = json_decode($json);
        $flag = $obj->flag;
        if ($flag == 0) {
            $s_id = $obj->s_id;
            $batch_id = $obj->select_batch;
            $course_id = $obj->select_courses;
            $objective_of_learning = $obj->objective_learning;
            $data['data'] = $this->DatabaseObj->courseModel($s_id, $batch_id, $objective_of_learning, $course_id);
            $response['success'] = true;
            $response['data'] = $data;
            $flag = $data['data'];
            if ($flag['flag'] == true) {
                $_SESSION['Auth'] = true;
                $_SESSION['s_id'] = $flag['s_id'];
                $response['s_id'] = $flag['s_id'];
                $this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
            }
            $this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
        } else {
            $email = $obj->email;
            $password = $obj->password;
            $first_name = $obj->first_name;
            $last_name = $obj->last_name;
            $batch_id = $obj->select_batch;
            $course_id = $obj->select_courses;
            $objective_of_learning = $obj->objective_learning;
            $data['data'] = $this->DatabaseObj->registerModel($email, $password, $first_name, $last_name, $batch_id, $objective_of_learning, $course_id);
            $flag = $data['data'];
            if ($flag['flag'] == true) {
                $_SESSION['Auth'] = true;
                $_SESSION['s_id'] = $flag['s_id'];
                $response['s_id'] = $flag['s_id'];
                $response['success'] = true;
                $response['data'] = $data;
                $this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
            }
            $response['success'] = true;
            $response['data'] = $data;
            $this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
        }
    }
    public function logout() {
        unset($_SESSION['Auth']);
        unset($_SESSION['s_id']);
        unset($_SESSION['fname']);
        unset($_SESSION['lname']);
        $this->load->helper('url');
        redirect('http://localhost:8000/login');
    }
    public function course_register() {
        if (isset($_SESSION['Auth'])) {
            $this->load->view('register');
        } else {
            $this->load->helper('url');
            redirect('http://localhost:8000/login');
        }
    }
    public function get_courses() {
        $data['data'] = $this->DatabaseObj->getAllCourse();
        $response['success'] = true;
        $response['data'] = $data;
        if (isset($_SESSION['Auth'])) {
            $response['s_id'] = $_SESSION['s_id'];
            $this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
        } else {
            $response['s_id'] = null;
            $this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
        }
    }
}
