<?php session_start() ?>

<?php
    include('config/database.php');
?>

<?php
  /*  if(isset($_POST["login"])){
        $connect=makeconnection();
        $s="insert into users(Username,Password,Typeofuser) values('" . $_POST["Username"] ."','" . $_POST["Password"] ."','" . $_POST["Typeofuser"] ."')";
        //$s="INSERT INTO `users`(`Username`, `Password`, `Typeofuser`) VALUES ($Username,$Password,$Typeofuser)";
        mysqli_query($connect,$s);

	    echo "<script>alert('Record Save');</script>";
    }
    else{
        echo "<script>alert('Invalid User Name or Password')</script>";
    }*/
?>
<?php
/*
    if(isset($_POST["Submit"])){
        $connect=makeconnection();

        //$s="insert into category(Cat_name) values('" . $_POST["t1"] ."')";
        $s="insert into contact(Email,Password) VALUES ('" . $_POST["Email"] ."','" . $_POST["Password"] ."')";
        mysqli_query($connect,$s);
        echo "<script>alert('Database Footer Record Save');</script>";
    }
    else{
        echo "<script>alert('Databe Footer Not Saved')</script>";
    }
    */
?>
<?php
$_SESSION['loginstatus']="";
    if(isset($_POST["login"])){
        $connect=makeconnection();
        $s="select * from users where Username='". $_POST["Username"] . "' and Password='" . $_POST["Password"] ."'";
        $q=mysqli_query($connect,$s);
        $r=mysqli_num_rows($q);
        $data=mysqli_fetch_array($q);
        mysqli_close($connect);
        if($r>0){
            $_SESSION['Username']= $_POST['Username'];
            $_SESSION['Password']=$_POST['Password'];
            $_SESSION['usertype']=$data[0];
            $_SESSION['loginstatus']='yes';
            header('location:admin-panel/index.php');
        }
    }   
    else{
        echo '<script>alert("Invalid User Name or Password")</script>';
    }

?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="TravelStar - Tour, Travel, Travel Agency Template">
    <meta name="keywords" content="Tour, Travel, Travel Agency Template">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Wealth Card</title>
    <!-- Google Fonts Includes -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <!-- Favi icon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/images/favicon.ico">
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="css/assets/bootstrap.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="css/assets/animate.css">
    <!-- Button Hover animate css -->
    <link rel="stylesheet" href="css/assets/hover-min.css">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="css/assets/jquery-ui.min.css">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="css/assets/meanmenu.min.css">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="css/assets/owl.carousel.min.css">
    <!-- slick css -->
    <link rel="stylesheet" href="css/assets/slick.css">
    <!-- chosen.min-->
    <link rel="stylesheet" href="css/assets/jquery-customselect.css">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="css/assets/font-awesome.min.css">
    <!-- magnific Css -->
    <link rel="stylesheet" href="css/assets/magnific-popup.css">
    <!-- Revolution Slider -->
    <link rel="stylesheet" href="css/assets/revolution/layers.css">
    <link  rel="stylesheet" href="css/assets/revolution/navigation.css">
    <link rel="stylesheet" href="css/assets/revolution/settings.css">
    <!-- Preloader css -->
    <link rel="stylesheet" href="css/assets/preloader.css"> 
    <!-- custome css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="form.css">
    <!-- modernizr css -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
	<script src="js/multi-select.js"></script>
</head>
<body>

<!-- header area start here -->
<header class="index-2">
    <div class="header_top_area">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="contact_wrapper_top">
                        <ul class="header_top_contact">
                            <li><i class="fa fa-phone" aria-hidden="true"></i>+123-456-7890</li>
                            <li><i class="fa fa-envelope-o" aria-hidden="true"></i>info@yourcompany.com</li>
                        </ul>
                        <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#exampleModal">
                             SignUp
                        </button>


                        <button class="btn btn-success btn-md" data-toggle="modal" data-target="#myModalHorizontal">
                            Login
                        </button>
                        
            <!-- Modal -->
            <div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" 
            aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" 
                        data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                    </button>
        
                </div>
       

       
       <!-- Login -->
       <div class="modal-body">
            <h1 class="text-center">Login</h1>
           <form class="form-horizontal" method="post" role="form">
             <div class="form-group">
               <label  class="col-sm-2 control-label"
                         for="inputEmail3">Email</label>
               <div class="col-sm-10">
                   <input type="email" class="form-control" 
                   id="Username" name="Username" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"/>
               </div>
             </div>
             <div class="form-group">
               <label class="col-sm-2 control-label"
                     for="inputPassword3" >Password</label>
               <div class="col-sm-10">
                   <input type="password" class="form-control"
                       id="Password" name="Password" placeholder="Password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 or more characters"/>
               </div>
             </div>
             <div class="form-group">
                    <label class="col-sm-2 control-label"
                    for="inputPassword3" >User</label>
              <div class="col-sm-10">
                    <select class="form-control" name="Typeofuser" id="sel1">
                            <option>Individual</option>
                            <option>DSA</option>
                    </select>
              </div>
             </div>
             <div class="form-group">
               <div class="col-sm-offset-2 col-sm-10">
                 <button type="submit" name="login" class="btn btn-success">Sign in</button>
               </div>
             </div>
           </form>
           
       </div>
       
       <!-- Modal Footer -->
       <div class="modal-footer">
           <button type="button" class="btn btn-default"
                   data-dismiss="modal">
                       Close
           </button>
        
        </div>
    </div>
    </div>
</div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form>
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-12 form-group">
								<label>Full Name</label>
								<input type="text" placeholder="Enter Full Name Here.." class="form-control">
							</div>
						
						</div>					
					
						<div class="row">
							<div class="col-sm-4 form-group">
                            
                            Select Country:<br/>
                             <select name="state" id="countySel" size="1">
                                                <option value="" selected="selected">Select Country</option>
                                            </select>
								
							</div>	
							<div class="col-sm-4 form-group">
                            Select State: <select name="countrya" id="stateSel" size="1">
                                            <option value="" selected="selected">Please select Country first</option>
                                          </select>
                         
								
							</div>	
							<div class="col-sm-12 form-group">
                                Select District: <select name="district" id="districtSel" size="1">
                                <option value="" selected="selected">Please select State first</option>
                            </select>
							</div>		
						</div>
						<div class="row">
							<div class="col-sm-12 form-group">
								<label>Title</label>
								<input type="text" placeholder="Enter Designation Here.." class="form-control">
							</div>		
							                        </div>
                        <div class="form-group">
						<label>Company</label>
						<input type="text" placeholder="Enter Company Name Here.." class="form-control">
					</div>    						
					<div class="form-group">
						<label>Phone Number</label>
						<input type="text" placeholder="Enter Phone Number Here.." class="form-control">
					</div>		
					<div class="form-group">
						<label>Email Address</label>
						<input type="text" placeholder="Enter Email Address Here.." class="form-control">
					</div>	
				
					<button type="button" class="btn btn-lg btn-success">Submit</button>					
					</div>
				</form> 
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
        </div>
      </div>
    </div>
  </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- header top end -->

    <div class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2 col-xs-12 tap-v-responsive">
                    <div class="logo-area">
                        <a href="index-2.html"><img src="images/logo2.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- main menu start here -->
                <div class="col-md-10">
                <nav>
                        <ul class="main-menu text-right">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="our-network.php">Our Network</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div> <!-- main menu end here -->
            </div>
        </div>
    </div> <!-- header-bottom area end here -->
</header> <!-- header area end here -->

<section class="slider-area-2 " id="slider_area_2">
    <div class="rev_slider_wrapper">
        <div id="rev_slider_2" class="rev_slider" style="display:none">
            <!-- BEGIN SLIDES LIST -->
            <ul>
                <!-- slider one start -->
               <li data-index="rs-3045" data-transition="zoomout" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="images/slider/slider-back-02.jpg"  data-rotate="0"  data-fstransition="fade" data-fsmasterspeed="1500" data-fsslotamount="7" data-saveperformance="off"  data-title="Intro" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="images/slider/slider-back-02.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->
                    <!-- BEGIN BASIC TEXT LAYER -->
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4 title-line-12" 
                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                        data-y="['middle','middle','middle','middle']" data-voffset="['-100','-100','-220','-150']" 
                        data-fontsize="['80','70','50','50']"
                        data-lineheight="['100','70','50','50']"
                        data-width="none"
                        data-height="none"
                        data-whitespace="nowrap"

                        data-type="text" 
                        data-responsive_offset="on" 

                        data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1750,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-textAlign="['left','left','left','left']"
                        data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":750,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' 

                        style="z-index: 6; color:#fff; font-family:'Poppins', sans-serif; white-space: nowrap; font-weight:600;">Desire Health 
                    </div>

                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4 title-line-2" 
                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                        data-y="['middle','middle','middle','middle']" data-voffset="['-30','-28','-120','-100']" 
                        data-fontsize="['20','20','25','25']"
                        data-lineheight="['40','40','80','80']"
                        data-width="none"
                        data-height="none"
                        data-whitespace="nowrap"

                        data-type="text" 
                        data-responsive_offset="on" 

                        data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1750,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-textAlign="['left','left','left','left']"
                        data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-frames='[{"delay":0,"speed":3000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]' 

                        style="z-index: 6; color:#fff; text-transform:capitalize; font-family:'Poppins', sans-serif; white-space: nowrap; font-weight:400;">Start From 
                        <span style=" color: #f15b5c; font-weight:500;">$250</span>/ Insurance
                    </div>

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption rev-btn rev-btn left_btn" 
                        id="slide-2939-layer-8" 
                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                        data-y="['middle','middle','middle','middle']"  data-voffset="['50','50','50','40']" 
                        data-fontsize="['18','18','15','15']"
                        data-lineheight="['34','34','30','20']"
                        data-width="none"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-type="button" 
                        data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-2939","delay":""}]'
                        data-responsive_offset="on" 
                        data-responsive="off"
                        data-frames='[{"from":"x:-50px;opacity:0;","speed":1000,"to":"o:1;","delay":1750,"ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power4.easeIn"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:#ffffff;bg:#f15b5c;bw:2px 2px 2px 2px;"}]'
                        data-textAlign="['center','center','center','center']"
                        data-paddingtop="[9,9,10,10]"
                        data-paddingright="[40,40,30,25]"
                        data-paddingbottom="[9,9,10,10]"
                        data-paddingleft="[40,40,30,25]"

                        style="z-index: 14; white-space: nowrap; font-weight: 500; color: #ffffff; font-family:'Poppins', sans-serif; background-color:#37b722; border-color:rgba(0, 0, 0, 1.00); border-width:2px;">Sign Up
                    </div>
                </li>
                <!-- end slider one -->

                <!-- slider two start -->
                <li data-index="rs-3048" data-transition="zoomout" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="../../assets/images/fitness-100x50.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="HTML5 Video" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="images/slider/slider_1_1.jpg"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                    <!-- BEGIN BASIC TEXT LAYER -->
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4 title-line-12" 
                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                        data-y="['middle','middle','middle','middle']" data-voffset="['-100','-100','-220','-150']" 
                        data-fontsize="['80','70','50','50']"
                        data-lineheight="['100','70','50','50']"
                        data-width="none"
                        data-height="none"
                        data-whitespace="nowrap"

                        data-type="text" 
                        data-responsive_offset="on" 

                        data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1750,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-textAlign="['left','left','left','left']"
                        data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":750,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]' 

                        style="z-index: 6; color:#fff; font-family:'Poppins', sans-serif; white-space: nowrap; font-weight:600;">Desire Wealth
                    </div>

                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption sfr font-extra-bold tp-resizeme letter-space-4 title-line-2" 
                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                        data-y="['middle','middle','middle','middle']" data-voffset="['-30','-28','-120','-100']" 
                        data-fontsize="['20','20','25','25']"
                        data-lineheight="['40','40','80','80']"
                        data-width="none"
                        data-height="none"
                        data-whitespace="nowrap"

                        data-type="text" 
                        data-responsive_offset="on" 

                        data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1750,"ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                        data-textAlign="['left','left','left','left']"
                        data-paddingtop="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-frames='[{"delay":0,"speed":3000,"frame":"0","from":"x:[175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:1;","mask":"x:[-100%];y:0;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]' 

                        style="z-index: 6; color:#fff; text-transform:capitalize; font-family:'Poppins', sans-serif; white-space: nowrap; font-weight:400;">Start From 
                        <span style=" color: #f15b5c; font-weight:500;">$250</span>/ Insurance
                    </div>

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption rev-btn rev-btn left_btn" 
                        id="slide-2939-layer-8" 
                        data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" 
                        data-y="['middle','middle','middle','middle']"  data-voffset="['50','50','50','40']" 
                        data-fontsize="['18','18','15','15']"
                        data-lineheight="['34','34','30','20']"
                        data-width="none"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-type="button" 
                        data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-2939","delay":""}]'
                        data-responsive_offset="on" 
                        data-responsive="off"
                        data-frames='[{"from":"x:-50px;opacity:0;","speed":1000,"to":"o:1;","delay":1750,"ease":"Power2.easeOut"},{"delay":"wait","speed":1500,"to":"opacity:0;","ease":"Power4.easeIn"},{"frame":"hover","speed":"300","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:#ffffff;bg:#f15b5c;bw:2px 2px 2px 2px;"}]'
                        data-textAlign="['center','center','center','center']"
                        data-paddingtop="[9,9,10,10]"
                        data-paddingright="[40,40,30,25]"
                        data-paddingbottom="[9,9,10,10]"
                        data-paddingleft="[40,40,30,25]"

                        style="z-index: 14; white-space: nowrap; font-weight: 500; color: #ffffff; font-family:'Poppins', sans-serif; background-color:#37b722; border-color:rgba(0, 0, 0, 1.00); border-width:2px;">Login
                    </div>
                </li>
            </ul> <!-- END SLIDES LIST -->
        </div> <!-- END SLIDER CONTAINER -->
    </div> <!-- END SLIDER CONTAINER WRAPPER -->
</section> <!-- slider area end here -->


<section class="welcome-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="single-welcome-area">
                    <div class="single-imag">
                        <img src="images/welcome/1.jpg" alt="" class="img-thumbnail img-responsive">
                    </div>
                    <div class="overlay-image">
                        <img src="images/welcome/2.jpg" alt="" class="img-thumbnail img-responsive">
                    </div>
                </div>
            </div> <!-- welcome area left side end -->

            <div class="col-md-6">
                <div class="single-welcome-text">
                    <div class="section-title-version-2">
                        <h2>Welcome To Desire Health & Wealth Cards</h2>
                        <div class="welcome-content">
                            <p>Get Health Wealth card that you can use instantly and start saving upto 50% on health care services like prescription medicines,medical test,and consultation fee at our associated hospital,clinic,diagnostic center and pharmacy.</p>
                          
                            <a href="#" class="read-more hvr-fade">Read More</a>
                        </div>
                    </div>
                </div>
            </div>  <!-- welcome area right side end -->
        </div>
    </div>
</section> <!-- welcome area start end here -->

<section class="tour-package-bg image-bg-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-title-version-2-white text-center">
                    <h2>Apply For Our Services</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Etiam at ipsum at ligula vestibulum </p>
                </div>
            </div>
            <!-- tour packages carosual -->
            <div class="popular-packages-carasoul owl-carousel">
                <div class="single-package-carasoul">
                    <div class="package-location">
                        <img src="images/packages/1.jpg" alt="">
                    
                        <div class="package-long-btn hvr-shutter-out-horizontal">
                                <a href="#">Book Now</a>
                        </div>
                    </div>

                    <div class="package-details">
                        <div class="package-places">
                            <h4>Apply For Cards Online</h4>
                            <div class="details">
                                <p>Fill out Form online, Complete the form continue for your Health Wealth Card.</p>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="single-package-carasoul">
                    <div class="package-location">
                        <img src="images/packages/2.jpg" alt="">
                 
                        <div class="package-long-btn hvr-shutter-out-horizontal">
                            <a href="#">Book Now</a>
                        </div>
                    </div>
                    <div class="package-details">
                        <div class="package-places">
                            <h4>Apply For Cards Offline</h4>
                            <div class="details">
                                <p>You will get card within 3-4 Working days or Get your Card at Your Nearest Store</p>
                            </div>
                        </div>
                       
                    </div>
                </div>

                <div class="single-package-carasoul">
                    <div class="package-location">
                        <img src="images/packages/3.jpg" alt="">
              
                        <div class="package-long-btn hvr-shutter-out-horizontal">
                            <a href="#">Book Now</a>
                        </div>
                    </div>

                    <div class="package-details">
                        <div class="package-places">
                            <h4>Bring to Health Care Center</h4>
                            <div class="details">
                                <p>Visit a participating health care center(Hospital/clinic/Pharmacy) and present your card at center.</p>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <div class="single-package-carasoul">
                    <div class="package-location">
                        <img src="images/packages/4.jpg" alt="">
                   
                        <div class="package-long-btn hvr-shutter-out-horizontal">
                            <a href="#">Book Now</a>
                        </div>
                    </div>

                    <div class="package-details">
                        <div class="package-places">
                            <h4>Get Discount</h4>
                            <div class="details">
                                <p>Get 10 % or more discounts on health care services.</p>
                            </div>
                        </div>
              
                    </div>
                </div>
            </div> <!-- tour packages carosual end -->
        </div>
    </div>
</section> <!-- Tour Packages end here -->
<section class="travelsers-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title-white text-center">
                        <h2>Why Choose Desire Health Wealth Card</h2>
                        <p>Get Your Health Wealth Card INSTANTLY and begin using at over participating pharmacies nationwide including most large chain stores as well as local neighborhood pharmacies.</p><br/>
                        <p>Let's face it - drugs cost too much! Health Wealth Card provides substantial savings on Brand & Generic medications. If your insurance plan does not cover ALL your medications - you can use our card too.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single travel start -->
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="single-travel">
                        <div class="media">
                            <div class="media-body travel-content">
                                <h4>Travel Arrangements</h4>
                                <p>Lorem ipsum dolor sit amet consect adiu piscing elit sed diam nonum euismo tincidunt ut.</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- single travel end -->
    
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="single-travel">
                        <div class="media">
                            <div class="media-body travel-content">
                                <h4>Cheap Flights</h4>
                                <p>Lorem ipsum dolor sit amet consect adiu piscing elit sed diam nonum euismo tincidunt ut.</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- single travel end -->
    
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="single-travel">
                        <div class="media">
                            <div class="media-body travel-content">
                                <h4>Hand-picked tours</h4>
                                <p>Lorem ipsum dolor sit amet consect adiu piscing elit sed diam nonum euismo tincidunt ut.</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- single travel end -->
    
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="single-travel">
                        <div class="media">
                            <div class="media-body travel-content">
                                <h4>Privet Guide</h4>
                                <p>Lorem ipsum dolor sit amet consect adiu piscing elit sed diam nonum euismo tincidunt ut.</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- single travel end -->
    
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="single-travel">
                        <div class="media">
                            <div class="media-body travel-content">
                                <h4>Special Activities</h4>
                                <p>Lorem ipsum dolor sit amet consect adiu piscing elit sed diam nonum euismo tincidunt ut.</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- single travel end -->
    
                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="single-travel">
                        <div class="media">
                            <div class="media-body travel-content">
                                <h4>Best Price Guarantee</h4>
                                <p>Lorem ipsum dolor sit amet consect adiu piscing elit sed diam nonum euismo tincidunt ut.</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- single travel end -->
            </div>
        </div>
    </section> <!-- choose travelsers end here -->

    <section class="section-paddings popular-country">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title-version-2-black text-center">
                        <h2>Places Where We Offer</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Etiam at ipsum at ligula vestibulum </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="destination-tab-menu ">
                        <ul class="destination-menu nav nav-tabs" id="myTab2" role="tablist">
                            <li class="nav-item"><a class="nav-link active" href="#asia" role="tab" data-toggle="tab" data-easein="fadeIn">Asia</a></li>
                            <li class="nav-item"><a class="nav-link" href="#europe" role="tab" data-toggle="tab" data-easein="fadeIn">Europe</a></li>
                            <li class="nav-item"><a class="nav-link" href="#america" role="tab" data-toggle="tab" data-easein="fadeIn">America</a></li>
                            <li class="nav-item"><a class="nav-link" href="#africa" role="tab" data-toggle="tab" data-easein="fadeIn">Africa</a></li>
                            <li class="nav-item"><a class="nav-link" href="#australia" role="tab" data-toggle="tab" data-easein="fadeIn">Australia</a></li>
                        </ul>
                    </div><!-- tab menu end -->

                    <div class="destination-countrys">
                        <div class="tab-content" id="tab-content2">
                            <!-- Asia tab content start -->
                            <div role="tabpanel" class="tab-pane" id="asia">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3 padding-bottom">
                                        <div class="single-country">
                                            <figure>
                                                <a href="#"><img src="images/destination/pd1.jpg" alt="" class="img-responsive img-rounded"></a>
                                                <figcaption>
                                                    <div class="city-name">
                                                        <span><img src="images/icon/map.png" alt="">London, Eangland</span>
                                                     
                                                    </div>
                                                   
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 padding-bottom">
                                        <div class="single-country">
                                            <figure>
                                                <a href="#"><img src="images/destination/pd2.jpg" alt="" class="img-responsive img-rounded">
                                                </a>
                                                <figcaption>
                                                    <div class="city-name">
                                                        <span><img src="images/icon/map.png" alt="">Rome, Italy</span>
                                                  
                                                    </div>
                                                 
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-md-3 padding-bottom">
                                        <div class="single-country">
                                            <figure>
                                                <a href="#"><img src="images/destination/pd3.jpg" alt="" class="img-responsive img-rounded">
                                                </a>
                                                <figcaption>
                                                    <div class="city-name">
                                                        <span><img src="images/icon/map.png" alt="">Delhi, India</span>
                                                       
                                                    </div>
                                            
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 padding-bottom">
                                        <div class="single-country">
                                            <figure>
                                                <a href="#"><img src="images/destination/pd4.jpg" alt="" class="img-responsive img-rounded">
                                                </a>
                                                <figcaption>
                                                    <div class="city-name">
                                                        <span><img src="images/icon/map.png" alt="">Paris, France</span>
                                                    
                                                    </div>
                                             
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- Asia tab content end -->

                            <div role="tabpanel" class="tab-pane active" id="europe">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3 padding-bottom">
                                        <div class="single-country">
                                            <figure>
                                                <a href="#"><img src="images/destination/pd1.jpg" alt="" class="img-responsive img-rounded">
                                                </a>
                                                <figcaption>
                                                    <div class="city-name">
                                                        <span><img src="images/icon/map.png" alt="">Eangland, London</span>
                                                       
                                                    </div>
                                                 
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 padding-bottom">
                                        <div class="single-country">
                                            <figure>
                                                <a href="#"><img src="images/destination/pd2.jpg" alt="" class="img-responsive img-rounded">
                                                </a>
                                                <figcaption>
                                                    <div class="city-name">
                                                        <span><img src="images/icon/map.png" alt="">Eangland, London</span>
                                                       
                                                    </div>
                                             
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>

                                    <div class=" col-sm-3 col-md-3 padding-bottom">
                                        <div class="single-country">
                                            <figure>
                                                <a href="#"><img src="images/destination/pd3.jpg" alt="" class="img-responsive img-rounded">
                                                </a>
                                                <figcaption>
                                                    <div class="city-name">
                                                        <span><img src="images/icon/map.png" alt="">Eangland, London</span>
                                                      
                                                    </div>
                                                 
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 padding-bottom">
                                        <div class="single-country">
                                            <figure>
                                                <a href="#"><img src="images/destination/pd4.jpg" alt="" class="img-responsive img-rounded">
                                                </a>
                                                <figcaption>
                                                    <div class="city-name">
                                                        <span><img src="images/icon/map.png" alt="">Eangland, London</span>
                                                     
                                                    </div>
                                                
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- europe tab content end -->

                            <div role="tabpanel" class="tab-pane" id="america">
                                <div class="row">
                                    <div class=" col-sm-3 col-md-3 padding-bottom">
                                        <div class="single-country">
                                            <figure>
                                                <a href="#"><img src="images/destination/pd1.jpg" alt="" class="img-responsive img-rounded">
                                                </a>
                                                <figcaption>
                                                    <div class="city-name">
                                                        <span><img src="images/icon/map.png" alt="">Eangland, London</span>
                                                
                                                    </div>
                                                 
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class=" col-sm-3 col-md-3 padding-bottom">
                                        <div class="single-country">
                                            <figure>
                                                <a href="#"><img src="images/destination/pd2.jpg" alt="" class="img-responsive img-rounded">
                                                </a>
                                                <figcaption>
                                                    <div class="city-name">
                                                        <span><img src="images/icon/map.png" alt="">Eangland, London</span>
                                                    
                                                    </div>
                                                 
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>

                                    <div class=" col-sm-3 col-md-3 padding-bottom">
                                        <div class="single-country">
                                            <figure>
                                                <a href="#"><img src="images/destination/pd3.jpg" alt="" class="img-responsive img-rounded">
                                                </a>
                                                <figcaption>
                                                    <div class="city-name">
                                                        <span><img src="images/icon/map.png" alt="">Eangland, London</span>
                                                      
                                                    </div>
                                                
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 padding-bottom">
                                        <div class="single-country">
                                            <figure>
                                                <a href="#"><img src="images/destination/pd4.jpg" alt="" class="img-responsive img-rounded">
                                                </a>
                                                <figcaption>
                                                    <div class="city-name">
                                                        <span><img src="images/icon/map.png" alt="">Eangland, London</span>
                                                     
                                                    </div>
                                               
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- america tab content end-->

                            <div role="tabpanel" class="tab-pane" id="africa">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3 padding-bottom">
                                        <div class="single-country">
                                            <figure>
                                                <a href="#"><img src="images/destination/pd1.jpg" alt="" class="img-responsive img-rounded">
                                                </a>
                                                <figcaption>
                                                    <div class="city-name">
                                                        <span><img src="images/icon/map.png" alt="">Eangland, London</span>
                                                      
                                                    </div>
                                              
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 padding-bottom">
                                        <div class="single-country">
                                            <figure>
                                                <a href="#"><img src="images/destination/pd2.jpg" alt="" class="img-responsive img-rounded">
                                                </a>
                                                <figcaption>
                                                    <div class="city-name">
                                                        <span><img src="images/icon/map.png" alt="">Eangland, London</span>
                                               
                                                    </div>
                                                  
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-md-3 padding-bottom">
                                        <div class="single-country">
                                            <figure>
                                                <a href="#"><img src="images/destination/pd3.jpg" alt="" class="img-responsive img-rounded">
                                                </a>
                                                <figcaption>
                                                    <div class="city-name">
                                                        <span><img src="images/icon/map.png" alt="">Eangland, London</span>
                                                  
                                                    </div>
                                                
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class=" col-sm-3 col-md-3 padding-bottom">
                                        <div class="single-country">
                                            <figure>
                                                <a href="#"><img src="images/destination/pd4.jpg" alt="" class="img-responsive img-rounded">
                                                </a>
                                                <figcaption>
                                                    <div class="city-name">
                                                        <span><img src="images/icon/map.png" alt="">Eangland, London</span>
                                                  
                                                    </div>
                                                   
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- america tab content end-->

                            <div role="tabpanel" class="tab-pane" id="australia">
                                <div class="row">
                                    <div class="col-sm-3 col-md-3 padding-bottom">
                                        <div class="single-country">
                                            <figure>
                                                <a href="#"><img src="images/destination/pd1.jpg" alt="" class="img-responsive img-rounded">
                                                </a>
                                                <figcaption>
                                                    <div class="city-name">
                                                        <span><img src="images/icon/map.png" alt="">Eangland, London</span>
                                                  
                                                    </div>
                                                 
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class=" col-sm-3 col-md-3 padding-bottom">
                                        <div class="single-country">
                                            <figure>
                                                <a href="#"><img src="images/destination/pd2.jpg" alt="" class="img-responsive img-rounded">
                                                </a>
                                                <figcaption>
                                                    <div class="city-name">
                                                        <span><img src="images/icon/map.png" alt="">Eangland, London</span>
                                                
                                                    </div>
                                              
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
      
                                    <div class="col-sm-3 col-md-3 padding-bottom">
                                        <div class="single-country">
                                            <figure>
                                                <a href="#"><img src="images/destination/pd3.jpg" alt="" class="img-responsive img-rounded">
                                                </a>
                                                <figcaption>
                                                    <div class="city-name">
                                                        <span><img src="images/icon/map.png" alt="">Eangland, London</span>
                                                  
                                                    </div>
                                                
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 col-md-3 padding-bottom">
                                        <div class="single-country">
                                            <figure>
                                                <a href="#"><img src="images/destination/pd4.jpg" alt="" class="img-responsive img-rounded">
                                                </a>
                                                <figcaption>
                                                    <div class="city-name">
                                                        <span><img src="images/icon/map.png" alt="">Eangland, London</span>
                                                     
                                                    </div>
                                                   
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- australia tab content end-->
                        </div>
                    </div> <!-- tab content end -->
                </div>
            </div>
        </div>
    </section> <!-- most popular destination end here -->





<!-- 
<section class="countdown discount_countdown count-down-bg image-bg-padding-100" id="countdown_2">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12-col-xs-12">
                <div class="count-down-titile">
                    <h2>Special Tour in May, Discover <span class="color-one">Thailand</span> for 50 <br> customers with <span class="color-two">Discount 30%</span> </h2>
                </div>
                <div class="count-timer text-center">
                    <div class="time-wrapper">
                        <p>It’s limited seating! Hurry up</p>
                        <div class="timer">
                            <div data-countdown="2019/5/15"></div>
                        </div>
                    </div>
                </div>
                <div class="buy-now text-center">
                    <a href="#" class="travel-primary-btn hvr-fade">Buy Now</a>
                </div>
            </div>
        </div>
    </div>
</section> --> <!--end  countdown -->





    <!-- Last minute offer start here -->
  <!--  <section class="section-paddings offer-package">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title-version-2-black text-center">
                        <h2>Last Minute Offer</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Etiam at ipsum at ligula vestibulum </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="single-offer">
                        <div class="row">
                            <div class="col-12 col-xs-12 col-sm-6 col-md-6   package-pho-res">
                                <div class="single-offer-image">
                                    <img src="images/offer/1.jpg" alt="">
                                    <span>30%off</span>
                                </div>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-6 col-md-6 package-pho-res-text">
                                <div class="single-offers-elemetns">
                                    <div class="single-offer-details">
                                        <div class="offer-title">
                                            <h4>Best tours in Thailand</h4>
                                            <p>4Days, 5Nights <del>$550</del> <span>$500</span>
                                            </p>
                                        </div>
                                        <div class="offer-details">
                                            <p>Lorem ipsum dolor sit amet consct etur adipiscing elit, sed do eiusmo tempor incididunt.</p>
                                            <div class="offer-btn">
                                                <a href="#" class="travel-booking-btn-lg hvr-shutter-out-horizontal">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="single-offer">
                        <div class="row">
                            <div class="col-12 col-xs-12 col-sm-6 col-md-6 package-pho-res">
                                <div class="single-offer-image">
                                    <img src="images/offer/2.jpg" alt="">
                                    <span>20%off</span>
                                </div>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-6 col-md-6 package-pho-res-text">
                                 <div class="single-offers-elemetns">
                                    <div class="single-offer-details">
                                        <div class="offer-title">
                                            <h4>Best tours in Mexico</h4>
                                            <p>4Days, 5Nights <del>$450</del> <span>$400</span>
                                            </p>
                                        </div>
                                        <div class="offer-details">
                                            <p>Lorem ipsum dolor sit amet consct etur adipiscing elit, sed do eiusmo tempor incididunt.</p>
                                            <div class="offer-btn">
                                                <a href="#" class="travel-booking-btn-lg hvr-shutter-out-horizontal">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="single-offer">
                        <div class="row">
                            <div class="col-12 col-xs-12 col-sm-6 col-md-6 package-pho-res-text">
                                <div class="single-offer-image">
                                    <img src="images/offer/3.jpg" alt="">
                                    <span>10%off</span>
                                </div>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-6 col-md-6 package-pho-res">
                                <div class="single-offers-elemetns">
                                    <div class="single-offer-details">
                                        <div class="offer-title">
                                            <h4>Best tours in Paris</h4>
                                            <p>4Days, 5Nights <del>$550</del> <span>$500</span>
                                            </p>
                                        </div>
                                        <div class="offer-details">
                                            <p>Lorem ipsum dolor sit amet consct etur adipiscing elit, sed do eiusmo tempor incididunt.</p>
                                            <div class="offer-btn">
                                                <a href="#" class="travel-booking-btn-lg hvr-shutter-out-horizontal">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  

                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="single-offer">
                        <div class="row">
                            <div class="col-12 col-xs-12 col-sm-6 col-md-6 package-pho-res">
                                <div class="single-offer-image">
                                    <img src="images/offer/4.jpg" alt="">
                                    <span>40%off</span>
                                </div>
                            </div>
                            <div class="col-12 col-xs-12 col-sm-6 col-md-6 package-pho-res">
                                <div class="single-offers-elemetns">
                                    <div class="single-offer-details">
                                        <div class="offer-title">
                                            <h4>Best tours in India</h4>
                                            <p>4Days, 5Nights <del>$550</del> <span>$500</span>
                                            </p>
                                        </div>
                                        <div class="offer-details">
                                            <p>Lorem ipsum dolor sit amet consct etur adipiscing elit, sed do eiusmo tempor incididunt.</p>
                                            <div class="offer-btn">
                                                <a href="#" class="travel-booking-btn-lg hvr-shutter-out-horizontal">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </section>  --><!-- Last minute offer end here -->

  <!--   <section class="section-blog-bg blog-2">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="section-title-version-2-white text-center">
                        <h2>Travel guide and Expert Advice</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Etiam at ipsum at ligula vestibulum </p>
                    </div>
                </div>
            </div>
            <div class="row">
              
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 single-item">
                    <div class="single-travel-blog single-travel-blog-2">
                        <div class="blog-image">
                            <a href="#"><img src="images/blog/5.jpg" alt="">
                            </a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-post-content">
                                <h4><a href="#" title="">Tips for taking a long-term trip with kids.</a></h4>
                                <div class="blog-meta">
                                    <ul class="post-social-2 d-flex justify-content-between">
                                        <li><a href="#"></i> 12July, 2019</a></li>
                                        <li>
                                            <a href="#"><i class="fa fa-user"></i> 10</a>
                                            <a href="#"><i class="fa fa-comments"></i> 43</a>
                                        </li>
                                    </ul>
                                </div>
                                <p>Lorem ipsum dolor sit amet consepctetur adipiscing elit Etiam at ipsum at ligula vestibulum sodales Sed luctus.</p>
                                <div class="read-more-btn">
                                    <a href="#">Read More <i class="fa fa-angle-right"> </i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="col-12 col-sm-6 col-md-6 col-lg-4 single-item">
                    <div class="single-travel-blog single-travel-blog-2">
                        <div class="blog-image">
                            <a href="#"><img src="images/blog/6.jpg" alt="">
                            </a>
                        </div>
                       <div class="blog-content">
                            <div class="blog-post-content">
                                <h4><a href="#" title="">Tips for taking a long-term trip with kids.</a></h4>
                                <div class="blog-meta">
                                    <ul class="post-social-2 d-flex justify-content-between">
                                        <li><a href="#"></i> 12July, 2019</a></li>
                                        <li>
                                            <a href="#"><i class="fa fa-user"></i> 10</a>
                                            <a href="#"><i class="fa fa-comments"></i> 43</a>
                                        </li>
                                    </ul>
                                </div>
                                <p>Lorem ipsum dolor sit amet consepctetur adipiscing elit Etiam at ipsum at ligula vestibulum sodales Sed luctus.</p>
                                <div class="read-more-btn">
                                    <a href="#">Read More <i class="fa fa-angle-right"> </i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="col-12 col-sm-6 col-md-6 col-lg-4 single-item">
                    <div class="single-travel-blog single-travel-blog-2">
                        <div class="blog-image">
                            <a href="#"><img src="images/blog/7.jpg" alt="">
                            </a>
                        </div>
                        <div class="blog-content">
                            <div class="blog-post-content">
                                <h4><a href="#" title="">Tips for taking a long-term trip with kids.</a></h4>
                                <div class="blog-meta">
                                    <ul class="post-social-2 d-flex justify-content-between">
                                        <li><a href="#"></i> 12July, 2019</a></li>
                                        <li>
                                            <a href="#"><i class="fa fa-user"></i> 10</a>
                                            <a href="#"><i class="fa fa-comments"></i> 43</a>
                                        </li>
                                    </ul>
                                </div>
                                <p>Lorem ipsum dolor sit amet consepctetur adipiscing elit Etiam at ipsum at ligula vestibulum sodales Sed luctus.</p>
                                <div class="read-more-btn">
                                    <a href="#">Read More <i class="fa fa-angle-right"> </i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>--> <!-- single popular destination  end-->

    <!--<section class="section-paddings">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title-version-2-black text-center">
                        <h2>Gallery from Travelars</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Etiam at ipsum at ligula vestibulum </p>
                    </div>
                </div>
            </div>

            <div class="row grid-3">
                <div class="col-sm-12 col-md-6 grid-item">
                    <figure>
                        <img src="images/gallery/1.jpg" alt="">
                        <figcaption>
                            <a href="images/gallery/1.jpg" title=""><i class="fa fa-eye"></i></a>
                            <h4>Place <span>Eiffel Tower</span></h4>
                            <h4>Caption By: <span>Michel Jusi</span></h4>
                        </figcaption>
                    </figure>
                </div> 

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 grid-item">
                    <figure>
                        <img src="images/gallery/2.jpg" alt="">
                        <figcaption>
                            <a href="images/gallery/2.jpg" title=""><i class="fa fa-eye"></i></a>
                            <h4>Place <span>Eiffel Tower</span></h4>
                            <h4>Caption By: <span>Michel Jusi</span></h4>
                        </figcaption>
                    </figure>
                </div> 

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 grid-item">
                    <figure>
                        <img src="images/gallery/3.jpg" alt="">
                        <figcaption>
                            <a href="images/gallery/3.jpg" title=""><i class="fa fa-eye"></i></a>
                            <h4>Place <span>Eiffel Tower</span></h4>
                            <h4>Caption By: <span>Michel Jusi</span></h4>
                        </figcaption>
                    </figure>
                </div> 

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 grid-item">
                    <figure>
                        <img src="images/gallery/6.jpg" alt="">
                        <figcaption>
                            <a href="images/gallery/6.jpg" title=""><i class="fa fa-eye"></i></a>
                            <h4>Place <span>Eiffel Tower</span></h4>
                            <h4>Caption By: <span>Michel Jusi</span></h4>
                        </figcaption>
                    </figure>
                </div> 

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 grid-item">
                    <figure>
                        <img src="images/gallery/4.jpg" alt="">
                        <figcaption>
                            <a href="images/gallery/4.jpg" title=""><i class="fa fa-eye"></i></a>
                            <h4>Place <span>Eiffel Tower</span></h4>
                            <h4>Caption By: <span>Michel Jusi</span></h4>
                        </figcaption>
                    </figure>
                </div>

                <div class=" col-12 col-sm-6 col-md-4 col-lg-3 grid-item">
                    <figure>
                        <img src="images/gallery/5.jpg" alt="">
                        <figcaption>
                            <a href="images/gallery/5.jpg" title=""><i class="fa fa-eye"></i></a>
                            <h4>Place <span>Eiffel Tower</span></h4>
                            <h4>Caption By: <span>Michel Jusi</span></h4>
                        </figcaption>
                    </figure>
                </div>
          
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 grid-item">
                    <figure>
                        <img src="images/gallery/7.jpg" alt="">
                        <figcaption>
                            <a href="images/gallery/7.jpg" title=""><i class="fa fa-eye"></i></a>
                            <h4>Place <span>Eiffel Tower</span></h4>
                            <h4>Caption By: <span>Michel Jusi</span></h4>
                        </figcaption>
                    </figure>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 grid-item">
                    <figure>
                        <img src="images/gallery/8.jpg" alt="">
                        <figcaption>
                            <a href="images/gallery/8.jpg" title=""><i class="fa fa-eye"></i></a>
                            <h4>Place <span>Eiffel Tower</span></h4>
                            <h4>Caption By: <span>Michel Jusi</span></h4>
                        </figcaption>
                    </figure>
                </div> 
            </div> 
        </div>
    </section> --><!-- gallery section end here -->
        
    <section class="section-paddings testimonial-two" id="testimonial_one">
            <div class="testimonial-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title">
                                <h2>What Our Happy Travelers Say</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Etiam at ipsum at ligula .</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <!-- start top media -->
                            <div class="top-testimonial-image slick-pagination">
                                <div class="carousel-images slider-nav-two">
                                    <div class="images_single"><img src="images/client/3.jpg" alt="1" class="img-responsive img-circle"></div>
                                    <div class="images_single"><img src="images/client/9.jpg" alt="3" class="img-responsive img-circle"></div>
                                    <div class="images_single"><img src="images/client/6.jpg" alt="2" class="img-responsive img-circle"></div>
                                    <div class="images_single"><img src="images/client/9.jpg" alt="3" class="img-responsive img-circle"></div>
                                </div>
                            </div><!-- end top media images -->
        
                            <!-- bottom testimonial message -->
                            <div class="block-text">
                                <div class="carousel-text slider-for-two">
                                    <div class="single-box">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt utrinyi dolore magna aliqimbf adiminim veniamp nostrud exer tatjhion ullamc orperea commodo consequ euismod laoreet dolore magna.
                                        </p>
                                        <div class="client-bio">
                                            <h3>Jhonthan Smith</h3>
                                            <span>London Trip Traveler</span>
                                        </div>
                                        <ul class="rating d-flex justify-content-center">
                                            <li><i class="fa fa-star"></i></li>                                    
                                            <li><i class="fa fa-star"></i></li>                                    
                                            <li><i class="fa fa-star"></i></li>                                    
                                            <li><i class="fa fa-star"></i></li>                                    
                                            <li><i class="fa fa-star"></i></li>                                    
                                        </ul>
                                    </div>
                                    <div class="single-box">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,  utrinyi dolore magna aliquam erat volutpat Upt wisi enimbf adiminim veniamp nostrud exer tatjhion ullamc orperea commodo consequ euismod laoreetore magna.
                                        </p>
                                        <div class="client-bio">
                                            <h3>Blake Lively</h3>
                                            <span>Martin, Parent</span>
                                        </div>
                                        <ul class="rating d-flex justify-content-center">
                                            <li><i class="fa fa-star"></i></li>                                    
                                            <li><i class="fa fa-star"></i></li>                                    
                                            <li><i class="fa fa-star"></i></li>                                    
                                            <li><i class="fa fa-star"></i></li>                                    
                                            <li><i class="fa fa-star"></i></li>                                    
                                        </ul>
                                    </div>
                                    <div class="single-box">
                                        <p>Lorem ipsum dolor sit amet, consected diam nonummy nibh euismod tincidunt utrinyi dolore magna aliquam erat volutpat Upt wisi enimbf adiminim veniamp nostrud exer tatjhion ullamc orperea commodo consequ euismo dolore magna.
                                        </p>
                                        <div class="client-bio">
                                            <h3>Charlie Puth</h3>
                                            <span>Martin, Parent</span>
                                        </div>
                                        <ul class="rating d-flex justify-content-center">
                                            <li><i class="fa fa-star"></i></li>                                    
                                            <li><i class="fa fa-star"></i></li>                                    
                                            <li><i class="fa fa-star"></i></li>                                    
                                            <li><i class="fa fa-star"></i></li>                                    
                                            <li><i class="fa fa-star"></i></li>                                    
                                        </ul>
                                    </div>
                                    <div class="single-box">
                                        <p>Lorem ipsum dolor sit amet, consectit, sed diam nonummy nibh euismod tincidunt utrinyi dolore magna alpat Upt wisi enimbf adiminim veniamp nostrud exer tatjhion ullamc orperea commodo consequ euismod laoreetna.
                                        </p>
                                        <div class="client-bio">
                                            <h3>Jessica Alba</h3>
                                            <span>Martin, Parent</span>
                                        </div>
                                        <ul class="rating d-flex justify-content-center">
                                            <li><i class="fa fa-star"></i></li>                                    
                                            <li><i class="fa fa-star"></i></li>                                    
                                            <li><i class="fa fa-star"></i></li>                                    
                                            <li><i class="fa fa-star"></i></li>                                    
                                            <li><i class="fa fa-star"></i></li>                                    
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- bottom testimonial message -->
                        </div><!-- /.block-text -->
                    </div>
                </div>
            </div>
        </section><!-- testimonial area end here -->
   
        
        
<section class="our_partners">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-title text-center">
                    <h2>Our Trusted Partners</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- partners images -->
            <div class="partner-slider-active owl-carousel">
                <div class="single-pertner">
                    <div class="partner-image">
                        <a href="#"><img src="images/partner/1.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="single-pertner">
                    <div class="partner-image">
                        <a href="#"><img src="images/partner/2.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="single-pertner">
                    <div class="partner-image">
                        <a href="#"><img src="images/partner/3.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="single-pertner">
                    <div class="partner-image">
                        <a href="#"><img src="images/partner/2.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="single-pertner">
                    <div class="partner-image">
                        <a href="#"><img src="images/partner/5.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- partners images -->
        <div class="row">
            <!-- partners images -->
            <div class="partner-slider-active owl-carousel">
                <div class="single-pertner">
                    <div class="partner-image">
                        <a href="#"><img src="images/partner/1.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="single-pertner">
                    <div class="partner-image">
                        <a href="#"><img src="images/partner/2.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="single-pertner">
                    <div class="partner-image">
                        <a href="#"><img src="images/partner/3.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="single-pertner">
                    <div class="partner-image">
                        <a href="#"><img src="images/partner/2.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="single-pertner">
                    <div class="partner-image">
                        <a href="#"><img src="images/partner/5.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>  <!-- end partners images -->
    </div>
</section> <!--end partner section -->

<!-- testimonial area start here -->

    
<?php
    require_once('footer.php');
?>