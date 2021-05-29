<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="advanced custom search, agency, agent, business, clean, corporate, directory, google maps, homes, idx agent, listing properties, membership packages, property, real broker, real estate, real estate agent, real estate agency, realtor">
<meta name="description" content="FindHouse - Real Estate HTML Template">
<meta name="CreativeLayers" content="ATFN">
<link rel="stylesheet" href="{{asset('asset_front/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('asset_front/css/style.css')}}">
<link rel="stylesheet" href="{{asset('asset_front/css/responsive.css')}}">
<title>FindHouse - Real Estate HTML Template</title>
<link href="{{asset('asset_front/images/favicon.ico')}}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
<link href="{{asset('asset_front/images/favicon.ico')}}" sizes="128x128" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">

</head>
<body>
<div class="wrapper">
	<div class="preloader"></div>
	<header class="header-nav menu_style_home_one navbar-scrolltofixed stricky main-menu">
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
		            <img class="logo1 img-fluid" src="{{asset('asset_front/images/header-logo.png')}}" alt="header-logo.png">
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
		                <a href="{{url('contact')}}"><span class="title">Contact</span></a>
		            </li>
                    @if(session()->has('FRONT_USER_LOGIN')!=null)
					<li><a href="{{url('logout')}}">Logout</a></li>
					@else
					<li class="list-inline-item list_s"><a href="#" class="btn flaticon-user"  onclick="login()" data-toggle="modal" data-target=".bd-example-modal-lg"> 
						<span class="dn-lg">Login/Register</span></a></li>
					@endif
	                @if(session()->has('FRONT_USER_EMAIL')!=null &&  Session::get('USER_TYPE')=="Agent")
	                <li class="list-inline-item add_listing"><a href="agent/dashboard"><span class="flaticon-plus"></span><span class="dn-lg"> Create Listing</span></a></li>
					@endif
					@if(session()->has('FRONT_USER_EMAIL')!=null &&  Session::get('USER_TYPE')=="Buyer")
	                <li class="list-inline-item add_listing"><a href="user/dashboard"><span class="flaticon-plus"></span><span class="dn-lg"> Create Listing</span></a></li>
					@endif
					
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
					  @php
					  if(isset($_COOKIE['login_email']) && isset($_COOKIE['login_pwd']))
					  {
                          $login_email=$_COOKIE['login_email'];
						  $login_pwd=$_COOKIE['login_pwd'];
						  $is_remember="checked='checked'";
					  }else{
                          $login_email='';
						  $login_pwd='';
						  $is_remember='';
					  }
					  @endphp
					  <div class="tab-content container" id="myTabContent">
					  	<div class="row mt25 tab-pane fade show active" id="popup_login" role="tabpanel" aria-labelledby="home-tab">
					  		<div class="col-lg-6 col-xl-6">
					  			<div class="login_thumb">
					  				<img class="img-fluid w100" src="{{asset('asset_front/images/resource/login.jpg')}}" alt="login.jpg">
					  			</div>
					  		</div>
					  		<div class="col-lg-6 col-xl-6">
								<div class="login_form">
									<form action="#" id="frmlogin" >
									@csrf
										<div class="heading">
											<h4>Login</h4>
										</div>
										<div class="row mt25">
										<div class="col-lg-12">
												<button type="button" class="btn btn-fb btn-block"><i class="fa fa-facebook float-left mt5"></i><a href="fbsubmit"> Login with Facebook</a></button>
											</div>
											<div class="col-lg-12">
												<button type="submit" class="btn btn-googl btn-block"><i class="fa fa-google float-left mt5"></i> Login with Google</button>
											</div>
										</div>
										<hr>
										<div class="input-group mb-2 mr-sm-2">
										    <input type="text" class="form-control"name="string_login_email" id="string_login_email" value="{{$login_email}}" placeholder="Email">
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="flaticon-user"></i></div>
										    </div>
										</div>
								
										<div class="input-group form-group">
									    	<input type="password" class="form-control" name="str_login_password" id="str_login_password" value="{{$login_pwd}}" placeholder="Password">
										    <div class="input-group-prepend">
													<div class="input-group-text"><i class="flaticon-password"></i></div>
										    </div>
										</div>
										
										<div class="form-group custom-control custom-checkbox">
											<input type="checkbox" name="rememberme" class="custom-control-input" {{$is_remember}} id="exampleCheck1">
											<label class="custom-control-label" for="exampleCheck1">Remember me</label>
											<a class="btn-fpswd float-right" href="javascript:void(0)" onclick="forgot_password()">Lost your password?</a>
										</div>
										<button type="submit" class="btn btn-log btn-block btn-thm">Log In</button>
										<p class="text-center">Don't have an account? <a class="text-thm" href="#">Register</a></p>
										<div id="login_msg" class="text-danger font-weight-bold"></div>
									</form>
								</div>
					  		</div>
					  	</div>
						  <div class="row mt25 tab-pane fade show active" id="popup_forgot" role="tabpanel" aria-labelledby="home-tab">
					  		<div class="col-lg-6 col-xl-6">
					  			<div class="login_thumb">
					  				<img class="img-fluid w100" src="{{asset('asset_front/images/resource/login.jpg')}}" alt="login.jpg">
					  			</div>
					  		</div>
					  		<div class="col-lg-6 col-xl-6">
								<div class="login_form">
									<form action="#" id="frmforgot" >
									@csrf
										<div class="heading">
											<h4>Login</h4>
										</div>
										<div class="row mt25">
											<div class="col-lg-12">
												<button type="submit" class="btn btn-fb btn-block"><i class="fa fa-facebook float-left mt5"></i> Login with Facebook</button>
											</div>
											<div class="col-lg-12">
												<button type="submit" class="btn btn-googl btn-block"><i class="fa fa-google float-left mt5"></i> Login with Google</button>
											</div>
										</div>
										<hr>
										<div class="input-group mb-2 mr-sm-2">
										    <input type="email" class="form-control" name="str_forgot_email"  placeholder="Email">
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="flaticon-user"></i></div>
										    </div>
										</div>
									
										<button type="submit" class="btn btn-log btn-block btn-thm" id="btnforgot">Submit</button>
										<p class="text-center">Don't have an account? <a class="text-thm" onclick="login()" href="#">Register</a></p>
										<div id="forgot_msg" class="text-danger font-weight-bold"></div>
									</form>
								</div>
					  		</div>
					  	</div>
						  
					  	<div class="row mt25 tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					  		<div class="col-lg-6 col-xl-6">
					  			<div class="regstr_thumb">
					  				<img class="img-fluid w100" src="{{asset('asset_front/images/resource/regstr.jpg')}}" alt="regstr.jpg">
					  			</div>
					  		</div>
					  		<div class="col-lg-6 col-xl-6">
								<div class="sign_up_form">
									
									<form action="#"method="post" id="register">
									@csrf
									<div class="heading">
											<h4>Register</h4>
										</div>
										<div class="row mt25">
											<div class="col-lg-12">
												<button type="button" class="btn btn-fb btn-block"><i class="fa fa-facebook float-left mt5"></i><a href="fbsubmit"> Login with Facebook</a></button>
											</div>
											<div class="col-lg-12">
												<button type="submit" class="btn btn-googl btn-block"><i class="fa fa-google float-left mt5"></i> <a href="/google">Login with Google</a></button>
											</div>
										</div>
									
									    <div class="form-group">
                                        I am<br>	
										<input type="radio" value="Buyer" name="user" checked>&nbsp;Buyer/Owner&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			                            <input type="radio" value="Agent" name="user">&nbsp;Agent&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										</div>
										<div class="form-group input-group">
										    <input type="text" class="form-control" name="username" id="username" placeholder="User Name">
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="flaticon-user"></i></div>
										    </div>
										</div>
										<sapn id="username_error" class="text-danger font-weight-bold"></sapn>
										<div class="form-group input-group">
										    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="fa fa-envelope-o"></i></div>
										    </div>
										</div>
										<sapn id="email_error" class="text-danger font-weight-bold"></sapn>
										<div class="form-group input-group">
											    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="flaticon-password"></i></div>
										    </div>
										</div>
										<sapn id="password_error" class="text-danger font-weight-bold" ></sapn>
										<div class="form-group input-group">
										    <input type="text" class="form-control" name="mobile" placeholder="Mobile">
										    <div class="input-group-prepend">
										    	<div class="input-group-text"><i class="fa fa-phone"></i></div>
										    </div>
										</div>
										<sapn id="mobile_error" class="text-danger font-weight-bold"></sapn>
										
										<button type="submit" id="submit" class="btn btn-log btn-block btn-thm">Sign Up</button>
										<div id="thank_you_msg" class="text-success"></div>
										<p class="text-center">Already have an account? <a class="text-thm" href="#">Log In</a></p>
									</form>
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
	<section class="home-one home1-overlay home1_bgi1">
		<div class="container">
			<div class="row posr">
				<div class="col-lg-12">
					<div class="home_content">
						<div class="home-text text-center">
							<h2 class="fz55">Find Your Dream Home</h2>
							<p class="fz18 color-white">From as low as $10 per day with limited time offer discounts.</p>
						</div>
						<div class="home_adv_srch_opt">
							<ul class="nav nav-pills" id="pills-tab" role="tablist">
							 
								<li class="nav-item">
									<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" value="" role="tab" aria-controls="pills-home" aria-selected="true">Rent</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"  value=""aria-controls="pills-profile" aria-selected="false">Sell</a>
								</li>
							
							</ul>
							<div class="tab-content home1_adsrchfrm" id="pills-tabContent">
								<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
									<div class="home1-advnc-search">
										<ul class="h1ads_1st_list mb0">
											<li class="list-inline-item">
											    <div class="form-group">
											    	<input type="text" class="form-control" id="search_str" placeholder="Enter keyword...">
											    </div>
											</li>
											<li class="list-inline-item">
												<div class="search_option_two">
													<div class="candidate_revew_select">
														<select class="selectpicker w100 show-tick">
															<option>Property Type</option>
															<option>Apartment</option>
															<option>Bungalow</option>
															<option>Condo</option>
															<option>House</option>
															<option>Land</option>
															<option>Single Family</option>
														</select>
													</div>
												</div>
											</li>
											<li class="list-inline-item">
											    <div class="form-group">
											    	<input type="text" class="form-control" id="exampleInputEmail" placeholder="Location">
											    	<label for="exampleInputEmail"><span class="flaticon-maps-and-flags"></span></label>
											    </div>
											</li>
											<li class="list-inline-item">
												<div class="small_dropdown2">
												    <div id="prncgs" class="btn dd_btn">
												    	<span>Price</span>
												    	<label for="exampleInputEmail2"><span class="fa fa-angle-down"></span></label>
												    </div>
												  	<div class="dd_content2">
													    <div class="pricing_acontent">
													    	<span id="slider-range-value1"></span>
															<span id="slider-range-value2"></span>
														    <div id="slider"></div>
													    </div>
												  	</div>
												</div>
											</li>
											<li class="custome_fields_520 list-inline-item">
												<div class="navbered">
												  	<div class="mega-dropdown">
													    <span id="show_advbtn" class="dropbtn">Advanced <i class="flaticon-more pl10 flr-520"></i></span>
													    <div class="dropdown-content">
													      	<div class="row p15">
													      		<div class="col-lg-12">
													      			<h4 class="text-thm3">Amenities</h4>
													      		</div>
														        <div class="col-xxs-6 col-sm col-lg col-xl">
													                <ul class="ui_kit_checkbox selectable-list">
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck1">
																				<label class="custom-control-label" for="customCheck1">Air Conditioning</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck2">
																				<label class="custom-control-label" for="customCheck2">Lawn</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck3">
																				<label class="custom-control-label" for="customCheck3">Swimming Pool</label>
																			</div>
													                	</li>
													                </ul>
														        </div>
														        <div class="col-xxs-6 col-sm col-lg col-xl">
													                <ul class="ui_kit_checkbox selectable-list">
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck4">
																				<label class="custom-control-label" for="customCheck4">Barbeque</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck5">
																				<label class="custom-control-label" for="customCheck5">Microwave</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck6">
																				<label class="custom-control-label" for="customCheck6">TV Cable</label>
																			</div>
													                	</li>
													                </ul>
														        </div>
														        <div class="col-xxs-6 col-sm col-lg col-xl">
													                <ul class="ui_kit_checkbox selectable-list">
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck7">
																				<label class="custom-control-label" for="customCheck7">Dryer</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck8">
																				<label class="custom-control-label" for="customCheck8">Outdoor Shower</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck9">
																				<label class="custom-control-label" for="customCheck9">Washer</label>
																			</div>
													                	</li>
													                </ul>
														        </div>
														        <div class="col-xxs-6 col-sm col-lg col-xl">
													                <ul class="ui_kit_checkbox selectable-list">
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck10">
																				<label class="custom-control-label" for="customCheck10">Gym</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck11">
																				<label class="custom-control-label" for="customCheck11">Refrigerator</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck12">
																				<label class="custom-control-label" for="customCheck12">WiFi</label>
																			</div>
													                	</li>
													                </ul>
														        </div>
														        <div class="col-xxs-6 col-sm col-lg col-xl">
													                <ul class="ui_kit_checkbox selectable-list">
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck13">
																				<label class="custom-control-label" for="customCheck13">Laundry</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck14">
																				<label class="custom-control-label" for="customCheck14">Sauna</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck15">
																				<label class="custom-control-label" for="customCheck15">Window Coverings</label>
																			</div>
													                	</li>
													                </ul>
														        </div>
													      	</div>
													      	<div class="row p15 pt0-xsd">
													      		<div class="col-lg-11 col-xl-10">
													      			<ul class="apeartment_area_list mb0">
													      				<li class="list-inline-item">
																			<div class="candidate_revew_select">
																				<select class="selectpicker w100 show-tick">
																					<option>Bathrooms</option>
																					<option>1</option>
																					<option>2</option>
																					<option>3</option>
																					<option>4</option>
																					<option>5</option>
																					<option>6</option>
																					<option>7</option>
																					<option>8</option>
																				</select>
																			</div>
													      				</li>
													      				<li class="list-inline-item">
																			<div class="candidate_revew_select">
																				<select class="selectpicker w100 show-tick">
																					<option>Bedrooms</option>
																					<option>1</option>
																					<option>2</option>
																					<option>3</option>
																					<option>4</option>
																					<option>5</option>
																					<option>6</option>
																					<option>7</option>
																					<option>8</option>
																				</select>
																			</div>
													      				</li>
													      				<li class="list-inline-item">
																			<div class="candidate_revew_select">
																				<select class="selectpicker w100 show-tick">
																					<option>Year built</option>
																					<option>2013</option>
																					<option>2014</option>
																					<option>2015</option>
																					<option>2016</option>
																					<option>2017</option>
																					<option>2018</option>
																					<option>2019</option>
																					<option>2020</option>
																				</select>
																			</div>
													      				</li>
													      				<li class="list-inline-item">
																			<div class="candidate_revew_select">
																				<select class="selectpicker w100 show-tick">
																					<option>Built-up Area</option>
																					<option>Adana</option>
																					<option>Ankara</option>
																					<option>Antalya</option>
																					<option>Bursa</option>
																					<option>Bodrum</option>
																					<option>Gaziantep</option>
																					<option>İstanbul</option>
																					<option>İzmir</option>
																					<option>Konya</option>
																				</select>
																			</div>
													      				</li>
													      			</ul>
													      		</div>
													      		<div class="col-lg-1 col-xl-2">
													      			<div class="mega_dropdown_content_closer">
														      			<h5 class="text-thm text-right mt15"><span id="hide_advbtn" class="curp">Hide</span></h5>
													      			</div>
													      		</div>
													      	</div>
													    </div>
													</div>
												</div>
											</li>
											<li class="list-inline-item">
												<div class="search_option_button">
												    <button type="button" class="btn btn-thm"  onclick="funSearch()"  id="search">Search</button>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
									<div class="home1-advnc-search">
										<ul class="h1ads_1st_list mb0">
											<li class="list-inline-item">
											    <div class="form-group">
											    	<input type="text" class="form-control" id="search_str" placeholder="Enter keyword...">
											    </div>
											</li>
											<li class="list-inline-item">
												<div class="search_option_two">
													<div class="candidate_revew_select">
														<select class="selectpicker w100 show-tick">
															<option>Property Type</option>
															<option>Apartment</option>
															<option>Bungalow</option>
															<option>Condo</option>
															<option>House</option>
															<option>Land</option>
															<option>Single Family</option>
														</select>
													</div>
												</div>
											</li>
											<li class="list-inline-item">
											    <div class="form-group">
											    	<input type="text" class="form-control" id="exampleInputEmail3" placeholder="Location">
											    	<label for="exampleInputEmail3"><span class="flaticon-maps-and-flags"></span></label>
											    </div>
											</li>
											<li class="list-inline-item">
												<div class="small_dropdown2">
												    <div id="prncgs2" class="btn dd_btn">
												    	<span>Price</span>
												    	<label for="exampleInputEmail4"><span class="fa fa-angle-down"></span></label>
												    </div>
												  	<div class="dd_content2">
													    <div class="pricing_acontent">
															<input type="text" class="amount" placeholder="$52,239"> 
															<input type="text" class="amount2" placeholder="$985,14">
															<div class="slider-range"></div>
													    </div>
												  	</div>
												</div>
											</li>
											<li class="custome_fields_520 list-inline-item">
												<div class="navbered">
												  	<div class="mega-dropdown">
													    <span id="show_advbtn2" class="dropbtn">Advanced <i class="flaticon-more pl10 flr-520"></i></span>
													    <div class="dropdown-content">
													      	<div class="row p15">
													      		<div class="col-lg-12">
													      			<h4 class="text-thm3">Amenities</h4>
													      		</div>
														        <div class="col-xxs-6 col-sm col-lg col-xl">
													                <ul class="ui_kit_checkbox selectable-list">
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck16">
																				<label class="custom-control-label" for="customCheck16">Air Conditioning</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck17">
																				<label class="custom-control-label" for="customCheck17">Lawn</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck18">
																				<label class="custom-control-label" for="customCheck18">Swimming Pool</label>
																			</div>
													                	</li>
													                </ul>
														        </div>
														        <div class="col-xxs-6 col-sm col-lg col-xl">
													                <ul class="ui_kit_checkbox selectable-list">
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck19">
																				<label class="custom-control-label" for="customCheck19">Barbeque</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck20">
																				<label class="custom-control-label" for="customCheck20">Microwave</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck21">
																				<label class="custom-control-label" for="customCheck21">TV Cable</label>
																			</div>
													                	</li>
													                </ul>
														        </div>
														        <div class="col-xxs-6 col-sm col-lg col-xl">
													                <ul class="ui_kit_checkbox selectable-list">
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck22">
																				<label class="custom-control-label" for="customCheck22">Dryer</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck23">
																				<label class="custom-control-label" for="customCheck23">Outdoor Shower</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck24">
																				<label class="custom-control-label" for="customCheck24">Washer</label>
																			</div>
													                	</li>
													                </ul>
														        </div>
														        <div class="col-xxs-6 col-sm col-lg col-xl">
													                <ul class="ui_kit_checkbox selectable-list">
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck25">
																				<label class="custom-control-label" for="customCheck25">Gym</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck26">
																				<label class="custom-control-label" for="customCheck26">Refrigerator</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck27">
																				<label class="custom-control-label" for="customCheck27">WiFi</label>
																			</div>
													                	</li>
													                </ul>
														        </div>
														        <div class="col-xxs-6 col-sm col-lg col-xl">
													                <ul class="ui_kit_checkbox selectable-list">
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck28">
																				<label class="custom-control-label" for="customCheck28">Laundry</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck29">
																				<label class="custom-control-label" for="customCheck29">Sauna</label>
																			</div>
													                	</li>
													                	<li>
																			<div class="custom-control custom-checkbox">
																				<input type="checkbox" class="custom-control-input" id="customCheck30">
																				<label class="custom-control-label" for="customCheck30">Window Coverings</label>
																			</div>
													                	</li>
													                </ul>
														        </div>
													      	</div>
													      	<div class="row p15 pt0-xsd">
													      		<div class="col-lg-11 col-xl-10">
													      			<ul class="apeartment_area_list mb0">
													      				<li class="list-inline-item">
																			<div class="candidate_revew_select">
																				<select class="selectpicker w100 show-tick">
																					<option>Bathrooms</option>
																					<option>1</option>
																					<option>2</option>
																					<option>3</option>
																					<option>4</option>
																					<option>5</option>
																					<option>6</option>
																					<option>7</option>
																					<option>8</option>
																				</select>
																			</div>
													      				</li>
													      				<li class="list-inline-item">
																			<div class="candidate_revew_select">
																				<select class="selectpicker w100 show-tick">
																					<option>Bedrooms</option>
																					<option>1</option>
																					<option>2</option>
																					<option>3</option>
																					<option>4</option>
																					<option>5</option>
																					<option>6</option>
																					<option>7</option>
																					<option>8</option>
																				</select>
																			</div>
													      				</li>
													      				<li class="list-inline-item">
																			<div class="candidate_revew_select">
																				<select class="selectpicker w100 show-tick">
																					<option>Year built</option>
																					<option>2013</option>
																					<option>2014</option>
																					<option>2015</option>
																					<option>2016</option>
																					<option>2017</option>
																					<option>2018</option>
																					<option>2019</option>
																					<option>2020</option>
																				</select>
																			</div>
													      				</li>
													      				<li class="list-inline-item">
																			<div class="candidate_revew_select">
																				<select class="selectpicker w100 show-tick">
																					<option>Built-up Area</option>
																					<option>Adana</option>
																					<option>Ankara</option>
																					<option>Antalya</option>
																					<option>Bursa</option>
																					<option>Bodrum</option>
																					<option>Gaziantep</option>
																					<option>İstanbul</option>
																					<option>İzmir</option>
																					<option>Konya</option>
																				</select>
																			</div>
													      				</li>
													      			</ul>
													      		</div>
													      		<div class="col-lg-1 col-xl-2">
													      			<div class="mega_dropdown_content_closer">
														      			<h5 class="text-thm text-right mt15"><span id="hide_advbtn2" class="curp">Hide</span></h5>
													      			</div>
													      		</div>
													      	</div>
													    </div>
													</div>
												</div>
											</li>
											<li class="list-inline-item">
												<div class="search_option_button">
												    <button type="button"  onclick="funSearch()" class="btn btn-thm">Search</button>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="feature-property" class="feature-property bgc-f7">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<a href="#feature-property">
				    	<div class="mouse_scroll">
			        		<div class="icon">
					    		<h4>Scroll Down</h4>
					    		<p>to discover more</p>
			        		</div>
			        		<div class="thumb">
			        			<img src="{{asset('asset_front/images/resource/mouse.png')}}" alt="mouse.png">
			        		</div>
				    	</div>
				    </a>
				</div>
			</div>
		</div>
		<div class="container ovh">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center mb40">
						<h2>Featured Properties</h2>
						<p>Handpicked properties by our team.</p>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="feature_property_slider">
					@foreach($property as $data)
						<div class="item">
							<div class="feat_property property_data">
								<div class="thumb">
								@if ($data->image != "")
                                 <?PHP
                                   $img=explode(',', $data->image);
                                ?>
									<a href="{{url('property/details/'.$data->id)}}"><img class="img-whp" src="{{ asset('images/product/'.$img[0])}}" alt="fp1.jpg"></a>
								
									<div class="thmb_cntnt">
										<ul class="tag mb0">
											<li class="list-inline-item"><a href="{{url('property/details/'.$data->id)}}">For {{$data->property_name}}</a></li>
										</ul>
										<ul class="icon mb0">
									
									    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
										  <input type="hidden" class="property_id" value="{{ $data->id }}">
										  
											<li class="list-inline-item"><a href="#"><span class="flaticon-transfer-1"></span></a></li>
											<li class="list-inline-item"><span class="add-to-wishlist-btn property_id flaticon-heart"></span></li>
										
										</ul>
										<a class="fp_price" href="{{url('property/details/'.$data->id)}}">₹{{$data->price}}<small></small></a>
									</div>
								</div>
								@endif	
								<div class="details">
									<div class="tc_content">
										<p class="text-thm">Apartment</p>
										<h4>Renovated Apartment</h4>
										<p><span class="flaticon-placeholder"></span><a href="{{url('property/details/'.$data->id)}}">{{$data->address}}</a></p>
										<ul class="prop_details mb0">
											<li class="list-inline-item"><a href="{{url('property/details/'.$data->id)}}">Beds:{{$data->bedrooms}}</a></li>
											<li class="list-inline-item"><a href="{{url('property/details/'.$data->id)}}">Baths:{{$data->bathrooms}}</a></li>
											<li class="list-inline-item"><a href="{{url('property/details/'.$data->id)}}">Sq Ft: {{$data->size_prefix}}</a></li>
										</ul>
									</div>
									<div class="fp_footer">
										<ul class="fp_meta float-left mb0">
											<li class="list-inline-item"><a href="{{url('property/details/'.$data->id)}}"><img src="{{asset('asset_front/images/property/pposter1.png')}}" alt="pposter1.png"></a></li>
											<li class="list-inline-item"><a href="{{url('property/details/'.$data->id)}}">Ali Tufan</a></li>
										</ul>
										<div class="fp_pdate float-right">{{$data->year_built}}</div>
									</div>
								</div>
							</div>
						
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="property-city" class="property-city pb30">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h2>Find Properties in These Cities</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-xl-4">
					<div class="properti_city">
						<div class="thumb"><img class="img-fluid w100" src="{{asset('asset_front/images/property/pc1.jpg')}}" alt="pc1.jpg"></div>
						<div class="overlay">
							<div class="details">
								<h4>Miami</h4>
								<p>24 Properties</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-xl-8">
					<div class="properti_city">
						<div class="thumb"><img class="img-fluid w100" src="{{asset('asset_front/images/property/pc2.jpg')}}" alt="pc2.jpg"></div>
						<div class="overlay">
							<div class="details">
								<h4>Los Angeles</h4>
								<p>18 Properties</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-xl-8">
					<div class="properti_city">
						<div class="thumb"><img class="img-fluid w100" src="{{asset('asset_front/images/property/pc3.jpg')}}" alt="pc3.jpg"></div>
						<div class="overlay">
							<div class="details">
								<h4>New York</h4>
								<p>89 Properties</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-xl-4">
					<div class="properti_city">
							<div class="thumb"><img class="img-fluid w100" src="{{asset('asset_front/images/property/pc4.jpg')}}" alt="pc4.jpg"></div>
						<div class="overlay">
							<div class="details">
								<h4>Florida</h4>
								<p>47 Properties</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="why-chose" class="whychose_us bgc-f7 pb30">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h2>Why Choose Us</h2>
						<p>We provide full service at every step.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-lg-4 col-xl-4">
					<div class="why_chose_us">
						<div class="icon">
							<span class="flaticon-high-five"></span>
						</div>
						<div class="details">
							<h4>Trusted By Thousands</h4>
							<p>Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-4">
					<div class="why_chose_us">
						<div class="icon">
							<span class="flaticon-home-1"></span>
						</div>
						<div class="details">
							<h4>Wide Renge Of Properties</h4>
							<p>Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-4">
					<div class="why_chose_us">
						<div class="icon">
							<span class="flaticon-profit"></span>
						</div>
						<div class="details">
							<h4>Financing Made Easy</h4>
							<p>Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="our-testimonials" class="our-testimonial">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h2 class="color-white">Testimonials</h2>
						<p class="color-white">Here could be a nice sub title</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="testimonial_grid_slider">
						<div class="item">
							<div class="testimonial_grid">
								<div class="thumb">
									<img src="{{asset('asset_front/images/testimonial/1.jpg')}}" alt="1.jpg">
								</div>
								<div class="details">
									<h4>Augusta Silva</h4>
									<p>Sales Manager</p>
									<p class="mt25">Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.</p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial_grid">
								<div class="thumb">
									<img src="{{asset('asset_front/images/testimonial/1.jpg')}}" alt="1.jpg">
								</div>
								<div class="details">
									<h4>Augusta Silva</h4>
									<p>Sales Manager</p>
									<p class="mt25">Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.</p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial_grid">
								<div class="thumb">
									<img src="{{asset('asset_front/images/testimonial/1.jpg')}}" alt="1.jpg">
								</div>
								<div class="details">
									<h4>Augusta Silva</h4>
									<p>Sales Manager</p>
									<p class="mt25">Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.</p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial_grid">
								<div class="thumb">
									<img src="{{asset('asset_front/images/testimonial/1.jpg')}}" alt="1.jpg">
								</div>
								<div class="details">
									<h4>Augusta Silva</h4>
									<p>Sales Manager</p>
									<p class="mt25">Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.</p>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="testimonial_grid">
								<div class="thumb">
									<img src="{{asset('asset_front/images/testimonial/1.jpg')}}" alt="1.jpg">
								</div>
								<div class="details">
									<h4>Augusta Silva</h4>
									<p>Sales Manager</p>
									<p class="mt25">Aliquam dictum elit vitae mauris facilisis at dictum urna dignissim donec vel lectus vel felis.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="our-blog bgc-f7 pb30">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h2>Articles & Tips</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-lg-4 col-xl-4">
					<div class="for_blog feat_property">
						<div class="thumb">
							<img class="img-whp" src="{{asset('asset_front/images/blog/bh1.jpg')}}" alt="bh1.jpg">
						</div>
						<div class="details">
							<div class="tc_content">
								<p class="text-thm">Business</p>
								<h4>Skills That You Can Learn In The Real Estate Market</h4>
							</div>
							<div class="fp_footer">
								<ul class="fp_meta float-left mb0">
									<li class="list-inline-item"><a href="#"><img src="{{asset('asset_front/images/property/pposter1.png')}}" alt="pposter1.png"></a></li>
									<li class="list-inline-item"><a href="#">Ali Tufan</a></li>
								</ul>
								<a class="fp_pdate float-right" href="#">7 August 2019</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-4">
					<div class="for_blog feat_property">
						<div class="thumb">
							<img class="img-whp" src="{{asset('asset_front/images/blog/bh2.jpg')}}" alt="bh2.jpg">
						</div>
						<div class="details">
							<div class="tc_content">
								<p class="text-thm">Business</p>
								<h4>Bedroom Colors You’ll Never <br class="dn-1199"> Regret</h4>
							</div>
							<div class="fp_footer">
								<ul class="fp_meta float-left mb0">
									<li class="list-inline-item"><a href="#"><img src="{{asset('asset_front/images/property/pposter1.png')}}" alt="pposter1.png"></a></li>
									<li class="list-inline-item"><a href="#">Ali Tufan</a></li>
								</ul>
								<a class="fp_pdate float-right" href="#">7 August 2019</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 col-xl-4">
					<div class="for_blog feat_property">
						<div class="thumb">
							<img class="img-whp" src="{{asset('asset_front/images/blog/bh3.jpg')}}" alt="bh3.jpg">
						</div>
						<div class="details">
							<div class="tc_content">
								<p class="text-thm">Business</p>
								<h4>5 Essential Steps for Buying an Investment</h4>
							</div>
							<div class="fp_footer">
								<ul class="fp_meta float-left mb0">
									<li class="list-inline-item"><a href="#"><img src="{{asset('asset_front/images/property/pposter1.png')}}" alt="pposter1.png"></a></li>
									<li class="list-inline-item"><a href="#">Ali Tufan</a></li>
								</ul>
								<a class="fp_pdate float-right" href="#">7 August 2019</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="our-partners" class="our-partners">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h2>Our Partners</h2>
						<p>We only work with the best companies around the globe</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg">
					<div class="our_partner">
						<img class="img-fluid" src="{{asset('asset_front/images/partners/1.png')}}" alt="1.png">
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg">
					<div class="our_partner">
						<img class="img-fluid" src="{{asset('asset_front/images/partners/2.png')}}" alt="2.png">
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg">
					<div class="our_partner">
						<img class="img-fluid" src="{{asset('asset_front/images/partners/3.png')}}" alt="3.png">
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg">
					<div class="our_partner">
						<img class="img-fluid" src="{{asset('asset_front/images/partners/4.png')}}" alt="4.png">
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-lg">
					<div class="our_partner">
						<img class="img-fluid" src="{{asset('asset_front/images/partners/5.png')}}" alt="5.png">
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="start-partners bgc-thm pt50 pb50">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="start_partner tac-smd">
						<h2>Become a Real Estate Agent</h2>
						<p>We only work with the best companies around the globe</p>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="parner_reg_btn text-right tac-smd">
						<a class="btn btn-thm2" href="#">Register Now</a>
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
							<li><a href="#"><span class="__cf_email__" data-cfemail="bbd2d5ddd4fbddd2d5dfd3d4cec8de95d8d4d6">[email&#160;protected]</span></a></li>
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
<script type="text/javascript" src="{{asset('asset_front/js/isotop.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/snackbar.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>	
<script type="text/javascript" src="{{asset('asset_front/js/simplebar.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/parallax.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/scrollto.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/jquery-scrolltofixed-min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/jquery.counterup.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/slider.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/pricing-slider.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/timepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('asset_front/js/script.js')}}"></script>
</body>
<script>
$('#register').submit(function(e){
	e.preventDefault();
	$('.text-danger').html('');
	$.ajax({
		url:'register',
		data:$('#register').serialize(),
		type:'post',
		success:function(result){
			if(result.status=="error"){
               $.each(result.error,function(key,val){
                   $('#'+key+'_error').html(val[0]);
			   });
			}
			if(result.status=="success"){           
				window.location.replace("{{url('/')}}");
				toastr.success("Login successfull");
			}
			
		}
	});

});
$('#frmlogin').submit(function(e){
	e.preventDefault();
	$('#login_msg').html('');
	$.ajax({
        url:'login',
		data:$('#frmlogin').serialize(),
		type:'post',
		success:function(result){
			if(result.status=="error"){
				$('#login_msg').html(result.msg);
			}
			if(result.status=="success"){           
				window.location.replace("{{url('/')}}");
				toastr.success("Login successfull");
			}
		}
	});
});

function funSearch(){
	var search_str=$('#search_str').val();
	if(search_str!='')
	{
		window.location.href='/search/'+search_str;
	}
}

function login(){
	jQuery('#popup_login').show();
	jQuery('#popup_forgot').hide();

}
function forgot_password(){
    jQuery('#popup_forgot').show();
	jQuery('#popup_login').hide();

     
}

$('#frmforgot').submit(function(e){
	e.preventDefault();
	$('#forgot_msg').html('');
	$.ajax({
        url:'/forgot_password',
		data:$('#frmforgot').serialize(),
		type:'post',
		success:function(result){
			$('#forgot_msg').html(result.msg);
		}
	});
});

$(document).ready(function (){
       $('.add-to-wishlist-btn').click(function(e){
           e.preventDefault();
	
		   var _token=$("input[name=_token]").val();

	   var property_id =$(this).closest('.property_data').find('.property_id').val();
	   $.ajax({
         method:"POST",
		 url:"/add-wishlist",
		 data:{
			 property_id:property_id,
			 _token:_token
		 },
		 success:function(response){
              console.log(response);
			  toastr.success(response.status);
		 }
		});
	   });

});
        
  

   @if(Session::has('message'))
    var type = "{{ Session::get('alert-type', 'info') }}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
  @endif
 </script>
</html>

