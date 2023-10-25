<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
$selQry = "select * from tbl_site s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district d on p.district_id=d.district_id inner join tbl_user u on u.user_id=s.user_id where site_id= ".$_GET['sid'];
$res = $conn->query($selQry);
$row = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="property-photo.jpg" alt="Property Photo" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Owner Name</h5>
                        <p class="card-text"><strong>Site Details:</strong> Site Details</p>
                        <p class="card-text"><strong>Location:</strong> Location</p>
                        <p class="card-text"><strong>Landmark:</strong> Landmark</p>
                        <p class="card-text"><strong>Plot Area:</strong> Plot Area</p>
                        <p class="card-text"><strong>Contact:</strong> Contact Information</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
include('Foot.php');
ob_flush();
?>
</html>