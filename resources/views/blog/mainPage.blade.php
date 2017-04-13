@extends('layouts.app')

@section('title', 'Home')

@section('extraNav')
<li>
		<a href="/blog">Blog</a>
</li>
@endsection

@section('content')
<div class="row">

		<!-- Blog Entries Column -->
		<div class="col-md-8">

				<h1 class="page-header">
						Blog
				</h1>

				@foreach ($articles as $article)
				    <a href="blog/{{ $article->id }}"><h2>{{ $article->title }}</h2></a>
				    <p>{{ $article->body }}</p>
						<hr>
				@endforeach

		</div>

		<!-- Blog Sidebar Widgets Column -->
		<div class="col-md-4">

				<!-- Blog Search Well -->
				<div class="well">
						<h4>Blog Search</h4>
						<form action="" method = "post" disabled>
								<div class="input-group">
												<input type="text" class="form-control" name="searchtext">
												<span class="input-group-btn">
														<button class="btn btn-default" type="submit" name = "submit">
																<span class="glyphicon glyphicon-search"></span>
														</button>
												</span>
								</div>
						</form>
				</div>
				<div>
						 <a class="btn-lg btn-primary" href="blog/writepost">Novi clanak</a>
				</div>
		</div>
</div>
@endsection

@section('footer')
	<!-- Footer -->
	<footer>
		<div class="row">
			<div class="col-lg-12">
				<p>A. Vlajcic</p>
			</div>
		</div>
		<!-- /.row -->
	</footer>
@endsection
