<?php
class Kunreal_model{

	private $table = 'tbl_visit';
	private $db;

	public function __construct()
	{
		$this->db =  new Database;
	}


    public function getAllKunreal($kode,$tanggal)
	{
		
		$data=$this->db->query(' SELECT o.outletid,outletcode, outletname,address,t.status,tanggal,ket,idvisit FROM tbl_visit t, ana_usermapp m,ana_msoutlet_nli o WHERE t.outletid=o.outletid AND t.kodemr=m.kodeana AND stat_send=1 AND tanggal = :tgl AND t.kodemr = :kode ORDER BY idvisit DESC');
		$this->db->bind('kode', $kode);
        $this->db->bind('tgl', $tanggal);
		return $this->db->resultSet();
    }

    public function updetKunReal($data)
	{
		
		$x=1;
		$total=$data['total'];
		while ($x<=$total){
			$cek = 'cek'.$x;
			$id = "id".$x;
			// echo $cek."<br>";
			if($data[$cek]=="on"){
				$ket= "ok";
			}else{
				$ket = "no";
			}
			echo $data[$id]." ".$ket."<br>";
			if($ket=="ok"){
				$query = "UPDATE tbl_visit SET status= 1 WHERE idvisit = :id";
				$this->db->query($query);
				$this->db->bind('id', $data[$id]);

				$this->db->execute();

				
			}
			$x++;
		}
		

		// $query2 =" INSERT INTO tbl_verifikasivisit VALUES
		// 		('',:id,0,'')";
		// $this->db->query($query2);
		// $this->db->bind('id', $id);
		// $this->db->execute();
	}
    
	public function getReportVisit($data)
	{
		
		$userid = $_SESSION['userid'];
		if($data['report']=="month"){

			$this->db->query(' SELECT outletname,count(outletcode) as jumlah FROM tbl_visit t, ana_usermapp m,ana_msoutlet_nli o WHERE t.outletid=o.outletid AND t.kodemr=m.kodeana AND userid = :userid AND t.status=1 AND year(tanggal) = :tahun AND month(tanggal) = :bulan GROUP BY outletname ORDER BY outletname ');
			$this->db->bind('userid', $userid);
			$this->db->bind('tahun', $data['year']);
			$this->db->bind('bulan', $data['month']);
			return $this->db->resultSet();

		}elseif($data['report']=="day"){
			
			$this->db->query(' SELECT o.outletid,outletcode, outletname,address,t.status,tanggal,ket,idvisit FROM tbl_visit t, ana_usermapp m,ana_msoutlet_nli o WHERE t.outletid=o.outletid AND t.kodemr=m.kodeana AND stat_send=1 AND userid = :userid AND t.status=1 AND tanggal  between :tgl AND :tgl2 ORDER BY idvisit DESC');
			$this->db->bind('userid', $userid);
			$this->db->bind('tgl', $data['tgl']);
			$this->db->bind('tgl2', $data['tgl2']);
			return $this->db->resultSet();
		}
	}
	

	public function getTanggalVisit($data)
	{
		// $userid = $_SESSION['userid'];
		
		$this->db->query(' SELECT namamr,tanggal,t.kodemr FROM tbl_visit t, ana_usermapp m,ana_msmr r WHERE  t.kodemr=m.kodeana AND t.kodemr=r.kodemr AND app_spv=1 AND t.kodemr = :mr AND week = :week AND t.status=0 GROUP BY tanggal');
		$this->db->bind('week', $data['week']);
		$this->db->bind('mr', $data['mr']);
		return $this->db->resultSet();

	}

	public function getWp($data)
	{
		$this->db->query("SELECT tanggal FROM tbl_periodeweekly WHERE weekly = :wp AND bulan = :bln AND tahun = :thn");
		$this->db->bind('wp', $data['week']);
		$this->db->bind('bln', $data['month']);
		$this->db->bind('thn', $data['year']);
		return $this->db->resultset();
		
	}

	public function getContentWp($data)
	{
		if(isset($data['month'])){
			if($_SESSION['level']=="SPV"){
				$userid = $data['mr'];
				
			}elseif($_SESSION['level']=="MR"){
				$userid = $_SESSION['userid'];
			}
			$this->db->query("SELECT tanggal FROM tbl_periodeweekly WHERE weekly = :wp AND bulan = :bln AND tahun = :thn
								ORDER BY tanggal DESC ");
			$this->db->bind('wp', $data['week']);
			$this->db->bind('bln', $data['month']);
			$this->db->bind('thn', $data['year']);
			$data['rtgl']=$this->db->resultset();
			$x="";
			$i=1;
			foreach ($data['rtgl'] as $wp) :
				
				if($i<6){
					$x= $x."'".$wp['tanggal']."'".",";
				}
				
				
				$i++;
			endforeach;
			$x=rtrim($x,"," );
			$x = "(".$x.")";
			
			if($_SESSION['level']=="SPV"){
				$this->db->query(" SELECT tanggal,outletname,t.status,ket FROM tbl_visit t, ana_usermapp m,ana_msoutlet_nli o WHERE t.outletid=o.outletid AND t.kodemr=m.kodeana AND stat_send=1 AND kodeana = :userid AND t.status=0 AND tanggal in ".$x." ORDER BY tanggal ASC");
			}elseif($_SESSION['level']=="MR"){
			$this->db->query(" SELECT tanggal,outletname,t.status,ket FROM tbl_visit t, ana_usermapp m,ana_msoutlet_nli o WHERE t.outletid=o.outletid AND t.kodemr=m.kodeana AND stat_send=1 AND userid = :userid AND t.status=0 AND tanggal in ".$x." ORDER BY tanggal ASC");
			}
			
			$this->db->bind('userid', $userid);
			return $this->db->resultSet();

		}
			
	}

	public function getContentVisit($data)
	{
		if(isset($data['month'])){
			if($_SESSION['level']=="SPV"){
				$userid = $data['mr'];
				
			}elseif($_SESSION['level']=="MR"){
				$userid = $_SESSION['userid'];
			}
			$this->db->query("SELECT tanggal FROM tbl_periodeweekly WHERE weekly = :wp AND bulan = :bln AND tahun = :thn
								ORDER BY tanggal DESC ");
			$this->db->bind('wp', $data['week']);
			$this->db->bind('bln', $data['month']);
			$this->db->bind('thn', $data['year']);
			$data['rtgl']=$this->db->resultset();
			$x="";
			$i=1;
			foreach ($data['rtgl'] as $wp) :
				
				if($i<6){
					$x= $x."'".$wp['tanggal']."'".",";
				}
				
				
				$i++;
			endforeach;
			$x=rtrim($x,"," );
			$x = "(".$x.")";
			
			if($_SESSION['level']=="SPV"){
				$this->db->query(" SELECT tanggal,outletname,t.status,ket FROM tbl_visit t, ana_usermapp m,ana_msoutlet_nli o WHERE t.outletid=o.outletid AND t.kodemr=m.kodeana AND stat_send=1 AND kodeana = :userid AND tanggal in ".$x." ORDER BY tanggal ASC");
			}elseif($_SESSION['level']=="MR"){
			$this->db->query(" SELECT tanggal,outletname,t.status,ket FROM tbl_visit t, ana_usermapp m,ana_msoutlet_nli o WHERE t.outletid=o.outletid AND t.kodemr=m.kodeana AND stat_send=1 AND userid = :userid AND t.status=0 AND tanggal in ".$x." ORDER BY tanggal ASC");
			}
			
			$this->db->bind('userid', $userid);
			return $this->db->resultSet();

		}
			
	}



}