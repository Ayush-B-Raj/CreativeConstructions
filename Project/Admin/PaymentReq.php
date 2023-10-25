<?php
session_start();
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
    $ten=0.10;
    $selQry="select * from tbl_site where site_id=".$_GET['dida'];
	$res=$conn->query($selQry);
	$ro=$res->fetch_assoc();
    $costest=$ro['site_estimate'];
	$tenPercent = ($costest* $ten);
    $selQryP="select sum(payment_amount) as payedTotal from tbl_payment where site_id=".$_GET['dida'];
$resP=$conn->query($selQryP);
$row=$resP->fetch_assoc();
if($row['payedTotal']!=NULL){
    $costest=$row['payedTotal'];
}	
	$amount=($costest - $tenPercent);
	echo "<br> Total Estimate Of the Site :".$costest;
	echo " <br> Amount To Be Paid :".$tenPercent;
	
	
  if(isset($_POST['btn_submit']))
  {

	$duedate=$_POST['txt_lastdate'];
	$insQry="insert into tbl_payment(payment_duedate,site_id,payment_amount,payment_left) values('".$duedate."','".$_GET['dida']."','".$tenPercent."','".$amount."')";
	if($conn->query($insQry)){
        $updQry="update tbl_site set site_status='".$_GET['st']."' where site_id=".$_GET['dida'];
        $conn->query($updQry);
        header('location:Site.php');
    }
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
    <div class="container mt-5">
        <form id="form1" name="form1" method="post" action="">
            <table class="table table-bordered">
                <tr>
                    <td width="99">Due Date</td>
                    <td width="187">
                        <input type="date" class="form-control" name="txt_lastdate" id="txt_lastdate" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit" value="Submit" />
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <!-- Include Bootstrap JavaScript and Popper.js (required for some Bootstrap features) from a CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>