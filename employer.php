<?php
  session_start();
  if(!isset($_SESSION['email'])){
    ?>
    <script type="text/javascript">
      window.alert("You need to log in first!");
    </script>
    <?php
      header("refresh:1;url=signup.html");
      die();
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Brian - My Portfolio</title>
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="BdgPixel" name="author">
    <!--Fav-->
    <link href="images/favicon.ico" rel="shortcut icon">
    
    <!--styles-->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style2.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/font-awesome.css" rel="stylesheet">
    
    <!--fonts google-->
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    
    <!-- bin/jquery.slider.min.css -->
  <link rel="stylesheet" href="css/jslider.css" type="text/css">
  <link rel="stylesheet" href="css/jslider.blue.css" type="text/css">
  <link rel="stylesheet" href="css/jslider.plastic.css" type="text/css">
  <link rel="stylesheet" href="css/jslider.round.css" type="text/css">
  <link rel="stylesheet" href="css/jslider.round.plastic.css" type="text/css">
    <!-- end -->

  <script type="text/javascript" src="js/jquery-1.7.1.js"></script>
  
  <!-- bin/jquery.slider.min.js -->
  <script type="text/javascript" src="js/jshashtable-2.1_src.js"></script>
  <script type="text/javascript" src="js/jquery.numberformatter-1.2.3.js"></script>
  <script type="text/javascript" src="js/tmpl.js"></script>
  <script type="text/javascript" src="js/jquery.dependClass-0.1.js"></script>
  <script type="text/javascript" src="js/draggable-0.1.js"></script>
  <script type="text/javascript" src="js/jquery.slider.js"></script>
    <!-- end -->
  
  <style type="text/css" media="screen">
      body { background: #EEF0F7; }
    .layout { padding: 50px; font-family: Georgia, serif; }
    .layout-slider { margin-bottom: 60px; width: 100%; }
  </style>
  </head>
  <body>
    <!-- header starts here -->
  <div id="fb-bar">
    <div id="fb-frame">
      <div class="myList3">
          <ul>
            <li><a href="index.html#home">Home</a></li>
            <li><a href="index.html#about">About</a></li>
            <li><a href="skills.html">Skills</a></li>
            <li><a href="work.html">Work</a></li>
            <li><a href="experience.html">Experience</a></li>
            <li><a href="education.html">Education</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="blog.html">Blogs</a></li>
            <li><a href="contact.html">Contact</a></li>
          </ul>
        </div>
        <div id="logo">
        <a href="#" title="Home"><img src="images/brian.jpg"><h2>Brian Okinyi</h2></a> 
      </div>
      <div class="user">
        <h4><span><?php echo $_SESSION['username'];?></span></h4><br>
        <h5><span><?php echo $_SESSION['email'];?></span></h5>
      </div>
    </div>
  </div>
  <!-- header ends here -->
    <div class="content-wrap">
      <!--CONTENT-->
      <div class="content">
<!--EDUCATION-->
<section class="grey-bg" id="education">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <h3 class="title-small">
          <span>My Salary</span>
        </h3>
        <p class="content-detail">
          I am more interested in finding a position that is good fit for my skills and interests. I am confident that you are offering a salary that is competetive in the current market.
        </p>
      </div>
      <div class="col-md-9 content-right">
        <div class="row">
          <div class="layout">
        <div class="layout-slider" style="width: 100%">
          <span class="col-md-2"> Basic Salary</span><span style="display: inline-block; width: 400px; padding: 0 5px;"><input id="SliderSingle" type="slider" name="basic" value="500000" /></span>
        </div>
        <script type="text/javascript" charset="utf-8">
          jQuery("#SliderSingle").slider({ from: 30000, to: 5000000, step: 5000, round: 5, dimension: '&nbsp;Ksh', skin: "round" });
          
        </script>
        <!-- //End Basic Salary-->


        <div class="layout-slider">
          <span class="col-md-2">Allowances</span><span style="display: inline-block; width: 400px; padding: 0 5px;"><input id="Slider2" type="slider" name="allowances" value="100000" /></span>
        </div>
        <script type="text/javascript" charset="utf-8">
          jQuery("#Slider2").slider({ from: 10000, to: 500000, heterogeneity: ['50/50000'], step: 1000, dimension: '&nbsp; Ksh', skin: "round" });
        </script>
        <!-- //End Allowances-->

        <div class="layout-slider" style="width: 100%">
          <span class="col-md-2">Deductions</span><span style="display: inline-block; width: 400px; padding: 0 5px;"><input id="Slider1" type="slider" name="deductions" value="10000" /></span>
        </div>
        <script type="text/javascript" charset="utf-8">
          jQuery("#Slider1").slider({ from: 5000, to: 500000, step: 500, smooth: true, round: 0, dimension: "&nbsp;Ksh ", skin: "round" });
        </script>
        <!-- //End Deductions-->

        <div>
          <span class="col-md-2">Net Pay</span><input type="text" name="net" id="salary" value="" style="width: 20%; border-radius: 12px;font-family: Arial, Helvetica, sans-serif; text-align: center;"><br>
        </div>
        <div class="button">
          <span class="col-md-2"></span><input type="submit" name="submit" value="Submit" id="btn1" class="col-md-7" style="margin: 30px 0; height: 3em; border-radius: 8px; background-color: #009aff; border: 1px solid rgb(250, 250, 250); color: #fff; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">
        </div>
        
        <!-- //End Net Salary-->


      </div><!-- //End Container--> 
        </div>
      </div>
    </div>
  </div>
</section>
<!--/.EDUCATION END-->
<!--CONTACT-->
        <section id="contact" class="white-bg">
          <div class="container">
            <div class="row">
              <div class="col-md-3">
                <h3 class="title-small">
                  <span>Contact</span>
                </h3>
                <p class="content-detail">
                  Feel free to send me a message. I will reply in a few seconds.
                </p>

              </div>
              <div class="col-md-9 content-right">
                <form>
                  <div class="group">
                    <input required="" type="text"><span class="highlight"></span><span class="bar"></span><label>Name</label>
                  </div>
                  <div class="group">
                    <input required="" type="email"><span class="highlight"></span><span class="bar"></span><label>Email</label>
                  </div>
                  <div class="group">
                    <textarea required=""></textarea><span class="highlight"></span><span class="bar"></span><label>Message</label>
                  </div>
                  <input id="sendMessage" name="sendMessage" type="submit" value="Send Message">
                </form>
              </div>
            </div>
          </div>
        </section>
<!--/.CONTACT END-->

<!--FOOTER-->
        <footer>
          <div class="footer-top">
            <ul class="socials">
              <li class="facebook">
                <a href="https://facebook.com/brianokinyi" data-hover="Facebook">Facebook</a>
              </li>
              <li class="twitter">
                <a href="https://twitter.com/bryanokinyi" data-hover="Twitter">Twitter</a>
              </li>
              <li class="gplus">
                <a href="https://goolgeplus/brianokinyi" data-hover="Google +">Google +</a>
              </li>
            </ul>
          </div>

          <div class="footer-bottom">
            <div class="bottomlist">
            <h6 class="bottomtext">Brian &copy 2017 | All rights Reserved</h6>
              <div class="myList2">
                <ul>
                  <li><a href="index.html#home">Home</a></li>
                  <li><a href="index.html#home">About</a></li>
                  <li><a href="skills.html">Skills</a></li>
                  <li><a href="work.html">Work</a></li>
                  <li><a href="experience.html">Experience</a></li>
                  <li><a href="education.html">Education</a></li>
                  <li><a href="services.html">Services</a></li>
                  <li><a href="blog.html">Blogs</a></li>
                  <li><a href="contact.html">Contact</a></li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
        <!--/.FOOTER-END-->

      <!--/.CONTENT END-->
      </div>
    <!--/.CONTENT-WRAP END-->
    </div>

    <script type="text/javascript">
    jQuery(".jslider-pointer").mousedown(function(){
      $("#salary").val("200000");
      $("#salary").val(500);
    });
    jQuery("#btn1").click(function(){
      var value = $(".jslider-pointer").slider("value");
    });
  </script>
    

    <script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.appear.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/classie.js" type="text/javascript"></script>
    <script src="js/owl.carousel.min.js" type="text/javascript"></script>
    <script src="js/jquery.magnific-popup.min.js" type="text/javascript"></script>
    <script src="js/masonry.pkgd.min.js" type="text/javascript"></script>
    <script src="js/masonry.js" type="text/javascript"></script>
    <script src="js/smooth-scroll.min.js" type="text/javascript"></script>
    <script src="js/typed.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
  </body>
</html>