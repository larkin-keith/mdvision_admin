@extends('layouts.home')

@section('content')
<div class="about">
	<div class="container">
		<div class="about-top heading">
			<h1>关于我们</h1>
			<h4>{!! $about ? $about->title : '' !!}</h4>
			{!! $about ? $about->content : '' !!}
			<!-- <div class="about-bottom">
				<div class="col-md-4 about-left">
					<a href="single.html"><img src="/public/images/abt-1.jpg" alt="" /></a>
					<h5><a href="single.html">What We Do</a></h5>
					<p>Suspendisse commodo tempor sagittis! In justo est, sollicitudin eu scelerisque pretium, placerat eget elit. Vestibulum congue turpis ac tincidunt accumsan.</p>
				</div>
				<div class="col-md-4 about-left">
					<a href="single.html"><img src="/public/images/abt-2.jpg" alt="" /></a>
					<h5><a href="single.html">Our Standards</a></h5>
					<p>Suspendisse commodo tempor sagittis! In justo est, sollicitudin eu scelerisque pretium, placerat eget elit. Vestibulum congue turpis ac tincidunt accumsan.</p>
				</div>
				<div class="col-md-4 about-left">
					<a href="single.html"><img src="/public/images/abt-3.jpg" alt="" /></a>
					<h5><a href="single.html">Our Capabilities</a></h5>
					<p>Suspendisse commodo tempor sagittis! In justo est, sollicitudin eu scelerisque pretium, placerat eget elit. Vestibulum congue turpis ac tincidunt accumsan.</p>
				</div>
				<div class="clearfix"></div>
			</div> -->
		</div>
	</div>
</div>
<!----about-end---->
<!--advantages-starts--> 
<!-- <div class="advantages">
	<div class="container">
		<div class="col-md-6 advantages-left heading">
			<h2>OUR ADVANTAGES</h2>
			<div class="advn-one">
					<div class="ad-mian">
						<div class="ad-left">
							<p>1</p>
						</div>
						<div class="ad-right">
							<h4><a href="single.html">Elacus a porta varius dui</a></h4>
							<p>In neque arcu, vulputate vitae dignissim id, placerat adipiscing lorem. Nulla consectetur adipiscing metus vel pulvinar. Aenean molestie mauris non diam tincidunt faucibus. </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="ad-mian">
						<div class="ad-left">
							<p>2</p>
						</div>
						<div class="ad-right">
							<h4><a href="single.html">Elacus a porta varius dui</a></h4>
							<p>In neque arcu, vulputate vitae dignissim id, placerat adipiscing lorem. Nulla consectetur adipiscing metus vel pulvinar. Aenean molestie mauris non diam tincidunt faucibus. </p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="ad-mian">
						<div class="ad-left">
							<p>3</p>
						</div>
						<div class="ad-right">
							<h4><a href="single.html">Elacus a porta varius dui</a></h4>
							<p>In neque arcu, vulputate vitae dignissim id, placerat adipiscing lorem. Nulla consectetur adipiscing metus vel pulvinar. Aenean molestie mauris non diam tincidunt faucibus. </p>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
		</div>
		<div class="col-md-6 advantages-left heading">
			<h3>OUR SKILLS</h3>
		<div class="advn-two">
					<h4>Erci eu tincidunt lacinia, elit quam ultri ces ipsum, quis ultricies ipsum ante</h4>
					<p>Donec sagittis interdum tellus sed bibendum. Aen ean fringilla ut lacus eu vehicula. Curabitur non nibh quis nisi vestibulum aliquet non sed dolor. Ut est risus, consectetur sit amet pretium in, cursus in dui. Donec ac rhoncus libero.</p>
					<ul>
						<li><a href="#">Praesent vestibulum molestie lacus</a></li>
						<li><a href="#">Donec sagittis interdum tellus</a></li>
						<li><a href="#">Nulla consectetur adipiscing</a></li>
						<li><a href="#">Donec ac rhoncus libero.</a></li>
						<li><a href="#">Erci eu tincidunt lacinia</a></li>
					</ul>
		</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div> -->
<!--advantages-end--> 
<!--team-starts--> 
<!-- <div class="team">
	<div class="container">
		<div class="team-top heading">
			<h3>OUR TEAM</h3>
		</div>
		<div class="team-bottom">
			<ul class="ch-grid">
				<li>
					<div class="ch-item ch-img-1">				
						<div class="ch-info-wrap">
							<div class="ch-info">
								<div class="ch-info-front ch-img-1"></div>
								<div class="ch-info-back">
									<h3>Bears Type</h3>
									<p>by Josh Schott</p>
								</div>	
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="ch-item ch-img-2">
						<div class="ch-info-wrap">
							<div class="ch-info">
								<div class="ch-info-front ch-img-2"></div>
								<div class="ch-info-back">
									<h3>Salon Spaces illustrations</h3>
									<p>by Jeremy Slagle</p>
								</div>
							</div>
						</div>
					</div>
				</li>
				<li>
					<div class="ch-item ch-img-3">
						<div class="ch-info-wrap">
							<div class="ch-info">
								<div class="ch-info-front ch-img-3"></div>
								<div class="ch-info-back">
									<h3>Leadership Series #3</h3>
									<p>by Dustin Leer</p>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div> -->
<!--blog-->
@endsection