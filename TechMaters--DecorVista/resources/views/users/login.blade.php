@extends('users.layout')

@section('title')

Login

@endsection
@section('main')

		<!-- Customise-Theme -->
		<!-- <link rel="stylesheet" href="assets/css/theme.css"> -->
		
		<style>
.position-relative {
    position: relative;
}

.toggle-password {
    position: absolute;
    top: 50%;
    right: 15px; /* Adjust as necessary */
    transform: translateY(-50%);
    pointer-events: none; /* Prevents pointer events on the SVGs */
}

.toggle-password svg {
    pointer-events: auto; /* Allows clicks on the SVGs */
    fill: #000; /* Change color if needed */
    transition: fill 0.2s; /* Optional: add a transition for hover effects */
}

.toggle-password:hover svg {
    fill: #007bff; /* Change color on hover */
}



		</style>





			<!--Section Login ======================-->
			<section class="section-contact-form position-relative pt-60 pt-lg-100 pt-xxl-120">
				<div class="container">
					<div class="row justify-content-between gy-5">
						<div class="col-lg-5">
							<div class="section-title">
								<h2 class="fw-extra-bold display-3 lh-1">Login</h2>								
							</div>							
						</div>
						<!-- col-5 -->
						<div class="col-lg-6">
							<form method="POST" id="loginForm" class="contact-form row gy-3 gx-20">
								<div class="col-12">
									<input type="email" class="form-control" id="Email" name="email" placeholder="Email" required>
								</div>		
								<div class="col-12 position-relative">
									<input type="password" class="form-control" id="Password" name="password" placeholder="Password" required>
									<span class="toggle-password" id="togglePassword" style="cursor: pointer;">
										<svg id="closedEye" width="24" height="24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
											<path d="M12 4.5C6.5 4.5 2 10.5 2 10.5s4.5 6 10 6 10-6 10-6-4.5-6-10-6zm0 10.5c-2.5 0-4.5-2-4.5-4.5S9.5 6 12 6s4.5 2 4.5 4.5S14.5 15 12 15zM12 8c-1.5 0-2.5 1-2.5 2.5S10.5 13 12 13s2.5-1 2.5-2.5S13.5 8 12 8z"/>
										</svg>
										<svg id="openEye" width="24" height="24" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="display: none;">
											<path d="M12 4.5C6.5 4.5 2 10.5 2 10.5s4.5 6 10 6 10-6 10-6-4.5-6-10-6zm0 10.5c-1.5 0-2.5-1-2.5-2.5S10.5 8 12 8s2.5 1 2.5 2.5S13.5 15 12 15zM12 10c.8 0 1.5.7 1.5 1.5S12.8 13 12 13s-1.5-.7-1.5-1.5S11.2 10 12 10z"/>
										</svg>
									</span>
								</div>
															
								<div class="col-12">
									<div class="text-lg-end">
										<button type="submit" class="btn btn-outline-primary  gap-10">Login 							
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
			<!--Section Login ======================-->	
			



@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Handle form submission
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();
        // Set the value of the hidden textarea to the Quill editor content
        handleFormUploadForm(
            'POST',
            '#loginForm',
            '#submit',
            '{{ route('auth.login') }}',
            '{{ route('users.verifyOtp') }}'
        );
    });
});
</script>
@endpush