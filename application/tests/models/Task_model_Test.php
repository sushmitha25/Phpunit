<?php

	/* Test Cases Description start*/
	/*
	 ==============================================================================================
	  NOTE :- Test Case no have some dependent test cases																			   
	 ==============================================================================================
	*/
		
	/*	
	print_r("\n\n\t"."===========================================================================");
	print_r("\n\t"."DESCRIPTION : Task_model.php TEST CASE LIST");
	print_r("\n\t"."===========================================================================");

	print_r("\n\t"."01. testcreateTask");
	print_r("\n\t"."02. testupadteTask @depends testcreateTask");
	print_r("\n\t"."03. testgetProjectCredentials @depends testcreateTask");
	print_r("\n\t"."04. testgetActionsWithUserCondition ");
	print_r("\n\t"."05. testgetActionsWithProjectCondition @depends testcreateTask");
	print_r("\n\t"."06. testgetActionsWithEditUserCondition");
	print_r("\n\t"."07. testgetTasks @depends testcreateTask");
	print_r("\n\t"."08. testgetRunningTasks ");
	print_r("\n\t"."09. testgetNotCompletedTasks");
	print_r("\n\t"."10. testgetTasksaction");
	print_r("\n\t"."11. testgetTasksForChart");
	print_r("\n\t"."12. testgetTaskById @depends testcreateTask");
	print_r("\n\t"."13. testUpdateStatus @depends testcreateTask");
	print_r("\n\t"."14. testupdateStatusaudit @depends testcreateTask");
	print_r("\n\t"."15. testdeactivate_tasks @depends testcreateTask");
	print_r("\n\t"."16. testgetTaskByIdInArray @depends testcreateTask");
	print_r("\n\t"."17. testinsertTaskAudit @depends testcreateTask");
	print_r("\n\t"."18. testSaveTaskAudit @depends testcreateTask");
	print_r("\n\t"."19. testSaveTaskAddTaskAudit @depends testcreateTask");
	print_r("\n\t"."20. testdeletetask @depends testcreateTask");
	print_r("\n\t"."21. testdeletetask_audit @depends testcreateTask");

	print_r("\n\n\t"."TOTAL TEST CASES : 21");
	print_r("\n\t"."==========================================================================="."\n\n");	
	*/	
	/* Test Cases Description end*/
		
class Task_model_test extends Testcase{
	
	/*
	| Model - Task_Model
    | Description - Setting global variables to use it in testAddTask() functions
    */
	protected $ddlMinute = '20';
  	protected $ddlHour = '11';
  	protected $ddlDay = '22';
  	protected $ddlMonth =  '4';
  	protected $ddlWeek = array('2');
	
	protected $chkDestinationRegion='1';
	protected $txtTaskName = 'Testcase for Task';
	protected $txtareaDescription='description of the task';
	protected $txtEmail='admin@axxon@gmail.com';
	protected $ddlSourceRegion='eu-west-1';
	protected $ddlAction='1';
	protected $CronTime='30 18 * * *';
	protected $txtSnapshotToRetain='0';
	protected $ddlDestRegion='Instance';
	protected $rbtnReboot='';
	protected $rbtnRole='';
	protected $ddlDbInstanceVolume='vol-0c09bdbbf7e4e302a';
	protected $ddlTagKey='Test Key';
	protected $ddlTagSecret='Test Value';
	protected $txtTagKey='Test Key';
	protected $txtTagSecret='Test Value';
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
	
	/*
	| Model - Task_Model
    | Test Description - This function is to setup task model
    */
	
	public function setUp(){
        $this->resetInstance();
        $this->CI->load->model('Task_model');
        $this->obj=$this->CI->Task_model;
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
  /*   | Model - Task_Model | Test Case No.- (01).
    | Test Description - This function is to get insert values in task table
    | Assertion - assertTrue will be true if all values will insert into task table properly
    */
    
    public function testcreateTask() {
		$sql = "select project_id from project";
		$query = $this->db->query($sql);
		$project_id = $query->result_array();
	    $pro_id	= $project_id[0]['project_id'];
      	$_POST['ddlMinute']=$this->ddlMinute;
		$_POST['ddlHour']=$this->ddlHour;
		$_POST['ddlDay']=$this->ddlDay;
		$_POST['ddlMonth']=$this->ddlMonth;
		$_POST['ddlWeek']=$this->ddlWeek;
		$_POST['ddlProject']=$pro_id;
		$_POST['txtTaskName']=$this->txtTaskName;
		$_POST['txtEmail']=$this->txtEmail;
		$_POST['txtareaDescription']=$this->txtareaDescription;
		$_POST['ddlSourceRegion']=$this->ddlSourceRegion;
		$_POST['ddlAction']=$this->ddlAction;
		$_POST['CronTime']=$this->CronTime;
		$_POST['rbtnReboot']=$this->rbtnReboot;
		$_POST['txtSnapshotToRetain']=$this->txtSnapshotToRetain;
		$_POST['ddlDestRegion']=$this->ddlDestRegion;
		$_POST['ddlDbInstanceVolume']=$this->ddlDbInstanceVolume;
		$_POST['rbtnRole']=$this->rbtnRole;
		$_POST['ddlTagKey']=$this->ddlTagKey;
		$_POST['ddlTagSecret']=$this->ddlTagSecret;
		$_POST['txtTagKey']=$this->txtTagKey;
		$_POST['txtTagSecret']=$this->txtTagSecret;
		$_POST['chkDestinationRegion']=$this->chkDestinationRegion;
		$insert_task_id = $this->obj->createTask($_POST);
		if($insert_task_id >= 1){
		  $this->assertTrue(true);
		}else{
		  $this->fail();
		}		
    
		return array($insert_task_id, $pro_id);
  		
    }
	 /**
    * @depends testcreateTask
    */
	
	/*   | Model - Task_Model | Test Case No.- (02).
    | Test Description - This function is to get update values in task table
    | Assertion - assertTrue will be true if all values will insert into task table properly
    */
    
    public function testupadteTask(array $datasent) {
      	$_POST['ddlMinute']=$this->ddlMinute;
		$_POST['ddlHour']=$this->ddlHour;
		$_POST['ddlDay']=$this->ddlDay;
		$_POST['ddlMonth']=$this->ddlMonth;
		$_POST['ddlWeek']=$this->ddlWeek;
		$_POST['ddlProject']=$datasent[1];
		$_POST['txtTaskName']=$this->txtTaskName;
		$_POST['txtEmail']=$this->txtEmail;
		$_POST['txtareaDescription']=$this->txtareaDescription;
		$_POST['ddlSourceRegion']=$this->ddlSourceRegion;
		$_POST['ddlAction']=$this->ddlAction;
		$_POST['CronTime']=$this->CronTime;
		$_POST['rbtnReboot']=$this->rbtnReboot;
		$_POST['txtSnapshotToRetain']=$this->txtSnapshotToRetain;
		$_POST['ddlDestRegion']=$this->ddlDestRegion;
		$_POST['ddlDbInstanceVolume']=$this->ddlDbInstanceVolume;
		$_POST['rbtnRole']=$this->rbtnRole;
		$_POST['ddlTagKey']=$this->ddlTagKey;
		$_POST['ddlTagSecret']=$this->ddlTagSecret;
		$_POST['txtTagKey']=$this->txtTagKey;
		$_POST['txtTagSecret']=$this->txtTagSecret;
		$_POST['chkDestinationRegion']=$this->chkDestinationRegion;
		$_POST['hdnTaskId']=$datasent[0];
		$update_task_id = $this->obj->upadteTask($_POST);
		if($update_task_id == 1){
		  $this->assertTrue(true);
		}else{
		  $this->fail();
		}		
       
  		
    }
	/**
    * @depends testcreateTask
    */
	/*
    | Model - Task_Model | Test Case No.- (03).
    | Test Description - This function is to get project details from project_id based on project_id
    | Assertion - assertTrue will be true if will get results 
    */
    
	public function testgetProjectCredentials(array $datasent){
		$_POST['ProjectId']=$datasent[1];
		$results =$this->obj->getProjectCredentials($_POST);
		if(!empty($results)){
		if($results->project_id == $_POST['ProjectId']){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
		}else{
			$this->fail();
		}
		
	}
	/*
    | Model - Task_Model | Test Case No.- (04).
    | Test Description - This function is to get action details
    | Assertion - assertTrue will be true if will get results 
    */
    
	public function testgetActionsWithUserCondition(){		
		$results =$this->obj->getActionsWithUserCondition($_POST);
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
	/**
    * @depends testcreateTask
    */
	/*
    | Model - Task_Model | Test Case No.- (05).
    | Test Description - This function is to get action details
    | Assertion - assertTrue will be true if will get results 
    */
    
	public function testgetActionsWithProjectCondition(array $datasent){
		$project_id=$datasent[1];
		$results =$this->obj->getActionsWithProjectCondition($project_id,'1');
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
    | Model - Task_Model | Test Case No.- (06).
    | Test Description - This function is to get action details
    | Assertion - assertTrue will be true if will get results 
    */
    
	public function testgetActionsWithEditUserCondition(){		
		$results =$this->obj->getActionsWithEditUserCondition();
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
	/**
    * @depends testcreateTask
    */
	/*
    | Model - Task_Model | Test Case No.- (07).
    | Test Description - This function is to get action details
    | Assertion - assertTrue will be true if will get results 
    */
    
	public function testgetTasks(array $datasent){
		$task_id=$datasent[0];
		$results =$this->obj->getTasks();
		 if(!empty($results)){
			foreach($results as $result){
				if($result->task_id == $task_id){
					$this->assertTrue(true);
				}
			}	
	    }else{
			$this->fail();
		}
		 
	}
	/*
    | Model - Task_Model | Test Case No.- (08).
    | Test Description - This function is to get count of task with particular tenant_id and status 1
    | Assertion - assertTrue will be true if will get results 
    */
    
	public function testgetRunningTasks(){		
		$results =$this->obj->getRunningTasks();
		 if(!empty($results)){
			if($results[0]->TaskCount >= 0){
			  $this->assertTrue(true);			  
			}else{
		      $this->fail();
			}
		 }else{
			 $this->fail();
		 }
	}
	
	/*
    | Model - Task_Model | Test Case No.- (09).
    | Test Description - This function is to get details of completed task
    | Assertion - assertTrue will be true if will get results 
    */
    
	public function testgetNotCompletedTasks(){		
		$results =$this->obj->getNotCompletedTasks();
		 if(!empty($results)){
			$this->assertTrue(true);			  
		 }
	}
	
	/*
    | Model - Task_Model | Test Case No.- (10).
    | Test Description - This function is to get count of tasks based on some conditions
    | Assertion - assertTrue will be true if will get results 
    */
    
	public function testgetTasksaction(){		
		$results =$this->obj->getTasksaction();
		 if(!empty($results)){
			$this->assertTrue(true);			  
		 }
	}
	/*
    | Model - Task_Model | Test Case No.- (11).
    | Test Description - This function is to get details of tasks based on some conditions
    | Assertion - assertTrue will be true if will get results 
    */
    
	public function testgetTasksForChart(){
		$year='2017';
		$results =$this->obj->getTasksForChart($year);
		 if(!empty($results)){
			$this->assertTrue(true);			  
		 }
	}
	/**
    * @depends testcreateTask
    */
	/*
    | Model - Task_Model | Test Case No.- (12).
    | Test Description - This function is to get details of tasks based on some conditions
    | Assertion - assertTrue will be true if will get results 
    */
    
	public function testgetTaskById(array $datasent){
		$results =$this->obj->getTaskById($datasent[0]);
		 if(!empty($results)){
			 if($results->task_id == $datasent[0]){
			$this->assertTrue(true);			  
		 }else{
			$this->fail();
		    }
	    }else{
			$this->fail();
		}
	}
	/**
    * @depends testcreateTask
    */
	/*
    | Model - Task_Model | Test Case No.- (13).
    | Test Description - This function is to update task status from tasks table with return id from testAddTask() function
    | Assertion - assertTrue will be true if it update status properly in tasks table
    */
    
    
	public function testUpdateStatus(array $datasent){	
	    $st='0';
		$results = $this->obj->updateStatus($st,$datasent[0]);
		if($results == "SUCCESS"){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
	}
	/**
    * @depends testcreateTask
    */
	/*
    | Model - Task_Model | Test Case No.- (14).
    | Test Description - This function is to insert data in to task audit table
    | Assertion - assertTrue will be true if it is inserted in to task audit table
    */
    
	public function testupdateStatusaudit(array $datasent){	
	    $st='1';
		$results = $this->obj->updateStatusaudit($st,$datasent[0]);
		if($results == "SUCCESS"){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
	}
	/**
    * @depends testcreateTask
    */
	/*
    | Model - Task_Model | Test Case No.- (15).
    | Test Description - This function is to change status in task  table
    | Assertion - assertTrue will be true if the status is changed correctly
    */
    
	public function testdeactivate_tasks(array $datasent){	
	    $st='1';
		$results = $this->obj->deactivate_tasks($st,$datasent[0]);
		if($results == "SUCCESS"){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
	}
	/**
    * @depends testcreateTask
    */
	/*
    | Model - Task_Model | Test Case No.- (16).
    | Test Description - This function is to get details of tasks based on some conditions
    | Assertion - assertTrue will be true if will get results 
    */
    
	public function testgetTaskByIdInArray(array $datasent){
		$results =$this->obj->getTaskByIdInArray($datasent[0]);
		 if(!empty($results)){
			 if($results[0]['task_id'] == $datasent[0]){
			$this->assertTrue(true);			  
		 }else{
			$this->fail();
		    }
	    }else{
			$this->fail();
		}
	}
	/**
    * @depends testcreateTask
    */
	/*
    | Model - Task_Model | Test Case No.- (17).
    | Test Description - This function is to get details of tasks based on some conditions
    | Assertion - assertTrue will be true if will get results 
    */
	  public function testinsertTaskAudit(array $datasent) {
		$sql = "select tenant_id from tenant";
		$query = $this->db->query($sql);
		$tenant_id = $query->result_array();
	    $ten_id	= $tenant_id[0]['tenant_id'];
      	$_POST['name']=$this->name;
		$_POST['task_id']=$datasent[0];
		$_POST['task']=$this->task;
		$_POST['project_id']='99';
		$_POST['instance_id']=$this->instance_id;
		$_POST['volume_id']=$this->volume_id;
		$_POST['dbinstance_id']=$this->dbinstance_id;
		$_POST['dbsnapshot_id']=$this->dbsnapshot_id;
		$_POST['cron_time']=$this->cron_time;
		$_POST['time_value']=$this->time_value;
		$_POST['action_id']=$this->action_id;
		$_POST['ddlAction']=$this->ddlAction;
		$_POST['region']=$this->region;
		$_POST['notifications']=$this->notifications;
		$_POST['snapshot_retain']=$this->snapshot_retain;
		$_POST['tenant_id']=$ten_id;
		$insertaudit_task_id = $this->obj->insertTaskAudit($_POST);
		if($insertaudit_task_id == 1){
		  $this->assertTrue(true);
		}else{
		  $this->fail();
		}
	 }

     /**
    * @depends testcreateTask
    */
	
	/*   | Model - Task_Model | Test Case No.- (18).
    | Test Description - This function is to insert data in to values task audit table
    | Assertion - assertTrue will be true if all values will insert into task table properly
    */
    
    public function testSaveTaskAudit(array $datasent) {
      	$_POST['ddlMinute']=$this->ddlMinute;
		$_POST['ddlHour']=$this->ddlHour;
		$_POST['ddlDay']=$this->ddlDay;
		$_POST['ddlMonth']=$this->ddlMonth;
		$_POST['ddlWeek']=$this->ddlWeek;
		$_POST['ddlProject']=$datasent[1];
		$_POST['txtTaskName']=$this->txtTaskName;
		$_POST['txtEmail']=$this->txtEmail;
		$_POST['txtareaDescription']=$this->txtareaDescription;
		$_POST['ddlSourceRegion']=$this->ddlSourceRegion;
		$_POST['ddlAction']=$this->ddlAction;
		$_POST['CronTime']=$this->CronTime;
		$_POST['rbtnReboot']=$this->rbtnReboot;
		$_POST['txtSnapshotToRetain']=$this->txtSnapshotToRetain;
		$_POST['ddlDestRegion']=$this->ddlDestRegion;
		$_POST['ddlDbInstanceVolume']=$this->ddlDbInstanceVolume;
		$_POST['rbtnRole']=$this->rbtnRole;
		$_POST['ddlTagKey']=$this->ddlTagKey;
		$_POST['ddlTagSecret']=$this->ddlTagSecret;
		$_POST['txtTagKey']=$this->txtTagKey;
		$_POST['txtTagSecret']=$this->txtTagSecret;
		$_POST['chkDestinationRegion']=$this->chkDestinationRegion;
		$_POST['hdnTaskId']=$datasent[0];
		$insertaudit_task_id = $this->obj->SaveTaskAudit($_POST);
		if($insertaudit_task_id == 1){
		  $this->assertTrue(true);
		}else{
		  $this->fail();
		}		 
  		
    }	
    
     /**
    * @depends testcreateTask
    */
	
	/*   | Model - Task_Model | Test Case No.- (19).
    | Test Description - This function is to insert data in to values task audit table
    | Assertion - assertTrue will be true if all values will insert into task table properly
    */
    
    public function testSaveTaskAddTaskAudit(array $datasent) {
      	$_POST['ddlMinute']=$this->ddlMinute;
		$_POST['ddlHour']=$this->ddlHour;
		$_POST['ddlDay']=$this->ddlDay;
		$_POST['ddlMonth']=$this->ddlMonth;
		$_POST['ddlWeek']=$this->ddlWeek;
		$_POST['ddlProject']=$datasent[1];
		$_POST['txtTaskName']=$this->txtTaskName;
		$_POST['txtEmail']=$this->txtEmail;
		$_POST['txtareaDescription']=$this->txtareaDescription;
		$_POST['ddlSourceRegion']=$this->ddlSourceRegion;
		$_POST['ddlAction']=$this->ddlAction;
		$_POST['CronTime']=$this->CronTime;
		$_POST['rbtnReboot']=$this->rbtnReboot;
		$_POST['txtSnapshotToRetain']=$this->txtSnapshotToRetain;
		$_POST['ddlDestRegion']=$this->ddlDestRegion;
		$_POST['ddlDbInstanceVolume']=$this->ddlDbInstanceVolume;
		$_POST['rbtnRole']=$this->rbtnRole;
		$_POST['ddlTagKey']=$this->ddlTagKey;
		$_POST['ddlTagSecret']=$this->ddlTagSecret;
		$_POST['txtTagKey']=$this->txtTagKey;
		$_POST['txtTagSecret']=$this->txtTagSecret;
		$_POST['chkDestinationRegion']=$this->chkDestinationRegion;
		$_POST['task_id']=$datasent[0];
		$insertaudit_task_id = $this->obj->SaveTaskAddTaskAudit($_POST);
		if($insertaudit_task_id == 1){
		  $this->assertTrue(true);
		}else{
		  $this->fail();
		}		 
  		
    }
	 /**
    *  @depends testcreateTask
    */
	/* | Model - Task_Model_azure | Test Case No.- (21).
    | Test Description - This function is to delete the data inserted into task table
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testdeletetask_audit(array $datasent){
		$sql = "delete from tasks_audit where id=$datasent[0]";
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
	/* | Model - Task_Model_azure | Test Case No.- (20).
    | Test Description - This function is to delete the data inserted into task table
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testdeletetask(array $datasent){
		$sql = "delete from tasks where task_id=$datasent[0]";
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
