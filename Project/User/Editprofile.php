<?php
session_start();
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');

if(isset($_POST['btn_save']))
{

$cname=$_POST['txt_name'];
$ccontact=$_POST['txt_contact'];
$cmail=$_POST['txt_mail'];
$caddress=$_POST['txt_address'];
$selQryw="update tbl_user set user_name='$cname', user_contact='$ccontact',user_email='$cmail', user_address='$caddress' where user_id=" .$_SESSION['uid'];

$conn->query($selQryw);
}

$selQry = "select * from tbl_user where user_id=".$_SESSION['uid'];
$res = $conn->query($selQry);
$row = $res->fetch_assoc();

?>

<!DOCTYPE html>
<head>
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
 
}
.container {
	  text-align: left;
	  overflow: hidden;
	  width: 80%;
	  margin: 0 auto;
  display: table;
  
}




.container td:hover {

  font-weight: bold;
  

  
  transition-delay: 0s;
	  transition-duration: 0.4s;
}




th, td {
    padding: 8px;
    text-align: center;
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
  
    text-align: center;
    border-radius: 5px;
    margin-right: 5px;
}


table{
        margin: 0 auto; /* Auto margins horizontally center the element */
    }

    </style>
</head>
<body>
  <div class="1container">
    <form name="form1" method="post" action="">
      <table class="container1">
        <tr>
          <td width="232">CHANGE NAME</td>
          <td width="210">
            <input type="text" class="form-control" name="txt_name" required="required" id="txt_changename" value="<?php echo $row['user_name']?>">
          </td>
        </tr>
        <tr>
          <td>CHANGE CONTACT</td>
          <td>
            <input type="text" class="form-control" name="txt_contact" required="required" id="txt_changecontact" value="<?php echo $row['user_contact']?>">
          </td>
        </tr>
        <tr>
          <td>CHANGE EMAIL</td>
          <td>
            <input type="email" class="form-control" name="txt_mail" required="required" id="txt_changeemail" value="<?php echo $row['user_email']?>">
          </td>
        </tr>
        <tr>
          <td>CHANGE ADDRESS</td>
          <td>
            <input type="text" class="form-control" name="txt_address" required="required" id="txt_changeaddress" value="<?php echo $row['user_address']?>">
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" class="btn btn-primary" name="btn_save" id="btn_save" value="SAVE">
          </td>
        </tr>
      </table>
    </form>
  </div>

  <!-- Include Bootstrap JS (optional) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php
include('Foot.php');
ob_flush();
?>

</html>