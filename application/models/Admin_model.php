// <?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Admin_model extends CI_Model
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
            // print_r($this->db->last_query());
              // return 1;
            
}
public function checkLogin($credentials)
{
        $this->db->where($credentials);
        $query = $this->db->get('admin');
        if($query->num_rows()==1)
        {
            return $query->row();
        }
        else 
        {
            return false;
        }
}
public function add_update($emp_info){
  print_r($emp_info);die;
    $emp_id = $emp_info['company_id'];
    $update_employee= array(
        "gender" => $emp_info['gender'],
        "date_of_birth" => $emp_info['date_of_birth'],
          "language" => $emp_info['language'],
          "marital_status" => $emp_info['marital_status'],
          "current_location" => $emp_info['current_location'],
    );
    $emp_detail=array( "employee_id" => $emp_info['id'],
                   "currently_employeed" => $emp_info['currently_employeed'],
                    "total_work_experience" => $emp_info['total_work_experience'],
                    "employer_location" => $emp_info['employer_location'],
                    "country" => $emp_info['country'],
        );
      if (!empty($emp_id)) {
                // Update operation
                // print_r($emp_id);die;
                $this->db->where('id', $emp_id);
                $this->db->set('updated_at', 'NOW()', FALSE);
                $this->db->update('employee', $update_employee);
                
                          $this->db->select('*');
                          $this->db->where('employee_id', $emp_id);  
                          $query = $this->db->get('employee_detail');
                        //   print_r($query);die;  
                                      
                          if ($query->num_rows() == 1)  
                          {  
                                    $this->db->where('employee_id', $emp_id);
                                    $this->db->set('updated_at', 'NOW()', FALSE);
                                    $this->db->update('employee_detail', $emp_detail);
                                    // print_r($this->db->last_query());
                             
                          } else {  
                               $this->db->insert('employee_detail', $emp_detail);
                              //  print_r($this->db->last_query());
                          }  
                    
                return 1;
                } else {
                // Add operation
                $this->db->insert('employee', $emp_info);
                // print_r($this->db->last_query());
                return 1;
                }
}


    
  

//    public function update_emp($id,$data){
      
   
//       $this->name    = $data['name']; // please read the below note
//        $this->email  = $data['email'];
//        $this->mobile = $data['mobile'];
//        $result = $this->db->update('employee',$this,array('id' => $id));
//        if($result)
//        {
//            return 1;
//        }
//        else
//        {
//            return 0;
//        }
//    }
   public function delete_emp($emp_id){

                $this->db->where('id', $emp_id);
                $this->db->set('is_deleted', '1', FALSE);
               $result = $this->db->update('employee');
   
    //    $result = $this->db->query("DELETE FROM employee WHERE id = $id");
    //    $result = $this->db->query("DELETE FROM employee_detail WHERE id = $id");
       return $result;
    
   }
}