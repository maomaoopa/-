<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>@yield('title')</title>

<!-- Main style -->
<link rel="stylesheet" href="/homes/css/main.css" type="text/css" />

<!-- Fancybox style -->
<link rel="stylesheet" href="/homes/fancybox/fancybox/jquery.fancybox-1.3.4.css" type="text/css" media="screen" />

<!-- Product slider style -->
<link rel="stylesheet" href="/homes/css/product-slider.css" type="text/css" />

<!-- Style for the superfish navigation menu -->
<link rel="stylesheet" href="/homes/superfish/superfish.css" type="text/css" media="screen" />

<!-- Promo slider style -->
<link rel="stylesheet" href="/homes/css/megamenu.css" type="text/css" /> 

<!-- Style for Megamenu -->
<link rel="stylesheet" type="text/css" href="/homes/css/scrollable-navig.css">

<!-- Google font -->
<link href='/homes/css/css1.css' rel='stylesheet' type='text/css' />
<link href='/homes/css/css2.css' rel='stylesheet' type='text/css' />
<link href='/homes/css/css3.css' rel='stylesheet' type='text/css' />

<!-- JS for jQuery -->
<script type="text/javascript" src="/homes/js/jquery-1.7.1.min.js"></script>

<!-- JS for jQuery Product slider -->
<script type="text/javascript" src="/homes/js/jquery.tools.min.js"></script>

<!-- JS for jQuery Border effect -->
<script type="text/javascript" src="/homes/js/jquery.insetBorderEffect.js"></script>

<!-- JS for jQuery Fancy Box -->
<script type="text/javascript" src="/homes/fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

<!-- JS for superfish navigation menu -->
<script type="text/javascript" src="/homes/superfish/hoverIntent.js"></script> 
<script type="text/javascript" src="/homes/superfish/superfish.js"></script> 

</head>
<body>
	
<div id="container">

	<div id="header-top">
		<p>
			<strong>FREE</strong> delivery on orders over $100. Add promo code <span class="promocode">FREEDEV</span> at checkout. Expires 12 March
		</p>
	</div>
	
	<div class="header-main">
		<div class="logo">
			<a href="index.html" name="top"><img src="/homes/images/logo.png" alt="logo" border="0"/></a>
		</div>
		
		<div class="login-block">
			<span class="account"><a href="#" class="account">Sign In</a></span> <span class="cart"><a href="cart.html" class="cart">My Cart (0)</a></span>
		</div>
	</div>
	
	<div id="navigation">
		
		<div class="search-container">
			<div class="search-inner">	
				<input type="text" value="I am looking for..." onfocus="if(this.value=='I am looking for...'){this.value=''};" onblur="if(this.value==''){this.value='I am looking for...'};" class="search-field"/>
				<input type="submit" id="s_submit" value="" class="search-btn"/>
			</div>
		</div>
		<div class="navigation-inner">
			<div class="flare"></div>
			<div class="home-icon">
				<a href="index.html"><img src="/homes/images/home_icon.png" border="0"/></a>
			</div>
			<!-- Navigation start -->
			<ul class="sf-menu">
				<li class="nav-item"><a href="#">Pages</a>
					<ul>
						<li class="sfish-navgiation-item">
							<a href="price_compare.html">Price Compare Table</a>
						</li>
						<li class="sfish-navgiation-item">
							<a href="faq.html">FAQ</a>
						</li>
						<li class="sfish-navgiation-item">
							<a href="cart.html">Shopping Cart</a>
						</li>
						<li class="sfish-navgiation-item">
							<a href="right_sidebar.html">Right Sidebar</a>
						</li>
					</ul>
				</li>
				<li class="nav-item"><a href="grid.html">Online Store</a>
					<ul>
						<li class="sfish-navgiation-item">
							<a href="grid.html">Product Listing as Grid</a>
						</li>
						<li class="sfish-navgiation-item">
							<a href="list.html">Product Listing as List</a>
						</li>
						<li class="sfish-navgiation-item last">
							<a href="details.html">Product Details</a>
						</li>
					</ul>	
				</li>
				<li class="nav-item"><a href="blog.html">Blog</a></li>
				<li class="nav-item"><a href="#">Shortcodes</a>
					<ul>
						<li class="sfish-navgiation-item">
							<a href="shortcodes_buttons.html">Buttons and Links</a>
						</li>
						<li class="sfish-navgiation-item">
							<a href="shortcodes_columns.html">Columns</a>
						</li>
						<li class="sfish-navgiation-item last">
							<a href="shortcodes_tabs.html">Tabs and Accordions</a>
						</li>
					</ul>	
				</li>
				<li class="nav-item"><a href="#">Portfolio</a>
					<ul>
						<li class="sfish-navgiation-item">
							<a href="portfolio_2columns.html">Two Columns Layout</a>
						</li>
						<li class="sfish-navgiation-item">
							<a href="portfolio_3columns.html">Three Columns Layout</a>
						</li>
						<li class="sfish-navgiation-item last">
							<a href="portfolio_4columns.html">Four Columns Layout</a>
						</li>
					</ul>
				</li>
				<li class="nav-item"><a href="contacts.html">Contacts</a></li>
			</ul>
			<!-- Navigation end -->
			
			<!-- Megamenu Begin -->
			<ul id="ldd_menu" class="ldd_menu">
				<li>
					<span>Mega Menu</span><!-- Increases to 510px in width-->
					<div class="ldd_submenu">
						<div class="mega-menu-text float-left">
							<h4>What is Mega Menu?</h4>
							Mega menu is a next step of the js based dropdown. It's similar to a normal menu in terms of general behaviour, but enriched with more options, multiple links, complex navigation, form elements like login, search and much more.
						</div>
						<div class="mega-menu-text float-right">
							<h4>Example</h4>
							<p class="newsletter">
								<input type="text" class="megamenu-field" onblur="if(this.value==''){this.value='Enter your e-mail...'};" onfocus="if(this.value=='Enter your e-mail...'){this.value=''};" value="Enter your e-mail...">
							</p>
							<p class="newsletter">
								<input type="text" class="megamenu-field" onblur="if(this.value==''){this.value='Enter your name...'};" onfocus="if(this.value=='Enter your name...'){this.value=''};" value="Enter your name...">
							</p>
						</div><br class="clear"/>
						<div class="mega-menu-text float-left">
							<h4>Why do I need it?</h4>
							Because you can create much more interesting and complex navigation systems, grouping links, improve the UI, improve the user's workflow while filling forms, signing in etc.
						</div>
						<div class="mega-menu-text float-right">
							<h4>Another example</h4>
							<img src="/homes/images/slide_small1.jpg">
							<img src="/homes/images/slide_small3.jpg">
							<img src="/homes/images/slide_small2.jpg">
						</div>
					</div>
				</li>
			</ul>
			<!-- Megamenu End -->
			

			           @section('content')


                        @show



		</div>
	</div>

		<!-- Bullet List End -->
		
		<br class="clear"/>

	</div>
	
	<div id="footer">
		<div class="footer-main">
			
			<div class="back-to-top"><a href="#top"><img src="/homes/images/top.png" alt="Back to top" border="0"/></a></div>
			
			<!-- Footer Column 1 Begin -->
			<div class="left-column float-left">
				<h5>Quick navigation</h5>
				<ul class="footer-nav">
					<li class="first"><a href="#">Customer support 24/7</a></li>
					<li><a href="#">Shipping information</a></li>
					<li><a href="#">Terms and conditions</a></li>
					<li><a href="#">Legal notice</a></li>
					<li><a href="#">Return policy</a></li>
					<li><a href="#">FAQ</a></li>
				</ul>
			</div>
			<!-- Footer Column 1 End -->
			
			<!-- Footer Column 2 Begin -->
			<div class="middle-column float-left">
				<h5>Newsletter</h5>
				<p>Sign up for our newsletter to receive on a regular basis updates, hot offers, site news etc.</p>
				<p class="newsletter">
					<input type="text" value="Enter your e-mail..." onfocus="if(this.value=='Enter your e-mail...'){this.value=''};" onblur="if(this.value==''){this.value='Enter your e-mail...'};" class="newsletter-field"/>
					<input type="submit" id="go" value="GO" class="go-btn"/>
				</p>
			</div>
			<!-- Footer Column 2 End -->
			
			<!-- Footer Column 3 Begin -->
			<div class="left-column float-right">
				<h5>Contact us</h5>
				<p>Paris, France 12009<br/>
					Boulevard de Sevastopol 377, Building A, Office 177
				</p>
<p>More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a></p>
				<p>
					Phone: +33 123 456 and +33 456 789<br/>
					Fax: +33 123 456<br/>
					Email: <a href="#" class="footerlink">info@yoursite.com</a><br/>
				</p>
				<p>
					<a href="#" class="social"><img src="/homes/images/facebook.png" alt="facebook" border="0"/></a>
					<a href="#" class="social"><img src="/homes/images/vimeo.png" alt="vimeo" border="0"/></a>
					<a href="#" class="social"><img src="/homes/images/youtube.png" alt="youtube" border="0"/></a>
					<a href="#" class="social"><img src="/homes/images/twitter.png" alt="twitter" border="0"/></a>
					<a href="#" class="social"><img src="/homes/images/google.png" alt="google" border="0"/></a>
				</p>
			</div>
			<!-- Footer Column 3 End -->
		</div>
	</div>

</div>

<script type="text/javascript">

	// Megamenu
	$(function() {
						
		var $menu = $('#ldd_menu');
		
		$menu.children('li').each(function(){
			var $this = $(this);
			var $span = $this.children('span');
			$span.data('width',$span.width());
			
			$this.bind('mouseenter',function(){
				$menu.find('.ldd_submenu').stop(true,true).hide();
				$span.stop().animate({'width':'auto'},150,function(){
					$this.find('.ldd_submenu').slideDown(300);
				});
			}).bind('mouseleave',function(){
				$this.find('.ldd_submenu').stop(true,true).hide();
				$span.stop().animate({'width':$span.data('width')+'px'},300);
			});
		});
	});
	
	$(document).ready(function() {
		
		// Border effects
		$("#main_navi li img").insetBorder({
			borderColor : '#EDE6E9',
			inset: 4
		});
		
		// Navigation menu
		$('ul.sf-menu').superfish({ 
			delay: 100
		});  
		
		// Slider
		$(".slider").scrollable({
			next: '.next2', 
			prev: '.prev2'
		});
	
		// Fancybox
		$("a.grouped-elements").fancybox({
			'titlePosition'	: 'inside'
		});

		$("a[rel=group4]").fancybox({
			'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'titlePosition' 	: 'over',
			'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
				return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
			}
		});
		
		// Mouseover effect for thumbnails
		$("a.grouped-elements").hover(function() {
			  $(this).find(".imagehover").toggleClass("mouseon");
		});
		
	});

	$(window).load(function() {
		// Main Promo Scroller
		$("#main").scrollable({

			vertical: true,
			keyboard: 'static',
			onSeek: function(event, i) {
				horizontal.eq(i).data("scrollable").focus();
			}
		
		}).navigator("#main_navi");

		var horizontal = $(".scrollable").scrollable({ circular: true }).navigator(".navi");
		horizontal.eq(0).data("scrollable").focus();
	});
	
</script>


</body>
</html>