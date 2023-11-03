<?php
session_start();
include("../Assets/Connection/Connection.php");
?>
<?php
include("Head.php");
if(isset($_GET['sid'])){
	$updQry="update tbl_site set site_status='".$_GET['st']."' where site_id=".$_GET['sid'];
	if($conn->query($updQry)){
	  ?>
	  <script>
		alert('Updated')
		</script>
		<?php
	}
  }
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
  font-weight: 300;
  line-height: 1.42em;
  color:black;
  background-color:white;
  background-size:cover;
background-position:center;
background-image:linear-gradient(rgba(0, 128, 0, 0.179),rgba(77, 37, 37, 0.136)),

url("../Assets/Templates/Main/img/back1.jpg");
  
}
 table {
    width: 100%;
    border-collapse: collapse; /* Merge cell borders */
    border: 30px solid rgb(20,92,37,0.2); /* Main border for the table */
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
      border: 1px solid rgb(20,92,37,0.9);
}

th {
    background-color:rgb(20,92,37,0.9);
    color: #fff;
}

tr:nth-child(even) {
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


    </style>
</head>

<body>
<form method="post">
<table width="200" border="1">
    <tr>
      <td>SLno</td>
      <td>Site Details</td>
      <td>Landmark</td>
      <td>Location</td>
      <td>Image</td>
      <td>Plotarea</td>
      <td>User Name</td>
      <td>Status</td>
      <td>Action</td>
    </tr>
    <?php
	$selQry="select * from tbl_site s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district d on p.district_id=d.district_id inner join tbl_user u on u.user_id=s.user_id where site_status>0 and engineer_id=".$_SESSION['eid'];
	$res=$conn->query($selQry);
	$i=0;
	while($row=$res->fetch_assoc())
	{
		?>
    <tr>
      <td><?php echo ++$i ?></td>
      <td><?php echo $row['site_details'] ?></td>
      <td><?php echo $row['site_landmark'] ?></td>
      <td><?php echo $row['district_name'] ,"   ", $row['place_name'] ?></td>
      <td>
	  <a href="../Assets/Files/Request/Photo/<?php echo $row['site_image']?>" target="_blank">View Photo</a>
	  </td>
      <td><?php echo $row['site_plot'] ?></td>
      <td><?php echo $row['user_name'] ?></td>
      <td>
	  <?php
	  
	   if($row['site_status']==1)
	   {
		   echo "Work Approved";
	   }
	   elseif($row['site_status']==3)
	   {
		   echo "Upload Sketch and model";
	   }
	   
	    elseif($row['site_status']==4)
	   {
		   echo "User Decision pending";
	   }
	    elseif($row['site_status']==5)
	   { 
		   echo "User Accepted the Sketch and Model";
	   }
	    elseif($row['site_status']==6)
	   {
		   echo "User Rejected the Sketch and Model";
		   echo "<br>Reconsideration Required";
	   }
	   elseif($row['site_status']==7)
	   {
		   echo "Payment Pending";
	   }
	   elseif($row['site_status']==8)
	   {
		   echo "Payment Done";
	   }
	    elseif($row['site_status']==9)
	   {
		   echo "Supervisor Assigned";
		   echo "<br>Work Started";
	   }
	   elseif($row['site_status']>9 && $row['site_status']<=33)
	   {
		   echo "Work in Progress";
	   }
	    if($row['site_status']==34)
	   {
		   echo "Supervisor Finished Work";
	   }
	   if($row['site_status']==35)
	   {
		   echo "Contract has been completed";
	   } 
	   ?></td>
      <td>
		<?php
			if($row['site_status']==3 || $row['site_status']==6){
				?>
     <a href="EngineerReq.php?sid=<?php echo $row['site_id']?>">Engineer Requirements </a>
				<?php
			}
			if($row['site_status']==34){
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
    </form>
</body>
<?php
include("Foot.php");
?>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
function assignEng(sid){
	
	var eid = document.getElementById('selEng').value;
	alert(sid)
	$.ajax({
		 url:"../Assets/AjaxPages/AjaxAssignEng.php?eid="+eid+"&&sid="+sid,
		 success: function(html){
			 alert(html)
		 }
	 })
}
</script>
</html>