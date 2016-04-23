<!DOCTYPE html>
<html>
<head>
<title>迈迪微视-Mdvision</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="工业相机，迈迪微视" />
<link rel="shortcut icon" href="/favicon.ico" />
<link href="{{ asset('css/all.min.css') }}" rel='stylesheet' type='text/css' />
</head>
<body>
	<!----start-header---->
	<div class="header" id="home">
		<div class="container">
			<div class="logo">
				<a href="/"><img src="{{ asset('images/logo-2.png') }}" alt=""></a>
			</div>
			<div class="navigation">
			 <span class="menu"></span> 
				<ul class="navig">
					<li><a href="{{ route('home.index') }}" {{ Route::getCurrentRoute()->getName() == 'home.index' ? 'class=active' : '' }}>首页</a><span> </span></li>
					<li><a href="{{ route('home.about.index') }}" {{ Route::getCurrentRoute()->getName() == 'home.about.index' ? 'class=active' : '' }}>关于我们</a><span> </span></li>
					<li><a href="{{ route('home.articles.index') }}" {{ Route::getCurrentRoute()->getName() == 'home.articles.index' ? 'class=active' : '' }}>行业新闻</a><span> </span></li>
					<!-- <li><a href="">定制服务</a><span> </span></li> -->
					<li><a href="{{ route('home.products.index') }}" {{ Route::getCurrentRoute()->getName() == 'home.products.index' ? 'class=active' : '' }}>产品展示</a><span> </span></li>
					<li><a href="{{ route('home.contact.index') }}" {{ Route::getCurrentRoute()->getName() == 'home.contact.index' ? 'class=active' : '' }}>联系我们</a><span> </span></li>
				</ul>
			</div>
		</div>
	</div>	
	@yield('content')
	<!--team-end--> 
	<div class="footer">
		<div class="container">
			<div class="footer-top">
				<div class="col-md-4 footer-left">
					<p>Copyright &copy; 2016.Company name LavenKin <a href="" target="_blank" title="LavenKin">LavenKin</a> - Collect from <a href="" title="LavenKin" target="_blank">LavenKin</a></p>
				</div>
				<!-- <div class="col-md-4 footer-left">
					<h3>Follow Us</h3>
					<ul>
						<li><a href="#"><span class="fb"> </span></a></li>
						<li><a href="#"><span class="twit"> </span></a></li>
						<li><a href="#"><span class="google"> </span></a></li>
						<li><a href="#"><span class="pin"> </span></a></li>
					</ul>
				</div> -->
				<!-- <div class="col-md-4 footer-left">
					<h3>Address</h3>
					<p>The company name, 
					<span>Lorem ipsum dolor,</span>
					Glasglow Dr 40 Fe 72.</p>
				</div> -->
				<div class="clearfix"></div>
			</div>
		</div>
		</div>
		<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	</div>
	<!--footer-ends--> 
	<script type="text/javascript" src="{{ asset('js/all.min.js') }}"></script>
	@stack('scripts')
	
</body>
</html>