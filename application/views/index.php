<!DOCTYPE html>
<html lang="fr">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<base href="http://localhost/codeigniter-2.2.2/application/views/"></base>
	<title><?php echo $title; ?></title>
	<!--
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	-->
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/srweb.css">
	<script type="text/javascript" src="js/contact_form.js"></script>
	<script type="text/javascript">
		function refreshCaptcha(){
			var img = document.images['captchaimg'];
			img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
	}
	</script>
	
	<!-- header -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="css/style1.css" rel="stylesheet" type="text/css" media="all"/>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="SRweb est une agence web digitale basée à Marseille. Nous travaillons avec votre entreprise pour assurer à votre marque une place de choix et une image innovante dans un e-business en perpétuel mouvement. Nous maîtrisons les éléments clés dont vous avez besoin pour concevoir, développer et/ou vendre vos produits en ligne" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	
	<script src="js/jquery.min.js"> </script>
	<!---- start-smoth-scrolling ---->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
			});
		});
	</script>

	<!---- start-smoth-scrolling ---->

	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script>
		var myCenter=new google.maps.LatLng(43.3263138,5.3772017);
		var marker;
		function initialize(){
		var mapProp = {
		  center:myCenter,
		  zoom: 17,
		  mapTypeId:google.maps.MapTypeId.ROADMAP
		  };
		var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
		var marker=new google.maps.Marker({
		  position:myCenter,
		  animation:google.maps.Animation.BOUNCE
		  });
		marker.setMap(map);
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>

	<script>
		$(document).ready(function(){
		    $(".top-menu ul li.active").parents('li').addClass('active');
		});
	</script>
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/style7.css" />
	<script type="text/javascript" src="js/modernizr.custom.79639.js"></script> 

</head>

<body>
<?php
	//load header
	$this->load->view('header.php');
?>

<div id="home" class="banner <?php echo 'banner-'.$id; ?>">
	
	<?php if($id == 1){ ?>
		<video autoplay muted poster="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/polina.jpg" id="bgvid" loop>
			<source src="video/weblab.webm" type="video/mp4">
		</video>
	<?php
	}
	?>

	<div class="container">
		<div class="top-header">		  
			<div class="logo">
			<?php echo $this->myhome->get_logo(170, 50); ?>
			</div>		
			<div class="top-menu">
				<span class="menu"></span> 
				<nav class="cl-effect-1">
					<?php echo $this->myhome->get_menu(4, 'haha', $id); ?>
				</nav>					 
			</div>	
			<div class="clearfix"> </div>
		</div>	
		  	<div class="clearfix"> </div>
		 <!-- script-for-menu -->
		 <script>
				$("span.menu").click(function(){
					$(".top-menu ul").slideToggle("slow" , function(){
					});
				});
		 </script>
		<!-- script-for-menu -->	
<?php 
	//content
	eval('?>'.$page['content'].'<?php;'); // outputs test 
	//load footer
	$this->load->view('footer.php');
?>
