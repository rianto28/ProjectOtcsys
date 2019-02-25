<?php

class Mcl_model{

	private $table = 'tbl_mcl';
	private $db;

	public function __construct()
	{
		$this->db =  new Database;
	}

	public function getAllMcl()
	{
		$userid = $_SESSION['userid'];
		$this->db->query(' SELECT o.outletid,outletcode, outletname,address,t.status FROM tbl_mcl t, ana_usermapp m,ana_msoutlet_nli o WHERE t.outletid=o.outletid AND t.kodemr=m.kodeana AND userid = :userid ORDER BY idmcl DESC');
		$this->db->bind('userid', $userid);
		return $this->db->resultSet();

	}

	public function getAllMclSpv()
	{
		$userid = $_SESSION['userid'];
		$this->db->query(" SELECT outletcode, namacabang, outletname, address, t.status FROM tbl_mclspv t, ana_usermapp m,ana_msoutlet_nli o, ana_branch_nli b WHERE t.outletid=o.outletid AND t.kodespv=m.kodeana AND o.branchcode=b.kodecabang AND userid = :userid ORDER BY idmcl DESC");
		$this->db->bind('userid', $userid);
		return $this->db->resultSet();
	}

	

	public function getOutletById($id)
	{
		$this->db->query(' SELECT * FROM ' . $this->table . ' WHERE productid=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function getKodeMr(){
		$id = $_SESSION['userid'];
		$this->db->query(' SELECT kodeana FROM ana_usermapp WHERE userid = :id');
		$this->db->bind('id',$id);
		return $this->db->single();

	}

	public function cekDataMcl($data){

		$this->db->query(' SELECT * FROM '.$this->table.' WHERE outletid = :id');
		$this->db->bind('id',$data['outlet']);
		return $this->db->single();
	}

	public function cekDataMclSpv($data){

		$this->db->query(" SELECT * FROM tbl_mclspv WHERE outletid = :id");
		$this->db->bind('id',$data['outlet']);
		return $this->db->single();
	}

	

	public function tambahDataMcl($data)
	{
		$status = 0 ;
		$kodecabang = $_SESSION['branchcode'];
		$query=" INSERT INTO tbl_mcl VALUES
				('',:branchcode,:kodemr,:outletid,:ket,:status,:grup)";
		$this->db->query($query);
		$this->db->bind('branchcode', $kodecabang);
		$this->db->bind('kodemr', strtoupper($data['kodemr']));
		$this->db->bind('outletid', strtoupper($data['outlet']));
		$this->db->bind('ket', strtoupper($data['ket']));
		$this->db->bind('status', $status);
		$this->db->bind('grup', $data['grupoutlet']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getMclApprove($data)
	{
		
		$kodemr = $_SESSION['kodemr'];
		$this->db->query(' SELECT namamr,outletcode, outletname,idmcl,t.status as status,t.kodemr as kodemr FROM tbl_mcl t, ana_msoutlet_nli o,ana_msmr m WHERE t.outletid=o.outletid AND t.kodemr=m.kodemr AND t.kodemr = :kodemr ORDER BY idmcl DESC');
		// $this->db->bind('kodemr', $data['mr']);
		$this->db->bind('kodemr', $kodemr);
		return $this->db->resultSet();
	}

	public function approveMcl($id)
	{
		$query = "UPDATE ". $this->table ." SET status= 1 WHERE idmcl = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();
	}

	public function approveMclAll($id)
	{
		$kodemr = $_SESSION['kodemr'];
		$query = "UPDATE ". $this->table ." SET status= 1 WHERE kodemr = :id";
		$this->db->query($query);
		$this->db->bind('id', $kodemr);

		$this->db->execute();
	}

	public function getAllMclPlan()
	{
		$userid = $_SESSION['userid'];
		$this->db->query(' SELECT o.outletid,outletcode, outletname,address,t.status FROM tbl_mcl t, ana_usermapp m,ana_msoutlet_nli o WHERE t.outletid=o.outletid AND t.kodemr=m.kodeana AND userid = :userid AND t.status=1 ORDER BY idmcl DESC');
		$this->db->bind('userid', $userid);
		return $this->db->resultSet();
	}

	public function getAllMclPlanSpv()
	{
		$userid = $_SESSION['userid'];
		$this->db->query(' SELECT o.outletid,outletcode, outletname,address,t.status FROM tbl_mclspv t, ana_usermapp m,ana_msoutlet_nli o WHERE t.outletid=o.outletid AND t.kodespv=m.kodeana AND userid = :userid AND t.status=1 ORDER BY idmcl DESC');
		$this->db->bind('userid', $userid);
		return $this->db->resultSet();
	}



	public function tambahDataMclSpv($data)
	{
		$status = 0 ;
		$kodecabang = $_SESSION['branchcode'];
		$query=" INSERT INTO tbl_mclspv VALUES
				('',:kodespv,:outletid,:ket,:status,:grup)";
		$this->db->query($query);
		$this->db->bind('kodespv', strtoupper($data['kodespv']));
		$this->db->bind('outletid', strtoupper($data['outlet']));
		$this->db->bind('ket', strtoupper($data['ket']));
		$this->db->bind('status', $status);
		$this->db->bind('grup', $data['grupoutlet']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	

}
