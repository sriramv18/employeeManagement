<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Employee_model extends CI_Model
{
    


		public function save_employee($table,$saveData)
    {
    	// print_r($saveData);die;
        if($saveData['emp_id'] !='')
        {
        	
            $this->db->where('emp_id',$saveData['emp_id']);
            $this->db->update($table,$saveData);
            // print_r($this->db->last_query());die;

            return $saveData['emp_id'];
        }else
        {
        // print_r($saveData);die;

            $this->db->insert($table,$saveData);
            // print_r($this->db->last_query());die;
            return $this->db->insert_id();
        }
    }

    public function getEmployeeDetails()
    {
        return $this->db->get_where('emp_details',array('emp_details.status'=>1))->result();
    }

}
?>