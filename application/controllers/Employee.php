<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('employee_model');
        // $this->isLoggedIn();
    }

	public function index()
	{
		$this->load->view('welcome_message');			
	}

	public function empList()
	{
		$data['empDetails'] = $this->employee_model->getEmployeeDetails();
		$this->load->view('employeeList',$data);
	}

	public function save_employee()
	{
			$save_employee = $this->input->post('records');
			// print_r($save_employee);die;
			$result = $this->employee_model->save_employee('emp_details',$save_employee);

			echo $result;die;
	}
}
?>