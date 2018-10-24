<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('lcp_model');
        $this->load->helper(array('form','string'));
        $this->load->library(array('email','session','form_validation'));
        
        if($this->session->has_userdata('isloggedin') == FALSE ||
        $this->session->userdata('user_type') != 2){
            redirect('dashboard');
        }
    }

    function index(){
        redirect('doctor/calendar');
    }
    
    function calendar() {
        $doctor = array(
            "clinic" => $this->lcp_model->fetch('user_tbl', array('user_id'=>$this->session->userdata('user_id'))),
            "doctor" => $this->lcp_model->fetchDoc($this->session->userdata('user_id')),
        );
        $this->load->view('account/header-c',$doctor);
        $this->load->view('account/script/script-cd');
        $this->load->view('account/sidebar-d');
        $this->load->view('account/calendar-d');
    }

    function addapt(){
        $clist = $this->lcp_model->getClinicId();
        foreach ($clist as $c):
            if ($this->input->post('doc_id')==$c->doc_id ) { $clinic_id = $c->user_id; }
        endforeach;

        $appt = array(
            'title' => $this->input->post('name'),
            'description' => $this->input->post('desc'),
            'start' => $this->input->post('start'),
            'end' => $this->input->post('end'),
            'doc_id' => $this->input->post('doc_id'),
            'clinic_id' => $clinic_id,
        );
        
        $this->lcp_model->add_event($appt);
        redirect('doctor/calendar');
    }

    function resched(){
        $data = array(
            "start" => $this->uri->segment(4),
            "end" => $this->uri->segment(5),
        );
        $this->lcp_model->update_event($this->uri->segment(3),$data);
        redirect('doctor/calendar');
    }

    public function cancelappt(){
        $this->lcp_model->delete_event($this->uri->segment(3));
        redirect('doctor/calendar');
    }

    function patient(){
        $doctor = array(
            "clinic" => $this->lcp_model->fetch('user_tbl', array('user_id'=>$this->session->userdata('user_id'))),
            "info" => $this->lcp_model->fetch('patient_tbl', array('patient_id'=>$this->uri->segment(3))),
        );
        if(empty($this->uri->segment(3))){
            $this->load->view('account/header-c',$doctor);
            $this->load->view('account/script/script-p');
            $this->load->view('account/sidebar-d');
            $this->load->view('account/patient');
            $this->load->view('account/sidelogs');
            $this->load->view('account/footer-c');
        } else{
            $this->load->view('account/header-c',$doctor);
            $this->load->view('account/script/script-p');
            $this->load->view('account/sidebar-d');
            $this->load->view('account/patientrec');
            $this->load->view('account/sidelogs');
            $this->load->view('account/footer-c');
        }
    }
    
    function logs() {
        $doctor = array(
            "clinic" => $this->lcp_model->fetch('user_tbl', array('user_id'=>$this->session->userdata('user_id'))),
        );
        $this->load->view('account/header-c',$doctor);
        $this->load->view('account/script/script-l');
        $this->load->view('account/sidebar-d');
        $this->load->view('account/logs');
    }
    
    function settings() {
        $doctor = array(
            "clinic" => $this->lcp_model->fetch('user_tbl', array('user_id'=>$this->session->userdata('user_id'))),
        );
        $this->load->view('account/header-c',$doctor);
        $this->load->view('account/sidebar-d');
        $this->load->view('account/settings');
        $this->load->view('account/sidelogs');
        $this->load->view('account/footer-c');
    }
}