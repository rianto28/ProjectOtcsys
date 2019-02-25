<?php

class Product extends Controller{
	public function index()
	{
		$data['judul']='Data Product';
		$data['product']=$this->model('Product_model')->getAllProduct();
		$this->view('templates/header',$data);
		$this->view('product/index', $data);
		$this->view('templates/footer');
	}

	public function detail($id)
	{
		$data['judul']='Detail Product';
		$data['product']=$this->model('Product_model')->getProductById($id);
		$this->view('templates/header',$data);
		$this->view('product/detail', $data);
		$this->view('templates/footer');
	}

	public function tambah()
	{
		if($this->model('Product_model')->tambahDataProduct($_POST) > 0){
			Flasher::setFlash('Succeeded', 'Add Data','success');
			header('Location:' . BASEURL . '/product');
		}else{
			Flasher::setFlash('Failed', 'Add Data','danger');
			header('Location:' . BASEURL . '/product');
		}
	}

	public function delete($id)
	{
		if($this->model('Product_model')->deleteDataProduct($id) > 0){
			Flasher::setFlash('Succeeded', 'Delete Data','success');
			header('Location:' . BASEURL . '/product');
		}else{
			Flasher::setFlash('Failed', 'Delete Data','danger');
			header('Location:' . BASEURL . '/product');
		}
	}

}