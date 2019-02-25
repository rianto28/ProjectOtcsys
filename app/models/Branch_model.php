<?php
class Branch_model{

	private $table = 'ana_branch_nli';
	private $db;

	public function __construct()
	{
		$this->db =  new Database;
	}

	public function getBranchSpv($data)
	{
		$userid = $_SESSION['userid'];
		$this->db->query(" SELECT namacabang,branchcode FROM ana_branch_nli b,tbl_mappspv m,ana_usermapp p WHERE m.branchcode=b.kodecabang AND m.kodespv=p.kodeana AND p.userid = :userid ORDER BY namacabang ");
		$this->db->bind('userid', $userid);
		return $this->db->resultSet();
	}


}