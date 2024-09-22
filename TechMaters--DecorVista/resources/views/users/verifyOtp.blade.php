@extends('users.layout')

@section('title')

VerifyOTP

@endsection
@section('main')





			<!--Section VerifyOTP ======================-->
			<section class="section-contact-form position-relative pt-60 pt-lg-100 pt-xxl-120">
				<div class="container">
					<div class="row justify-content-between gy-5">
						<div class="col-lg-5">
							<div class="section-title">
								<h2 class="fw-extra-bold display-3 lh-1">VerifyOTP</h2>	
								<h5 class="">OTP has been sent to your email</h5>							
							</div>							
						</div>
						<!-- col-5 -->
						<div class="col-lg-6">
							<form  id="verifyOtpForm" class="contact-form row gy-3 gx-20">
								<div class="col-12">
									<input type="text" class="form-control" id="OTP" name="otp" placeholder="OTP" required>
								</div>		
								<input type="hidden" name="role" value="1">
															
								<div class="col-12">
									<div class="text-lg-end">
										<button type="submit" class="btn btn-outline-primary  gap-10">Submit OTP 							
											<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
											</svg>							
										</button>
									</div>									
								</div>	
								<div class="response py-3"></div>											  
							</form>
						</div>
					</div>
				</div>
			</section>
			<!--Section VerifyOTP ======================-->	
			


@endsection
@push('scripts')
<script>
$(document).ready(function() {
    $('#verifyOtpForm').on('submit', function(e) {
        e.preventDefault();
        handleFormUploadForm(
            'POST',
            '#verifyOtpForm',
            '#submit',
            '{{ route('auth.verifyotp') }}',
            '{{ route('users.blogs.index') }}'
        );
    });
});
</script>
@endpush