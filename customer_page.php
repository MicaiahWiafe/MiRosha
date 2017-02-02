<html>
 <head> 
 <title> Customers </title> </head>

 <body>

 </body>
 <form>
       <input name ='cus_name' type ='text'>
       
       <input  type= 'submit' value = 'Search'>
</form>

</html>


<?php

include_once("customers.php");
$obj = new customers();
echo "<table style='border:1px solid,padding:25px'> <tr>
<th> Name </th>
<th> Adress </th>
<th> Phone </th>
</tr>";
if (!isset($_REQUEST['cus_name'])) {
$list = $obj->getCustomers();
}
else {
    $name = $_REQUEST['cus_name'];
    $list = $obj->getCustomer($name);
}
if (!$list) {
    echo "Could not get customers' data";
    exit();
}



 while (($data=$obj->fetch())!=false) {
  echo "<tr>
  <td> {$data['cname']} </td>
  <td> {$data['street']} </td>
  <td> {$data['phone']} </td>
  </tr>";
 }

 echo "</table>";
?>