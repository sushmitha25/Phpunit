<?php

	/* Test Cases Description start*/
	/*
	 ==============================================================================================
	  NOTE :-  Test Case no depends	on someother test cases																					   
	 ==============================================================================================
	*/
		
	/*	
	print_r("\n\n\t"."===========================================================================");
	print_r("\n\t"."DESCRIPTION : Tenant_model.php TEST CASE LIST");
	print_r("\n\t"."===========================================================================");

	print_r("\n\t"."01. test_addTenant");
	print_r("\n\t"."02. test_updateTenant @depends test_addTenant");
	print_r("\n\t"."03. test_getTenants @depends test_addTenant");
	print_r("\n\t"."04. test_getTenant @depends test_addTenant");
	print_r("\n\t"."05. test_getStatus @depends test_addTenant");
	print_r("\n\t"."06. test_updateStatus  @depends test_addTenant   @depends test_getStatus");
	print_r("\n\t"."07. test_getInactiveTenants  @depends test_addTenant ");
	print_r("\n\t"."08. test_getTenantByIdInArray  @depends test_addTenant ");
    print_r("\n\t"."09. testdeactivate_tenants @depends test_addTenant");
	print_r("\n\t"."10. test_insertTenantAudit @depends test_addTenant");
	print_r("\n\t"."11. testupdateStatusaudit @depends test_addTenant");
	print_r("\n\t"."12. testupdateStatusTenantProjectaudit @depends test_addTenant");
	print_r("\n\t"."13. testupdateStatusTenantTaskaudit @depends test_addTenant");
	print_r("\n\t"."14. testaddFirstTenantAudit  @depends test_addTenant");
	print_r("\n\t"."15. testupdateStatusTenantUseraudit  @depends test_addTenant,test_getStatus ");
	print_r("\n\t"."16. testupdateAzureStatusTenantProjectaudit  @depends test_addTenant ");
	print_r("\n\t"."17. testdeletetenant_audit @depends test_addTenant");
	print_r("\n\t"."18. testdeletetenant @depends test_addTenant");
	print_r("\n\t"."19. testupdateAzureStatusTenantTaskaudit @depends test_addTenant");
	
	print_r("\n\n\t"."TOTAL TEST CASES : 19");
	print_r("\n\t"."==========================================================================="."\n\n");	
	*/	
	/* Test Cases Description end*/
		
class Tenant_model_test extends TestCase{
	
	/*
	| Model - Tenant_Model
    | Description - Setting global variables to use it in test_addTenant() functions
    */
    
  	protected $txtEmailId = 'test123@gmail.com';
  	protected $txtTenantName = 'test1';
  	protected $txtPhoneNo = '08012346789';
  	protected $description = 'Test addtenant for phpunit Testcases';
  	protected $areAddress = 'Kalyani Magnum Infotech Park';
  	protected $txtCity = 'Bangalore';
  	protected $txtState = 'Karnataka';
  	protected $txtCountry = 'India';
    protected $email = 'test123@gmail.com';
  	protected $name = 'test1';
  	protected $phone_num = '08012346789';
	protected $mobile_num = '08012346789';
  	protected $address = 'Kalyani Magnum Infotech Park';
  	protected $city = 'Bangalore';
  	protected $state = 'Karnataka';
  	protected $country = 'India';
	protected $status ='1';
	
	/*
    | Model - Tenant_Model
    | Test Description - This function is to setup tenant_model
    */
	public function setUp(){
    	$this->resetInstance();
    	$this->CI->load->library('session');
    	$this->CI->load->model('Tenant_model');
    	$this->obj=$this->CI->Tenant_model;
		$this->db = $this->CI->load->database('default', TRUE);
    	$_SESSION['sess_user_id']=1;
    }
    
    
    /*
    | Model - Project_Model | Test Case No.- (01).
    | Test Description - This function is to get insert values in tenant table
    | Assertion - assertTrue will be true if all values will insert into tenant table properly
    */
    public function test_addTenant(){
    	    	
    	$_POST['txtEmailId']=$this->txtEmailId;
    	$_POST['txtTenantName']=$this->txtTenantName;
    	$_POST['txtPhoneNo']=$this->txtPhoneNo;
    	$_POST['areAddress']=$this->areAddress;
    	$_POST['txtCity']=$this->txtCity;
    	$_POST['txtState']=$this->txtState;
    	$_POST['txtCountry']=$this->txtCountry;
    	$insert_tenant_id = $this->obj->addTenant($_POST);
		if($insert_tenant_id >= 1){
		   $this->assertTrue(true);
		}else{
		   $this->fail();
		}		
		return $insert_tenant_id; 
	}
	 /**
     * @depends test_addTenant
     */
	/*
    | Model - Tenant_Model | Test Case No.- (02).
    | Test Description - This function is to update tenants in tenant table
    | Assertion - assertTrue will be true if it updates into tenant table properly
    */
    
	public function test_updateTenant($insert_tenant_id){
		
	    $_POST['txtTenantEmailId']=$this->txtEmailId;
    	$_POST['txtTenantName']='Update Test name';
    	$_POST['txtPhoneNo']=$this->txtPhoneNo;
    	$_POST['areAddress']=$this->areAddress;
    	$_POST['txtCity']=$this->txtCity;
    	$_POST['txtState']=$this->txtState;
    	$_POST['txtCountry']=$this->txtCountry;
    	$_POST['hdnTenantId']=$insert_tenant_id;
		$results = $this->obj->updateTenant($_POST);
		if($results == '1'){
		   $this->assertTrue(true);
		}else{
		   $this->fail();
		}
	}

	/*
    | Model - Tenant_Model | Test Case No.- (03).
    | Test Description - This function is to get all tenants from tenant table with status equal to 1
    | Assertion - assertTrue will be true if it get results properly from tenant table
    */
	public function test_getTenants(){
		
		$tenants=$this->obj->getTenants();
		if(!empty($tenants)){
		foreach($tenants as $tenant){
			if($tenant->status == '1'){
		  $this->assertEquals("1",$tenant->status);
		  }else{
		  $this->fail();
		     }
		   }
		}else{
		  $this->fail();
		}
	}
	 
    /**
     * @depends test_addTenant
     */
	
	/*
    | Model - Tenant_Model | Test Case No.- (04).
    | Test Description - This function is to get tenants from tenant table for a given tenant_id
    | Assertion - assertTrue will be true if it get results properly from tenant table
    */
   
    
	public function test_getTenant($insert_tenant_id){
		$results = $this->obj->getTenant($insert_tenant_id);

		if(!empty($results)){
			if($results->tenant_id == $insert_tenant_id){
			$this->assertTrue(true);
		}else{
			$this->fail();
		   }
		}else{
			$this->fail();
		   }
	}
	
    /**
     * @depends test_addTenant
     */
    
	/*
    | Model - Tenant_Model | Test Case No.- (05).
    | Test Description - This function is to get status from tenant table
    | Assertion - assertTrue will be true if it get results properly from tenant table
    */
    
	public function test_getStatus($insert_tenant_id){
		$results = $this->obj->getStatus($insert_tenant_id);
		$status=$results[0]->status;
		if(!empty($results)){
			if($results[0]->status == '1'){
			$this->assertTrue(true);
		}else{
			$this->fail();
		   }
		}else{
			$this->fail();
		   }
		return $status;	
	}
	
	/**
     * @depends test_getStatus
     * @depends test_addTenant
     */
     
	/*
    | Model - Tenant_Model | Test Case No.- (06).
    | Test Description - This function is to update status in tenant table
    | Assertion - assertTrue will be true if it update status properly into tenant table
    */
    
	public function test_updateStatus($St,$insert_tenant_id){		
		if($St == '0'){	
		$status = $this->obj->updateStatus(0,$insert_tenant_id);
		if($status == 'SUCCESS'){
		  $this->assertTrue(true);
		}else{
		  $this->fail();
		  }
		}
		if($St == '1'){
		$status = $this->obj->updateStatus(1,$insert_tenant_id);
		if($status == 'SUCCESS'){
		  $this->assertTrue(true);
		}else{
		  $this->fail();
		  }
		}
	}
	/**
     * @depends test_addTenant
     */
	/*
    | Model - Tenant_Model | Test Case No.- (07).
    | Test Description - This function is to get all inactive tenants from tenant table
    | Assertion - assertTrue will be true if it get results properly from tenant table
    */
	public function test_getInactiveTenants($insert_tenant_id){		
		$tenants_active=$this->obj->getInactiveTenants();
		if(!empty($tenants_active)){
		foreach($tenants_active as $tenant_active){
			if($tenant_active->tenant_id == $insert_tenant_id){
			  $this->assertEquals("0",$tenant_active->status);	
			}
		  }
		}else{
			$this->fail();
		}
		
	}
	 
    /**
     * @depends test_addTenant
     */
	
	/*
    | Model - Tenant_Model | Test Case No.- (08).
    | Test Description - This function is to get tenants from tenant table for a given tenant_id
    | Assertion - assertTrue will be true if it get results properly from tenant table
    */
   
    
	public function test_getTenantByIdInArray($insert_tenant_id){
		$results = $this->obj->getTenantByIdInArray($insert_tenant_id);
		if(!empty($results)){
			if($results[0]['tenant_id'] == $insert_tenant_id){
			$this->assertTrue(true);
		}else{
			$this->fail();
		   }
		}else{
			$this->fail();
		   }
	}
	
	/**
     * @depends test_addTenant
     */
	/*
    | Model - Project_Model | Test Case No.- (09).
    | Test Description - This function is to deactivate tenants
    | Assertion - assertTrue will be true if it return proper value
    */
	
	public function testdeactivate_tenants($insert_tenant_id){				
        $results = $this->obj->deactivate_tenants('0',$insert_tenant_id);
        if(!empty($results)){
			if($results == "SUCCESS"){
			$this->assertTrue(true);
		   }else{
			$this->fail();   
		   }
		}else{
			$this->fail();
		}	
    }
	/**
     * @depends test_addTenant
     */
	 /*
    | Model - Project_Model | Test Case No.- (10).
    | Test Description - This function is to get insert values in tenant audit table
    | Assertion - assertTrue will be true if all values will insert into tenant table properly
    */
    public function test_insertTenantAudit($insert_tenant_id){    	    	
    	$_POST[0]['name']=$this->name;
    	$_POST[0]['phone_num']=$this->phone_num;
    	$_POST[0]['mobile_num']=$this->mobile_num;
    	$_POST[0]['description']=$this->description;
    	$_POST[0]['address']=$this->address;
    	$_POST[0]['email']=$this->email;
    	$_POST[0]['city']=$this->city;
		$_POST[0]['state']=$this->state;
    	$_POST[0]['country']=$this->country;
		$_POST[0]['status']=$this->email;
    	$_POST[0]['tenant_id']=$insert_tenant_id;
    	$insertaudit_tenant_id = $this->obj->insertTenantAudit($_POST);
		if($insertaudit_tenant_id == 1){
		   $this->assertTrue(true);
		}else{
		   $this->fail();
		}		
		
	}
	/**
     * @depends test_addTenant
     */
	/*
    | Model - Project_Model | Test Case No.- (11).
    | Test Description - This function is to update status of audit
    | Assertion - assertTrue will be true if it return proper value
    */
	
	public function testupdateStatusaudit($insert_tenant_id){				
        $results = $this->obj->updateStatusaudit('1',$insert_tenant_id);
        if(!empty($results)){
			if($results == "SUCCESS"){
			$this->assertTrue(true);
		   }else{
			$this->fail();   
		   }
		}else{
			$this->fail();
		}	
    }
	
	/**
     * @depends test_addTenant
     */
	/*
    | Model - Project_Model | Test Case No.- (12).
    | Test Description - This function is to  insert in to project audit table
    | Assertion - assertTrue will be true if it return proper value
    */
	
	public function testupdateStatusTenantProjectaudit($insert_tenant_id){				
        $results = $this->obj->updateStatusTenantProjectaudit('1',$insert_tenant_id,'1');
        if(!empty($results)){
			if($results == "SUCCESS"){
			$this->assertTrue(true);
		   }else{
			$this->fail();   
		   }
		}else{
			$this->fail();
		}	
    }
    /**
     * @depends test_addTenant
     */
	/*
    | Model - Project_Model | Test Case No.- (13).
    | Test Description - This function is to  insert in to task audit table
    | Assertion - assertTrue will be true if it return proper value
    */
	
 /*	public function testupdateStatusTenantTaskaudit($insert_tenant_id){
				
        $results = $this->obj->updateStatusTenantTaskaudit('0',$insert_tenant_id,'1');
        if(!empty($results)){
			if($results == "SUCCESS"){
			$this->assertTrue(true);
		   }else{
			$this->fail();   
		   }
		}else{
			$this->fail();
		}	
    }*/
	  /**
     * @depends test_addTenant
     */
	/*
    | Model - Project_Model | Test Case No.- (14).
    | Test Description - This function is to  insert in to user audit table
    | Assertion - assertTrue will be true if it return proper value
    */
	
 	public function testaddFirstTenantAudit($insert_tenant_id){				
        $results = $this->obj->addFirstTenantAudit($insert_tenant_id);
        if(!empty($results)){
			if($results == "SUCCESS"){
			$this->assertTrue(true);
		   }else{
			$this->fail();   
		   }
		}else{
			$this->fail();
		}	
    }
	  /**
     * @depends test_addTenant
     */
	/*
    | Model - Project_Model | Test Case No.- (15).
    | Test Description - This function is to  insert in to task audit table
    | Assertion - assertTrue will be true if it return proper value
    */
	
 	public function testupdateStatusTenantUseraudit($insert_tenant_id){				
        $results = $this->obj->updateStatusTenantUseraudit('0',$insert_tenant_id,'1');
        if(!empty($results)){
			if($results == "SUCCESS"){
			$this->assertTrue(true);
		   }else{
			$this->fail();   
		   }
		}else{
			$this->fail();
		}	
    }
	 /**
     * @depends test_addTenant
     */
	/*
    | Model - Project_Model | Test Case No.- (16).
    | Test Description - This function is to  insert in to user audit table
    | Assertion - assertTrue will be true if it return proper value
    */
	
 	public function testupdateAzureStatusTenantProjectaudit($insert_tenant_id){		
        $results = $this->obj->updateAzureStatusTenantProjectaudit('0',$insert_tenant_id,1);
         if(!empty($results)){
			if($results == "SUCCESS"){
			$this->assertTrue(true);
		}else{
			$this->fail();   
			}
		}else{
			$this->fail();
		}	
    }
	
	
	/**
    *  @depends test_addTenant
    */
	/* | Model - Task_Model_azure | Test Case No.- (17).
    | Test Description - This function is to delete the data inserted into tenant table
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testdeletetenant_audit($insert_tenant_id){
		$sql = "delete from tenant_audit where tenant_id=$insert_tenant_id";
		$query = $this->db->query($sql);
		$row = $this->db->affected_rows();
		if($row == 3){
	      $this->assertTrue(true);
		}else{
		  $this->fail();
		}
	}
	/**
    *  @depends test_addTenant
    */
	/* | Model - Task_Model_azure | Test Case No.- (18).
    | Test Description - This function is to delete the data inserted into tenant table
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testdeletetenant($insert_tenant_id){
		$sql = "delete from tenant where tenant_id=$insert_tenant_id";
		$query = $this->db->query($sql);
		$row = $this->db->affected_rows();
		if($row == 1){
	      $this->assertTrue(true);
		}else{
		  $this->fail();
		}
	}
	/**
     * @depends test_addTenant
     */
	/*
    | Model - Project_Model | Test Case No.- (19).
    | Test Description - This function is to  insert in to task audit table
    | Assertion - assertTrue will be true if it return proper value
    */
	
/* 	public function testupdateAzureStatusTenantTaskaudit($insert_tenant_id){
				
        $results = $this->obj->updateAzureStatusTenantTaskaudit('0',$insert_tenant_id,'1');
        if(!empty($results)){
			if($results == "SUCCESS"){
			$this->assertTrue(true);
		   }else{
			$this->fail();   
		   }
		}else{
			$this->fail();
		}	
    }*/
	
}

?>
