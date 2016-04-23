@extends('layouts.home')

@section('content')

<div class="blog">
	<div class="container">
		<div class="blog-head heading">
		
		</div>	
		<div class="blog-top">
			<div class="col-md-12 blog-left">
				<div class="blog-main">
					<a href="single.html" class="bg">{{ $article->title }}</a>
					<p>Post by <a href="#">Admin</a> {{ $article->created_at->toFormattedDateString() }} </p>
				</div>
				<div class="blog-main-one">
					<div class="blog-one">
						<img src="{{$article->main_image}}" alt="{{ $article->title }}" />
						<h3> Infomation </h3>
						<p>{{ $article->infomation }}</p>
						<h3> Content </h3>
						<p>{{ $article->content }}</p>
					</div>	
					<div class="blog-comments">
						<ul>
							<li><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span><p>{{ $article->created_at->toFormattedDateString() }}</p></li>
							<li><span class="glyphicon glyphicon-user" aria-hidden="true"></span><a href="#">管理员</a></li>
						</ul>
						<div class="clearfix"></div>
					</div>	
				</div>
				<!-- <div class="comments">
					<div class="comments-top heading">
						<h3>COMMENTS</h3>
					</div>
					<div class="comments-bottom">
						<div class="media">
							<div class="media-left">
								<a href="#">
								<img class="media-object" src="images/co.png" alt="" />
								</a>
							</div>
							<div class="media-body">
								<h4 class="media-heading">Fusce scelerisque</h4>
								<p>Phasellus ut ex eu quam interdum ultrices ac congue nunc. Donec ultricies volutpat purus at rutrum. Suspendisse malesuada ligula eu elit aliquet porttitor. Integer ac magna eget lacus venenatis sagittis id vitae massa.</p>
								<div class="media">
									<div class="media-left">
										<a href="#">
										<img class="media-object" src="images/co.png" alt="" />
										</a>
									</div>
									<div class="media-body">
										<h4 class="media-heading">Curabitur vitae libero</h4>
										<p>Phasellus ut ex eu quam interdum ultrices ac congue nunc. Donec ultricies volutpat purus at rutrum. Suspendisse malesuada ligula eu elit aliquet porttitor. Integer ac magna eget lacus venenatis sagittis id vitae massa.</p>
									</div>
								</div> 	
							</div>
							<div class="media">
								<div class="media-left">
									<a href="#">
									<img class="media-object" src="images/co.png" alt="">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading"><a href="#">Melinda Dee</a></h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
									Duis aute irure dolor in reprehenderit .</p>
								</div>
								</div>
							</div>
				</div> -->
			</div>
			<!-- <div class="related heading">
						<h3>RELATED POSTS</h3>
						<div class="related-bottom">
							<div class="col-md-3 related-left">
								<img src="images/r-1.jpg" alt="" />
								<h4>Cum sociis sere</h4>
							</div>
							<div class="col-md-3 related-left">
								<img src="images/r-2.jpg" alt="" />
								<h4>Vestibulum est ex</h4>
							</div>
							<div class="col-md-3 related-left">
								<img src="images/r-3.jpg" alt="" />
								<h4>Ut tincidunt</h4>
							</div>
							<div class="col-md-3 related-left">
								<img src="images/r-4.jpg" alt="" />
								<h4> Aliquam eu quam</h4>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="reply heading">
				 		<h3>LEAVE A COMMENT</h3>
				 		<div class="contact-form">
							<form>
								<input type="text" placeholder="Name" required/>
								<input type="text" placeholder="Email" required/>
								<input type="text" placeholder="Phone" required/>
								<textarea placeholder="Message"></textarea>
								<input type="submit" value="POST"/>
			   				</form>
			   			</div>	
					</div>
			</div>
			<div class="col-md-3 blog-right">
				<div class="categories">
					<h3>CATEGORIES</h3>
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
			</div>
			<div class="clearfix"></div>
		</div> -->
	</div>
</div>
<!--blog-->
@endsection