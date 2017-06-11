@extends('layouts.app')

@section('title', 'Home - ToDo')

@section('extraCSS')
<link href="{{ secure_asset('css/jquery-ui.css',array(),true) }}" rel="stylesheet">
<link href="{{ secure_asset('css/jquery-ui.theme.css',array(),true) }}" rel="stylesheet">
@endsection

@section('extraNav')
<li>
		<a href="/ruap">Ruap</a>
</li>
@endsection

@section('content')
<div class="row">

		<!-- Blog Entries Column -->
		<div class="col-md-8">

				<h1 class="page-header">
						Ruap
				</h1>

				<form method="post" action="">
					{{ csrf_field() }}
					<div class="form-group">
						<h4>Sex</h4>
						<label class="radio-inline">
	      			<input type="radio" name="gender" value="m" checked>Male<br>
	    			</label>
						<label class="radio-inline">
							<input type="radio" name="gender" value="f">Female<br>
						</label>
					</div>

					<div class="form-group">
						<h4>Age</h4>
					 	<input type="number" name="age" min="10" max="99" value ="16" class="form-control">
				 	</div>

					<div class="form-group">
						<h4>Place of living</h4>
						<label class="radio-inline">
	      			<input type="radio" name="address" value="urban" checked>Urban<br>
	    			</label>
						<label class="radio-inline">
							<input type="radio" name="address" value="rural">Rural<br>
						</label>
					</div>

					<div class="form-group">
						<h4>Family size</h4>
						<label class="radio-inline">
	      			<input type="radio" name="famsize" value="le3" checked>Less or equal to 3<br>
	    			</label>
						<label class="radio-inline">
							<input type="radio" name="famsize" value="ge3">Greater then 3<br>
						</label>
					</div>

					<div class="form-group">
						<h4>Mother's education</h4>
						<select name="medu" class="form-control" >
						  <option value="0">None</option>
						  <option value="1">Primary</option>
						  <option value="2">3-year highschool</option>
							<option value="3">4-year highschool</option>
						  <option value="4">Higher</option>
						</select>
					</div>

					<div class="form-group">
						<h4>Father's education</h4>
						<select name="fedu" class="form-control" >
						  <option value="0">None</option>
						  <option value="1">Primary</option>
						  <option value="2">3-year highschool</option>
							<option value="3">4-year highschool</option>
						  <option value="4">Higher</option>
						</select>
					</div>

					<div class="form-group">
						<h4>Reason for choosing school</h4>
						<select name="reason" class="form-control" >
						  <option value="home">Close to home</option>
						  <option value="reputation">School's reputation</option>
						  <option value="course">Course preference</option>
							<option value="other">Other</option>
						</select>
					</div>

					<div class="form-group">
						<h4>Weekly study time</h4>
						<select name="studytime" class="form-control" >
						  <option value="1">&lt;2 hours</option>
						  <option value="2">2 to 5 hours</option>
							<option value="3">5 to 10 hours</option>
						  <option value="4">&gt;10 hours</option>
						</select>
					</div>

					<div class="form-group">
						<h4>Freetime after school</h4>
						<select name="freetime" class="form-control" >
						  <option value="1">Very low</option>
						  <option value="2">Low</option>
							<option value="3">Normal</option>
							<option value="4">High</option>
						  <option value="5">Very high</option>
						</select>
					</div>

					<div class="form-group">
						<h4>Going out with friends</h4>
						<select name="goout" class="form-control" >
						  <option value="1">Very low</option>
						  <option value="2">Low</option>
							<option value="3">Normal</option>
							<option value="4">High</option>
						  <option value="5">Very high</option>
						</select>
					</div>

					<div class="form-group">
						<h4>Workday alcohol consumption</h4>
						<select name="dalc" class="form-control" >
							<option value="1">Very low</option>
							<option value="2">Low</option>
							<option value="3">Normal</option>
							<option value="4">High</option>
							<option value="5">Very high</option>
						</select>
					</div>

					<div class="form-group">
						<h4>Weekend  alcohol consumption</h4>
						<select name="walc" class="form-control" >
							<option value="1">Very low</option>
							<option value="2">Low</option>
							<option value="3">Normal</option>
							<option value="4">High</option>
							<option value="5">Very high</option>
						</select>
					</div>

					<div class="form-group">
						<h4>Do you pay for extra classes</h4>
						<label class="radio-inline">
	      			<input type="radio" name="paid" value="yes" checked>Yes<br>
	    			</label>
						<label class="radio-inline">
							<input type="radio" name="paid" value="no">No<br>
						</label>
					</div>

					<div class="form-group">
						<h4>Do you want to pursuit higher education</h4>
						<label class="radio-inline">
	      			<input type="radio" name="higher " value="yes" checked>Yes<br>
	    			</label>
						<label class="radio-inline">
							<input type="radio" name="higher " value="no">No<br>
						</label>
					</div>

					<!-- TODO add grade inputs -->
					<button type='submit' name ='loginButton' class='btn btn-primary'>Calculate grade</button><br><br>
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
