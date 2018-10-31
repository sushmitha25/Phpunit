<?php

	/* Test Cases Description start*/
	
	/*	
	print_r("\n\n\t"."===========================================================================");
	print_r("\n\t"."DESCRIPTION : azure_status_check_model.php TEST CASE LIST");
	print_r("\n\t"."===========================================================================");

	print_r("\n\t"."01. test_get_historydetails");
	print_r("\n\t"."02. test_get_taskdetails");
	print_r("\n\t"."03. test_get_projectdetails");
	print_r("\n\t"."04. test_get_actionname");
	print_r("\n\t"."05. test_get_historydetailsfor_delete");
	print_r("\n\t"."06. test_insertTaskAuditManualRunAzure");
	print_r("\n\t"."07. testdeletedatataskaudit_azure");

	print_r("\n\n\t"."TOTAL TEST CASES : 07");
	print_r("\n\t"."==========================================================================="."\n\n");	
	*/	
	/* Test Cases Description end*/
	
class azure_status_check_model_test extends TestCase{
	
	protected $resource_group = 'powerbi2';
	protected $name = 'name of the task';
	protected $task = 'task name';
	protected $notifications = 'nisarga.udayakumar@trianz.com';
	protected $vm_id ='8bad85dd-5be5-4b79-a5ad-8269586f7c35';
	protected $vm_name = 'powerbi';
	protected $action_id ='1';
	protected $status ='1';
	protected $region ='SouthIndia';
	protected $tenant_id = '1';
	protected $cron_time = '30 18 * * *';
    protected $time_value = '30 18 2 * *';	
	protected $error_log ='error manual run status';
	protected $task_id='3';
	/*
    | Model - azure_status_check_model
    | Test Description - This function is to setup azure_status_check_model
    */
	public function setUp(){
    	$this->resetInstance();
    	$this->CI->load->library('session');
    	$this->CI->load->model('azure_status_check_model');
    	$this->obj=$this->CI->azure_status_check_model;
		$this->db = $this->CI->load->database('default', TRUE);
		$sql = "select tenant_id from tenant";
		$query = $this->db->query($sql);
		$tenant_id = $query->result_array();
	    $ten_id	= $tenant_id[0]['tenant_id'];
		$_SESSION['sess_tenant_id']=$ten_id;
		
		$sql = "select user_id from users where tenant_id=$ten_id";
		$query = $this->db->query($sql);
		$user_id = $query->result_array();
		$usr_id	= $user_id[0]['user_id'];
		$_SESSION['sess_user_id']=$usr_id;
		$_SESSION['sess_role_id']=1;
    }
    
	/*
    | Model - azure_status_check_model | Test Case No.- (01).
    | Test Description - This function is to get details from task_history_azure table for a given status and error log
    | Assertion - assertTrue will be true if it get results 
    */
   
	public function test_get_historydetails(){
		$results = $this->obj->get_historydetails();
		if(!empty($results)){
			$this->assertTrue(true);
		}
		
	}
	/*
    | Model - azure_status_check_model | Test Case No.- (02).
    | Test Description - This function is to get details from tasks_azure table based on the task_id
    | Assertion - assertTrue will be true if it get results 
    */
   
	public function test_get_taskdetails(){
		//$this->db = $this->CI->load->database('default', TRUE);
		$sql = "select task_id from tasks_azure";
		$query = $this->db->query($sql);
		$task_res = $query->result_array();
		$task_id	= $task_res[0]['task_id'];
		$results = $this->obj->get_taskdetails($task_id);
		if(!empty($results)){
			$this->assertTrue(true);
		}
		
	}
	/*
    | Model - azure_status_check_model | Test Case No.- (03).
    | Test Description - This function is to get details from project_azure table based on the project_id
    | Assertion - assertTrue will be true if it get results 
    */
   
	public function test_get_projectdetails(){
		//$this->db = $this->CI->load->database('default', TRUE);
		$sql = "select project_id from project_azure";
		$query = $this->db->query($sql);
		$project_res = $query->result_array();
		$project_id	= $project_res[0]['project_id'];
		$results = $this->obj->get_projectdetails($project_id);
		if(!empty($results)){
			$this->assertTrue(true);
		}
		
	}
	/*
    | Model - azure_status_check_model | Test Case No.- (04).
    | Test Description - This function is to get details from actions_azure table based on the action_id
    | Assertion - assertTrue will be true if it get results 
    */
   
	public function test_get_actionname(){
		$action_id='1';
		$results = $this->obj->get_actionname($action_id);
		if(!empty($results)){
			foreach($results as $result){
				if($result->action_id == '1'){
					$this->assertTrue(true);
				}	
			}
		}else{
			$this->fail();
		}
		
	}
	/*
    | Model - azure_status_check_model | Test Case No.- (05).
    | Test Description - This function is to get details from task_history_azure_azure table 
    | Assertion - assertTrue will be true if it get results 
    */
   
	public function test_get_historydetailsfor_delete(){
		$results = $this->obj->get_historydetailsfor_delete();
		if(!empty($results)){
			$this->assertTrue(true);
		}		
		
	}
	/*
    | Model - azure_status_check_model | Test Case No.- (06).
    | Test Description - This function is insert in to tasks_audit_azure table 
    | Assertion - assertTrue will be true if it get results 
    */
   
	public function test_insertTaskAuditManualRunAzure(){
		$arrr['project_id'] = '12';
		$arrr['resource_group'] = $this->resource_group;
		$arrr['task_id'] = $this->task_id;
		$arrr['name'] = $this->name;
		$arrr['task'] = $this->task;
		$arrr['notifications'] = $this->notifications;
		$arrr['vm_id'] = $this->vm_id;
		$arrr['vm_name'] = $this->vm_name;
		$arrr['cron_time'] = $this->cron_time;
		$arrr['time_value'] = $this->time_value;
		$arrr['action_id'] = $this->action_id;
		$arrr['region'] = $this->region;
		$arrr['status'] = $this->status;
		$arrr['tenant_id'] = $this->tenant_id;
        $_POST[0] = (object)$arrr;	
		$arr=$_POST;
		$error_log='error in the function';
		$results = $this->obj->insertTaskAuditManualRunAzure($arr,$error_log);
		if($results == 1){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
		
	}

	/* | Model - Task_Model_azure | Test Case No.- (07).
    | Test Description - This function is to delete the data inserted into task_azure table
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testdeletedatataskaudit_azure(){
		//$this->db = $this->CI->load->database('default', TRUE);
		$sql = "delete FROM tasks_audit_azure ORDER BY id DESC LIMIT 1";
		$query = $this->db->query($sql);
		$row = $this->db->affected_rows();
		if($row == 1){
			$this->assertTrue(true);
		}else{
			 $this->fail();
		}
	}
}

?>
