<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';

class Admin_registration extends REST_Controller{

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

//   public function signup_post(){
//     // insert data method

//     // print_r( $existing_email = $this->post());die;

//     // collecting form data inputs
    
//     $email = $this->security->xss_clean($this->input->post("email"));
//     $password = $this->security->xss_clean($this->input->post("password"));
//     $resume =$this->input->post("cv");
   
    
//     if(!empty($resume)){
//     $resume = $this->security->xss_clean($this->input->post("cv"));
//     $cv_base_encode = base64_decode($resume);
//     $file_name_for_upload = time().'.docx';
// 		$cv = base_url().'uploads/'.$file_name_for_upload;
// 		file_put_contents('./uploads/'.$file_name_for_upload, $cv);
//     }
//     //employee_detail
    
//     // form validation for inputs
//     $this->form_validation->set_rules("email", "Email", "required|valid_email");
//     $this->form_validation->set_rules("password", "password", "required");

//     // checking form submittion have any error or not
//     if($this->form_validation->run() === FALSE){

//       // we have some errors
//       $this->response(array(
//         "status" => 0,
//         "message" => "All fields are required!"
//       ) , REST_Controller::HTTP_NOT_FOUND);
//       return;
//   }   
//      $existing_email = $email;
//      $existing_employee = $this->employee_model->get_employee_by_email($existing_email);
//         if($existing_employee){
//         $this->response(array(
//         "status" => 0,
//         "message" => "Email already exists"
//         ), REST_Controller::HTTP_CONFLICT);
//         return;
//         }

//       // if(!empty($name) && !empty($email) && !empty($password) && !empty($conf_password) && !empty($mobile)  && !empty($work_status)){
//       if(!empty($email) && !empty($password)){
//         // all values are available
//         $employee = array(
         
//           "email" => $email,
//           "password" => md5($password),
        
//         );
//          if($cv){
//               $employee["cv"] = $cv;
//             }
//         // print_r($employee); die;
//         if($this->employee_model->insert_employee($employee)){

//           $this->response(array(
//             "status" => 1,
//             "message" => "Employee has been registered"
//           ), REST_Controller::HTTP_OK);
//           return;
//         }else{

//           $this->response(array(
//             "status" => 0,
//             "message" => "Failed to create employee"
//           ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
//           return;
//         }
//       }else{
//         // we have some empty field
//         $this->response(array(
//           "status" => 0,
//           "message" => "All fields are required!"
//         ), REST_Controller::HTTP_NOT_FOUND);
//       }

//   }
  public function login_post()
    {
        $email = $this->security->xss_clean($this->input->post("email"));
        $password = $this->security->xss_clean($this->input->post("password"));

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {
            $credentials = array('email' => $email, 'password' => md5($password)); //md5($password)
            $loginStatus = $this->admin_model->checkLogin($credentials);
            //  print_r($loginStatus);die;
            if ($loginStatus != false) {
                $userId = array('admin_id' => $loginStatus->admin_id);
                $bearerToken = $this->authorization_token->generateToken($userId);
                $responseData = array(
                    'status' => true,
                    'message' => 'Successfully Logged In',
                    'admin_id'=>$loginStatus->admin_id,
                    'token' => $bearerToken,
                );
                return $this->response($responseData, 200);
            } else {
                $responseData = array(
                    'status' => false,
                    'message' => 'Invalid Credentials',
                    'data' => []
                );
                return $this->response($responseData);
            }
        } else {
            $responseData = array(
                'status' => false,
                'message' => 'Email-id and password are required!',
                'data' => []
            );
            return $this->response($responseData);
        }
    }
}