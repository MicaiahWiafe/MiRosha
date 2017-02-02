<?php
include_once ("adb.php");
class employees extends adb {
	
	//constructor
	function employees() {} 


function getEmployees() {
	$stringQuery = "SELECT * FROM employees";
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


	
function getEmployee($str) {
	$query = "SELECT * FROM employees WHERE ename LIKE '%$str%'";
	$b = $this->query($query);
	
	if (!$b) {
		echo "could not get employee";
		exit();
	}
	return $b;

}

}	



/* $obj = new employees();
$abc = $obj->getEmployees();
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
}  */
?>