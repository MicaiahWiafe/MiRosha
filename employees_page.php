<html>
 <head> <title> Employees </title> </head>

 <body>

 </body>
 <h1> Employess </h1>
 <form>
       <input name ='e_name' type ='text'>
       
       <input  type= 'submit' value = 'Search'>
</form>

</html>


<?php

include_once("employees.php");
$obj = new employees();
echo "<table style='border:1px solid,padding:25px'> <tr>
<th> Name </th>
<th> Hire Date </th>
<th> Zip </th>
</tr>";
if (!isset($_REQUEST['e_name'])) {
$list = $obj->getEmployees();
}
else {
    $name = $_REQUEST['e_name'];
    $list = $obj->getEmployee($name);
}
if (!$list) {
    echo "Could not get customers' data";
    exit();
}



 while (($data=$obj->fetch())!=false) {
  echo "<tr>
  <td> {$data['ename']} </td>
  <td> {$data['hdate']} </td>
  <td> {$data['zip']} </td>
  </tr>";
 }

 echo "</table>";
?>