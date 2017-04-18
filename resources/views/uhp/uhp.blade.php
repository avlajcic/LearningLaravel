@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="row">

		<div class="col-md-8">

				<h1 class="page-header">
						Uhp Digital <small>task</small>
				</h1>

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
