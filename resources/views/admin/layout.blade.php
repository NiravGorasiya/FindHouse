<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="advanced search custom, agency, agent, business, clean, corporate, directory, google maps, homes, listing, membership packages, property, real estate, real estate agent, realestate agency, realtor">
<meta name="description" content="FindHouse - Real Estate HTML Template">
<meta name="CreativeLayers" content="ATFN">
<link rel="stylesheet" href="{{asset('asset_admin/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('asset_admin/css/style.css')}}">
<link rel="stylesheet" href="{{asset('asset_admin/css/dashbord_navitaion.css')}}">
<link rel="stylesheet" href="{{asset('asset_admin/css/responsive.css')}}">
<title>@yield('title')</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
<link href="{{asset('asset_admin/images/favicon.ico')}}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="{{asset('asset_admin/images/favicon.ico')}}" sizes="128x128" rel="shortcut icon" />
<link rel="stylesheet" type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">	

<style>
	/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

</style>
</head>
<body>
<div class="wrapper">
	<div class="preloader"></div>
	<header class="header-nav menu_style_home_one style2 menu-fixed main-menu">
		<div class="container-fluid p0">
		    <nav>
		        <div class="menu-toggle">
		            <img class="nav_logo_img img-fluid" src="{{asset('asset_admin/images/header-logo.png')}}" alt="header-logo.png">
		            <button type="button" id="menu-btn">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		        </div>
		        <a href="#" class="navbar_brand float-left dn-smd">
		            <img class="logo1 img-fluid" src="{{asset('asset_admin/images/header-logo2.png')}}" alt="header-logo.png">
		            <img class="logo2 img-fluid" src="{{asset('asset_admin/images/header-logo2.png')}}" alt="header-logo2.png">
		            <span>FindHouse</span>
		        </a>
		        <ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">
		           
	                <li class="user_setting">
						<div class="dropdown">
	                		<a class="btn dropdown-toggle" href="#" data-toggle="dropdown"><img class="rounded-circle" src="{{asset('asset_admin/images/team/e1.png')}}" alt="e1.png"> <span class="dn-1199">Ali Tufan</span></a>
						    <div class="dropdown-menu">
						    	<div class="user_set_header">
						    		<img class="float-left" src="{{asset('asset_admin/images/team/e1.png')}}" alt="e1.png">
							    	<p>Ali Tufan <br><span class="address"><a href="https://grandetest.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bfded3d6cbcad9ded1ffd8d2ded6d391dcd0d2">[email&#160;protected]</a></span></p>
						    	</div>
						    	<div class="user_setting_content">
									<a class="dropdown-item active" href="#">My Profile</a>
									<a class="dropdown-item" href="#">Messages</a>
									<a class="dropdown-item" href="#">Purchase history</a>
									<a class="dropdown-item" href="#">Help</a>
									<a class="dropdown-item" href="">Log out</a>
						    	</div>
						    </div>
						</div>
			        </li>
	                
		        </ul>
		    </nav>
		</div>
	</header>
	<div id="page" class="stylehome1 h0">
		<div class="mobile-menu">
			<div class="header stylehome1">
				<div class="main_logo_home2 text-center">
		            <img class="nav_logo_img img-fluid mt20" src="{{asset('asset_admin/images/header-logo2.png')}}" alt="header-logo2.png">
		            <span class="mt20">FindHouse</span>
				</div>
				<ul class="menu_bar_home2">
	                <li class="list-inline-item list_s"><a href="page-register.html"><span class="flaticon-user"></span></a></li>
					<li class="list-inline-item"><a href="#menu"><span></span></a></li>
				</ul>
			</div>
		</div>
	</div>

    <div class="dashboard_sidebar_menu dn-992">
	    <ul class="sidebar-menu">
	   		<li class="header"><img src="{{asset('asset_admin/images/header-logo2.png')}}" alt="header-logo2.png"> FindHouse</li>
	   		<li class="title"><span>Main</span></li>
	    	<li class="treeview"><a href="{{url('admin/dashboard')}}"><i class="flaticon-layers"></i><span> Dashboard</span></a></li>
	   		<li class="title"><span>Manage Listings</span></li>
			   <li class="treeview">
		        <a href="page-my-properties.html"></i> <i class="flaticon-home"></i><span>Property Type</span><i class="fa fa-angle-down pull-right"></i></a>
		        <ul class="treeview-menu">
		        	<li><a href="{{url('admin/propertype')}}"><i class="fa fa-circle"></i>Property type</a></li>
		        </ul>
		 	</li>   
	      	<li class="treeview">
		        <a href="page-my-properties.html"><i class="flaticon-home"></i> <span>My Properties</span><i class="fa fa-angle-down pull-right"></i></a>
		        <ul class="treeview-menu">
		        	<li><a href="{{url('admin/property')}}"><i class="fa fa-circle"></i>Property</a></li>
		        </ul>
	    	</li>
			  <li class="treeview">
		        <a href="page-my-properties.html"></i> <i class="fas fa-home"></i><span>Country</span><i class="fa fa-angle-down pull-right"></i></a>
		        <ul class="treeview-menu">
		        	<li><a href="{{url('admin/country')}}"><i class="fa fa-circle"></i>Country</a></li>
		        </ul>
		 	</li>
			 </li>
			  <li class="treeview">
		        <a href="page-my-properties.html"></i> <i class="flaticon-home"></i><span>State</span><i class="fa fa-angle-down pull-right"></i></a>
		        <ul class="treeview-menu">
		        	<li><a href="{{url('admin/state')}}"><i class="fa fa-circle"></i>State</a></li>
		        </ul>
		 	</li>
			 <li class="treeview">
		        <a href="page-my-properties.html"></i> <i class="flaticon-home"></i><span>City</span><i class="fa fa-angle-down pull-right"></i></a>
		        <ul class="treeview-menu">
		        	<li><a href="{{url('admin/city')}}"><i class="fa fa-circle"></i>City</a></li>
		        </ul>
		 	</li>
			 <li class="treeview">
		        <a href="page-my-properties.html"></i> <i class="flaticon-home"></i><span>List of Property</span><i class="fa fa-angle-down pull-right"></i></a>
		        <ul class="treeview-menu">
					<li><a href="{{url('admin/list/property')}}"><i class="fa fa-circle"></i>List Property</a></li>
		        	<li><a href="{{url('admin/listnew/property')}}"><i class="fa fa-circle"></i>List new Property </a></li>
		        </ul>
		 	</li>
			 <li class="treeview">
		        <a href="page-my-properties.html"><i class="flaticon-home"></i> <span>Order</span><i class="fa fa-angle-down pull-right"></i></a>
		        <ul class="treeview-menu">
		        	<li><a href="{{url('admin/order')}}"><i class="fa fa-circle"></i>Order</a></li>
		        </ul>
	    	</li>
			<li class="treeview">
		        <a href="page-my-properties.html"><i class="flaticon-home"></i> <span>Review</span><i class="fa fa-angle-down pull-right"></i></a>
		        <ul class="treeview-menu">
		        	<li><a href="{{url('admin/review')}}"><i class="fa fa-circle"></i>review</a></li>
		        </ul>
	    	</li>
	   		<li class="title"><span>Manage Account</span></li>
		    <li><a href="page-my-profile.html"><i class="flaticon-user"></i> <span>My Profile</span></a></li>
		    <li><a href="page-login.html"><i class="flaticon-logout"></i> <span>Logout</span></a></li>
	    </ul>
    </div>
	<section class="our-dashbord dashbord bgc-f7 pb50">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-xl-2 dn-992 pl0"></div>
				<div class="col-lg-9 col-xl-10 maxw100flex-992">
					<div class="row">
						<div class="col-lg-12">
							<div class="dashboard_navigationbar dn db-992">
								<div class="dropdown">
									<button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10"></i> Dashboard Navigation</button>
									<ul id="myDropdown" class="dropdown-content">
										<li class="active"><a href="page-dashboard.html"><span class="flaticon-layers"></span> Dashboard</a></li>
										<li><a href="page-message.html"><span class="flaticon-envelope"></span> Message</a></li>
										<li><a href="page-my-properties.html"><span class="flaticon-home"></span> My Properties</a></li>
										<li><a href="page-my-favorites.html"><span class="flaticon-heart"></span> My Favorites</a></li>
										<li><a href="page-my-savesearch.html"><span class="flaticon-magnifying-glass"></span> Saved Search</a></li>
										<li><a href="page-my-review.html"><span class="flaticon-chat"></span> My Reviews</a></li>
										<li><a href="page-my-packages.html"><span class="flaticon-box"></span> My Package</a></li>
										<li><a href="page-my-profile.html"><span class="flaticon-user"></span> My Profile</a></li>
										<li><a href="page-add-new-property.html"><span class="flaticon-filter-results-button"></span> Add New Listing</a></li>
										<li><a href="page-login.html"><span class="flaticon-logout"></span> Logout</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					@yield('container')
					<div class="row mt50">
						<div class="col-lg-6 offset-lg-3">
							<div class="copyright-widget text-center">
								<p>© 2020 Find House. Made with love.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(".imgAdd").click(function() {
    $(this).closest(".row").find('.imgAdd').before(
        '<div class="col-sm-3 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" name="image[]" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>'
        );
});
$(document).on("click", "i.del", function() {
    $(this).parent().remove();
});
$(function() {
    $(document).on("change", ".uploadFile", function() {
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

        if (/^image/.test(files[0].type)) { // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file

            reader.onloadend = function() { // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
                uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url(" +
                    this.result + ")");
            }
        }

    });
});
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/jquery-migrate-3.0.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/jquery.mmenu.all.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/ace-responsive-menu.js')}}"></script>
<!-- <script type="text/javascript" src="{{asset('asset_admin/js/chart.min.js')}}"></script> -->
<!-- <script type="text/javascript" src="{{asset('asset_admin/js/chart-custome.js')}}"></script> -->
<script type="text/javascript" src="{{asset('asset_admin/js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/snackbar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/simplebar.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/parallax.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/scrollto.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/jquery-scrolltofixed-min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/jquery.counterup.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/progressbar.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/slider.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/timepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/dashboard-script.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/script.js')}}"></script>



</body>

@yield('custom')
</html>