@extends('layouts.home')

@section('content')
<!--blog-->
<div class="blog">
	<div class="container">
		<div class="blog-head heading">
			<h1>行业新闻</h1>
		</div>	
		<div class="blog-top">
			<div class="col-md-12 blog-one-left">
				@forelse($articles as $article)
				<div class="blog-main-one">
					<div class="blog-one">
						<div class="blog-title">
							<a href="{{ route('home.articles.show', $article->id) }}" class="bg">{{ $article->active }}</a>
						</div>
						<div class="col-md-5 blog-one-left">
							<a href="{{ route('home.articles.show', $article->id) }}"><img src="{{ $article->main_image }}" alt="" /></a>
						</div>
						<div class="col-md-7 blog-one-left">
							{{ str_limit($article->infomation, 180) }}
							<div class="b-btn">
								<a href="{{ route('home.articles.show', $article->id) }}">查看更多</a>
							</div>	
						</div>
						<div class="clearfix"></div>
					</div>	
					<div class="blog-comments">
						<ul>
							<li><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span><p>{{ $article->created_at->toFormattedDateString() }}</p></li>
							<li><span class="glyphicon glyphicon-user" aria-hidden="true"></span><a href="#">管理员</a></li>
						</ul>
						<div class="clearfix"></div>
					</div>	
				</div>
				@empty
				@endforelse	
			</div>
			<!-- <div class="col-md-3 blog-right">
				<div class="categories">
					<h2>CATEGORIES</h2>
					<ul>
						<li><a href="#">Aenean tortor orci</a></li>
						<li><a href="#">Duis bibendum pellentesquev</a></li>
						<li><a href="#">Quisque pharetra semper</a></li>
						<li><a href="#">Cras condimentum risus</a></li>
						<li><a href="#"> Quisque id erat sapien</a></li>
					</ul>
				</div>
				<div class="categories">
					<h3>RECENT POSTS</h3>
					<ul>
						<li><a href="#">Fusce id volutpat est</a></li>
						<li><a href="#">Phasellus condimentum odio</a></li>
						<li><a href="#">Donec interdum eros elit</a></li>
						<li><a href="#">Cras condimentum risus</a></li>
						<li><a href="#">Proin sodales diam ac </a></li>
					</ul>
				</div>
				<div class="categories">
					<h3>ARCHIVES</h3>
					<ul>
						<li><a href="#">March 3014</a></li>
						<li><a href="#">May 2014</a></li>
						<li><a href="#">August 2014</a></li>
						<li><a href="#">October 2014</a></li>
					</ul>
				</div>
			</div> -->
			<div class="clearfix"></div>
		</div>
		<div class="pagination">
			<nav>
					<!-- <ul class="pager">
					<li><a href="#">Previous</a></li>
					<li><a href="#">Next</a></li>
					</ul> -->
					{!! $articles->render() !!}
			</nav>
		</div>
	</div>
</div>
<!--blog-->
@endsection