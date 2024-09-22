@extends('designer.layouts.authlayout')

@section('main-section')

@section('title', 'Login')

<div class="col-lg-6 col-md-12 col-sm-12 mx-auto align-self-center">
					<div class="login-form">
						<div class="text-center">
							<h3 class="title">Sign In</h3>
							<p>Sign in to your account to start using DecorVista</p>
						</div>
						<form id="designerloginForm"  method="POST">
							@csrf
							<div class="mb-4">
								<label class="mb-1 text-dark">Email</label>
								<input type="email" class="form-control form-control" name="email" required>
							</div>
							<div class="mb-4 position-relative">
								<label class="mb-1 text-dark">Password</label>
								<input type="password" id="dlab-password" class="form-control form-control" name="password" required>
								<span class="show-pass eye">
								
									<i class="fa fa-eye-slash"></i>
									<i class="fa fa-eye"></i>
								
								</span>
							</div>
							<div class="text-center mb-4">
								<button type="submit" class="btn btn-primary btn-block">Sign In</button>
							</div>
							<p class="text-center">Not registered?  
								<a class="btn-link text-primary" href="/register">Register</a>
							</p>
						</form>
					</div>
				</div>
@endsection


@push('scripts')
<script>
$(document).ready(function() {
    // Handle form submission
    $('#designerloginForm').on('submit', function(e) {
        e.preventDefault();
        // Set the value of the hidden textarea to the Quill editor content
        handleFormUploadForm(
            'POST',
            '#designerloginForm',
            '#submit',
            '{{ route('auth.login') }}',
            '{{ route('designer.verify-otp') }}'
        );
    });
});
</script>
@endpush