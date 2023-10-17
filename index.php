
<?php 
	require_once 'src/php/MyTemplateManager.php';
	use MyTemplateManager\MyTemplateManager;
	$myTempMgr = New MyTemplateManager();
	$lang = $myTempMgr->getLanguageCode();
?>
<!DOCTYPE HTML>
<html lang="<?php echo $lang;?>">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="<?php echo $myTempMgr->Template_Description($lang);?>">
		<meta name="keywords" content="<?php echo $myTempMgr->Template_Keywords($lang);?>">
		<meta name="author" content="Sebastian Grünwald">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="./src/fontawesome/fontawesome-free-6.4.2-web/css/all.css">
		<link rel="stylesheet" href="./src/fontawesome/fontawesome-free-6.4.2-web/css/v4-shims.min.css">
		<link rel="stylesheet" href="./src/bootstrap/bootstrap-5.3.2/dist/css/bootstrap.min.css">
		<link rel="shortcut icon" href="./src/img/Logo.svg" />
		<title>Gr&uuml;nwald Innovation</title>
		<style>
			body {
				width: 100vh;
			}
			div {
				overflow:hidden;
			}
			ul li, ul {
				font-weight: bold;
			}
			ul li li {
				font-weight:normal;
				font-style:italic;
				font-size:smaller;
			}
			.page-content-image {
				background-size: cover;
				background-repeat: no-repeat;
				background-position: center center;
				width:100%;
				height:100%;
				position:fixed;
				overflow-y: auto;
			}
			.icon-col {
				padding-left: 10px;
			}
			.icon {
				cursor:pointer;
				font-size:xx-large;
				opacity: 70%;
			}
			.icon:hover {
				opacity: 100%;
			}
			.first-text {
				vertical-align: top;
			}
			.second-text {
				vertical-align: top;
				word-wrap:break-word;
				padding-left: 10px;
			}
			.vh-100 {
				height: 100vh;
			}
			.vw-100 {
				width: 100vh;
			}
			.p-8 {
				padding: 8%;
			}
			.pv-8 {
				padding-top: 8%;
				padding-bottom: 8%;
			}
			.ph-8 {
				padding-left: 8%;
				padding-right: 8%;
			}
			ul {
				list-style-position: inside;
			}
			.img-fit {
				object-fit:contain;
			}
			.cover-container {
				min-height:100vh;
			}
			a {
				color: unset;
				cursor: pointer;
			}
			.qr {
				max-width:25%;
			}
		</style>
	</head>
	<body class="text-bg-dark">
		<div class="page-content-image" style="background-image:url('./src/img/bg.jpg');">
		<div class="cover-container vh-100 w-100 p-3 mx-auto my-auto flex-column d-flex my-auto">
			<div class="my-auto text-center ">
				<main class="px-3">
					<h1>Gr&uuml;nwald Innovation</h1>
					<i>Let software work for you</i>
				</main>
			</div>
		</div>

		<div class="cover-container vw-100 bg-black d-flex" id="sd">
			<!-- Side by side -->
			<div class="row d-flex vw-100">
			  <div class="col-xl my-auto vw-50 p-8">
				<p>
					<img class="text-left" src="./src/img/Logo_Transparent.svg" width="64px" alt="Logo">
					<img class="img-fluid ms-3" width="64px" src="./src/img/made-in-switzerland-icon.svg" alt="Made in Switzerland">
					 <a href="./?lang=en#sd" class="text-decoration-underline ms-3">EN</a> 
					 <a href="./?lang=de#sd" class="text-decoration-underline">DE</a>
				</p>
				<p class="p-3">
					<?php echo $myTempMgr->Template_ShortDescription($lang);?>
				</p>
			  </div>
			  <div class="col-xl my-auto vw-50 bg-black">
				<img class="img-fluid img-fit" src="./src/img/p1.jpg" alt="">
			  </div>
			</div>
		</div>
		<!--<div class="cover-container vw-100 bg-black d-flex text-center">
			<div class="row d-flex vw-100">
				<div class="col-xl my-auto vw-100 p-8">
					<span class="align-middle">
						<img class="img-fluid" width="10%" style="min-width: 64px;" src="./src/img/made-in-switzerland-icon.svg" alt="Made in Switzerland">
					</span>
				</div>
			</div>
		</div>-->

		  <div class="cover-container vw-100 bg-black d-flex" id="ol">
			  <!-- Side by side -->
			  <div class="row d-flex vw-100">
				<div class="col-xl my-auto vw-50 p-8">
					<p>
						<img class="text-left" src="./src/img/Logo_Transparent.svg" width="64px" alt="Logo">
					 <a href="./?lang=en#ol" class="text-decoration-underline ms-3">EN</a> 
					 <a href="./?lang=de#ol" class="text-decoration-underline">DE</a>
					</p>
					<p class="p-3">
						<?php echo $myTempMgr->Template_OfferedLanguages($lang);?>
					</p>
				</div>
				<div class="col-xl my-auto vw-50 bg-black">
				  <img class="img-fluid img-fit" src="./src/img/p2.jpg" alt="">
				</div>
			</div>
		</div>
			
		<div class="cover-container vw-100 bg-black d-flex" id="ea">
			<!-- Side by side -->
			<div class="row d-flex vw-100">
			  <div class="col-xl my-auto vw-50 p-8">
				  <p>
					  <img class="text-left" src="./src/img/Logo_Transparent.svg" width="64px" alt="Logo">
					 <a href="./?lang=en#ea" class="text-decoration-underline ms-3">EN</a> 
					 <a href="./?lang=de#ea" class="text-decoration-underline">DE</a>
				  </p>
				  <p class="p-3">
						<?php echo $myTempMgr->Template_ExampleApplicationsForAutomation($lang);?>
				  </p>
			  </div>
			  <div class="col-xl my-auto vw-50 bg-black">
				<img class="img-fluid img-fit" src="./src/img/p3.jpg" alt="">
			  </div>
		  </div>
	  </div>
	  
	  <div class="cover-container vw-100 bg-black d-flex" id="eh">
		<!-- Side by side -->
		<div class="row d-flex vw-100">
		  <div class="col-xl my-auto vw-50 p-8">
			  <p>
				  	<img class="text-left" src="./src/img/Logo_Transparent.svg" width="64px" alt="Logo">
					 <a href="./?lang=en#eh" class="text-decoration-underline ms-3">EN</a> 
					 <a href="./?lang=de#eh" class="text-decoration-underline">DE</a>
			  </p>
			  <p class="p-3">
						<?php echo $myTempMgr->Template_ExampleHardwareForAutomation($lang);?>
			  </p>
		  </div>
		  <div class="col-xl my-auto vw-50 bg-black">
			<img class="img-fluid img-fit" src="./src/img/p4.jpg" alt="">
		  </div>
	  </div>
  	</div>
	  
	<div class="cover-container vh-100 w-100 p-3 mx-auto my-auto flex-column d-flex my-auto bg-black" id="ro">
		<div class="my-auto mx-auto text-center ">
			<?php echo $myTempMgr->Template_RequestAnOffer($lang); ?>
		</div>
	</div>
	
	<!--<div class="cover-container vh-100 w-100 p-3 mx-auto my-auto flex-column d-flex my-auto bg-black">
		<div class="my-auto mx-auto text-center ">
			<a href="mailto:support@giit.ch">
				<main class="px-3">
					<h2 class="text-uppercase">Questions/Comments?</h2>
					<i>support@giit.ch</i>
				</main> 
			</a>
		</div> 
	</div>-->
	
	<div class="cover-container vh-100 w-100 p-3 mx-auto my-auto flex-column d-flex my-auto bg-black" id="sa">
		<div class="my-auto mx-auto text-center ">
			<?php echo $myTempMgr->Template_SeeAlsoQRID($lang); ?>
		</div>
	</div>
	
</body>
<!-- Footer -->
<footer class="text-center mx-auto text-lg-start bg-black" id="ft">
	<!-- Section: Social media -->
	<section class="d-flex justify-content-center justify-content-lg-between p-4 w-100">
  
	  <!-- Right -->
	  <div class="mx-auto text-center">
		<a href="https://github.com/sebiscodes" class="p-3" target="_blank"><i class="icon fab icon-lg fa-github"></i></a> 
		<a href="https://www.instagram.com/sebisprojects/" class="p-3" target="_blank"><i class="icon fab icon-lg fa-instagram"></i></a> 
		<a href="https://www.linkedin.com/in/sebastian-gr%C3%BCnwald-4b05b1137" class="p-3" target="_blank"><i class="icon icon-lg fab fa-linkedin"></i></a>
	  </div>
	  <!-- Right -->
	</section>
	<!-- Section: Social media -->
  
	<!-- Section: Links  -->
	<section class="">
	  <div class="container text-md-start mt-5">
		<!-- Grid row -->
		<div class="row mt-3">
		  <!-- Grid column -->
		  <div class="col mb-4 text-center mx-auto">
			<!-- Content -->
			<?php echo $myTempMgr->Template_Impress($lang);?>
		  </div>
		  <!-- Grid column -->
  
		  <!-- Grid column -->
		  <div class="col mb-md-0 mb-4 text-center mx-auto">
			<!-- Links -->
			<?php echo $myTempMgr->Template_Contact($lang);?>
		  </div>
		  <!-- Grid column -->
		</div>
		<!-- Grid row -->
	  </div>
	</section>
	<!-- Section: Links  -->
  
	<!-- Copyright -->
	<div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
	  © 2023 Copyright:
	  <a class="fw-bold" href="https://giit.ch/">giit.ch</a>
	</div>
	<!-- Copyright -->
  </footer>
  <!-- Footer -->
</html>