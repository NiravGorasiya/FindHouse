<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="advanced search custom, agency, agent, business, clean, corporate, directory, google maps, homes, listing, membership packages, property, real estate, real estate agent, realestate agency, realtor">
<meta name="description" content="FindHouse - Real Estate HTML Template">
<meta name="CreativeLayers" content="ATFN">
<link rel="stylesheet" href="{{asset('asset_front/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('asset_front/css/style.css')}}">
<link rel="stylesheet" href="{{asset('asset_front/css/responsive.css')}}">
<title>FindHouse - Real Estate HTML Template</title>
<link href="{{asset('asset_front/images/favicon.ico')}}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="{{asset('asset_front/images/favicon.ico')}}" sizes="128x128" rel="shortcut icon" />
</head>
<body>
<div class="wrapper">
	<div class="preloader"></div>
	<header class="header-nav menu_style_home_one style2 navbar-scrolltofixed stricky main-menu">
		<div class="container-fluid p0">
		    <nav>
		        
		        <div class="menu-toggle">
		            <img class="nav_logo_img img-fluid" src="{{asset('asset_front/images/header-logo.png')}}" alt="header-logo.png">
		            <button type="button" id="menu-btn">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		        </div>
		        <a href="#" class="navbar_brand float-left dn-smd">
		            <img class="logo1 img-fluid" src="{{asset('asset_front/images/header-logo2.png')}}" alt="header-logo.png">
		            <img class="logo2 img-fluid" src="{{asset('asset_front/images/header-logo2.png')}}" alt="header-logo2.png">
		            <span>FindHouse</span>
		        </a>
		        <ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">
		            <li>
		                <a href="{{url('/')}}"><span class="title">Home</span></a>
		            </li>
		            <li>
		                <a href="#"><span class="title">Property</span></a>
		                <ul>
		                    <li>
		                        <a href="{{url('agent/details')}}">Agent</a>
		                    </li>
		                </ul>
		            </li>
		            <li class="last">
		                <a href="page-contact.html"><span class="title">Contact</span></a>
		            </li>
	               
	               
		        </ul>
		    </nav>
		</div>
	</header>
	<div class="sign_up_modal modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      	</div>
		      	<div class="modal-body container pb20">
		      		<div class="row">
		      			<div class="col-lg-12">
				    		<ul class="sign_up_tab nav nav-tabs" id="myTab" role="tablist">
							  	<li class="nav-item">
							    	<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Login</a>
							  	</li>
							  	<li class="nav-item">
							    	<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Register</a>
							  	</li>
							</ul>
		      			</div>
		      		</div>
		      	</div>
		    </div>
		</div>
	</div>
	<div id="page" class="stylehome1 h0">
		<div class="mobile-menu">
			<div class="header stylehome1">
				<div class="main_logo_home2 text-center">
		            <img class="nav_logo_img img-fluid mt20" src="{{asset('asset_front/images/header-logo2.png')}}" alt="header-logo2.png">
		            <span class="mt20">FindHouse</span>
				</div>
				<ul class="menu_bar_home2">
	                <li class="list-inline-item list_s"><a href="page-register.html"><span class="flaticon-user"></span></a></li>
					<li class="list-inline-item"><a href="#menu"><span></span></a></li>
				</ul>
			</div>
		</div>
		<nav id="menu" class="stylehome1">
			<ul>
				<li><span>Home</span>
	                <ul>
	                    <li><a href="index.html">Home 1</a></li>
	                    <li><a href="index2.html">Home 2</a></li>
	                    <li><a href="index3.html">Home 3</a></li>
	                    <li><a href="index4.html">Home 4</a></li>
	                    <li><a href="index5.html">Home 5</a></li>
	                    <li><a href="index6.html">Home 6</a></li>
	                    <li><a href="index7.html">Home 7</a></li>
	                    <li><a href="index8.html">Home 8</a></li>
	                    <li><a href="index9.html">Home 9</a></li>
	                    <li><a href="index10.html">Home 10</a></li>
	                </ul>
				</li>
				<li><span>Property</span>
					<ul>
						<li><span>Property</span>
							<ul>
					            <li><a href="page-dashboard.html">Dashboard</a></li>
			                    <li><a href="page-my-properties.html">My Properties</a></li>
			                    <li><a href="page-add-new-property.html">Add New Property</a></li>
							</ul>
						</li>
						<li><span>Listing Single</span>
							<ul>
	                            <li><a href="page-listing-single-v1.html">Single V1</a></li>
	                            <li><a href="page-listing-single-v2.html">Single V2</a></li>
	                            <li><a href="page-listing-single-v3.html">Single V3</a></li>
	                            <li><a href="page-listing-single-v4.html">Single V4</a></li>
	                            <li><a href="page-listing-single-v5.html">Single V5</a></li>
							</ul>
						</li>
					</ul>
				</li>
				<li><a href="page-contact.html">Contact</a></li>
			</ul>
		</nav>
	</div>
	<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6">
					<div class="breadcrumb_content">
						<h4 class="breadcrumb_title">Register</h4>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="#">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Register</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="our-log-reg bgc-fa">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-6 offset-lg-3">
					<div class="sign_up_form inner_page">
						<div class="heading">
							<h3 class="text-center">Password Change</h3>
						</div>
						<div class="details">
							<form  id="frmupdatepassword">
                            @csrf
								<div class="form-group" >
							    	<input type="password" class="form-control" name="password" id="exampleInputPassword4" placeholder="Password" required>
								</div>
								<div class="form-group custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="exampleCheck3">
                                    <span id="password_error" class="text-danger"></sapn>
								</div>
								<button type="submit" class="btn btn-log btn-block btn-thm2" id="btnupdatepassword">Update Password</button>
							</form>
                            <div class="text-danger" id="thank_you_msg"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="footer_one">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 pr0 pl0">
					<div class="footer_about_widget">
						<h4>About Site</h4>
						<p>We’re reimagining how you buy, sell and rent. It’s now easier to get into a place you love. So let’s do this, together.</p>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<div class="footer_qlink_widget">
						<h4>Quick Links</h4>
						<ul class="list-unstyled">
							<li><a href="#">About Us</a></li>
							<li><a href="#">Terms & Conditions</a></li>
							<li><a href="#">User’s Guide</a></li>
							<li><a href="#">Support Center</a></li>
							<li><a href="#">Press Info</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<div class="footer_contact_widget">
						<h4>Contact Us</h4>
						<ul class="list-unstyled">
							<li><a href="#"><span class="__cf_email__" data-cfemail="bad3d4dcd5fadcd3d4ded2d5cfc9df94d9d5d7">[email&#160;protected]</span></a></li>
							<li><a href="#">Collins Street West, Victoria</a></li>
							<li><a href="#">8007, Australia.</a></li>
							<li><a href="#">+1 246-345-0699</a></li>
							<li><a href="#">+1 246-345-0695</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
					<div class="footer_social_widget">
						<h4>Follow us</h4>
						<ul class="mb30">
							<li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
						</ul>
						<h4>Subscribe</h4>
						<form class="footer_mailchimp_form">
						 	<div class="form-row align-items-center">
							    <div class="col-auto">
							    	<input type="email" class="form-control mb-2" id="inlineFormInput" placeholder="Your email">
							    </div>
							    <div class="col-auto">
							    	<button type="submit" class="btn btn-primary mb-2"><i class="fa fa-angle-right"></i></button>
							    </div>
						  	</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="footer_middle_area pt40 pb40">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-xl-6">
					<div class="footer_menu_widget">
						<ul>
							<li class="list-inline-item"><a href="#">Home</a></li>
							<li class="list-inline-item"><a href="#">Listing</a></li>
							<li class="list-inline-item"><a href="#">Property</a></li>
							<li class="list-inline-item"><a href="#">Pages</a></li>
							<li class="list-inline-item"><a href="#">Blog</a></li>
							<li class="list-inline-item"><a href="#">Contact</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6 col-xl-6">
					<div class="copyright-widget text-right">
						<p>© 2020 Find House. Made with love.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
<a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a>
</div>
<script type="text/javascript" src="{{asset('asset_front/js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/jquery-migrate-3.0.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/jquery.mmenu.all.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/ace-responsive-menu.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/snackbar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/simplebar.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/parallax.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/scrollto.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/jquery-scrolltofixed-min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/jquery.counterup.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/progressbar.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/slider.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/timepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/wow.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('asset_front/js/script.js')}}"></script>
<script>
$('#frmupdatepassword').submit(function(e){
  $('#thank_you_msg').html("Please wait...");
	$('#thank_you_msg').html('');
	e.preventDefault();
	$.ajax({
        url:'/forgot_password_change_process',
		data:$('#frmupdatepassword').serialize(),
		type:'post',
		success:function(result){
			console.log(result);
            $('#frmupdatepassword')[0].reset();
			$('#thank_you_msg').html(result.msg);
		}
	});
});
</script>
</body>
</html>