<?php
ob_start();
session_start();
include("../Assets/Connection/Connection.php");
if(isset($_GET['sid'])){
  $updQry="update tbl_site set site_status='".$_GET['st']."' where site_id=".$_GET['sid'];
  if($conn->query($updQry)){
    ?>
    <script>
      alert('Updated')
      window.location="MySite.php";
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
  <div class="container">
    <table class="table table-bordered table-responsive" align="center" class="container">
      <thead class="thead-dark">
        <tr>
          <th>SLno</th>
          <th>Site ID</th>
          <th>Site Details</th>
          <th>Landmark</th>
          <th>Location</th>
          <th>Image</th>
          <th>Plotarea</th>
          <th>Site Estimate</th>
          <th>Site Sketchup</th>
          <th>Site Model</th>
          <th>Action</th>
          <th>Stages</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $selQry = "select * from tbl_site u inner join tbl_place p on p.place_id=u.place_id inner join tbl_district d on p.district_id=d.district_id where supervisor_id=" . $_SESSION['sid'];

        $res = $conn->query($selQry);
        $i = 0;
        while ($row = $res->fetch_assoc()) {
          ?>
          <tr>
            <td><?php echo ++$i ?></td>
            <td><?php echo $row['site_id'] ?></td>
            <td><?php echo $row['site_details'] ?></td>
            <td><?php echo $row['site_landmark'] ?></td>
            <td><?php echo $row['district_name'] . ", " . $row['place_name'] ?></td>
            <td><a href="../Assets/Files/Request/Photo/<?php echo $row['site_image'] ?>" class="btn btn-primary" download>Download</a></td>
            <td><?php echo $row['site_plot'] ?></td>
            <td>
              <?php if ($row['site_estimate'] != 0) {
                echo $row['site_estimate'];
              } ?>
            </td>
            <?php if ($row['site_status'] >= 4) { ?>
              <td><a href="../Assets/Files/SketchupGallery/Photo/<?php echo $row['site_sketchup'] ?>" class="btn btn-primary" download>Download</a></td>
              <td><a href="../Assets/Files/SitemodelGallery/Photo/<?php echo $row['site_model'] ?>" class="btn btn-primary" download>Download</a></td>
            <?php
            } else {
              echo "<td></td><td></td>";
            }
            ?>
            <td>
              <a href="Update.php?did=<?php echo $row['site_id'] ?>" class="btn btn-info">Update</a>
              <br>
          </td>
          <td>
              <?php
              if ($row['site_status'] == 9) {
                ?>
                <a href="MySite.php?sid=<?php echo $row['site_id'] ?>&st=10" class="btn btn-success">Site Preparation Completed</a>
                <br>
              <?php
              } else if ($row['site_status'] == 10) {
                echo "Hold the work until payment is complete"; 
              }else if ($row['site_status'] == 11) {
                echo " payment is pending..";
              }
               else if ($row['site_status'] == 12) {
                ?>
                <a href="MySite.php?sid=<?php echo $row['site_id'] ?>&st=13" class="btn btn-success">Foundation Completed</a>
                <br>
              <?php

                } else if ($row['site_status'] == 13) {
                echo "Hold the work until payment is complete"; 
              } 
              else if ($row['site_status'] == 14) {
                echo " payment is pending..";
              }
              else if ($row['site_status'] == 15) {
                ?>
                <a href="MySite.php?sid=<?php echo $row['site_id'] ?>&st=16" class="btn btn-success">Framing Completed</a>
                <br>
              <?php
              } else if ($row['site_status'] == 16) {
                echo "Hold the work until payment is complete"; 
              } 
              else if ($row['site_status'] == 17) {
                echo " payment is pending..";
              }
              else if ($row['site_status'] == 18) {
                ?>
                <a href="MySite.php?sid=<?php echo $row['site_id'] ?>&st=19" class="btn btn-success">Rough Electrical, Plumbing, and HVAC Completed</a>
                <br>
              <?php
              } else if ($row['site_status'] == 19) {
                echo "Hold the work until payment is complete"; 
              } 
              else if ($row['site_status'] == 20) {
                echo " payment is pending..";
      
              } else if ($row['site_status'] == 21) {
                ?>
                <a href="MySite.php?sid=<?php echo $row['site_id'] ?>&st=22" class="btn btn-success">Interior Finishes Completed</a>
                <br>
              <?php
               } else if ($row['site_status'] == 22) {
                echo "Hold the work until payment is complete"; 
              } 
              else if ($row['site_status'] == 23) {
                echo " payment is pending..";
      
              } else if ($row['site_status'] == 24) {
                ?>
                <a href="MySite.php?sid=<?php echo $row['site_id'] ?>&st=25" class="btn btn-success">Final Electrical, Plumbing, and HVAC Completed</a>
                <br>
              <?php
               } else if ($row['site_status'] == 25) {
                echo "Hold the work until payment is complete"; 
              } 
              else if ($row['site_status'] == 26) {
                echo " payment is pending..";
      
              } else if ($row['site_status'] == 27) {
                ?>
                <a href="MySite.php?sid=<?php echo $row['site_id'] ?>&st=28" class="btn btn-success">Landscaping and Exterior Work Completed</a>
                <br>
              <?php
               } else if ($row['site_status'] == 28) {
                echo "Hold the work until payment is complete"; 
              } 
              else if ($row['site_status'] == 29) {
                echo " payment is pending..";
      
              } else if ($row['site_status'] == 30) {
                ?>
                <a href="MySite.php?sid=<?php echo $row['site_id'] ?>&st=31" class="btn btn-success">Cleaning and Punch List Completed</a>
                <br>
              <?php
              } else if ($row['site_status'] == 31) {
                echo "Hold the work until payment is complete"; 
              } 
              else if ($row['site_status'] == 32) {
                echo " payment is pending..";
              } else if ($row['site_status'] == 33) {
                ?>
                <a href="MySite.php?sid=<?php echo $row['site_id'] ?>&st=34" class="btn btn-success">Finished</a>
                <br>
              <?php
              }
              else if ($row['site_status'] == 34) {
                echo " Finished";
              }
              else if ($row['site_status'] == 35) {
                echo " Finished";
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

  <!-- Include Bootstrap JS (optional) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<?php
include("Foot.php");
?>
</html>