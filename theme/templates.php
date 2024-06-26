 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Opportunity Junction<?php echo $title;?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<meta name="author" content="http://webthemez.com" />
<!-- css -->
<link href="plugins/home-plugins/css/bootstrap.min.css" rel="stylesheet" />
<link href="plugins/home-plugins/css/fancybox/jquery.fancybox.css" rel="stylesheet"> 
<link href="plugins/home-plugins/css/flexslider.css" rel="stylesheet" /> 
<link href="plugins/home-plugins/css/style.css" rel="stylesheet" />
<!-- <link rel="stylesheet" href="plugins/dataTables/dataTables.bootstrap.css">  --> 
<link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css"> 

<link rel="stylesheet" href="plugins/dataTables/jquery.dataTables.min.css"> 
<link rel="stylesheet" href="plugins/dataTables/jquery.dataTables_themeroller.css"> 
<!-- datetime picker CSS -->
<link href="plugins/datepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<link href="plugins/datepicker/datepicker3.css" rel="stylesheet" media="screen">
 

<style type="text/css">
 
  #content {
    min-height: 400px;
    color: #000;
  }
  
  .contentbody p {
    font-weight: bold;
  }
  .login a:hover{ 
    color: #00bcd4;
    text-decoration: none;

  }
  .login a:focus{ 
    color: #00bcd4;
    text-decoration: none;

  }
  .login a { 
     font-size: 14px;
    color: #fff;
    padding:0px;
  }
        body {
            position: relative;
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        #chatbot-image {
            position: fixed;
            bottom: 20px;
            right: 20px;
            height: 150px;
        }

        #chatbot-container {
            display: none;
            position: fixed;
            bottom: calc(20px + 200px); /* Adjust based on chatbot image height */
            right: 20px;
            z-index: 9999; /* Ensure the chatbot container appears above the image */
        }

   #chatbot-iframe {
            height: 400px;
            max-height: 350px;
            width: 300px; /* Adjust as needed */
        }
</style>

</head>
<body>
<div id="wrapper" class="home-page">
 
  <!-- start header -->
  <header>
        <div class="topbar navbar-fixed-top">
          <div class="container">
            <div class="row">
              <div class="col-md-12">      
                <p class="pull-left hidden-xs"><i class="fa fa-phone"></i>91+9975616377</p>
                <?php if (isset($_SESSION['APPLICANTID'])) { 

                    $sql = "SELECT count(*) as 'COUNTNOTIF' FROM `tbljob` ORDER BY `DATEPOSTED` DESC";
                    $mydb->setQuery($sql);
                    $showNotif = $mydb->loadSingleResult();
                    $notif =isset($showNotif->COUNTNOTIF) ? $showNotif->COUNTNOTIF : 0;


                    $applicant = new Applicants();
                    $appl  = $applicant->single_applicant($_SESSION['APPLICANTID']);

                    $sql ="SELECT count(*) as 'COUNT' FROM `tbljobregistration` WHERE `PENDINGAPPLICATION`=0 AND `HVIEW`=0 AND `APPLICANTID`='{$appl->APPLICANTID}'";
                    $mydb->setQuery($sql);
                    $showMsg = $mydb->loadSingleResult();
                    $msg =isset($showMsg->COUNT) ? $showMsg->COUNT : 0;

                  #  echo ' <p class="pull-right login"> | <a title="View Message(s)" href="applicant/index.php?view=message"> <i class="fa fa-envelope-o"></i> <span class="label label-success">'.$msg.'</span></a> | <a title="View Profile" href="applicant/"> <i class="fa fa-user"></i>'. $appl->FNAME. ' '.$appl->LNAME .' </a> | <a href="logout.php">  <i class="fa fa-sign-out"> </i>Logout</a> </p>';
                    echo ' <p class="pull-right login"><a title="View Notification(s)" href="applicant/index.php?view=notification"> <i class="fa fa-bell-o"></i> <span class="label label-success">'.$notif.'</span></a> | <a title="View Message(s)" href="applicant/index.php?view=message"> <i class="fa fa-envelope-o"></i> <span class="label label-success">'.$msg.'</span></a> | <a title="View Profile" href="applicant/"> <i class="fa fa-user"></i>  '. $appl->FNAME. ' '.$appl->LNAME .' </a> | <a href="logout.php">  <i class="fa fa-sign-out"> </i>Logout</a> </p>';

                    }else{ ?>
                      <p   class="pull-right login"><a data-target="#myModal" data-toggle="modal" href=""> <i class="fa fa-lock"></i> Login </a></p>
                <?php } ?>
              
              </div>
            </div>
          </div>
        </div> 
        <div style="min-height: 30px;"></div>
        <div class="navbar navbar-default navbar-static-top" > 
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Opportunity Junction<!-- <img src="plugins/home-plugins/img/logo.png" alt="logo"/> --></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="<?php echo !isset($_GET['q'])? 'active' :''?>"><a href="index.php">Home</a></li> 
                        <li class="dropdown">
                          <a href="#" data-toggle="dropdown" class="dropdown-toggle">Job Search <b class="caret"></b></a>
                          <ul class="dropdown-menu">
                              <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='advancesearch'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="index.php?q=advancesearch">Advance Search</a></li>
                              <li><a href="index.php?q=search-company">Job By Company</a></li>
                              <li><a href="index.php?q=search-function">Job By Function</a></li>
                              <li><a href="index.php?q=search-jobtitle">Job By Title</a></li>
                         <!--      <li><a href="#">Job for Women</a></li>
                              <li><a href="#">Job for Men</a></li> -->
                          </ul>
                       </li> 
                      <li class="dropdown <?php  if(isset($_GET['q'])) { if($_GET['q']=='category'){ echo 'active'; }else{ echo ''; }}  ?>">
                          <a href="#" data-toggle="dropdown" class="dropdown-toggle">Popular Jobs <b class="caret"></b></a>
                          <ul class="dropdown-menu">
                            <?php 
                            $sql = "SELECT * FROM `tblcategory` LIMIT 10";
                            $mydb->setQuery($sql);
                            $cur = $mydb->loadResultList();

                            foreach ($cur as $result) {
                              # code...

                                if (isset($_GET['search'])) {
                                  # code...
                                   if ($result->CATEGORY==$_GET['search']) {
                                     # code...
                                    $viewresult = '<li class="active"><a href="index.php?q=category&search='.$result->CATEGORY.'">'.$result->CATEGORY.' Jobs</a></li>';
                                   }else{
                                    $viewresult = '<li><a href="index.php?q=category&search='.$result->CATEGORY.'">'.$result->CATEGORY.' Jobs</a></li>';
                                   }
                                }else{
                                    $viewresult = '<li><a href="index.php?q=category&search='.$result->CATEGORY.'">'.$result->CATEGORY.' Jobs</a></li>';
                                } 

                                echo $viewresult;

                              }

                            ?> 
                          </ul>
                       </li> 
                        <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='company'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="index.php?q=company">Company</a></li>
                        <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='hiring'){ echo 'active'; }else{ echo ''; }} ?>"><a href="index.php?q=hiring">Hiring Now</a></li>
                        <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='About'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="index.php?q=About">About Us</a></li>
                        <li class="<?php  if(isset($_GET['q'])) { if($_GET['q']=='Contact'){ echo 'active'; }else{ echo ''; }}  ?>"><a href="index.php?q=Contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>  
  </header>

  <!-- end header -->  

  <?php
    if (!isset($_SESSION['APPLICANTID'])) { 
      include("login.php");
    }
  ?>
      <?php

      if (isset($_GET['q'])) {
        # code...
        echo '<section id="inner-headline">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="pageTitle">'.$title.'</h2>
                    </div>
                </div>
            </div>
            </section>';
      }


       require_once $content;

        ?>   
 
  <footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4">
        <div class="widget">
          <h4 class="widgetheading">Contact US</h4>
          <address>
          <strong>Our Company</strong><br>
          Pune Main Road, Near Warje<br>
           Pin-411058 INDIA.</address>
          <p>
            <i class="icon-phone"></i> 91+ 9975616377 <br>
            <i class="icon-envelope-alt"></i> shubhamjadhav7718@gmail.com
          </p>
        </div>
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="widget">
          <h4 class="widgetheading">Quick Links</h4>
          <ul class="link-list">
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php?q=company">Company</a></li>
            <li><a href="index.php?q=hiring">Hiring</a></li>
            <li><a href="index.php?q=About">About us</a></li>
          </ul>
        </div>
      </div>
      <div class="col-md-4 col-sm-4">
        <div class="widget">
          <h4 class="widgetheading">Latest posts</h4>
          <ul class="link-list">
            <?php 
                  $sql = "SELECT * FROM `tblcompany` c,`tbljob` j WHERE c.`COMPANYID`=j.`COMPANYID`   ORDER BY DATEPOSTED DESC LIMIT 3" ;
                  $mydb->setQuery($sql);
                  $cur = $mydb->loadResultList();


                  foreach ($cur as $result) {
                    echo ' <li><a href="index.php?q=viewjob&search='.$result->JOBID.'">'.$result->COMPANYNAME . '/ '. $result->OCCUPATIONTITLE .'</a></li>';
                  } 
              ?> 
          </ul>
        </div>
      </div>

    </div>
  </div>
  <div id="sub-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="copyright">
            <p>
              <span>&copy; 2024 OPPORTUNITY JUNCTION DONE BY SHUBHAM  
            </p>
          </div>
        </div>
       
      </div>
    </div>
  </div>
  </footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
 <img src="cb.png" alt="Chatbot" id="chatbot-image">

<!-- Chatbot Container -->
<div id="chatbot-container">
    <iframe id="chatbot-iframe" src="https://webchat.botframework.com/embed/opportunitychatbot-bot?s=XtJueMDHQFM.bKWWk9oq1TjFQjRqSAAb2mC8TcUQl7i4Xx74FBuu5kU"></iframe>
</div>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="plugins/home-plugins/js/jquery.js"></script>
<script src="plugins/home-plugins/js/jquery.easing.1.3.js"></script>
<script src="plugins/home-plugins/js/bootstrap.min.js"></script>
 

<script type="text/javascript" src="plugins/dataTables/dataTables.bootstrap.min.js" ></script>  
<script src="plugins/datatables/jquery.dataTables.min.js"></script> 

<script type="text/javascript" src="plugins/datepicker/bootstrap-datepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="plugins/datepicker/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="plugins/datepicker/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>

<script type="text/javascript" language="javascript" src="plugins/input-mask/jquery.inputmask.js"></script> 
<script type="text/javascript" language="javascript" src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script> 
<script type="text/javascript" language="javascript" src="plugins/input-mask/jquery.inputmask.extensions.js"></script> 

<script src="plugins/home-plugins/js/jquery.fancybox.pack.js"></script>
<script src="plugins/home-plugins/js/jquery.fancybox-media.js"></script>  
<script src="plugins/home-plugins/js/jquery.flexslider.js"></script>
<script src="plugins/home-plugins/js/animate.js"></script>


<!-- Vendor Scripts -->
<script src="plugins/home-plugins/js/modernizr.custom.js"></script>
<script src="plugins/home-plugins/js/jquery.isotope.min.js"></script>
<script src="plugins/home-plugins/js/jquery.magnific-popup.min.js"></script>
<script src="plugins/home-plugins/js/animate.js"></script>
<script src="plugins/home-plugins/js/custom.js"></script> 
<!-- <script src="plugins/paralax/paralax.js"></script>  -->

 <script type="text/javascript">
   
     $(function () {
    $("#dash-table").DataTable();
    $('#dash-table2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });


     $("#btnlogin").click(function(){
        var username = document.getElementById("user_email");
        var pass = document.getElementById("user_pass");

        // alert(username.value)
        // alert(pass.value)
        if(username.value=="" && pass.value==""){   
          $('#loginerrormessage').fadeOut(); 
                $('#loginerrormessage').fadeIn();  
                $('#loginerrormessage').css({ 
                        "background" :"red",
                        "color"      : "#fff",
                        "padding"    : "5px;"
                    }); 
          $("#loginerrormessage").html("Invalid Username and Password!");
          //  $("#loginerrormessage").css(function(){ 
          //   "background-color" : "red";
          // });
        }else{

          $.ajax({    //create an ajax request to load_page.php
              type:"POST",  
              url: "process.php?action=login",    
              dataType: "text",  //expect html to be returned  
              data:{USERNAME:username.value,PASS:pass.value},               
              success: function(data){   
                // alert(data);
                $('#loginerrormessage').fadeOut(); 
                $('#loginerrormessage').fadeIn();  
                $('#loginerrormessage').css({ 
                        "background" :"red",
                        "color"      : "#fff",
                        "padding"    : "5px;"
                    }); 
               $('#loginerrormessage').html(data);   
              } 
              }); 
          }
        });


$('input[data-mask]').each(function() {
  var input = $(this);
  input.setMask(input.data('mask'));
});


$('#BIRTHDATE').inputmask({
  mask: "2/1/y",
  placeholder: "mm/dd/yyyy",
  alias: "date",
  hourFormat: "24"
});
$('#HIREDDATE').inputmask({
  mask: "2/1/y",
  placeholder: "mm/dd/yyyy",
  alias: "date",
  hourFormat: "24"
});

$('.date_picker').datetimepicker({
  format: 'mm/dd/yyyy',
  startDate : '01/01/1950', 
  language:  'en',
  weekStart: 1,
  todayBtn:  1,
  autoclose: 1,
  todayHighlight: 1, 
  startView: 2,
  minView: 2,
  forceParse: 0 

});
  const chatbotImage = document.getElementById('chatbot-image');
    const chatbotContainer = document.getElementById('chatbot-container');

    // Add click event listener to the chatbot image
    chatbotImage.addEventListener('click', () => {
        // Toggle the display of the chatbot container
        chatbotContainer.style.display = chatbotContainer.style.display === 'block' ? 'none' : 'block';
    });
 </script>

</body>
</html>
 