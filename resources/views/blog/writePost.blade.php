@extends('layouts.app')

@section('title', 'Blog')

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
				<form action="submitpost.php" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="title">Title:</label>
							<input type="text" class="form-control" name ="title">
						</div>

						<div class="form-group">
							<label for="text">Text:</label>
							<textarea class="form-control" rows="5" name="text"></textarea>
						</div>

						<label>Image:</label>
						<div class="input-group">
							<input type="text" class='form-control filename' id="upload-file-info" disabled>
							<label class="btn btn-primary" for="my-file-selector">
							    <input id="my-file-selector" type="file" style="display:none;" accept=".png, .jpg, .jpeg" onchange="$('#upload-file-info').val($(this).val().split('\\').pop());">
							    Upload file
							</label>
						</div>

						<br>
						<input type="submit" class="btn btn-info" value="Pošalji">
				</form>
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
