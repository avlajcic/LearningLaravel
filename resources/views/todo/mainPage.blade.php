@extends('layouts.app')

@section('title', 'Home - ToDo')

@section('extraCSS')
<link href="{{ secure_asset('css/jquery-ui.css',array(),true) }}" rel="stylesheet">
<link href="{{ secure_asset('css/jquery-ui.theme.css',array(),true) }}" rel="stylesheet">
@endsection

@section('extraNav')
<li>
		<a href="/todo">To Do</a>
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
						<form method = 'post' action={{route('logout')}} id="loginForm">
							{{ csrf_field() }}
								<button type='submit' id ='logoutButton' class='btn btn-primary'>Logout</button>
						</form>
						@foreach ($tasks as $task)
									<div>
										<h3 >{{$task->title}}</h3>
										<p>{{$task->dueDate}}</p>
									 	<p>{{$task->about}}</p>
										<button id="done_{{$task->id}}" type="button" title="Completed" class="addbtn btn btn-success btn-circle"><i class="glyphicon glyphicon-ok"></i></button>
									 	<button id="delete_{{$task->id}}'" type="button" title="Remove" class="deletebtn btn btn-danger btn-circle"><i class="glyphicon glyphicon-remove"></i></button>
										<hr>
								 	</div>
						@endforeach

							<button type="button" title="Dodaj novi zadatak" class="btn btn-primary btn-circle addtask"><i class="glyphicon glyphicon-plus"></i></button>

					<br><form id="newTaskForm" method = 'post' action={{route('addTask')}}><br>
								{{ csrf_field() }}
								 <input type='text' class='form-control' placeholder='Title' name='title' required/><br>
								 <input type='text'  placeholder='Date' id='datepicker' name='dueDate' readonly><br><br>
								 <input type='text' class='form-control' placeholder='About' name='about'/><br>
								 <input type="text" value="{{ Auth::user()->id }}" hidden="" name="user_id">
								 <button type='submit' name ='addTaksButton' class='btn btn-primary'>Add new task</button>
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
<script src="{{ secure_asset('js/jquery-ui.js',array(),true) }}"></script>
<script>
$( document ).ready( function() {
	$("#registerForm" ).hide();
	$("#newTaskForm" ).hide();
	$( "#datepicker" ).datepicker({
			 dateFormat: "mm/dd/yy",
			 minDate: new Date()
	 });
	$("#switchForm").click(function(event){
			if ($("#loginForm").is(":visible"))
					$(this).html("Or log in");
			else
					$(this).html("Or register");
		 	$("#loginForm").toggle(1000);
		 	$("#registerForm").toggle(1000);
	 });

	 $('.addtask').click(function(){
			$("#newTaskForm").toggle(1000);
	 });

});
</script>
@endsection
