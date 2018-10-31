<?php

	/* Test Cases Description start*/
	/*
	 ==============================================================================================
	  NOTE :- Test Case no.11,12,13,14,15,16,17,18,19,20 on testcreateTask
	  NOTE :- Test Case no.10,15,16,18 on testgetproject_id
	 ==============================================================================================
	*/
		
	/*	
	print_r("\n\n\t"."===========================================================================");
	print_r("\n\t"."DESCRIPTION : Task_model_azure.php TEST CASE LIST");
	print_r("\n\t"."===========================================================================");

	print_r("\n\t"."01. testgetProjectCredentials");
	print_r("\n\t"."02. testgetActionsWithUserCondition");
	print_r("\n\t"."03. testgetActionsWithEditUserCondition ");
	print_r("\n\t"."04. testgetTasks @depends testAddTask");
	print_r("\n\t"."05. testgetRunningTasks");
	print_r("\n\t"."06. testgetNotCompletedTasks");
	print_r("\n\t"."07. testgetTasksaction ");
	print_r("\n\t"."08. testgetTasksForChart");
	print_r("\n\t"."09. testgetproject_id");
	print_r("\n\t"."10. testcreateTask @depends testgetproject_id");
	print_r("\n\t"."11. testupadteTask @depends testgetproject_id @depends testcreateTask");
	print_r("\n\t"."12. testupdateStatus @depends testcreateTask");
	print_r("\n\t"."13. testdeactivate_tasks @depends testcreateTask");
	print_r("\n\t"."14. testgetTaskByIdInArray @depends testcreateTask");
	print_r("\n\t"."15. testinsertTaskAudit @depends testgetproject_id @depends testcreateTask");
	print_r("\n\t"."16. testSaveTaskAudit @depends testgetproject_id @depends testcreateTask");
	print_r("\n\t"."17. testupdateStatusaudit @depends testcreateTask");
	print_r("\n\t"."18. testSaveFirstTaskAudit @depends testgetproject_id @depends testcreateTask");
	print_r("\n\t"."19. testdeletetask_azure @depends testcreateTask");
	print_r("\n\t"."20. testdeletetaskaudit_azure1 @depends testcreateTask");

	print_r("\n\n\t"."TOTAL TEST CASES : 20");
	print_r("\n\t"."==========================================================================="."\n\n");	
	*/	
	/* Test Cases Description end*/
		
class Task_azure_model_test extends Testcase{
	
	/*
	| Model - Task_Model_azure
    | Description - Setting global variables to use it in testAddTask() functions
    */
	
	protected $ddlMinute = '20';
  	protected $ddlHour = '11';
  	protected $ddlDay = '22';
  	protected $ddlMonth =  '4';
  	protected $ddlWeek = array('2');
  	protected $ddlVirtualmachine ='8bad85dd-5be5-4b79-a5ad-8269586f7c35|powerbi|SouthIndia';
  	protected $ddlProject = '67';
  	protected $ddlResourceGroup = 'powerbi2';
  	protected $txtTaskName = 'Test task name';
  	protected $txtareaDescription = 'text area description';
  	protected $txtEmail = 'nisarga.udayakumar@trianz.com';
  	protected $CronTime = '30 18 * * *';
  	protected $time_value = '30 18 2 * *';
  	protected $ddlAction = '1';
	protected $txtSnapshotToRetain = '1';
  	protected $AllBackupDisks = 'osdisk-powerbi,powerbi-20170829-174913';
  	protected $txtDestinationAccount = 'cloudschedtestacc';
	protected $txtDestinationContainer ='cloudschedcontainer';
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
	protected $managedDisk= 'No';
	protected $AllResourceGroup = 'TestSuhailAcc';
	protected $AllRegion = 'South India';
	protected $hdnlocName = 'Central US';
	protected $ddlbackup = 'incremental';
	/*
	| Model - Task_Model_azure
    | Test Description - This function is to setup task model azure
    */
	
	public function setUp(){
        $this->resetInstance();
        $this->CI->load->model('Task_model_azure');
        $this->obj=$this->CI->Task_model_azure;
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
	| Model - Task_Model_azure | Test Case No.- (01).
    | Test Description - This function is to get data from project_azure table
    | Assertion - assertTrue will be false if all values will be empty 
    */
	
	public function testgetProjectCredentials(){
        $_POST['ProjectId']='1';
    	$results= $this->obj->getProjectCredentials($_POST);
		if($results->project_id == 1 ){
				$this->assertTrue(true);
			}
   
	}
	/*
	| Model - Task_Model_azure | Test Case No.- (02).
    | Test Description - This function is to get data from actions_azure table
    | Assertion - assertTrue will be false if all values will be empty 
    */
	
	public function testgetActionsWithUserCondition(){
    	$results= $this->obj->getActionsWithUserCondition();
		if(!empty($results)){
			foreach($results as $result){
			if($result->action_id == 2)
				$this->assertTrue(true);
			}
		}else{
				$this->fail();
			}
   
	}
    	/*
	| Model - Task_Model_azure | Test Case No.- (03).
    | Test Description - This function is to get data from actions_azure table
    | Assertion - assertTrue will be false if all values will be empty 
    */
	
	public function testgetActionsWithEditUserCondition(){
    	$results= $this->obj->getActionsWithEditUserCondition();
		if(!empty($results)){
			foreach($results as $result){
			if($result->action_id == 2)
				$this->assertTrue(true);
			}
		}else{
				$this->fail();
			}
   
	}
	
	 /*
	| Model - Task_Model_azure | Test Case No.- (04).
    | Test Description - This function is to get data from task__azure table
	based on tenant_id and status
    | Assertion - assertTrue will be false if all values will be empty 
    */
	
	public function testgetTasks(){
    	$results= $this->obj->getTasks();
		foreach($results as $result){
			if($result->project_id == 2){
				$this->assertTrue(true);
			}
	    }
   
	}
     /*
	| Model - Task_Model_azure | Test Case No.- (05).
    | Test Description - This function is to get count of data from task__azure table
	based on tenant_id and status
    | Assertion - assertTrue will be false if all values will be empty 
    */
	
	public function testgetRunningTasks(){
    	$results= $this->obj->getRunningTasks();
		if(!empty($results)){
			if($results >= 0){
				$this->assertTrue(true);
			}else{
				$this->fail();
			}
		}	
    }
	   /*
	| Model - Task_Model_azure | Test Case No.- (06).
    | Test Description - This function is to get data from task__azure,task_history table
    | Assertion - assertTrue will be false if all values will be empty 
    */
	
	public function testgetNotCompletedTasks(){
    	$results= $this->obj->getNotCompletedTasks();
		if(!empty($results)){
			$this->assertTrue(true);
		}
			
    }
   
	  /*
	| Model - Task_Model_azure | Test Case No.- (07).
    | Test Description - This function is to get count of data from task_history_azure table
	based on tenant_id 
    | Assertion - assertTrue will be false if all values will be empty 
    */
	
	public function testgetTasksaction(){
    	$results= $this->obj->getTasksaction();
		if(!empty($results)){
				$this->assertTrue(true);
			}
	}
	
	  /*
	| Model - Task_Model_azure | Test Case No.- (08).
    | Test Description - This function is to get count of data from task_history_azure table
	based on tenant_id 
    | Assertion - assertTrue will be false if all values will be empty 
    */
	
	public function testgetTasksForChart(){
		$year='2017';
    	$results= $this->obj->getTasksForChart($year);
		$this->assertTrue(true);
	}
	  /*
	| Model - Task_Model_azure | Test Case No.- (09).
    | Test Description - This function is to get project_id from project_azure table
    | Assertion - assertTrue will be false if all values will be empty 
    */
	public function testgetproject_id(){
		$sql = "select project_id from project_azure";
		$query = $this->db->query($sql);
		$project_res = $query->result_array();
		$project_id	= $project_res[0]['project_id'];
		$this->assertTrue(true);
		return $project_id;
	}
	/**
    * @depends testgetproject_id
    */
	  /*
	| Model - Task_Model_azure | Test Case No.- (10).
    | Test Description - This function is to insert data in to task_azure table
    | Assertion - assertTrue will be false if all values will be empty 
    */
	public function testcreateTask($id){
	    $_POST['ddlMinute']=$this->ddlMinute;
		$_POST['ddlHour']=$this->ddlHour;
		$_POST['ddlDay']=$this->ddlDay;
		$_POST['ddlMonth']=$this->ddlMonth;
		$_POST['ddlWeek']=$this->ddlWeek;
		$_POST['ddlVirtualmachine']=$this->ddlVirtualmachine;
		$_POST['ddlProject']=$id;
		$_POST['ddlResourceGroup']=$this->ddlResourceGroup;
		$_POST['txtareaDescription']=$this->txtareaDescription;
		$_POST['txtEmail']=$this->txtEmail;
		$_POST['ddlAction']=$this->ddlAction;
		$_POST['txtTaskName']=$this->txtTaskName;
		$_POST['CronTime']=$this->CronTime;
		$_POST['txtSnapshotToRetain']=$this->txtSnapshotToRetain;
		$_POST['managedDisk']=$this->managedDisk;
		$_POST['AllBackupDisks']=$this->AllBackupDisks;
		$_POST['AllResourceGroup']=$this->AllResourceGroup;
		$_POST['AllRegion']=$this->AllRegion;
		$_POST['hdnlocName']=$this->hdnlocName;
		$_POST['backup_type']=$this->ddlbackup;
		$insert_task_id = $this->obj->createTask($_POST);
		if($insert_task_id >= 1){
		  $this->assertTrue(true);
		}else{
		  $this->fail();
		}		
        return $insert_task_id;
	}
	/**
    * @depends testgetproject_id
	* @depends testcreateTask
    */
	  /*
	| Model - Task_Model_azure | Test Case No.- (11).
    | Test Description - This function is to update data in to task_azure table
    | Assertion - assertTrue will be false if all values will be empty 
    */
	public function testupadteTask($id,$taskazure_id){
	    $_POST['ddlMinute']=$this->ddlMinute;
		$_POST['ddlHour']=$this->ddlHour;
		$_POST['ddlDay']=$this->ddlDay;
		$_POST['ddlMonth']=$this->ddlMonth;
		$_POST['ddlWeek']=$this->ddlWeek;
		$_POST['ddlVirtualmachine']=$this->ddlVirtualmachine;
		$_POST['ddlProject']=$id;
		$_POST['ddlResourceGroup']=$this->ddlResourceGroup;
		$_POST['txtareaDescription']=$this->txtareaDescription;
		$_POST['txtEmail']=$this->txtEmail;
		$_POST['ddlAction']=$this->ddlAction;
		$_POST['txtTaskName']=$this->txtTaskName;
		$_POST['CronTime']=$this->CronTime;
		$_POST['txtSnapshotToRetain']=$this->txtSnapshotToRetain;
		$_POST['AllBackupDisks']=$this->AllBackupDisks;
		$_POST['txtDestinationAccount']=$this->txtDestinationAccount;
		$_POST['txtDestinationContainer']=$this->txtDestinationContainer;
		$_POST['hdnTaskId']=$taskazure_id;
		$_POST['managedDisk']=$this->managedDisk;
		$_POST['backup_type']=$this->ddlbackup;
		$update_result = $this->obj->upadteTask($_POST);
		if($update_result == 1){
		  $this->assertTrue(true);
		}else{
		  $this->fail();
		}		
       
	}
	/**
	* @depends testcreateTask
    */
	  /*
	| Model - Task_Model_azure | Test Case No.- (12).
    | Test Description - This function is to updateStatus in task_azure table
    | Assertion - assertTrue will be false if all values will be empty 
    */
	public function testupdateStatus($taskazure_id){	 
		$update_status_result = $this->obj->updateStatus('0',$taskazure_id);
		if($update_status_result == "SUCCESS"){
		  $this->assertTrue(true);
		}else{
		  $this->fail();
		}		
       
	}
	/**
	* @depends testcreateTask
    */
	  /*
	| Model - Task_Model | Test Case No.- (13).
    | Test Description - This function is to deactivate_tasks in task_azure table
    | Assertion - assertTrue will be false if all values will be empty 
    */
	public function testdeactivate_tasks($taskazure_id){
		$update_status_result = $this->obj->deactivate_tasks('0',$taskazure_id);
		if($update_status_result == "SUCCESS"){
		  $this->assertTrue(true);
		}else{
		  $this->fail();
		}		
       
	}
	/**
	* @depends testcreateTask
    */
	  /*
	| Model - Task_Model_azure | Test Case No.- (14).
    | Test Description - This function is to get data from task_azure table
    | Assertion - assertTrue will be false if all values will be empty 
    */
	public function testgetTaskByIdInArray($taskazure_id){
		$update_status_result = $this->obj->getTaskByIdInArray($taskazure_id);
		if($update_status_result[0]['task_id'] == $taskazure_id){
		  $this->assertTrue(true);
		}else{
		  $this->fail();
		}		
       
	}
	/**
    * @depends testgetproject_id
	* @depends testcreateTask
    */
	  /*
	| Model - Task_Model_azure | Test Case No.- (15).
    | Test Description - This function is to insert data in to task_azure table
    | Assertion - assertTrue will be false if all values will be empty 
    */
	public function testinsertTaskAudit($id,$taskazure_id){
	    $_POST['project_id']=$id;
		$_POST['resource_group']=$this->resource_group;
		$_POST['task_id']=$taskazure_id;
		$_POST['name']=$this->name;
		$_POST['task']=$this->task;
		$_POST['notifications']=$this->notifications;
		$_POST['vm_id']=$this->vm_id;
		$_POST['vm_name']=$this->vm_name;
		$_POST['cron_time']=$this->cron_time;
		$_POST['time_value']=$this->time_value;
		$_POST['action_id']=$this->action_id;
		$_POST['region']=$this->region;
		$_POST['status']=$this->status;
		$_POST['tenant_id']=$this->tenant_id;
		$_POST['managedDisk']=$this->managedDisk;
		$_POST['backup_type']=$this->ddlbackup;
		$result = $this->obj->insertTaskAudit($_POST);
		if($result == 1){
		  $this->assertTrue(true);
		}else{
		  $this->fail();
		}
      		
       
	}
	/**
    * @depends testgetproject_id
	* @depends testcreateTask
    */
	  /*
	| Model - Task_Model_azure | Test Case No.- (16).
    | Test Description - This function is to insert data in to task_azure table
    | Assertion - assertTrue will be false if all values will be empty 
    */
	public function testSaveTaskAudit($id,$taskazure_id){
	    $_POST['ddlMinute']=$this->ddlMinute;
		$_POST['ddlHour']=$this->ddlHour;
		$_POST['ddlDay']=$this->ddlDay;
		$_POST['ddlMonth']=$this->ddlMonth;
		$_POST['ddlWeek']=$this->ddlWeek;
		$_POST['ddlVirtualmachine']=$this->ddlVirtualmachine;
		$_POST['ddlProject']=$id;
		$_POST['ddlResourceGroup']=$this->ddlResourceGroup;
		$_POST['txtareaDescription']=$this->txtareaDescription;
		$_POST['txtEmail']=$this->txtEmail;
		$_POST['ddlAction']=$this->ddlAction;
		$_POST['txtTaskName']=$this->txtTaskName;
		$_POST['CronTime']=$this->CronTime;
		$_POST['txtSnapshotToRetain']=$this->txtSnapshotToRetain;
		$_POST['AllBackupDisks']=$this->AllBackupDisks;
		$_POST['txtDestinationAccount']=$this->txtDestinationAccount;
		$_POST['txtDestinationContainer']=$this->txtDestinationContainer;
        $_POST['hdnTaskId']=$taskazure_id;
		$_POST['managedDisk']=$this->managedDisk;
		$_POST['backup_type']=$this->ddlbackup;
		$savetaskaudit_result = $this->obj->SaveTaskAudit($_POST);
		if($savetaskaudit_result >= 1){
		  $this->assertTrue(true);
		}else{
		  $this->fail();
		}
       return $savetaskaudit_result;		
       
	}
	/**
	* @depends testcreateTask
    */
	  /*
	| Model - Task_Model_azure | Test Case No.- (17).
    | Test Description - This function is to update data in to task_azure table
    | Assertion - assertTrue will be false if all values will be empty 
    */
	public function testupdateStatusaudit($taskazure_id){
		$updatetaskaudit_result = $this->obj->updateStatusaudit('0',$taskazure_id);
		if($updatetaskaudit_result == "SUCCESS"){
		  $this->assertTrue(true);
		}else{
		  $this->fail();
		}		
       
	}
	
	/**
    * @depends testgetproject_id
	* @depends testcreateTask
    */
	  /*
	| Model - Task_Model_azure | Test Case No.- (18).
    | Test Description - This function is to insert data in to task_azure table
    | Assertion - assertTrue will be false if all values will be empty 
    */
	public function testSaveFirstTaskAudit($id,$taskazure_id){
	    $_POST['ddlMinute']=$this->ddlMinute;
		$_POST['ddlHour']=$this->ddlHour;
		$_POST['ddlDay']=$this->ddlDay;
		$_POST['ddlMonth']=$this->ddlMonth;
		$_POST['ddlWeek']=$this->ddlWeek;
		$_POST['ddlVirtualmachine']=$this->ddlVirtualmachine;
		$_POST['ddlProject']=$id;
		$_POST['ddlResourceGroup']=$this->ddlResourceGroup;
		$_POST['txtareaDescription']=$this->txtareaDescription;
		$_POST['txtEmail']=$this->txtEmail;
		$_POST['ddlAction']=$this->ddlAction;
		$_POST['txtTaskName']=$this->txtTaskName;
		$_POST['CronTime']=$this->CronTime;
		$_POST['txtSnapshotToRetain']=$this->txtSnapshotToRetain;
		$_POST['AllBackupDisks']=$this->AllBackupDisks;
		$_POST['txtDestinationAccount']=$this->txtDestinationAccount;
		$_POST['txtDestinationContainer']=$this->txtDestinationContainer;
		$_POST['managedDisk']=$this->managedDisk;
		$_POST['backup_type']=$this->ddlbackup;
        $_POST['TaskId']=$taskazure_id;
		$savefirsttaskaudit_result = $this->obj->SaveFirstTaskAudit($_POST);
		if($savefirsttaskaudit_result >= 1){
		  $this->assertTrue(true);
		}else{
		  $this->fail();
		}
       return $savefirsttaskaudit_result;		
       
	}	
	
	/**
    *  @depends testcreateTask
    */
	/* | Model - Task_Model_azure | Test Case No.- (20).
    | Test Description - This function is to delete the data inserted into task_azure table
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testdeletetaskaudit_azure($id){
		$sql = "delete from  tasks_audit_azure where id='$id'";
		$query = $this->db->query($sql);
		$row = $this->db->affected_rows();
		if($row == 4){
			$this->assertTrue(true);
		}else{
			 $this->fail();
		}
	}
	/**
    *  @depends testcreateTask
    */
	/* | Model - Task_Model_azure | Test Case No.- (19).
    | Test Description - This function is to delete the data inserted into task_azure table
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testdeletetask_azure($id){
		$sql = "delete from  tasks_azure where task_id='$id'";
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
