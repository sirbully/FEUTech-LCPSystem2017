<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portal extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('lcp_model');
        $this->load->helper(array('form','string'));
        $this->load->library(array('email','session','form_validation'));
    }

    public function index() {
        redirect('portal/home');
    }

    public function home(){
        $post = array('post' => $this->lcp_model->get_post()); 
        $this->load->view("portal/includes/header",$post);
        $this->load->view("portal/includes/navbar");
        $this->load->view("portal/home");
        $this->load->view("portal/includes/footer");
    }

    public function transparency() {
        $this->load->view("portal/transparency");
    }
    
    public function contact(){ 
        $this->load->view("portal/contact_us");
    }
    
    public function appointment() {
        $doctor = array(
            "alldoc" => $this->lcp_model->fetchAllDoc(),
            "user" => $this->lcp_model->fetch('user_tbl',array("user_id" => $this->session->userdata('user_id'))),
        );

        if(empty($this->uri->segment(3))){
            $this->load->view("portal/includes/header",$doctor);
            $this->load->view("portal/includes/script-a");
            $this->load->view("portal/includes/navbar");
            $this->load->view("portal/appointment");
            $this->load->view("portal/includes/footer");
        } else{
            $this->load->view("portal/includes/header",$doctor);
            $this->load->view("portal/includes/script-a");
            $this->load->view("portal/includes/navbar");
            $this->load->view("portal/appointment");
            $this->load->view("portal/includes/footer");
        }
    }
    
    public function chooseDoc(){
        $doc = $this->input->post('doc-calendar');
        redirect("portal/appointment/$doc");
    }

    public function addapt(){
        $clinic = $this->lcp_model->fetchDocClinic($this->input->post('doc_id'));
        
        $appt = array(
            'title' => $this->input->post('name'),
            'description' => "Appointment with ".$this->input->post('name'),
            'start' => $this->input->post('start'),
            'end' => $this->input->post('end'),
            'doc_id' => $this->input->post('doc_id'),
            'clinic_id' => $clinic[0]->user_id,
            'pat_fk' => $this->session->userdata('user_id'),
        );
        
        $this->lcp_model->add_event($appt);
        redirect('portal/appointment');
    }
}