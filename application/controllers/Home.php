<?php
defined('BASEPATH') or exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: content-type');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allow
class Home extends CI_Controller {
    public $DatabaseObj;
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('Personal');
        $this->DatabaseObj = new Personal;
    }
    public function index() {
        if (isset($_SESSION['Auth'])) {
            $data['data'] = $this->DatabaseObj->getAllCourse();
            $courses = $data['data'];
            $details = array();
            for ($i = 0;$i < count($courses);$i++) {
                array_push($details, $courses[$i]->name);
            }
            $details = array_unique($details);
            $this->load->view('navbar');
            $this->load->view('home', array('data' => $details));
        } else {
            $this->load->helper('url');
            redirect('http://localhost:8000/login');
        }
    }
    public function dashboard() {
        if (isset($_SESSION['Auth'])) {
            $s_id = $_SESSION['s_id'];
            $data['data'] = $this->DatabaseObj->UserModel($s_id);
            $myData = $data['data'];
            $User = $myData['User'];
            $courses = $myData['courses'];
            $details = array();
            for ($i = 0;$i < count($courses);$i++) {
                array_push($details, $courses[$i]->name);
            }
            $details = array_unique($details);
            $ans = array();
            foreach ($details as $value) {
                $c = count($ans);
                for ($j = 0;$j < count($User);$j++) {
                    if ($User[$j]->name == $value) {
                        array_push($ans, ['name' => $User[$j]->name, 'date' => $User[$j]->date, 'ispaid' => $User[$j]->is_paid]);
                        break;
                    }
                }
                if (count($ans) == $c) {
                    array_push($ans, ['name' => $value, 'date' => null, 'ispaid' => null]);
                }
            }
            $this->load->view('navbar');
            $this->load->view('dashboard', array('data' => $ans));
        } else {
            $this->load->helper('url');
            redirect('http://localhost:8000/login');
        }
    }
}
