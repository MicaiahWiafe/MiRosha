<?php
     include_once("adb.php");
     
     /**
	*Variables used in all the functions for Patients
	*@param int patient_id patient ID
	*@param string username username
	*@param string firstname first name
	*@param string lastname last name
	*@param string gender gender
	*@param string nationality nationality
	*@param string insurance_type insurance type
	*@param date dob date of birth
	*@param int group_name group name
	*@param int phone_number phone number
	*@param string email email address
	*/

         class parts extends adb{ 


          /**  
          *Function search parts
          *@param int $filter contains the Pno
          */
               function searchParts($text=false){
                    $filter=false;
                    if($text!=false){
                         $filter=" pno like '%$text%' or pname like '%$text%' or qoh like '%$text%' or price
                         like '%$text%' or olevel like '$text'";
                    }
                    return $this->getParts($filter);
               }


          /**  
          *Function getShoes
          *@param int $filter contains the Patient ID abd retrieves the information from the database
          */
     	     function getParts($filter=false){
     	          $strQuery = "select pno, pname, qoh, price, olevel from parts";
                    if($filter!=false){
                         $strQuery=$strQuery . " where $filter";
                    }
                    return $this->query($strQuery);
     	    }

          /**  
          *Function updateShoes
          *@param int $filter contains $patientID,$username,$firstname,$lastname,$gender,$nationality,$insurance_type,
          *$dob,$group,$phone_number,$email which allow the user to change these details the application.
          */
               function editParts($pno, $pname, $qoh, $price, $olevel){
                    $strQuery="update parts set pname='$pname',qoh='$qoh',price='$price', olevel='$olevel' where pno='$pno'";
                    return $this->query($strQuery);
               }

     }

?>
