<?php

class Lcp_Model extends CI_Model {

    // UNIVERSAL QUERIES
    
    public function fetch($table, $where=NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return ($query->num_rows()) ? $query->result() : false;
    }
    
    public function insertData($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->affected_rows();
    }

    public function updateData($table, $data, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->update($table, $data);
        return ($query == true) ? true : false;
    }

    public function deleteData($table, $where = NULL) {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $this->db->delete($table);
    }

    // PORTAL HOME QUERIES
    function get_post() {
        $this->db->select('*');
        $this->db->order_by('post_id', 'desc');  
        $this->db->from('post_tbl');
        $this->db->limit('4');
        $query = $this->db->get();
        return $query->result();
    }

    function fetchPostById($id){
        $this->db->where("post_id",$id); // WHERE item_id = $id
        $query = $this->db->get("post_tbl"); // Select * from item_tbl;
        return ($query->num_rows() > 0) ? $query->result() : false;
    }
    
    function updatepost($data,$id){
        $this->db->where("post_id",$id);
        $this->db->update('post_tbl',$data);
    }
    
    function deletepost($id){
        $this->db->where('post_id',$id);
        $this->db->delete('post_tbl');
    }

    function fetchAllPost(){
        $query = $this->db->get("post_tbl");
        return $query->result();
    }
    
    public function fetchAllRecord(){
        $query = $this->db->get("patient_tbl");
        return $query->result();
    }

    // APPOINTMENT QUERIES
    public function fetchDocClinic($id){
        return $this->db->select('*')->from('clinic_tbl')->where("doc_id =",$id)->get()->result();
    }

    public function get_events($start, $end,$id){
        return $this->db->where("start >=", $start)->where("end <=", $end)->where("doc_id =",$id)->get("sched_tbl");
    }

    public function add_event($data){
        $this->db->insert("sched_tbl", $data);
    }

    public function update_event($id, $data){
        $this->db->where("sched_id", $id)->update("sched_tbl", $data);
    }

    public function delete_event($id){
        $this->db->where("sched_id", $id)->delete("sched_tbl");
    }

    // ASSISTANT QUERIES
    public function fetchDoc($id){
        $this->db->select('CONCAT(user_tbl.user_fname,'.'" "'.',user_tbl.user_lname) AS doc_name, doc_tbl.doc_image, doc_tbl.doc_specialty, doc_tbl.user_id', FALSE);
        $this->db->from('clinic_tbl');
        $this->db->join('doc_tbl', 'doc_tbl.user_id = clinic_tbl.doc_id');
        $this->db->join('user_tbl', 'user_tbl.user_id = doc_tbl.user_id');
        $this->db->where('clinic_tbl.user_id', $id);
        $this->db->order_by("user_tbl.user_lname", "asc");
        $this->db->order_by("user_tbl.user_fname", "asc");
        $query = $this->db->get();
        return $query->result();
    }

    public function fetchAllDoc(){
        $this->db->select('CONCAT(user_lname,'.'", "'.',user_fname) AS doc_name, user_id', FALSE);
        $this->db->from('user_tbl');
        $this->db->where('user_type', 2);
        $this->db->order_by("user_lname", "asc");
        $this->db->order_by("user_fname", "asc");
        $query = $this->db->get();
        return $query->result();
    }

    public function deleteDocClinic($user, $where){
        $this->db->where('doc_id', $user);
        $this->db->where('user_id', $where);
        $this->db->delete('clinic_tbl');
    }

    public function fetchPat(){
        return $this->db->get("patient_tbl");
    }

    public function fetchDiagnosis($id){
        return $this->db->where('dia_user', $id)->get("diagnoses_tbl");
    }

    public function fetchLogs($id){
        return $this->db->where("user_id =",$id)->get("logs_tbl");
    }

    // ADMIN QUERIES
    
    function fetchAllAcc(){
        $query = $this->db->get("user_tbl");
        return $query->result();
    }

    function fetchAllLogs(){
        $query = $this->db->get("user_logs"); // Select * from item_tbl;
        return $query->result();
    }
}