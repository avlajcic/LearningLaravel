@extends('layouts.app')

@section('title', 'Home - UHP')

@section('content')
<div class="row">

		<div class="col-md-8">

				<h1 class="page-header">
						Uhp Digital <small>task</small>
				</h1>

				<h4><strong>Note</strong></h4>
				<p>Sometimes on some computers Heroku will return server error after clicking "Solve" for unknown
					reason (everything works locally, I swear :) ). Somewhere there is a problem with AJAX calls. Still
					working on a fix. <br>
					There is a <strong>strange fix </strong> though.
					Go to Blog part, comment something and then everything should work. This also fixes glyphicons
					sometimes not loading.
				</p>
				<br>
				<h4><strong>Task</strong></h4>
				<p>Input is JSON matrix. Task is:<br>
					1) Sort first row in ascending order. Then, move all the other rows in same way.
							Eg: [3 2 1] [2 4 1] -> [1 2 3] [1 4 2] <br>
					2) Find largest element in matrix without first row. Then, calculate sum of coordinates where
							largest element appears. Coordinates start with [1,1].

				</p>
				<form action="/uhp" method="post" id="jsonForm">
					 	{{ csrf_field() }}
						<div class="form-group">
							<label for="jsonData">JSON:</label>
							<textarea class="form-control" rows="15" name="jsonData">
{
	"firstRow": [
		7,
		2,
		9
		],
	 "secondRow":[
		9,
		2,
		5
		],
	 "thirdRow":[
		3,
		6,
		9
		]
}
							</textarea>
						</div>

						<br>
						<input type="submit" class="btn btn-info" value="Solve">
				</form>

				<div id="solution"></div>

		</div>

		<div class="col-md-4">



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
	$( '#jsonForm' ).on( 'submit', function(e) {
	    e.preventDefault();
	    $.ajax({
	        type: "POST",
	        url: "{{ route('solveUhpTask') }}",
	        data: $(this).serialize(),
	        success: function( solution ) {
						console.log(solution);
	        	$("#solution").html(
							 "<br><p>Sum of coordinates of largest elements is: "+solution+"</p>"
						 );
	        },
					error: function(data){
						var errors = data.responseJSON;
						console.log(errors);
		      }
	    });
		});
});
</script>
@endsection
