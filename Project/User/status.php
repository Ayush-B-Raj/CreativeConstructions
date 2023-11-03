<?php
session_start();
include("../Assets/Connection/Connection.php");

if(isset($_GET['did']))
{
	$delQry="update tbl_site set site_status=5 where site_id=".$_GET['did'];
	if($conn->query($delQry))
	{
		 ?>
         <script>
         alert("Updated")
      window.location="ViewMySite.php"
         </script>
         <?php
	}
	else
	 {?>
         <script>
         alert("Failed")
      window.location="ViewMySite.php"
         </script>
         <?php
	 }
}
if(isset($_GET['dido']))
{
	$delQryw="update tbl_site set site_status=6 where site_id=".$_GET['dido'];
	if($conn->query($delQryw))
	{
		 ?>
         <script>
         alert("Updated")
         </script>
         <?php
	}
	else
	 {?>
         <script>
         alert("Failed")
         </script>
         <?php
	 }
}
?>
<?php
include("Head.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
  *{
    margin:0;
    padding:0;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
  body {
    font-family: 'Open Sans', sans-serif;
  font-weight: 600;
  line-height: 1.42em;
  color:black;
  background-color:white;
  background-size:cover;
background-position:center;
background-image:linear-gradient(rgba(0, 128, 0, 0.179),rgba(77, 37, 37, 0.136)),

url("../Assets/Templates/Main/img/back1.jpg");
  
}
 table {
    width: 70%;
    border-collapse: collapse; /* Merge cell borders */
    border: 5px solid rgb(0,77,18); /* Main border for the table */
    box-shadow: 1 0 3px rgba(20,92,37,0.9); /* Add a subtle shadow */
}
.container td {
	  font-weight: normal;
	  font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px #0E1119;
	   -moz-box-shadow: 0 2px 2px -2px #0E1119;
	        box-shadow: 0 2px 2px -2px #0E1119;
}
.container th{
	  font-weight: bold;
	  font-size: 1em;
  text-align: center;
  color: rgba(177,188,180);
}
.container {
	  text-align: left;
	  overflow: hidden;
	  width: 80%;
	  margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;
}




.container td:hover {
  background-color: #A7A1AE;
  color: #185875;
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21;
  transform: translate3d(0px, 2px, 0px);
  
  transition-delay: 0s;
	  transition-duration: 0.4s;
}
.container th {
	  background-color: rgba(0,77,18,0.2);
}

.container td:first-child { color: #FB667A; }
/* Background-color of the odd rows */
.container tr:nth-child(odd) {
	  background-color: #323C50;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
	  background-color: #2C3446;
}


th, td {
    padding: 8px;
    text-align: left;
    padding: 5px 10px;
      text-align: center;
      border: 3px solid rgb(20,92,37,0.9);
}

th {
    background-color:rgb(20,92,37,0.7);
    color: #fff;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}
tr:nth-child(odd) {
    background-color: #f2f2f2;
}

a {
    text-decoration: none;
    color: #0074cc;
}

/* Style for status labels */
td > a {
    display: inline-block;
    padding: 5px 10px;
    background-color: #0074cc;
    color: #fff;
    text-align: center;
    border-radius: 5px;
    margin-right: 5px;
}

/* Style for 'Finished' button */
td > a:last-child {
    background-color: #4caf50;
}

/* Center the payment buttons */
td > a.pay-button {
    display: block;
    width: 100px;
    padding: 5px 10px;
    background-color: #0074cc;
    color: #fff;
    text-align: center;
    border-radius: 5px;
    margin-top: 5px;
    text-align: center;

    
}
.center-table {
        margin: 0 auto; /* Auto margins horizontally center the element */
    }

    </style>
</head>

<body>
<table align="center" border="1" class="center-table">
    <tr>
      <th>SLno</th>
      <th>Site Details</th>
      <th>Landmark</th>
      <th>Location</td>
      <th>Image</th>
      <th>Plotarea</th>
      <th>Site Estimate</th>
      <th>Site Sketchup</th>
      <th>Site Model</th>
      <th>Status</th>
      <th>Action</th>
      <th>Daily Updates</th>
      <th>Payment</th>
    </tr>
    <?php
	$selQry="select * from tbl_site u inner join tbl_place p on p.place_id=u.place_id inner join tbl_district d on p.district_id=d.district_id where user_id=".$_SESSION['uid'];
 
	
	$res=$conn->query($selQry);
	$i=0;
	while($row=$res->fetch_assoc())
	{
		?>
    <tr>
      <td><?php echo ++$i ?></td>
      <td><?php echo $row['site_details'] ?></td>
      <td><?php echo $row['site_landmark'] ?></td>
      <td><?php echo $row['district_name'] ," ,  ", $row['place_name'] ?></td>
      <td><a href="../Assets/Files/Request/Photo/<?php echo $row['site_image']?>" target="_blank">View Photo</a></td>
      <td><?php echo $row['site_plot'] ?></td>
      <td><?php if( $row['site_estimate']!=0){
		  echo $row['site_estimate'];
	      }?>
      </td>
      <?php if($row['site_status']>=4){?>
      <td><a href="../Assets/Files/SketchupGallery/Photo/<?php echo $row['site_sketchup']?>" target="_blank">View Sketch</a></td>
      <td><a href="../Assets/Files/SitemodelGallery/Photo/<?php echo $row['site_model']?>" target="_blank">View Model</a></td>
      <?php
	  }
	  else{
		  echo "<td></td><td></td>";
	  }
	  ?>
      <td>
	  <?php
	   if($row['site_status']==0)
	   {
		   echo "Request Send";
	   }
	   else if($row['site_status']==1){
		   echo "Project Accepted";
	   }
	   else if($row['site_status']==2){
		   echo "Project Rejected";
	   }
	   else if($row['site_status']==3){
		   if($row['site_status']>=3)
	   {
		  $gry="select * from tbl_engineer where engineer_id=".$row['engineer_id'];
      $res3=$conn->query($gry);
      $row2=$res3->fetch_assoc();
      echo "Engineer: ".$row2['engineer_name']." ";
	   }
		   
		   echo "Assigned";
	   }
	   
	   else if($row['site_status']==4){
		   
		  $gry="select * from tbl_engineer where engineer_id=".$row['engineer_id'];
      $res3=$conn->query($gry);
      $row2=$res3->fetch_assoc();
      echo "Engineer: ".$row2['engineer_name']." ";
		   echo " Uploaded The Sketch and Model";
	   }
	   else if($row['site_status']==5){
		   echo "<br> The Sketch and Model:Accepted";
		   echo "<br>Paymet Pending";
		   
	   }
	    else if($row['site_status']==6){
		   echo " Sketch and Model: Rejected ";
		   echo "Under Reconsideration";
		   
	   }
     else if($row['site_status']==7){
      echo "Pay the amount for Planning and Design";
      
    }
    else if($row['site_status']==8){
      echo "Payment Successfull";
    }
    else if($row['site_status']==9){
      echo "Supervisor Assigned:<br>";
    }
    else if($row['site_status']==10){
      echo "Site Preparation Completed<br>";
    }
    else if($row['site_status']==11){
      echo "Pay the amount for Foundation";
    }
    else if($row['site_status']==12){
      echo "Payment Successfull";
    }
    else if($row['site_status']==13){
      echo "Foundation Completed<br>";
    }
    else if($row['site_status']==14){
      echo "Pay the amount for Framing";
    }
    else if($row['site_status']==15){
      echo "Payment Successfull";
    }
    else if($row['site_status']==16){
      echo "Framing Completed";
    }
    else if($row['site_status']==17){
      echo " Pay the amount for Rough Electrical, Plumbing, and HVAC";
    }
    else if($row['site_status']==18){
      echo "Payment Successfull";
    }
    else if($row['site_status']==19){
      echo "Rough Electrical, Plumbing, and HVAC Completed";
    }
    else if($row['site_status']==20){
      echo " Pay the amount for Interior Finishes";
    }
    else if($row['site_status']==21){
      echo "Payment Successfull";
    }
    else if($row['site_status']==22){
      echo "Interior Finishes Completed";
    }
    else if($row['site_status']==23){
      echo "Pay the amount for Final Electrical, Plumbing, and HVAC";
    }
    else if($row['site_status']==24){
      echo "Payment Successfull";
    }
    else if($row['site_status']==25){
      echo "Final Electrical, Plumbing, and HVAC Completed";
    }
    else if($row['site_status']==26){
      echo "Pay the amount for Landscaping and Exterior Work";
    }
    else if($row['site_status']==27){
      echo "Payment Successfull";
    }
    else if($row['site_status']==28){
      echo "Landscaping and Exterior Work Completed";
    }
    else if($row['site_status']==29){
      echo "Pay the amount for Cleaning and Punch List";
    }
    else if($row['site_status']==30){
      echo "Payment Successfull";
    }
    else if($row['site_status']==31){
      echo "Cleaning and Punch List Completed";
    }
    else if($row['site_status']==32){
      echo "Pay for rest";
    }
    else if($row['site_status']==33){
      echo "Payment Successfull";
    }
    else if($row['site_status']==34){
      echo "Work is Completed";
    }
    else if($row['site_status']==35){
      echo "Work is Completed";
    }
      $selSUp="select * from tbl_supervisor where supervisor_id=".$row['supervisor_id'];
      $resSup=$conn->query($selSUp);
      if($dataSup=$resSup->fetch_assoc()){
        echo "<br>Name: ".$dataSup['supervisor_name'];
        echo "<br>Contact: ".$dataSup['supervisor_contact'];
      }

		   ?>
		    
      </td>
      <td>
     
      <?php
	  if($row['site_status']==4)
    {
	  ?>
      <a href="MySite.php?did=<?php echo $row['site_id']?>">Accept</a>
      <a href="MySite.php?dido=<?php echo $row['site_id']?>">Reject</a>
      <?php
    }
	  ?>
      </td>
      <td>
      <a href="Update.php?dide=<?php echo $row['site_id']?>">DAILY UPDATES</a><br>
  </td>
      <td>
      <?php
    $selQryp="select * from tbl_payment where payment_status=0 and site_id=".$row['site_id'];
    $resp=$conn->query($selQryp);
    if($row['site_status']==5)
    {
      echo "Payment will be Enabled Soon...";
    }
    if($row['site_status']==8)
    {
      echo "Payment Recieved";
    }
    
    if($row['site_status']==7)
      {
        $rowp=$resp->fetch_assoc();
	echo " <br> Amount To Be Paid :".$rowp['payment_amount'];
	echo " <br> Due Date :".$rowp['payment_duedate'];
      ?>
        <a href="Payment.php?pid=<?php echo $rowp['payment_id']?>&st=8&pt=1&sid=<?php echo $row['site_id']?>">Pay Now</a> 
	<?php
      }
      if($row['site_status']==11)
      {
        $rowp=$resp->fetch_assoc();
	echo " <br> Amount To Be Paid :".$rowp['payment_amount'];
	echo " <br> Due Date :".$rowp['payment_duedate'];
      ?>
        <a href="Payment.php?pid=<?php echo $rowp['payment_id']?>&st=12&pt=1&sid=<?php echo $row['site_id']?>">Pay Now</a> 
	<?php
      }
      if($row['site_status']==13)
      {
        echo "Payment will be Enabled Soon...";
      }
      if($row['site_status']==14)
      {
        $rowp=$resp->fetch_assoc();
	echo " <br> Amount To Be Paid :".$rowp['payment_amount'];
	echo " <br> Due Date :".$rowp['payment_duedate'];
      ?>
        <a href="Payment.php?pid=<?php echo $rowp['payment_id']?>&st=15&pt=1&sid=<?php echo $row['site_id']?>">Pay Now</a> 
	<?php
      }
      if($row['site_status']==17)
      {
        $rowp=$resp->fetch_assoc();
	echo " <br> Amount To Be Paid :".$rowp['payment_amount'];
	echo " <br> Due Date :".$rowp['payment_duedate'];
      ?>
        <a href="Payment.php?pid=<?php echo $rowp['payment_id']?>&st=18&pt=1&sid=<?php echo $row['site_id']?>">Pay Now</a> 
	<?php
      }
      if($row['site_status']==20)
      {
        $rowp=$resp->fetch_assoc();
	echo " <br> Amount To Be Paid :".$rowp['payment_amount'];
	echo " <br> Due Date :".$rowp['payment_duedate'];
      ?>
        <a href="Payment.php?pid=<?php echo $rowp['payment_id']?>&st=21&pt=1&sid=<?php echo $row['site_id']?>">Pay Now</a> 
	<?php
      }
      if($row['site_status']==23)
      {
        $rowp=$resp->fetch_assoc();
	echo " <br> Amount To Be Paid :".$rowp['payment_amount'];
	echo " <br> Due Date :".$rowp['payment_duedate'];
      ?>
        <a href="Payment.php?pid=<?php echo $rowp['payment_id']?>&st=24&pt=1&sid=<?php echo $row['site_id']?>">Pay Now</a> 
	<?php
      }
      if($row['site_status']==26)
      {
        $rowp=$resp->fetch_assoc();
	echo " <br> Amount To Be Paid :".$rowp['payment_amount'];
	echo " <br> Due Date :".$rowp['payment_duedate'];
      ?>
        <a href="Payment.php?pid=<?php echo $rowp['payment_id']?>&st=27&pt=1&sid=<?php echo $row['site_id']?>">Pay Now</a> 
	<?php
      }
      if($row['site_status']==29)
      {
        $rowp=$resp->fetch_assoc();
	echo " <br> Amount To Be Paid :".$rowp['payment_amount'];
	echo " <br> Due Date :".$rowp['payment_duedate'];
      ?>
        <a href="Payment.php?pid=<?php echo $rowp['payment_id']?>&st=30&pt=1&sid=<?php echo $row['site_id']?>">Pay Now</a> 
	<?php
      }
      if($row['site_status']==31)
      {
        echo "Payment will be Enabled Soon...";
      }
      if($row['site_status']==32)
      {
        $rowp=$resp->fetch_assoc();
	echo " <br> Amount To Be Paid :".$rowp['payment_amount'];
	echo " <br> Due Date :".$rowp['payment_duedate'];
      ?>
        <a href="Payment.php?pid=<?php echo $rowp['payment_id']?>&st=33&pt=1&sid=<?php echo $row['site_id']?>">Pay Now</a> 
	<?php
      }
      if($row['site_status']==34)
      {
      ?>
        <a href="MySite.php?sid=<?php echo $row['site_id']?>&st=35">Finished</a>
	<?php
      }
      ?>
      </td>
    </tr>
    
    <?php
	
	}
	?>
</table> 
</body>
<?php
include("Foot.php");
?>
</html>