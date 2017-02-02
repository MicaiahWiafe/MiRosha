<?php
include_once ("adb.php");
class customers extends adb {
	
	//constructor
	function customers() {} 


function getCustomers() {
	$stringQuery = "SELECT * FROM customers";
	$a = $this->query($stringQuery);
	
	if(!$a) {
		echo "Could not select data";
		exit();
	}
	
	/*$b = $this->fetch();

	if (!$b) {
		echo "could not fetch data";
		exit;
	} */
	
	return $a;
}

function getCustomer($str) {
	$query = "SELECT * FROM customers WHERE cname LIKE '%$str%'";
	$b = $this->query($query);
	
	if (!$b) {
		echo "could not get customer details";
		exit();
	}
	return $b;

}

}	


/*
$obj = new customers();
$abc = $obj->getCustomers();
if (!$abc) {
	echo "No";
}
while(($def=$obj->fetch())!=false) {
//$def = $obj->fetch();
if (!$def){
	echo "No no";
	exit();
}
print_r($def);
}

*/
?>