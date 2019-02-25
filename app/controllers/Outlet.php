<?php
class Outlet extends Controller{
	
	public function index()
	{
		if(isset($_SESSION['username'])){
			$data['judul']='Data Outlet';
			$data['outlet']=$this->model('Outlet_model')->getAllOutlet();
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$this->view('templates/header',$data);
			$this->view('outlet/index', $data);
			$this->view('templates/footer');
		}else{
			$this->view('errorpage/page404');
		}
	}

	public function outall()
	{
		if(isset($_SESSION['username'])){
			$data['judul']='Data Outlet';
			$data['outlet']=$this->model('Outlet_model')->getAllOutlet();
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$this->view('templates/header',$data);
			$this->view('outlet/index1', $data);
			$this->view('templates/footer');
		}else{
			$this->view('errorpage/page404');
		}
	}

	public function outallspv()
	{
		if(isset($_SESSION['username'])){
			$data['judul']='Data Outlet';
			$data['branch'] = $this->model('Branch_model')->getBranchSpv();
			$data['outlet']=$this->model('Outlet_model')->getAllOutletSpv($_POST);
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$this->view('templates/header',$data);
			$this->view('outlet/indexspv', $data);
			$this->view('templates/footer');
		}else{
			$this->view('errorpage/page404');
		}
	}

	public function addnoo(){

		if(isset($_SESSION['username'])){
			$data['judul']='DATA NOO';
			$data['segment'] = $this->model('Outlet_model')->getAllSegment();
			$data['noo'] = $this->model('Outlet_model')->getAllOutletNoo();
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$this->view('templates/header',$data);
			$this->view('outlet/addnoo', $data);
			$this->view('templates/footer');
		}else{
			$this->view('errorpage/page404');
		}
	}

	public function tambahnoo()
	{
		if(isset($_SESSION['username'])){

			if($this->model('Outlet_model')->tambahDataNoo($_POST) > 0){
				Flasher::setFlash('Succeeded', 'Add Data','success');
				header('Location:' . BASEURL . '/outlet/addnoo');
			}else{
				Flasher::setFlash('Failed', 'Add Data','danger');
				header('Location:' . BASEURL . '/outlet/addnoo');
			}
		}else{
			$this->view('errorpage/page404');
		}
	}

	public function addchild(){

		if(isset($_SESSION['username'])){
			$data['judul']='DATA OUTLET CHILD';
			$data['outlet'] = $this->model('Outlet_model')->getAllOutlet();
			$data['segment'] = $this->model('Outlet_model')->getAllSegment();
			$data['child'] = $this->model('Outlet_model')->getAllOutletChild();
			$data['usermenu'] = $this->model('User_model')->getMenu();
			$this->view('templates/header',$data);
			$this->view('outlet/addchild', $data);
			$this->view('templates/footer');
		}else{
			$this->view('errorpage/page404');
		}
	}

	public function tambahchild()
	{
		if(isset($_SESSION['username'])){

			if($this->model('Outlet_model')->tambahDataChild($_POST) > 0){
				Flasher::setFlash('Succeeded', 'Add Data','success');
				header('Location:' . BASEURL . '/outlet/addchild');
			}else{
				Flasher::setFlash('Failed', 'Add Data','danger');
				header('Location:' . BASEURL . '/outlet/addchild');
			}
		}else{
			$this->view('errorpage/page404');
		}
	}

	public function deletechild($id){
		if(isset($_SESSION['username'])){

			if($this->model('Outlet_model')->deleteDataChild($id) > 0){
				
				Flasher::setFlash('Failed', 'Delete Data','danger');
				header('Location:' . BASEURL . '/outlet/addchild');
			}else{
				Flasher::setFlash('Succeeded', 'Delete Data','success');
				header('Location:' . BASEURL . '/outlet/addchild');
			}
		}else{
			$this->view('errorpage/page404');
		}

	}

	public function deletenoo($id){
		if(isset($_SESSION['username'])){

			if($this->model('Outlet_model')->deleteDataNoo($id) > 0){
				Flasher::setFlash('Failed', 'Delete Data','danger');
				header('Location:' . BASEURL . '/outlet/addnoo');
			
			}else{
				
				Flasher::setFlash('Succeeded', 'Delete Data','success');
				header('Location:' . BASEURL . '/outlet/addnoo');
			}
		}else{
			$this->view('errorpage/page404');
		}

	}

}