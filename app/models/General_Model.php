<?php
class General_model{

    // private $table = 'ana_branch_nli';
    private $db;

    public function __construct()
    {
        $this->db =  new Database;
    }

    public function getMonth()
    {

        $this->db->query(' SELECT idmonth,monthdesc FROM tbl_month ');
		return $this->db->resultSet();

    }

    public function getYear()
    {

        $this->db->query(' SELECT tahun FROM tbl_tahun ');
		return $this->db->resultSet();

    }

    public function getWeekPeriod()
    {
        $this->db->query("SELECT idperiode,tanggal FROM tbl_periodeweekly");
        return $this->db->resultSet();
    }

    public function getWeekMonth()
    {
        $this->db->query("SELECT idweekly,description FROM tbl_weekly");
        return $this->db->resultSet();
    }


}