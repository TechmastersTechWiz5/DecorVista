@extends('designer.layouts.authlayout')

@section('main-section')

@section('title', 'Verify OTP')

<div class="col-lg-6 col-md-12 col-sm-12 mx-auto align-self-center">
					<div class="login-form">
						<div class="text-center">
							<h3 class="title">Veify OTP</h3>
							<p>Verification Code has been sen to your Email</p>
						</div>
						<form id="designerVerifyOtp"  method="POST">
							@csrf
              <input type="hidden" class="form-control form-control" name="role" value="2" required>
							<div class="mb-4">
								<label class="mb-1 text-dark">OTP</label>
								<input type="number" class="form-control form-control" name="otp" required>
							</div>

              <div class="text-center mb-4">
								<button type="submit" class="btn btn-primary btn-block">Submit</button>
							</div>
							<p class="text-center">Not registered?  
								<a class="btn-link text-primary" href="{{route('designer.register')}}">Register</a>
							</p>
							
						</form>
					</div>
				</div>
@endsection


@push('scripts')
<script>
$(document).ready(function() {
    // Handle form submission
    $('#designerVerifyOtp').on('submit', function(e) {
        e.preventDefault();
        // Set the value of the hidden textarea to the Quill editor content
        handleFormUploadForm(
            'POST',
            '#designerVerifyOtp',
            '#submit',
            '{{ route('auth.verifyotp') }}',
            '{{ route('designer.dashboard.index') }}'
        );
    });
});
</script>
@endpush