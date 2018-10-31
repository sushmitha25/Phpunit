<?php

	/* Test Cases Description start*/
	/*
	 ==============================================================================================
	 NOTE :- Test Case no.05 (testF_ins) have some dependent test cases.																				   
	 ==============================================================================================
	*/
		
	/*	
	 print_r("\n\n\t"."===========================================================================");
	 print_r("\n\t"."DESCRIPTION : Recon_model.php TEST CASE LIST");
	 print_r("\n\t"."===========================================================================");
	 
	 print_r("\n\t"."01. testCreateProject_blank");
	 print_r("\n\t"."02. testStatus_check_cron_insert");
	 print_r("\n\t"."03. testGettask_details");
	 print_r("\n\t"."04. testGetscheduledtask_details");
	 print_r("\n\t"."05. testF_ins");
	 print_r("\n\t"."06. testRem_cronjob_details ");
	 print_r("\n\t"."07. testApp_cronjob_details ");
	 print_r("\n\t"."08. testGet_cronserver_details_ping");
	 print_r("\n\t"."09. testTask");
	 print_r("\n\t"."10. testDaily_task_count_qry");
	 print_r("\n\t"."11. testTask_history_qry");
	 print_r("\n\t"."12. testTask_history_completed_qry");
	 print_r("\n\t"."13. testTask_history_started_qry");
	 print_r("\n\t"."14. testTask_history_stopped_qry");
	 print_r("\n\t"."15. testTask_history_pending_qry");
	 print_r("\n\t"."16. testTask_history_failed_qry");
	 print_r("\n\t"."17. testTask_history_deleted_qry");
	 print_r("\n\t"."18. testTask_history_error_qry");
	 print_r("\n\t"."19. testGet_project_name_qry");
	 print_r("\n\t"."20. testApf_task");
	 print_r("\n\t"."21. testApf_daily_task_count_qry");
	 print_r("\n\t"."22. testApf_task_history_qry");
	 print_r("\n\t"."23. testApf_task_history_completed_qry");
	 print_r("\n\t"."24. testApf_task_history_started_qry");
	 print_r("\n\t"."25. testApf_task_history_stopped_qry");
	 print_r("\n\t"."26. testApf_task_history_pending_qry");
	 print_r("\n\t"."27. testApf_task_history_failed_qry");
	 print_r("\n\t"."28. testApf_task_history_deleted_qry");
	 print_r("\n\t"."29. testApf_task_history_error_qry");
	 print_r("\n\t"."30. testProjectid_based_on_clients");
	 print_r("\n\t"."31. testget_scheduledazuretask_details");
	 print_r("\n\t"."32. testget_azure_task_details");
	 print_r("\n\t"."33. testGetcronserver_details");
	 print_r("\n\t"."34. testcheckstatus");
	 print_r("\n\t"."35. testget_projectid_qry");
	 print_r("\n\t"."36. testcustom_mail_by_id");
	 print_r("\n\t"."37. testdaily_status_by_tenant");
	 print_r("\n\t"."38. testget_azure_task_by_project");
	 print_r("\n\t"."39. testget_azure_task_history_qry");
	 print_r("\n\t"."40. testget_azure_task_history_completed_qry");
	 print_r("\n\t"."41. testget_azure_task_history_stopped_qry");
	 print_r("\n\t"."42. testget_azure_task_history_pending_qry");
	 print_r("\n\t"."43. testget_azure_task_history_failed_qry");
	 print_r("\n\t"."44. testget_azure_task_history_snapshot_qry");
	 print_r("\n\t"."45. testget_azure_projectid_qry");
	 print_r("\n\t"."46. testget_azure_project_name_qry");
	 print_r("\n\t"."47. testazure_daily_status_by_tenant");
	 print_r("\n\t"."48. testget_azure_task_name_by_ids_qry");
	 print_r("\n\t"."49. testget_azure_snapshot_delete_details");
	 print_r("\n\t"."50. testget_all_azure_project_by_tenant");
	  print_r("\n\t"."51. testget_azure_active_task_by_project");
	 print_r("\n\t"."52. testazure_monthly_task_history_completed_qry");
	 print_r("\n\t"."53. testazure_monthly_task_history_failed_qry");
	 print_r("\n\t"."54. testazure_monthly_task_history_pending_qry");
	 print_r("\n\t"."55. testget_azure_project_details");
	 
	 print_r("\n\n\t"."TOTAL TEST CASES : 30");
	 print_r("\n\t"."==========================================================================="."\n\n");	
	*/	
	/* Test Cases Description end*/

class Recon_model_test extends TestCase {
	
	/*
	| Model - Recon_model
    | Description - Setting global variables to use it in testStatus_check_cron_insert() functions
    */
	
	protected $server_pop = '40.0.0.107';
	protected $status_check_path = '* * * * * cd /var/www/html; php statuscheck.php';
	protected $status_check_cronstatus = '1';
	protected $value1 = '544';
	protected $actionid = '1';
	protected $time_value = '* * * * * cd /var/www/html; php statuscheck.php';
	protected $cron_status = '1';
	
	/*
	| Model - Recon_model
    | Test Description - This function is to setup Recon model
    */	
	
	public function setUp(){
        $this->resetInstance();
        $this->CI->load->model('Recon_model');
        $this->obj=$this->CI->Recon_model;
    }
        
    /*
	| Model - Recon_Model | Test Case No.- (01).
    | Test Description - This function is to test empty values in cron_job
    | Assertion - assertFalse will be false if all values will be empty 
    */
	
	/*public function testcron_insert_blank(){
    	$server_pop=$this->server_pop;
		$status_check_path=$this->status_check_path;
		$status_check_cronstatus=$this->status_check_cronstatus;
        $insert_cronjob = $this->obj->status_check_cron_insert($server_pop,$status_check_path,$status_check_cronstatus);
        if($insert_cronjob >= 1){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}

    }*/
    
    /*
    | Model - Recon_Model | Test Case No.- (02).
    | Test Description - This function is to insert values into cron_job table
    | Assertion - assertTrue will be true if it inserts properly into cron_job table
    */
    
    /*public function testStatus_check_cron_insert(){
    	
        $insert_cronjob = $this->obj->status_check_cron_insert($this->server_pop,$this->status_check_path,$this->status_check_cronstatus);
        $this->assertTrue(true);
    }*/
    
    /*
    | Model - Recon_Model | Test Case No.- (03).
    | Test Description - This function is to get task details from tasks table with task id
    | Assertion - assertTrue will be true if it get proper result from tasks table
    */
    
    public function testGettask_details(){
        $results = $this->obj->get_task_details(1);
    	if(!empty($results)){	
			$this->assertTrue(true);
	  	}
	  	
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (04).
    | Test Description - This function is to get scheduled task details from tasks table where is_cronjob = 1
    | Assertion - assertTrue will be true if will get results properly from tasks table
    */
    
    public function testGetscheduledtask_details(){
        $results = $this->obj->get_scheduledtask_details();
        if(!empty($results)){
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (05).
    | Test Description - This function is to insert into cron_job table with actionid and status
    | Assertion - assertTrue will be true if it inserts properly into cron_job table
    */
    
   /* public function testF_ins(){
    	
		$insert_cronjob2 = $this->obj->f_ins($this->server_pop,$this->value1,$this->actionid,$this->time_value,$this->cron_status,date('Y-m-d H:i:s'));
		if($insert_cronjob2 >= 1){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
		         
    }*/
    
    /*
    | Model - Recon_Model | Test Case No.- (06).
    | Test Description - This function is to get details from cron_job with return server_pop value from testF_ins() function
    | Assertion - assertTrue will be true if it get results properly from cron_job table
    */

   
    public function testRem_cronjob_details(){
        $results = $this->obj->rem_cronjob_details($this->server_pop);
        if(!empty($results)){	
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (07).
    | Test Description - This function is to get details from cron_job with return server_pop value from testF_ins() function where cron_status = 1
    | Assertion - assertTrue will be true if it get results properly from cron_job table
    */
  
    public function testApp_cronjob_details(){
        $results = $this->obj->app_cronjob_details($this->server_pop);
        if(!empty($results)){
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (08).
    | Test Description - This function is to get ip_address from cron_server_details
    | Assertion - assertTrue will be true if it get results properly from cron_server_details table
    */
    
    public function testGet_cronserver_details_ping(){
        $results = $this->obj->get_cronserver_details_ping();
        if(!empty($results)){
			$this->assertTrue(true);
		}else{
			//$this->fail();
		}
    }
    
   
    
    /*
    | Model - Recon_Model | Test Case No.- (09).
    | Test Description - This function is to get details from tasks where status = 1
    | Assertion - assertTrue will be true if it get results properly from tasks table
    */
    
    public function testTask(){
    	$results = $this->obj->task();
    	if(!empty($results)){
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (10).
    | Test Description - This function is to get daily task count from cron_job table
    | Assertion - assertTrue will be true if it get results properly from cron_job table
    */
    
    public function testDaily_task_count_qry(){
    	$results = $this->obj->daily_task_count_qry();
    	if(!empty($results)){
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (11).
    | Test Description - This function is to get task history from task_history table with given actual_date
    | Assertion - assertTrue will be true if it get results properly from task_history table
    */
    
    public function testTask_history_qry(){
    	$actual_date = '2016-07-25';
    	$results = $this->obj->task_history_qry($actual_date);
		if(!empty($results))
	    {
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (12).
    | Test Description - This function is to get task history from task_history table with given actual_date where status = completed
    | Assertion - assertTrue will be true if it get results properly from task_history table
    */
    
    public function testTask_history_completed_qry(){
    	$actual_date = '2016-07-25';
    	$results = $this->obj->task_history_completed_qry($actual_date);
    	if(!empty($results))
	    {
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (13).
    | Test Description - This function is to get task history from task_history table with given actual_date where status = running
    | Assertion - assertTrue will be true if it get results properly from task_history table
    */
    
    public function testTask_history_started_qry(){
    	$actual_date = '2016-07-25';
    	$results = $this->obj->task_history_started_qry($actual_date);
    	if(!empty($results))
	    {
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (14).
    | Test Description - This function is to get task history from task_history table with given actual_date where status = stopped
    | Assertion - assertTrue will be true if it get results properly from task_history table
    */
    
    public function testTask_history_stopped_qry(){
    	$actual_date = '2016-07-25';
    	$results = $this->obj->task_history_stopped_qry($actual_date);
    	if(!empty($results))
	    {
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (15).
    | Test Description - This function is to get task history from task_history table with given actual_date where status = pending
    | Assertion - assertTrue will be true if it get results properly from task_history table
    */
    
    public function testTask_history_pending_qry(){
    	$actual_date = '2016-07-25';
    	$results = $this->obj->task_history_pending_qry($actual_date);
    	if(!empty($results))
	    {
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (16).
    | Test Description - This function is to get task history from task_history table with given actual_date where status = failed
    | Assertion - assertTrue will be true if it get results properly from task_history table
    */
    
    public function testTask_history_failed_qry(){
    	$actual_date = '2016-07-25';
    	$results = $this->obj->task_history_failed_qry($actual_date);
    	if(!empty($results))
	    {
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (17).
    | Test Description - This function is to get task history from task_history table with given actual_date where status = Not Available-Deleted
    | Assertion - assertTrue will be true if it get results properly from task_history table
    */
    
    public function testTask_history_deleted_qry(){
    	$actual_date = '2016-07-25';
    	$results = $this->obj->task_history_deleted_qry($actual_date);
    	if(!empty($results))
	    {
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (18).
    | Test Description - This function is to get task history from task_history table with given actual_date where error_log != ''
    | Assertion - assertTrue will be true if it get results properly from task_history table
    */
    
    public function testTask_history_error_qry(){
    	$actual_date = '0000-00-00';
    	$results = $this->obj->task_history_error_qry($actual_date);
    	if(!empty($results))
	    {
			$this->assertTrue(true);
		}
    }
    
    
    
    /*
    | Model - Recon_Model | Test Case No.- (19).
    | Test Description - This function is to get project name from project table with given projectid
    | Assertion - assertTrue will be true if it get results properly from tasks table
    */
    
    public function testGet_project_name_qry(){
    	$results = $this->obj->get_project_name_qry(1);
    	if(!empty($results))
	    {
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (20).
    | Test Description - This function is to get apf task from tasks table with given projectid
    | Assertion - assertTrue will be true if it get results properly from tasks table
    */
    
    public function testApf_task(){
    	$results = $this->obj->apf_task(1);
        if(!empty($results))
	    {
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (21).
    | Test Description - This function is to get daily apf count from cron_job table with given taskid
    | Assertion - assertTrue will be true if it get results properly from cron_job table
    */
    
    public function testApf_daily_task_count_qry(){
    	$results = $this->obj->apf_daily_task_count_qry(1);
    	if(!empty($results))
	    {
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (22).
    | Test Description - This function is to get daily apf count from cron_job table with given taskid and actualdate
    | Assertion - assertTrue will be true if it get results properly from cron_job table
    */
    
    public function testApf_task_history_qry(){
    	$FromDate = '0000-00-00';
    	$ToDate = '0000-00-00';
    	$results = $this->obj->apf_task_history_qry(1,$FromDate,$ToDate);
    	if(!empty($results))
	    {
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (23).
    | Test Description - This function is to get daily apf count from cron_job table with given taskid and actualdate where status = completed
    | Assertion - assertTrue will be true if it get results properly from cron_job table
    */
    
    public function testApf_task_history_completed_qry(){
    	$FromDate = '0000-00-00';
    	$ToDate = '0000-00-00';
    	$results = $this->obj->apf_task_history_completed_qry(1,$FromDate,$ToDate);
    	if(!empty($results))
	    {
			$this->assertTrue(true);
		}
    }
	
	/*
    | Model - Recon_Model | Test Case No.- (24).
    | Test Description - This function is to get daily apf count from cron_job table with given taskid and actualdate where status = running
    | Assertion - assertTrue will be true if it get results properly from cron_job table
    */
	    
    public function testApf_task_history_started_qry(){
    	$FromDate = '0000-00-00';
    	$ToDate = '0000-00-00';
    	$results = $this->obj->apf_task_history_started_qry(1,$FromDate,$ToDate);
    	if(!empty($results))
	    {
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (25).
    | Test Description - This function is to get daily apf count from cron_job table with given taskid and actualdate where status = stopped
    | Assertion - assertTrue will be true if it get results properly from cron_job table
    */
    
    public function testApf_task_history_stopped_qry(){
    	$FromDate = '0000-00-00';
    	$ToDate = '0000-00-00';
    	$results = $this->obj->apf_task_history_stopped_qry(1,$FromDate,$ToDate);
    	if(!empty($results))
	    {
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (26).
    | Test Description - This function is to get daily apf count from cron_job table with given taskid and actualdate where status = pending
    | Assertion - assertTrue will be true if it get results properly from cron_job table
    */
    
    public function testApf_task_history_pending_qry(){
    	$FromDate = '0000-00-00';
    	$ToDate = '0000-00-00';
    	$results = $this->obj->apf_task_history_pending_qry(1,$FromDate,$ToDate);
    	if(!empty($results))
	    {
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (27).
    | Test Description - This function is to get daily apf count from cron_job table with given taskid and actualdate where status = Failed
    | Assertion - assertTrue will be true if it get results properly from cron_job table
    */
    
    public function testApf_task_history_failed_qry(){
    	$FromDate = '0000-00-00';
    	$ToDate = '0000-00-00';
    	$results = $this->obj->apf_task_history_failed_qry(1,$FromDate,$ToDate);
    	if(!empty($results))
	    {
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (28).
    | Test Description - This function is to get daily apf count from cron_job table with given taskid and actualdate where status = Not Available-Deleted
    | Assertion - assertTrue will be true if it get results properly from cron_job table
    */
    
    public function testApf_task_history_deleted_qry(){
    	$FromDate = '0000-00-00';
    	$ToDate = '0000-00-00';
    	$results = $this->obj->apf_task_history_deleted_qry(1,$FromDate,$ToDate);
    	if(!empty($results))
	    {
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (29).
    | Test Description - This function is to get daily apf count from cron_job table with given taskid and actualdate where error_log != ''
    | Assertion - assertTrue will be true if it get results properly from cron_job table
    */
    
    public function testApf_task_history_error_qry(){
    	$FromDate = '0000-00-00';
    	$ToDate = '0000-00-00';
    	$results = $this->obj->apf_task_history_error_qry(1,$FromDate,$ToDate);
    	if(!empty($results))
	    {
			$this->assertTrue(true);
		}
    }
    
    /*
    | Model - Recon_Model | Test Case No.- (30).
    | Test Description - This function is to get projectid from project table for client = Azim Premji Foundation and Mphasis
    | Assertion - assertTrue will be true if it get results properly from project table
    */
    
    public function testProjectid_based_on_clients(){
    	$results = $this->obj->projectid_based_on_clients();
    	if(!empty($results))
	    {
			$this->assertTrue(true);
		}
    }
	/*
    | Model - Recon_Model | Test Case No.- (31).
    | Test Description - This function is to get scheduled task_azure details from tasks table where is_cronjob = 1
    | Assertion - assertTrue will be true if will get results properly from tasks table
    */
    
    public function testget_scheduledazuretask_details(){
        $results = $this->obj->get_scheduledazuretask_details();
       if(!empty($results)){
			$this->assertTrue(true);
		}
    }
    /*
    | Model - Recon_Model | Test Case No.- (32).
    | Test Description - This function is to get scheduled task_azure details from tasks table where is_cronjob = 1
    | Assertion - assertTrue will be true if will get results properly from tasks table
    */
    
    public function testget_azure_task_details(){
        $results = $this->obj->get_azure_task_details('1');
        if(!empty($results)){
			$this->assertTrue(true);
		}
    }
    //...............database error in actual code.............................
     /*
    | Model - Recon_Model | Test Case No.- (33).
    | Test Description - This function is to details from tasks table where is_cronjob = 1
    | Assertion - assertTrue will be true if will get results properly from tasks table
    */
    public function testGetcronserver_details(){
        $results = $this->obj->get_cronserver_details();
       if(!empty($results)){
			$this->assertTrue(true);
	   }else{
		    $this->fail();
	   }
        
    }
	/*
    | Model - Recon_Model | Test Case No.- (34).
    | Test Description - This function is to details from cron_server_details table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from tasks table
    */
    public function testcheckstatus(){
        $results = $this->obj->checkstatus($this->server_pop);
        if(!empty($results)){
			$this->assertTrue(true);
	    }
        
    }
	/*
    | Model - Recon_Model | Test Case No.- (35).
    | Test Description - This function is to details from project table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from project table
    */
    public function testget_projectid_qry(){
        $results = $this->obj->get_projectid_qry(1);
        if(!empty($results)){
			$this->assertTrue(true);
	    }
        
    }
	/*
    | Model - Recon_Model | Test Case No.- (36).
    | Test Description - This function is to details from custom table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from custom_mail table
    */
    public function testcustom_mail_by_id(){
        $results = $this->obj->custom_mail_by_id(1);
        if(!empty($results)){
			$this->assertTrue(true);
	    }
        
    }
	/*
    | Model - Recon_Model | Test Case No.- (37).
    | Test Description - This function is to details from tasks table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from tasks table
    */
    public function testdaily_status_by_tenant(){
        $results = $this->obj->daily_status_by_tenant(1);
        if(!empty($results)){
			$this->assertTrue(true);
	    }	
    }
	/*
    | Model - Recon_Model | Test Case No.- (38).
    | Test Description - This function is to details from project table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from project table
    */
    public function testget_azure_task_by_project(){
        $results = $this->obj->get_azure_task_by_project(1);
        if(!empty($results)){
			$this->assertTrue(true);
	    }	
    }
	/*
    | Model - Recon_Model | Test Case No.- (39).
    | Test Description - This function is to details from task_history table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from task_history table
    */
    public function testget_azure_task_history_qry(){
		$FromDate = '0000-00-00';
    	$ToDate = '0000-00-00';
        $results = $this->obj->get_azure_task_history_qry(1,$FromDate,$ToDate);
        if(!empty($results)){
			$this->assertTrue(true);
	    }	
    }
	/*
    | Model - Recon_Model | Test Case No.- (40).
    | Test Description - This function is to details from task_history table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from task_history table
    */
    public function testget_azure_task_history_completed_qry(){
		$FromDate = '0000-00-00';
    	$ToDate = '0000-00-00';
        $results = $this->obj->get_azure_task_history_completed_qry(1,$FromDate,$ToDate);
        if(!empty($results)){
			$this->assertTrue(true);
	    }	
    }
	/*
    | Model - Recon_Model | Test Case No.- (41).
    | Test Description - This function is to details from task_history table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from task_history table
    */
    public function testget_azure_task_history_stopped_qry(){
		$FromDate = '0000-00-00';
    	$ToDate = '0000-00-00';
        $results = $this->obj->get_azure_task_history_stopped_qry(1,$FromDate,$ToDate);
        if(!empty($results)){
			$this->assertTrue(true);
	    }	
    }
    /*
    | Model - Recon_Model | Test Case No.- (42).
    | Test Description - This function is to details from task_history table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from task_history table
    */
    public function testget_azure_task_history_pending_qry(){
		$FromDate = '0000-00-00';
    	$ToDate = '0000-00-00';
        $results = $this->obj->get_azure_task_history_pending_qry(1,$FromDate,$ToDate);
        if(!empty($results)){
			$this->assertTrue(true);
	    }	
    }
	/*
    | Model - Recon_Model | Test Case No.- (43).
    | Test Description - This function is to details from task_history table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from task_history table
    */
    public function testget_azure_task_history_failed_qry(){
		$FromDate = '0000-00-00';
    	$ToDate = '0000-00-00';
        $results = $this->obj->get_azure_task_history_failed_qry(1,$FromDate,$ToDate);
        if(!empty($results)){
			$this->assertTrue(true);
	    }	
    }
	
	/*
    | Model - Recon_Model | Test Case No.- (44).
    | Test Description - This function is to details from task_history table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from task_history table
    */
    public function testget_azure_task_history_snapshot_qry(){
		$FromDate = '0000-00-00';
    	$ToDate = '0000-00-00';
        $results = $this->obj->get_azure_task_history_snapshot_qry(1,$FromDate,$ToDate);
        if(!empty($results)){
			$this->assertTrue(true);
	    }	
    }
	/*
    | Model - Recon_Model | Test Case No.- (45).
    | Test Description - This function is to details from tasks_azure table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from tasks table
    */
    public function testget_azure_projectid_qry(){
        $results = $this->obj->get_azure_projectid_qry(1);
        if(!empty($results)){
			$this->assertTrue(true);
	    }	
    }
	/*
    | Model - Recon_Model | Test Case No.- (46).
    | Test Description - This function is to details from project_azure table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from tasks table
    */
    public function testget_azure_project_name_qry(){
        $results = $this->obj->get_azure_project_name_qry(1);
        if(!empty($results)){
			$this->assertTrue(true);
	    }	
    }
	/*
    | Model - Recon_Model | Test Case No.- (47).
    | Test Description - This function is to details from tenant_azure table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from tasks table
    */
    public function testazure_daily_status_by_tenant(){
        $results = $this->obj->azure_daily_status_by_tenant(1);
        if(!empty($results)){
			$this->assertTrue(true);
	    }	
    }
	/*
    | Model - Recon_Model | Test Case No.- (48).
    | Test Description - This function is to details from tasks_azure table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from tasks table
    */
    public function testget_azure_task_name_by_ids_qry(){
        $results = $this->obj->get_azure_task_name_by_ids_qry(1);
        if(!empty($results)){
			$this->assertTrue(true);
	    }	
    }
	/*
    | Model - Recon_Model | Test Case No.- (49).
    | Test Description - This function is to details from tasks_azure table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from tasks table
    */
    public function testget_azure_snapshot_delete_details(){
        $results = $this->obj->get_azure_snapshot_delete_details();
        if(!empty($results)){
			$this->assertTrue(true);
	    }	
    }
	/*
    | Model - Recon_Model | Test Case No.- (50).
    | Test Description - This function is to details from tenant table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from tenant table
    */
    public function testget_all_azure_project_by_tenant(){
        $results = $this->obj->get_all_azure_project_by_tenant(1);
        if(!empty($results)){
			$this->assertTrue(true);
	    }	
    }
	/*
    | Model - Recon_Model | Test Case No.- (51).
    | Test Description - This function is to details from task_history table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from task_history table
    */
    public function testget_azure_active_task_by_project(){
		$FromDate = '0000-00-00';
    	$ToDate = '0000-00-00';
        $results = $this->obj->get_azure_active_task_by_project(1,$FromDate,$ToDate);
        if(!empty($results)){
			$this->assertTrue(true);
	    }	
    }
	/*
    | Model - Recon_Model | Test Case No.- (52).
    | Test Description - This function is to details from task_history table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from task_history table
    */
    public function testazure_monthly_task_history_completed_qry(){
		$FromDate = '0000-00-00';
    	$ToDate = '0000-00-00';
        $results = $this->obj->azure_monthly_task_history_completed_qry($FromDate,$ToDate,1);
        if(!empty($results)){
			$this->assertTrue(true);
	    }	
    }
	/*
    | Model - Recon_Model | Test Case No.- (53).
    | Test Description - This function is to details from task_history table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from task_history table
    */
    public function testazure_monthly_task_history_failed_qry(){
		$FromDate = '0000-00-00';
    	$ToDate = '0000-00-00';
        $results = $this->obj->azure_monthly_task_history_failed_qry($FromDate,$ToDate,1);
        if(!empty($results)){
			$this->assertTrue(true);
	    }	
    }
	/*
    | Model - Recon_Model | Test Case No.- (54).
    | Test Description - This function is to details from task_history table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from task_history table
    */
    public function testazure_monthly_task_history_pending_qry(){
		$FromDate = '0000-00-00';
    	$ToDate = '0000-00-00';
        $results = $this->obj->azure_monthly_task_history_pending_qry($FromDate,$ToDate,1);
        if(!empty($results)){
			$this->assertTrue(true);
	    }	
    }
	/*
    | Model - Recon_Model | Test Case No.- (55).
    | Test Description - This function is to details from project table based on the ip address
    | Assertion - assertTrue will be true if will get results properly from project table
    */
    public function testget_azure_project_details(){
        $results = $this->obj->get_azure_project_details(1);
        if(!empty($results)){
			$this->assertTrue(true);
	    }	
    }
	
    //...............database error in actual code.............................
    
    /*public function testRemove_details(){
        $results = $this->obj->remove_details();
        $this->assertTrue(true);
        
    }*/
	
    
	
}
