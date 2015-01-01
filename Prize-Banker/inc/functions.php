<?php
function Protect($value){
	return mysql_real_escape_string($value);	
}

function AdminLogin($Username, $Password, $rememberMe){
	$Username = Protect($Username);
	$Password = Protect($Password);
	$query = mysql_query("select * from admin_login where username='$Username'") or die(mysql_error());
	if (mysql_num_rows($query) > 0){
		$row = mysql_fetch_assoc($query);
		$db_password = strtolower($row['password']);
		if ($Password==$db_password){
			if ($rememberMe=="on"){
				setcookie("prize_banker",$Username, time()+3600*24);
				return "<div id='success' class='info_div'><span class='ico_success'>Please Wait...</span></div><meta HTTP-EQUIV='REFRESH' content='1; url=dashboard.php'>";
			}else{
				$_SESSION['prize_banker']=$Username;
				return "<div id='success' class='info_div'><span class='ico_success'>Please Wait...</span></div><meta HTTP-EQUIV='REFRESH' content='1; url=dashboard.php'>";
			}
		}else{
			return "<div id='fail' class='info_div'><span class='ico_cancel'>Invalid Password</span></div>";
		}
	}else{
		return "<div id='fail' class='info_div'><span class='ico_cancel'>Invalid Username</span></div>";	
	}
}

function CheckAdminLogin() {
	if (!($_SESSION['prize_banker'] || $_COOKIE['prize_banker'])){
		header("Location: ./");
	}
}

function GetCauses($mode){
	$query = mysql_query("select * from causes ORDER BY id DESC") or die(mysql_error());
	if ($mode=="id"){
		while ($row = mysql_fetch_assoc($query)){
			$id = $row['id'];
			$title = $row['title'];
			echo "<option value='$id'>$title</option>";
		}
	}else{
		while ($row = mysql_fetch_assoc($query)){
			$title = $row['title'];
			echo "<option value='$title'>$title</option>";
		}	
	}
}

function LeftPanelUpdate($title,$description,$panel){
	$query = mysql_query("update panels set title='$title', description='$description' where id='$panel'") or die(mysql_error());
	return "<div id='success' class='info_div'><span class='ico_success'>SuccessFully Updated!</span></div>";
}

function GetTotalFund(){
	$query = mysql_query("SELECT amount, SUM(amount) FROM funds") or die(mysql_error());
	while ($row = mysql_fetch_array($query)){
		return number_format($row['SUM(amount)'],0);
	}
}

function GetTotalTxn(){
	return mysql_num_rows(mysql_query("select id from funds"));	
}

function GetTotalEmailNo() {
	return mysql_num_rows(mysql_query("select id from email_records Group by email"));
}

function has_Transaction($transactionID){
	$query = mysql_query("select transaction_id from funds where transaction_id='$transactionID'") or die(mysql_error());
	if (mysql_num_rows($query) > 0){
		return true;
	}
}


function GetVideoID($href){
	$url = parse_url($href);
	$query = array();
	parse_str($url['query'], $query);
	return $query['v'];	
}
?>