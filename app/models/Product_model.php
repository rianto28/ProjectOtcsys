<?php

class Product_model{

	private $table = 'tbl_product';
	private $db;


	public function __construct()
	{
		$this->db =  new Database;
	}

	public function getAllProduct()
	{
		$this->db->query(' SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getProductById($id)
	{
		$this->db->query(' SELECT * FROM ' . $this->table . ' WHERE productid=:id');
		$this->db->bind('id',$id);
		return $this->db->single();
	}

	public function tambahDataProduct($data)
	{
		$query=" INSERT INTO tbl_product VALUES
				('',:productcode,:productname,:pack,:hna,:discount,:principal,:status)";
		$this->db->query($query);
		$this->db->bind('productcode', $data['productcode']);
		$this->db->bind('productname', $data['productname']);
		$this->db->bind('pack', $data['packing']);
		$this->db->bind('hna', $data['hna']);
		$this->db->bind('discount', $data['discount']);
		$this->db->bind('principal', $data['principal']);
		$this->db->bind('status', $data['status']);

		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteDataProduct($id)
	{
		$query = "DELETE FROM ". $this->table ." WHERE productid = :id";
		$this->db->query($query);
		$this->db->bind('id', $id);

		$this->db->execute();
	}
}
