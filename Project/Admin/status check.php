<?php
include("../Assets/Connection/Connection.php");
ob_start();
include('Head.php');
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
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SLno</th>
                <th>Site Details</th>
                <th>Landmark</th>
                <th>Location</th>
                <th>Image</th>
                <th>Plotarea</th>
                <th>User Name</th>
                <th>Engineer</th>
                <th>Supervisor</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody> 
            <?php
            $selQry = "select * from tbl_site s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district d on p.district_id=d.district_id inner join tbl_user u on u.user_id=s.user_id where site_status>0 ";
            $res = $conn->query($selQry);
            $i = 0;
            while ($row = $res->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo ++$i ?></td>
                    <td><?php echo $row['site_details'] ?></td>
                    <td><?php echo $row['site_landmark'] ?></td>
                    <td><?php echo $row['district_name'] . ", " . $row['place_name'] ?></td>
                    <td>
                    <a href="../Assets/Files/Request/Photo/<?php echo $row['site_image']?>" target="_blank">View Photo</a></td>
                    <td><?php echo $row['site_plot'] ?></td>
                    <td><?php echo $row['user_name'] ?></td>
                    <td>
                        <?php
                        if ($row['site_status'] >= 3) {
                            $gry = "select * from tbl_engineer where engineer_id=" . $row['engineer_id'];
                            $res3 = $conn->query($gry);
                            $row2 = $res3->fetch_assoc();
                            echo $row2['engineer_name'];
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($row['site_status'] > 8) {
                            $gryo = "select * from tbl_supervisor where supervisor_id=" . $row['supervisor_id'];
                            $reso3 = $conn->query($gryo);
                            $rowo2 = $reso3->fetch_assoc();
                            echo $rowo2['supervisor_name'];
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($row['site_status'] == 1) {
                            echo "<br>Work Approved<br>"; 
                        } else if ($row['site_status'] == 2) {
                            echo "Work Declined";
                        }
                        if ($row['site_status'] == 3) {
                            echo "Engineer Assigned";
                        }
                        if ($row['site_status'] == 4) {
                            echo "Sketch and Model Pending.. ";
                        }
                        if ($row['site_status'] == 5) {
                            echo " User Accepted Sketch and Model<br> Payment Pending";
                        }
                        if ($row['site_status'] == 6) {
                            echo " User Rejected Sketch and Model";
                        }
                        if ($row['site_status'] == 7) {
                            echo "Payment Request Send";
                        }
                        if ($row['site_status'] == 8) {
                            echo "Payment Complete. Assign SUpervisor";
                        }
                        if ($row['site_status'] == 10) {
                            echo "Site Preparation COmpleted";
                        }
                        if ($row['site_status'] == 11) {
                            echo "Payment Request Send";
                        }
                        if ($row['site_status'] == 12) {
                            echo "Payment Complete";
                        }
                        if ($row['site_status'] == 13) {
                            echo "Foundation Completed";
                        }
                        if ($row['site_status'] == 14) {
                            echo "Payment Request Send";
                        }
                        if ($row['site_status'] == 15) {
                            echo "Payment Complete";
                        }
                        if ($row['site_status'] == 16) {
                            echo "Framimng Completed";
                        }
                        if ($row['site_status'] == 18) {
                            echo "Payment Complete";
                        }
                        if ($row['site_status'] == 19) {
                            echo "Rough Electrical, Plumbing, and HVAC
                            Completed";
                        }
                        if ($row['site_status'] == 21) {
                            echo "Payment Complete";
                        }
                        if ($row['site_status'] == 22) {
                            echo "Interior Finishes
                            Completed";
                        }
                        if ($row['site_status'] == 24) {
                            echo "Payment Complete";
                        }
                        if ($row['site_status'] == 25) {
                            echo "Final Electrical, Plumbing, and HVAC
                            Completed";
                        }
                        if ($row['site_status'] == 27) {
                            echo "Payment Complete";
                        }
                        if ($row['site_status'] == 28) {
                            echo "Landscaping and Exterior Work
                            Completed";
                        }
                        if ($row['site_status'] == 30) {
                            echo "Payment Complete";
                        }
                        if ($row['site_status'] == 31) {
                            echo "Final Electrical, Plumbing, and HVAC
                            Completed";
                        }
                        if ($row['site_status'] == 33) {
                            echo "Payment Complete";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        if ($row['site_status'] == 1) {
                            $selQRy1 = "select * from tbl_engineer";
                            $res1 = $conn->query($selQRy1);
                            $i = 0;
                            ?>
                            <select name="selEng" id="selEng">
                                <option valu
                                e="">Select Engineer</option>
                                <?php
                                while ($row1 = $res1->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $row1['engineer_id'] ?>"><?php echo $row1['engineer_name'] ?></option>
                                    <?php
                                }
                                ?>
                            </select><br><br>
                            <button type="button" onclick="assignEng(<?php echo $row['site_id'] ?>)">Assign</button>
                            <?php
                        }
                        if ($row['site_status'] == 5) {
                            ?>
                            <a href="PaymentReq.php?dida=<?php echo $row['site_id'] ?>&st=7">Payment Request</a>
                            
                            <?php
                        }
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
                                    <option value="<?php echo $row2['supervisor_id'] ?>"><?php echo $row2['supervisor_name'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <button type="button" onclick="assignSup(<?php echo $row['site_id'] ?>)">Assign</button>
                            <?php
                        }
                        if ($row['site_status'] == 10) {
                            ?>
                            <a href="PaymentReq.php?dida=<?php echo $row['site_id'] ?>&st=11">Payment Request</a>
                            <?php
                        }
                        if ($row['site_status'] == 13) {
                            ?>
                            <a href="PaymentReq.php?dida=<?php echo $row['site_id'] ?>&st=14">Payment Request</a>
                            <?php
                        }
                        if ($row['site_status'] == 16) {
                            ?>
                            <a href="PaymentReq.php?dida=<?php echo $row['site_id'] ?>&st=17">Payment Request</a>
                            <?php
                        }
                        if ($row['site_status'] == 19) {
                            ?>
                            <a href="PaymentReq.php?dida=<?php echo $row['site_id'] ?>&st=20">Payment Request</a>
                            <?php
                        }
                        if ($row['site_status'] == 22) {
                            ?>
                            <a href="PaymentReq.php?dida=<?php echo $row['site_id'] ?>&st=23">Payment Request</a>
                            <?php
                        }
                        if ($row['site_status'] == 25) {
                            ?>
                            <a href="PaymentReq.php?dida=<?php echo $row['site_id'] ?>&st=26">Payment Request</a>
                            <?php
                        }
                        if ($row['site_status'] == 28) {
                            ?>
                            <a href="PaymentReq.php?dida=<?php echo $row['site_id'] ?>&st=29">Payment Request</a>
                            <?php
                        }
                        if ($row['site_status'] == 31) {
                            ?>
                            <a href="PaymentReq.php?dida=<?php echo $row['site_id'] ?>&st=32">Payment Request</a>
                            <?php
                        }
                        if ($row['site_status'] == 35) {
                            ?>
                            <a href="Site.php?sid=<?php echo $row['site_id']?>&st=36">Finished</a>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
</div>