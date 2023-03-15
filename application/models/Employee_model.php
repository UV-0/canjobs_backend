<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Employee_model extends CI_Model
{
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
                print_r($this->db->last_query());
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
public function get_employeeSkill($employee_id){             
                $this->db->select('employee_id, GROUP_CONCAT(skill SEPARATOR ", ") AS skills');
                $this->db->where('employee_id', $employee_id);
                $this->db->group_by('employee_id');
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
  // SELECT *,(SELECT GROUP_CONCAT(skill) FROM `employee_skill` WHERE employee_skill.employee_id=employee.employee_id) as employe_skill FROM `employee`;

//   CREATE VIEW employee_view AS
// SELECT e.name, j.job_title,es.skill,e.experience
//        GROUP_CONCAT(DISTINCT ec.career SEPARATOR ', ') AS careers,
//        GROUP_CONCAT(DISTINCT ee.education SEPARATOR ', ') AS educations,
//        GROUP_CONCAT(DISTINCT es.skill SEPARATOR ', ') AS skills
// FROM employee e
// LEFT JOIN employee_education ee ON e.employee_id = ee.employee_id
// LEFT JOIN employee_skill es ON e.employee_id = es.employee_id
// GROUP BY e.employee_id, e.first_name, e.last_name, e.email, e.phone_number;

// CREATE VIEW employee_details AS
// SELECT e.employee_id, e.first_name, e.last_name, e.email, e.phone_number,
//        GROUP_CONCAT(DISTINCT ec.position ORDER BY ec.start_date ASC SEPARATOR ', ') AS positions,
//        GROUP_CONCAT(DISTINCT ed.degree ORDER BY ed.graduation_date ASC SEPARATOR ', ') AS degrees,
//        GROUP_CONCAT(DISTINCT es.skill_name ORDER BY es.skill_level DESC SEPARATOR ', ') AS skills
// FROM employee e
// LEFT JOIN employee_career ec ON e.employee_id = ec.employee_id
// LEFT JOIN employee_education ed ON e.employee_id = ed.employee_id
// LEFT JOIN employee_skill es ON e.employee_id = es.employee_id
// GROUP BY e.employee_id;


// CREATE VIEW employee_view AS
// SELECT * FROM `employee`,
//        GROUP_CONCAT(DISTINCT ec.position ORDER BY ec.start_date ASC SEPARATOR ', ') AS positions,
//        GROUP_CONCAT(DISTINCT ed.degree ORDER BY ed.graduation_date ASC SEPARATOR ', ') AS degrees,
//        GROUP_CONCAT(DISTINCT es.skill_name ORDER BY es.skill_level DESC SEPARATOR ', ') AS skills
// FROM employee e
// LEFT JOIN employee_career ec ON e.employee_id = ec.employee_id
// LEFT JOIN employee_education ed ON e.employee_id = ed.employee_id
// LEFT JOIN employee_skill es ON e.employee_id = es.employee_id
// GROUP BY e.employee_id;

  //  public function delete_emp($emp_id){

  //               $this->db->where('id', $emp_id);
  //               $this->db->set('is_deleted', '1', FALSE);
  //              $result = $this->db->update('employee');
   
  //   //    $result = $this->db->query("DELETE FROM employee WHERE id = $id");
  //   //    $result = $this->db->query("DELETE FROM employee_detail WHERE id = $id");
  //      return $result;
    
  //  }
}

// sql query to create a view of all columns of this tables name: `employee` which have following columns:`career_id`, `employee_id`, `company`, `designation`, `company_location`, `industry`, `functional_area`, `work_level`, `start_date`, `end_date`, `currently_work_here`, `created_at`, `updated_at`,`employee_career`,`employee_education`,`employee_skill` where tables `employee_career`,`employee_education`,`employee_skill` have multiple rows with the same employee_id from employee group concate them
