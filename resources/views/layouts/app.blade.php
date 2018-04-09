
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <title>Cafe Shop</title>
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/theme/css/theme.css') }}">
    </head>
	<body>
	<header class="navbar navbar-container mb-0">
		<div class="container-fluid">
			<nav class="navbar-default sidebar pb-30">
			    <div class="container-fluid">
					<div class="navbar-header text-center">
						<img src="{{ asset('assets/img/logo.png') }}" alt="store logo" class="width-50 mt-30 mb-30">
						<span class="navbar-header-title mb-0">Maruno Cafe
							<span class="text-muted x-small">online shop</span>
						</span>
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						navigation <span class="ti-menu"></span>
						</button>      
					</div>

					<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
						
						<ul class="navbar-user mb-30 pull-left width-100">
							@if (Auth::guest())
							<li>
								<span data-toggle="modal" data-target="#myModal" class="ti-user"></span>
							</li>
							@else
							<li>
								<span data-toggle="modal" data-target="#loggedModal" class="ti-user"></span>
							</li>
							@endif
							<li>
								<span data-focus="search" data-toggle="modal" data-target="#searchModal" class="ti-search"></span>
							</li>
							<li>
								<span data-toggle="modal" data-target="#cartModal" class="ti-shopping-cart">
									<span class="navbar-user-counter">3</span>
								</span>
							</li>
						</ul>
						<ul class="nav navbar-nav nav navbar-nav side-nav text-center">
							<li class="active"><a href="/products/all">Drink and Food</a></li>  
							<li class="active"><a href="#">Stores</a></li>
	                        <li>
		                        <a aria-expanded="true" class="collapsed" href="javascript:;" data-toggle="collapse" data-target="#colapse-item-1">
		                        	Categories
                                	<i class="ti-minus"></i> 
                                	<i class="ti-plus"></i>
                                </a>

                                <ul style="" aria-expanded="true" id="colapse-item-1" class="collapseItem collapse">
									<li>
										<a href="/products/Freshly Brewed Coffee">
											<i class="ti-arrow-right" aria-hidden="true"></i>Freshly Brewed Coffee
											<span>(6)</span>
										</a>
									</li>
									<li>
										<a href="/products/Cold Brew and Iced Coffee">
											<i class="ti-arrow-right" aria-hidden="true"></i>Cold Brew and Iced Coffee
											<span>(12)</span>
										</a>
									</li>
									<li>
										<a href="/products/Evolution Fresh™">
											<i class="ti-arrow-right" aria-hidden="true"></i>Evolution Fresh™
											<span>(101)</span>
										</a>
									</li>
									<li>
										<a href="/products/Espresso Beverages">
											<i class="ti-arrow-right" aria-hidden="true"></i>Espresso Beverages
											<span>(6)</span>
										</a>
									</li>
									<li>
										<a href="/products/Frappuccino® Blended Beverages">
											<i class="ti-arrow-right" aria-hidden="true"></i>Frappuccino® Blended Beverages
											<span>(12)</span>
										</a>
									</li>
									<li>
										<a href="/products/Smoothies">
											<i class="ti-arrow-right" aria-hidden="true"></i>Smoothies
											<span>(101)</span>
										</a>
									</li>
									<li>
										<a href="products/Fizzio™ Handcrafted sodas">
											<i class="ti-arrow-right" aria-hidden="true"></i>Fizzio™ Handcrafted sodas
											<span>(101)</span>
										</a>
									</li>
									<li>
										<a href="/products/Refreshers™ Beverages">
											<i class="ti-arrow-right" aria-hidden="true"></i>Refreshers™ Beverages
											<span>(101)</span>
										</a>
									</li>
									<li>
										<a href="/products/Tea">
											<i class="ti-arrow-right" aria-hidden="true"></i>Tea
											<span>(101)</span>
										</a>
									</li>
                                </ul>
		                    </li>
	                   
		                    <li class="active"><a href="{{ url('about') }}">About us</a></li> 
						</ul>
					</div>
			  	</div>
			</nav>
		</div>
	</header>

	<!-- LOGIN | REGISTER MODAL -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" >
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>

	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content width-100 pull-left pt-60 pb-60">
				    <div class="modal-body form-group">
				        <div id="login" class="login col-md-10 col-md-push-1 col-sm-12">
				            <div class="panel">
				                <div class="panel-heading">
				                    <div class="panel-title h3 mt-30 mb-30">Sign In
				                        <div class="pull-right login-context-info">
				                            
				                            <a href="#" onClick="$('#login').hide(); $('#signup').show()" class="text-muted small">
				                                Sign Up
				                            </a>
				                        </div>
				                    </div>
				                </div>
				                @if (session()->has('success_message'))
					            <div class="alert alert-success">
					                {{ session()->get('success_message') }}
					            </div>
					            @endif
				                @if(count($errors) > 0)
					            <div class="alert alert-danger">
					                <ul>
					                    @foreach ($errors->all() as $error)
					                    <li>{{ $error }}</li>
					                    @endforeach
					                </ul>
					            </div>
	            				@endif
				                <div class="panel-body">
				                    <form id="loginform" class="form-horizontal pl-15 pr-15 pt-15" method="POST" action="{{ url('login') }}">
				                    	{{ csrf_field() }}
				                        <div class="form-group">
				                            <div class="col-md-12">
				                                <input type="text" class="form-control" id="email-sign-in" name="email" placeholder="Email Address" required autofocus>
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            <div class="col-md-12">
				                                <input type="password" class="form-control" id="password-sign-in" name="password" placeholder="Password" required>
				                            </div>
				                        </div>
				                        
				                        <div class="custom-checkbox custom-checkbox-primary pull-left">
				                            <input id="custom-checkbox2" class="styled" type="checkbox">
				                            <label for="custom-checkbox2"> remember me
				                            </label>
				                        </div>
				                        
				                        <div class="form-group">
				                            <!-- Button -->
				                            <div class="col-sm-12 login-btn mt-30">
				                                <button id="btn-sign-in" type="submit" class="btn btn-primary" >Login  </button>
				                                <a id="btn-fb-sign-in" href="#" class="btn btn-default">Facebook sign in</a>
				                            </div>
				                        </div>
				                        <div class="form-group">
				                            <div class="col-md-12">
				                                <a href="#" class="small">password recovery</a>
				                            </div>
				                        </div>
				                    </form>
				                </div>
				            </div>
				        </div>
				        <div id="signup" style="display:none" class="col-md-10 col-md-push-1 col-sm-12">
				            <div class="panel">
				                <div class="panel-heading">
				                    <div class="panel-title h3 mt-30 mb-30">Sign Up
				                        <div class="login-context-info pull-right"><a id="signinlink" class="text-muted small" href="#" onclick="$('#signup').hide(); $('#login').show()">Sign In</a>
				                    </div>
				                </div>
				            </div>
				            @if (session()->has('success_message'))
				            <div class="alert alert-success">
				                {{ session()->get('success_message') }}
				            </div>
				            @endif
				            @if(count($errors) > 0)
				            <div class="alert alert-danger">
				                <ul>
				                    @foreach ($errors->all() as $error)
				                    <li>{{ $error }}</li>
				                    @endforeach
				                </ul>
				            </div>
            				@endif
				            <div class="panel-body">
				                <form id="signupform" class="form-horizontal pl-15 pr-15 pt-15" method="POST" action="{{ url('register') }}">
				                	{{ csrf_field() }}
				                    <div class="form-group">
				                        <div class="col-md-12">
				                            <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" required autofocus>
				                        </div>
				                    </div>
				                    <div class="form-group">
				                        <div class="col-md-12">
				                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
				                        </div>
				                    </div>
				                    <div class="form-group">
				                        <div class="col-md-12">
				                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required>
				                        </div>
				                    </div>
				                    <div class="form-group">
				                        <div class="col-md-12">
				                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
				                        </div>
				                    </div>
				                    <div class="form-group">
				                        <div class="col-md-12">
				                            <input type="password" class="form-control" id="password-confirmation" name="password_confirmation" placeholder="Password" required>
				                        </div>
				                    </div>
				                    <div class="form-group">
				                        <div class="col-md-12">
				                            <input type="text" class="form-control" id="birthday" name="birthday" placeholder="Birthday" required>
				                        </div>
				                    </div>
				                    <div class="form-group mt-30">
				                        <!-- Button -->
				                        <div class="col-sm-12 login-btn">
				                            <button id="btn-sign-up" class="btn btn-primary" type="submit">Sign up  </button>
				                            <a id="btn-fb-sign-up" href="#" class="btn btn-default">Facebook sign up</a>
				                        </div>
				                    </div>
				                </form>
				            </div>
				            <div class="clearfix"></div>
				        </div>
					</div>
	     		</div>
	    	</div>
	  	</div>
	</div>
	<!-- / LOGIN | REGISTER MODAL -->

	<!-- LOGGED MODAL -->
	<div class="modal fade" id="loggedModal" tabindex="-1" role="dialog" >
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>

	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content width-100 pull-left pt-60 pb-60">
			    <div class="modal-body">
			    Logged with {{ Auth::user() }}
				</div>
	    	</div>
	  	</div>
	</div>

 	<!-- SEARCH MODAL -->
	<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" >
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
		
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content width-100 pull-left pt-60 pb-60 no-background">
				<div class="modal-body">
					<div class="width-100" id="search">
					    <form>
					        <input type="search" value="" placeholder="type keyword(s) here" />
					        <button type="submit" class="btn btn-primary">Search</button>
					    </form>
					</div>
	     		</div>
	    	</div>
	  	</div>
	</div>
	<!-- / SEARCH MODAL -->

	<!-- CART MODAL -->
	<div class="modal fade" id="cartModal" tabindex="-1" role="dialog" >
		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
		
	  	<div class="modal-dialog" role="document">
	    	<div class="modal-content width-100 pull-left pt-60 pb-60">
				<div class="modal-body">
					<div class="width-100">
						<ul class="cart-items width-100 pull-left pl-60 pr-30 pb-0 pt-0 container-fluid">
			                <li class="cart-items-labels visible-lg-block visible-md-block row"> 
			                    <span class="col-md-6 text-muted small">product</span>
			                    <span class="col-md-2 text-muted small text-center">quantity</span> 
			                    <span class="col-md-4 text-muted small text-right">price</span>
			                </li>
			                <li class="row">
			                    <span class="cart-image col-xs-6 col-sm-2">
			                        <a href="#"><img alt="product description" src="assets/img/products/product-03.jpg"></a>
			                    </span>

			                    <div class="cart-item-right col-md-10">
			                    	<div class="row">
			                            <span class="cart-description col-xs-12 col-md-5">
			                                <a class="h5" href="#">Product name</a>				   
			                                <span class="cart-item-price h5 text-muted">$ 33.00</span>
			                            </span>

										<span class="col-md-2 col-sm-12">
											<input class="text-center form-control" type="text" value="10">
										</span>

			                            <span class="col-md-5 col-sm-12 text-right">
			                                <span class="cart-price pull-right">$330.00 <a class="cart-remove" href="#">
			                                <span class="ti-trash icon pull-right mt-5 ml-10"></span>
			                                </a></span>
			                               
			                            </span>
			                        </div>
			                    </div>
			                </li>
			                <li class="row">
			                    <span class="cart-image col-xs-6 col-sm-2">
			                        <a href="#"><img alt="product description" src="assets/img/products/product-03.jpg"></a>
			                    </span>

			                    <div class="cart-item-right col-md-10">
			                    	<div class="row">
			                            <span class="cart-description col-xs-12 col-md-5">
			                                <a class="h5" href="#">Product name</a>                               
			                                <span class="cart-item-price h5 text-muted">$ 33.00</span>
			                            </span>

										<span class="col-md-2 col-sm-12">
											<input class="text-center form-control" type="text" value="10">
										</span>

			                            <span class="col-md-5 col-sm-12 text-right">
			                                <span class="cart-price pull-right">$330.00 <a class="cart-remove" href="#">
			                                <span class="ti-trash icon pull-right mt-5 ml-10"></span>
			                                </a></span>
			                               
			                            </span>
			                        </div>
			                    </div>
			                </li>
			                <li class="row">
			                    <span class="cart-image col-xs-6 col-sm-2">
			                        <a href="#"><img alt="product description" src="assets/img/products/product-03.jpg"></a>
			                    </span>

			                    <div class="cart-item-right col-md-10">
			                    	<div class="row">
			                            <span class="cart-description col-xs-12 col-md-5">
			                                <a class="h5" href="#">Product name</a>                               
			                                <span class="cart-item-price h5 text-muted">$ 33.00</span>
			                            </span>

										<span class="col-md-2 col-sm-12">
											<input class="text-center form-control" type="text" value="10">
										</span>

			                            <span class="col-md-5 col-sm-12 text-right">
			                                <span class="cart-price pull-right">$330.00 <a class="cart-remove" href="#">
			                                <span class="ti-trash icon pull-right mt-5 ml-10"></span>
			                                </a></span>
			                            </span>
			                        </div>
			                    </div>
			                </li>
			            </ul>
			            <div class="pull-left width-100 pr-45">
			            	<a class="btn btn-default pull-right">checkout</a>
			            </div>
					</div>
	     		</div>
	    	</div>
	  	</div>
	</div>
	<!-- / CART MODAL -->

	@yield('content')


	<script src="{{ asset('assets/js/wow.js') }}"></script>
	<script>
	window.jQuery || document.write("<script src='{{asset('assets/js/jquery-1.11.2.min.js') }}'><\/script>")
	</script>
	<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.countTo.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.inview.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.countdown.js') }}"></script>
		<script src="{{ asset('assets/js/bootstrap-select.js') }}"></script>
	<script src="{{ asset('assets/js/main.js') }}"></script>
	</body>
</html>