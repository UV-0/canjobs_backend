<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Employee_model extends CI_Model
{
public function get_employee_by_email($email){
            //  $email = $employee['email'];
    // print_r($email); die;
      
            $this->db->where('email', $email);
            $query = $this->db->get('employee');
            
            if ($query->num_rows() > 0) {
            // print_r($this->db->last_query()); die;
                return $query;
            }
}
public function insert_employee($employee = array()){
   
  
             // print_r($employee); die; 
            return $this->db->insert('employee', $employee);
            
}
public function checkLogin($credentials)
{
            $this->db->where($credentials);
            $query = $this->db->get('employee');
            if($query->num_rows()==1)
            {
                return $query->row();
            }
            else 
            {
                return false;
            }
}

public function updatePersonal_details($employee_info){
  // print_r($emp_info);die;
  
            if (!empty($employee_info['employee_id'])) {
                      // Update operation
                      // print_r($emp_id);die;
                      $this->db->where('employee_id', $employee_info['employee_id']);
                      $this->db->set('updated_at', 'NOW()', FALSE);
                      $query = $this->db->update('employee', $employee_info);                    
                      return $query;
                      } 
                    
}

public function addEmployee_skill($employee_skill){
            $res = $this->db->insert('employee_skill',$employee_skill);
            return $res;
} 
public function addUpdate_career($career_info){
            // print_r($career_info);die;
            if (!empty($career_info['career_id'])) {
            // $emp_id = $emp_info['employee_id'];
            // Update operation
                                $this->db->where('career_id', $career_info['career_id']);
                                $this->db->set('updated_at', 'NOW()', FALSE);
                                $res = $this->db->update('employee_career', $career_info);
                                // print_r($this->db->last_query());
                         
                                return $res;
            } 
            else {
            // Add operation
            $res = $this->db->insert('employee_career', $career_info);
            // print_r($this->db->last_query());
            return $res;
            }
}

public function addUpdate_education($education_info){
            // print_r($education_info);die;
            if (!empty($education_info['education_id'])) {
                // Update operation
                    $this->db->where('education_id', $education_info['education_id']);
                    $this->db->set('updated_at', 'NOW()', FALSE);
                    $res = $this->db->update('employee_education', $education_info);
                    // print_r($this->db->last_query());

                    return $res;
              }
                else {
                // Add operation
                $res = $this->db->insert('employee_education', $education_info);
                // print_r($this->db->last_query());
                return $res;
                }
}
public function get_employee($employee_id){
             
                $this->db->where('employee_id', $employee_id);
                $res = $this->db->get('employee');
                //  print_r($this->db->last_query());
               return $res->result_array();
               
  }
public function get_allEmployee(){
             
                $res = $this->db->get('employee');
                // print_r($this->db->last_query());
                return $res->result_array();
  
               
  }
public function get_employeeCareer($employee_id){
                $this->db->where('employee_id', $employee_id);
                $res = $this->db->get('employee_career');
                //  print_r($this->db->last_query());
               return $res->result_array();
               
  }
public function getAllEmployeeCareer(){
                // $this->db->where('employee_id', $employee_id);
                $res = $this->db->get('employee_career');
                //  print_r($this->db->last_query());
               return $res->result_array();
               
  }
public function get_employeeEducation($employee_id){
                $this->db->where('employee_id', $employee_id);
                $res = $this->db->get('employee_education');
                //  print_r($this->db->last_query());
               return $res->result_array();
               
  }
public function getAllEmployeeEducation(){
                // $this->db->where('employee_id', $employee_id);
                $res = $this->db->get('employee_education');
                return $res->result_array();
             
  }
public function getEmployeeSkill($employee_id){             
                // $this->db->select('employee_id, GROUP_CONCAT(skill SEPARATOR ", ") AS skills');
                $this->db->where('employee_id', $employee_id);
                // $this->db->group_by('employee_id');
                $query = $this->db->get('employee_skill');
                return $result_array = $query->result_array();
                 
  } 

  public function getAllemployeeSkill(){
                // Build the query
                $this->db->select('employee_id, GROUP_CONCAT(skill SEPARATOR ", ") AS skills');
                $this->db->group_by('employee_id');
                $query = $this->db->get('employee_skill');
                return $result_array = $query->result_array();
         
  }
  public function getAllemployeeView($parameters){
                $this->db->select($parameters['select']);
                $this->db->where('is_deleted !=', 1);
                if(isset($parameters['job_id'])){
                $this->db->where("employee_id IN(SELECT employee_id FROM apply_on_job WHERE job_id='".$parameters['job_id']."')");
                }
                $res = $this->db->get('employee_view');
                // print_r($this->db->last_query());
                return $res->result_array();              
  }
    public function deleteEmployee($employee_id){

                $this->db->where('employee_id', $employee_id);
                $this->db->set('is_deleted', '1', FALSE);
             return $result = $this->db->update('employee');    
   }
   public function deleteCareer($career_id){
                $this->db->where("career_id", $career_id);
                return $this->db->delete("employee_career");
   }
   public function deleteEducation($education_id){
                $this->db->where("education_id", $education_id);
                return $this->db->delete("employee_education");
   }
   public function deleteSkill($skill_id){
                $this->db->where("skill_id", $skill_id);
                return $this->db->delete("employee_skill");
   }
}
////////// Query to create view name:'employee_view' using tables `employee`,`employee_education`,`employee_skill` ///////////
// CREATE VIEW `employee_view` AS
// SELECT e.*,
//     education.education,
//     education.specialization,
//     (SELECT GROUP_CONCAT(skill) FROM `employee_skill` WHERE employee_skill.employee_id = e.employee_id) AS skill
// FROM `employee` AS e 
// LEFT JOIN (
//     SELECT employee_id, GROUP_CONCAT(course) AS education, GROUP_CONCAT(specialization) AS specialization
//     FROM `employee_education` 
//     GROUP BY employee_id
// ) AS education ON education.employee_id = e.employee_id;
// // //// If not want to included 'is deleted value' ///////////
// WHERE e.is_deleted != 1;


////////// Query to create view name:'employee_view' using tables `employee`,`employee_career`,`employee_education`,`employee_skill` ///////////

// CREATE VIEW `employee_view` AS
// SELECT 
//     employee.employee_id,
//     `name`,
//     `description`,
//     `date_of_birth`,
//     `gender`,
//     `marital_status`,
//     `nationality`,
//     `current_location`,
//     `currently_located_country`,
//     `language`,
//     `interested_in`,
//     `experience`,
//     `work_permit_canada`,
//     `work_permit_other_country`,
//     career.career,
//     education.education,
//     education.specialization,
//     (SELECT GROUP_CONCAT(skill) FROM `employee_skill` WHERE employee_skill.employee_id = employee.employee_id) AS skill
// FROM `employee`
// LEFT JOIN (
//     SELECT employee_id, GROUP_CONCAT(company) AS career
//     FROM `employee_career` 
//     GROUP BY employee_id
// ) AS career ON career.employee_id = employee.employee_id
// LEFT JOIN (
//     SELECT employee_id, GROUP_CONCAT(course) AS education, GROUP_CONCAT(specialization) AS specialization
//     FROM `employee_education` 
//     GROUP BY employee_id
// ) AS education ON education.employee_id = employee.employee_id;

// public function get_employee($search,$filter){
   
//        $query = "SELECT *
//                     FROM employee
//                     LEFT JOIN employee_detail
//                     ON employee.id = employee_detail.employee_id
//                     WHERE employee.is_deleted <> '1'";
                                
//          // Add search criteria to the query
//         if (!empty($search)) {
//           $query .= " AND (employee.name LIKE '%$search%' OR employee.email LIKE '%$search%' OR employee.language LIKE '%$search%')";
//         }
      
//         // Add filter criteria to the query
//         if (!empty($filter)) {
//           $query .= " AND employee.gender = '$filter' OR employee_detail.employer_location = '$filter'";
//         }
      
//         $result = $this->db->query($query);
//                   print_r($this->db->last_query());
//         return $result->result_array();
// }
