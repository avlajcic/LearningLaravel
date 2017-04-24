@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@section('title', 'Write post - Blog')

@section('extraNav')
<li>
		<a href="/blog">Blog</a>
</li>
@endsection

@section('content')
<div class="row">

		<!-- Blog Post Content Column -->
		<div class="col-lg-8">
				<!-- Title -->
				<h1>New post</h1>
				<form action="/blog" method="post">
					 	{{ csrf_field() }}
						<div class="form-group">
							<label for="title">Title:</label>
							<input type="text" class="form-control" name ="title">
						</div>

						<div class="form-group">
							<label for="body">Text:</label>
							<textarea class="form-control" rows="5" name="body"></textarea>
						</div>

						<br>
						<input type="submit" class="btn btn-info" value="Publish">
				</form>
				@if (count($errors) > 0)
				    <div class="alert alert-danger">
				        <ul>
				            @foreach ($errors->all() as $error)
				                <li>{{ $error }}</li>
				            @endforeach
				        </ul>
				    </div>
				@endif

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
