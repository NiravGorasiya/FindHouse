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
<title>FindHouse - Real Estate HTML Template</title>
<link href="{{asset('asset_admin/images/favicon.ico')}}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="{{asset('asset_admin/images/favicon.ico')}}" sizes="128x128" rel="shortcut icon" />
</head>
<body>
<div class="wrapper">
	<div class="preloadeer"></div>
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
		            <li>
		                <a href="{{('/')}}"><span class="title">Home</span></a>
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
		<nav id="menu" class="stylehome1">
			<ul>
				<li><span>Home</span>
	                <ul>
	                    <li><a href="{{url('/')}}">Home</a></li>
	                </ul>
				</li>
				
				<li><span>Property</span>
					<ul>
						<li><span>Property</span>
							<ul>
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
				<li><span>Blog</span>
					<ul>
	                    <li><a href="page-blog-v1.html">Blog List 1</a></li>
	                    <li><a href="page-blog-grid.html">Blog List 2</a></li>
	                    <li><a href="page-blog-single.html">Single Post</a></li>
					</ul>
				</li>
				<li><span>Pages</span>
					<ul>
						<li><span>Shop</span>
							<ul>
			                    <li><a href="page-shop.html">Shop</a></li>
			                    <li><a href="page-shop-single.html">Shop Single</a></li>
			                    <li><a href="page-shop-cart.html">Cart</a></li>
			                    <li><a href="page-shop-checkout.html">Checkout</a></li>
			                    <li><a href="page-shop-order.html">Order</a></li>
							</ul>
						</li>
		                <li><a href="page-about.html">About Us</a></li>
		                <li><a href="page-gallery.html">Gallery</a></li>
		                <li><a href="page-faq.html">Faq</a></li>
					</ul>
				</li>
				<li><a href="page-contact.html">Contact</a></li>
			</ul>
		</nav>
	</div>

    <div class="dashboard_sidebar_menu dn-992">
	    <ul class="sidebar-menu">
	   		<li class="header"><img src="{{asset('asset_admin/images/header-logo2.png')}}" alt="header-logo2.png"> FindHouse</li>
	   		<li class="title"><span>Main</span></li>
	      	<li><a href="{{url('user/wishlist')}}"><i class="flaticon-heart"></i> <span> My Favorites</span></a></li>
	      
	     	<li class="treeview">
		        <a href="page-my-review.html"><i class="flaticon-chat"></i><span> Reviews</span><i class="fa fa-angle-down pull-right"></i></a>
		        <ul class="treeview-menu">
		        	<li><a href="{{url('/user/review')}}"><i class="fa fa-circle"></i> My Reviews</a></li>
		        </ul>
	      	</li>
	   		<li class="title"><span>Manage Account</span></li>
			<li><a href="{{url('user/profile')}}"><i class="flaticon-user"></i> <span>My Profile</span></a></li>
		    <li><a href="{{url('logout')}}"><i class="flaticon-logout"></i> <span>Logout</span></a></li>
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
										<li class="active"><a href="{{url('agent/dashboard')}}"><span class="flaticon-layers"></span> Dashboard</a></li>
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
						@yield('container')
						
						
					</div>
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
        if (!files.length || !window.FileReader) return; 

        if (/^image/.test(files[0].type)) { 
            var reader = new FileReader(); 
            reader.readAsDataURL(files[0]); 

            reader.onloadend = function() { 
                uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url(" +
                    this.result + ")");
            }
        }

    });
});
</script>
</script><script type="text/javascript" src="{{asset('asset_admin/js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/jquery-migrate-3.0.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/jquery.mmenu.all.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/ace-responsive-menu.js')}}"></script>
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
@yield('custom_js')
</body>
</html>