@extends('layouts.app')

@section('title', 'Post - Blog')

@section('extraNav')
<li>
		<a href="/blog">Blog</a>
</li>
@endsection

@section('content')
<div class="row">

		<!-- Blog Entries Column -->
		<div class="col-md-8">
				   <h2>{{ $article->title }}</h2>
					 <hr>
				   <p>{{ $article->body }}</p>

					 <hr>
					 <h3>Comments</h3>
					 <button class="btn btn-info" id="commentButton">Add new comment</button>

					 <form action="" method="post" id="commentForm" style="display:none">
	 					 	{{ csrf_field() }}
	 						<div class="form-group">
	 							<label for="name">Name:</label>
	 							<input type="text" class="form-control" name ="name">
	 						</div>

	 						<div class="form-group">
	 							<label for="comment">Comment:</label>
	 							<textarea class="form-control" rows="5" name="comment"></textarea>
	 						</div>
							<input type="text" value="{{ $article->id }}" hidden="" name="article_id">

	 						<br>
	 						<input type="submit" class="btn btn-info" value="Comment">
	 				</form>

					<div class="errors"></div>
					<div class="comments">
						@foreach ($comments as $comment)
							<hr>
							<p><strong>{{ $comment->name }}</strong></p>
							<p>{{ $comment->comment }}</p>
						@endforeach
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

@section('scripts')
<script>
$( document ).ready( function() {
	$( "#commentButton" ).click( function() {
			$( "#commentForm" ).toggle( 'slow' );
	});

	$( '#commentForm' ).on( 'submit', function(e) {
	    e.preventDefault();
	    $.ajax({
	        type: "POST",
	        url: "{{ route('storeComment') }}",
	        data: $(this).serialize(),
	        success: function( msg ) {
						if(msg.name == null)
							msg.name = "Anonymous"
						$( "#commentForm" ).toggle( 'slow' );
	        	$(".comments").prepend(
							 "<hr>"+
							 "<p><strong>"+msg.name+"</strong></p>"+
							 "<p>"+msg.comment+"</p>"
						 );
						 $(".errors").html("")
	        },
					error: function(data){
						var errors = data.responseJSON;
						console.log(errors);
						$(".errors").html(
						"<div class='alert alert-danger'><ul>"+
				            errors.comment+
				        "</ul></div>"
							)
		      }
	    });
		});
});
</script>
@endsection
