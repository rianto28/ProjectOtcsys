<?php
class Mcl extends Controller{
	
	public function index()
	{
		if(isset($_SESSION['username'])){
			$data['judul']='Data MCL';
			$data['mcl']=$this->model('Mcl_model')->getAllMcl();
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$this->view('templates/header',$data);

			if($_SESSION['level']=="MR"){
				$this->view('Mcl/index', $data);
			}elseif($_SESSION['level']=="SPV"){
				$this->view('Mcl/indexspv', $data);
			}

			$this->view('templates/footer');
		}else{
			$this->view('errorpage/page404');
		}
	}



	public function addMcl(){

		if (isset($_SESSION['username'])) {
			$data['judul'] = "Add MCL";
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$data['outlet'] = $this->model('Outlet_model')->getAllOutlet();
			$data['noo'] = $this->model('Outlet_model')->getAllOutletNoo();
			$data['child'] = $this->model('Outlet_model')->getAllOutletChild();
			$data['kuota'] = $this->model('Outlet_model')->getAllOutletKuota();
			$data['mcl'] = $this->model('Mcl_model')->getAllMcl();
			$data['mr'] = $this->model('Mcl_model')->getKodeMR();
			$this->view('templates/header', $data);
			$this->view('Mcl/addmcl', $data);
			$this->view('templates/footer');

			echo $data['outlet']['outletname'];
		}else{
			$this->view('errorpage/page404');
		}

	}

	public function addMclSpv(){

		if (isset($_SESSION['username'])) {
			$data['judul'] = "Add MCL";
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$data['outlet'] = $this->model('Outlet_model')->getAllOutlet();
			$data['noo'] = $this->model('Outlet_model')->getAllOutletNoo();
			$data['child'] = $this->model('Outlet_model')->getAllOutletChild();
			$data['kuota'] = $this->model('Outlet_model')->getAllOutletKuota();
			$data['mcl'] = $this->model('Mcl_model')->getAllMclSpv();
			$data['mr'] = $this->model('Mcl_model')->getKodeMR();
			$this->view('templates/header', $data);
			$this->view('Mcl/addmclspv', $data);
			$this->view('templates/footer');
		}else{
			$this->view('errorpage/page404');
		}

	}


	public function tambah()
	{
		if(isset($_SESSION['username'])){
			$outlet = $this->model('Mcl_model')->cekDataMcl($_POST);
			$outletcode = $outlet['outletid'];
			
			if($outletcode ==''){
				if($this->model('MCL_model')->tambahDataMcl($_POST) > 0){
					Flasher::setFlash('Succeeded', 'Add Data','success');
					header('Location:' . BASEURL . '/mcl/addmcl');
				}else{
					Flasher::setFlash('Failed', 'Add Data','danger');
					header('Location:' . BASEURL . '/mcl/addmcl');
				}
			}else{
				Flasher::setFlash('Failed', 'Data Sudah Ada','danger');
				header('Location:' . BASEURL . '/mcl/addmcl');
				
			}


		}else{
			$this->view('errorpage/page404');
		}

	}


	public function approve(){

		if (isset($_SESSION['username'])) {
			if(!$_POST['mr']==""){
				$_SESSION['kodemr']= $_POST['mr'];

			}
			$data['judul'] = "Approve MCL";
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$data['mr'] = $this->model('Otcref_model')->getAllMr();
			$data['mcl'] = $this->model('MCL_model')->getMclApprove($_POST);
			$this->view('templates/header', $data);
			$this->view('Mcl/approve_f', $data);
			$this->view('templates/footer');
		}else{
			$this->view('errorpage/page404');
		}

	}

	public function approvespv(){

		if (isset($_SESSION['username'])) {
			if(!$_POST['mr']==""){
				$_SESSION['kodemr']= $_POST['mr'];

			}
			$data['judul'] = "Approve MCL";
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$data['mr'] = $this->model('Otcref_model')->getAllMrSpv();
			$data['mcl'] = $this->model('MCL_model')->getMclApprove($_POST);
			$this->view('templates/header', $data);
			$this->view('Mcl/approve_spv', $data);
			$this->view('templates/footer');
		}else{
			$this->view('errorpage/page404');
		}

	}

	
	public function setApprove($id){

		if($this->model('Mcl_model')->ApproveMcl($id) > 0){
			Flasher::setFlash('Failed', 'Approve MCL','danger');
			header('Location:' . BASEURL . '/mcl/approve');
			
		}else{
			Flasher::setFlash('Succeeded', 'Approve MCL','success');
			header('Location:' . BASEURL . '/mcl/approve');
		}


	}

	public function setApproveAll($id){

		if($this->model('Mcl_model')->ApproveMclAll($id) > 0){
			Flasher::setFlash('Failed', 'Approve MCL','danger');
			header('Location:' . BASEURL . '/mcl/approve');
		}else{
			Flasher::setFlash('Succeeded', 'Approve MCL','success');
			header('Location:' . BASEURL . '/mcl/approve');
			
		}


	}


	public function tambahmclspv()
	{
		// echo "add mcl spv";
		if(isset($_SESSION['username'])){
			$outlet = $this->model('Mcl_model')->cekDataMclSpv($_POST);
			$outletcode = $outlet['outletid'];
			
			if($outletcode ==''){
				if($this->model('MCL_model')->tambahDataMclSpv($_POST) > 0){
					Flasher::setFlash('Succeeded', 'Add Data','success');
					header('Location:' . BASEURL . '/mcl/addmclspv');
				}else{
					Flasher::setFlash('Failed', 'Add Data','danger');
					header('Location:' . BASEURL . '/mcl/addmclspv');
				}
			}else{
				Flasher::setFlash('Failed', 'Data Sudah Ada','danger');
				header('Location:' . BASEURL . '/mcl/addmclspv');
				
			}


		}else{
			$this->view('errorpage/page404');
		}

	}


}