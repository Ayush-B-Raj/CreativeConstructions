<?php
include('../Assets/Connection/Connection.php');
if(isset($_POST["btn_submit"]))
{
	$name 	 = $_POST["txt_name"];
	$contact = $_POST["txt_contact"];
	
	
	$uphoto=$_FILES["file_photo"]['name'];
	$temp=$_FILES['file_photo']['tmp_name'];
	move_uploaded_file($temp,"../Assets/Files/User/Photo/".$uphoto);
	
	$address = $_POST["txt_address"];
	$placeid = $_POST["sel_place"];
    $gender = $_POST["sel_gender"];
   
	$email   = $_POST["txt_email"];
	
	$password = $_POST["txt_password"];

    $selAdmin="select * from tbl_admin where admin_email='".$email."' ";
	$selUser="select * from tbl_user where user_email='".$email."' ";
	$selEngineer="select * from tbl_engineer where engineer_email='".$email."' ";
	$selSupervisor="select * from tbl_supervisor where supervisor_email='".$email."'";
	$resAdmin=$conn->query($selAdmin);
	$resUser=$conn->query($selUser);
	$resEngineer=$conn->query($selEngineer);
	$resSupervisor=$conn->query($selSupervisor);

    if($resAdmin->num_rows>0 ||$resUser->num_rows>0 ||$resEngineer->num_rows>0 ||$resSupervisor->num_rows>0 || )
    {
        ?>
        <script>
                alert("Email Already Exist!!!!");
        </script>
        <?php
    }
	else{
	
	$ins = "insert into tbl_user(user_name,user_contact,user_photo,user_address,user_gender,place_id,user_email,user_password)
	values('".$name."','".$contact."','".$uphoto."','".$address."','".$gender."','".$placeid."','".$email."','".$password."')";
	
	if($conn->query($ins))
	{
		?>
         <script type="text/javascript">
            alert("Registration Completed You Can Login Now");
            setTimeout(function(){window.location.href='Login.php'},40);
        </script>
        <?php
	}
	else
	{
		echo "<script>alert('Failed')</script>";
		echo $ins;
		
	}
	}
}


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Builderz - Construction Company Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Construction Company Website Template" name="keywords">
        <meta content="Construction Company Website Template" name="description">

        <!-- Favicon -->
        <link href="../Assets/Templates/Main/img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="../Assets/Templates/Main/lib/flaticon/font/flaticon.css" rel="stylesheet"> 
        <link href="../Assets/Templates/Main/lib/animate/animate.min.css" rel="stylesheet">
        <link href="../Assets/Templates/Main/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="../Assets/Templates/Main/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="../Assets/Templates/Main/lib/slick/slick.css" rel="stylesheet">
        <link href="../Assets/Templates/Main/lib/slick/slick-theme.css" rel="stylesheet">
        <link href="../Assets/Templates/Main/css/style.css" rel="stylesheet">
    </head>

    <body>
        <div class="wrapper">
            <!-- Top Bar Start -->
            <div class="top-bar">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-12">
                            <div class="logo">
                                <a href="../Assets/Templates/Main/index.html">
                                <h2 style="font-weight:900">CREATIVE CONSTRUCTIONS</h2>
                                    <!-- <img src="../Assets/Templates/Main/img/logo.jpg" alt="Logo"> -->
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7 d-none d-lg-block">
                            <div class="row">
                                <div class="col-2">
                                    <div class="top-bar-item">
                                        <div class="top-bar-icon">
                                        <i class="flaticon-calendar"></i> 
                                        </div>
                                        <div class="top-bar-text">
                                            <h3 style="font-weight:700;font-size: 20px;">Opening Hour</h3>
                                            <p><h3 style="font-weight:300;font-size: 14px;">24 * 7</h3></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="top-bar-item">
                                        <div class="top-bar-icon">
                                            <i class="flaticon-call"></i>
                                        </div>
                                        <div class="top-bar-text">
                                            <h3 style="font-weight:700;font-size: 20px;">Call Us</h3>
                                            <p><h3 style="font-weight:300;font-size: 14px;">+91 9876543221</h3></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="top-bar-item">
                                        <div class="top-bar-icon">
                                            <i class="flaticon-send-mail"></i>
                                        </div>
                                        <div class="top-bar-text">
                                            <h3 style="font-weight:700;font-size: 20px;">Email Us</h3>
                                            <p><h3 style="font-weight:300;font-size: 14px;">creativeconstructions1995@gmail.com</h3></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->

            <!-- Nav Bar Start -->
            <div class="nav-bar">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                            <div class="ml-auto">
                                <a class="btn" href="Login.php">Sign In</a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- Nav Bar End -->
            

            <!-- Contact Start -->
            <div class="contact wow fadeInUp">
                <div class="container">
                    <div class="section-header text-center">
                        <p>Registration</p>
                        <h2>User</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-info">
                               
                               <!-- Testimonial Start -->
            <div class="testimonial wow fadeIn" data-wow-delay="0.1s">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                             <div class="testimonial-slider-nav">
                                <div class="slider-nav"><img src="../Assets/Templates/Main/img/testimonial-1.png" alt="Testimonial"></div>
                                <div class="slider-nav"><img src="../Assets/Templates/Main/img/testimonial-2.png" alt="Testimonial"></div>
                                <div class="slider-nav"><img src="../Assets/Templates/Main/img/testimonial-3.png" alt="Testimonial"></div>
                                <div class="slider-nav"><img src="../Assets/Templates/Main/img/testimonial-4.png" alt="Testimonial"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="testimonial-slider">
                                <div class="slider-item">
                                    <h3>Kurian C Able</h3>
                                    <h4>Professional Photographer</h4>
                                    <p>It's one of the trusted builder I have ever seen in Kerala with a professional support and very good staffs especially project handling team .Also they ensure to complete the projects as committed.Tension free experience</p>
                                </div>
                                <div class="slider-item">
                                    <h3>Krishnan G</h3>
                                    <h4>CEO Cozmek</h4>
                                    <p>Everyone will have a dream. But it may not be always possible for them to achieve it. But my dream made true by these guys ... Heartfelt thanks </p>
                                </div>
                                <div class="slider-item">
                                    <h3>Adithya Krishnan</h3>
                                    <h4>Guitarist</h4>
                                    <p>Good and quality work .I recommend and suggest everybody that u can trust this company</p>
                                </div>
                                <div class="slider-item">
                                    <h3>Eldhose PU</h3>
                                    <h4>Professor</h4>
                                    <p>Nice work. The entire team works with customers satisfaction.
                       Team have hard work, co operative mentality..</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonial End -->
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-form">
                                <div id="success"></div>
                                <form method="post" enctype="multipart/form-data" autocomplete="off">
                                    <div class="control-group">
                                        <input type="text" name="txt_name" class="form-control" id="name" placeholder="Your Name" required data-validation-required-message="Please enter your name" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group">
                                        <input type="tel" pattern="^\d{10}$" name="txt_contact" class="form-control" id="contact" placeholder="Your Contact" required data-validation-required-message="Please enter your contact" />
                                        <p class="help-block text-danger"></p> 
                                    </div>
                                    <div class="control-group">
    <input type="email" name="txt_email" class="form-control" id="email" placeholder="Your Email" required data-validation-required-message="Please enter your email" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group">
                                        <input type="file" name="file_photo"  class="form-control" id="file_photo" required data-validation-required-message="Please select Your Photo" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group">
                                        <textarea class="form-control" name="txt_address" id="message" placeholder="Address" required data-validation-required-message="Please enter your Address"></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group">
                                    <select class="form-control" style="background-color: transparent" required data-validation-required-message="Please select your Gender" name="sel_gender" id="sel_gender">
        <option value="" style="text-align: center">Select Gender</option>
        <option style="text-align: center" value="Male">Male</option>
        <option style="text-align: center" value="Female">Female</option>
        <option style="text-align: center" value="Other">Other</option>
    </select>
                        <p class="help-block text-danger"></p>
                                    </div>
                                     <div class="control-group">
                                        <select class="form-control" style="background-color:transparent" required data-validation-required-message="Please enter your District"  name="sel_district" id="sel_district" onchange="getPlace(this.value)">
                                             <option value="" style="text-align:center">Select District</option>
                                             <?php
                                                  $sel ="select * from tbl_district ";
                                          $row = $conn->query($sel);
                                          while($data = $row->fetch_assoc())
                                          {
                                         ?>
                                             <option style="text-align:center" value="<?php echo $data['district_id'];?>" 
                                              ><?php echo $data['district_name']; ?></option >
                                             
                                             <?php
                                             }
                                             ?>
                                            </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                     <div class="control-group">
                                        <select class="form-control" style="background-color:transparent" required data-validation-required-message="Please enter your Place"  name="sel_place" id="sel_place">
                                             <option value="" style="text-align:center">Select Place</option>
                                             
                                            </select>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    
                                     <div class="control-group">
    <input type="password" name="txt_password"  class="form-control" id="password" placeholder="Your Password" required data-validation-required-message="Please enter your Password" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div>
                                        <input type="submit" class="btn" name="btn_submit"  value="Submit"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact End -->


            <!-- Footer Start -->
            <div class="footer wow fadeIn" data-wow-delay="0.3s">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="footer-contact">
                                <h2>Office Contact</h2>
                                <p><i class="fa fa-map-marker-alt"></i>123 Street, New York, USA</p>
                                <p><i class="fa fa-phone-alt"></i>+012 345 67890</p>
                                <p><i class="fa fa-envelope"></i>creativeconstructions1995@gmail.com</p>
                                <div class="footer-social">
                                    <a href="../Assets/Templates/Main/"><i class="fab fa-twitter"></i></a>
                                    <a href="../Assets/Templates/Main/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="../Assets/Templates/Main/"><i class="fab fa-youtube"></i></a>
                                    <a href="../Assets/Templates/Main/"><i class="fab fa-instagram"></i></a>
                                    <a href="../Assets/Templates/Main/"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-link">
                                <h2>Services Areas</h2>
                                <a >Building Construction</a>
                                <a >House Renovation</a>
                                <a >Architecture Design</a>
                                <a >Interior Design</a>
                                <a >Painting</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-link">
                                <h2>Useful Pages</h2>
                                <a >About Us</a>
                                <a >Contact Us</a>
                                <a >Our Team</a>
                                <a >Projects</a>
                                
                                </div>
                        </div>
                        <!--<div class="col-md-6 col-lg-3">
                            <div class="newsletter">
                                <h2>Newsletter</h2>
                                <p>
                                    Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulpu
                                </p>
                                <div class="form">
                                    <input class="form-control" placeholder="Email here">
                                    <button class="btn">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
                <div class="container footer-menu">
                    <div class="f-menu">
                        <a href="">Terms of use</a>
                        <a href="">Privacy policy</a>
                       
                        <a href="">Help</a>
                        <a href="">FQAs</a>
                    </div>
                </div>
                <div class="container copyright">
                    <div class="row">
                        <div class="col-md-6">
                            <p>&copy; All Right Reserved.</p>
                        </div>
                        <div class="col-md-6">
                            <p>CreativeconstructionsOfficial</a></p>
                        </div>
                    </div>
                </div>
            
            <!-- Footer End -->

            <a href="../Assets/Templates/Main/#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        </div>
<script src="../Jq/jquery.js"></script>
<script>
function getPlace(did)
{


	$.ajax({
	url: "../Assets/AjaxPages/AjaxPlace.php?did="+did,
	  success: function(result){
		$("#sel_place").html(result);
	  }
	});
}
</script>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="../Assets/Templates/Main/lib/easing/easing.min.js"></script>
        <script src="../Assets/Templates/Main/lib/wow/wow.min.js"></script>
        <script src="../Assets/Templates/Main/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="../Assets/Templates/Main/lib/isotope/isotope.pkgd.min.js"></script>
        <script src="../Assets/Templates/Main/lib/lightbox/js/lightbox.min.js"></script>
        <script src="../Assets/Templates/Main/lib/waypoints/waypoints.min.js"></script>
        <script src="../Assets/Templates/Main/lib/counterup/counterup.min.js"></script>
        <script src="../Assets/Templates/Main/lib/slick/slick.min.js"></script>
        
        <!-- Contact Javascript File -->
        <script src="../Assets/Templates/Main/mail/jqBootstrapValidation.min.js"></script>
        <script src="../Assets/Templates/Main/mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="../Assets/Templates/Main/js/main.js"></script>
    </body>
</html>
