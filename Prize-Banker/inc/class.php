<?php
class Panels{
	public $title;
	public $description;
	
	function __construct($id){
		$query = mysql_query("select * from panels where id='$id'") or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		$this->title = $row['title'];
		$this->description = $row['description'];
	}
}

class TransactionDetails{
	public $first_name;
	public $last_name;
	public $item_name;
	public $amount;
	public $email;
	public $date1;
	public $status;
	public $country;
	public $city;
	public $state;
	public $street_address;
	public $zip;
	
	function __construct($TransactionID){
		$query = mysql_query("select * from funds where transaction_id='$TransactionID'") or die(mysql_error());
		$row = mysql_fetch_assoc($query);
		$this->first_name = $row['first_name'];
		$this->last_name = $row['last_name'];
		$this->item_name = $row['item_name'];
		$this->amount = $row['amount'];
		$this->email = $row['email'];
		$this->date1 = $row['date'];
		$this->status = $row['status'];
		$this->country = $row['country'];
		$this->city = $row['city'];
		$this->state = $row['state'];
		$this->street_address = $row['street_address'];
		$this->zip = $row['zip'];
	}
}
?>