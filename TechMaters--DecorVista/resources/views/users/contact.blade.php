@extends('users.layout')

@section('title')
Contact
@endsection
@section('main')

			<!--Banner Section ======================-->
			<section class="section-banner position-relative pt-60">
				<div class="section-full-width">
					<div class="section-title-wrapper position-relative">	
						<div class="scroll-move">
							<span class="scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-primary lh-1">Contact</span>
						</div>				
						
						<div class="container">	
							<div class="section-title section-separator">
								<h2 class="fw-extra-bold heading-title separator lh-1">Let's Design Together</h2>
								<div>
									<p class="fs-4 fw-semibold mb-0 subtitle subtitle-width">Reach out to bring your dream spaces to life.</p>
								</div>
							</div>
						</div>
					</div>
					<!-- section-title-wrapper -->	
				</div>		
				<!-- section-full-width -->	
			</section>
			<!--Banner Section ======================-->
			


			<!--Section section-contact-map ======================-->
			<section class="section-contact-map position-relative">
				<div class="container">
					<div class="row justify-content-between gy-5">
						<div class="col-lg-3">
							<div class="contact-wrapper mt-md-n70">
								<div class="contact-wrapper d-flex flex-column gap-40 gap-lg-60 mt-md-n70">

								<div class="row g-40 g-lg-60">
									<div class="col-sm-12 col-md-6 col-lg-12">
										<div class="contact-details">
											<h2 class="stroke-heading">
												<svg stroke-width="1" class="text-line-2 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%">01</text></svg>
											</h2>
											<h4 class="service-title">Address USA:</h4>
											<p class="mb-0 fw-semibold">Architronix Inc.</p>
											<p class="mb-20 contact-home">208 English Road, High Point, NC 27262, USA</p>
											<p class="mb-0">Phone: 336 885 6670</p>
											<p class="mb-0">Email: hello@architronix.com</p>
											<div class="mt-30">
												<a href="#" id="btnUSA" data-title="Architronix USA" class="link-hover-animation-1 d-inline-flex align-items-center gap-10 text-decoration-none separator btn-map-direction"> View on Map 
													<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
													</svg>	
												</a>
											</div>
										</div>
									</div>
									<div class="col-sm-12 col-md-6 col-lg-12">
										<div class="contact-details">
											<h2 class="stroke-heading">
												<svg stroke-width="1" class="text-line-2 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%">02</text></svg>
											</h2>
											<h4 class="service-title">Address Spain</h4>
											<p class="mb-0 fw-semibold">Architronix</p>
											<p class="mb-20 contact-home">Avda. Valencia, 3, 46891, Palomar (Valencia), SPAIN</p>
											<p class="mb-0">Phone: +34 96 239 84 86</p>
											<p class="mb-0">Email: hello@architronix.com</p>
											<div class="mt-30">
												<a href="#" id="btnSpain" data-title="Architronix Spain" class="link-hover-animation-1 d-inline-flex align-items-center gap-10 text-decoration-none separator btn-map-direction" > View on Map 
													<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
													</svg>	
												</a>
											</div>
										</div>
									</div>
									<div class="col-sm-12 col-md-6 col-lg-12">
										<div class="contact-details">
											<h2 class="stroke-heading">
												<svg stroke-width="1" class="text-line-2 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%">03</text></svg>
											</h2>
											<h4 class="service-title">Address London:</h4>
											<p class="mb-0 fw-semibold">Architronix LTD</p>
											<p class="mb-20 contact-home">Avda. Valencia, 3, 46891, London, England</p>
											<p class="mb-0">Phone: +34 96 239 84 86</p>
											<p class="mb-0">Email: hello@architronix.com</p>
											<div class="mt-30">
												<a href="#" id="btnLondon" data-title="Architronix London" class="link-hover-animation-1 d-inline-flex align-items-center gap-10 text-decoration-none separator btn-map-direction" > View on Map 
													<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
													</svg>	
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- col-3 -->
						<div class="col-lg-8">
							<div class="sticky-elements">
								<div id="map"></div>
							</div>							
						</div>
					</div>
				</div>
			</section>
			<!--Section section-contact-map ======================-->



			<!--Section ======================-->
			<section class="section-full-width">
				<div class="section-title-wrapper position-relative">	
					<div class="scroll-move">
						<span class="scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-primary lh-1">Inquiry</span>
					</div>
					
					<div class="container">	
						<div class="section-title section-separator">
							<h2 class="fw-extra-bold heading-title separator lh-1">Have a Project in your mind?</h2>
							<div>
								<p class="fs-4 fw-semibold mb-0 subtitle subtitle-width">Write us directly</p>
							</div>
						</div>
					</div>
				</div>
				<!-- section-title-wrapper -->	
			</section>
			<!--Section ======================-->


			<!--Section section-contact-form ======================-->
			<div class="section-contact-form position-relative">
				<div class="container">
					<div class="row justify-content-between gx-20 gy-30">
						<div class="col-lg-6">
							<img src="{{ asset('user_assets/assets/images/contact-image.jpg')}}" class="w-100" alt="img">
						</div>
						<!-- col-5 -->
						<div class="col-lg-6">
							<form id="contactUsCreatForm" class="contact-form row gy-3 gx-20">
								<div class="col-12">
									<input type="text" class="form-control" id="InputName" name="name" placeholder="Your Name*" required>
								</div>		
								<div class="col-md-6">
									<input type="text" class="form-control" id="InputNumber" name="phone_number" placeholder="Phone Number">
								</div>
								<div class="col-md-6">
									<input type="email" class="form-control" id="InputEmail" name="email" placeholder="Email*" required>
								</div>		
								<div class="col-12">
									<textarea class="form-control" id="InputMessage" name="message" rows="5" placeholder="Type your message"></textarea>
								</div>		
								<div class="col-12">
									<div class="text-lg-end">
										<button type="submit" class="btn btn-outline-primary  gap-10">Send message 							
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
			</div>
			<!--Section section-contact-form ======================-->	



			<!--Feedback Section ======================-->
			<section id="feedback" class="section-feedback feedback-1 text-secondary">
				<div class="container">
					<div class="feedback-wrapper position-relative">
						<div class="feedback-content d-flex flex-column gap-4 flex-lg-row align-items-lg-end justify-content-lg-around">
							<h2 class="fw-extra-bold feedback-title">Request a Call</h2>
							<div class="architronix-button">
								<a href="#" class="btn btn-secondary gap-10" data-bs-toggle="modal" data-bs-target="#feedbackModal"> 
									Call Request
									<svg class="arrow" width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
									</svg>
								</a>
							</div>							
						</div>
					</div>
				</div>
			</section>
			<!--Feedback Section ======================-->



			<!--Request Modal ======================-->
			<div id="feedbackModal" class="modal fade formDownload-modal" data-bs-backdrop="static" aria-hidden="true" tabindex="-1">
				<div class="modal-dialog modal-dialog-centered">
				  <div class="modal-content">
					<div class="modal-header">						
					  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">						
						<form id="callRequestForm" class="contact-form row g-30">
							<div class="col-md-6">
								<label for="InputName-2" class="form-label fw-semibold">Name</label>
								<input type="text" class="form-control" name="InputName" id="InputName-2" placeholder="Name *" required>
							</div>	
							<div class="col-md-6">
								<label for="InputSurname" class="form-label fw-semibold">Surname</label>
								<input type="text" class="form-control" id="InputSurname" name="InputSurname" placeholder="Surname *" required>
							</div>								
							<div class="col-md-6">
								<label for="InputCountry" class="form-label fw-semibold">Country</label>
								<input type="text" class="form-control" id="InputCountry" name="InputCountry" placeholder="Country">
							</div>	
							<div class="col-md-6">
								<label for="InputNumber-2" class="form-label fw-semibold">Phone Number</label>
								<input type="text" class="form-control" name="InputNumber" id="InputNumber-2" placeholder="Phone Number">
							</div>		
							<div class="col-md-6">
								<label for="InputEmail-2" class="form-label fw-semibold">Email</label>
								<input type="email" class="form-control" name="InputEmail" id="InputEmail-2" placeholder="Email *" required>
							</div>							
							<div class="col-md-6">
								<label for="InputTime" class="form-label fw-semibold">Preferred time</label>
								<input type="time" class="form-control" id="InputTime" name="InputTime">								
							</div>	
							<div class="col-12">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="agree" value="yes" id="formCheck" required>
									<label class="form-check-label fw-medium" for="formCheck">
										By using this form you agree with the storage and handling of your data policies of Architronix.
									</label>
								</div>
							</div>						
							<div class="col-12">
								<div class="architronix-button mt-3">
									<button type="submit" class="btn btn-primary btn-md">Send Call Request</button>
								</div>								
							</div>	
							<div class="response py-3"></div>												  
						</form>											
					</div>
				  </div>
				</div>
			</div>
			<!--Request Modal ======================-->
 
@endsection



@push('scripts')
<script>
$(document).ready(function() {

    $('#contactUsCreatForm').on('submit', function(e) {
        e.preventDefault();
        handleFormUploadForm(
            'POST',
            '#contactUsCreatForm',
            '#submit',
            "{{ route('users.contact.store') }}",
            "{{ route('users.contact.index') }}",
        );
    });
});
</script>
@endpush

