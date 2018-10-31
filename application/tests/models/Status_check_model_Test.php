<?php

	/* Test Cases Description start*/
	
	/*	
	print_r("\n\n\t"."===========================================================================");
	print_r("\n\t"."DESCRIPTION : Status_check_Model.php TEST CASE LIST");
	print_r("\n\t"."===========================================================================");

	print_r("\n\t"."01. test_get_historydetails");
	print_r("\n\t"."02. test_get_historydetailsfor_delete");
	print_r("\n\t"."03. test_get_taskdetails");
	print_r("\n\t"."04. test_get_actionname");
	print_r("\n\t"."05. test_get_projectdetails");
	print_r("\n\t"."06. test_retain_updateqry");
	print_r("\n\t"."07. test_ebd_delqry");
	print_r("\n\t"."08. test_emailqry");
	print_r("\n\t"."09. test_get_snapshot_delete_details");
	print_r("\n\t"."10. testinsertTaskAuditManualRun");
	print_r("\n\t"."11. testdeletedatatask_audit");

	print_r("\n\n\t"."TOTAL TEST CASES : 11");
	print_r("\n\t"."==========================================================================="."\n\n");	
	*/	
	/* Test Cases Description end*/
		
class Status_check_model_test extends TestCase{
	
	/*
    | Model - Status_check_Model
    | Test Description - This function is to setup status_check_model
    */
	protected $name = 'Testcase for Task';
  	protected $task = 'Test elkfLogstashServerOs';
  	protected $region = 'ap-southeast-1';
  	protected $action_id =  '1';
  	protected $snapshot_retain = '0';
  	protected $volume_id = 'Test vol-ab328643';
  	protected $dbinstance_id = '0';
	protected $dbsnapshot_id = '';
  	protected $key = 'Test Key';
  	protected $value = 'Test Value';
  	protected $project_id = '1';
  	protected $notifications = 'connect@cloudhelp.in';
  	protected $is_copy_snapshot = '0';
  //	protected $copy_snapshot_region = '';
  	protected $user_id = '1';
  	protected $cron_time = '30 18 * * *';
  	protected $time_value = '30 18 * * *';
  	protected $instance_id = '';
  	protected $tenant_id='3';
	
	public function setUp(){
    	$this->resetInstance();
    	$this->CI->load->library('session');
    	$this->CI->load->model('Status_check_model');
    	$this->obj=$this->CI->Status_check_model;
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
    | Model - Status_check_Model | Test Case No.- (01).
    | Test Description - This function is to get tenants from tenant table for a given tenant_id
    | Assertion - assertTrue will be true if it get results properly from tenant table
    */
   
	public function test_get_historydetails(){		
		$results = $this->obj->get_historydetails();
		if(!empty($results)){
			$this->assertTrue(true);
		}
		
	}
	
	/*
    | Model - Status_check_Model | Test Case No.- (02).
    | Test Description - This function is to get tenants from tenant table for a given tenant_id
    | Assertion - assertTrue will be true if it get results properly from tenant table
    */
    
   
	public function test_get_historydetailsfor_delete(){		
		$results = $this->obj->get_historydetailsfor_delete();
		if(!empty($results)){
			$this->assertTrue(true);
		}
	}
	
	/*
    | Model - Status_check_Model | Test Case No.- (03).
    | Test Description - This function is to get tenants from tenant table for a given tenant_id
    | Assertion - assertTrue will be true if it get results properly from tenant table
    */
    
   
	public function test_get_taskdetails(){		
		$results = $this->obj->get_taskdetails(1);
		if(!empty($results)){
			$this->assertTrue(true);
		}
	}
	
	/*
    | Model - Status_check_Model | Test Case No.- (04).
    | Test Description - This function is to get tenants from tenant table for a given tenant_id
    | Assertion - assertTrue will be true if it get results properly from tenant table
    */
    
   
	public function test_get_actionname(){		
		$results = $this->obj->get_actionname(1);
		if(!empty($results)){
			if($results[0]->action_id == 1){
				$this->assertTrue(true);
			}else{
				$this->fail();
			}
		}else{
			$this->fail();
		}
	}
	
	/*
    | Model - Status_check_Model | Test Case No.- (05).
    | Test Description - This function is to get tenants from tenant table for a given tenant_id
    | Assertion - assertTrue will be true if it get results properly from tenant table
    */
    
   
	public function test_get_projectdetails(){		
		$results = $this->obj->get_projectdetails(1);
		if(!empty($results)){
			$this->assertTrue(true);
		}
	}
	
	/*
    | Model - Status_check_Model | Test Case No.- (06).
    | Test Description - This function is to get tenants from tenant table for a given tenant_id
    | Assertion - assertTrue will be true if it get results properly from tenant table
    */
    
   
	public function test_retain_updateqry(){		
		$new_date = '2016-07-25';
		$results = $this->obj->retain_updateqry(1,$new_date);
		if(!empty($results)){
			$this->assertTrue(true);
		}
	}
	
	/*
    | Model - Status_check_Model | Test Case No.- (07).
    | Test Description - This function is to get tenants from tenant table for a given tenant_id
    | Assertion - assertTrue will be true if it get results properly from tenant table
    */
    
   
	public function test_ebd_delqry(){
		$results = $this->obj->ebd_delqry(1);
		if(!empty($results)){
			$this->assertTrue(true);
		}
	}
	
	/*
    | Model - Status_check_Model | Test Case No.- (08).
    | Test Description - This function is to get tenants from tenant table for a given tenant_id
    | Assertion - assertTrue will be true if it get results properly from tenant table
    */
    
   
	public function test_emailqry(){
		$results = $this->obj->emailqry(1);
		if(!empty($results)){
			$this->assertTrue(true);
		}
	}
	/*
    | Model - Status_check_Model | Test Case No.- (09).
    | Test Description - This function is to delete from task history table
    | Assertion - assertTrue will be true if it get results properly
    */
    
   
	public function test_get_snapshot_delete_details(){		
		$results = $this->obj->get_snapshot_delete_details();
		if(!empty($results)){
			$this->assertTrue(true);
		}
	}
	
	/*
    | Model - Task_Model | Test Case No.- (10).
    | Test Description - This function is to get details of tasks based on some conditions
    | Assertion - assertTrue will be true if will get results 
    */
	  public function testinsertTaskAuditManualRun() {	
      	$_POST['name']=$this->name;
		$_POST['task_id']='1';
		$_POST['task']=$this->task;
		$_POST['project_id']='99';
		$_POST['instance_id']=$this->instance_id;
		$_POST['volume_id']=$this->volume_id;
		$_POST['dbinstance_id']=$this->dbinstance_id;
		$_POST['dbsnapshot_id']=$this->dbsnapshot_id;
		$_POST['cron_time']=$this->cron_time;
		$_POST['time_value']=$this->time_value;
		$_POST['action_id']=$this->action_id;
		$_POST['region']=$this->region;
		$_POST['notifications']=$this->notifications;
		$_POST['snapshot_retain']=$this->snapshot_retain;
		$_POST['tenant_id']=$_SESSION['sess_tenant_id'];
		$error_log='could not insert in to data base';
		$insertaudit_task_id = $this->obj->insertTaskAuditManualRun($_POST,$error_log);
		if($insertaudit_task_id == 1){
		  $this->assertTrue(true);
		}else{
		  $this->fail();
		}
	 }
	 	/* | Model - Task_Model_azure | Test Case No.- (11).
    | Test Description - This function is to delete the data inserted into tasks_audit table
    | Assertion - assertTrue will be true if it return proper value 
    */
	public function testdeletedatatask_audit(){
		$sql = "delete FROM tasks_audit ORDER BY id DESC LIMIT 1";
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
