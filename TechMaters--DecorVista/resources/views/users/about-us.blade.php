@extends('users.layout')

@section('title')

About

@endsection
@section('main')


			<!--Banner Section ======================-->
			<section class="section-banner position-relative about-1 pt-60">	
				<div class="section-full-width">
					<div class="section-title-wrapper position-relative">	
						<div class="scroll-move">
							<span class="scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-primary lh-1">About Us</span>
						</div>				
						 
						<div class="container">	
							<div class="section-title section-separator">
								<h2 class="fw-extra-bold heading-title separator lh-1">Our Artistic Journey</h2>
								<p class="fs-4 fw-semibold mb-0 subtitle subtitle-width">Unveiling the Passion, Vision, and Expertise Behind Our Designs</p>	
							</div>
						</div>	
					</div>
				</div>															
			</section>
			<!--Banner Section ======================-->
			


			<!--About Section ======================-->
			<section class="section-about about-2 section-full-width position-relative pt-4 pt-lg-0">
				<div class="about-bg bg-something text-secondary position-relative">
					<div class="container">
						<div class="row align-items-center justify-content-between">
							<div class="col-lg-6">
								<div class="about-image overflow-hidden">
									<img src="{{ asset('user_assets/assets/images/about-image-2.jpg')}}" class="img-fluid wow slideInLeft" alt="about-image">
								</div>
							</div>
							<div class="col-lg-5">
								<div class="about-contents d-flex flex-column">
									<h5 class="display-5">Designing Dreams: Our Story</h5>
									<p>At Architronix, design is our canvas, and spaces are our masterpieces. With a vision for elegance, functionality, and innovation, our creative team curates environments that reflect dreams. From chic urban apartments to countryside estates, we're committed to sustainable design practices that enrich lives and the planet.</p>
									<p> Join us on a journey where every room is a canvas for creativity, and design transcends the ordinary. Together, let's craft your vision, one design at a time.</p>
								</div>
							</div>
						</div>
					</div>						
				</div>	
			</section>
			<!--About Section ======================-->



			<!--Counter Section ======================-->
			<div class="event-counter position-relative">
				<div class="container">
					<div class="row row-cols-2 row-cols-md-3 gy-lg-0 gy-4 justify-content-between">
						<div class="col-md-6 col-lg-4 col-xl-3">
							<div class="separator d-flex align-items-center fw-extra-bold display-3">
								 <span class="odometer" data-count-to=22></span>							
							</div>	
							<p class="fs-5 fw-bold mb-0 mt-1 mt-lg-2 mt-xxl-3">Years of experience</p>								
						</div>
						<div class="col-md-6 col-lg-4 col-xl-3">
							<div class="separator d-flex align-items-center display-3 fw-extra-bold">
								 <span class="odometer" data-count-to=282></span><span class="odometer-icon">+</span>
							</div>
							<p class="fs-5 fw-bold mb-0 mt-1 mt-lg-2 mt-xxl-3">Projects Completed</p>								

						</div>
						<div class="col-md-6 col-lg-4 col-xl-3">
							<div class="separator d-flex align-items-center display-3 fw-extra-bold">
								<span class="odometer" data-count-to=30></span><span class="odometer-icon">k</span>
							</div>
							<p class="fs-5 fw-bold mb-0 mt-1 mt-lg-2 mt-xxl-3">Happy CUustomers</p>								

						</div>
						<div class="col-md-6 col-lg-4 col-xl-3">
							<div class="separator d-flex align-items-center display-3 fw-extra-bold">
								 <span class="odometer" data-count-to=93></span><span class="odometer-icon">%</span>
							</div>
							<p class="fs-5 fw-bold mb-0 mt-1 mt-lg-2 mt-xxl-3">Positive Feedbacks</p>
						</div>
					</div>
				</div>
			</div>			
			<!--Counter Section ======================-->



			<!--Expertise Section ======================-->
			<section class="section-expertise section-full-width position-relative">	
				<div class="section-title-wrapper position-relative">	
					<div class="scroll-move">
						<span class="scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-primary lh-1">Expertise</span>
					</div>				
					
					<div class="container">	
						<div class="section-title section-separator">
							<h2 class="fw-extra-bold heading-title separator lh-1">Mastering the Art of Design</h2>
							<p class="fs-4 fw-semibold mb-0 subtitle subtitle-width">Where Creativity Meets Proficiency</p>	
						</div>
					</div>	
				</div>
				<!-- section-title-wrapper -->

				<div class="expertise-wrapper bg-secondary overflow-x-hidden">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="expertise-image overflow-hidden">
								<img src="{{ asset('user_assets/assets/images/expertise.jpg')}}" class="img-fluid w-100 wow slideInLeft" alt="img">
							</div>
						</div>
						<!-- col-6 -->
						<div class="col-lg-6">
							<div class="container">
								<div class="expertise-inner py-40 py-lg-0">
									<h4 class="mb-4 mb-xxl-40">Expertise Progress</h4>
									<div class="d-flex flex-column gap-4 gap-xl-30">
										<div class="expertise-items fw-semibold">
											<p>Interior Design</p>
											<div class="progress progress-1">
												<div class="progress-bar progress-bar-1" style="width: 95%">										
												</div>
												<div class="expertise-pricing fw-semibold">
													<span>95%</span>
												</div>
											</div>
										</div>
										<div class="expertise-items fw-semibold">
											<p>Sustainability</p>
											<div class="progress progress-1">
												<div class="progress-bar progress-bar-2" style="width: 85%">										
												</div>
												<div class="expertise-pricing fw-semibold">
													<span>85%</span>
												</div>
											</div>
										</div>
										<div class="expertise-items fw-semibold">
											<p>Decor</p>
											<div class="progress progress-1">
												<div class="progress-bar progress-bar-3" style="width: 90%">										
												</div>
												<div class="expertise-pricing fw-semibold">
													<span>90%</span>
												</div>
											</div>
										</div>
										<div class="expertise-items fw-semibold">
											<p>Visualization</p>
											<div class="progress progress-1">
												<div class="progress-bar progress-bar-4" style="width: 93%">										
												</div>
												<div class="expertise-pricing fw-semibold">
													<span>93%</span>
												</div>
											</div>
										</div>
									</div>									
								</div>
							</div>
							
						</div>
						<!-- col-6 -->
					</div>
				</div>
				
			</section>
			<!--Expertise Section ======================-->


			<!--Team Section ======================-->
			<div class="section-full-width overflow-x-hidden">	
				<div class="section-title-wrapper position-relative">
					<div class="scroll-move">
						<span class="scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-primary lh-1">Team</span>
					</div>					
					
					<div class="container">	
						<div class="section-title section-separator">
							<h2 class="fw-extra-bold heading-title separator lh-1">Interior Designers of DecorVista</h2>
							<div class="d-flex flex-column flex-lg-row gap-4 align-items-lg-end justify-content-lg-between">
								<p class="fs-4 fw-semibold mb-0 subtitle subtitle-width">Where Imagination Meets Expertise and Dreams Take Shape</p>								
							</div>
						</div>
					</div>
				</div>

				<div class="team-inner">
					<div class="container">
						<div class="row gx-30 gy-100 gy-lg-130 section-padding-lg our-teams">
							<div class="col-md-6 col-lg-4">
								<div class="team-wrapper team-style-1 position-relative">
									<ul class="contact-lists list-unstyled mb-0 d-inline-flex">
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">fb</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">in</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">tw</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">li</a></li>
									</ul>
									<div class="team-author-image overflow-hidden">
										<img src="{{ asset('user_assets/assets/images/team-1.jpg')}}" class="w-100 h-100 object-fit-cover wow slideInLeft" alt="image">
									</div>
									<a href="" class="text-decoration-none stretched-link">
										<div class="team-details">											
											<div class="team-details-inner position-relative d-flex align-items-center justify-content-between">
												<div>
													<span class="team-line-horizontal"></span>												
													<span class="team-line-vertical"></span>
													<h5 class="author-name">Russell Otten</h5>
													<p class="mb-0">Interior Alchemist</p>
												</div>
												<div class="team-arrow-icon">
													<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
													</svg>
												</div>												
											</div>									
										</div>
									</a>									
								</div>
							</div>
							<!-- col-4 -->
							<div class="col-md-6 col-lg-4">
								<div class="team-wrapper team-style-2 position-relative">
									<ul class="contact-lists list-unstyled mb-0 d-inline-flex">
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">fb</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">in</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">tw</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">li</a></li>
									</ul>
									<div class="team-author-image overflow-hidden">
										<img src="{{ asset('user_assets/assets/images/team-2.jpg')}}" class="w-100 h-100 object-fit-cover wow slideInLeft" alt="image">
									</div>
									<a href="" class="text-decoration-none stretched-link">
										<div class="team-details">											
											<div class="team-details-inner position-relative d-flex align-items-center justify-content-between">
												<div>
													<span class="team-line-horizontal"></span>												
													<span class="team-line-vertical"></span>
													<h5 class="author-name">Dave Otten</h5>
													<p class="mb-0">Interior Desiner</p>
												</div>
												<div class="team-arrow-icon">
													<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
													</svg>
												</div>												
											</div>									
										</div>
									</a>									
								</div>	
							</div>
							<!-- col-4 -->
							<div class="col-md-6 col-lg-4">
								<div class="team-wrapper position-relative">
									<ul class="contact-lists list-unstyled mb-0 d-inline-flex">
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">fb</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">in</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">tw</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">li</a></li>
									</ul>
									<div class="team-author-image overflow-hidden">
										<img src="{{ asset('user_assets/assets/images/team-3.jpg')}}" class="w-100 h-100 object-fit-cover wow slideInLeft" alt="image">
									</div>
									<a href="" class="text-decoration-none stretched-link">
										<div class="team-details">											
											<div class="team-details-inner position-relative d-flex align-items-center justify-content-between">
												<div>
													<span class="team-line-horizontal"></span>												
													<span class="team-line-vertical"></span>
													<h5 class="author-name">Brett Lee</h5>
													<p class="mb-0">Interior Director</p>
												</div>
												<div class="team-arrow-icon">
													<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
													</svg>
												</div>												
											</div>									
										</div>
									</a>									
								</div>
							</div>
							<!-- col-4 -->		
							<div class="col-md-6 col-lg-4">
								<div class="team-wrapper team-style-1 position-relative">
									<ul class="contact-lists list-unstyled mb-0 d-inline-flex">
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">fb</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">in</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">tw</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">li</a></li>
									</ul>
									<div class="team-author-image overflow-hidden">
										<img src="{{ asset('user_assets/assets/images/team-4.jpg')}}" class="w-100 h-100 object-fit-cover wow slideInLeft" alt="image">
									</div>
									<a href="" class="text-decoration-none stretched-link">
										<div class="team-details">											
											<div class="team-details-inner position-relative d-flex align-items-center justify-content-between">
												<div>
													<span class="team-line-horizontal"></span>												
													<span class="team-line-vertical"></span>
													<h5 class="author-name">Russell Otten</h5>
													<p class="mb-0">Interior Alchemist</p>
												</div>
												<div class="team-arrow-icon">
													<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
													</svg>
												</div>												
											</div>									
										</div>
									</a>									
								</div>
							</div>
							<!-- col-4 -->		
							<div class="col-md-6 col-lg-4">
								<div class="team-wrapper team-style-2 position-relative">
									<ul class="contact-lists list-unstyled mb-0 d-inline-flex">
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">fb</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">in</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">tw</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">li</a></li>
									</ul>
									<div class="team-author-image overflow-hidden">
										<img src="{{ asset('user_assets/assets/images/team-5.jpg')}}" class="w-100 h-100 object-fit-cover wow slideInLeft" alt="image">
									</div>
									<a href="" class="text-decoration-none stretched-link">
										<div class="team-details">											
											<div class="team-details-inner position-relative d-flex align-items-center justify-content-between">
												<div>
													<span class="team-line-horizontal"></span>												
													<span class="team-line-vertical"></span>
													<h5 class="author-name">Robert Jhonson</h5>
													<p class="mb-0">Chief Designer</p>
												</div>
												<div class="team-arrow-icon">
													<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
													</svg>
												</div>												
											</div>									
										</div>										
									</a>									
								</div>
							</div>
							<!-- col-4 -->		
							<div class="col-md-6 col-lg-4">
								<div class="team-wrapper position-relative">
									<ul class="contact-lists list-unstyled mb-0 d-inline-flex">
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">fb</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">in</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">tw</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">li</a></li>
									</ul>
									<div class="team-author-image overflow-hidden">
										<img src="{{ asset('user_assets/assets/images/team-6.jpg')}}" class="w-100 h-100 object-fit-cover wow slideInLeft" alt="image">
									</div>
									<a href="" class="text-decoration-none stretched-link">
										<div class="team-details">											
											<div class="team-details-inner position-relative d-flex align-items-center justify-content-between">
												<div>
													<span class="team-line-horizontal"></span>												
													<span class="team-line-vertical"></span>
													<h5 class="author-name">Victoria Savano</h5>
													<p class="mb-0">Interior Desiner</p>
												</div>
												<div class="team-arrow-icon">
													<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
													</svg>
												</div>												
											</div>									
										</div>
									</a>									
								</div>
							</div>
							<!-- col-4 -->		
							<div class="col-md-6 col-lg-4">
								<div class="team-wrapper team-style-1 position-relative">
									<ul class="contact-lists list-unstyled mb-0 d-inline-flex">
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">fb</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">in</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">tw</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">li</a></li>
									</ul>
									<div class="team-author-image overflow-hidden">
										<img src="{{ asset('user_assets/assets/images/team-7.jpg')}}" class="w-100 h-100 object-fit-cover wow slideInLeft" alt="image">
									</div>
									<a href="" class="text-decoration-none stretched-link">
										<div class="team-details">											
											<div class="team-details-inner position-relative d-flex align-items-center justify-content-between">
												<div>
													<span class="team-line-horizontal"></span>												
													<span class="team-line-vertical"></span>
													<h5 class="author-name">Russell Otten</h5>
													<p class="mb-0">Interior Alchemist</p>
												</div>
												<div class="team-arrow-icon">
													<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
													</svg>
												</div>												
											</div>									
										</div>
									</a>									
								</div>
							</div>
							<!-- col-4 -->		
							<div class="col-md-6 col-lg-4">
								<div class="team-wrapper team-style-2 position-relative">
									<ul class="contact-lists list-unstyled mb-0 d-inline-flex">
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">fb</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">in</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">tw</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">li</a></li>
									</ul>
									<div class="team-author-image overflow-hidden">
										<img src="{{ asset('user_assets/assets/images/team-8.jpg')}}" class="w-100 h-100 object-fit-cover wow slideInLeft" alt="image">
									</div>
									<a href="" class="text-decoration-none stretched-link">
										<div class="team-details">											
											<div class="team-details-inner position-relative d-flex align-items-center justify-content-between">
												<div>
													<span class="team-line-horizontal"></span>												
													<span class="team-line-vertical"></span>
													<h5 class="author-name">Russell Otten</h5>
													<p class="mb-0">Interior Alchemist</p>
												</div>
												<div class="team-arrow-icon">
													<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
													</svg>
												</div>												
											</div>									
										</div>
									</a>									
								</div>
							</div>
							<!-- col-4 -->		
							<div class="col-md-6 col-lg-4">
								<div class="team-wrapper position-relative">
									<ul class="contact-lists list-unstyled mb-0 d-inline-flex">
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">fb</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">in</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">tw</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">li</a></li>
									</ul>
									<div class="team-author-image overflow-hidden">
										<img src="{{ asset('user_assets/assets/images/team-9.jpg')}}" class="w-100 h-100 object-fit-cover wow slideInLeft" alt="image">
									</div>
									<a href="" class="text-decoration-none stretched-link">
										<div class="team-details">											
											<div class="team-details-inner position-relative d-flex align-items-center justify-content-between">
												<div>
													<span class="team-line-horizontal"></span>												
													<span class="team-line-vertical"></span>
													<h5 class="author-name">Robert Jhonson</h5>
													<p class="mb-0">Chief Designer</p>
												</div>
												<div class="team-arrow-icon">
													<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
													</svg>
												</div>												
											</div>									
										</div>
									</a>									
								</div>	
							</div>
							<!-- col-4 -->
						</div>
						<!-- row -->
					</div>
				</div>				
				
			</div>
			<!--Team Section ======================-->

			

			
			
			
			@endsection

			
			@push('styles')
			<style>
			.bg-something {
				background-color: rgb(37 59 47) !important;
			}
			</style>
			@endpush