<?php

class Home extends Controller
{

 public function index(){
 	$data['judul']='Login';
 	$this->view('auth/login', $data);
    
 }

 public function dashboard(){
 	if(isset($_SESSION['name'])){
	 	$data['judul']='Home';
	 	$data['isidash']=$this->model('User_model')->isiDashboard();
	 	$data['target']=$this->model('User_model')->getTarget();
	 	$data['stoday']=$this->model('User_model')->getSalesToday();
	 	$data['srank'] = $this->model('User_model')->getSalesRank();
	 	$data['usermenu'] = $this->model('User_model')->getMenu();
	 	// $data['username']=$data['user']['username'];
	 	$this->view('templates/header', $data);
	  	$this->view('home/dashboard', $data);
	  	$this->view('templates/footer');
	}else{
		$data['judul']='Login';
		$this->view('auth/login',$data);
	}
 }

public function dashboardf(){
 	if(isset($_SESSION['name'])){
	 	$data['judul']='Home';
	 	$data['isidash']=$this->model('User_model')->isiDashboard();
	 	$data['target']=$this->model('User_model')->getTarget();
	 	$data['stoday']=$this->model('User_model')->getSalesToday();
	 	$data['srank'] = $this->model('User_model')->getSalesRank();
	 	$data['usermenu'] = $this->model('User_model')->getMenu();
	 	// $data['username']=$data['user']['username'];
	 	$this->view('templates/header', $data);
	  	$this->view('home/dashboardf', $data);
	  	$this->view('templates/footer');
	}else{
		$data['judul']='Login';
		$this->view('auth/login',$data);
	}
 }


 public function auth(){
 	 $data['user']=$this->model('User_model')->checkLogin($_POST);
 	if(isset($data['user']['username'])){
 		if(password_verify($_POST['password'], $data['user']['password'])){
 			$_SESSION['userid'] = $data['user']['userid'];
	 		$_SESSION['username'] = $data['user']['username'];
	 		$_SESSION['name']=$data['user']['nama'];
	 		$_SESSION['branchcode']=$data['user']['branchcode'];
			$_SESSION['level'] = $data['user']['level'];
			$_SESSION['foto'] = $data['user']['foto'];
			switch ($_SESSION['level']) {
				case 'Admin':
					header('Location:' . BASEURL . '/home/dashboard');
					break;
				case 'Finance':
					header('Location:' . BASEURL . '/home/dashboardf');
					break;
				case 'SPV':
					header('Location:'. BASEURL .'/home/dashboard');
					break;
				default:
					header('Location:' . BASEURL . '/home/dashboard');
					break;
	 		}	

 		}else{
 			Flasher::setFlash('Failed', ' User Name dan Password Salah','danger');
			header('Location:' . BASEURL . '/home');
 		}
 	}else{
 		Flasher::setFlash('Failed', ' User Name dan Password Salah','danger');
		header('Location:' . BASEURL . '/home');
 	}

 }

 public function logout(){
 	unset($_SESSION['name']);
 	unset($_SESSION['branchcode']);
 	unset($_SESSION['level']);
 	unset($_SESSION['username']);
 	unset($_SESSION['foto']);
 	unset($_SESSION['userid']);
	unset($_SESSION['kodemr']);
	unset($_SESSION['tglvisit']);
 	$data['judul']='Login';
 	$this->view('auth/login', $data);
 }
	

}