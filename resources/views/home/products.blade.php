@extends('layouts.home')

@section('content')
<div class="gallery">
		<div class="container">
			<div class="gallery-top heading">
				<h1>产品展示</h1>
			</div>
			<div class="gallery-bottom">
				<div class="gallery-1">
					@forelse($products as $product)
					<div class="col-md-3 gallery-left">
						<a href="{{ $product->image }}">
							<img class="lazyOwl" src="{{ $product->image }}" alt="{{ $product->title }}" />
						</a>
						<p>{{ $product->title }}</p>
					</div>
					@empty
					@endforelse
					<!-- <div class="col-md-3 gallery-left">
						<a href="/public/images/port-2.jpg">
							<img class="lazyOwl" src="/public/images/port-2.jpg" alt="name" />
						</a>
					</div>
					<div class="col-md-3 gallery-left">
						<a href="/public/images/port-5.jpg">
							<img class="lazyOwl" src="/public/images/port-5.jpg" alt="name" />
						</a>
					</div>
					<div class="col-md-3 gallery-left">
						<a href="/public/images/port-6.jpg">
							<img class="lazyOwl" src="/public/images/port-6.jpg" alt="name" />
						</a>
					</div> -->
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="pagination">
			<nav>
					<!-- <ul class="pager">
					<li><a href="#">Previous</a></li>
					<li><a href="#">Next</a></li>
					</ul> -->
					{!! $products->render() !!}
			</nav>
		</div>
		</div>
	</div>	
	<!----gallery-end---->
@endsection