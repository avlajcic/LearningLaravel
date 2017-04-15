@extends('layouts.app')

@section('title', 'Home')

@section('content')
	<!-- Page Header -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Projects
			</h1>
		</div>
	</div>
	<!-- /.row -->

	<!-- Projects Row -->
	<div class="row">
		<div class="col-md-6 portfolio-item">
			<a href="/blog">
				<img class="img-responsive" src="{{ secure_asset('images/blog.png',array(),true) }}" alt="">
			</a>
			<h3>
				<a href="/blog">Blog</a>
			</h3>
			<p>A simple blog application where you can add, search or comment posts.</p>
		</div>
		<div class="col-md-6 portfolio-item">
			<a href="#">
				<img class="img-responsive" src="http://placehold.it/700x400" alt="">
			</a>
			<h3>
				<a href="#">Project Two</a>
			</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
		</div>
	</div>
	<!-- /.row -->
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
