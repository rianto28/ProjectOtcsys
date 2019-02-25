<?php

class Outlet_model{

	private $table = 'ana_msoutlet_nli';
	private $db;

	public function __construct()
	{
		$this->db =  new Database;
	}

	public function getAllOutlet()
	{
		$kodecabang = $_SESSION['branchcode'];
		$userid = $_SESSION['userid'];
		if($_SESSION['level']=="MR"){

			$this->db->query(" SELECT * FROM " . $this->table." WHERE branchcode = :kodecabang  AND status=1 AND note in('exist') ORDER BY outletname ");
			$this->db->bind('kodecabang', $kodecabang);
			
		}elseif($_SESSION['level']=="SPV"){

			$this->db->query(" SELECT t.outletid, outletname, namacabang FROM tbl_mcl t, ana_msoutlet_nli o, ana_usermapp u, tbl_mappspv s, ana_branch_nli b WHERE t.outletid=o.outletid AND u.kodeana=s.kodespv AND t.kodemr=s.kodemr AND b.kodecabang=o.branchcode AND t.grup='exist' AND u.userid = :userid");
			$this->db->bind('userid', $userid);

		}else{
			
			$this->db->query(" SELECT namacabang,outletcode,outletname,address FROM ana_msoutlet_nli o, ana_branch_nli b WHERE o.branchcode=b.kodecabang AND status=1 AND note in('exist') ORDER BY namacabang ");
		}
		
		return $this->db->resultSet();
	}

	public function getOutletById($id)
	{
		$this->db->query(' SELECT * FROM ' . $this->table . ' WHERE productid=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function getAllSegment()
	{
		$this->db->query(' SELECT * FROM ana_mssegment');
		return $this->db->resultSet();
	}

	public function tambahDataNoo($data)
	{
		$status = 0 ;
		$kodecabang = $_SESSION['branchcode'];
		$note = "noo";
		$parentid="";
		$query=" INSERT INTO ana_msoutlet_nli VALUES
				('',:branchcode,:outletcode,:outletname,:address,:kodesegment,:parentid,:note,:status)";
		$this->db->query($query);
		$this->db->bind('branchcode', strtoupper($kodecabang));
		$this->db->bind('outletcode', strtoupper($data['outletcode']));
		$this->db->bind('outletname', strtoupper($data['outletname']));
		$this->db->bind('address', strtoupper($data['outletaddress']));
		$this->db->bind('kodesegment', strtoupper($data['segment']));
		$this->db->bind('parentid', $parentid);
		$this->db->bind('note', $note);
		$this->db->bind('status', $status);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function tambahDataChild($data)
	{
		$status = 0 ;
		$note = "child";
		$outletcode = "-";
		$kodecabang = $_SESSION['branchcode'];
		$query=" INSERT INTO ana_msoutlet_nli VALUES
				('',:branchcode,:outletcode,:outletname,:address,:kodesegment,:parentid,:note,:status)";
		$this->db->query($query);
		$this->db->bind('branchcode', strtoupper($kodecabang));
		$this->db->bind('outletcode', $outletcode);
		$this->db->bind('outletname', strtoupper($data['outletname']));
		$this->db->bind('address', strtoupper($data['outletaddress']));
		$this->db->bind('kodesegment', strtoupper($data['segment']));
		$this->db->bind('parentid', strtoupper($data['outletparent']));
		$this->db->bind('note', $note);
		$this->db->bind('status', $status);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getAllOutletNoo()
	{
		$kodecabang = $_SESSION['branchcode'];
		$userid = $_SESSION['userid'];
		if($_SESSION['level']=="MR"){

			$this->db->query(" SELECT * FROM ana_msoutlet_nli WHERE branchcode = :kodecabang AND note = 'noo' ORDER BY outletname ");
			$this->db->bind('kodecabang', $kodecabang);

		}elseif($_SESSION['level']=="SPV"){

			$this->db->query(" SELECT t.outletid, outletname, namacabang FROM tbl_mcl t, ana_msoutlet_nli o, ana_usermapp u, tbl_mappspv s, ana_branch_nli b WHERE t.outletid=o.outletid AND u.kodeana=s.kodespv AND t.kodemr=s.kodemr AND b.kodecabang=o.branchcode AND t.grup='noo' AND u.userid = :userid");
			$this->db->bind('userid', $userid);

		}
		return $this->db->resultSet();
	}

	public function getAllOutletChild()
	{
		$kodecabang = $_SESSION['branchcode'];
		$userid = $_SESSION['userid'];
		if($_SESSION['level']=="MR"){

			$this->db->query(" SELECT * FROM ana_msoutlet_nli WHERE note = 'child' AND branchcode = :kodecabang ORDER BY outletname ");
			$this->db->bind('kodecabang', $kodecabang);

		}elseif($_SESSION['level']=="SPV"){

			$this->db->query(" SELECT t.outletid, outletname, namacabang FROM tbl_mcl t, ana_msoutlet_nli o, ana_usermapp u, tbl_mappspv s, ana_branch_nli b WHERE t.outletid=o.outletid AND u.kodeana=s.kodespv AND t.kodemr=s.kodemr AND b.kodecabang=o.branchcode AND t.grup='child' AND u.userid = :userid");
			$this->db->bind('userid', $userid);

		}
		return $this->db->resultSet();
	}

	public function getAllOutletKuota()
	{
		$kodecabang = $_SESSION['branchcode'];
		$userid = $_SESSION['userid'];
		if($_SESSION['level']=="MR"){

			$this->db->query(" SELECT outletid,outletname,address FROM ana_msoutlet_nli m,ana_inkuota k WHERE m.outletcode=k.kodeoutlet AND m.branchcode = :kodecabang GROUP BY outletid,outletname,address 
			ORDER BY outletname ");
			$this->db->bind('kodecabang', $kodecabang);
		}elseif ($_SESSION['level']=="SPV") {

			$this->db->query(" SELECT t.outletid, outletname, namacabang FROM tbl_mcl t, ana_msoutlet_nli o, ana_usermapp u, tbl_mappspv s, ana_branch_nli b WHERE t.outletid=o.outletid AND u.kodeana=s.kodespv AND t.kodemr=s.kodemr AND b.kodecabang=o.branchcode AND t.grup='kuota' AND u.userid = :userid");
			$this->db->bind('userid', $userid);

		}
		return $this->db->resultSet();
	}

	public function deleteDataChild($id)
	{
		$query = "DELETE FROM ana_msoutlet_nli WHERE outletid = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();
	}

	public function deleteDataNoo($id)
	{
		$query = "DELETE FROM ana_msoutlet_nli WHERE outletid = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();
	}

	public function getAllOutletSpv($data)
	{
		$this->db->query(" SELECT namacabang,outletcode,outletname,address FROM ana_msoutlet_nli o, ana_branch_nli b WHERE o.branchcode=b.kodecabang AND o.branchcode = :kodecabang 
			ORDER BY namacabang ");
		$this->db->bind('kodecabang', $data['branch']);
		return $this->db->resultSet();
	}



}
