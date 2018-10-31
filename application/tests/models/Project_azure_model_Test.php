<?php

	/* Test Cases Description start*/
	/*
	 ==============================================================================================
	  NOTE :- Test Case no.2,5,6,7,8,9,11,12,13,14,15,16,17,18,19,20,21 (testadd_Project) have some dependent test cases.																				   
	 ==============================================================================================
	*/
		
	/*	
	print_r("\n\n\t"."===========================================================================");
	print_r("\n\t"."DESCRIPTION : Project_model.php TEST CASE LIST");
	print_r("\n\t"."===========================================================================");

	print_r("\n\t"."01. testadd_Project");
	print_r("\n\t"."02. testgetProjectById depends @testadd_Project");
	print_r("\n\t"."03. testgetProjectByTenantId");
	print_r("\n\t"."04. testgetProjects");
	print_r("\n\t"."05. testUpdateProject depends @testadd_Project");
	print_r("\n\t"."06. testgetStatusById depends @testadd_Project");
	print_r("\n\t"."07. testupdateStatus depends @testadd_Project");
	print_r("\n\t"."08. testaddMapping depends @testadd_Project");
	print_r("\n\t"."09. testUpdateMapping depends @testadd_Project");
	print_r("\n\t"."10. testgetActions");
	print_r("\n\t"."11. testgetMappingById depends @testadd_Project");
	print_r("\n\t"."12. testCheckExistingUser");
	print_r("\n\t"."13. testdeactivate_projects depends @testadd_Project");
    print_r("\n\t"."14. testgetProjectByIdInArray depends @testadd_Project");
	print_r("\n\t"."15. testinsertProjectAudit depends @testadd_Project");
	print_r("\n\t"."16. testsaveprojectaudit depends @testadd_Project");
	print_r("\n\t"."17. testupdateStatusaudit depends @testadd_Project");
	print_r("\n\t"."18. testupdateProjectTaskStatusaudit depends @testadd_Project");
	print_r("\n\t"."19. testdeleteproject_azure depends @testadd_Project");
	print_r("\n\t"."20. testdeleteproject_user_mapping depends @testadd_Project");
	print_r("\n\t"."21. testdeleteproject_audit_azure depends @testadd_Project");
	print_r("\n\n\t"."TOTAL TEST CASES : 21");
	print_r("\n\t"."==========================================================================="."\n\n");	
	*/	
	/* Test Cases Description end*/
  	
class Project_azure_model_test extends TestCase {
	
	/*
	| Model - Project_model_azure
    | Description - Setting global variables to use it in testCreateProject() functions
    */
	
	protected $txtProjectName = 'Testcase for Project';
  	protected $areDescription = 'Test Description';
  	protected $ddlCloud = 'azure';
  	protected $txtEmailId =  'test@axonnetworks.com';
  	protected $txtSubscriptionId = 'Test Credentions Subscription Key';
  	protected $txtDirectoryId = 'Test credentials Directory key';
	protected $txtAccessKeyId = 'Test Credentions Access Key';
  	protected $txtSecretAccessKey = 'Test credentials secret key';
	protected $ddlProject = '22';
	protected $ddlUser = '2';
	protected $add_act = '1';
	protected $edit_act = '2';
	protected $delete_act = '3';
    protected $name = 'insert in to audit';
	protected $description = 'Test Description';
  	protected $cloud_type = 'azure';
  	protected $email =  'test@axonnetworks.com';
  	protected $subscription_id = 'Test Credentions Subscription Key';
  	protected $directory_id = 'Test credentials Directory key';
	protected $client_id = 'Test Credentions Access Key';
  	protected $client_secret = 'Test credentials secret key';
	
	
	/*
	| Model - Project_model_azure
    | Test Description - This function is to setup project model azure
    */

    public function setUp(){
        $this->resetInstance();
		$this->CI->load->library('session');
        $this->CI->load->model('Project_model_azure');
        $this->obj=$this->CI->Project_model_azure;
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
    | Model - Project_model_azure | Test Case No.- (01).
    | Test Description - This function is to get insert values in project table
    | Assertion - assertTrue will be true if all values will insert into project table properly
    */
    
    public function testadd_Project() {      	
		$_POST['txtProjectName']= $this->txtProjectName;
		$_POST['areDescription']= $this->areDescription;
		$_POST['ddlCloud']=$this->ddlCloud;
		$_POST['txtEmailId']=$this->txtEmailId;
		$_POST['txtSubscriptionId']=$this->txtSubscriptionId;
		$_POST['txtDirectoryId']=$this->txtDirectoryId;
		$_POST['txtAccessKeyId']=$this->txtAccessKeyId;
		$_POST['txtSecretAccessKey']=$this->txtSecretAccessKey;
		$insert_project_id = $this->obj->add_Project($_POST);
		
		if($insert_project_id >= 1){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
		return $insert_project_id;    
    }
	/**
    * @depends testadd_Project
    */
   /* | Model - Project_model_azure | Test Case No.- (02).
    | Test Description - This function is to get all projects based on project id
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testgetProjectById($id){				
        $results = $this->obj->getProjectById($id);
        if(!empty($results)){
			if($results->project_id == $id){				
				$this->assertTrue(true);
			}else{
				$this->fail();
			}
		}else{
			$this->fail();
		}
    }
    
   /* | Model - Project_model_azure | Test Case No.- (03).
    | Test Description - This function is to get all projects based on tenant id
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testgetProjectByTenantId(){
		$sql = "select tenant_id from tenant";
		$query = $this->db->query($sql);
		$tenant_res = $query->result_array();
		$tenant_id	= $tenant_res[0]['tenant_id'];	
        $results = $this->obj->getProjectByTenantId($tenant_id);
        if(!empty($results)){
			foreach($results as $result){
				if($result->tenant_id == 1){
						$this->assertTrue(true);
					}
				}
		}else{
			$this->fail();
		}
    }
	/* | Model - Project_model_azure | Test Case No.- (04).
    | Test Description - This function is to get all projects based on tenant id
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testgetProjects(){		
        $results = $this->obj->getProjects();
        if(!empty($results)){
			foreach($results as $result){
				if($result->tenant_id == 1)
					$this->assertTrue(true);
				}  
		}else{
			$this->fail();
		}
    }
	/**
    * @depends testadd_Project
    */   
    /*
    | Model - Project_model_azure | Test Case No.- (05).
    | Test Description - This function is to update values in project table
    | Assertion - assertTrue will be true if all values will insert into project table properly
    */
    
    public function testUpdateProject($id) {      	
		$_POST['txtProjectName']=$this->txtProjectName;
		$_POST['areDescription']=$this->areDescription;
		$_POST['ddlCloud']=$this->ddlCloud;
		$_POST['txtEmailId']=$this->txtEmailId;
		$_POST['txtSubscriptionId']=$this->txtSubscriptionId;
		$_POST['txtDirectoryId']=$this->txtDirectoryId;
		$_POST['txtAccessKeyId']=$this->txtAccessKeyId;
		$_POST['txtSecretAccessKey']="update secret access key";
		$_POST['hdnProjectId']=$id;
		$update_project_id = $this->obj->UpdateProject($_POST);
		if($update_project_id == 1){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
		   
    }
	/**
    * @depends testadd_Project
    */
   /* | Model - Project_model_azure | Test Case No.- (06).
    | Test Description - This function is to get all projects based on project id
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testgetStatusById($id){				
        $results = $this->obj->getStatusById($id);
        if(!empty($results)){
			if($results[0]->status == 1){
				$this->assertTrue(true);
			}else{
				$this->fail();
			}
        }
	}
	/**
    * @depends testadd_Project
    */
   /* | Model - Project_model_azure | Test Case No.- (07).
    | Test Description - This function is to get all projects based on project id
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testupdateStatus($id){
		$status='0';		
        $results = $this->obj->updateStatus($status,$id);
		if($results == 'SUCCESS'){
		  $this->assertTrue(true);	
		}else{
		  $this->fail();
		}
	}
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model_azure | Test Case No.- (08).
    | Test Description - This function is to add projects in to mapping table
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testaddMapping($id){
		$_POST['ddlProject']=$id;
		$_POST['UserId']='1';
		$_POST['add_act']=array('add_act' => 1);
		$_POST['edit_act']=array('edit_act' => 1);
		$_POST['delete_act']=array('delete_act' => 1);
		$_POST['ddlUser']=array('ddlUser' => 1);
		$insert_project_mappingid = $this->obj->addMapping($_POST);
		if($insert_project_mappingid == 1){
		  $this->assertTrue(true);
		}else{
		  $this->fail();
		}
	}
	
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model_azure | Test Case No.- (09).
    | Test Description - This function is to add projects in to mapping table
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testUpdateMapping($id){				
		$sql = "select proj_usermap_id from  project_user_mapping where project_id='$id'";
		$query = $this->db->query($sql);
		$proj_usermap_id = $query->result_array();
		
		$_POST['hdnMappingId']= $proj_usermap_id[0]['proj_usermap_id'];
		$_POST['add_act']=array('add_act' => 1);
		$_POST['edit_act']=array('edit_act' => 1);
		$_POST['delete_act']=array('delete_act' => 1);
		$_POST['ddlUser']=array('ddlUser' => 1);
		$insert_project_mappingid = $this->obj->UpdateMapping($_POST);		
		if($insert_project_mappingid == 1){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
		
	}
	
   /* | Model - Project_model_azure | Test Case No.- (10).
    | Test Description - This function is to get all Actions 
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testgetActions(){		
        $results = $this->obj->getActions();
		if(!empty($results)){
			foreach($results as $result){
			if($result->action_id == 2)
				$this->assertTrue(true);
			}
		}else{
			$this->fail();
		}
			
    }
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model_azure | Test Case No.- (11).
    | Test Description - This function is to get mapping id mapping table
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testgetMappingById($id){		
		$sql = "select proj_usermap_id from  project_user_mapping where project_id='$id'";
		$query = $this->db->query($sql);
		$proj_mappingid = $query->result_array();
		
		$proj_mapid=$proj_mappingid[0]['proj_usermap_id'];
		$res_mappingid = $this->obj->getMappingById($proj_mapid);
		if(!empty($res_mappingid)){
			if($res_mappingid->proj_usermap_id == $proj_mapid){
				$this->assertTrue(true);
			}else{
				$this->fail();
			}
	    }
	}
	
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model_azure | Test Case No.- (12).
    | Test Description - This function is to get mapping id mapping table
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testCheckExistingUser($id){
		$sql = "select proj_usermap_id,tenant_id,user_id,project_id from  project_user_mapping where project_id='$id'";
		$query = $this->db->query($sql);
		$proj_mappingid = $query->result_array();
		
		$proj_mapid=$proj_mappingid[0]['proj_usermap_id'];
		$tenant_id=$proj_mappingid[0]['tenant_id'];
		$user_id=$proj_mappingid[0]['user_id'];
		$project_id=$proj_mappingid[0]['project_id'];
		
		$_POST['ddlUser']=array($user_id=>$user_id );
		$_POST['tenant_id']=$tenant_id;
		$_POST['ddlProject']=$project_id;
		$totalrowfetched = $this->obj->CheckExistingUser($_POST);
		if($totalrowfetched == 0){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
	}
	
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model_azure | Test Case No.- (13).
    | Test Description - This function is to deactiavte the project
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testdeactivate_projects($id){
		$result = $this->obj->deactivate_projects('0',$id);
		if($result == "SUCCESS"){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
	}
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model_azure | Test Case No.- (14).
    | Test Description - This function is to get all data from the project_azure
	based on the project_id
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testgetProjectByIdInArray($id){
		$results = $this->obj->getProjectByIdInArray($id);
		if(!empty($results)){
			if($results[0]['project_id'] == $id){
				$this->assertTrue(true);
			}else{
				$this->fail();
			}
	    }
	}
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model_azure | Test Case No.- (15).
    | Test Description - This function is to insert data in to project_audit_azure
	based on the project_id
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testinsertProjectAudit($id){
		$_POST['project_id']=$id;
		$_POST['name']=$this->name;
		$_POST['description']=$this->description;
		$_POST['cloud_type']=$this->cloud_type;
		$_POST['email']=$this->email;
		$_POST['subscription_id']=$this->subscription_id;
		$_POST['directory_id']=$this->directory_id;
		$_POST['client_id']=$this->client_id;
		$_POST['client_secret']=$this->client_secret;
		$_POST['tenant_id']='1';
	    $results = $this->obj->insertProjectAudit($_POST);
	    if(!empty($results)){
			if($results == 1){
				$this->assertTrue(true);
			}else{
				$this->fail();
			}
	    }
	}
	
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model_azure | Test Case No.- (16).
    | Test Description - This function is to insert data in to project_audit_azure
	based on the project_id
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testsaveprojectaudit($id){
		$_POST['txtProjectName']=$this->txtProjectName;
		$_POST['areDescription']=$this->areDescription;
		$_POST['ddlCloud']=$this->ddlCloud;
		$_POST['txtEmailId']=$this->txtEmailId;
		$_POST['txtSubscriptionId']=$this->txtSubscriptionId;
		$_POST['txtDirectoryId']=$this->txtDirectoryId;
		$_POST['txtAccessKeyId']=$this->txtAccessKeyId;
		$_POST['txtSecretAccessKey']=$this->txtSecretAccessKey;
		$_POST['hdnProjectId']=$id;
	    $results = $this->obj->saveprojectaudit($_POST);
		if($results>=1){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
	} 
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model_azure | Test Case No.- (17).
    | Test Description - This function is to insert data in project_audit_azure
	based on the project_id
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testupdateStatusaudit($id){		
	    $results = $this->obj->updateStatusaudit('1',$id);
		if($results == "SUCCESS"){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
	}
    /**
    * @depends testadd_Project
    */
	/* | Model - Project_model_azure | Test Case No.- (18).
    | Test Description - This function is to insert data in project_audit_azure
	based on the project_id
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testupdateProjectTaskStatusaudit($id){		
	    $results = $this->obj->updateProjectTaskStatusaudit('1',$id,'1');
		if($results == "SUCCESS"){
			$this->assertTrue(true);
		}else{
			$this->fail();
		}
	}
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model_azure | Test Case No.- (21).
    | Test Description - This function is to delete the data inserted into project_ azure_audit table
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testdeleteproject_audit_azure($id){
		$sql = "delete from  project_audit_azure where project_id='$id'";
		$query = $this->db->query($sql);
		$row = $this->db->affected_rows();
		if($row == 3){
			$this->assertTrue(true);
		}else{
			 $this->fail();
		}
	}
	/**
    * @depends testadd_Project
    */
	/* | Model - Project_model_azure | Test Case No.- (20).
    | Test Description - This function is to delete the data inserted into project_user_mapping table
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testdeleteproject_user_mapping($id){
		$sql = "delete from  project_user_mapping where project_id='$id'";
		$query = $this->db->query($sql);
		$row = $this->db->affected_rows();
		if($row == 1){
			$this->assertTrue(true);
		}else{
			 $this->fail();
		}
	}
	
   /**
    * @depends testadd_Project
    */
	/* | Model - Project_model_azure | Test Case No.- (19).
    | Test Description - This function is to delete the data inserted into project_azure table
    | Assertion - assertTrue will be true if it return proper value from project table with status = 1
    */
	public function testdeleteproject_azure($id){
		$sql = "delete from  project_azure where project_id='$id'";
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
