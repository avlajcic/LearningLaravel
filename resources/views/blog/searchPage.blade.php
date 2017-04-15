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
						Blog <small>search</small>
				</h1>

				@foreach ($articles as $article)
				    <a href="{{ route('article', ['id' => $article->id]) }}" style="display: inline-block"><h2>{{ $article->title }}</h2></a>
						 <a type="button" title="Remove" class="btn btn-danger btn-circle" style="float:right" href="{{ route('deleteArticle', ['id' => $article->id]) }}">
							 <i class="glyphicon glyphicon-remove"></i>
						 </a>
				    <p>{{ $article->body }}</p>
						<hr>
				@endforeach

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
