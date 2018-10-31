<?php


	/* Test Cases Description start*/
	/*
	 ==============================================================================================
	  NOTE :-																				   
	 ==============================================================================================
	*/
		
	/*	
	print_r("\n\n\t"."===========================================================================");
	print_r("\n\t"."DESCRIPTION : Tenant.php TEST CASE LIST");
	print_r("\n\t"."===========================================================================");

	print_r("\n\t"."01. test_index");
	print_r("\n\t"."02. test_add_tenant");
	print_r("\n\t"."03. test_add_tenant_link");
	print_r("\n\t"."04. test_set_tenant_by_dropdown");
	print_r("\n\t"."05. test_add_tenant_data");
	print_r("\n\t"."06. test_edit_Tenant");
	print_r("\n\t"."07. test_edit_tenant_data");
	print_r("\n\t"."08. teststatuschange");
	print_r("\n\t"."09. test_deactivate_tenants");

	print_r("\n\n\t"."TOTAL TAST CASES : 09");
	print_r("\n\t"."==========================================================================="."\n\n");	
	*/	
	/* Test Cases Description end*/

class Tenant_test extends TestCase {
	
	public function setUp(){
        $this->resetInstance();
		$this->CI->load->library('session');
		$_SESSION['sess_tenant_id']=1;

    }
	
	/*
    | Controller - Tenant | Test Case No.- (01).
    | Test Description - This function will check if the view file loaded
    | Assertion - assertResponseCode check the http response code
    */
	public function test_index() {
		$output = $this->request ( 'GET', [ 
				'Tenant',
				'index' 
		] );
		$this->assertResponseCode ( 302 );
	}
	
	
	/*
    | Controller - Tenant | Test Case No.- (02).
    | Test Description - This function will check if the view file loaded
    | Assertion - assertResponseCode check the http response code
    */
	public function test_add_tenant() {
		$output = $this->request ( 'GET', [ 
				'Tenant',
				'add_tenant' 
		] );
		$this->assertResponseCode ( 302 );
	}
	
	/*
    | Controller - Tenant | Test Case No.- (03).
    | Test Description - This function will check if the view file loaded
    | Assertion - assertResponseCode check the http response code
    */
    
	/*public function test_add_tenant_link() {
		$output1 = $this->request ( 'GET', [ 
				'Tenant',
				'add_tenant_link' 
		],1 );
	
		$this->assertTrue(true);
	}*/
	
	/*
    | Controller - Tenant | Test Case No.- (04).
    | Test Description - This function will check dropdown list
    | Assertion - assertResponseCode check the http response code
    */
	public function test_set_tenant_by_dropdown() {
		$output = $this->request ( 'GET', [ 
				'Tenant',
				'set_tenant_by_dropdown' 
		] );
		$this->assertResponseCode ( 200 );
	}
	
	/*
    | Controller - Tenant | Test Case No.- (05).
    | Test Description - This function will check dropdown list
    | Assertion - assertResponseCode check the http response code
    */
	public function test_add_tenant_data() {
		$output = $this->request ( 'GET', [ 
				'Tenant',
				'add_tenant_data' 
		] );
		$this->assertResponseCode ( 200 );
	}
	
	/*
    | Controller - Tenant | Test Case No.- (06).
    | Test Description - This function will check update tenanat
    | Assertion - assertResponseCode check the http response code
    */
	public function test_edit_Tenant() {
		$output = $this->request ( 'GET', [ 
				'Tenant',
				'edit_Tenant' 
		],1 );
		$this->assertResponseCode ( 302 );
	}
	
	/*
    | Controller - Tenant | Test Case No.- (07).
    | Test Description - This function will check update tenanat
    | Assertion - assertResponseCode check the http response code
    */
	public function test_edit_tenant_data() {
		$output = $this->request ( 'GET', [ 
				'Tenant',
				'edit_tenant_data' 
		],1 );
		$this->assertResponseCode ( 200 );
	}
	
	/*
    | Controller - Tenant | Test Case No.- (08).
    | Test Description - This function will check update tenanat
    | Assertion - assertResponseCode check the http response code
    */
    
	/*public function teststatuschange() {
		$array = array (
				'tenant_id' => '1' 
		);
		$res = $this->request ( 'POST', [ 
				'Tenant',
				'statuschange' 
		], $array );
		if ($res == 'ACTIVESUCCESS') {
			$this->assertEquals ( 'ACTIVESUCCESS', $res );
		} else{
			$this->assertEquals ( 'INACTIVESUCCESS', $res );
		}
	}
	*/
	/*
    | Controller - Tenant | Test Case No.- (09).
    | Test Description - This function will check deactive tenanat
    | Assertion - assertResponseCode check the http response code
    */
	/*public function test_deactivate_tenants() {
		$output = $this->request ( 'GET', [ 
				'Tenant',
				'deactivate_tenants' 
		] );
		$this->assertResponseCode ( 200 );
	}*/
	
	
}
?>
