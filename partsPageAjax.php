<! doctype html>
<?php
/**
 *The main purpose of this file is to enable the nurse to modify the thr personal information of her Parts. 
 *This file prints out a table displaying all the Parts information. The nurse can search for Parts using the search box.
 *the Parts information that is displayed includes the:
 *pno, pname, First Name, Last Name, olevel, Nationality, Insurance Type, Date of Birth, Phone Number, Email, Group Name.
 *At the end of every table row an Update button has been place which when pressed opens a modal which entails a form to allow the 
 *nurse to modify or update information of that particular student.
 *When the update button is pressed the page is automatically reloaded, the change is completed and can be see by the nurse on the table
 *
 * @summary   This file basically allows the nurse to update the information of that particular patient.
 *
 *@access protected
 */
//  session_start();
  //if(!isset($_SESSION['USER'])){
  	//header("location:login.php");
	 //exit();
?>
<html>
	<head>
		<title>Mi Rosha</title>
		<link rel="stylesheet" href="css/styles.css">
		<script type="text/javascript" src="js/jquery-1.12.1.js"></script>
		<script type="text/javascript">


			
			/**
 			* @function this is the editPatientComplete() which  is passed after the editPatient() is called after and passed a json message on whether 
 			* patietnt has been added or not.
			*/
			function editPatientComplete(xhr, status, email) {
				if (status!="success") {
					divStatus.innerHTML = "Error while updating patient";

					
					
					return;
				}
				var obj=$.parseJSON(xhr.responseText);
						if(obj.result==0){
							  divStatus.innerHTML= obj.message;	
						}else{
							
							  divStatus.innerHTML="Item Updated";
							  alert("You have successfully update the patient Info");
							  location.reload();
						}
			} 

			/**
 			* @function this is the editPatient() and is called when the update button is pressed the form in the modal and calls the editpatient() in the ajax page
			*/
			function editPatient(val,modal){

				modal.style.display="none";
 				var vpno=document.getElementById("pno"+val).value;
 				var vpname=document.getElementById("pname"+val).value;
 				var vqoh=document.getElementById("qoh"+val).value;
 				var vprice=document.getElementById("price"+val).value;
 				var volevel=document.getElementById("olevel"+val).value;


				var pageURL = "editAjax.php?command=1&pno="+vpno+"&pname="+vpname+"&qoh="+vqoh+ "&price="+vprice
							  +"&olevel="+volevel;	  
					$.ajax(pageURL, 
			   			{
			   			 async:true, 
			   			 complete:editPatientComplete
			   			}
					);



			}

		</script>
	</head>
	<body>
		<div class="status" id="divStatus"></div> 
		<table>
			<tr>
				<td colspan="2" id="pageheader">
				<div id="div7"> <img src="logo.png" height="60"/> </div>
					<font color="white">Mi Rosha</font>
					<!--Links to the other application pages-->
					<ul>
						<li><a href="index.html">HOME</a></li>
						<li><a href="employees_page.php">OUR EMPLOYEES</a></li>
						<li><a href="customer_page.php">Our CUSTOMERS</a></li>
						<li><a href="contact.html">CONTACT</a></li>
			  			<li2 ><a href="logout.php"><font color = 'white'>Logout</font> </a></li2>
					</ul>
				</td>
			</tr>
			
			<tr>	
				<td id="content">
					<div id="divPageMenu">
						<span>Parts Personal Records</span>		
					</div>
					<div id="divContent">
						<div id="divSearch">
					<form action="" method="GET">
						Search for Patient:
						<input type="text" name="txtSearch">
						<div id="button"><input type="submit" value="Search" ></div>	
					</form>	
						</div>

<?php

	 $col1 = "#993333";
	// Echo the table header
	echo "<table border='1'><tr bgcolor=$col1>
					<th><font color = 'white'>Item #</font></th>
					<th><font color = 'white'>Name</font></th>
					<th><font color = 'white'>Quantity</font></th>
					<th><font color = 'white'>Price</font></th>
					<th><font color = 'white'>Olevel</font></th>
					<th><font color = 'white'>UPDATE THIS PART</font></th>
							</tr>";
				
	//1) Create object of Parts class
	include_once "parts.php";
	$parts = new parts();


	$pno = "";
						$pname="";
						$qoh="";
						$price="";
						$olevel="";
	
	//2) Call the object's getParts method and check for error
	if (!$parts->getParts()){
		echo "error getting Items";
	}
	//check if there is any thing in the textbox
	else if(isset($_REQUEST['txtSearch'])){
		//call the database and check if the patient exists
		$search = $_REQUEST['txtSearch'];
		$result=$parts->searchParts($search);
	}
	 
	// create an increment to change the value of modal and button each time the table loops				
	$I=0;
	// else if the search textbox is empty dispay all Parts in a table form
	while($row=$parts->fetch()){
          //$pno,$pname,$qoh,$price,$olevel,$nationality,$insurance_type,
          //$dob,$group,$phone_number,$email, update button
	$I=$I+1;
		echo"<tr><td style = 'background-color: white '>{$row["pno"]}</td>
				<td style = 'background-color: white '>{$row["pname"]}</td>
				<td style = 'background-color: white '>{$row["qoh"]}</td>
				<td style = 'background-color: white '>{$row["price"]}</td>
			   	<td style = 'background-color: white '>{$row["olevel"]}</td>
				<td style = 'background-color: white '>"
				?>
				<!--An update button is placed in the table, when licked a modal pops ups to allow the nurse to modify the Parts Information-->
				<!-- Trigger/Open The Modal -->
				
				<button id="<?php echo "myButton".$I; ?>" value ="<?php echo $row["pno"] ;?>" onclick="openModal('<?php echo "myButton".$I; ?>','<?php echo "myModal".$I; ?>','<?php echo "close".$I; ?>')">Update</button>

				<!-- The Modal -->
				<div id="<?php echo "myModal".$I; ?>"  value ="<?php echo $row["pno"] ;?>" class="modal">

  				<!-- Modal content -->
  				<div class="modal-content">
   					<div class="modal-header">
     					<button id="<?php echo "close".$I; ?>">Exit</button>
     				    <h2>Update Part</h2>
   					</div>
   					<div class="modal-body">
   							<!-- Create a form in the modal in order to modify Parts personal information-->
				   				<div>Patient's ID : <input type="text" id="<?php echo "pno".$I; ?>" name="pno" value="<?php echo $row["pno"]; ?>" readonly/> </div>  
				   				<br>               
				   				<div> pname: <input type="text" id="<?php echo "pname".$I; ?>" value="<?php echo $row["pname"];?>"/></div>
				  				<br> 
				  				<div>First Name: <input type="text" id="<?php echo "qoh".$I; ?>" value="<?php echo $row["qoh"];?>"/></div>
				   				<br> 
				   				<div>Last Name: <input type="text" id="<?php echo "price".$I; ?>" value="<?php echo $row["price"];?>"/></div>
				   				<br> 
				   				<div>olevel:<?php $default_olevel = $row["olevel"]?>
				  				  <select id="<?php echo "olevel".$I; ?>">
				  					<option value='<?php echo $default_olevel?>' selected='selected'><?php echo $default_olevel?></option>
				  					<option value="1">Male</option>
									<option value="2">Female</option>
				   				  </select>
				   				</div>

								 
				   				
				   		      <button name="update" onClick="editPatient(<?php echo $I ?>, <?php echo "myModal".$I; ?>)">Update</button>


    				</div>
    				<div class="modal-footer">
      					<h3>Modal Footer</h3>
    				</div>
  				</div>

				</div>
				<?php 
					echo"</td>
					</tr>";}
				?>	

		<script>

		function openModal(id,modal,close){
		 //Get the modal
		var modal = document.getElementById(modal);
		

		// Get the button that opens the modal
		var btn = document.getElementById(id);
		

		// When the user clicks the button, open the modal 
		btn.onclick = function() {
 		   modal.style.display = "block";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
    		if (event.target == modal) {
        		modal.style.display = "none";
    		}
		}	
			var span = document.getElementById(close);
			span.onclick = function() {
    		modal.style.display = "none";
		}
		}
		
		</script>					
					</div>
				</td>
			</tr>
		</table>
		</tr>
		
		</tr>
			<tr>
				<td colspan="2" id="pagefooter">
				<footer>
					<div class="menuitem"><a href="http://mail.office365.com/"><font color = 'white'> Send us an email </font></a></div>
					<div class="menuitem"><a href="http://www.ashesi.edu.gh/student-life-5/health-and-wellbeing.html"><font color = 'white'>More Info</font></a></div>
					<div class="menuitem"><a href="http://www.who.int/topics/en/"><font color = 'white'> Health News</font></a></div>
					<?php echo '<a href="logout.php">Logout </a>'; ?>
					<p>©Ashesi University College. All rights reserved.</p>
					<p>1 University Avenue, Berekuso; PMB CT 3, Cantonments, Accra, Ghana | Phone: +233.302.610.330</p>
				</footer>
				</td>
			</tr>	
			
		</table>
	</body>
</html>	
<?php
//  session_destroy();
?>


 