<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('lcp_model');
        $this->load->helper(array('form','string'));
        $this->load->library(array('email','form_validation','recaptcha'));
        
        if($this->session->has_userdata('isloggedin')==TRUE){
            redirect('dashboard');
        }
    }

    public function index(){
        $this->load->view('landing/login');
    }
    
    public function login() {
        $login_cred = array(
            'user_uname' => $this->input->post('user'),
            'user_pass' => $this->input->post('pass'),
        );
        
        $user = $this->lcp_model->fetch('user_tbl',$login_cred);
        if(!$user): //if not existing user
            $this->session->set_flashdata('exist',1);
            redirect('landing');
        else: //else validate account
            $user = $user[0];
            if(!$user->active):
                $this->session->set_flashdata('ban',1);
                redirect('landing');
            else:
                $this->session->set_userdata(array(
                    'user_id'=> $user->user_id,
                    'user_type'=> $user->user_type,
                    'isloggedin' => TRUE,
                ));

                redirect('dashboard');
            endif;
        endif;
    }
    
    public function register() {
        $this->form_validation->set_rules('g-recaptcha-response', "CAPTCHA", "required|callback_checkrecaptcha");

        if (!$this->form_validation->run()){
            $captcha = array(
                'widget' => $this->recaptcha->getWidget(),
                'myscript' => $this->recaptcha->getScriptTag()
            );
            $this->load->view('landing/register',$captcha);
        }
    }

    public function regsub(){    
        $v = random_string('alnum',15);
        $user = array(
            'user_uname' => $this->input->post('uname'),
            'user_pass' => $this->input->post('pass'),
            'user_type' => 3,
            'reg_at' => time(),
            'active' => 0,
            'vcode' => $v
        );

        $ev1 = array('doc_email'=>$this->input->post('email'));
        $ev2 = array('patient_email'=>$this->input->post('email'));
        $verifydoc = $this->lcp_model->fetch('doc_tbl',$ev1);
        $verifypat = $this->lcp_model->fetch('patient_tbl',$ev2);

        if($verifydoc||$verifypat): // check if existing user
            $this->session->set_flashdata('exist',1);
            redirect('landing/register');
        else: // else insert to database
            if(!$this->lcp_model->insertData('user_tbl',$user)): // if insert fails
                $this->session->set_flashdata('fail',1);
                redirect('landing/register');
            else: // else send email verification
                $code = array(
                    "title" => "Registration Almost Complete!",
                    "content" => "To complete the registration process, please verify your account by clicking the link below:",
                    "func" => "verify",
                    "code" => $v
                );

                $this->email->from('krizzabullecer@gmail.com', 'Admin');
                $this->email->to($this->input->post('email'));
                $this->email->subject('Email Verification');
                $this->email->message($this->load->view('mail',$code,true));

                $result = $this->email->send();
                //echo $result;
                
                if ($result): // if send email sucess
                    $this->session->set_flashdata('done',1);
                    redirect("appointment");
                else: // else remain in register page
                    $this->session->set_flashdata('fail',1);
                    redirect("landing/register");
                endif;
            endif;
        endif;
    }
    
    public function checkrecaptcha($response){
        if(!empty($response)){
            $response = $this->recaptcha->verifyResponse($response);
            if($response['success'] === TRUE){
                return true;
            }else{
                return false;
            }
        }
    }
    
    public function verify() {
        $data = array("verify"=>1);
        $this->lcp_model->updateData('user_tbl',$data,array('vcode'=>$this->uri->segment(3)));
        $this->session->set_flashdata('verified',1);
        redirect("portal");
    }
    
    public function forgot() {
        $this->lcp_validation->set_rules('email',"Email","required|valid_email");
        
        if ($this->form_validation->run() == FALSE){
            $this->load->view('forgot_form');
        } else {
            $v = random_string('alnum',15);
            $ev1 = array('doc_email'=>$this->input->post('email'));
            $ev2 = array('patient_email'=>$this->input->post('email'));
            $verifydoc = $this->lcp_model->fetch('doc_tbl',$ev1);
            $verifypat = $this->lcp_model->fetch('patient_tbl',$ev2);
            
            if(!$verifydoc||!$verifypat){ // check if existing email
                $this->session->set_flashdata('exist',1);
                redirect("landing/forgot");
            } else { // else insert to database
                if(!$this->lcp_model->updateData('doc_tbl',array("vcode"=>$v),$ev1)||
                        !$this->lcp_model->updateData('patient_tbl',array("vcode"=>$v),$ev2)){ // if update fails
                    $this->session->set_flashdata('fail',1);
                    redirect("landing/forgot");
                } else{ // else send email verification
                    $code = array(
                        "title" => "Password Reset",
                        "content" => "To reset your password, please click the link below:",
                        "code" => $v
                    );

                    $this->email->from('krizzabullecer@gmail.com', 'Admin');
                    $this->email->to($this->input->post('email'));
                    $this->email->subject('Password Reset');
                    $this->email->message($this->load->view('mail',$code,true));

                    $result = $this->email->send();
                    //echo $result;
                    
                    if ($result){ // if send email success
                        $this->session->set_flashdata('done',1);
                        redirect("portal");
                    } else{ // else remain in register page
                        $this->session->set_flashdata('fail',1);
                        redirect("landing/forgot");
                    }
                }
            }
        }
    }
    
    public function reset() {
        $this->form_validation->set_rules('new_pass',"Password","required|min_length[8]");
        $this->form_validation->set_rules('vnew_pass',"Verify Password","required|matches[new_pass]");
        
        if($this->form_validation->run() == FALSE):
            $this->load->view('reset_form',array("code"=>$this->uri->segment(3)));
        else:
            $data = array('user_pass'=>$this->input->post('new_pass'));
            $this->lcp_model->updateData('user_tbl',$data,array('vcode'=>$this->input->post('code')));
            $this->session->set_flashdata('changed',1);
            redirect('landing');
        endif;
    }
}