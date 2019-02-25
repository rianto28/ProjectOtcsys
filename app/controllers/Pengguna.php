<?php

class Pengguna extends Controller{
	
	public function index()
	{
		if(isset($_SESSION['username'])){
			$data['judul']='Data User';
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$data['datauser']=$this->model('User_model')->getAllUser();
			$this->view('templates/header',$data);
			$this->view('pengguna/index', $data);
			$this->view('templates/footer');
		}else{
			$this->view('errorpage/page404');
		}
	}

	public function addpengguna(){
		if(isset($_SESSION['username'])){
			$data['judul']='Add User';
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$data['branch'] = $this->model('User_model')->getAllBranch();
			$this->view('templates/header',$data);
			// echo "Halaman Data User";
			$this->view('pengguna/addpengguna', $data);
			$this->view('templates/footer');
		}else{
			$this->view('errorpage/page404');
		}
	}

	public function tambah()
	{
		if(isset($_SESSION['username'])){

			if($this->model('User_model')->tambahDataPengguna($_POST) > 0){
				Flasher::setFlash('Succeeded', 'Add Data','success');
				header('Location:' . BASEURL . '/pengguna');
			}else{
				Flasher::setFlash('Failed', 'Add Data','danger');
				header('Location:' . BASEURL . '/pengguna');
			}
		}else{
			$this->view('errorpage/page404');
		}
	}

	public function delete($id){
		if($this->model('User_model')->deleteDataUser($id) > 0){
			Flasher::setFlash('Succeeded', 'Delete Data','success');
			header('Location:' . BASEURL . '/pengguna');
		}else{
			Flasher::setFlash('Failed', 'Delete Data','danger');
			header('Location:' . BASEURL . '/pengguna');
		}

	}

}