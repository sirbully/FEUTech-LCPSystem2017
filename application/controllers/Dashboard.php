<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('lcp_model');
        $this->load->helper(array('form','string'));
        $this->load->library(array('email','form_validation'));
        
        if($this->session->has_userdata('isloggedin')==FALSE){
            redirect('portal');
        }
    }

    public function index(){
        if($this->session->userdata('user_type')==0):
            redirect('admin/dashboard');
        elseif($this->session->userdata('user_type')==1):
            redirect('clinic/dashboard');
        elseif($this->session->userdata('user_type')==2):
            redirect('doctor/index');
        elseif($this->session->userdata('user_type')==3):
            redirect('portal/appointment');
        elseif($this->session->userdata('user_type')==4):
            redirect('moderator/dashboard');
        else:
            redirect('dashboard/logout');
        endif;
    }

    public function jsonc(){
        // Our Start and End Dates
        $start = $this->input->get("start");
        $end = $this->input->get("end");
        $doc_id = $this->input->get("doc_id");

        $startdt = new DateTime('now'); // setup a local datetime
        $startdt->setTimestamp($start); // Set the date based on timestamp
        $start_format = $startdt->format('Y-m-d H:i:s');

        $enddt = new DateTime('now'); // setup a local datetime
        $enddt->setTimestamp($end); // Set the date based on timestamp
        $end_format = $enddt->format('Y-m-d H:i:s');

        $events = $this->lcp_model->get_events($start_format, $end_format, $doc_id);

        $data_events = array();
        foreach($events->result() as $r) {
            $data_events[] = array(
                "id" => $r->sched_id,
                "title" => $r->title,
                "description" => $r->description,
                "end" => $r->end,
                "start" => $r->start
            );
        }

        echo json_encode(array("events" => $data_events));
        exit();
    }

    public function jsonp(){
        $events = $this->lcp_model->fetchPat();

        $data_events = array();
        foreach($events->result() as $r) {
            $data_events[] = array(
                "patid" => $r->patient_id,
                "lname" => $r->lname,
                "fname" => $r->fname,
                "mname" => $r->mname,
            );
        }

        echo json_encode(array("patient" => $data_events));
        exit();
    }

    public function jsond(){
        $id = $this->input->get("pat_id");
        $events = $this->lcp_model->fetchDiagnosis($id);

        $data_events = array();
        foreach($events->result() as $r) {
            $data_events[] = array(
                "dgn" => $r->dia_dgn,
                "med" => $r->dia_med,
                "date" => date("M-j-Y h:i A",$r->dia_time),
                "doc" => $r->dia_doc,
            );
        }

        echo json_encode(array("diagnosis" => $data_events));
        exit();
    }

    public function jsonl(){
        $events = $this->lcp_model->fetchLogs($this->session->userdata('user_id'));

        $data_events = array();
        foreach($events->result() as $r) {
            $data_events[] = array(
                "timestamp" => date("M-j-Y h:i A",$r->logs_date),
                "user" => $r->user_act,
                "activity" => $r->logs_act,
            );
        }

        echo json_encode(array("logs" => $data_events));
        exit();
    }

    public function resched(){
        
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('portal');
    }
}