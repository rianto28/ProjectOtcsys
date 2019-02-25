<?php
require_once 'tcpdf.php';
require_once 'include/conn.php';
$tgl_sekarang = date('d F Y', strtotime($_GET['tgl'])) ;
$qarea=mysql_query("SELECT namacabang,nama FROM tbl_user u, ana_branch_nli b WHERE u.branchcode=b.kodecabang AND userid='$_GET[id]'");
$rarea=mysql_fetch_array($qarea);
$area = $rarea['namacabang'];
$nama = $rarea['nama'];

$qisi=mysql_query(" SELECT o.outletid,outletcode, outletname,address,t.status,tanggal,ket,idvisit FROM tbl_visit t, 	 ana_usermapp m,ana_msoutlet_nli o WHERE t.outletid=o.outletid AND t.kodemr=m.kodeana AND userid = $_GET[id] AND tanggal = '$_GET[tgl]' ORDER BY idvisit DESC");
	$no=10;
	$content="";
	while($risi=mysql_fetch_array($qisi)){
		$content="<tr>
			<td height=\"50\" align=\"center\">&nbsp;<br>".$no."</td>
			<td width=\"200\">&nbsp;<br>".$risi['outletname']."</td>
			<td>&nbsp;<br>".$risi['ket']."</td>
			<td></td>
			</tr>".$content;
		$no=$no-1;
	}

class ReportPDF extends TCPDF {

	public function Header() {
        $image_file = "<img src=\"img\logo.png\" width=\"200\" height=\"70\"/>";
		$this->SetY(10);
		$isi_header="<table align=\"left\">
					<tr>
						<td>".$image_file."</td>
					</tr>
				</table>";
		$this->writeHTML($isi_header, true, false, false, false, '');
    }
}

$pdf = new ReportPDF('P', PDF_UNIT, 'A4', true, 'UTF-8', false);
			
    $pdf->SetTitle('Form Kunjungan');
	$pdf->SetSubject('Form Kunjungan');
			
	$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	// $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
			
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 10);
    $pdf->SetY(30);
    
    $isi = "<br><br><br><table>
					<tr>
						<td align=\"center\"><h4>LAPORAN KUNJUNGAN OUTLET HARIAN</h4></td>
					</tr>
				</table>
				<br><hr><p></p>
				<table width=\"200\">
					<tr>
						<td>Nama MR</td><td width=\"10\">:</td ><td width=\"80\">".$nama."</td>
					</tr>
					<tr>
						<td>Area</td><td width=\"10\">:</td ><td width=\"120\">".$area."</td>
					</tr>
					<tr>
						<td>Tanggal</td><td width=\"10\">:</td><td width=\"90\">".$tgl_sekarang."</td>
					</tr>
				</table>
				
				<br><br>
				<table border=\"1\" >
					<tr bgcolor=\"grey\">
						<th width=\"20\" align=\"center\"> No </th>
						<th width=\"200\" align=\"center\"> Nama Outlet </th>
						<th align=\"center\"> Laporan Kegiatan </th>
						<th align=\"center\"> Stempel </th>
					</tr>".$content.				
				"</table>";
$pdf->writeHTML($isi, true, false, false, false, '');

$namaPDF = 'formkunjungan'.$tgl_sekarang.'pdf';
$pdf->Output($namaPDF,'I');


?>