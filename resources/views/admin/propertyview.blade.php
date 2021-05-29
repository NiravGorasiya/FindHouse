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
<link rel="stylesheet" href="{{asset('asset_admin/css/responsive.css')}}">
<title>FindHouse - Real Estate HTML Template</title>
<link href="{{asset('asset_admin/images/favicon.ico')}}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="{{asset('asset_admin/images/favicon.ico')}}" sizes="128x128" rel="shortcut icon" />
</head>
<body>
<div class="wrapper">
	<div class="preloader"></div>
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
					<div class="tab-content container" id="myTabContent">
					  	<div class="row mt25 tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					  		<div class="col-lg-6 col-xl-6">
					  			<div class="login_thumb">
					  				<img class="img-fluid w100" src="{{asset('asset_admin/images/resource/login.jpg')}}" alt="login.jpg">
					  			</div>
					  		</div>
					  	</div>
					  	<div class="row mt25 tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					  		<div class="col-lg-6 col-xl-6">
					  			<div class="regstr_thumb">
					  				<img class="img-fluid w100" src="{{asset('asset_admin/images/resource/regstr.jpg')}}" alt="regstr.jpg">
					  			</div>
					  		</div>
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
	                    <li><a href="index.html">Home 1</a></li>
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
				<li><span>Blog</span>
					<ul>
	                    <li><a href="page-blog-v1.html">Blog List 1</a></li>
	                    <li><a href="page-blog-grid.html">Blog List 2</a></li>
	                    <li><a href="page-blog-single.html">Single Post</a></li>
					</ul>
				</li>
				<li><a href="page-contact.html">Contact</a></li>
				<li><a href="page-login.html"><span class="flaticon-user"></span> Login</a></li>
				<li><a href="page-register.html"><span class="flaticon-edit"></span> Register</a></li>
				<li class="cl_btn"><a class="btn btn-block btn-lg btn-thm circle" href="#"><span class="flaticon-plus"></span> Create Listing</a></li>
			</ul>
		</nav>
	</div>
	<section class="listing-title-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-xl-8">
					<div class="single_property_title mt30-767">
						<h2>Luxury Family Home</h2>
						<p>{{$propertyview->address}}</p>
					</div>
				</div>
				<div class="col-lg-5 col-xl-4">
					<div class="single_property_social_share mt20">
						<div class="spss float-left fn-400">
							<ul class="mb0">
								<li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
								<li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
								<li class="list-inline-item"><a href="#"><span class="flaticon-share"></span></a></li>
								<li class="list-inline-item"><a href="#"><span class="flaticon-printer"></span></a></li>
							</ul>
						</div>
						<div class="price text-right tal-400">
							<h2>{{$propertyview->price}}<small>/mo</small></h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <?PHP 
            $count=1;                          
	?> 
	<section class="listing-title-area p0">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 p0">
					<div class="listing_single_property_slider">
                    @foreach(explode(',',$propertyview->image) as $images)
						<div class="item">
							<img class="img-fluid" src="{{ asset('images/product/'.$images)}}" alt="lsslider1.jpg">
						</div>
					@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
    <?php
      $count++;
    ?>
	<section class="our-agent-single pb30-991">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-8">
					<div class="row">
						<div class="col-lg-12">
							<div class="listing_single_description">
								<div class="lsd_list">
									<ul class="mb0">
										<li class="list-inline-item"><a href="#">Apartment</a></li>
										<li class="list-inline-item"><a href="#">Beds:{{$propertyview->bedrooms}}</a></li>
										<li class="list-inline-item"><a href="#">Baths:{{$propertyview->bathrooms}}</a></li>
										<li class="list-inline-item"><a href="#">Sq Ft:{{$propertyview->size_prefix}}</a></li>
									</ul>
								</div>
								<h4 class="mb30">Description</h4>
						    	<p class="mb25">{{$propertyview->description}}</p>
						    	<p class="gpara second_para white_goverlay mt10 mb10">  {{$propertyview->description}}</p>
								<div class="collapse" id="collapseExample">
								  	<div class="card card-body">
								    	<p class="mt10 mb10">{{$propertyview->description}}</p>
								    	<p class="mt10 mb10">Fully furnished. Elegantly appointed condominium unit situated on premier location. PS6. The wide entry hall leads to a large living room with dining area. This expansive 2 bedroom and 2 renovated marble bathroom apartment has great windows. Despite the interior views, the apartments Southern and Eastern exposures allow for lovely natural light to fill every room. The master suite is surrounded by handcrafted milkwork and features incredible walk-in closet and storage space.</p>
								  	</div>
								</div>
								<p class="overlay_close">
									<a class="text-thm fz14" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
								   	 Show More <span class="flaticon-download-1 fz12"></span>
								  	</a>
								</p>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="additional_details">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb15">Property Details</h4>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-4">
										<ul class="list-inline-item">
											<li><p>Price :</p></li>
											<li><p>Property Size :</p></li>
											<li><p>Year Built :</p></li>
										</ul>
										<ul class="list-inline-item">
											<li><p><span>${{$propertyview->price}}</span></p></li>
											<li><p><span>{{$propertyview->size_prefix}}Sq Ft</span></p></li>
											<li><p><span>{{$propertyview->year_built}}</span></p></li>
										</ul>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-4">
										<ul class="list-inline-item">
											<li><p>Bedrooms :</p></li>
											<li><p>Bathrooms :</p></li>
											<li><p>Garage :</p></li>
										</ul>
										<ul class="list-inline-item">
											<li><p><span>{{$propertyview->bedrooms}}</span></p></li>
											<li><p><span>{{$propertyview->bathrooms}}</span></p></li>
											<li><p><span>{{$propertyview->garages}}</span></p></li>
										</ul>
									</div>
									<div class="col-md-6 col-lg-6 col-xl-4">
										<ul class="list-inline-item">
											<li><p>Property Type :</p></li>
											<li><p>Property Status :</p></li>
										</ul>
										<ul class="list-inline-item">
											<li><p><span>Apartment</span></p></li>
											<li><p><span>For Sale</span></p></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="property_attachment_area">
								<h4 class="mb30">Property Attachments</h4>
								<div class="iba_container style2">
									<div class="icon_box_area style2">
										<div class="score"><span class="flaticon-document text-thm fz30"></span></div>
										<div class="details">
											<h5><span class="flaticon-download text-thm pr10"></span><a href="/download/{{$propertyview->file}}"> Demo Word Document</a></h5>
										</div>
									</div>
									<div class="icon_box_area style2">
										<div class="score"><span class="flaticon-pdf text-thm fz30"></span></div>
										<div class="details">
											<h5><span class="flaticon-download text-thm pr10"></span><a href="/download/{{$propertyview->file}}"> pdf Download</a></h5>

										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="application_statics mt30">
							
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb10">Amenities</h4>
									</div>
									@foreach(explode(',',$propertyview->amenities) as $amenities)
									<div class="col-sm-6 col-md-6 col-lg-4">
										<ul class="order_list list-inline-item">
											<li><a href="#"><span class="flaticon-tick"></span>{{$amenities}}</a></li>
											
										</ul>
									</div>
									@endforeach		
								</div>
							
							</div>
						</div>
						<div class="col-lg-12">
							<div class="application_statics mt30">
								<div class="row">
									<div class="col-lg-12">
										<h4 class="mb10">Features</h4>
									</div>
									<!-- @foreach(explode(',',$propertyview->amenities) as $amenities)
									<div class="col-sm-6 col-md-6 col-lg-4">
										<ul class="order_list list-inline-item">
											<li><a href="#"><span class="flaticon-tick"></span>{{$amenities}}</a></li>
											
										</ul>
									</div>
									@endforeach		 -->
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="application_statics mt30">
								<h4 class="mb30">Floor plans</h4>
								<div class="faq_according style2">
									<div class="accordion" id="accordionExample">
									  	<div class="card floor_plan">
										    <div class="card-header" id="headingOne">
										    	<h2 class="mb-0">
										        	<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										        		<ul class="mb0">
										        			<li class="list-inline-item">First Floor</li>
										        			<li class="list-inline-item"><p>Size:</p> <span>1267 Sqft</span></li>
										        			<li class="list-inline-item"><p>Rooms:</p> <span>670 Sqft</span></li>
										        			<li class="list-inline-item"><p>Baths:</p> <span>530 Sqft</span></li>
										        			<li class="list-inline-item"><p>Price:</p> <span>$1489</span></li>
										        		</ul>
										        	</button>
										   		</h2>
										    </div>
										    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample" style="">
											    <div class="card-body text-center">
											    	<img class="img-fluid" src="{{asset('asset_admin/images/resource/floor_plan.png')}}" alt="floor_plan.png">
									        		<p>Plan description. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
											    </div>
										    </div>
									    </div>
									    <div class="card floor_plan">
									    	<div class="card-header active" id="headingTwo">
									    		<h2 class="mb-0">
									        		<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
										        		<ul class="mb0">
										        			<li class="list-inline-item">First Floor</li>
										        			<li class="list-inline-item"><p>Size:</p> <span>1267 Sqft</span></li>
										        			<li class="list-inline-item"><p>Rooms:</p> <span>670 Sqft</span></li>
										        			<li class="list-inline-item"><p>Baths:</p> <span>530 Sqft</span></li>
										        			<li class="list-inline-item"><p>Price:</p> <span>$1489</span></li>
										        		</ul>
										        	</button>
									    		</h2>
									    	</div>
									    	<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
									      		<div class="card-body text-center">
											    	<img class="img-fluid" src="{{asset('asset_admin/images/resource/floor_plan.png')}}" alt="floor_plan.png">
									        		<p>Plan description. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
									     		 </div>
									    	</div>
									    </div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="shop_single_tab_content style2 bdr1 mt30">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
									    <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Property video</a>
									</li>
									<li class="nav-item">
									    <a class="nav-link" id="listing-tab" data-toggle="tab" href="#listing" role="tab" aria-controls="listing" aria-selected="false">Virtual Tour</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent2">
									<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
										<div class="property_video">
											<div class="thumb">
												<img class="pro_img img-fluid w100" src="{{asset('asset_admin/images/background/7.jpg')}}" alt="7.jpg">
												<div class="overlay_icon">
													<a class="video_popup_btn red popup-youtube popup-img" href="{{($propertyview->video_url)}}"><span class="flaticon-play"></span></a>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane fade row pl15 pl0-1199 pr15 pr0-1199" id="listing" role="tabpanel" aria-labelledby="listing-tab">
										<div class="property_video">
											<div class="thumb">
												<img class="pro_img img-fluid w100" src="{{asset('asset_admin/images/background/7.jpg')}}" alt="7.jpg">
												<div class="overlay_icon">
													<a class="video_popup_btn red popup-youtube popup-img" href="https://www.youtube.com/watch?v=Jrs5yji5bb0"><span class="flaticon-play"></span></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-xl-4">
					<div class="sidebar_listing_list">
						<div class="sidebar_advanced_search_widget">
							<div class="sl_creator">
								<h4 class="mb25">Listed By</h4>
								<div class="media">
									<img class="mr-3" src="{{asset('asset_admin/images/team/lc1.png')}}" alt="lc1.png">
									<div class="media-body">
								    	<h5 class="mt-0 mb0">ddd</h5>
								    	<p class="mb0">(123)456-7890</p>
								    	<p class="mb0"><a href="https://grandetest.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="fc95929a93bc9a9592989493898f99d29f9391">[email&#160;protected]</a></p>
								    	<a class="text-thm" href="#">View My Listing</a>
								  	</div>
								</div>
							</div>
							<ul class="sasw_list mb0">
								<li class="search_area">
								    <div class="form-group">
								    	<input type="text" class="form-control" id="exampleInputName1" placeholder="Your Name">
								    </div>
								</li>
								<li class="search_area">
								    <div class="form-group">
								    	<input type="number" class="form-control" id="exampleInputName2" placeholder="Phone">
								    </div>
								</li>
								<li class="search_area">
								    <div class="form-group">
								    	<input type="email" class="form-control" id="exampleInputEmail" placeholder="Email">
								    </div>
								</li>
								<li class="search_area">
		                            <div class="form-group">
		                                <textarea id="form_message" name="form_message" class="form-control required" rows="5" required="required" placeholder="I'm interest in [ Listing Single ]"></textarea>
		                            </div>
								</li>
								<li>
									<div class="search_option_button">
									    <button type="submit" class="btn btn-block btn-thm">Search</button>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="terms_condition_widget">
						<h4 class="title">Categories Property</h4>
						<div class="widget_list">
							<ul class="list_details">
								<li><a href="#"><i class="fa fa-caret-right mr10"></i>Apartment <span class="float-right">6 properties</span></a></li>
								<li><a href="#"><i class="fa fa-caret-right mr10"></i>Condo <span class="float-right">12 properties</span></a></li>
								<li><a href="#"><i class="fa fa-caret-right mr10"></i>Family House <span class="float-right">8 properties</span></a></li>
								<li><a href="#"><i class="fa fa-caret-right mr10"></i>Modern Villa <span class="float-right">26 properties</span></a></li>
								<li><a href="#"><i class="fa fa-caret-right mr10"></i>Town House <span class="float-right">89 properties</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<a class="scrollToHome" href="#"><i class="flaticon-arrows"></i></a>
</div>
<script type="text/javascript" src="{{asset('asset_admin/js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/jquery-migrate-3.0.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/jquery.mmenu.all.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/ace-responsive-menu.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/isotop.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/snackbar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/simplebar.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/parallax.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/scrollto.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/jquery-scrolltofixed-min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/jquery.counterup.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/progressbar.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/slider.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/pricing-slider.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/timepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_admin/js/script.js')}}"></script>
</body>
</html>
