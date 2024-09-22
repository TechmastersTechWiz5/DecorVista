@extends('InteriorDesignerDashboard.layouts.authlayout')

@section('main-section')

@section('title', 'Register')

<div class="col-lg-6 col-md-7 col-sm-12 mx-auto align-self-center">
					<div class="login-form">
						<div class="text-center">
							<h3 class="title">Sign up your account</h3>
							<p>Sign in to your account to start using DecorVista</p>
						</div>
						<form action="index.html">
							<div class="mb-4">
								<label class="mb-1 text-dark">Username</label>
								<input type="text" class="form-control form-control" value="username">
							</div>
							<div class="mb-4">
								<label class="mb-1 text-dark">Email</label>
								<input type="email" class="form-control form-control" value="hello@example.com">
							</div>
							<div class="mb-4 position-relative">
								<label class="mb-1 text-dark">Password</label>
								<input type="password"id="dlab-password" class="form-control form-control" value="Password">
								<span class="show-pass eye">
								
									<i class="fa fa-eye-slash"></i>
									<i class="fa fa-eye"></i>
								
								</span>
							</div>
							<div class="text-center mb-4">
								<button type="submit" class="btn btn-primary btn-block">Sign Up</button>
							</div>
							
							<p class="text-center">Already registered?  
								<a class="btn-link text-primary" href="/login">Login</a>
							</p>
						</form>
					</div>
				</div>
@endsection