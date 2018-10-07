<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clinic extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('lcp_model');
        $this->load->helper(array('form','string'));
        $this->load->library(array('email','session','form_validation'));
        
        if($this->session->has_userdata('isloggedin') == FALSE || $this->session->userdata('user_type') != 1){
            redirect('dashboard');
        }
    }

    public function index(){
        redirect('clinic/dashboard');
    }
    
    // DASHBOARD

    function dashboard() {
        $doctor = array(
            "clinic" => $this->lcp_model->fetch('user_tbl', array('user_id'=>$this->session->userdata('user_id'))),
            "doctor" => $this->lcp_model->fetchDoc($this->session->userdata('user_id')),
            "alldoc" => $this->lcp_model->fetchAllDoc(),
        );
        $this->load->view('account/header-c',$doctor);
        $this->load->view('account/script/script-d');
        $this->load->view('account/sidebar-c');
        $this->load->view('account/dashboard');
        $this->load->view('account/sidelogs');
        $this->load->view('account/footer-c');
    }
    
    function addDocClinic(){
        $data = array(
            "doc_id" => $this->input->post('inputDoc'),
            "user_id" => $this->session->userdata('user_id'),
        );
        $this->lcp_model->insertData('clinic_tbl', $data);
        redirect('dashboard');
    }

    function deleteDocClinic(){
        $id = $this->uri->segment(3);
        $where = $this->session->userdata('user_id');
        $this->lcp_model->deleteDocClinic($id, $where);
        redirect('dashboard');
    }

    // CALENDAR
    
    function calendar() {
        $doctor = array(
            "clinic" => $this->lcp_model->fetch('user_tbl', array('user_id'=>$this->session->userdata('user_id'))),
            "doctor" => $this->lcp_model->fetchDoc($this->session->userdata('user_id')),
        );
        $this->load->view('account/header-c',$doctor);
        $this->load->view('account/script/script-c');
        $this->load->view('account/sidebar-c');
        $this->load->view('account/calendar');
    }

    function chooseDoc(){
        $doc = $this->input->post('doc-calendar');
        redirect("clinic/calendar/$doc");
    }

    function addapt(){
        $appt = array(
            'title' => $this->input->post('name'),
            'description' => $this->input->post('desc'),
            'start' => $this->input->post('start'),
            'end' => $this->input->post('end'),
            'doc_id' => $this->input->post('doc_id'),
            'clinic_id' => $this->session->userdata('user_id'),
        );
        
        $this->lcp_model->add_event($appt);
        redirect('clinic/calendar');
    }

    function resched(){
        $data = array(
            "start" => $this->uri->segment(4),
            "end" => $this->uri->segment(5),
        );
        $this->lcp_model->update_event($this->uri->segment(3),$data);
        redirect('clinic/calendar');
    }

    public function cancelappt(){
        $this->lcp_model->delete_event($this->uri->segment(3));
        redirect('clinic/calendar');
    }

    // PATIENT RECORDS
    
    function patient() {
        $doctor = array(
            "clinic" => $this->lcp_model->fetch('user_tbl', array('user_id'=>$this->session->userdata('user_id'))),
            "info" => $this->lcp_model->fetch('patient_tbl', array('patient_id'=>$this->uri->segment(3))),
        );
        if(empty($this->uri->segment(3))){
            $this->load->view('account/header-c',$doctor);
            $this->load->view('account/script/script-p');
            $this->load->view('account/sidebar-c');
            $this->load->view('account/patient');
            $this->load->view('account/sidelogs');
            $this->load->view('account/footer-c');
        } else{
            $this->load->view('account/header-c',$doctor);
            $this->load->view('account/script/script-p');
            $this->load->view('account/sidebar-c');
            $this->load->view('account/patientrec');
            $this->load->view('account/sidelogs');
            $this->load->view('account/footer-c');
        }
    }

    function addPat(){
        $msg = "err";
        $data = array(
            "fname" => $this->input->post('fname'),
            "mname" => $this->input->post('mname'),
            "lname" => $this->input->post('lname'),
            "sex" => $this->input->post('sex'),
            "height" => $this->input->post('height'),
            "weight" => $this->input->post('weight'),
            "btype" => $this->input->post('btype'),
            "email" => $this->input->post('email'),
            "cont" => $this->input->post('cont'),
            "street" => $this->input->post('street'),
            "city" => $this->input->post('city'),
            "state" => $this->input->post('state'),
            "bdate" => date("m-d-Y", strtotime($this->input->post("bdate")))
        );

        if(!preg_match('/[A-Za-z\s]+/', $data['fname']) || !preg_match('/[A-Za-z\s]+/', $data['mname']) ||
        !preg_match('/[A-Za-z\s]+/', $data['lname']) || empty($data['fname']) || empty($data['mname']) || empty($data['lname']) ||
        empty($data['sex']) || empty($data['height']) || empty($data['weight']) || empty($data['btype']) || empty($data['bdate']) ||
        empty($data['email']) || empty($data['cont']) || empty($data['street']) || empty($data['city']) || empty($data['state']) ||
        !preg_match('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/', $data['email'])){ 
            echo $msg; } else { $msg = "no err"; echo $msg; }

        if($msg == "no err"){
            if($this->lcp_model->insertData('patient_tbl',$data)){
                $msg = "ok"; echo $msg;
            } else {$msg = "bad"; echo $msg; }
        }
    }

    function editPat(){
        $msg = "err";
        $data = array(
            "fname" => $this->input->post('fname'),
            "mname" => $this->input->post('mname'),
            "lname" => $this->input->post('lname'),
            "sex" => $this->input->post('sex'),
            "height" => $this->input->post('height'),
            "weight" => $this->input->post('weight'),
            "btype" => $this->input->post('btype'),
            "email" => $this->input->post('email'),
            "cont" => $this->input->post('cont'),
            "street" => $this->input->post('street'),
            "city" => $this->input->post('city'),
            "state" => $this->input->post('state'),
            "bdate" => date("m-d-Y", strtotime($this->input->post("bdate")))
        );

        if(!preg_match('/[A-Za-z\s]+/', $data['fname']) || !preg_match('/[A-Za-z\s]+/', $data['mname']) ||
        !preg_match('/[A-Za-z\s]+/', $data['lname']) || empty($data['fname']) || empty($data['mname']) || empty($data['lname']) ||
        empty($data['sex']) || empty($data['height']) || empty($data['weight']) || empty($data['btype']) || empty($data['bdate']) ||
        empty($data['email']) || empty($data['cont']) || empty($data['street']) || empty($data['city']) || empty($data['state']) ||
        !preg_match('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/', $data['email'])){ 
            echo $msg; } else { $msg = "no err"; echo $msg; }

        if($msg == "no err"){
            if($this->lcp_model->updateData('patient_tbl',$data,array('patient_id' => $this->input->post('where')))){
                $msg = "ok"; echo $msg;
            } else {$msg = "bad"; echo $msg; }
        }
    }

    // LOGS
    
    function logs() {
        $doctor = array(
            "clinic" => $this->lcp_model->fetch('user_tbl', array('user_id'=>$this->session->userdata('user_id'))),
        );
        $this->load->view('account/header-c',$doctor);
        $this->load->view('account/script/script-l');
        $this->load->view('account/sidebar-c');
        $this->load->view('account/logs');
    }

    // SETTINGS
    
    function settings() {
        $doctor = array(
            "clinic" => $this->lcp_model->fetch('user_tbl', array('user_id'=>$this->session->userdata('user_id'))),
        );
        $this->load->view('account/header-c',$doctor);
        $this->load->view('account/sidebar-c');
        $this->load->view('account/settings');
        $this->load->view('account/sidelogs');
        $this->load->view('account/footer-c');
    }

    function updatePass(){

    }
}