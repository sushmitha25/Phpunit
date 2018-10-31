<?php 

	/* Test Cases Description start*/
	/*
	 ==============================================================================================
	  NOTE :- Test Case no.02 (test_getLast_TaskInserted_Id) have some dependent test cases.																				   
	 ==============================================================================================
	*/
		
	/*	
	print_r("\n\n\t"."===========================================================================");
	print_r("\n\t"."DESCRIPTION : Task_azure.php TEST CASE LIST");
	print_r("\n\t"."===========================================================================");

	print_r("\n\t"."01. test_index");
	print_r("\n\t"."02. test_task_report");
	print_r("\n\t"."03. test_GetCredentials");
	print_r("\n\t"."04. test_add_task");
	print_r("\n\t"."05. test_edit_task");
	print_r("\n\t"."06. test_copy_task");
	print_r("\n\t"."07. test_statuschange");
	print_r("\n\t"."08. test_load_task_grid");
	print_r("\n\t"."09. test_load_task_audit_grid");
	print_r("\n\t"."10. test_load_taskreport_grid");
	print_r("\n\t"."11. test_deactivate_tasks");
	print_r("\n\t"."12. test_runtask");

	print_r("\n\n\t"."TOTAL TAST CASES : 9");
	print_r("\n\t"."==========================================================================="."\n\n");	
	*/	
	/* Test Cases Description end*/
		
class Task_azure_test extends TestCase {
	
	
	/*
    | Controller - Task_azure | Test Case No.- (01).
    | Test Description - This function will check if the view file loaded
    | Assertion - assertResponseCode check the http response code
    */
	public function test_index() {
		$output = $this->request ( 'GET', [ 
				'Task_azure',
				'index' 
		] );
		$this->assertResponseCode ( 302 );
	}
	
	/*
    | Controller - Task_azure | Test Case No.- (02).
    | Test Description - This function will check Task_azure report
    | Assertion - assertResponseCode check the http response code
    */
	public function test_task_report() {
		$output = $this->request ( 'GET', [ 
				'Task_azure',
				'task_report' 
		] );
		$this->assertResponseCode ( 302 );
	}

	/*
    | Controller - Task_azure | Test Case No.- (03).
    | Test Description - This function will check credentials
    | Assertion - assertResponseCode check the http response code
    */
	/*public function test_GetCredentials() {
		$output = $this->request ( 'GET', [ 
				'Task_azure',
				'GetCredentials' 
		] );
		$this->assertResponseCode ( 302 );
	}*/
	
	/*
    | Controller - Task_azure | Test Case No.- (04).
    | Test Description - This function will check add Task_azure
    | Assertion - assertResponseCode check the http response code
    */
	public function test_add_task() {
		$output = $this->request ( 'GET', [ 
				'Task_azure',
				'add_task' 
		] );
		$this->assertResponseCode ( 302 );
	}
	
	/*
    | Controller - Task_azure | Test Case No.- (05).
    | Test Description - This function will check edit Task_azure
    | Assertion - assertResponseCode check the http response code
    */
	public function test_edit_task() {
		$output = $this->request ( 'GET', [ 
				'Task_azure',
				'edit_task' 
		] );
		$this->assertResponseCode ( 302 );
	}
	
	/*
    | Controller - Task_azure | Test Case No.- (06).
    | Test Description - This function will check copy Task_azure
    | Assertion - assertResponseCode check the http response code
    */
	public function test_copy_task() {
		$output = $this->request ( 'GET', [ 
				'Task_azure',
				'copy_task' 
		] );
		$this->assertResponseCode ( 302 );
	}
	
	
	/*
    | Controller - Task_azure | Test Case No.- (07).
    | Test Description - This function will check change status
    | Assertion - assertResponseCode check the http response code
    */
	/*public function test_statuschange() {
		$output = $this->request ( 'GET', [ 
				'Task_azure',
				'statuschange' 
		] );
		$this->assertResponseCode ( 200 );
	}*/
	
	/*
    | Controller - Task_azure | Test Case No.- (08).
    | Test Description - This function will load Task_azure
    | Assertion - assertResponseCode check the http response code
    */
	/*public function test_load_task_grid() {
		$output = $this->request ( 'GET', [ 
				'Task_azure',
				'load_task_grid' 
		] );
		$this->assertResponseCode ( 302 );
	}*/
	
	/*
    | Controller - Task_azure | Test Case No.- (09).
    | Test Description - This function will load Task_azure audit
    | Assertion - assertResponseCode check the http response code
    */
	/*public function test_load_task_audit_grid() {
		$output = $this->request ( 'GET', [ 
				'Task_azure',
				'load_task_audit_grid' 
		] );
		$this->assertResponseCode ( 302 );
	}*/
	
	/*
    | Controller - Task_azure | Test Case No.- (10).
    | Test Description - This function will load Task_azure report
    | Assertion - assertResponseCode check the http response code
    */
	/*public function test_load_taskreport_grid() {
		$output = $this->request ( 'GET', [ 
				'Task_azure',
				'load_taskreport_grid' 
		] );
		$this->assertResponseCode ( 302 );
	}*/
	
	/*
    | Controller - Task_azure | Test Case No.- (11).
    | Test Description - This function will check deactive Task_azure
    | Assertion - assertResponseCode check the http response code
    */
	/*public function test_deactivate_tasks() {
		$output = $this->request ( 'GET', [ 
				'Task_azure',
				'deactivate_tasks' 
		] );
		$this->assertResponseCode ( 200 );
	}*/
	
	/*
    | Controller - Task_azure | Test Case No.- (11).
    | Test Description - This function will check runtask
    | Assertion - assertResponseCode check the http response code
    */
	public function test_runtask() {
		$output = $this->request ( 'GET', [ 
				'Task_azure',
				'runtask' 
		] );
		$this->assertResponseCode ( 200 );
	}
	
}	
?>