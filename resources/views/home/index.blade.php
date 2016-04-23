@extends('layouts.home')

@section('content')
<!--banner-starts-->
	<div class="banner" id="home">
		<div class="container">
			<!-- <section class="slider">
                <div class="flexslider">
                    <ul class="slides">
						<li>
							<div class="banner-top">
							<div class="col-md-6 banner-left">
							<div class="bnr-one">
								<img src="/public/images/b-2.jpg" alt="" />
								<h3>Donec interdum</h3>
								<a href="#">查看更多</a>
							</div>
						</div>
						<div class="col-md-6 banner-left">
							<div class="bnr-one">
								<img src="/public/images/b-1.jpg" alt="" />
								<h3>Aliquam bibendum</h3>
								<a href="#">查看更多</a>
							</div>
						</div>
						
						<div class="clearfix"></div>
					</div>
				</li>
				<li>
					<div class="banner-top">
						<div class="col-md-6 banner-left">
							<div class="bnr-one">
								<img src="/public/images/b-2.jpg" alt="" />
								<h3>Aliquam bibendum</h3>
								<a href="#">查看更多</a>
							</div>
						</div>
						<div class="col-md-6 banner-left">
							<div class="bnr-one">
								<img src="/public/images/b-3.jpg" alt="" />
								<h3>Quisque pharetra</h3>
								<a href="#">查看更多</a>
							</div>
						</div>
						
						<div class="clearfix"></div>
					</div>
				</li>
				<li>
					<div class="banner-top">
						<div class="col-md-6 banner-left">
							<div class="bnr-one">
								<img src="/public/images/b-1.jpg" alt="" />
								<h3>Quisque pharetra</h3>
								<a href="#">查看更多</a>
							</div>
						</div>
						<div class="col-md-6 banner-left">
							<div class="bnr-one">
								<img src="/public/images/b-2.jpg" alt="" />
								<h3>Donec interdum</h3>
								<a href="#">查看更多</a>
							</div>
						</div>
						
						<div class="clearfix"></div>
					</div>
				</li>
          </ul>
        </div>
      </section> -->
		</div>
	</div>
	<!--banner-ends--> 
</div>
	<!--End-slider-script-->
	<!--welcome-starts--> 
	<div class="welcome">
		<div class="container">
			<div class="welcome-top">
				<h1>迈迪微视</h1>
				<p> 深圳市迈德威视科技有限公司是一家专业的工业相机供应商，专注于工业相机的研发、生产和销售。
    公司拥有雄厚的技术实力，提供各种接口(USB2.0/3.0, GIGE VGA/HDMI)的工业相机和相机订制开发服务。
    公司因产品性价比高、服务好，技术支持完善等受到广大自动化生产商和显微镜厂家的青睐。公司产品广泛应用于显微镜成像、机器视觉、工业检测、条码识别、生物医学、教学、智能交通、虹膜识别、新能源探测及科学研究等领域。
    态度决定一切，细节决定成败！客户的满意是我们最大的追求。
    诚邀各大自动化厂家、视觉软件开发商、镜头厂商、光源厂商建立合作关系，携手共赢。</p>
			</div>
			<div class="welcome-bottom">
				<!-- <div class="col-md-6 welcome-left">
					<h3>工业相机</h3>
					<p>Integer tincidunt ligula id lacinia placerat. Etiam rutrum fermentum tortor. Nunc tempor dui nec tincidunt eleifend. Phasellus lacinia gravida mollis. Curabitur laoreet ligula tempus, elementum dui quis, malesuada velit. Nullam cursus a magna vitae vestibulum.</p>
					<div class="welcome-one">
						<div class="col-md-6 welcome-one-left">
							<a href="single.html"><img src="/public/images/w-6.jpg" alt="" /></a>
						</div>
						<div class="col-md-6 welcome-one-right">
							<a href="single.html"><img src="/public/images/w-4.jpg" alt="" /></a>
							<a href="single.html" class="one-top"><img src="/public/images/w-5.jpg" alt="" /></a>
						</div>
						<div class="clearfix"></div>
					</div>
				</div> -->
				@if ($articles)
					@forelse($articles as $article)
						<div class="col-md-6 welcome-left">
							<h3>{{ $article->article->title }}</h3>
							<p>{{ str_limit($article->article->infomation, 180) }}</p>
							<div class="welcome-one">
								<a href="{{ route('home.articles.show', $article->article->id) }}"><img src="{{ $article->article->main_image }}" alt="{{ $article->article->title }}" /></a>
							</div>
						</div>
						<!-- <div class="clearfix"></div> -->
					@empty
					@endforelse
				@endif
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--welcome-ends--> 
	<!--offer-starts-->
	<div class="offer">
		<div class="container">
			<div class="offer-top heading">
				<h2>产品展示 Products display	</h2>
			</div>
			<div class="offer-bottom">
				@if ($products)
					@forelse($products as $product)
					<div class="col-md-3 offer-left">
						<a href="{{ route('home.products.index') }}"><img src="{{$product->product->image }}" alt="" />
						<h6>$29</h6></a>
						<h4><a href="{{ route('home.products.index') }}">{{$product->product->title }}</a></h4>
						<p>{{ str_limit($product->product->infomation, 80) }}</p>
						<div class="o-btn">
							<a href="{{ route('home.products.index') }}">查看更多</a>
						</div>
					</div>
					@empty
					@endforelse
				@endif
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--offer-ends--> 
	<!--nature-starts--> 
	<div class="nature">
		<div class="container">
			<div class="nature-top">
				<h3>Maecenas ornare lobortis</h3>
				<p>Phasellus tempor erat id erat gravida pulvinar. Aenean est felis, ullamcorper et volutpat sed, cursus at enim. Vestibulum vel finibus neque. In sed magna tellus.</p>
			</div>
		</div>
	</div>
	<!--nature-ends--> 
	<!--field-starts--> 
	<div class="fields">
		<div class="container">
			<div class="fields-top">
				<div class="col-md-4 fields-left">
					<span class="home"></span>
					<h4>Vestibulum vel finibus</h4>
					<p>Pellentesque sed sem bibendum, rutrum ipsum vitae, facilisis turpis. Mauris vitae metus gravida, hendrerit erat ac, facilisis ligula.</p>
				</div>
				<div class="col-md-4 fields-left">
					<span class="men"></span>
					<h4>Quisque non ligula</h4>
					<p>Pellentesque sed sem bibendum, rutrum ipsum vitae, facilisis turpis. Mauris vitae metus gravida, hendrerit erat ac, facilisis ligula.</p>
				</div>
				<div class="col-md-4 fields-left">
					<span class="pen"></span>
					<h4>Lorem ipsum dolor</h4>
					<p>Pellentesque sed sem bibendum, rutrum ipsum vitae, facilisis turpis. Mauris vitae metus gravida, hendrerit erat ac, facilisis ligula.</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	@push('scripts')
	
	<script type="text/javascript">
	$(function() {
		$(".banner").css({'background':'url({{ $advertisements ? $advertisements->banner_url : '' }}) center no-repeat', 'background-size':'cover'})
	});
	</script>
	
	@endpush
@endsection