<?php
class Kunjunganspv extends Controller{
	
	public function index()
	{
		if(isset($_SESSION['username']))
		{
			$data['judul']='Data Kunjungan';
			$data['mcl'] = $this->model('Kunjungan_model')->getJumMcl();
			$data['mcldk'] = $this->model('Kunjungan_model')->getJumMclDk();
			$data['mcllk'] = $this->model('Kunjungan_model')->getJumMclLk();
			$data['mclnon'] = $this->model('Kunjungan_model')->getJumMclNon();
			$data['mclnondk'] = $this->model('Kunjungan_model')->getJumMclNonDk();
			$data['mclnonlk'] = $this->model('Kunjungan_model')->getJumMclNonLk();
			$data['plan'] = $this->model('Kunjungan_model')->getplanSpv();
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$this->view('templates/header',$data);
			$this->view('Kunjunganspv/index', $data);
			$this->view('templates/footer');

		}else{
			$this->view('errorpage/page404');
		}
	}

	public function addPlan()
	{
		if(isset($_SESSION['username']))
		{
			$data['judul']='Data Kunjungan';
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$data['outlet'] = $this->model('Mcl_model')->getAllMclPlanSpv();
			$data['plan'] = $this->model('Kunjungan_model')->getAllPlanSpv();
			$data['mr'] = $this->model('Mcl_model')->getKodeMR();
			$this->view('templates/header',$data);
			$this->view('Kunjunganspv/addPlan', $data);
			$this->view('templates/footer');

		}else{
			$this->view('errorpage/page404');
		}
	}

	public function tambahplan()
	{
		if(isset($_SESSION['username'])){

			$outlet = $this->model('Kunjungan_model')->cekDataMclPlanSpv($_POST);
			$outletcode = $outlet['outletid'];
			
			if($outletcode ==''){
				if($this->model('Kunjungan_model')->tambahDataPlanSpv($_POST) > 0){
					Flasher::setFlash('Succeeded', 'Add Data','success');
					header('Location:' . BASEURL . '/Kunjunganspv/addPlan');
				}else{
					Flasher::setFlash('Failed', 'Add Data','danger');
					header('Location:' . BASEURL . '/Kunjunganspv/addPlan');
				}
			}else{
				Flasher::setFlash('Failed', 'Data Sudah Ada','danger');
				header('Location:' . BASEURL . '/Kunjunganspv/addPlan');
				
			}


		}else{
			$this->view('errorpage/page404');
		}

	}

	public function deleteplan($id){
		if(isset($_SESSION['username'])){
			if($this->model('Kunjungan_model')->deleteDataPlanSpv($id) > 0){
				
				Flasher::setFlash('Failed', 'Delete Data','danger');
				header('Location:' . BASEURL . '/Kunjunganspv/addPlan');
			}else{
				Flasher::setFlash('Succeeded', 'Delete Data','success');
				header('Location:' . BASEURL . '/Kunjunganspv/addPlan');
			}

		}else{
			$this->view('errorpage/page404');
		}

	}

	public function sendPlan()
	{
		if(isset($_SESSION['username'])){
			$data['mr'] = $this->model('Mcl_model')->getKodeMR();
			//echo $data['mr']['kodeana'];
			if($this->model('Kunjungan_model')->sendPlanSpv($data) > 0){
				
				Flasher::setFlash('Failed', 'Filed Data Send','danger');
				header('Location:' . BASEURL . '/Kunjunganspv');
			}else{
				Flasher::setFlash('Succeeded', 'Success Data Send','success');
				header('Location:' . BASEURL . '/Kunjunganspv');
			}

		}else{

			$this->view('errorpage/page404');

		}
	}

	public function StatusPlan()
	{
		if(isset($_SESSION['username']))
		{
			$data['judul']='Data Status Plan';
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$data['tahun'] = $this->model('General_model')->getYear();
			$data['bulan'] = $this->model('General_model')->getMonth();
			$data['statplan'] = $this->model('Kunjungan_model')->getStatusPlan($_POST);
			$this->view('templates/header',$data);
			$this->view('Kunjungan/statusPlan', $data);
			$this->view('templates/footer');

		}else{
			$this->view('errorpage/page404');
		}
	}

	public function Detailstatus($id)
	{
		if(isset($_SESSION['username']))
		{
			$data['judul']='Data Status Plan';
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$data['detstatus'] = $this->model('Kunjungan_model')->getDetStatusPlan($id);
			$data['tanggal']= $id;
			$this->view('templates/header',$data);
			$this->view('Kunjungan/detailstatus', $data);
			$this->view('templates/footer');

		}else{
			$this->view('errorpage/page404');
		}
	}

	public function ReportPlan()
	{
		if(isset($_SESSION['username']))
		{
			$data['judul']='Data Visit Report';
			$data['month'] = $this->model('General_model')->getMonth();
            $data['year'] = $this->model('General_model')->getYear();
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$this->view('templates/header',$data);
			$this->view('Kunjunganspv/Reportplan', $data);
			$this->view('templates/footer');

		}else{
			$this->view('errorpage/page404');
		}
	}

	public function Appplanmr()
	{
		if(isset($_SESSION['username']))
		{
			if(!$_POST['mr']==""){
				$_SESSION['kodemr']= $_POST['mr'];

			}
			$data['judul']='Data Visit Report';
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$data['mr'] = $this->model('Otcref_model')->getAllMrSpv();
			$data['month'] = $this->model('General_model')->getMonth();
            $data['year'] = $this->model('General_model')->getYear();
			$data['plan'] = $this->model('Kunjungan_model')->getVisitAppSpv($_POST);
			$this->view('templates/header',$data);
			$this->view('Kunjunganspv/app_planmr', $data);
			$this->view('templates/footer');

		}else{
			$this->view('errorpage/page404');
		}
	}

	public function detailplanmr($week,$th,$bln,$kode)
	{
		if(isset($_SESSION['username']))
		{
			$data['judul']='Data Status Plan';
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$data['detstatus'] = $this->model('Kunjungan_model')->getDetPlan($week,$th,$bln,$kode);
			$data['detperiode'] = $this->model('Kunjungan_model')->getDetPlanPeriode($week,$th,$bln,$kode);
			$data['week']= $week;
			$data['month']= $bln;
			$data['year']=$th;
			$data['kode'] = $kode;
			$this->view('templates/header',$data);
			$this->view('Kunjunganspv/detailplanmr', $data);
			$this->view('templates/footer');

		}else{
			$this->view('errorpage/page404');
		}
	}


	public function appvisitmr()
	{
		if(isset($_SESSION['username'])){

			if($_POST['approve']==true){
			
				if($this->model('Kunjungan_model')->approveVisitMr($_POST) > 0){
					
					Flasher::setFlash('Failed', 'Data Approve','danger');
					header('Location:' . BASEURL . '/Kunjunganspv/Appplanmr');
				}else{
					
					Flasher::setFlash('Succeeded', 'Data Approve','success');
					header('Location:' . BASEURL . '/Kunjunganspv/Appplanmr');
				}
			}else{
					Flasher::setFlash('Failed', 'Please Ceklis Approve','danger');
					header('Location:' . BASEURL . '/Kunjunganspv/detailplanmr/'.$_POST['tanggal']."/".$_POST['kodemr']);
			}
			

		}else{

			$this->view('errorpage/page404');

		}
	}

	

	
	

}