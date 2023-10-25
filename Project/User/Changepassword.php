<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
session_start();
if(isset($_POST['btn_update']))
{
    $selQry = "select * from tbl_user where user_id=" . $_SESSION['uid'];
    $res = $conn->query($selQry);
    $row = $res->fetch_assoc();
    
    $OLD=$_POST['txt_oldpass'];
    $NEW=$_POST['txt_newpass'];
    $CRM=$_POST['txt_confirmpass'];
    if($row['user_password']==$OLD){
      
       if($NEW==$CRM){
      
        $insQR="update tbl_user set user_password='$NEW' where user_id='". $_SESSION['uid']."'";
        $res = $conn->query($insQR);


       
       }
       else{
        echo "Invalid New Password";
       }
	     }
       else{
        echo "Invalid current Password";
       }


    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
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
table {
        margin: 0 auto; /* Auto margins horizontally center the element */
    }

    </style>

</head>

<body>
  <div class="container">
    <form id="form1" name="form1" method="post" action="">
      <div class="form-group">
        <label for="txt_oldpass">OLD PASSWORD</label>
        <input type="password" class="form-control" name="txt_oldpass" id="txt_oldpass" required="required" pattern="(?=.\d)(?=.[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
      </div>
      <div class="form-group">
        <label for="txt_newpass">NEW PASSWORD</label>
        <input type="password" class="form-control" name="txt_newpass" id="txt_newpass" required="required" pattern="(?=.\d)(?=.[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
      </div>
      <div class="form-group">
        <label for="txt_confirmpass">CONFIRM PASSWORD</label>
        <input type="password" class="form-control" name="txt_confirmpass" id="txt_confirmpass">
      </div>
      <button type="submit" class="btn btn-primary" name="btn_update" id="btn_update">UPDATE</button>
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