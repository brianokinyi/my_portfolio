<?php
  ob_start();
  session_start();
  if(!isset($_SESSION['email'])){
    ?>
    <script type="text/javascript">
      window.alert("You need to log in first!");
    </script>
    <?php
      header("refresh:1;url=https://brianokinyi.000webhostapp.com/signup.html");
      die();
  }  $username = $_SESSION['username'];
  $email = $_SESSION['email'];

  //Connect to database
    //Database variables for 000webhostpApp
    $servername = "localhost";
    $serveruser = "id2187064_brianokinyi";
    $serverpass = "12345678";
    $dbname = "id2187064_my_portfolio";
  
  //Local Database variables
  /*
  $servername = "localhost";
  $serveruser = "root";
  $serverpass = "";
  $dbname = "my_portfolio";
  */

  //Connect to database
  $conn = new mysqli($servername, $serveruser, $serverpass, $dbname);

  //Check connection
  if($conn->connect_error){
    die("Connection failed: ".$$conn->connect_error);
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Brian - My Boss</title>
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="description" content="I am more interested in finding a position that is good fit for my skills and interests. I am confident that you are offering a salary that is competetive in the current market.">
    <meta content="Brian Okinyi" name="author">
    <meta name="image" content="images/reza.jpg">
    <!--Fav-->
    <link href="images/favicon.ico" rel="shortcut icon">


    <!--Inline Style for table-->
    <style type="text/css">
      table{
        width: 100%;
      }
      table, tr, th, td{
          padding: 10px;

      }
      table tr th{
        text-align: center;
        color: rgb(66, 70, 72);

      }
      table td{
        color: rgb(128,128,128);
      }
    </style>
    <!--//Inline Style for table-->
    
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
  <!--PRELOADER-->
    <div id="preloader">
      <div id="status">
        <img alt="Loading" src="images/logo-big.png">
      </div>
    </div>
    <!--/.PRELOADER END-->
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
        <h4><span><a href="#"><img src="images/user.png"></a><?php echo $username;?></span></h4><br>
        <h5><span><a href="#"><img src="images/envelope.png"></a><?php echo $email;?></span></h5>
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
      <?php
        $sql = "SELECT * FROM salary WHERE email='$email'";
        $result = $conn->query($sql);
        if(!$result){
          echo "I am sorry you have no previously placed orders.";
        }else{
          echo "<table>";
          echo "<tr><th colspan=8>$username</th></tr>";
          echo "<tr>
                  <th>Order No</th>
                  <th>Basic Pay</th>
                  <th>Allowances</th>
                  <th>Deductions</th>
                  <th>Net Pay</th>
                  <th>Description</th>
                  <th>Date</th>
                </tr>";

          while($row=mysqli_fetch_array($result)){
            echo "<tr>
                    <td>$row[id]</td>
                    <td>$row[basic_pay]</td>
                    <td>$row[allowances]</td>
                    <td>$row[deductions]</td>
                    <td>$row[net_pay]</td>
                    <td>$row[description]</td>
                    <td>$row[date_time]</td>
                  </tr>";
          }
          echo "</table>";
        }
      ?>
      <div class="backpage">
        <a href="employer.php" title="Go back to orders"><< Go back</a>
    </div>
    </div>
  </div>
</section>
<!--/.EDUCATION END-->

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