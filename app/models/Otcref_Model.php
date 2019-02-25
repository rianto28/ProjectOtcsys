<?php

class Otcref_model{

	private $table = 'ana_msmr';
	private $db;

	public function __construct()
	{
		$this->db =  new Database;
	}

	public function getAllMr()
	{

		$this->db->query(" SELECT kodemr,namamr FROM ".$this->table." WHERE status=1 AND namamr not like 'vacant%' ORDER BY namamr");
		return $this->db->resultset();

	}

	public function getMr($kode)
	{
		
		$this->db->query(" SELECT kodemr,namamr FROM ".$this->table." WHERE status=1 AND kodemr = :kode");
		$this->db->bind('kode', $kode);
		return $this->db->single();

	}

	public function getAllMrSpv(){

		$userid = $_SESSION['userid'];
		$this->db->query(" SELECT m.kodemr,namamr FROM ana_msmr m,tbl_mappspv s,ana_usermapp u WHERE m.kodemr=s.kodemr AND s.kodespv=u.kodeana AND u.userid = :userid AND m.status=1 ORDER BY namamr");
		$this->db->bind('userid', $userid);
		return $this->db->resultset();

	}

}