<?php
include("Assets/Connection/Connection.php");
ob_start();
include('Head.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Untitled Document</title>
<style>
    body{

        background-color: white;
        position: relative;
        font-family: 'Open Sans', sans-serif;
  font-weight: 600;
  line-height: 1.42em;
  color:black;
  background-color:white;
  background-size:cover;
background-position:center;
background-image:linear-gradient(rgba(0, 128, 0, 0.179),rgba(77, 37, 37, 0.136)),

url("Assets/Templates/Main/img/back1.jpg");

    }
h1{


    display: block;;
    margin-inline-end: 0px;

    visibility: visible;
    animation-delay: 0.7s;
    animation-name: fadeInUp;
    font-size: 50px;
    line-height: 1.5;
    text-align: center;
    color: #fdbe33;
    font-weight: 600;
    margin-bottom: 5px;



}
img{
  
    display: block; /* Makes the image a block-level element */
    margin: 0 ;
    margin-left:300px;
    border: 2px solid #000; /* Add a 2px black border around the image */
    box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.5); /* Add a shadow to the image */

    
}

</style>

</head>
<body>
    <h1>SEE OUR WORKS </h1>
    <div>
        <table >
            <?php
            $selQry = "SELECT * FROM tbl_gallery";
            $res = $conn->query($selQry);
            $i = 0;
            while ($row = $res->fetch_assoc()) {
            ?>
            <tr>
                <td>
                    <br>
                    <img src="Assets/Files/Gallery/Photo/<?php echo $row['gallery_image']?>" height="500" width="900"/>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
        <?php
include('Foot.php');
ob_flush();
?>

 </html>