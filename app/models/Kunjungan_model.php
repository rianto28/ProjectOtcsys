<?php
class Kunjungan_model{

	private $table = 'tbl_mcl';
	private $db;

	public function __construct()
	{
		$this->db =  new Database;
	}

	public function getJumMcl()
	{
		$userid = $_SESSION['userid'];
		$this->db->query(' SELECT count(idmcl) as jmcl FROM tbl_mcl t, ana_usermapp m WHERE t.kodemr=m.kodeana AND userid = :userid AND t.status=1');
		$this->db->bind('userid', $userid);
		return $this->db->single();
	}

	public function getJumMclDk()
	{
		$userid = $_SESSION['userid'];
		$this->db->query(" SELECT count(idmcl) as jmcl FROM tbl_mcl t, ana_usermapp m WHERE t.kodemr=m.kodeana AND userid = :userid AND t.status=1 AND ket='DK'");
		$this->db->bind('userid', $userid);
		return $this->db->single();
	}

	public function getJumMclLk()
	{
		$userid = $_SESSION['userid'];
		$this->db->query(" SELECT count(idmcl) as jmcl FROM tbl_mcl t, ana_usermapp m WHERE t.kodemr=m.kodeana AND userid = :userid AND t.status=1 AND ket='LK'");
		$this->db->bind('userid', $userid);
		return $this->db->single();
	}

	public function getJumMclNon()
	{
		$userid = $_SESSION['userid'];
		$this->db->query(' SELECT count(idmcl) as jmcl FROM tbl_mcl t, ana_usermapp m WHERE t.kodemr=m.kodeana AND userid = :userid AND t.status=0');
		$this->db->bind('userid', $userid);
		return $this->db->single();
	}

	public function getJumMclNonDk()
	{
		$userid = $_SESSION['userid'];
		$this->db->query(" SELECT count(idmcl) as jmcl FROM tbl_mcl t, ana_usermapp m WHERE t.kodemr=m.kodeana AND userid = :userid AND t.status=0 AND ket='DK'");
		$this->db->bind('userid', $userid);
		return $this->db->single();
	}

	public function getJumMclNonLk()
	{
		$userid = $_SESSION['userid'];
		$this->db->query(" SELECT count(idmcl) as jmcl FROM tbl_mcl t, ana_usermapp m WHERE t.kodemr=m.kodeana AND userid = :userid AND t.status=0 AND ket='LK'");
		$this->db->bind('userid', $userid);
		return $this->db->single();
	}

	public function getPlan()
	{
		$userid = $_SESSION['userid'];
		$this->db->query(" SELECT count(idvisit) as jplan FROM tbl_visit t, ana_usermapp m WHERE t.kodemr=m.kodeana AND userid = :userid AND t.status=0 AND stat_send=1");
		$this->db->bind('userid', $userid);
		return $this->db->single();
	}

	public function getRealVisit()
	{
		$userid = $_SESSION['userid'];
		$this->db->query(" SELECT count(idvisit) as jvisit FROM tbl_visit t, ana_usermapp m WHERE t.kodemr=m.kodeana AND userid = :userid AND t.status=1 AND app_spv=1 AND stat_send=1");
		$this->db->bind('userid', $userid);
		return $this->db->single();
	}

	public function getPlanSpv()
	{
		$tahun = date('Y');
		$bulan = date ('m');
		$userid = $_SESSION['userid'];
		$this->db->query(" SELECT count(idvisit) as jplan FROM tbl_visitspv t, ana_usermapp m WHERE t.kodespv=m.kodeana AND userid = :userid AND year(tanggal) = :tahun AND month(tanggal) = :bulan");
		$this->db->bind('tahun', $tahun);
		$this->db->bind('bulan', $bulan);
		$this->db->bind('userid', $userid);
		return $this->db->single();
	}

	public function cekDataMclPlan($data){

		$this->db->query(" SELECT * FROM tbl_visit WHERE tanggal = :tgl AND outletid = :id");
		$this->db->bind('tgl',$data['tgl']);
		$this->db->bind('id',$data['outlet']);
		return $this->db->single();
	}


	public function cekDataMclPlanSpv($data){

		$this->db->query(" SELECT * FROM tbl_visitspv WHERE tanggal = :tgl AND outletid = :id");
		$this->db->bind('tgl',$data['tgl']);
		$this->db->bind('id',$data['outlet']);
		return $this->db->single();
	}

	public function tambahDataPlan($data)
	{
		$status = 0 ;
		$statussend = 0;
		$app_spv = 0;
		$stat_verify=0;
		if($data['note']=="branding"){
			$ket = "Branding";
		}elseif($data['note']=="cekstok"){
			$ket = "Cek Stok";
		}elseif($data['note']=="program"){
			$ket = "Program";
		
		}elseif($data['note']=="Branding_&_CekStok"){
			$ket = "Branding & Cek Stock";
		}elseif($data['note']=="Program_&_CekStok"){
			$ket = "Program & Cek Stock";
		}elseif($data['note']=="Program_Branding_&_CekStok"){
			$ket = "Program - Branding & Cek Stok";
		}else{
			$ket = $data['ket'];
		}

		$this->db->query(" SELECT weekly FROM tbl_periodeweekly WHERE tanggal = :tgl");
		$this->db->bind('tgl',$data['tgl']);
		$week = $this->db->single();

		// $kodecabang = $_SESSION['branchcode'];
		$query=" INSERT INTO tbl_visit VALUES
				('',:tanggal,:outletid,:kodemr,:ket,:status,:statussend,:appspv,:statverify,:week)";
		$this->db->query($query);
		$this->db->bind('tanggal', $data['tgl']);
		$this->db->bind('kodemr', strtoupper($data['kodemr']));
		$this->db->bind('outletid', strtoupper($data['outlet']));
		$this->db->bind('ket', strtoupper($ket));
		$this->db->bind('status', $status);
		$this->db->bind('statussend', $statussend);
		$this->db->bind('appspv', $app_spv);
		$this->db->bind('statverify', $stat_verify);
		$this->db->bind('week', $week['weekly']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function tambahDataPlanSpv($data)
	{
		$status = 0 ;
		$statussend=0;
		
		// $kodecabang = $_SESSION['branchcode'];
		$query=" INSERT INTO tbl_visitspv VALUES
				('',:tanggal,:outletid,:kodespv,:ket,:status,:statussend)";
		$this->db->query($query);
		$this->db->bind('tanggal', $data['tgl']);
		$this->db->bind('kodespv', strtoupper($data['kodespv']));
		$this->db->bind('outletid', strtoupper($data['outlet']));
		$this->db->bind('ket', strtoupper($data['ket']));
		$this->db->bind('status', $status);
		$this->db->bind('statussend', $statussend);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function getTanggalDw()
	{
		$userid = $_SESSION['userid'];
		$this->db->query(' SELECT tanggal FROM tbl_visit t, ana_usermapp m,ana_msoutlet_nli o WHERE t.outletid=o.outletid AND t.kodemr=m.kodeana AND stat_send=0 AND userid = :userid AND stat_send=0 AND app_spv=0 ORDER BY idvisit DESC');
		$this->db->bind('userid', $userid);
		return $this->db->single();
	}

	public function getAllPlan()
	{
		$userid = $_SESSION['userid'];
		$this->db->query(' SELECT o.outletid,outletcode, outletname,address,t.status,tanggal,ket,idvisit,stat_send FROM tbl_visit t, ana_usermapp m,ana_msoutlet_nli o WHERE t.outletid=o.outletid AND t.kodemr=m.kodeana AND stat_send=0 AND userid = :userid AND stat_send=0 AND app_spv=0 ORDER BY idvisit DESC');
		$this->db->bind('userid', $userid);
		return $this->db->resultSet();
	}

	public function getAllPlanSpv()
	{
		$userid = $_SESSION['userid'];
		$this->db->query(' SELECT o.outletid,outletcode, outletname,address,t.status,tanggal,ket,idvisit FROM tbl_visitspv t, ana_usermapp m,ana_msoutlet_nli o WHERE t.outletid=o.outletid AND t.kodespv=m.kodeana AND stat_send=0 AND userid = :userid ORDER BY idvisit DESC');
		$this->db->bind('userid', $userid);
		return $this->db->resultSet();
	}

	public function deleteDataPlan($id)
	{
		$query = "DELETE FROM tbl_visit WHERE idvisit = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();
	}

	public function deleteDataPlanSpv($id)
	{
		$query = "DELETE FROM tbl_visitspv WHERE idvisit = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();
	}

	public function sendPlan($data)
	{
		$query = "UPDATE tbl_visit SET stat_send = 1 WHERE stat_send = 0 AND kodemr = :kodemr ";
		$this->db->query($query);
		$this->db->bind('kodemr', $data['mr']['kodeana']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function sendPlanSpv($data)
	{
		$query = "UPDATE tbl_visitspv SET stat_send = 1 WHERE stat_send = 0 AND kodespv = :kodespv ";
		$this->db->query($query);
		$this->db->bind('kodespv', $data['mr']['kodeana']);

		$this->db->execute();

		return $this->db->rowCount();
	}
	
	public function getStatusPlan($data)
	{
		$userid = $_SESSION['userid'];
		$this->db->query(' SELECT t.app_spv,tanggal,kodemr FROM tbl_visit t, ana_usermapp m WHERE t.kodemr=m.kodeana AND userid = :userid AND year(tanggal) = :tahun AND month(tanggal) = :bulan GROUP BY t.status,tanggal,kodemr ORDER BY idvisit DESC');
		$this->db->bind('userid', $userid);
		$this->db->bind('tahun', $data['tahun']);
		$this->db->bind('bulan', $data['bulan']);
		return $this->db->resultSet();
	}

	public function getDetStatusPlan($id)
	{
		
		$userid = $_SESSION['userid'];
		$this->db->query(' SELECT o.outletid,outletcode, outletname,address,t.status,tanggal,ket,idvisit,t.app_spv FROM tbl_visit t, ana_usermapp m,ana_msoutlet_nli o WHERE t.outletid=o.outletid AND t.kodemr=m.kodeana AND userid = :userid AND tanggal = :tgl ORDER BY idvisit DESC');
		$this->db->bind('tgl', $id);
		$this->db->bind('userid', $userid);
		return $this->db->resultSet();
	}

	public function getDetPlanPeriode($week,$th,$bln,$kode)
	{
		
		$this->db->query(' SELECT tanggal FROM tbl_visit t, ana_usermapp m,ana_msoutlet_nli o WHERE t.outletid=o.outletid AND t.kodemr=m.kodeana AND kodemr = :kodemr AND year(tanggal) = :tahun AND month(tanggal) = :bulan AND week = :week GROUP BY tanggal ORDER BY tanggal ASC');
		$this->db->bind('tahun', $th);
		$this->db->bind('bulan', $bln);
		$this->db->bind('week', $week);
		$this->db->bind('kodemr', $kode);
		return $this->db->resultSet();
	}

	public function getDetPlan($week,$th,$bln,$kode)
	{
		
		$this->db->query(' SELECT o.outletid,outletcode,outletname,t.status,tanggal,ket,idvisit FROM tbl_visit t, ana_usermapp m,ana_msoutlet_nli o WHERE t.outletid=o.outletid AND t.kodemr=m.kodeana AND kodemr = :kodemr AND year(tanggal) = :tahun AND month(tanggal) = :bulan AND week = :week ORDER BY tanggal ASC');
		$this->db->bind('tahun', $th);
		$this->db->bind('bulan', $bln);
		$this->db->bind('week', $week);
		$this->db->bind('kodemr', $kode);
		return $this->db->resultSet();
	}

	public function getVisitAppSpv($data)
	{
		
		$kodemr = $_SESSION['kodemr'];
		$this->db->query(' SELECT namamr,t.app_spv,t.kodemr as kodemr,week,year(tanggal) as tahun,month(tanggal) as bulan FROM tbl_visit t, ana_msoutlet_nli o,ana_msmr m WHERE t.outletid=o.outletid AND t.kodemr=m.kodemr AND t.kodemr = :kodemr AND year(tanggal) = :thn AND month(tanggal) = :bln AND stat_send = 1 GROUP BY namamr,t.status,t.kodemr,week ORDER BY  week ASC');
		$this->db->bind('kodemr', $kodemr);
		$this->db->bind('thn', $data['year']);
		$this->db->bind('bln',$data['month']);
		return $this->db->resultSet();
	}

	public function getVerifikasiMr($data)
	{
		$kodemr = $_SESSION['kodemr'];
		$this->db->query(' SELECT namamr,tanggal,t.app_spv,t.kodemr as kodemr,stat_verifikasi FROM tbl_visit t, ana_msoutlet_nli o,ana_msmr m WHERE t.outletid=o.outletid AND t.kodemr=m.kodemr AND t.kodemr = :kodemr AND year(tanggal) = :tahun AND month(tanggal) = :bulan AND stat_send = 1 GROUP BY namamr,tanggal,t.kodemr,stat_verifikasi ORDER BY  tanggal DESC');
		$this->db->bind('kodemr', $kodemr);
		$this->db->bind('tahun', $data['year']);
		$this->db->bind('bulan', $data['month']);
		return $this->db->resultSet();
	}

	public function approveVisitMr($data)
	{
		
		$query = "UPDATE tbl_visit SET app_spv= 1 WHERE kodemr = :kode AND week = :week AND year(tanggal) = :th AND month(tanggal) = :bln";
		$this->db->query($query);
		$this->db->bind('kode', $data['kodemr']);
		$this->db->bind('week', $data['week']);
		$this->db->bind('th', $data['year']);
		$this->db->bind('bln', $data['month']);

		$this->db->execute();
	}

	public function updateVerifikasiMr($data)
	{
				
		$idvisit = $data['idvisit'];
		$jumlah = $data['no'];
		// var_dump($idvisit);
		// echo $idvisit[1];
		 for($x=0;$x<$jumlah;$x++){
			$string = "status".$x; 
			// echo $idvisit[$x]."<br>";
			// echo $data[$string]."<br>";
			if($data[$string]=="notvisit"){

				$this->db->query(" SELECT status FROM tbl_visit WHERE idvisit = :idvisit ");
				$this->db->bind('idvisit', $idvisit[$x]);
				$vstatus = $this->db->single();
				$status = $vstatus['status'] ;
				if($status==0){
					$query = "UPDATE tbl_visit SET status = 1, stat_verifikasi = 1 WHERE  idvisit = :idvisit ";
					
				}else{
					$query = "UPDATE tbl_visit SET status = 0, stat_verifikasi = 1 WHERE  idvisit = :idvisit ";
				}
			}else{
				$query = "UPDATE tbl_visit SET stat_verifikasi = 1 WHERE  idvisit = :idvisit ";
			}
				
			$this->db->query($query);
			$this->db->bind('idvisit', $idvisit[$x]);
			$this->db->execute();
			

		}

		return $this->db->rowCount();
		

		

	}

	
}