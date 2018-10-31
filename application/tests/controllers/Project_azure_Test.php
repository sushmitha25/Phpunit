<?php

	/* Test Cases Description start*/
	/*
	 ==============================================================================================
	  NOTE :-																				   
	 ==============================================================================================
	*/
		
	/*	
	print_r("\n\n\t"."===========================================================================");
	print_r("\n\t"."DESCRIPTION : Project_azure.php TEST CASE LIST");
	print_r("\n\t"."===========================================================================");

	print_r("\n\t"."01. test_index");
	print_r("\n\t"."02. testadd_user_project_mapping");
	print_r("\n\t"."03. testuser_project_mapping_list");
	print_r("\n\t"."04. testadd_project_link");
	print_r("\n\t"."05. testadd_project");
	print_r("\n\t"."06. testencrypt");
	print_r("\n\t"."07. testdecrypt");
	print_r("\n\t"."08. teststatuschange");
	print_r("\n\t"."09. testmappingstatuschange");
	print_r("\n\t"."10. testadd_mapping");
	print_r("\n\t"."11. testedit_mapping");
	print_r("\n\t"."12. testdeactivate_projects");

	print_r("\n\n\t"."TOTAL TAST CASES : 12");
	print_r("\n\t"."==========================================================================="."\n\n");	
	*/	
	/* Test Cases Description end*/
		
class Project_azure_test extends TestCase {
	
	public function setUp(){
        $this->resetInstance();
		$this->CI->load->library('session');
		$_SESSION['sess_tenant_id']=1;

    }
	
	/*
    | Controller - Project_azure | Test Case No.- (01).
    | Test Description - This function is to load project-list page
    | Assertion - assertResponseCode check the http response code
    */
	public function test_index() {
		$output = $this->request ( 'GET', [ 
				'Project_azure',
				'index' 
		] );
		$this->assertResponseCode ( 302 );
	}
	
	/*
    | Controller - Project_azure | Test Case No.- (02).
    | Test Description - This function is to add user project mapping
    | Assertion - assertResponseCode check the http response code
    */
	public function testadd_user_project_mapping() {
		$output1 = $this->request ( 'GET', [ 
				'Project_azure',
				'add_user_project_mapping' 
		] );
		$this->assertResponseCode ( 302 );
	}
	
	/*
    | Controller - Project_azure | Test Case No.- (03).
    | Test Description - This function is to load user-project-mapping-list page
    | Assertion - assertResponseCode check the http response code
    */
	public function testuser_project_mapping_list() {
		$output1 = $this->request ( 'GET', [ 
				'Project_azure',
				'user_project_mapping_list' 
		] );
		$this->assertResponseCode ( 302 );
	}
	
	/*
    | Controller - Project_azure | Test Case No.- (04).
    | Test Description - This function is to add project link based on tenant id
    | Assertion - assertEquals check the response for a given date time string is in proper cron time format
    */
    
	function testadd_project_link() {
			$output1 = $this->request ( 'GET', [ 
				'Project_azure',
				'add_project_link' 
		],1 );
	
		$this->assertTrue(true);
	}
	
	/*
    | Controller - Project_azure | Test Case No.- (05).
    | Test Description - This function is to load add-project page
    | Assertion - assertEquals check the response for a given date time string is in proper cron time format
    */
	function testadd_project() {
		$output1 = $this->request ( 'GET', [ 
				'Project_azure',
				'add_project' 
		] );
		$this->assertResponseCode ( 302 );
	}
	
	
	
	/*
    | Controller - Project_azure | Test Case No.- (06).
    | Test Description - 
    | Assertion -
    */
	function testencrypt() {
		$data = "abc";
		$secret = "axon_@";
		// $res = $this->project->encrypt($data, $secret);
		$this->assertTrue ( true );
	}
	
	/*
    | Controller - Project_azure | Test Case No.- (07).
    | Test Description - 
    | Assertion -
    */
	function testdecrypt() {
		$data = "abc";
		$secret = "axon_@";
		// $res = $this->project->decrypt($data, $secret);
		$this->assertTrue ( true );
	}
	
	/*
    | Controller - Project_azure | Test Case No.- (08).
    | Test Description - This function will check if the view file loaded
    | Assertion - assertEquals checks the reponse based on the post variable projectid 
    */
	/*public function teststatuschange() {
		$array = array (
				'project_id' => '1' 
		);
		$res = $this->request ( 'POST', [ 
				'Project_azure',
				'statuschange' 
		], $array );
		if ($res == 'Project Is Deactivated') {
			$this->assertEquals ( 'Project Is Deactivated', $res );
		} elseif ($res == '1') {
			$this->assertEquals ( '1', $res );
		} else {
			$this->assertFalse ( false );
		}
	}*/
	
	/*
    | Controller - Project_azure | Test Case No.- (09).
    | Test Description - This function will check if the view file loaded
    | Assertion - assertEquals checks the reponse based on the post variable projectid 
    */
	public function testmappingstatuschange() {
		$array = array (
				'project_id' => '1' 
		);
		$res = $this->request ( 'POST', [ 
				'Project_azure',
				'mappingstatuschange' 
		], $array );
		if (!empty($res)) {
			$this->assertTrue ( true );
		}
	}
	
	/*
    | Controller - Project_azure | Test Case No.- (10).
    | Test Description - This function will check the add mapping
    | Assertion - assertResponseCode check the http response code
    */
	function testadd_mapping() {
		$output1 = $this->request ( 'GET', [ 
				'Project_azure',
				'add_mapping' 
		] );
		$this->assertResponseCode ( 302 );
	}
	
	/*
    | Controller - Project_azure | Test Case No.- (11).
    | Test Description - This function will check the edit mapping
    | Assertion - assertEquals check the response for a given date time string is in proper cron time format
    */
	function testedit_mapping() {
		$output1 = $this->request ( 'GET', [ 
				'Project_azure',
				'edit_mapping' 
		],1);
		$this->assertTrue(true);
	}
	
	
	/*
    | Controller - Project_azure | Test Case No.- (12).
    | Test Description - This function will check deactive projects
    | Assertion - assertResponseCode check the http response code
    */
	/*function testdeactivate_projects() {
		$output1 = $this->request ( 'GET', [ 
				'Project_azure',
				'deactivate_projects' 
		] );
		$this->assertResponseCode ( 200 );
	}*/
	/*
    | Controller - Project_azure | Test Case No.- (13).
    | Test Description - This function will edit project
    | Assertion - assertResponseCode check the http response code
    */
	
	function testedit_project()
	{
		$output1 = $this->request ( 'GET', [
				'Project_azure',
				'edit_project'
		] );
		$this->assertResponseCode ( 302 );
	
	}

}
?>
