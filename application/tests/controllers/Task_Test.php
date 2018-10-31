<?php 

	/* Test Cases Description start*/
	/*
	 ==============================================================================================
	  NOTE :- Test Case no.02 (test_getLast_TaskInserted_Id) have some dependent test cases.																				   
	 ==============================================================================================
	*/
		
	/*	
	print_r("\n\n\t"."===========================================================================");
	print_r("\n\t"."DESCRIPTION : Task.php TEST CASE LIST");
	print_r("\n\t"."===========================================================================");

	print_r("\n\t"."01. test_addTask");
	print_r("\n\t"."02. test_getLast_TaskInserted_Id");
	print_r("\n\t"."03. test_editTask @depends test_getLast_TaskInserted_Id");
	print_r("\n\t"."04. test_copy_task");
	print_r("\n\t"."05. test_get_email");
	print_r("\n\t"."06. test_get_crontime");
	print_r("\n\t"."07. test_convert_utc_cron");
	print_r("\n\t"."08. test_getRelatedOptions");
	print_r("\n\t"."09. test_taskchange");
	print_r("\n\t"."10. test_load_taskreport_grid");
	print_r("\n\t"."11. test_deactivate_tasks");
	print_r("\n\t"."12. test_runtask");
    print_r("\n\t"."13. testsnapshots_report");
	print_r("\n\n\t"."TOTAL TAST CASES : 13");
	print_r("\n\t"."==========================================================================="."\n\n");	
	*/	
	/* Test Cases Description end*/
		
class Task_test extends TestCase {
	
	
	/*
    | Controller - Task | Test Case No.- (01).
    | Test Description - This function will check if the view file loaded
    | Assertion - assertResponseCode check the http response code
    */
	public function test_index() {
		$output = $this->request ( 'GET', [ 
				'Task',
				'index' 
		] );
		$this->assertResponseCode ( 302 );
	}
	
	/*
    | Controller - Task | Test Case No.- (02).
    | Test Description - This function will check task report
    | Assertion - assertResponseCode check the http response code
    */
	public function test_task_report() {
		$output = $this->request ( 'GET', [ 
				'Task',
				'task_report' 
		] );
		$this->assertResponseCode ( 302 );
	}

	/*
    | Controller - Task | Test Case No.- (03).
    | Test Description - This function will check credentials
    | Assertion - assertResponseCode check the http response code
    */
	/*public function test_GetCredentials() {
		$output = $this->request ( 'GET', [ 
				'Task',
				'GetCredentials' 
		] );
		$this->assertResponseCode ( 302 );
	}*/
	
	/*
    | Controller - Task | Test Case No.- (04).
    | Test Description - This function will check add Task
    | Assertion - assertResponseCode check the http response code
    */
	/*public function test_add_task() {
		$output = $this->request ( 'GET', [ 
				'Task',
				'add_task' 
		] );
		$this->assertResponseCode ( 302 );
	}*/
	
	/*
    | Controller - Task | Test Case No.- (05).
    | Test Description - This function will check edit Task
    | Assertion - assertResponseCode check the http response code
    */
	/*public function test_edit_task() {
		$output = $this->request ( 'GET', [ 
				'Task',
				'edit_task' 
		] );
		$this->assertResponseCode ( 302 );
	}*/
	
	/*
    | Controller - Task | Test Case No.- (06).
    | Test Description - This function will check copy Task
    | Assertion - assertResponseCode check the http response code
    */
	/*public function test_copy_task() {
		$output = $this->request ( 'GET', [ 
				'Task',
				'copy_task' 
		] );
		$this->assertResponseCode ( 302 );
	}*/
	
	
	/*
    | Controller - Task | Test Case No.- (07).
    | Test Description - This function will check change status
    | Assertion - assertResponseCode check the http response code
    */
	/*public function test_statuschange() {
		$output = $this->request ( 'GET', [ 
				'Task',
				'statuschange' 
		] );
		$this->assertResponseCode ( 302 );
	}*/
	
	/*
    | Controller - Task | Test Case No.- (08).
    | Test Description - This function will load task
    | Assertion - assertResponseCode check the http response code
    */
	/*public function test_load_task_grid() {
		$output = $this->request ( 'GET', [ 
				'Task',
				'load_task_grid' 
		] );
		$this->assertResponseCode ( 302 );
	}*/
	
	/*
    | Controller - Task | Test Case No.- (09).
    | Test Description - This function will load task audit
    | Assertion - assertResponseCode check the http response code
    */
	/*public function test_load_task_audit_grid() {
		$output = $this->request ( 'GET', [ 
				'Task',
				'load_task_audit_grid' 
		] );
		$this->assertResponseCode ( 302 );
	}*/
	
	/*
    | Controller - Task | Test Case No.- (10).
    | Test Description - This function will load task report
    | Assertion - assertResponseCode check the http response code
    */
	/*public function test_load_taskreport_grid() {
		$output = $this->request ( 'GET', [ 
				'Task',
				'load_taskreport_grid' 
		] );
		$this->assertResponseCode ( 302 );
	}*/
	
	/*
    | Controller - Task | Test Case No.- (11).
    | Test Description - This function will check deactive task
    | Assertion - assertResponseCode check the http response code
    */
	public function test_deactivate_tasks() {
		$output = $this->request ( 'GET', [ 
				'Task',
				'deactivate_tasks' 
		] );
		$this->assertResponseCode ( 200 );
	}
	
	/*
    | Controller - Task | Test Case No.- (12).
    | Test Description - This function will check runtask
    | Assertion - assertResponseCode check the http response code
    */
	/*public function test_runtask() {
		$output = $this->request ( 'GET', [ 
				'Task',
				'runtask' 
		] );
		$this->assertResponseCode ( 200 );
	}*/
	/*
    | Controller - Task | Test Case No.- (13).
    | Test Description - This function will get snapshot report
    | Assertion - assertResponseCode check the http response code
    */
    public function testsnapshots_report() {
		$output = $this->request ( 'GET', [
				'Task',
				'snapshots_report'
		] );
		$this->assertResponseCode ( 302 );
	}
}	
?>