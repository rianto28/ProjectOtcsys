<?php
class Kunreal extends Controller{

    public function index()
	{
		if(isset($_SESSION['username']))
		{
			$data['judul']='Input Realisasi';
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$data['mr'] = $this->model('Otcref_model')->getAllMrSpv();
			$data['week'] = $this->model('General_model')->getWeekMonth();
			$data['month'] = $this->model('General_model')->getMonth();
            $data['year'] = $this->model('General_model')->getYear();
			$data['tvisit'] = $this->model('Kunreal_model')->getTanggalVisit($_POST);
			$this->view('templates/header',$data);
			$this->view('Kunreal/index', $data);
			$this->view('templates/footer');

		}else{
			$this->view('errorpage/page404');
		}
	}

    public function addreal()
	{
		if(isset($_SESSION['username']))
		{
			$data['judul']='Input Visit';
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$data['plan'] = $this->model('Kunjungan_model')->getAllPlan();
			$this->view('templates/header',$data);
			$this->view('Kunreal/addReal', $data);
			$this->view('templates/footer');

		}else{
			$this->view('errorpage/page404');
		}
    }
    

    public function tampilkun($kode,$tanggal)
	{
		if(isset($_SESSION['username']))
		{
            
			$data['judul']='Input Visit';
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$data['mr'] = $this->model('Otcref_Model')->getMr($kode);
			$data['real'] = $this->model('Kunreal_model')->getAllKunreal($kode,$tanggal);
			$data['tanggal'] = $tanggal;
			$this->view('templates/header',$data);
            $this->view('Kunreal/tampilkun', $data);
			$this->view('templates/footer');

		}else{
			$this->view('errorpage/page404');
		}
    }
    

	public function confreal()
	{
		$this->model('Kunreal_model')->updetKunReal($_POST);

		if($this->model('Kunreal_model')->updetKunReal($_POST) > 0){
			Flasher::setFlash('Failed', 'Update Visit','danger');
			header('Location:' . BASEURL . '/Kunreal');
		}else{
			Flasher::setFlash('Succeeded', 'Update Visit','success');
			header('Location:' . BASEURL . '/Kunreal');
			
		}


	}

	public function reportkun()
	{
		if(isset($_SESSION['username']))
		{
			if($_POST['report']=="month"){
				$data['tpclassmonth']="active";
				$data['tpclassday']="";
				$data['tpclassout']="";
			}elseif($_POST['report']=="day"){
				$data['tpclassmonth']="";
				$data['tpclassday']="active";
				$data['tpclassout']="";
			}else{
				$data['tpclassmonth']="";
				$data['tpclassday']="";
				$data['tpclassout']="active";
			}
			$data['judul']='Data Realisasi';
			$data['week'] = $this->model('General_model')->getWeekMonth();
            $data['month'] = $this->model('General_model')->getMonth();
            $data['year'] = $this->model('General_model')->getYear();
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$data['real'] = $this->model('Kunreal_model')->getReportVisit($_POST);
			$data['wp'] = $this->model('Kunreal_model')->getWp($_POST);
			$data['wpc'] = $this->model('Kunreal_model')->getContentWp($_POST);
			$this->view('templates/header',$data);
			$this->view('Kunreal/reportkun', $data);
			$this->view('templates/footer');

		}else{
			$this->view('errorpage/page404');
		}
	}

	public function reportkunspv()
	{
		if(isset($_SESSION['username']))
		{
			if($_POST['report']=="month"){
				$data['tpclassmonth']="active";
				$data['tpclassday']="";
				$data['tpclassout']="";
			}elseif($_POST['report']=="day"){
				$data['tpclassmonth']="";
				$data['tpclassday']="active";
				$data['tpclassout']="";
			}else{
				$data['tpclassmonth']="";
				$data['tpclassday']="";
				$data['tpclassout']="active";
			}
			$data['judul']='Data Plan & Realisasi';
			$data['week'] = $this->model('General_model')->getWeekMonth();
            $data['month'] = $this->model('General_model')->getMonth();
            $data['year'] = $this->model('General_model')->getYear();
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$data['mr'] = $this->model('Otcref_model')->getAllMrSpv();
			$data['real'] = $this->model('Kunreal_model')->getReportVisit($_POST);
			$data['wp'] = $this->model('Kunreal_model')->getWp($_POST);
			$data['wpc'] = $this->model('Kunreal_model')->getContentWp($_POST);
			$this->view('templates/header',$data);
			// if($_POST['report']=="month"){
				$this->view('Kunreal/reportkunspv', $data);
			// }elseif($_POST['report']=="day"){
				// $this->view('Kunreal/reportrealmr', $data);
			// }
			$this->view('templates/footer');

		}else{
			$this->view('errorpage/page404');
		}
	}

	public function detailVisitmr($tanggal,$kode)
	{
		if(isset($_SESSION['username']))
		{
			$data['judul']='Data Status Plan';
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$data['detstatus'] = $this->model('Kunjungan_model')->getDetPlan($tanggal,$kode);
			$data['tanggal']= $tanggal;
			$data['kode'] = $kode;
			$this->view('templates/header',$data);
			$this->view('Kunreal/detailvisitmr', $data);
			$this->view('templates/footer');

		}else{
			$this->view('errorpage/page404');
		}
	}
	


}