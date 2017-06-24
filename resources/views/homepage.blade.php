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
				<img class="img-responsive" src="{{ secure_asset('images/blog.png',array(),true) }}" alt="BlogPage">
			</a>
			<h3>
				<a href="/blog">Blog</a>
			</h3>
			<p>A simple blog application where you can add, search or comment posts.</p>
		</div>
		<div class="col-md-6 portfolio-item">
			<a href="/uhp">
				<img class="img-responsive" src="{{ secure_asset('images/uhp.png',array(),true) }}" alt="UhpTaskPage">
			</a>
			<h3>
				<a href="/uhp">UHP Digital task</a>
			</h3>
			<p>Text for task found on UHP Digital company web site. <br>
				<a href="http://www.uhp-digital.com/hr/job-application">Link</a>
			</p>
		</div>
	</div>
	<!-- /.row -->
	<!-- Projects Row -->
	<div class="row">
		<!-- <div class="col-md-6 portfolio-item">
			<a href="/todo">
				<img class="img-responsive" src="http://placehold.it/700x400" alt="ToDoPage">
			</a>
			<h3>
				<a href="/todo">To Do List</a>
			</h3>
			<p>A To-do application where you can create your to do list. Login and registering is available. *IN PROGRESS*</p>
		</div> -->

		<div class="col-md-6 portfolio-item">
			<a href="/ruap">
				<img class="img-responsive" src="{{ secure_asset('images/ruap.png',array(),true) }}" alt="RuapPage">
			</a>
			<h3>
				<a href="/ruap">RUAP</a>
			</h3>
			<p>Application for faculty course.</p>
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
