@extends('layouts.app')

@section('title', 'Home - ToDo')

@section('extraNav')
<li>
		<a href="/blog">To Do</a>
</li>
@endsection

@section('content')
<div class="row">

		<!-- Blog Entries Column -->
		<div class="col-md-8">

				<h1 class="page-header">
						To Do
				</h1>


				@if (Auth::check())
				    <p>Hey there!</p>
						<form method = 'post' action={{route('logout')}} id="loginForm">
							{{ csrf_field() }}
								<button type='submit' id ='logoutButton' class='btn btn-primary'>Logout</button>
						</form>
				@else
				<form method = 'post' action={{route('login')}} id="loginForm">
					{{ csrf_field() }}
					<div class='inner-addon left-addon'>
						<i class='glyphicon glyphicon-user'></i>
						<input type='text' class='form-control' placeholder='Username' name='name' required/>
					</div> <br>
					<div class='inner-addon left-addon'>
						<i class='glyphicon glyphicon-lock'></i>
						<input type='password' class='form-control' placeholder='Password'  name='password' required/>
					</div><br>
					<button type='submit' name ='loginButton' class='btn btn-default'>Login</button><br><br>
				</form>

				<form method = 'post' action={{route('register')}} id='registerForm'>
					{{ csrf_field() }}
					<div class='inner-addon left-addon'>
							<i class='glyphicon glyphicon-user'></i>
							<input type='text' class='form-control' name='name' placeholder='Username' required/>
				 	</div> <br>
					<div class='inner-addon left-addon'>
							<i class='glyphicon glyphicon-lock'></i>
							<input type='password' class='form-control' name='password' placeholder='Password' required/>
					</div><br>
					<div class='inner-addon left-addon'>
							<i class='glyphicon glyphicon-lock'></i>
							<input type='password' class='form-control' name='password_confirmation' placeholder='Password confirmation' required/>
					</div><br>
					<div class='inner-addon left-addon'>
							<i class='glyphicon glyphicon-envelope'></i>
							<input type='email' class='form-control' name='email' placeholder='Email address' required/>
					</div><br>
					<button type='submit' name ='registerButton' class='btn btn-default'>Register</button><br><br>
				</form>

				<button id ='switchForm' class='btn btn-primary'>Or register</button>
				@endif

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

@section('scripts')
<script>
$( document ).ready( function() {
	$("#registerForm" ).hide();
	$("#switchForm").click(function(event){
			if ($("#loginForm").is(":visible"))
					$(this).html("Or log in");
			else
					$(this).html("Or register");
		 	$("#loginForm").toggle(1000);
		 	$("#registerForm").toggle(1000);
	 });

});
</script>
@endsection
