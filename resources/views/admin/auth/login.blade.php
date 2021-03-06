@extends('admin.layouts.auth')

@section('pageTitle', 'Login')

@section('content')
	<p class="login-box-msg">Sign in to start your session</p>

	@if ($errors->any())
		<p class="text-danger text-center">
			{{ $errors->first() }}
		</p>
	@endif

	<form action="{{ route('admin.login') }}" method="POST">
		@csrf

		<div class="form-group has-feedback">
			<input type="email" class="form-control" name="email" placeholder="Email">
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>

			@error('email')
				<span class="invalid-feedback" role="alert">
					<strong>Email is invalid!</strong>
				</span>
			@enderror
		</div>

		<div class="form-group has-feedback">
			<input type="password" class="form-control" name="password" placeholder="Password">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		</div>

		<div class="row">
			<div class="col-md-12 mb-2">
				<button type="submit" class="btn btn-primary btn-block">Sign In</button>
			</div>
		</div>
	</form>
@endsection