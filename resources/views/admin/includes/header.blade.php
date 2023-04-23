<!-- HEADER CODE -->
	<header class="main-header">
		<div class="header-top">
			<div class="container">
				<ul>
					<li>
						<a href="javascript:void(0);"><i class="fas fa-home"></i> Home</a>
					</li>
					<li>
						<a href="javascript:void(0);" class="top-menu-item-2"><i class="fas fa-home"></i> Using Melanotan 2</a>
					</li>
					<li>
						<a href="javascript:void(0);"><i class="far fa-envelope"></i> Contact</a>
					</li>
					<li>
						<a href="javascript:void(0);"><i class="far fa-question-circle"></i> FAQ</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- CENTER -->
		<div class="mobile-top-bar">
			<div class="mobile-top-menu-wrapper">
				<div class="top-menu">
					<ul class="j-menu">
						<li class="top-menu-item top-menu-item-1">
						<a href="javascript:void(0);"><i class="fas fa-user-circle"></i>Login</a>
						</li>
						<li class="top-menu-item top-menu-item-2">
						<a href="javascript:void(0);"><i class="far fa-compass"></i>Register</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="center-header">
			<div class="container">				
				<nav class="navbar navbar-expand-lg">
				  <a class="navbar-brand" href="{{ URL::to('/') }}">
				  	<img src="{{ asset('front/images/header-logo.png') }}">
				  </a>
				  <!-- Toggle button -->
				  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
				  </button>
				  <!-- HEADER SEARCH -->
				  <div class="header-search-wrap mobile-search-div">
				  	<div class="header-search">
				  		<div class="search-categories dropdown drop-menu">
							<div class="search-categories-button dropdown-toggle" data-toggle="" aria-expanded="false">All</div>
							<div class="dropdown-menu j-dropdown">
								<ul class="j-menu">
									<li>
										<a href="javascript:void(0);">All</a>
									</li>
									<li>
										<a href="javascript:void(0);">Melanotan</a>
									</li>
									<li>
										<a href="javascript:void(0);">MT2 Starter Kits</a>
									</li>
									<li>
										<a href="javascript:void(0);">Melanotan Nasal Spray</a>
									</li>
									<li>
										<a href="javascript:void(0);">MT2 Reseller Packs</a>
									</li>
									<li>
										<a href="javascript:void(0);">Tanning Injections Supplies</a>
									</li>
								</ul>
								</div>
							</div>
				  		<form class="inner-wrap">
						  <input type="text" placeholder="Search here..." name="search2">
						  <button type="submit"><i class="fa fa-search"></i></button>
						</form>
				  	</div>
				  </div>
				  <!-- HEADER SEARCH END -->

				  <!-- Links -->
				  <div class="collapse navbar-collapse" id="navbarNav">
				    <ul class="navbar-nav">
				      <li class="nav-item active"> 
				        <a class="nav-link" href="{{ route('login') }}"><span><i class="fas fa-user-circle"></i></span> Login</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="{{ route('register') }}">
				        	<span class="regitr-icon"><i class="fas fa-user-circle"></i></span>
				         Rigister</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link" href="javascript:void(0);"><span><i class="far fa-heart"></i></span> Wishlist</a>
				      </li>			    
				      <li class="nav-item">
				        <a class="nav-link" href="javascript:void(0);">
				        	<span class="campare-icon"><i class="fas fa-user-circle"></i></span>
				        Compare</a>
				      </li>			     		  			      
				    </ul>

				    <!-- cart -->
				    <div class="cart-wrap">
				    	<div class="cart-inner-wrap">
					    	<a href="javascript:void(0);">
					    	<span id="cart-total">0 item(s) - £0.00</span>
					    	<i class="fas fa-shopping-cart"></i>							
					    	</a>
					    	<div id="cart-content" class="dropdown-menu cart-content j-dropdown">
								<ul>
									<li>
									<p class="text-center cart-empty">Your shopping cart is empty!</p>
									</li>
								</ul>
							</div>
				    	</div>
				    </div>
				    <!-- cart end -->
				  </div>
				</nav>

				 <!-- mobile -->
				    <div class="mobile-menu">
				    	<ul>
				    		<li>
				    			<a href="javascript:void(0);">
				    				<img src="{{ asset('front/images/header-logo.png') }}">
				    			</a>
				    		</li>
				    	</ul>
				    	<ul>
				    		<li>
				    			<a href="javascript:void(0);" class="side-menu">
				    				<i class="fas fa-bars"></i>
				    			</a>
				    		</li>
				    		<li id="mobile-search-icon">
				    			<a href="javascript:void(0);" class="mobile-search"><i class="fas fa-search"></i>

				    				<div class="header-search">
				  		<div class="search-categories dropdown drop-menu">
							<div class="search-categories-button dropdown-toggle" data-toggle="" aria-expanded="false">All</div>
							<div class="dropdown-menu j-dropdown">
								<ul class="j-menu">
									<li>
										<a href="javascript:void(0);">All</a>
									</li>
									<li>
										<a href="javascript:void(0);">Melanotan</a>
									</li>
									<li>
										<a href="javascript:void(0);">MT2 Starter Kits</a>
									</li>
									<li>
										<a href="javascript:void(0);">Melanotan Nasal Spray</a>
									</li>
									<li>
										<a href="javascript:void(0);">MT2 Reseller Packs</a>
									</li>
									<li>
										<a href="javascript:void(0);">Tanning Injections Supplies</a>
									</li>
								</ul>
								</div>
							</div>
				  		<form class="inner-wrap">
						  <input type="text" placeholder="Search here..." name="search2">
						  <button type="submit"><i class="fa fa-search"></i></button>
						</form>
				  	</div>
				    			</a>
				    		</li>
				    		<li>
				    			<a href="javascript:void(0);" class="shopping-card-right">
				    				<i class="fas fa-shopping-cart"></i>
				    				<div class="header-bottom cart-sidebar">
										<div class="container">
											<div class="mobile-wrapper-header">
												<span>YOUR CART</span>
													<a class="x active"><i class="fas fa-times"></i></a>
											</div>
											<P class="text-center">Your shopping cart is empty!</P>
										</div>
									</div>
				    			</a>
				    		</li>
				    	</ul>
				    </div>
				    <!-- mobile -->
			</div>
		</div>
		<!-- BOTTOM -->
		<div class="header-bottom left-slider">
			<div class="container">
				<div class="mobile-wrapper-header">
					<span>Menu</span>
						<a class="x"><i class="fas fa-times"></i></a>
				</div>
				<ul class="main-menu">
					<li>
						<a href="javascript:void(0);" class="active">Melanotan 2</a>
					</li>
					<li>
						<a href="javascript:void(0);">MT2 Starter Kits</a>
					</li>
					<li>
						<a href="javascript:void(0);">Melanotan Nasal Spray</a>
					</li>
					<li>
						<a href="javascript:void(0);">MT2 Reseller Packs</a>
					</li>
					<li>
						<a href="javascript:void(0);">Tanning Injection Supplies</a>
					</li>
				</ul>
				<ul class="main-menu-2"> 
					<li>
						<a href="javascript:void(0);"><i class="far fa-comment-alt"></i>BLOG</a>
					</li>
				</ul>
			</div>
		</div>
	</header>
	<!-- HEADER CODE END HERE-->