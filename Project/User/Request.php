<?php
session_start();
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
if(isset($_POST['txt_submit']))
{
	$sitedetails=$_POST['txt_sitedetails'];
	$sitelandmark=$_POST['txt_landmark'];
	$userplaceid=$_POST['txt_place'];
	$userphoto=$_FILES['ins_photo']['name'];
    $tempphoto=$_FILES['ins_photo']['tmp_name'];
	$plotarea=$_POST['txt_plot'];
	move_uploaded_file($tempphoto,'../Assets/Files/Request/Photo/'.$userphoto);
	$insQry="insert into tbl_site(site_details,site_landmark,place_id,site_image,site_plot,user_id,request_date) values('".$sitedetails."','".$sitelandmark."','".$userplaceid."','".$userphoto."','".$plotarea."','".$_SESSION['uid']."',curdate())";
	
	if($conn->query($insQry))
	{
    ?>
    <script>
    alert("Updated")
    window.location="MySite.php"
    </script>
    <?php
	}
	else
	{
    ?>
    <script>
    alert("Failed")
    window.location="Request.php"
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
  font-weight: 600;
  line-height: 1.42em;
  color:black;
  background-color:white;
  background-size:cover;
background-position:center;
background-image:linear-gradient(rgba(0, 128, 0, 0.179),rgba(77, 37, 37, 0.136)),

url("../Assets/Templates/Main/img/back1.jpg");
  
}
 .table {
    width: 60%;
    border-collapse: collapse; /* Merge cell borders */
    border: 5px solid rgb(0,77,18); /* Main border for the table */
   /* Add a subtle shadow */
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
table {
        margin: 0 auto; /* Auto margins horizontally center the element */
    }

    </style>





</head>

<body>
  <div class="contain56er">
    <form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
      <table class="table table-bordered">
        <tr>
          <th>Site Details</th>
          <td>
            <textarea class="form-control" name="txt_sitedetails" id="txt_sitedetails" cols="45" rows="5" required="required"></textarea>
          </td>
        </tr>
        <tr>
          <th>Landmark</th>
          <td>
            <input type="text" class="form-control" name="txt_landmark" id="txt_landmark" required="required" autocomplete="off" />
          </td>
        </tr>
        <tr>
          <th>District</th>
          <td>
            <select class="form-control" name="txt_district" id="txt_district" onchange="getPlace(this.value)" required>
              <option value="">SELECT DISTRICT</option>
              <?php
              $selQry = "select * from tbl_district";
              $res = $conn->query($selQry);
              while ($row = $res->fetch_assoc()) {
              ?>
                <option value="<?php echo $row['district_id'] ?>"><?php echo $row['district_name'] ?></option>
              <?php
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <th>Place</th>
          <td>
            <select class="form-control" name="txt_place" id="txt_place">
              <option value="">---SELECT PLACE---</option>
            </select>
          </td>
        </tr>
        <tr>
          <th>Image</th>
          <td>
            <input type="file" class="form-control-file" name="ins_photo" id="ins_photo" required="required" />
          </td>
        </tr>
        <tr>
          <th>Plot Area</th>
          <td>
            <input type="text" class="form-control" name="txt_plot" id="txt_plot" required="required" autocomplete="off" />
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" class="btn btn-primary" name="txt_submit" id="txt_submit" value="Submit" />
          </td>
        </tr>
      </table>
    </form>
  </div>

  <!-- Include Bootstrap JS (optional) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../Assets/JQ/jQuery.js"></script>
  <script>
    function getPlace(did) {
      $.ajax({
        url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
        success: function(html) {
          $("#txt_place").html(html);
        }
      })
    }
  </script>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>