<?php
Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';

class Employer_api extends REST_Controller{

  public function __construct(){

    parent::__construct();
    //load database
    $this->load->database();
    $this->load->model(array("employer_model"));
    $this->load->library("form_validation");
    $this->load->library('Authorization_Token');
    $this->load->helper("security");
    $this->load->helper('url');

    // $headers = $this->input->request_headers(); 
    //     // var_dump($headers['Authorization']);exit;
		// $this->decodedToken = $this->authorization_token->validateToken($headers['Authorization']);
    //    if (!$this->decodedToken || $this->decodedToken['status'] != "1") {
    //         $err = array(
    //             'status'=>false,
    //             'message'=>'Unauthorised Token',
    //             'data'=>[]
    //         );
    //         // print_r($err);
    //         echo json_encode($err);
    //         exit;
    //       //    return $this->response($err,401);
    //       //  die;
    //       }
        }
  /*
    INSERT: POST REQUEST TYPE
    UPDATE: PUT REQUEST TYPE
    DELETE: DELETE REQUEST TYPE
    LIST: Get REQUEST TYPE
  */
  // PUT: <project_url>/index.php/student
  public function company_detail_put(){
      // updating data method
      //echo "This is PUT Method";
      $data = json_decode(file_get_contents("php://input"));
      // print_r($data); die;

      if(isset($data->company_id) && isset($data->company_name)  && isset($data->industry) && isset($data->corporation) && isset($data->company_start_date)  && isset($data->company_size) && isset($data->vacancy_for_post) && isset($data->about))
      { 
         $error_flag = 0;
      
        if(empty($data->company_id) || empty($data->company_name) || empty($data->industry) || empty($data->corporation) || empty($data->company_start_date) || empty($data->company_size) || empty($data->vacancy_for_post) || empty($data->about))
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
        $company_info = array(
          "company_id" => $data->company_id,
          "company_name" => $data->company_name,
          "industry" => $data->industry,
          "corporation" => $data->corporation,
          "company_start_date" => $data->company_start_date, //yy-mm-dd
          "company_size" => $data->company_size,
          "vacancy_for_post" => $data->vacancy_for_post,
          "about" => $data->about
        );
        // print_r($company_info); die;
        // $this->employee_model->updatePersonal_Educational_details($emp_info);
         if(isset($data->alias)){
                if(!empty($data->alias)){
                  $company_info["alias"] = $data->alias;
                }
               }
         if(isset($data->website_url)){
                if(!empty($data->website_url)){
                  $company_info["website_url"] = $data->website_url;
                }
               }
         if(isset($data->logo)){
                if(!empty($data->logo)){
                  // $resume = $this->security->xss_clean($data->resume);
                  $img = str_replace('data:image/png;base64,', '', $data->logo);
		              $img = str_replace(' ', '+', $img);
                  $binary_logo = base64_decode($img);
                  $file_name_for_upload = time().'.png';
		              $logo = base_url().'uploads/'.$file_name_for_upload;
		              file_put_contents('./uploads/'.$file_name_for_upload, $binary_logo);

                  $company_info["logo"] = $logo;
                }
                  // $base64 = $_POST['img_base64'];
		              // $img = str_replace('data:image/jpeg;base64,', '', $base64);
		              // $img = str_replace(' ', '+', $img);
		              // $binary = base64_decode($img);
		              // $file_name = time().'.jpg';
		              // file_put_contents('./uploads/'.$file_name, $binary);
               }
        
        if($this->employer_model->update_company_contactDetails($company_info)){

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
  public function contact_detail_put(){
      // updating data method
      //echo "This is PUT Method";
      $data = json_decode(file_get_contents("php://input"));
      // print_r($data); die;

      if(isset($data->company_id) && isset($data->contact_person_name)  && isset($data->contact_no_other) && isset($data->address) && isset($data->pin_code)  && isset($data->city) && isset($data->state) && isset($data->country) && isset($data->designation))
      { 
         $error_flag = 0;
      
        if(empty($data->company_id) || empty($data->contact_person_name) || empty($data->contact_no_other) || empty($data->address) || empty($data->pin_code) || empty($data->city) || empty($data->state) || empty($data->country) || empty($data->designation))
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
        $contact_info = array(
          "company_id" => $data->company_id,
          "contact_person_name" => $data->contact_person_name,
          "contact_no_other" => $data->contact_no_other,
          "address" => $data->address,
          "pin_code" => $data->pin_code, //yy-mm-dd
          "city" => $data->city,
          "state" => $data->state,
          "country" => $data->country,
          "designation" => $data->designation
        );
        // print_r($contact_info); die;
        // $this->employee_model->updatePersonal_Educational_details($emp_info);
    
        
        if($this->employer_model->update_company_contactDetails($contact_info)){

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
  

  // PUT: <project_url>/index.php/student
  public function company_kyc_detail_put(){
      // updating data method
      //echo "This is PUT Method";
      $data = json_decode(file_get_contents("php://input"));
      // print_r($data); die;
      if(isset($data->company_id) && isset($data->pan_no)  && isset($data->name) && isset($data->pan_date) && isset($data->address)  && isset($data->pincode) && isset($data->city) && isset($data->state) && isset($data->country))
      { 
             $error_flag = 0;

            if(empty($data->company_id) || empty($data->pan_no) || empty($data->name) || empty   ($data->pan_date) || empty($data->address) || empty($data->pincode) || empty   ($data->city) || empty($data->state)  || empty($data->country)){
                $error_flag = 1;
            }
               if($error_flag){
                   $this->response(array(
                   "status" => 0,
                   "message" => "All fields are required!"
                 ) , REST_Controller::HTTP_NOT_FOUND);
               return;
               }
               else{
               $kyc_detail = array(
                 "company_id" => $data->company_id,
                 "pan_no" => $data->pan_no,
                 "name" => $data->name,
                 "pan_date" => $data->pan_date,
                 "address" => $data->address, 
                 "pincode" => $data->pincode,
                 "city" => $data->city,
                 "state" => $data->state,
                 "country" => $data->country,                
               );
               
                  // print_r($kyc_detail);
              //  $this->employee_model->addUpdate_company_kycDetails($kyc_detail);
               if(isset($data->gstin)){
                if(!empty($data->gstin)){
                  $kyc_detail["gstin"] = $data->gstin;
                }
               }
               if(isset($data->fax_number)){
                if(!empty($data->fax_number)){
                  $kyc_detail["fax_number"] = $data->fax_number;
                }
               }
               if(isset($data->tan_number)){
                if(!empty($data->tan_number)){
                  $kyc_detail["tan_number"] = $data->tan_number;
                }
               }
          
               if($this->employer_model->addUpdate_company_kycDetails($kyc_detail)){
               
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
         }  
      } else{

        $this->response(array(
          "status" => 0,
          "message" => "All fields are needed"
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }
   public function addJobs_put(){
      // updating data method
      //echo "This is PUT Method";
      $data = json_decode(file_get_contents("php://input"));
      // print_r($data); die;

      if(isset($data->company_id) && isset($data->job_title)  && isset($data->experience_required) && isset($data->salary) && isset($data->location)  && isset($data->industry_type) && isset($data->apply_link) && isset($data->job_description) && isset($data->your_duties) && isset($data->requirement) && isset($data->department) && isset($data->job_type) && isset($data->education) && isset($data->language) && isset($data->keyskill) && isset($data->employement) && isset($data->job_category_id))
      { 
         $error_flag = 0;
      
        if(empty($data->company_id) || empty($data->job_title) || empty($data->experience_required) || empty($data->salary) || empty($data->location) || empty($data->industry_type) || empty($data->apply_link) || empty($data->job_description) || empty($data->your_duties) || empty($data->requirement) || empty($data->department) || empty($data->job_type) || empty($data->education) || empty($data->language) || empty($data->keyskill) || empty($data->employement) || empty($data->job_category_id))
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
        $job_detail = array(
          "company_id" => $data->company_id,
          "job_title" => $data->job_title,
          "experience_required" => $data->experience_required,
          "salary" => $data->salary,
          "location" => $data->location, 
          "industry_type" => $data->industry_type,
          "apply_link" => $data->apply_link,
          "job_description" => $data->job_description,
          "your_duties" => $data->your_duties,
          "requirement" => $data->requirement,
          "department" => $data->department,
          "job_type" => $data->job_type,
          "education" => $data->education,
          "language" => $data->language,
          "keyskill" => $data->keyskill,
          "employement" => $data->employement,
          "job_category_id" => $data->job_category_id,
        );
        // print_r($job_detail); die;
        // $this->employee_model->updatePersonal_Educational_details($emp_info);
    
        
        if($this->employer_model->addUpdate_job($job_detail)){

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
    public function addCategory_put(){
      // updating data method
      //echo "This is PUT Method";
      $data = json_decode(file_get_contents("php://input"));
      // print_r($data); die;

      if(isset($data->category_name) && isset($data->category_type))
      { 
         $error_flag = 0;
      
        if(empty($data->category_name) || empty($data->category_type))
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
        $category_detail = array(
          "category_name" => $data->category_name,
          "category_type" => $data->category_type,
        );
        if(isset($data->job_category_id)){
          if(!empty($data->job_category_id)){
            $category_detail["job_category_id"] = $data->job_category_id;
          }
         }
        // print_r($category_detail); die;
        // $this->employee_model->updatePersonal_Educational_details($emp_info);
    
        
        if($this->employer_model->addUpdate_category($category_detail)){

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
   public function apply_job_post(){
     $data = json_decode(file_get_contents("php://input"));
     $candidate_detail = array('job_id'=>$data->job_id,
                                'employee_id'=>$data->employee_id,
                              );

           if($this->employer_model->applyJob($candidate_detail)){

            $this->response(array(
              "status" => 1,
              "message" => "Job applied successfully"
            ), REST_Controller::HTTP_OK);
        }else{

          $this->response(array(
            "status" => 0,
            "messsage" => "Failed to apply job"
          ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
   }
  //  public function applied_candidateList_get(){ 
  //       $job_id = $this->get('job_id');
  //        if($data = $this->employer_model->getAppliedCandidateList($job_id)){

  //           $this->response(array(
  //             "status" => 1,
  //             "message" => "successfully",
  //             "data" => $data
  //           ), REST_Controller::HTTP_OK);
  //       }else{

  //         $this->response(array(
  //           "status" => 0,
  //           "messsage" => "Failed to fetch data"
  //         ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
  //       }
  //  }
   public function view_jobs_get(){
      $filter = array("category_type"=>$this->get('filter_category'),
                      "job_type"=>$this->get('filter_job_swap'),
                      "keyskill"=>$this->get('filter_keyskill'),
                      "location"=>$this->get('filter_location'),);
      // print_r($);die;
      // $data = $this->employer_model->viewJobs($company_id);
       if($data = $this->employer_model->viewJobs($filter)){

            $this->response(array(
              "status" => 1,
              "message" => "successfull",
              "data" => $data
            ), REST_Controller::HTTP_OK);
        }else{

          $this->response(array(
            "status" => 0,
            "messsage" => "No data found"
          ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
        }
   }
    public function allJobs_get(){
      // $employee_id = $this->get('employee_id');
      $jobs = $this->employer_model->getAllJobs();

      //print_r($query->result());

      if(count($jobs) > 0){

        $this->response(array(
          "status" => 1,
          "message" => "Jobs found",
          "data" => $jobs
        ), REST_Controller::HTTP_OK);
      }else{

        $this->response(array(
          "status" => 0,
          "message" => "No Jobs found",
          "data" => $jobs
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }
    public function allJobCategory_get(){
      // $employee_id = $this->get('employee_id');
      $jobs = $this->employer_model->getAllJobCategory();

      //print_r($query->result());

      if(count($jobs) > 0){

        $this->response(array(
          "status" => 1,
          "message" => "Job Category found",
          "data" => $jobs
        ), REST_Controller::HTTP_OK);
      }else{

        $this->response(array(
          "status" => 0,
          "message" => "No job category found",
          "data" => $jobs
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }
    public function allEmployer_get(){
      // $employee_id = $this->get('employee_id');
      $employer = $this->employer_model->getEmployer();

      //print_r($query->result());

      if(count($employer) > 0){

        $this->response(array(
          "status" => 1,
          "message" => "Employer found",
          "data" => $employer,
        ), REST_Controller::HTTP_OK);
      }else{

        $this->response(array(
          "status" => 0,
          "message" => "No employer found",
          "data" => $employer
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }
    public function getEmployer_post(){
      $data = json_decode(file_get_contents("php://input"));

      // print_r($company_id);die;
      $company_detail['company_detail']= $this->employer_model->getEmployer($data->company_id);
      $company_detail['kyc_detail'] = $this->employer_model->getCompany_kyc($data->company_id);
      
      if(!empty($company_detail['company_detail'])){

        $this->response(array(
          "status" => 1,
          "message" => "Employer found",
          "data" => $company_detail
        ), REST_Controller::HTTP_OK);
      }else{

        $this->response(array(
          "status" => 0,
          "message" => "No employer found",
          "data" => $company_detail
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }
   public function employer_delete($company_id){
      if($this->employer_model->deleteEmployer($company_id)){
        // retruns true
        $this->response(array(
          "status" => 1,
          "message" => "company has been deleted"
        ), REST_Controller::HTTP_OK);
      }else{
        // return false
        $this->response(array(
          "status" => 0,
          "message" => "Failed to delete company"
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }
   public function jobCategory_delete($job_category_id){
      if($this->employer_model->deleteJobCategory($job_category_id)){
        // retruns true
        $this->response(array(
          "status" => 1,
          "message" => "job category has been deleted"
        ), REST_Controller::HTTP_OK);
      }else{
        // return false
        $this->response(array(
          "status" => 0,
          "message" => "Failed to delete job category"
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }
   public function job_delete($job_id){
      if($this->employer_model->deleteJob($job_id)){
        // retruns true
        $this->response(array(
          "status" => 1,
          "message" => "job has been deleted"
        ), REST_Controller::HTTP_OK);
      }else{
        // return false
        $this->response(array(
          "status" => 0,
          "message" => "Failed to delete job"
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }
}
  // public function employeeCareer_detail_put(){
  //     // updating data method
  //     //echo "This is PUT Method";
  //     $data = json_decode(file_get_contents("php://input"));
  //     // print_r($data);
  //     if(isset($data->employee_id) && isset($data->company)  && isset($data->designation) && isset($data->company_location) && isset($data->industry)  && isset($data->functional_area) && isset($data->work_level)  && isset($data->start_date)  && isset($data->end_date)  && isset($data->currently_work_here))
  //     { 
  //            $error_flag = 0;

  //           if(empty($data->employee_id) || empty($data->company) || empty($data->designation) || empty     ($data->company_location) || empty($data->industry) || empty($data->functional_area) || empty     ($data->work_level) || empty($data->start_date) || empty($data->end_date) || empty    ($data->currently_work_here)  ){
  //               $error_flag = 1;
  //           }
  //              if($error_flag){
  //                  $this->response(array(
  //                  "status" => 0,
  //                  "message" => "All fields are required!"
  //                ) , REST_Controller::HTTP_NOT_FOUND);
  //              return;
  //              }
  //              else{
  //              $emp_info = array(
  //                "employee_id" => $data->employee_id,
  //                "company" => $data->company,
  //                "designation" => $data->designation,
  //                "company_location" => $data->company_location,
  //                "industry" => $data->industry, 
  //                "functional_area" => $data->functional_area,
  //                "work_level" => $data->work_level,
  //                "start_date" => $data->start_date,
  //                "end_date" => $data->end_date,
  //                "currently_work_here" => $data->currently_work_here,
  //              );
  //                 print_r($emp_info); die;
  //              $this->employee_model->add_updateCareer($emp_info);
    

  //              if($this->employee_model->add_updateCareer($emp_info)){

  //                  $this->response(array(
  //                    "status" => 1,
  //                    "message" => "Employee data updated successfully"
  //                  ), REST_Controller::HTTP_OK);
  //              }else{

  //                $this->response(array(
  //                  "status" => 0,
  //                  "messsage" => "Failed to update Employee data"
  //                ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
  //              }
  //           }
  //     } else if(isset($data->skills)){
  //        echo "your skills are: ".$data->skills; return;
  //     }
  //      else {

  //       $this->response(array(
  //         "status" => 0,
  //         "message" => "All fields are needed"
  //       ), REST_Controller::HTTP_NOT_FOUND);
  //     }
  // }

  // // DELETE: <project_url>/index.php/student
  // public function index_delete(){
  //     // delete data method
  //       // $emp_id = $this->uri->segment(4);
  //     $data = json_decode(file_get_contents("php://input"));
  //     $emp_id = $this->security->xss_clean($data->id);
  //     // print_r($emp_id); die;

  //     if($this->employee_model->delete_emp($emp_id)){
  //       // retruns true
  //       $this->response(array(
  //         "status" => 1,
  //         "message" => "Employee has been deleted"
  //       ), REST_Controller::HTTP_OK);
  //     }else{
  //       // return false
  //       $this->response(array(
  //         "status" => 0,
  //         "message" => "Failed to delete employee"
  //       ), REST_Controller::HTTP_NOT_FOUND);
  //     }
  // }

  // // GET: <project_url>/index.php/student
  // public function index_get(){
  //     // list data method
  //     //echo "This is GET Method";
  //     // SELECT * from tbl_students;
  //     // print_r($this->get('search'));die;
  //     $search = $this->get('search');
  //     $filter = $this->get('filter');
  //     // $filter
  //     $emp = $this->employee_model->get_employee($search,$filter);

  //     //print_r($query->result());

  //     if(count($emp) > 0){

  //       $this->response(array(
  //         "status" => 1,
  //         "message" => "Employees found",
  //         "data" => $emp
  //       ), REST_Controller::HTTP_OK);
  //     }else{

  //       $this->response(array(
  //         "status" => 0,
  //         "message" => "No Employee found",
  //         "data" => $emp
  //       ), REST_Controller::HTTP_NOT_FOUND);
  //     }

// public function index_post(){
    // insert data method
    //  $err = array(
    //         'status'=>true,
    //         'message'=>'successfully fetched profile',
    //         'data'=> ''
    //     );
    //     $this->response($err,200); 
    // print_r( $existing_email = $this->post("email"));die;

    // collecting form data inputs
    
  //   $name = $this->security->xss_clean($this->input->post("name"));
  //   $email = $this->security->xss_clean($this->input->post("email"));
  //   $password = $this->security->xss_clean($this->input->post("password"));
  //   $conf_password = $this->security->xss_clean($this->input->post("conf_password"));
  //   $mobile = $this->security->xss_clean($this->input->post("mobile"));
  //   $work_status = $this->security->xss_clean($this->input->post("work_status"));
  //   // $cv = $this->security->xss_clean($this->input->post("cv"));
  //   $cv_base_encode = $this->post("cv");
	// 	$cv = base64_decode($cv_base_encode);
  //   if(!empty($cv)){
  //   $file_name_for_upload = time().'.docx';
	// 	$file_name = base_url().'uploads/'.$file_name_for_upload;
	// 	file_put_contents('./uploads/'.$file_name_for_upload, $cv);
  //   }
  //   //employee_detail
    
  //   // form validation for inputs
  //   $this->form_validation->set_rules("name", "Name", "required");
  //   $this->form_validation->set_rules("email", "Email", "required|valid_email");
  //   $this->form_validation->set_rules("password", "password", "required");
  //   $this->form_validation->set_rules("conf_password", "conf_password", "required|matches[password]");
  //   $this->form_validation->set_rules("mobile", "Mobile", "required");
  //   $this->form_validation->set_rules("work_status", "work_status", "required");

  //   // checking form submittion have any error or not
  //   if($this->form_validation->run() === FALSE){

  //     // we have some errors
  //     $this->response(array(
  //       "status" => 0,
  //       "message" => "All fields are needed"
  //     ) , REST_Controller::HTTP_NOT_FOUND);
  //     return;
  // }   
  //    $existing_email = $this->post("email");
  //    $existing_employee = $this->emp_model->get_employee_by_email($existing_email);
  //       if($existing_employee){
  //       $this->response(array(
  //       "status" => 0,
  //       "message" => "Email already exists"
  //       ), REST_Controller::HTTP_CONFLICT);
  //       return;
  //       }

  //     if(!empty($name) && !empty($email) && !empty($password) && !empty($conf_password) && !empty($mobile)  && !empty($work_status)){
  //       // all values are available
  //       $employee = array(
  //         "name" => $name,
  //         "email" => $email,
  //         "password" => $password,
  //         "mobile" => $mobile,
  //         "work_experience_level" => $work_status,
  //         "cv" => $file_name
  //       );
  //       // print_r($employee); die;
  //       if($this->emp_model->add_update($employee)){

  //         $this->response(array(
  //           "status" => 1,
  //           "message" => "Employee has been registered"
  //         ), REST_Controller::HTTP_OK);
  //         return;
  //       }else{

  //         $this->response(array(
  //           "status" => 0,
  //           "message" => "Failed to create student"
  //         ), REST_Controller::HTTP_INTERNAL_SERVER_ERROR);
  //         return;
  //       }
  //     }else{
  //       // we have some empty field
  //       $this->response(array(
  //         "status" => 0,
  //         "message" => "All fields are needed"
  //       ), REST_Controller::HTTP_NOT_FOUND);
  //     }

  // }
 
