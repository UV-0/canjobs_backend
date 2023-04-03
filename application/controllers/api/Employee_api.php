<?php
Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'libraries/REST_Controller.php';

class Employee_api extends REST_Controller{

  public function __construct(){

    parent::__construct();
    //load database
    $this->load->database();
    $this->load->model(array("employee_model"));
    $this->load->library("form_validation");
    $this->load->library('Authorization_Token');
    $this->load->helper("security");
    $this->load->helper('url');

    // // $headers = $this->input->request_headers(); 
    // $headers = getallheaders(); 
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

  
  // PUT: Employee personal details
  public function employeePersonal_detail_put(){
      // updating data method
      //echo "This is PUT Method";
      $data = json_decode(file_get_contents("php://input"));
      // print_r($data);
      //  1. "employee_id", 2."name", 3."contact_no", 4."description" , 5. "date_of_birth"
// , 6."gender", 7."marital_status" , 8."nationality", 9."current_location" , 10. "currently_located_country" , 11."language", 12."religion" , 13. "interested_in", 14."experience", 15."work_permit_canada", 16."work_permit_other_country".
      if(isset($data->employee_id) && isset($data->name)  && isset($data->contact_no) && isset($data->description) && isset($data->date_of_birth)  && isset($data->gender) && isset($data->marital_status) && isset($data->nationality) && isset($data->current_location) && isset($data->currently_located_country) && isset($data->language) && isset($data->religion) && isset($data->interested_in) && isset($data->experience)  && isset($data->work_permit_canada) && isset($data->work_permit_other_country))
      { 
         $error_flag = 0;
      
        if(empty($data->employee_id) || empty($data->name) || empty($data->contact_no) || empty($data->description) || empty($data->date_of_birth) || empty($data->gender) || empty($data->marital_status) || empty($data->nationality) || empty($data->current_location) || empty($data->currently_located_country) || empty($data->language) || empty($data->religion) || empty($data->interested_in) || empty($data->experience) || empty($data->work_permit_canada) || empty($data->work_permit_other_country))
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
        $employee_info = array(
          "employee_id" => $data->employee_id,
          "name" => $data->name,
          "contact_no" => $data->contact_no,
          "description" => $data->description,
          "date_of_birth" => $data->date_of_birth, //yy-mm-dd
          "gender" => $data->gender,
          "marital_status" => $data->marital_status,
          "nationality" => $data->nationality,
          "current_location" => $data->current_location,
          "currently_located_country" => $data->currently_located_country,
          "language" => $data->language,
          "religion" => $data->religion,
          "interested_in" => $data->interested_in,
          "experience" => $data->experience,
          "work_permit_canada" => $data->work_permit_canada,
          "work_permit_other_country" => $data->work_permit_other_country,
        );
        if(isset($data->resume)){
          if(!empty($data->resume)){
           
                // Decode the base64 encoded PDF data
                   $cv_data = base64_decode($data->resume);
                   // Set the file name
                   $file_name_for_upload = time().'.pdf';
                   // Set the file path
                   $file_path = FCPATH . 'uploads/' . $file_name_for_upload;
                   // Write the file to the server
                   if(file_put_contents($file_path, $cv_data)) {
                       // File was successfully uploaded
                       $cv = base_url() . 'uploads/' . $file_name_for_upload;
                   }

             $employee_info["resume"] = $cv;
          }
        }
         if(isset($data->image)){
          if(!empty($data->image)){
                  $img = str_replace('data:image/png;base64,', '', $data->image);
		              $img = str_replace(' ', '+', $img);
                  $binary_image = base64_decode($img);
                  $file_name_for_upload = time().'.png';
		              $image = base_url().'uploads/'.$file_name_for_upload;
		              file_put_contents('./uploads/'.$file_name_for_upload, $binary_image);
                  
                  $employee_info["profile_photo"] = $image;
          }
        }
        // print_r($emp_info); die;
      //   $this->employee_model->updatePersonal_Educational_details($emp_info);
    
        
        if($this->employee_model->updatePersonal_details($employee_info)){

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
   // POST: Employee Skills
  public function employeeSkill_post(){
      // updating data method
      //echo "This is PUT Method";
      $data = json_decode(file_get_contents("php://input"));
      // print_r($data); die;
      if(isset($data->employee_id) && isset($data->skill))
      { 
      
        if(empty($data->employee_id) || empty($data->skill))
        {
            $this->response(array(
            "status" => 0,
            "message" => "All fields are required!"
          ) , REST_Controller::HTTP_NOT_FOUND);
         return;
        }
        $employee_skill = array(
          "employee_id" => $data->employee_id,
          "skill" => $data->skill,
        );
      //   print_r($employee_skill); die;
      //   $this->employee_model->addEmployee_skill($employee_skill);
    
        
        if($this->employee_model->addEmployee_skill($employee_skill)){

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
  public function employeeEducation_detail_put(){
      // updating data method
      //echo "This is PUT Method";
      $data = json_decode(file_get_contents("php://input"));
      // print_r($data);
      if(isset($data->employee_id) && isset($data->qualification)  && isset($data->university) && isset($data->course) && isset($data->specialization)  && isset($data->institute_location) && isset($data->passing_year))
      { 
             $error_flag = 0;

            if(empty($data->employee_id) || empty($data->qualification) || empty($data->university) || empty   ($data->course) || empty($data->specialization) || empty($data->institute_location) || empty   ($data->passing_year) ){
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
               $education_info = array(
                 "employee_id" => $data->employee_id,
                 "qualification" => $data->qualification,
                 "university_institute" => $data->university,
                 "course" => $data->course,
                 "specialization" => $data->specialization, 
                 "institute_location" => $data->institute_location,
                 "passing_year" => $data->passing_year,
               );
               if(isset($data->education_id)){
                if(!empty($data->education_id)){
                  $education_info["education_id"] = $data->education_id;
                }
               }
                  // print_r($education_info); die;
               // $this->employee_model->updatePersonal_Educational_details($emp_info);
            
            
               if($this->employee_model->addUpdate_education($education_info)){
               
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
      }else{

        $this->response(array(
          "status" => 0,
          "message" => "All fields are needed"
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }
  public function employeeCareer_detail_put(){
      // updating data method
      //echo "This is PUT Method";
      $data = json_decode(file_get_contents("php://input"));
      // print_r($data);
      if(isset($data->employee_id) && isset($data->company)  && isset($data->designation) && isset($data->company_location) && isset($data->industry)  && isset($data->functional_area) && isset($data->work_level)  && isset($data->start_date)  && isset($data->end_date)  && isset($data->currently_work_here))
      { 
             $error_flag = 0;

            if(empty($data->employee_id) || empty($data->company) || empty($data->designation) || empty ($data->company_location) || empty($data->industry) || empty($data->functional_area) || empty     ($data->work_level) || empty($data->start_date) || empty($data->end_date) || empty    ($data->currently_work_here)){
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
               $career_info = array(
                 "employee_id" => $data->employee_id,
                 "company" => $data->company,
                 "designation" => $data->designation,
                 "company_location" => $data->company_location,
                 "industry" => $data->industry, 
                 "functional_area" => $data->functional_area,
                 "work_level" => $data->work_level,
                 "start_date" => $data->start_date,
                 "end_date" => $data->end_date,
                 "currently_work_here" => $data->currently_work_here,
               );
                 if(isset($data->career_id)){
                   if(!empty($data->career_id)){
                     $career_info["career_id"] = $data->career_id;
                }
               }
                  // print_r($career_info); die;
               // $this->employee_model->add_updateCareer($emp_info);
    

               if($this->employee_model->addUpdate_career($career_info)){

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
      }else {

        $this->response(array(
          "status" => 0,
          "message" => "All fields are needed"
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }
  // GET: Employee personal details
  public function employeeDetail_post(){
   $data = json_decode(file_get_contents("php://input"));
   $employee_id = $data->employee_id;
      $employee_detail['personal_detail'] = $this->employee_model->get_employee($employee_id);
      $employee_detail['career_detail'] = $this->employee_model->get_employeeCareer($employee_id);
      $employee_detail['education_detail'] = $this->employee_model->get_employeeEducation($employee_id);
      $employee_detail['employee_skills'] = $this->employee_model->getEmployeeSkill($employee_id);

      if(count($employee_detail['personal_detail']) > 0){
        $this->response(array(
          "status" => 1,
          "message" => "Employees found",
          "data" => $employee_detail
        ), REST_Controller::HTTP_OK);
      }else{

        $this->response(array(
          "status" => 0,
          "message" => "No Employee found",
          "data" => $employee_detail
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }
  // public function employeeDetail_get(){
  //  $employee_id = $this->get('employee_id');
     
  //     $employee = $this->employee_model->get_employee($employee_id);

  //     //print_r($query->result());

  //     if(count($employee) > 0){

  //       $this->response(array(
  //         "status" => 1,
  //         "message" => "Employees found",
  //         "data" => json_encode($employee)
  //       ), REST_Controller::HTTP_OK);
  //     }else{

  //       $this->response(array(
  //         "status" => 0,
  //         "message" => "No Employee found",
  //         "data" => $employee
  //       ), REST_Controller::HTTP_NOT_FOUND);
  //     }
  // }

  // GET: Employee career details
  public function employeeCareer_get(){
      $employee_id = $this->get('employee_id');
     
      $employee = $this->employee_model->get_employeeCareer($employee_id);

      //print_r($query->result());

      if(count($employee) > 0){

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
  // GET: Employee Education details
  public function employeeEducation_get(){
      $employee_id = $this->get('employee_id');
      $employee = $this->employee_model->get_employeeEducation($employee_id);
      if(count($employee) > 0){

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
   // GET: Employee Skills
  public function employeeSkill_get(){
      $employee_id = $this->get('employee_id');
      $employee = $this->employee_model->getEmployeeSkill($employee_id);

      // print_r($employee); die;

      if(count($employee)>0){

        $this->response(array(
          "status" => 1,
          "message" => "employee's skill found",
          "data" => $employee
        ), REST_Controller::HTTP_OK);
      }else{

        $this->response(array(
          "status" => 0,
          "message" => "No employee's skill found",
          "data" => $employee
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }
   public function allEmployeeDetail_get(){
    
      $employee = $this->employee_model->get_allEmployee();

      //print_r($query->result());

      if(count($employee) > 0){

        $this->response(array(
          "status" => 1,
          "message" => "Employees found",
          "data" => $employee
        ), REST_Controller::HTTP_OK);
      }else{

        $this->response(array(
          "status" => 0,
          "message" => "No Employee found",
          "data" => $employee
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }

  public function allEmployeeCareer_get(){   
      $employee = $this->employee_model->getAllEmployeeCareer();
      if(count($employee) > 0){

        $this->response(array(
          "status" => 1,
          "message" => "Employees found",
          "data" => $employee
        ), REST_Controller::HTTP_OK);
      }else{

        $this->response(array(
          "status" => 0,
          "message" => "No Employee found",
          "data" => $employee
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }
    public function allEmployeeEducation_get(){
      $employee_id = $this->get('employee_id');
      $employee = $this->employee_model->getAllEmployeeEducation();

      //print_r($query->result());

      if(count($employee) > 0){

        $this->response(array(
          "status" => 1,
          "message" => "Employees found",
          "data" => $employee
        ), REST_Controller::HTTP_OK);
      }else{

        $this->response(array(
          "status" => 0,
          "message" => "No Employee found",
          "data" => $employee
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }
  public function allEmployeeSkill_get(){
      $employee = $this->employee_model->getAllemployeeSkill();
      if(count($employee)>0){

        $this->response(array(
          "status" => 1,
          "message" => "Employees found",
          "data" => $employee
        ), REST_Controller::HTTP_OK);
      }else{

        $this->response(array(
          "status" => 0,
          "message" => "No Employee found",
          "data" => $employee
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }
  public function allEmployeeView_get(){
    $user_type = $this->get('user_type');
    $job_id = $this->get('job_id');
    // var_dump($job_id);die;
    $parameters = array("select"=>"*");
   if(isset($user_type) && $user_type == "company"){
       $parameters["select"] = "`employee_id`, `name`, `description`, `date_of_birth`, `gender`, `marital_status`, `nationality`, `current_location`, `currently_located_country`, `language`, `religion`, `interested_in`, `experience`, `work_permit_canada`, `work_permit_other_country`,`profile_photo`,`education`, `specialization`, `skill`,`created_at`,`updated_at`,`is_deleted`"; 
    }
    if(isset($job_id)){
      $parameters["job_id"]=$job_id;
    }
    // print_r($parameters);die;
      $employee = $this->employee_model->getAllemployeeView($parameters);
      if(count($employee)>0){

        $this->response(array(
          "status" => 1,
          "message" => "Employees found",
          "data" => $employee
        ), REST_Controller::HTTP_OK);
      }else{

        $this->response(array(
          "status" => 0,
          "message" => "No Employee found",
          "data" => $employee
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }
  // DELETE: <project_url>/index.php/student
  public function employee_delete($employee_id){
      if($this->employee_model->deleteEmployee($employee_id)){
        $this->response(array(
          "status" => 1,
          "message" => "Employee has been deleted"
        ), REST_Controller::HTTP_OK);
      }else{
        $this->response(array(
          "status" => 0,
          "message" => "Failed to delete employee"
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }
  
  public function deleteEmployeeCareer_post(){
    $data = json_decode(file_get_contents("php://input"));
      if($this->employee_model->deleteCareer($data->career_id)){
        $this->response(array(
          "status" => 1,
          "message" => "career details has been deleted"
        ), REST_Controller::HTTP_OK);
      }else{
        $this->response(array(
          "status" => 0,
          "message" => "Failed to delete career details"
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }
  public function deleteEmployeeEducation_post(){
    $data = json_decode(file_get_contents("php://input"));
      if($this->employee_model->deleteEducation($data->education_id)){
        $this->response(array(
          "status" => 1,
          "message" => "Education details has been deleted"
        ), REST_Controller::HTTP_OK);
      }else{
        $this->response(array(
          "status" => 0,
          "message" => "Failed to delete Education details"
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }
  public function deleteEmployeeSkill_post(){
    $data = json_decode(file_get_contents("php://input"));
      if($this->employee_model->deleteSkill($data->skill_id)){
        $this->response(array(
          "status" => 1,
          "message" => "skill has been deleted"
        ), REST_Controller::HTTP_OK);
      }else{
        $this->response(array(
          "status" => 0,
          "message" => "Failed to delete skill"
        ), REST_Controller::HTTP_NOT_FOUND);
      }
  }
}

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

 ?>




