<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>Employer - Brian</title>
	
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
	 .layout-slider { margin-bottom: 60px; width: 50%; }
	 .layout-slider-settings { font-size: 12px; padding-bottom: 10px; }
	 .layout-slider-settings pre { font-family: Courier; }
	</style>

</head>
<body>
	<div class="container">
	  <div class="layout">
	    <div class="layout-slider" style="width: 100%">
	      Basic Salary<span style="display: inline-block; width: 400px; padding: 0 5px;"><input id="SliderSingle" type="slider" name="price" value="500000" /></span>
	    </div>
	    <script type="text/javascript" charset="utf-8">
	      jQuery("#SliderSingle").slider({ from: 30000, to: 5000000, step: 5000, round: 5, dimension: '&nbsp;Ksh', skin: "round" });
	    </script>
	    <!-- //End Basic Salary-->


	    <div class="layout-slider">
	      Total Allowances<span style="display: inline-block; width: 400px; padding: 0 5px;"><input id="Slider2" type="slider" name="price" value="100000" /></span>
	    </div>
	    <script type="text/javascript" charset="utf-8">
	      jQuery("#Slider2").slider({ from: 10000, to: 500000, heterogeneity: ['50/50000'], step: 1000, dimension: '&nbsp; Ksh' });
	    </script>
	    <!-- //End Allowances-->

	    <div class="layout-slider" style="width: 100%">
	      Deductions <span style="display: inline-block; width: 400px; padding: 0 5px;"><input id="Slider1" type="slider" name="price" value="10000" /></span>
	    </div>
	    <script type="text/javascript" charset="utf-8">
	      jQuery("#Slider1").slider({ from: 5000, to: 500000, step: 500, smooth: true, round: 0, dimension: "&nbsp;Ksh ", skin: "plastic" });
	    </script>
	    <!-- //End Deductions--> 

	    </div><!-- //End Container--> 
	</div> 
     
</body>
</html>

<?php
?>