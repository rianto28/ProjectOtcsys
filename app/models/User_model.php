<?php

class User_model{
	private $table = 'tbl_user';
	private $db;
	// private $nama='Heri Rianto';
	public function __construct()
	{
		$this->db =  new Database;
	}

	public function getAllUser()
	{
		$this->db->query(' SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getAllBranch()
	{
		$this->db->query(" SELECT * FROM ana_branch_nli WHERE kodecabang not in('55')");
		return $this->db->resultSet();
	}

	public function checkLogin($data){
		$query = "SELECT * FROM " . $this->table . " WHERE username = :username";
		// var_dump($query);
		$this->db->query($query);
		$this->db->bind('username',$data['username']);
		// $this->db->bind('password',$data['password']);
		return $this->db->single();
 
	}

	public function tambahDataPengguna($data)
	{
		$status = 1 ;
		$password = password_hash($data['password'], PASSWORD_DEFAULT);
		$query=" INSERT INTO tbl_user VALUES
				('',:nama,:username,:password,:levelaccess,:branchcode,:foto,:status)";
		$this->db->query($query);
		$this->db->bind('nama', $data['nama']);
		$this->db->bind('username', $data['username']);
		$this->db->bind('password', $password);
		$this->db->bind('levelaccess', $data['levelaccess']);
		$this->db->bind('branchcode', $data['branch']);
		$this->db->bind('foto', $data['fotoname']);
		$this->db->bind('status', $status);

		$this->db->execute();

		return $this->db->rowCount();
	}


	public function isiDashboard(){
		$bulan = date('m');
		$tahun = date('Y');
		$kodecabang = $_SESSION['branchcode'];
		$query = "SELECT sum(v_nli) as totsales FROM ana_salesday_nli WHERE year(tanggal) = :tahun AND month(tanggal) = :bulan AND kodecabang = :kodecabang" ;
		$this->db->query($query);
		$this->db->bind('tahun', $tahun);
		$this->db->bind('bulan', $bulan);
		$this->db->bind('kodecabang', $kodecabang);
		return $this->db->single();
	}
	public function getTarget(){
		$bulan = date('m');
		$tahun = date('Y');
		$kodecabang = $_SESSION['branchcode'];
		$query = "SELECT sum(value) as target FROM ana_target_nli WHERE tahun = :tahun AND bulan = :bulan AND kodecabang = :kodecabang";
		$this->db->query($query);
		$this->db->bind('tahun', $tahun);
		$this->db->bind('bulan', $bulan);
		$this->db->bind('kodecabang', $kodecabang);
		return $this->db->single();

	}

	public function getSalesToday(){
		$now = strtotime(date("Y-m-d"));
		$tanggal = date('Y-m-d', strtotime('-1 day', $now));
		$kodecabang = $_SESSION['branchcode'];
		$query = "SELECT sum(v_nli) as totsales FROM ana_salesday_nli WHERE tanggal = :tanggal AND kodecabang = :kodecabang" ;
		$this->db->query($query);
		$this->db->bind('tanggal', $tanggal);
		$this->db->bind('kodecabang', $kodecabang);
		return $this->db->single();
	}

	public function getSalesRank(){
		$bulan = date('m');
		$tahun = date('Y');
		$query = "SELECT namamr,namacabang,sales FROM ana_salesrank WHERE tahun = :tahun AND bulan = :bulan ORDER BY sales DESC LIMIT 0,5" ;
		$this->db->query($query);
		$this->db->bind('tahun', $tahun);
		$this->db->bind('bulan', $bulan);
		return $this->db->resultSet();
	}

	public function getMenu(){
		switch ($_SESSION['level']) {
			case 'Admin':
				$menu = "menuadmin";
				break;
			case 'Finance':
				$menu = "menufinance";
				break;
			case 'SPV':
				$menu = "menuspv";
				break;
			
			default:
				$menu = "menu";
				break;
		}

		return $menu;

	}

	public function deleteDataUser($id)
	{
		$query = "DELETE FROM ". $this->table ." WHERE userid = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();
	}

}