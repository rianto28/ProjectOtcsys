<?php

class Reporting extends Controller
{
    public function index()
    {
        $data['judul'] = "Weekly Plan";
        $data['week'] = $this->model('General_model')->getWeekMonth();
        $data['month'] = $this->model('General_model')->getMonth();
        $data['year'] = $this->model('General_model')->getYear();
        $data['mr'] = $this->model('Otcref_model')->getAllMrSpv();
		$data['real'] = $this->model('Kunreal_model')->getReportVisit($_POST);
		$data['wp'] = $this->model('Kunreal_model')->getWp($_POST);
		$data['wpc'] = $this->model('Kunreal_model')->getContentWp($_POST);
        $data['usermenu'] = $this->model('User_model')->getMenu();
        $this->view('templates/header',$data);
		$this->view('Reporting/index', $data);
		$this->view('templates/footer');
    }

    public function visitmr()
    {
        $data['judul'] = "Visit MR";
        $data['week'] = $this->model('General_model')->getWeekMonth();
        $data['month'] = $this->model('General_model')->getMonth();
        $data['year'] = $this->model('General_model')->getYear();
        $data['mr'] = $this->model('Otcref_model')->getAllMrSpv();
        $data['usermenu'] = $this->model('User_model')->getMenu();
        $data['wpc'] = $this->model('Kunreal_model')->getContentVisit($_POST);
        $this->view('templates/header',$data);
		$this->view('Reporting/visitmr', $data);
		$this->view('templates/footer');

        
    }
}