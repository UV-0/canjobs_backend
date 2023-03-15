<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Employer_model extends CI_Model
{
public function get_employee($search,$filter){
   
    //    $query = "SELECT *
    //                 FROM employee
    //                 LEFT JOIN employee_detail
    //                 ON employee.id = employee_detail.employee_id
    //                 WHERE employee.is_deleted <> '1'";
                                
    //      // Add search criteria to the query
    //     if (!empty($search)) {
    //       $query .= " AND (employee.name LIKE '%$search%' OR employee.email LIKE '%$search%' OR employee.language LIKE '%$search%')";
    //     }
      
    //     // Add filter criteria to the query
    //     if (!empty($filter)) {
    //       $query .= " AND employee.gender = '$filter' OR employee_detail.employer_location = '$filter'";
    //     }
      
    //     $result = $this->db->query($query);
    //               print_r($this->db->last_query());
    //     return $result->result_array();
}

public function get_employer_by_email($email){
            //  $email = $employee['email'];
    // print_r($email); die;
      
            $this->db->where('email', $email);
            $query = $this->db->get('employer');
            
            if ($query->num_rows() > 0) {
            // print_r($this->db->last_query()); die;
                return $query;
            }
}
public function insert_employer($employer = array()){
            // print_r($employee); die; 
           return $this->db->insert('employer', $employer);
}
public function checkLogin($credentials)
{
        $this->db->where($credentials);
        $query = $this->db->get('employer');
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else 
        {
            return false;
        }
}
public function update_company_contactDetails($company_info){
  // print_r($company_info);die;
    $company_id = $company_info['company_id'];
   
      if (!empty($company_id)) {
                // Update operation
                // print_r($emp_id);die;
                $this->db->where('company_id', $company_id);
                $this->db->set('updated_at', 'NOW()', FALSE);
              return $this->db->update('employer', $company_info);           
              } 
               
}
public function addUpdate_company_kycDetails($kyc_detail){
  // print_r($kyc_detail);die;
    $company_id = $kyc_detail['company_id'];
   
      if (!empty($company_id)) {
                // Update operation
                          $this->db->select('*');
                          $this->db->where('company_id', $company_id);  
                          $query = $this->db->get('company_kyc');
                        //   print_r($query);die;  
                                      
                          if ($query->num_rows() == 1)  
                          {  
                                  $this->db->where('company_id', $company_id);
                                  $this->db->set('updated_at', 'NOW()', FALSE);
                                  $res = $this->db->update('company_kyc', $kyc_detail);
                                  print_r($this->db->last_query());
                                  return $res;
                          } else {  
                                  $res = $this->db->insert('company_kyc', $kyc_detail);
                                  print_r($this->db->last_query());
                                  return $res;
                          }  
                } 
             
}
public function addUpdate_job($job_detail){
  // print_r($job_detail);die;
    $company_id = $job_detail['company_id'];
   
      if (!empty($company_id)) {
                
                          $this->db->select('*');
                          $this->db->where('company_id', $company_id);  
                          $query = $this->db->get('jobs');
                        //   print_r($query);die;  
                                      
                          if ($query->num_rows() == 1)  
                          {  
                                  $this->db->where('company_id', $company_id);
                                  $this->db->set('updated_at', 'NOW()', FALSE);
                                  $res = $this->db->update('jobs', $job_detail);
                                  // print_r($this->db->last_query());
                                  return $res;
                          } else {  
                                  $res = $this->db->insert('jobs', $job_detail);
                                  // print_r($this->db->last_query());
                                  return $res;
                          }  
        } 
}
public function addUpdate_category($category_detail){
  // print_r($category_detail);die;
    // $company_id = $category_detail`['company_id'];
   
      if (!empty($job_category_id)) {
                                  $this->db->where('job_category_id', $job_category_id);
                                  $this->db->set('updated_at', 'NOW()', FALSE);
                                  $res = $this->db->update('job_category', $category_detail);
                                  print_r($this->db->last_query());
                                  return $res;
                          } else {  
                                  $res = $this->db->insert('job_category', $category_detail);
                                  print_r($this->db->last_query());
                                  return $res;
                          }  
         
}
public function applyJob($candidate_detail){
      return $this->db->insert('apply_on_job', $candidate_detail);
}
public function getAppliedCandidateList($job_id){
                $this->db->where('job_id', $job_id);
                $res = $this->db->get('apply_on_job');
                //  print_r($this->db->last_query());
               return $res->result_array();
               
  }

public function viewJobs($filter){
  // var_dump($filter['category_type']); die;


  if (count($filter)>0) {
    foreach($filter as $key=>$val)
    {
      if($val=="")
      {
        unset($filter[$key]);
      }
    }
    $this->db->where($filter);
  }
  // if()
  // {
  //   $this->db->where("is_active",1);
  // }
$res = $this->db->get("view_job_posted");
// print_r($this->db->last_query());
if($res->num_rows()>0)
{
  return $res->result_array();
}else{
  return array();
}

//////////////////  Filter for OR condition ////////////////////////////
  // $query = "SELECT * FROM job_posted WHERE 1=1 ";
  //            if (count($filter)>0) {
              //  $query .= " WHERE job_posted.category_type = '{$filter['category_type']}' OR job_posted.keyskill = '{$filter['keyskill']}' OR job_posted.location = {'$filter['location']}'";
              // $query .= "job_posted.category_type = '{$filter['category_type']}' OR job_posted.keyskill = '{$filter['keyskill']}' OR job_posted.location = '{$filter['location']}'";
  //             $wh = "";
  //             if($filter['category_type']){
  //               if($wh=="")
  //               {
  //                 $wh = " AND ( ";
  //               }
  //               $query .="job_posted.category_type = '{$filter['category_type']}'";
  //             }
  //             if($filter['keyskill']){
  //               if($wh=="")
  //               {
  //                 $wh = " AND ( ";
  //               }else{
  //                 $wh .= " OR ";
  //               }
  //               $query .=" job_posted.category_type = '{$filter['keyskill']}'";
  //             }
  //             if($filter['location']){
  //               if($wh=="")
  //               {
  //                 $wh = " AND ( ";
  //               }else{
  //                 $wh .= " OR ";
  //               }
  //               $query .=" OR job_posted.category_type = '{$filter['location']}'";
  //             }
  //             if($wh !="")
  //             {
  //                $wh .= " ) ";
  //             }
  //            }
  // $res = $this->db->query($query);
  //  print_r($this->db->last_query());
  // return $res->result_array();
  //////////////////////////////////////////////
  //  print_r($res->result_array); die;
  //  $res->result_array;

  // $this->db->query("CREATE VIEW `view_job_posted` AS
  //                        SELECT j.*, jc.category_type, e.company_name, e.contact_no_other, e.industry, e.about, e.logo, e.address, e.company_size,e.corporation
                          //  FROM jobs AS j
                          //  INNER JOIN job_category AS jc ON j.job_id = jc.job_category_id
                          // INNER JOIN employer AS e ON j.job_id = e.company_id;");
}
public function getAllJobs(){
                // $this->db->where('employee_id', $employee_id);
                $res = $this->db->get('jobs');
                //  print_r($this->db->last_query());
               return $res->result_array();
               
  }
public function getAllJobCategory(){
                // $this->db->where('employee_id', $employee_id);
                $res = $this->db->get('job_category');
                //  print_r($this->db->last_query());
               return $res->result_array();
               
  }
public function getAllEmployer(){
                // $this->db->where('employee_id', $employee_id);
                $res = $this->db->get('employer');
                //  print_r($this->db->last_query());
               return $res->result_array();
               
  }


    
  //  public function delete_emp($emp_id){

  //               $this->db->where('id', $emp_id);
  //               $this->db->set('is_deleted', '1', FALSE);
  //              $result = $this->db->update('employee');
   
  //   //    $result = $this->db->query("DELETE FROM employee WHERE id = $id");
  //   //    $result = $this->db->query("DELETE FROM employee_detail WHERE id = $id");
  //      return $result;
    
  //  }
}



// <?php
// defined('BASEPATH') OR exit('No direct script access allowed');
// /**
// *
// */
// class Employer_model extends CI_Model
// {
// public function get_employee($search,$filter){
   
//     //    $query = "SELECT *
//     //                 FROM employee
//     //                 LEFT JOIN employee_detail
//     //                 ON employee.id = employee_detail.employee_id
//     //                 WHERE employee.is_deleted <> '1'";
                                
//     //      // Add search criteria to the query
//     //     if (!empty($search)) {
//     //       $query .= " AND (employee.name LIKE '%$search%' OR employee.email LIKE '%$search%' OR employee.language LIKE '%$search%')";
//     //     }
      
//     //     // Add filter criteria to the query
//     //     if (!empty($filter)) {
//     //       $query .= " AND employee.gender = '$filter' OR employee_detail.employer_location = '$filter'";
//     //     }
      
//     //     $result = $this->db->query($query);
//     //               print_r($this->db->last_query());
//     //     return $result->result_array();
// }

// public function get_employer_by_email($email){
//             //  $email = $employee['email'];
//     // print_r($email); die;
      
//             $this->db->where('email', $email);
//             $query = $this->db->get('employer');
            
//             if ($query->num_rows() > 0) {
//             // print_r($this->db->last_query()); die;
//                 return $query;
//             }
// }
// public function insert_employer($employer = array()){
   
  
//             // print_r($employee); die; 
//            return $this->db->insert('employer', $employer);
//             // print_r($this->db->last_query());
//               // return 1;
            
// }
// public function checkLogin($credentials)
// {
//         $this->db->where($credentials);
//         $query = $this->db->get('employer');
//         if($query->num_rows()==1)
//         {
//             return $query->row();
//         }
//         else 
//         {
//             return false;
//         }
// }
// public function add_update($emp_info){
//   print_r($emp_info);die;
//     $emp_id = $emp_info['company_id'];
//     $update_employee= array(
//         "gender" => $emp_info['gender'],
//         "date_of_birth" => $emp_info['date_of_birth'],
//           "language" => $emp_info['language'],
//           "marital_status" => $emp_info['marital_status'],
//           "current_location" => $emp_info['current_location'],
//     );
//     $emp_detail=array( "employee_id" => $emp_info['id'],
//                    "currently_employeed" => $emp_info['currently_employeed'],
//                     "total_work_experience" => $emp_info['total_work_experience'],
//                     "employer_location" => $emp_info['employer_location'],
//                     "country" => $emp_info['country'],
//         );
//       if (!empty($emp_id)) {
//                 // Update operation
//                 // print_r($emp_id);die;
//                 $this->db->where('id', $emp_id);
//                 $this->db->set('updated_at', 'NOW()', FALSE);
//                 $this->db->update('employee', $update_employee);
                
//                           $this->db->select('*');
//                           $this->db->where('employee_id', $emp_id);  
//                           $query = $this->db->get('employee_detail');
//                         //   print_r($query);die;  
                                      
//                           if ($query->num_rows() == 1)  
//                           {  
//                                     $this->db->where('employee_id', $emp_id);
//                                     $this->db->set('updated_at', 'NOW()', FALSE);
//                                     $this->db->update('employee_detail', $emp_detail);
//                                     // print_r($this->db->last_query());
                             
//                           } else {  
//                                $this->db->insert('employee_detail', $emp_detail);
//                               //  print_r($this->db->last_query());
//                           }  
                    
//                 return 1;
//                 } else {
//                 // Add operation
//                 $this->db->insert('employee', $emp_info);
//                 // print_r($this->db->last_query());
//                 return 1;
//                 }
// }


    
  

// //    public function update_emp($id,$data){
      
   
// //       $this->name    = $data['name']; // please read the below note
// //        $this->email  = $data['email'];
// //        $this->mobile = $data['mobile'];
// //        $result = $this->db->update('employee',$this,array('id' => $id));
// //        if($result)
// //        {
// //            return 1;
// //        }
// //        else
// //        {
// //            return 0;
// //        }
// //    }
//    public function delete_emp($emp_id){

//                 $this->db->where('id', $emp_id);
//                 $this->db->set('is_deleted', '1', FALSE);
//                $result = $this->db->update('employee');
   
//     //    $result = $this->db->query("DELETE FROM employee WHERE id = $id");
//     //    $result = $this->db->query("DELETE FROM employee_detail WHERE id = $id");
//        return $result;
    
//    }
// }