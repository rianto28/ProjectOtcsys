<?php
class Kunjungan extends Controller{
	
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
			$data['plan'] = $this->model('Kunjungan_model')->getplan();
			$data['visit'] = $this->model('Kunjungan_model')->getRealVisit();
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$this->view('templates/header',$data);
			$this->view('Kunjungan/index', $data);
			$this->view('templates/footer');

		}else{
			$this->view('errorpage/page404');
		}
	}

	public function addPeriodPlan()
	{
		if(isset($_SESSION['username']))
		{
			$data['judul']='Data Periode Plan';
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$data['mr'] = $this->model('Mcl_model')->getKodeMR();
			$data['pweekly'] = $this->model('General_Model')->getWeekPeriod();
			$this->view('templates/header',$data);
			$this->view('Kunjungan/addPeriodPlan', $data);
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
			$data['outlet'] = $this->model('Mcl_model')->getAllMclPlan();
			$data['plan'] = $this->model('Kunjungan_model')->getAllPlan();
			$data['tgl'] = $this->model('Kunjungan_model')->getTanggalDw();
			$data['mr'] = $this->model('Mcl_model')->getKodeMR();
			$data['pweekly'] = $this->model('General_Model')->getWeekPeriod();
			$this->view('templates/header',$data);
			$this->view('Kunjungan/addPlan', $data);
			$this->view('templates/footer');

		}else{
			$this->view('errorpage/page404');
		}
	}

	public function tambahplan()
	{
		if(isset($_SESSION['username'])){
			
				$outlet = $this->model('Kunjungan_model')->cekDataMclPlan($_POST);
				$outletcode = $outlet['outletid'];
				
				if($outletcode ==''){
					if($this->model('Kunjungan_model')->tambahDataPlan($_POST) > 0){
						Flasher::setFlash('Succeeded', 'Add Data','success');
						header('Location:' . BASEURL . '/Kunjungan/addPlan');
					}else{
						Flasher::setFlash('Failed', 'Add Data','danger');
						header('Location:' . BASEURL . '/Kunjungan/addPlan');
					}
				}else{
					Flasher::setFlash('Failed', 'Data Sudah Ada','danger');
					header('Location:' . BASEURL . '/Kunjungan/addPlan');
					
				}
			


		}else{
			$this->view('errorpage/page404');
		}

	}

	public function deleteplan($id){
		if(isset($_SESSION['username'])){
			if($this->model('Kunjungan_model')->deleteDataPlan($id) > 0){
				
				Flasher::setFlash('Failed', 'Delete Data','danger');
				header('Location:' . BASEURL . '/Kunjungan/addPlan');
			}else{
				Flasher::setFlash('Succeeded', 'Delete Data','success');
				header('Location:' . BASEURL . '/Kunjungan/addPlan');
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
			if($this->model('Kunjungan_model')->sendPlan($data) > 0){
				Flasher::setFlash('Succeeded', 'Success Data Send','success');
				header('Location:' . BASEURL . '/Kunjungan/addPlan');
				
			}else{
				
				Flasher::setFlash('Failed', 'Filed Data Send','danger');
				header('Location:' . BASEURL . '/Kunjungan/addPlan');
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

	public function Detailstatus($id,$status)
	{
		if(isset($_SESSION['username']))
		{
			$data['judul']='Data Status Plan';
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$data['detstatus'] = $this->model('Kunjungan_model')->getDetStatusPlan($id,$status);
			$data['tanggal']= $id;
			$data['status']=$status;
			$data['user'] = $_SESSION['userid'];
			$this->view('templates/header',$data);
			$this->view('Kunjungan/detailstatus', $data);
			$this->view('templates/footer');

		}else{
			$this->view('errorpage/page404');
		}
	}

	public function cetakForm($tanggal)
	{
		if(isset($_SESSION['username']))
		{
			$data['judul']='Cetak Form Kunjungan';
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$data['detstatus'] = $this->model('Kunjungan_model')->getDataCetak($tanggal);
			$data['tanggal']= $tanggal;
			$data['status']=$status;
			$this->view('templates/header',$data);
			$this->view('Kunjungan/cetakform', $data);
			$this->view('templates/footer');

		}else{
			$this->view('errorpage/page404');
		}
	}


	public function verifikasiVisitMr()
	{
		if(isset($_SESSION['username']))
		{
			if(!$_POST['mr']==""){
				$_SESSION['kodemr']= $_POST['mr'];

			}
			$data['month'] = $this->model('General_model')->getMonth();
            $data['year'] = $this->model('General_model')->getYear();
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$data['mr'] = $this->model('Otcref_model')->getAllMr();
			$data['plan'] = $this->model('Kunjungan_model')->getVerifikasiMr($_POST);
			$data['judul']='Verifikasi Visit';
			$this->view('templates/header',$data);
			$this->view('Kunjungan/verifikasivisitmr', $data);
			$this->view('templates/footer');

		}else{
			$this->view('errorpage/page404');
		}
	}
	
	public function updateverifikasimr()
	{
		if(isset($_SESSION['username'])){

			// var_dump ($_POST['verifikasi']);
			// $this->model('Kunjungan_model')->updateVerifikasiMr($_POST);
			if($this->model('Kunjungan_model')->updateVerifikasiMr($_POST) > 0){
				
				Flasher::setFlash('Succeeded', 'Success Data Verification','success');
				header('Location:' . BASEURL . '/Kunjungan/verifikasivisitmr');
			}else{
				
				Flasher::setFlash('Failed', 'Filed Data Verification','danger');
				header('Location:' . BASEURL . '/Kunjungan/verifikasivisitmr');
			}
			

		}else{

			$this->view('errorpage/page404');

		}
	}
	

}