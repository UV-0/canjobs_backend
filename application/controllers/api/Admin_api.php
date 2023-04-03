<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';

class Admin_api extends REST_Controller{

  public function __construct(){

    parent::__construct();
    //load database
    $this->load->database();
    $this->load->model(array("admin_model"));
    $this->load->library(array("form_validation"));
    $this->load->library('Authorization_Token');
    $this->load->helper("security");
    $this->load->helper('url');
  }

  /*
    INSERT: POST REQUEST TYPE
    UPDATE: PUT REQUEST TYPE
    DELETE: DELETE REQUEST TYPE
    LIST: Get REQUEST TYPE
  */

  public function addAdmin_post(){
    // insert data method

    // print_r( $existing_email = $this->post());die;

    // collecting form data inputs
     $data = json_decode(file_get_contents("php://input"));
    // print_r($data->name);die;
    // $name = $this->security->xss_clean($data->name);
    // $email = $this->security->xss_clean($data->email);
    // $password = $this->security->xss_clean($data->password);
    // $admin_type = $this->security->xss_clean($data->admin_type);

    
     $existing_email = $data->email;
     $existing_admin = $this->admin_model->get_admin_by_email($existing_email);
        if($existing_admin){
        $this->response(array(
        "status" => 0,
        "message" => "Admin already exists"
        ), REST_Controller::HTTP_CONFLICT);
        return;
        }
        // echo($name);
        // echo($email);
        // echo($password);
        // echo($admin_type);die;
        if(isset($data->name) && isset($data->email)  && isset($data->password) && isset($data->admin_type))
        { 
        $error_flag=0; 
    if(empty($data->name) || empty($data->email) || empty($data->password) || empty($data->admin_type)){
         $error_flag = 1;
        }
         if($error_flag){
            $this->response(array(
            "status" => 0,
            "message" => "All fields are required!"
          ) , REST_Controller::HTTP_NOT_FOUND);
         return;
        }
        // all values are available
        $admin = array(
         
          "name" => $data->name,
          "email" => $data->email,
          "password" => md5($data->password),
          "admin_type" => $data->admin_type,
        
        );
       
        // print_r($admin); die;
        if($this->admin_model->insert_admin($admin)){

          $this->response(array(
            "status" => 1,
            "message" => "Admin has been registered"
          ), REST_Controller::HTTP_OK);
          return;
        }else{

          $this->response(array(
            "status" => 0,
            "message" => "Failed to create admin"
          ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
          return;
        }
      }else{
        // we have some empty field
        $this->response(array(
          "status" => 0,
          "message" => "All fields are needed!"
        ), REST_Controller::HTTP_NOT_FOUND);
      }
    }
    

 
  public function followUp_post(){
     $data = json_decode(file_get_contents("php://input"));
    //  print_r($data);die;
      if(isset($data->admin_id) && isset($data->job_id)  && isset($data->employee_id) && isset($data->remark))
      { 
         $error_flag = 0;
      
        if(empty($data->admin_id) || empty($data->job_id) || empty($data->employee_id) || empty($data->remark))
        {
            $error_flag = 1;
        }
         if($error_flag){
            $this->response(array(
            "status" => 0,
            "message" => "All fields are required!"
          ) , REST_Controller::HTTP_NOT_FOUND);
         return;
        }
        $followup_detail = array(
          "admin_id" => $data->admin_id,
          "job_id" => $data->job_id,
          "employee_id" => $data->employee_id,
          "remark" => $data->remark,
        );
        if(isset($data->next_date)){
          if(!empty($data->next_date)){
            $followup_detail["next_followup_date"]=$data->next_date;
          }
        }
        // print_r($followup_detail);die;
     if($this->admin_model->addFollowup($followup_detail)){

            $this->response(array(
              "status" => 1,
              "message" => "Employee data updated successfully"
            ), REST_Controller::HTTP_OK);
        }else{

          $this->response(array(
            "status" => 0,
            "messsage" => "Failed to update Employee data"
          ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
      
      }else{

        $this->response(array(
          "status" => 0,
          "message" => "All fields are needed"
        ), REST_Controller::HTTP_NOT_FOUND);
      }
}
public function followup_get(){
    // $data = json_decode(file_get_contents("php://input"));
    $id = array(
      "job_id" => $this->get('job_id'),
      "employee_id" => $this->get('employee_id'),
    );
    // print_r($id);die;
      $employee = $this->admin_model->getFollowup($id);
      if(count($employee)>0){

        $this->response(array(
          "status" => 1,
          "message" => "Employees found",
          "data" => json_encode($employee)
        ), REST_Controller::HTTP_OK);
      }else{

        $this->response(array(
          "status" => 0,
          "message" => "No Employee found",
          "data" => $employee
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }
}