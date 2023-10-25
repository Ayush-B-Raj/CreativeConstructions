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
                    <a href="../Assets/Files/Request/Photo/<?php echo $row['site_image']?>" target="_blank">
                    <img src="../Assets/Files/Request/Photo/<?php echo $row['site_image']?>" alt="Property Photo" class="img-fluid" style="
    object-fit: cover;
    height: 100%;
">
                </a>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $row['user_name'] ?>
                        </h5>
                        <p class="card-text"><strong>Site Details:</strong>
                            <?php echo $row['site_details'] ?>
                        </p>
                        <p class="card-text"><strong>Location:</strong>
                            <?php echo $row['site_landmark'] ?>
                        </p>
                        <p class="card-text"><strong>Landmark:</strong>
                            <?php echo $row['district_name'] . ", " . $row['place_name'] ?>
                        </p>
                        <p class="card-text"><strong>Plot Area:</strong>
                            <?php echo $row['site_plot'] ?>
                        </p>
                        <p class="card-text"><strong>Contact:</strong>
                            <?php echo $row['user_contact'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="row no-gutters">
                    <?php
                        if ($row['site_status'] >= 3) {
                            $gry = "select * from tbl_engineer where engineer_id=" . $row['engineer_id'];
                            $res3 = $conn->query($gry);
                            $row2 = $res3->fetch_assoc();
                        }
                        ?>
                        <div class="col-md-4">
                            <img src="../Assets/Files/Engineer/Photo/<?php echo $row2['engineer_photo'] ?>" alt="Engineer Photo" class="img-fluid" style="
    object-fit: cover;
    height: 100%;
">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php
                            echo $row2['engineer_name'];
                            ?>
                                </h5>
                                <p class="card-text"><strong>Contact:</strong>
                                    <?php
                        if ($row['site_status'] >= 3) {
                            $gry = "select * from tbl_engineer where engineer_id=" . $row['engineer_id'];
                            $res3 = $conn->query($gry);
                            $row2 = $res3->fetch_assoc();
                            echo $row2['engineer_contact'];
                        }
                        ?>
                                </p>

                                <p class="card-text"><strong>Action</strong>
                                    <?php
                        if ($row['site_status'] == 1) {
                            $selQRy1 = "select * from tbl_engineer";
                            $res1 = $conn->query($selQRy1);
                            $i = 0;
                            ?>
                                    <select name="selEng" id="selEng">
                                        <option valu e="">Select Engineer</option>
                                        <?php
                                while ($row1 = $res1->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row1['engineer_id'] ?>">
                                            <?php echo $row1['engineer_name'] ?>
                                        </option>
                                        <?php
                                }
                                ?>
                                    </select><br><br>
                                    <button type="button"
                                        onclick="assignEng(<?php echo $row['site_id'] ?>)">Assign</button>
                                    <?php
                            }
                            ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="row no-gutters">
                    <?php
                        if ($row['site_status'] > 8) {
                            $gryo = "select * from tbl_supervisor where supervisor_id=" . $row['supervisor_id'];
                            $reso3 = $conn->query($gryo);
                            $rowo2 = $reso3->fetch_assoc();
                            
                        }
                        ?>
                        <div class="col-md-4">
                        <img src="../Assets/Files/Supervisor/Photo/<?php echo $rowo2['supervisor_photo'] ?>" alt="Supervisor Photo" class="img-fluid" style="
    object-fit: cover;
    height: 100%;">
                            
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php
                                echo $rowo2['supervisor_name'];
                                    ?>
                                </h5>
                                <p class="card-text"><strong>Contact:</strong>
                                    <?php
                        if ($row['site_status'] > 8) {
                            $gryo = "select * from tbl_supervisor where supervisor_id=" . $row['supervisor_id'];
                            $reso3 = $conn->query($gryo);
                            $rowo2 = $reso3->fetch_assoc();
                            echo $rowo2['supervisor_contact'];
                        }
                        ?>
                                <p class="card-text"><strong>Action</strong>
                                    <?php
                        if ($row['site_status'] == 8) {
                            $selQRy2 = "select * from tbl_supervisor";
                            $res2 = $conn->query($selQRy2);
                            $i = 0;
                            ?>
                                    <select name="selSup" id="selSup">
                                        <option value="">Select Supervisor</option>
                                        <?php
                                while ($row2 = $res2->fetch_assoc()) {
                                    ?>
                                        <option value="<?php echo $row2['supervisor_id'] ?>">
                                            <?php echo $row2['supervisor_name'] ?>
                                        </option>
                                        <?php
                                }
                                ?>
                                    </select>
                                    <button type="button"
                                        onclick="assignSup(<?php echo $row['site_id'] ?>)">Assign</button>
                                    <?php
                        }
                        ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="card">
        <div class="card-body">
            <p class="card-text"><strong>Action</strong>
                <?php if ($row['site_status'] == 5) { ?>
                    <a href="PaymentReq.php?dida=<?php echo $row['site_id'] ?>&st=7" class="btn btn-primary">Payment Request</a>
                <?php } ?>
            </p>
        </div>
    </div> 

</body>
<?php
include('Foot.php');
ob_flush();
?>

</html>