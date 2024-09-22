@extends('users.layout')

@section('title')

Home
@endsection
@section('main')

			<!--Hero Section ======================-->
			<section class="section-hero hero-1 max-width">
				<div id="heroSlider" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-interval="6000">  <!--    -->
					
					<div class="carousel-indicators">
						<div class="d-flex align-items-center gap-3 gap-lg-1 lh-1 active" data-bs-target="#heroSlider" data-bs-slide-to="0" aria-current="true">
							<span class="indecators-item display-4 fw-extra-bold mb-0">01</span>
							<span class="indecators-description fw-bold mb-0">Elegant Design Showcase</span>
						</div>
						<div class="d-flex align-items-center gap-3 gap-lg-1 lh-1" data-bs-target="#heroSlider" data-bs-slide-to="1">
							<span class="indecators-item display-4 fw-extra-bold mb-0">02</span>
							<span class="indecators-description fw-bold mb-0">Sustainable Design Focus</span>
						</div>
						<div class="d-flex align-items-center gap-3 gap-lg-1 lh-1" data-bs-target="#heroSlider" data-bs-slide-to="2">
							<span class="indecators-item display-4 fw-extra-bold mb-0">03</span>
							<span class="indecators-description fw-bold mb-0">Meet Our <br> Design Team</span>
						</div>					
					</div>
					<!-- carousel-indicators -->
					<div class="carousel-inner">
						<div class="carousel-item active">					
							<picture>		
								<source media="(max-width:500px)" srcset="{{ asset('user_assets/assets/images/hero-4-sm.jpg')}}">
								<source media="(max-width:768px)" srcset="{{ asset('user_assets/assets/images/hero-4.jpg')}}" >				
								<img src="{{ asset('user_assets/assets/images/hero-2.jpg')}}" alt="hero-image">			

							</picture>
							<div>
								<div class="carousel-captions">
									<div class="container">		
										<div class="content-text text-start">
											<h1 class="stroke-heading display-2 fw-extra-bold d-flex flex-column">
												<span class="hero-heading animate-fill primary">Elegance</span>																								
												<svg stroke-width="2" class="text-line display-2 fw-extra-bold z-1"><text x="0%" dominant-baseline="middle" y="70%">Redefined</text></svg>
											</h1>
											<div class="architronix-button">
												<a href="project-archive.html" class="btn btn-outline-primary gap-10">Explore our Portfolio 
													<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
													<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/></svg>																														
												</a>
											</div>
										</div>										
									</div>
								</div> 
							</div>						
														
						</div>
					<div class="carousel-item">
						<picture>
							<source media="(max-width:500px)" srcset="{{ asset('user_assets/assets/images/hero-1-sm.jpg')}}">
							<source media="(max-width:768px)" srcset="{{ asset('user_assets/assets/images/hero-1-md.jpg')}}" >				
							<img src="{{ asset('user_assets/assets/images/hero-1.jpg')}}" alt="hero-image">						
						
						</picture> 
						<div class="carousel-captions">
							<div class="container">		
								<div class="content-text text-start">
									<h1 class="stroke-heading display-2 fw-extra-bold d-flex flex-column">
										<span class="hero-heading animate-fill primary">Greener</span>										
										<svg stroke-width="2" class="text-line display-2 fw-extra-bold z-1"><text x="0%" dominant-baseline="middle" y="70%">Tomorrow</text></svg>
									</h1>
									<div class="architronix-button">
										<a href="project-archive.html" class="btn btn-outline-primary  gap-10">Explore our Portfolio 							
											<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
											</svg>							
										</a>
									</div>
								</div>										
							</div>
						</div> 						
					</div>
					<div class="carousel-item">
						<picture>						
							<source media="(max-width:500px)" srcset="{{ asset('user_assets/assets/images/hero-3-sm.jpg')}}">
							<source media="(max-width:768px)" srcset="{{ asset('user_assets/assets/images/hero-3-md.jpg')}}" >				
							<img src="{{ asset('user_assets/assets/images/hero-3.jpg')}}" alt="hero-image">
						</picture> 
						<div class="carousel-captions">
							<div class="container">		
								<div class="content-text text-start">
									<h1 class="stroke-heading display-2 fw-extra-bold d-flex flex-column">
										<span class="hero-heading animate-fill primary">Space</span>										
										<svg stroke-width="2" class="text-line display-2 fw-extra-bold z-1"><text x="0%" dominant-baseline="middle" y="70%">Evolution</text></svg>
									</h1>
									<div class="architronix-button">
										<a href="project-archive.html" class="btn btn-outline-primary  gap-10">Explore our Portfolio 							
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
					<div class="carousel-control-buttons d-flex flex-column gap-0 position-absolute bottom-0 end-0">
						<a class="next-btn" href="#" data-bs-target="#heroSlider" data-bs-slide="next">						
							<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
							</svg>							
						</a>						
						<a class="prev-btn" href="#" data-bs-target="#heroSlider" data-bs-slide="prev"> 														
							<svg class="arrow-reverse" width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
							</svg>		
						</a>							
					</div>
				</div>
			</section>
			<!--Hero Section ======================-->


			<!--About Section ======================-->
			<section class="section-about about-1 section-full-width">	
				<div class="section-title-wrapper position-relative">				
						
					<div class="scroll-move">
						<span class="scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-primary lh-1">About Us</span>
					</div>
					
					<div class="container">	
						<div class="section-title section-separator">
							<h2 class="fw-extra-bold heading-title separator lh-1">Foundations of Architronix</h2>
							<p class="fs-4 fw-semibold mb-0 subtitle subtitle-width">Crafting Architectural Designing and Masterpieces Interior Wonders</p>	
						</div>
					</div>	
				</div>		
				<div class="about-bg bg-something text-secondary position-relative">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-6">
								<div class="about-image overflow-hidden">
									<img src="{{ asset('user_assets/assets/images/about-image.jpg')}}" class="img-fluid wow slideInLeft" alt="about-image">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="about-contents d-flex flex-column">
									<div class="about-content-inner d-flex flex-column flex-lg-row">
										<div class="list-item-number">
											<h3 class="stroke-heading stroke-heading-2 mb-0">
												<svg stroke-width="1" class="text-line-2 fs-60 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%">01</text></svg>
											</h3>
										</div>									
										
										<div>
											<h4>Innovation Beyond Boundaries</h4>
											<p class="mb-0">We thrive on challenging the norms, infusing each project with fresh, innovative perspectives that defy convention.</p>
										</div>
									</div>
									<div class="about-content-inner d-flex flex-column flex-lg-row">
										<div class="list-item-number">
											<h3 class="stroke-heading stroke-heading-2 mb-0">
												<svg stroke-width="1" class="text-line-2 fs-60 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%">02</text></svg>
											</h3>
										</div>
										<div>
											<h4>Visionaries at Work</h4>
											<p class="mb-0">We're not just designers; we're dream weavers. Your visions become our blueprints for extraordinary spaces.</p>
										</div>
									</div>
									<div class="about-content-inner d-flex flex-column flex-lg-row">
										<div class="list-item-number">
											<h3 class="stroke-heading stroke-heading-2 mb-0">
												<svg stroke-width="1" class="text-line-2 fs-60 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%">03</text></svg>
											</h3>
										</div>
										<div>
											<h4>Awards and Acclaim</h4>
											<p class="mb-0">Join us on a journey marked by accolades and distinctions as we carve our path in the world of design.</p>
										</div>
									</div>
									<div>
										<a href="about-us.html" class="btn btn-link link-hover-animation-1 d-inline-flex gap-10 align-items-center">Learn more About Us <span>
											<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
											</svg></span>
										</a>
									</div>
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
								<span class="odometer" data-count-to=420></span><span class="odometer-icon">k</span>
							</div>
							<p class="fs-5 fw-bold mb-0 mt-1 mt-lg-2 mt-xxl-3">Square feet Covered</p>								

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


			<!--Gallery Section ======================-->
			<section class="section-gallery max-width">
				<div class="section-full-width">	
					<div class="section-title-wrapper position-relative">
						<div class="scroll-move">
							<span class="scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-primary lh-1">Gallery</span>
						</div>				
						<div class="container">	
							<div class="section-title section-separator">
								<h2 class="fw-extra-bold heading-title separator lh-1">Exploring Our Creations</h2>
								<div class="d-flex flex-column flex-lg-row gap-4 align-items-lg-end justify-content-lg-between">
									<p class="fs-4 fw-semibold mb-0 subtitle subtitle-width">Where Imagination Takes Flight, and Excellence Blossoms</p>	
									<div class="architronix-button">
										<a href="project-archive.html" class="btn btn-outline-primary  gap-10">View All Projects 							
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

				<div class="horizontal-accordion d-flex">

					<div class="gallery-contents gallery-sm">
						
						<div class="gallery-wrapper position-relative overflow-hidden w-100 h-100">
							<div class="gallery-image-wrapper overlay">
								<img src="{{ asset('user_assets/assets/images/gallery-1.jpg')}}" class="position-absolute start-0 top-0 w-100 h-100 object-fit-cover" alt="gallery-image">
								<div class="gallery-info-wrapper">
									<div class="gallery-info">
										<a href="project-single.html" class="text-decoration-none link-hover-animation-1 gallery-title separator"><h4 class="mb-0">Cozy Living Room</h4></a>
										<p class="gallery-description">Exploring Excellence in Every Meticulous Design Detail Exploring Excellence in Every Meticulous Design Detail</p>
									</div>
								</div>								
							</div>							
							<h3 class="gallery-item stroke-heading stroke-heading-2 mb-0">
								<svg stroke-width="1" class="text-line-2 fs-60 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%">01</text></svg>
							</h3>													
						</div>
												
					</div>
				  
					<div class="gallery-contents gallery-expand">
						
						<div class="gallery-wrapper position-relative overflow-hidden w-100 h-100">
							<div class="gallery-image-wrapper overlay">
								<img src="{{ asset('user_assets/assets/images/gallery-2.jpg')}}" class="position-absolute start-0 top-0 w-100 h-100 object-fit-cover" alt="gallery-image">
								<div class="gallery-info-wrapper">
									<div class="gallery-info">
										<a href="project-single.html" class="text-decoration-none link-hover-animation-1 gallery-title separator"><h4 class="mb-0">Luxurious Living Room</h4></a>
										<p class="gallery-description">Exploring Excellence in Every Meticulous Design Detail Exploring Excellence in Every Meticulous Design Detail</p>
									</div>
								</div>								
							</div>							
							<h3 class="gallery-item stroke-heading stroke-heading-2 mb-0">
								<svg stroke-width="1" class="text-line-2 fs-60 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%">02</text></svg>
							</h3>													
						</div>
												
					</div>
				  
					<div class="gallery-contents gallery-sm">
						
						<div class="gallery-wrapper position-relative overflow-hidden w-100 h-100">
							<div class="gallery-image-wrapper overlay">
								<img src="{{ asset('user_assets/assets/images/gallery-3.jpg')}}" class="position-absolute start-0 top-0 w-100 h-100 object-fit-cover" alt="gallery-image">
								<div class="gallery-info-wrapper">
									<div class="gallery-info">
										<a href="project-single.html" class="text-decoration-none link-hover-animation-1 gallery-title separator"><h4 class="mb-0">Elegant Bedroom</h4></a>
										<p class="gallery-description">Exploring Excellence in Every Meticulous Design Detail Exploring Excellence in Every Meticulous Design Detail</p>
									</div>
								</div>								
							</div>							
							<h3 class="gallery-item stroke-heading stroke-heading-2 mb-0">
								<svg stroke-width="1" class="text-line-2 fs-60 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%">03</text></svg>
							</h3>													
						</div>
						
					</div>
				  
					<div class="gallery-contents gallery-sm d-none d-lg-block">
						
						<div class="gallery-wrapper position-relative overflow-hidden w-100 h-100">
							<div class="gallery-image-wrapper overlay">
								<img src="{{ asset('user_assets/assets/images/gallery-4.jpg')}}" class="position-absolute start-0 top-0 w-100 h-100 object-fit-cover" alt="gallery-image">
								<div class="gallery-info-wrapper">
									<div class="gallery-info">
										<a href="project-single.html" class="text-decoration-none link-hover-animation-1 gallery-title separator"><h4 class="mb-0">Rustic Comfort</h4></a>
										<p class="gallery-description">Exploring Excellence in Every Meticulous Design Detail Exploring Excellence in Every Meticulous Design Detail</p>
									</div>
								</div>								
							</div>							
							<h3 class="gallery-item stroke-heading stroke-heading-2 mb-0">
								<svg stroke-width="1" class="text-line-2 fs-60 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%">04</text></svg>
							</h3>													
						</div>
												
					</div>
				  
					<div class="gallery-contents gallery-sm d-none d-lg-block">
						
						<div class="gallery-wrapper position-relative overflow-hidden w-100 h-100">
							<div class="gallery-image-wrapper overlay">
								<img src="{{ asset('user_assets/assets/images/gallery-5.jpg')}}" class="position-absolute start-0 top-0 w-100 h-100 object-fit-cover" alt="gallery-image">
								<div class="gallery-info-wrapper">
									<div class="gallery-info">
										<a href="project-single.html" class="text-decoration-none link-hover-animation-1 gallery-title separator"><h4 class="mb-0">Urban Living Space</h4></a>
										<p class="gallery-description">Exploring Excellence in Every Meticulous Design Detail Exploring Excellence in Every Meticulous Design Detail</p>
									</div>
								</div>								
							</div>							
							<h3 class="gallery-item stroke-heading stroke-heading-2 mb-0">
								<svg stroke-width="1" class="text-line-2 fs-60 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%">05</text></svg>
							</h3>													
						</div>
												
					</div>						
				</div>				  
			</section>
			<!--Gallery Section ======================-->
			

			<!--Service Section ======================-->
			<section class="section-service">
				<div class="section-full-width">	
					<div class="section-title-wrapper position-relative">
						<div class="scroll-move">
							<span class="scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-primary lh-1">Services</span>
						</div>
						<div class="container">	
							<div class="section-title section-separator">
								<h2 class="fw-extra-bold heading-title separator lh-1">Explore Our Design Offerings</h2>
								<div class="d-flex flex-column flex-lg-row gap-4 align-items-lg-end justify-content-lg-between">
									<p class="fs-4 fw-semibold mb-0 subtitle subtitle-width">Exploring Excellence in Every Meticulous Design Detail</p>	
									<div class="architronix-button">
										<a href="services.html" class="btn btn-outline-primary  gap-10">View All Services 							
											<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
											</svg>							
										</a>
									</div>								
								</div>
							</div>
						</div>
					</div>		
					<div class="swiper-custom-progress position-relative mt-n30">
						<div class="swiper service-swiper">
							<div class="swiper-wrapper"> 
								<div class="swiper-slide">
									<div class="service-details">
										<h2 class="stroke-heading">
											<svg stroke-width="1" class="text-line-2 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%">01</text></svg>
										</h2>										
										<a href="service-single.html" class="text-decoration-none"><h4 class="service-title link-hover-animation-1 d-inline-block">Residential Design</h4></a>
										<p class="mb-0">Our residential design services cover everything from concept to completion</p>
									</div>									
								</div>
								<!-- swiper-slide-->									
								<div class="swiper-slide">
									<div class="service-details">
										<h2 class="stroke-heading">
											<svg stroke-width="1" class="text-line-2 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%">02</text></svg>
										</h2>
										<a href="service-single.html" class="text-decoration-none"><h4 class="service-title link-hover-animation-1 d-inline-block">Commercial Design</h4></a>
										<p class="mb-0">Our expertise in commercial design focuses on optimizing functionality and aesthetics</p>
									</div>									
								</div>
								<!-- swiper-slide-->
								<div class="swiper-slide">
									<div class="service-details">
										<h2 class="stroke-heading">
											<svg stroke-width="1" class="text-line-2 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%">03</text></svg>
										</h2>
										<a href="service-single.html" class="text-decoration-none"><h4 class="service-title link-hover-animation-1 d-inline-block">Space Planning</h4></a>
										<p class="mb-0">We maximize the potential of your space, ensuring it's organized, and aesthetically pleasing.</p>
									</div>									
								</div>
								<!-- swiper-slide-->
								<div class="swiper-slide">
									<div class="service-details">
										<h2 class="stroke-heading">
											<svg stroke-width="1" class="text-line-2 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%">04</text></svg>
										</h2>
										<a href="service-single.html" class="text-decoration-none"><h4 class="service-title link-hover-animation-1 d-inline-block">Color Consultation</h4></a>
										<p class="mb-0">Colors play a significant role in design. We help you choose the perfect palette for your space.</p>
									</div>									
								</div>
								<!-- swiper-slide-->	
								<div class="swiper-slide">
									<div class="service-details">
										<h2 class="stroke-heading">
											<svg stroke-width="1" class="text-line-2 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%">05</text></svg>
										</h2>
										<a href="service-single.html" class="text-decoration-none"><h4 class="service-title link-hover-animation-1 d-inline-block">Project Management</h4></a>
										<p class="mb-0">From initial concepts to final installation, we oversee every detail for a successful project.</p>
									</div>									
								</div>
								<!-- swiper-slide-->									
								<div class="swiper-slide">
									<div class="service-details">
										<h2 class="stroke-heading">
											<svg stroke-width="1" class="text-line-2 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%">06</text></svg>
										</h2>
										<a href="service-single.html" class="text-decoration-none"><h4 class="service-title link-hover-animation-1 d-inline-block">Custom Furnishings</h4></a>
										<p class="mb-0">Elevate your space with unique, furnishings that are designed to suit your style and needs.</p>
									</div>									
								</div>
								<!-- swiper-slide-->
								<div class="swiper-slide">
									<div class="service-details">
										<h2 class="stroke-heading">
											<svg stroke-width="1" class="text-line-2 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%">07</text></svg>
										</h2>
										<a href="service-single.html" class="text-decoration-none"><h4 class="service-title link-hover-animation-1 d-inline-block">Concept Development</h4></a>
										<p class="mb-0">We work closely with you to develop a design concept that resonates with your vision.</p>
									</div>									
								</div>
								<!-- swiper-slide-->
								<div class="swiper-slide">
									<div class="service-details">
										<h2 class="stroke-heading">
											<svg stroke-width="1" class="text-line-2 fw-extra-bold"><text x="0%" dominant-baseline="middle" y="70%">08</text></svg>
										</h2>
										<a href="service-single.html" class="text-decoration-none"><h4 class="service-title link-hover-animation-1 d-inline-block">Revamps & Remodels</h4></a>
										<p class="mb-0">We provide renovation and remodeling services that breathe new life into existing structures.</p>
									</div>									
								</div>
								<!-- swiper-slide-->							
							</div>
							<!-- swiper-wrapper -->
						</div>
						<!-- swiper -->		
						<div class="container">
							<div class="service-swiper-pagination-wrapper">
								<div class="service-swiper-pagination"></div>						
								<div class="swiper-button-progress">	
									<div class="service-progress-button-prev">
										<svg class="arrow-reverse" width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
										</svg>
									</div>							
									<div class="service-progress-button-next">
										<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
										</svg> 
									</div>
																	
								</div>
							</div>							
						</div>										
					</div>	
				</div>
				<!-- section-full-width -->
				
			</section>
			<!--Service Section ======================-->

			
			<!--Team Section ======================-->
			<section class="section-team team-1">
				<div class="section-full-width">	
					<div class="section-title-wrapper position-relative">
						<div class="scroll-move">
							<span class="scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-primary lh-1">Team</span>
						</div>

						<div class="container">	
							<div class="section-title section-separator">
								<h2 class="fw-extra-bold heading-title separator lh-1">Architects of Architronix</h2>
								<div class="d-flex flex-column flex-lg-row gap-4 align-items-lg-end justify-content-lg-between">
									<p class="fs-4 fw-semibold mb-0 subtitle subtitle-width">Where Imagination Meets Expertise and Dreams Take Shape</p>	
									<div class="architronix-button">
										<a href="team.html" class="btn btn-outline-primary  gap-10">All Architects 							
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
									<a href="team-single.html" class="text-decoration-none stretched-link">
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
									<a href="team-single.html" class="text-decoration-none stretched-link">
										<div class="team-details">											
											<div class="team-details-inner position-relative d-flex align-items-center justify-content-between">
												<div>
													<span class="team-line-horizontal"></span>												
													<span class="team-line-vertical"></span>
													<h5 class="author-name">Robert Jhonson</h5>
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
										<img src="{{ asset('user_assets/assets/images/team-3.jpg')}}" class="w-100 h-100 object-fit-cover wow slideInLeft" alt="image">
									</div>
									<a href="team-single.html" class="text-decoration-none stretched-link">
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
						</div>
					</div>
				</div>
			</section>
			<!--Team Section ======================-->


			<!--Video Section ======================-->
			<section class="section-video section-full-width pb-0 pb-lg-130">
				<div class="section-title-wrapper position-relative">	
					<div class="scroll-move">
						<span class="scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-primary lh-1">Video</span>
					</div>				
					
					<div class="container">	
						<div class="section-title section-separator">
							<h2 class="fw-extra-bold heading-title separator lh-1">Visual Design Odyssey</h2>
							<div class="d-flex flex-column flex-lg-row gap-4 align-items-lg-end justify-content-lg-between">
								<p class="fs-4 fw-semibold mb-0 subtitle subtitle-width">Praise, Appreciation, and Design Excellence</p>
							</div>
						</div>
					</div>
				</div>
				<div class="video-contents text-secondary">
					<div class="video-contents-inner">
						<div class="container">
							<div class="row gy-5 gy-lg-0">								
								<div class="col-lg-6 col-xxl-5">
									
									<h4 class="mb-4">Step into the dynamic world of Visual Design Odyssey</h4>
									<p>Watch our designs come to life through captivating videos that showcase our creativity, innovation, and the transformation of spaces from concept to reality.</p>
									<ul class="video-contents-list list-unstyled d-flex flex-column gap-3 mb-0">
										<li class="d-flex align-items-center">
											<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
											</svg>Initial Vision
										</li>	
										<li class="d-flex align-items-center">
											<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
											</svg>Collaborative Design
										</li>
										<li class="d-flex align-items-center">
											<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
											</svg>Flawless Execution
										</li>									
									</ul>
										
									<div class="architronix-button">
										<a href="services.html" class="btn btn-outline-secondary  d-inline-flex gap-10 align-items-center">Process of Our Work<span>
											<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
											</svg></span>
										</a>
									</div>
									
								</div>
								<div class="col-lg-6 col-xxl-6">
									<div class="video-image-wrapper position-relative overflow-hidden">
										<div class="wow slideInLeft">
											<div class="video-image">
												<img src="{{ asset('user_assets/assets/images/video-image.jpg')}}" class="img-fluid" alt="img">
											</div>
											<a href="https://www.youtube.com/watch?v=lfDZJqSrIuk" class="video-popup video-popup-link">
												<span class="video-icon">												
													<svg width="30" height="36" viewBox="0 0 30 36" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M0.500004 1.54552L29 18L0.500002 34.4545L0.500004 1.54552Z" stroke="#253B2F"/>
													</svg>
												</span>	
											</a>
										</div>										
									</div>
								</div>
							</div>
						</div>	
					</div>
										
				</div>
				
			</section>
			<!--Video Section ======================-->			


			<!--Project Section ======================-->
			<section class="section-project project-1">
				<div class="section-full-width max-width">
					<div class="section-title-wrapper position-relative">		
						<div class="scroll-move">
							<span class="scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-primary lh-1">Project</span>
						</div>			
						
						<div class="container">	
							<div class="section-title section-separator">
								<h2 class="fw-extra-bold heading-title separator lh-1">Creative Showcase</h2>
								<div class="d-flex flex-column flex-lg-row gap-4 align-items-lg-end justify-content-lg-between">
									<p class="fs-4 fw-semibold mb-0 subtitle subtitle-width">Where Imagination Meets Reality in Every Frame</p>	
									<div class="architronix-button">
										<a href="project-archive.html" class="btn btn-outline-primary  gap-10">All Projects 							
											<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
											</svg>							
										</a>
									</div>								
								</div>
							</div>
						</div>						
					</div>

					<div id="projectSlider" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000"> <!--  -->
						<div class="carousel-inner text-secondary">							
						  <div class="carousel-item active">
							<div class="project-contents position-relative">
								<div class="project-image overlay">
									<picture>		
										<source media="(max-width:470px)" srcset="{{ asset('user_assets/assets/images/project-1-sm.jpg')}}">				
										<img src="{{ asset('user_assets/assets/images/project-1.jpg')}}" class="w-100 h-100 object-fit-cover" alt="img">
									</picture>											
								</div>
								<ul class="project-details list-unstyled mb-0 d-flex align-items-center">
									<li class="d-flex flex-column gap-2 gap-xxl-10">
										<span class="fs-5 fw-bold">Clients:</span>
										<span>Sogeprom</span>
									</li>
									<li class="d-flex flex-column gap-2 gap-xxl-10">
										<span class="fs-5 fw-bold">Area:</span>
										<span>14,891 m²</span>
									</li>
									<li class="d-none d-sm-block">
										<span class="d-flex flex-column gap-2 gap-xxl-10 ">
											<span class="fs-5 fw-bold">Project year:</span>
											<span>2022</span>
										</span>												
									</li>
									<li class="d-flex flex-column gap-2 gap-xxl-10">
										<span class="fs-5 fw-bold">Project type:</span>
										<span>Interior design</span>
									</li>
									<li class="architronix-button d-none d-xl-block">
										<a href="project-archive.html" class="btn btn-outline-secondary  gap-10">View Project</a>
									</li>
								</ul>
								<div class="project-info bg-something">
									<h5 class="project-title fw-extra-bold">Le Foresterie</h5>
									<p class="mb-0">At the heart of the e+ project, made of natural anodised aluminium, glazing, sandstone and granite, the lobby ... <a class="text-decoration-none fw-extra-bold" href="project-archive.html">see more</a></p>

									<div class="architronix-button d-block d-xl-none mt-4">
										<a href="project-archive.html" class="btn btn-outline-secondary  gap-10">View Project</a>
									</div>
								</div>
							</div>
						  </div>
						  <div class="carousel-item">
							<div class="project-contents position-relative">
								<div class="project-image overlay">
									<picture>		
										<source media="(max-width:470px)" srcset="{{ asset('user_assets/assets/images/project-2-sm.jpg')}}">				
										<img src="{{ asset('user_assets/assets/images/project-2.jpg')}}" class="w-100 h-100 object-fit-cover" alt="img">
									</picture>											
								</div>
								<ul class="project-details list-unstyled mb-0 d-flex align-items-center">
									<li class="d-flex flex-column gap-2 gap-xxl-10">
										<span class="fs-5 fw-bold">Clients:</span>
										<span>Layero</span>
									</li>
									<li class="d-flex flex-column gap-2 gap-xxl-10">
										<span class="fs-5 fw-bold">Area:</span>
										<span>10,891 m²</span>
									</li>
									<li class="d-none d-sm-block">
										<span class="d-flex flex-column gap-2 gap-xxl-10 ">
											<span class="fs-5 fw-bold">Project year:</span>
											<span>2021</span>
										</span>												
									</li>
									<li class="d-flex flex-column gap-2 gap-xxl-10">
										<span class="fs-5 fw-bold">Project type:</span>
										<span>Furnishings</span>
									</li>
									<li class="architronix-button d-none d-xl-block">
										<a href="project-archive.html" class="btn btn-outline-secondary  gap-10">View Project</a>
									</li>
								</ul>
								<div class="project-info bg-something">
									<h5 class="project-title fw-extra-bold">Oasis Urbaine</h5>
									<p class="mb-0">At the heart of the e+ project, made of natural anodised aluminium, glazing, sandstone and granite, the lobby ... <a class="text-decoration-none fw-extra-bold" href="project-archive.html">see more</a></p>

									<div class="architronix-button d-block d-xl-none mt-4">
										<a href="project-archive.html" class="btn btn-outline-secondary  gap-10">View Project</a>
									</div>
								</div>
							</div>
						  </div>
						  <div class="carousel-item">
							<div class="project-contents position-relative">
								<div class="project-image overlay">
									<picture>		
										<source media="(max-width:470px)" srcset="{{ asset('user_assets/assets/images/project-3-sm.jpg')}}">				
										<img src="{{ asset('user_assets/assets/images/project-3.jpg')}}" class="w-100 h-100 object-fit-cover" alt="img">
									</picture>											
								</div>
								<ul class="project-details list-unstyled mb-0 d-flex align-items-center">
									<li class="d-flex flex-column gap-2 gap-xxl-10">
										<span class="fs-5 fw-bold">Clients:</span>
										<span>Vaaz Interior</span>
									</li>
									<li class="d-flex flex-column gap-2 gap-xxl-10">
										<span class="fs-5 fw-bold">Area:</span>
										<span>18,890 m²</span>
									</li>
									<li class="d-none d-sm-block">
										<span class="d-flex flex-column gap-2 gap-xxl-10 ">
											<span class="fs-5 fw-bold">Project year:</span>
											<span>2020</span>
										</span>												
									</li>
									<li class="d-flex flex-column gap-2 gap-xxl-10">
										<span class="fs-5 fw-bold">Project type:</span>
										<span>Interior design</span>
									</li>
									<li class="architronix-button d-none d-xl-block">
										<a href="project-archive.html" class="btn btn-outline-secondary  gap-10">View Project</a>
									</li>
								</ul>
								<div class="project-info bg-primary">
									<h5 class="project-title fw-extra-bold">Vie En Couleur</h5>
									<p class="mb-0">At the heart of the e+ project, made of natural anodised aluminium, glazing, sandstone and granite, the lobby ... <a class="text-decoration-none fw-extra-bold" href="project-archive.html">see more</a></p>

									<div class="architronix-button d-block d-xl-none mt-4">
										<a href="project-archive.html" class="btn btn-outline-secondary  gap-10">View Project</a>
									</div>
								</div>
							</div>
						  </div>
						</div>
						<div class="project-carousel-buttons d-flex gap-4">
							<a href="#" class="project-prev-btn btn prev-btn prev-btn-sm" data-bs-target="#projectSlider" data-bs-slide="prev">
								<svg class="arrow-reverse" width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"></path>
								</svg>	
							</a>
							<a href="#" class="project-next-btn btn btn-primary gap-10" data-bs-target="#projectSlider" data-bs-slide="next">
								New Projects 						
								<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
								</svg>	
							</a>
						</div>
					</div>
				</div>
			</section>
			<!--Project Section ======================-->	


			<!--Testimonial Section ======================-->
			<section class="section-testimonial testimonial-1 section-full-width">
				<div class="section-title-wrapper position-relative">
					<div class="scroll-move">
						<span class="scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-primary lh-1">Testimonial</span>
					</div>					
					
					<div class="container">	
						<div class="section-title section-separator">
							<h2 class="fw-extra-bold heading-title separator lh-1">Client Experiences</h2>
							<div class="d-flex flex-column flex-lg-row gap-4 align-items-lg-end justify-content-lg-between">
								<p class="fs-4 fw-semibold mb-0 subtitle subtitle-width">Inspiring Stories from Our Clients, Where Dreams Find Their Designers</p>
							</div>
						</div>
					</div>
				</div>
				<!-- section-title-wrapper -->
				<div class="swiper-custom-progress position-relative mt-n30">
					<div class="swiper testimonial-swiper">
						<div class="swiper-wrapper"> 
							<div class="swiper-slide">
								<div class="testimonial-wrapper d-flex gap-10 gap-lg-3 gap-xl-4 align-items-baseline">
									<div class="testimonial-quote-icon text-secondary">
										<svg width="121" height="96" viewBox="0 0 121 96" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M66 95.9453V67.8453C66 49.9188 70.3834 35.0608 79.3087 23.4338C88.2594 11.5728 101.429 3.96088 118.603 0.485051L121 0V26.5397L119.446 26.895C112.752 28.4251 107.289 31.271 102.982 35.3906L102.981 35.392C99.4937 38.7208 97.0251 42.565 95.5542 46.9453H115V95.9453H66ZM92.9 48.9453C93.0636 48.2677 93.2476 47.601 93.4521 46.9453C94.9981 41.988 97.714 37.6546 101.6 33.9453C106.2 29.5453 112 26.5453 119 24.9453V2.44531C118.327 2.58156 117.66 2.72424 117 2.87334C101.189 6.44484 89.1554 13.7022 80.9 24.6453C72.3 35.8453 68 50.2453 68 67.8453V93.9453H113V48.9453H92.9ZM0 95.9453V67.8453C0 49.9188 4.38341 35.0609 13.3086 23.4339C22.2593 11.5729 35.4286 3.96089 52.6033 0.485051L55 0V26.5397L53.4456 26.895C46.7516 28.4251 41.2893 31.271 36.9825 35.3906L36.981 35.392C33.4937 38.7208 31.0251 42.565 29.5542 46.9453H49V95.9453H0ZM26.9 48.9453C27.0636 48.2677 27.2476 47.601 27.4521 46.9453C28.9981 41.988 31.714 37.6546 35.6 33.9453C40.2 29.5453 46 26.5453 53 24.9453V2.44531C52.3268 2.58156 51.6601 2.72424 51 2.87334C35.1887 6.44484 23.1554 13.7022 14.9 24.6453C6.3 35.8453 2 50.2453 2 67.8453V93.9453H47V48.9453H26.9Z"/>
										</svg>
									</div>
									<div class="testimonial-details">
										<p>I was truly impressed by the design expertise of Architronix. They turned my home into a stylish haven, such a gorgeous looks and I couldn't be happier!</p>
										<div class="testimonial-author">
											<h6 class="fw-extra-bold testimonial-author-name">Sarah Johnson</h6>
											<span class="fw-medium">Modern Spaces Inc.</span>
										</div>
									</div>								 
								</div>
							</div>
							<!-- swiper-slide -->
							<div class="swiper-slide">
								<div class="testimonial-wrapper d-flex gap-10 gap-lg-3 gap-xl-4 align-items-baseline">
									<div class="testimonial-quote-icon text-secondary">
										<svg width="121" height="96" viewBox="0 0 121 96" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M66 95.9453V67.8453C66 49.9188 70.3834 35.0608 79.3087 23.4338C88.2594 11.5728 101.429 3.96088 118.603 0.485051L121 0V26.5397L119.446 26.895C112.752 28.4251 107.289 31.271 102.982 35.3906L102.981 35.392C99.4937 38.7208 97.0251 42.565 95.5542 46.9453H115V95.9453H66ZM92.9 48.9453C93.0636 48.2677 93.2476 47.601 93.4521 46.9453C94.9981 41.988 97.714 37.6546 101.6 33.9453C106.2 29.5453 112 26.5453 119 24.9453V2.44531C118.327 2.58156 117.66 2.72424 117 2.87334C101.189 6.44484 89.1554 13.7022 80.9 24.6453C72.3 35.8453 68 50.2453 68 67.8453V93.9453H113V48.9453H92.9ZM0 95.9453V67.8453C0 49.9188 4.38341 35.0609 13.3086 23.4339C22.2593 11.5729 35.4286 3.96089 52.6033 0.485051L55 0V26.5397L53.4456 26.895C46.7516 28.4251 41.2893 31.271 36.9825 35.3906L36.981 35.392C33.4937 38.7208 31.0251 42.565 29.5542 46.9453H49V95.9453H0ZM26.9 48.9453C27.0636 48.2677 27.2476 47.601 27.4521 46.9453C28.9981 41.988 31.714 37.6546 35.6 33.9453C40.2 29.5453 46 26.5453 53 24.9453V2.44531C52.3268 2.58156 51.6601 2.72424 51 2.87334C35.1887 6.44484 23.1554 13.7022 14.9 24.6453C6.3 35.8453 2 50.2453 2 67.8453V93.9453H47V48.9453H26.9Z"/>
										</svg>
									</div>
									<div class="testimonial-details">
										<p>Architronix exceeded my expectations. They took my vision and brought it to life, creating a breathtaking design that perfectly complements my desire</p>
										<div class="testimonial-author">
											<h6 class="fw-extra-bold testimonial-author-name">John Smith</h6>
											<span class="fw-medium">Smith & Co. Architecture.</span>
										</div>
									</div>								 
								</div>
							</div>
							<!-- swiper-slide -->
							<div class="swiper-slide">
								<div class="testimonial-wrapper d-flex gap-10 gap-lg-3 gap-xl-4 align-items-baseline">
									<div class="testimonial-quote-icon text-secondary">
										<svg width="121" height="96" viewBox="0 0 121 96" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M66 95.9453V67.8453C66 49.9188 70.3834 35.0608 79.3087 23.4338C88.2594 11.5728 101.429 3.96088 118.603 0.485051L121 0V26.5397L119.446 26.895C112.752 28.4251 107.289 31.271 102.982 35.3906L102.981 35.392C99.4937 38.7208 97.0251 42.565 95.5542 46.9453H115V95.9453H66ZM92.9 48.9453C93.0636 48.2677 93.2476 47.601 93.4521 46.9453C94.9981 41.988 97.714 37.6546 101.6 33.9453C106.2 29.5453 112 26.5453 119 24.9453V2.44531C118.327 2.58156 117.66 2.72424 117 2.87334C101.189 6.44484 89.1554 13.7022 80.9 24.6453C72.3 35.8453 68 50.2453 68 67.8453V93.9453H113V48.9453H92.9ZM0 95.9453V67.8453C0 49.9188 4.38341 35.0609 13.3086 23.4339C22.2593 11.5729 35.4286 3.96089 52.6033 0.485051L55 0V26.5397L53.4456 26.895C46.7516 28.4251 41.2893 31.271 36.9825 35.3906L36.981 35.392C33.4937 38.7208 31.0251 42.565 29.5542 46.9453H49V95.9453H0ZM26.9 48.9453C27.0636 48.2677 27.2476 47.601 27.4521 46.9453C28.9981 41.988 31.714 37.6546 35.6 33.9453C40.2 29.5453 46 26.5453 53 24.9453V2.44531C52.3268 2.58156 51.6601 2.72424 51 2.87334C35.1887 6.44484 23.1554 13.7022 14.9 24.6453C6.3 35.8453 2 50.2453 2 67.8453V93.9453H47V48.9453H26.9Z"/>
										</svg>
									</div>
									<div class="testimonial-details">
										<p>Architronix Interiors transformed my office space into a functional yet aesthetically pleasing environment. Their attention to detail and innovative designs are top-notch</p>
										<div class="testimonial-author">
											<h6 class="fw-extra-bold testimonial-author-name">Emily Roberts</h6>
											<span class="fw-medium">UrbanLiving Interiors</span>
										</div>
									</div>								 
								</div>
							</div>
							<!-- swiper-slide -->
							<div class="swiper-slide">
								<div class="testimonial-wrapper d-flex gap-10 gap-lg-3 gap-xl-4 align-items-baseline">
									<div class="testimonial-quote-icon text-secondary">
										<svg width="121" height="96" viewBox="0 0 121 96" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M66 95.9453V67.8453C66 49.9188 70.3834 35.0608 79.3087 23.4338C88.2594 11.5728 101.429 3.96088 118.603 0.485051L121 0V26.5397L119.446 26.895C112.752 28.4251 107.289 31.271 102.982 35.3906L102.981 35.392C99.4937 38.7208 97.0251 42.565 95.5542 46.9453H115V95.9453H66ZM92.9 48.9453C93.0636 48.2677 93.2476 47.601 93.4521 46.9453C94.9981 41.988 97.714 37.6546 101.6 33.9453C106.2 29.5453 112 26.5453 119 24.9453V2.44531C118.327 2.58156 117.66 2.72424 117 2.87334C101.189 6.44484 89.1554 13.7022 80.9 24.6453C72.3 35.8453 68 50.2453 68 67.8453V93.9453H113V48.9453H92.9ZM0 95.9453V67.8453C0 49.9188 4.38341 35.0609 13.3086 23.4339C22.2593 11.5729 35.4286 3.96089 52.6033 0.485051L55 0V26.5397L53.4456 26.895C46.7516 28.4251 41.2893 31.271 36.9825 35.3906L36.981 35.392C33.4937 38.7208 31.0251 42.565 29.5542 46.9453H49V95.9453H0ZM26.9 48.9453C27.0636 48.2677 27.2476 47.601 27.4521 46.9453C28.9981 41.988 31.714 37.6546 35.6 33.9453C40.2 29.5453 46 26.5453 53 24.9453V2.44531C52.3268 2.58156 51.6601 2.72424 51 2.87334C35.1887 6.44484 23.1554 13.7022 14.9 24.6453C6.3 35.8453 2 50.2453 2 67.8453V93.9453H47V48.9453H26.9Z"/>
										</svg>
									</div>
									<div class="testimonial-details">
										<p>I was truly impressed by the design expertise of Architronix. They turned my home into a stylish haven, such a gorgeous looks and I couldn't be happier!</p>
										<div class="testimonial-author">
											<h6 class="fw-extra-bold testimonial-author-name">Atiq Johnson</h6>
											<span class="fw-medium">Modern Spaces Inc.</span>
										</div>
									</div>								 
								</div>
							</div>
							<!-- swiper-slide -->
							
						</div>
						<!-- swiper-wrapper -->
					</div>
					<!-- swiper testimonial-swiper -->
					<div class="container">
						<div class="testimonial-swiper-pagination-wrapper">
							<div class="testimonial-swiper-pagination"></div>						
							<div class="swiper-button-progress">	
								<div class="testimonial-progress-button-prev">
									<svg class="arrow-reverse" width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
									</svg>
								</div>							
								<div class="testimonial-progress-button-next">
									<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
									</svg> 
								</div>																
							</div>
						</div>							
					</div>
				</div>
				
			</section>
			<!--Testimonial Section ======================-->


			<!--Shop Section ======================-->
			<section class="section-shop shop-1 section-full-width">				
				<div class="section-title-wrapper position-relative">
					<div class="scroll-move">
						<span class="scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-primary lh-1">Shop</span>
					</div>					
					
					<div class="container">	
						<div class="section-title section-separator">
							<h2 class="fw-extra-bold heading-title separator lh-1">Design Elegance Emporium</h2>
							<div class="d-flex flex-column flex-lg-row gap-4 align-items-lg-end justify-content-lg-between">
								<p class="fs-4 fw-semibold mb-0 subtitle subtitle-width">Discover Unparalleled Luxury for Your Space</p>	
								<div class="architronix-button">
									<a href="product-single.html" class="btn btn-outline-primary  gap-10">View Shop 							
										<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
										</svg>							
									</a>
								</div>								
							</div>
						</div>
					</div>
					
				</div>		
				<div class="swiper-custom-progress position-relative">
					<div class="swiper shop-swiper">
						<div class="swiper-wrapper"> 
							<div class="swiper-slide">
								<div class="shop-details">
									<div class="shop-image-wrapper position-relative">
										<div class="shop-image">
											<img src="{{ asset('user_assets/assets/images/shop-image-1.jpg')}}" class="w-100 h-100 object-fit-cover" alt="img">
										</div>
										<div class="shop-image-hover">
											<a class="btn btn-sm btn-outline-secondary  gap-10" href="product-single.html"> 	
												Add to Cart													
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<g clip-path="url(#clip0_381_163)">
													<path d="M21 6.5H18C18 4.9087 17.3679 3.38258 16.2426 2.25736C15.1174 1.13214 13.5913 0.5 12 0.5C10.4087 0.5 8.88258 1.13214 7.75736 2.25736C6.63214 3.38258 6 4.9087 6 6.5H3C2.20435 6.5 1.44129 6.81607 0.87868 7.37868C0.31607 7.94129 0 8.70435 0 9.5L0 19.5C0.00158786 20.8256 0.528882 22.0964 1.46622 23.0338C2.40356 23.9711 3.67441 24.4984 5 24.5H19C20.3256 24.4984 21.5964 23.9711 22.5338 23.0338C23.4711 22.0964 23.9984 20.8256 24 19.5V9.5C24 8.70435 23.6839 7.94129 23.1213 7.37868C22.5587 6.81607 21.7956 6.5 21 6.5ZM12 2.5C13.0609 2.5 14.0783 2.92143 14.8284 3.67157C15.5786 4.42172 16 5.43913 16 6.5H8C8 5.43913 8.42143 4.42172 9.17157 3.67157C9.92172 2.92143 10.9391 2.5 12 2.5ZM22 19.5C22 20.2956 21.6839 21.0587 21.1213 21.6213C20.5587 22.1839 19.7956 22.5 19 22.5H5C4.20435 22.5 3.44129 22.1839 2.87868 21.6213C2.31607 21.0587 2 20.2956 2 19.5V9.5C2 9.23478 2.10536 8.98043 2.29289 8.79289C2.48043 8.60536 2.73478 8.5 3 8.5H6V10.5C6 10.7652 6.10536 11.0196 6.29289 11.2071C6.48043 11.3946 6.73478 11.5 7 11.5C7.26522 11.5 7.51957 11.3946 7.70711 11.2071C7.89464 11.0196 8 10.7652 8 10.5V8.5H16V10.5C16 10.7652 16.1054 11.0196 16.2929 11.2071C16.4804 11.3946 16.7348 11.5 17 11.5C17.2652 11.5 17.5196 11.3946 17.7071 11.2071C17.8946 11.0196 18 10.7652 18 10.5V8.5H21C21.2652 8.5 21.5196 8.60536 21.7071 8.79289C21.8946 8.98043 22 9.23478 22 9.5V19.5Z"/>
													</g>
													<defs>
													<clipPath id="clip0_381_163">
													<rect width="24" height="24" transform="translate(0 0.5)"/>
													</clipPath>
													</defs>
												</svg> 		
											</a>
										</div>
									</div>
									<!-- shop-image-wrapper -->
									<a href="product-single.html" class="text-decoration-none">
										<div class="shopping-info-wrapper mt-3 mt-lg-4 d-flex justify-content-between">
											<div class="shopping-item-details">
												<h5 class="fw-semibold product-title">Memento 2.0</h5>
												<span class="product-price fs-5">$134.99</span>
											</div>
											<div>
											<span class="star-rating" >										
												<span class="star-fill" style="width: 80%;"></span>
											</span>
										</div>
										</div>
									</a>
								</div>									
							</div>
							<!-- swiper-slide-->	
							<div class="swiper-slide">
								<div class="shop-details">
									<div class="shop-image-wrapper position-relative">
										<div class="shop-image">
											<img src="{{ asset('user_assets/assets/images/shop-image-2.jpg')}}" class="w-100 h-100 object-fit-cover" alt="img">
										</div>
										<div class="shop-image-hover">
											<a class="btn btn-sm btn-outline-secondary  gap-10" href="product-single.html"> 	
												Add to Cart													
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<g clip-path="url(#clip0_381_163)">
													<path d="M21 6.5H18C18 4.9087 17.3679 3.38258 16.2426 2.25736C15.1174 1.13214 13.5913 0.5 12 0.5C10.4087 0.5 8.88258 1.13214 7.75736 2.25736C6.63214 3.38258 6 4.9087 6 6.5H3C2.20435 6.5 1.44129 6.81607 0.87868 7.37868C0.31607 7.94129 0 8.70435 0 9.5L0 19.5C0.00158786 20.8256 0.528882 22.0964 1.46622 23.0338C2.40356 23.9711 3.67441 24.4984 5 24.5H19C20.3256 24.4984 21.5964 23.9711 22.5338 23.0338C23.4711 22.0964 23.9984 20.8256 24 19.5V9.5C24 8.70435 23.6839 7.94129 23.1213 7.37868C22.5587 6.81607 21.7956 6.5 21 6.5ZM12 2.5C13.0609 2.5 14.0783 2.92143 14.8284 3.67157C15.5786 4.42172 16 5.43913 16 6.5H8C8 5.43913 8.42143 4.42172 9.17157 3.67157C9.92172 2.92143 10.9391 2.5 12 2.5ZM22 19.5C22 20.2956 21.6839 21.0587 21.1213 21.6213C20.5587 22.1839 19.7956 22.5 19 22.5H5C4.20435 22.5 3.44129 22.1839 2.87868 21.6213C2.31607 21.0587 2 20.2956 2 19.5V9.5C2 9.23478 2.10536 8.98043 2.29289 8.79289C2.48043 8.60536 2.73478 8.5 3 8.5H6V10.5C6 10.7652 6.10536 11.0196 6.29289 11.2071C6.48043 11.3946 6.73478 11.5 7 11.5C7.26522 11.5 7.51957 11.3946 7.70711 11.2071C7.89464 11.0196 8 10.7652 8 10.5V8.5H16V10.5C16 10.7652 16.1054 11.0196 16.2929 11.2071C16.4804 11.3946 16.7348 11.5 17 11.5C17.2652 11.5 17.5196 11.3946 17.7071 11.2071C17.8946 11.0196 18 10.7652 18 10.5V8.5H21C21.2652 8.5 21.5196 8.60536 21.7071 8.79289C21.8946 8.98043 22 9.23478 22 9.5V19.5Z"/>
													</g>
													<defs>
													<clipPath id="clip0_381_163">
													<rect width="24" height="24" transform="translate(0 0.5)"/>
													</clipPath>
													</defs>
												</svg> 
											</a>
										</div>
									</div>
									<!-- shop-image-wrapper -->
									<a href="product-single.html" class="text-decoration-none">
										<div class="shopping-info-wrapper mt-3 mt-lg-4 d-flex justify-content-between">
											<div class="shopping-item-details">
												<h5 class="fw-semibold product-title">SX Bathtubs</h5>
												<span class="product-price fs-5">$499.99</span>
											</div>
											<div>
											<span class="star-rating" >										
												<span class="star-fill" style="width: 100%;"></span>
											</span>
										</div>
										</div>
									</a>
								</div>									
							</div>
							<!-- swiper-slide-->			
							<div class="swiper-slide">
								<div class="shop-details">
									<div class="shop-image-wrapper position-relative">
										<div class="shop-image">
											<img src="{{ asset('user_assets/assets/images/shop-image-3.jpg')}}" class="w-100 h-100 object-fit-cover" alt="img">
										</div>
										<div class="shop-image-hover">
											<a class="btn btn-sm btn-outline-secondary  gap-10" href="product-single.html"> 	
												Add to Cart													
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<g clip-path="url(#clip0_381_163)">
													<path d="M21 6.5H18C18 4.9087 17.3679 3.38258 16.2426 2.25736C15.1174 1.13214 13.5913 0.5 12 0.5C10.4087 0.5 8.88258 1.13214 7.75736 2.25736C6.63214 3.38258 6 4.9087 6 6.5H3C2.20435 6.5 1.44129 6.81607 0.87868 7.37868C0.31607 7.94129 0 8.70435 0 9.5L0 19.5C0.00158786 20.8256 0.528882 22.0964 1.46622 23.0338C2.40356 23.9711 3.67441 24.4984 5 24.5H19C20.3256 24.4984 21.5964 23.9711 22.5338 23.0338C23.4711 22.0964 23.9984 20.8256 24 19.5V9.5C24 8.70435 23.6839 7.94129 23.1213 7.37868C22.5587 6.81607 21.7956 6.5 21 6.5ZM12 2.5C13.0609 2.5 14.0783 2.92143 14.8284 3.67157C15.5786 4.42172 16 5.43913 16 6.5H8C8 5.43913 8.42143 4.42172 9.17157 3.67157C9.92172 2.92143 10.9391 2.5 12 2.5ZM22 19.5C22 20.2956 21.6839 21.0587 21.1213 21.6213C20.5587 22.1839 19.7956 22.5 19 22.5H5C4.20435 22.5 3.44129 22.1839 2.87868 21.6213C2.31607 21.0587 2 20.2956 2 19.5V9.5C2 9.23478 2.10536 8.98043 2.29289 8.79289C2.48043 8.60536 2.73478 8.5 3 8.5H6V10.5C6 10.7652 6.10536 11.0196 6.29289 11.2071C6.48043 11.3946 6.73478 11.5 7 11.5C7.26522 11.5 7.51957 11.3946 7.70711 11.2071C7.89464 11.0196 8 10.7652 8 10.5V8.5H16V10.5C16 10.7652 16.1054 11.0196 16.2929 11.2071C16.4804 11.3946 16.7348 11.5 17 11.5C17.2652 11.5 17.5196 11.3946 17.7071 11.2071C17.8946 11.0196 18 10.7652 18 10.5V8.5H21C21.2652 8.5 21.5196 8.60536 21.7071 8.79289C21.8946 8.98043 22 9.23478 22 9.5V19.5Z"/>
													</g>
													<defs>
													<clipPath id="clip0_381_163">
													<rect width="24" height="24" transform="translate(0 0.5)"/>
													</clipPath>
													</defs>
												</svg> 
											</a>
										</div>
									</div>
									<!-- shop-image-wrapper -->
									<a href="product-single.html" class="text-decoration-none">
										<div class="shopping-info-wrapper mt-3 mt-lg-4 d-flex justify-content-between">
											<div class="shopping-item-details">
												<h5 class="fw-semibold product-title">NOKEN - TONO</h5>
												<span class="product-price fs-5">$249.99</span>
											</div>
											<div>
											<span class="star-rating" >										
												<span class="star-fill" style="width: 100%;"></span>
											</span>
										</div>
										</div>
									</a>
								</div>									
							</div>
							<!-- swiper-slide-->	
							<div class="swiper-slide">
								<div class="shop-details">
									<div class="shop-image-wrapper position-relative">
										<div class="shop-image">
											<img src="{{ asset('user_assets/assets/images/shop-image-4.jpg')}}" class="w-100 h-100 object-fit-cover" alt="img">
										</div>
										<div class="shop-image-hover">
											<a class="btn btn-sm btn-outline-secondary  gap-10" href="product-single.html"> 	
												Add to Cart													
												<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
												<g clip-path="url(#clip0_381_163)">
												<path d="M21 6.5H18C18 4.9087 17.3679 3.38258 16.2426 2.25736C15.1174 1.13214 13.5913 0.5 12 0.5C10.4087 0.5 8.88258 1.13214 7.75736 2.25736C6.63214 3.38258 6 4.9087 6 6.5H3C2.20435 6.5 1.44129 6.81607 0.87868 7.37868C0.31607 7.94129 0 8.70435 0 9.5L0 19.5C0.00158786 20.8256 0.528882 22.0964 1.46622 23.0338C2.40356 23.9711 3.67441 24.4984 5 24.5H19C20.3256 24.4984 21.5964 23.9711 22.5338 23.0338C23.4711 22.0964 23.9984 20.8256 24 19.5V9.5C24 8.70435 23.6839 7.94129 23.1213 7.37868C22.5587 6.81607 21.7956 6.5 21 6.5ZM12 2.5C13.0609 2.5 14.0783 2.92143 14.8284 3.67157C15.5786 4.42172 16 5.43913 16 6.5H8C8 5.43913 8.42143 4.42172 9.17157 3.67157C9.92172 2.92143 10.9391 2.5 12 2.5ZM22 19.5C22 20.2956 21.6839 21.0587 21.1213 21.6213C20.5587 22.1839 19.7956 22.5 19 22.5H5C4.20435 22.5 3.44129 22.1839 2.87868 21.6213C2.31607 21.0587 2 20.2956 2 19.5V9.5C2 9.23478 2.10536 8.98043 2.29289 8.79289C2.48043 8.60536 2.73478 8.5 3 8.5H6V10.5C6 10.7652 6.10536 11.0196 6.29289 11.2071C6.48043 11.3946 6.73478 11.5 7 11.5C7.26522 11.5 7.51957 11.3946 7.70711 11.2071C7.89464 11.0196 8 10.7652 8 10.5V8.5H16V10.5C16 10.7652 16.1054 11.0196 16.2929 11.2071C16.4804 11.3946 16.7348 11.5 17 11.5C17.2652 11.5 17.5196 11.3946 17.7071 11.2071C17.8946 11.0196 18 10.7652 18 10.5V8.5H21C21.2652 8.5 21.5196 8.60536 21.7071 8.79289C21.8946 8.98043 22 9.23478 22 9.5V19.5Z"/>
												</g>
												<defs>
												<clipPath id="clip0_381_163">
												<rect width="24" height="24" transform="translate(0 0.5)"/>
												</clipPath>
												</defs>
												</svg>  		
											</a>
										</div>
									</div>
									<!-- shop-image-wrapper -->
									<a href="product-single.html" class="text-decoration-none">
										<div class="shopping-info-wrapper mt-3 mt-lg-4 d-flex justify-content-between">
											<div class="shopping-item-details">
												<h5 class="fw-semibold product-title">Washbasins</h5>
												<span class="product-price fs-5">$499.99</span>
											</div>
											<div>
											<span class="star-rating" >										
												<span class="star-fill" style="width: 80%;"></span>
											</span>
										</div>
										</div>
									</a>
								</div>									
							</div>
							<!-- swiper-slide-->	
							<div class="swiper-slide">
								<div class="shop-details">
									<div class="shop-image-wrapper position-relative">
										<div class="shop-image">
											<img src="{{ asset('user_assets/assets/images/shop-image-2.jpg')}}" class="w-100 h-100 object-fit-cover" alt="img">
										</div>
										<div class="shop-image-hover">
											<a class="btn btn-sm btn-outline-secondary  gap-10" href="product-single.html"> 	
												Add to Cart													
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<g clip-path="url(#clip0_381_163)">
													<path d="M21 6.5H18C18 4.9087 17.3679 3.38258 16.2426 2.25736C15.1174 1.13214 13.5913 0.5 12 0.5C10.4087 0.5 8.88258 1.13214 7.75736 2.25736C6.63214 3.38258 6 4.9087 6 6.5H3C2.20435 6.5 1.44129 6.81607 0.87868 7.37868C0.31607 7.94129 0 8.70435 0 9.5L0 19.5C0.00158786 20.8256 0.528882 22.0964 1.46622 23.0338C2.40356 23.9711 3.67441 24.4984 5 24.5H19C20.3256 24.4984 21.5964 23.9711 22.5338 23.0338C23.4711 22.0964 23.9984 20.8256 24 19.5V9.5C24 8.70435 23.6839 7.94129 23.1213 7.37868C22.5587 6.81607 21.7956 6.5 21 6.5ZM12 2.5C13.0609 2.5 14.0783 2.92143 14.8284 3.67157C15.5786 4.42172 16 5.43913 16 6.5H8C8 5.43913 8.42143 4.42172 9.17157 3.67157C9.92172 2.92143 10.9391 2.5 12 2.5ZM22 19.5C22 20.2956 21.6839 21.0587 21.1213 21.6213C20.5587 22.1839 19.7956 22.5 19 22.5H5C4.20435 22.5 3.44129 22.1839 2.87868 21.6213C2.31607 21.0587 2 20.2956 2 19.5V9.5C2 9.23478 2.10536 8.98043 2.29289 8.79289C2.48043 8.60536 2.73478 8.5 3 8.5H6V10.5C6 10.7652 6.10536 11.0196 6.29289 11.2071C6.48043 11.3946 6.73478 11.5 7 11.5C7.26522 11.5 7.51957 11.3946 7.70711 11.2071C7.89464 11.0196 8 10.7652 8 10.5V8.5H16V10.5C16 10.7652 16.1054 11.0196 16.2929 11.2071C16.4804 11.3946 16.7348 11.5 17 11.5C17.2652 11.5 17.5196 11.3946 17.7071 11.2071C17.8946 11.0196 18 10.7652 18 10.5V8.5H21C21.2652 8.5 21.5196 8.60536 21.7071 8.79289C21.8946 8.98043 22 9.23478 22 9.5V19.5Z"/>
													</g>
													<defs>
													<clipPath id="clip0_381_163">
													<rect width="24" height="24" transform="translate(0 0.5)"/>
													</clipPath>
													</defs>
												</svg> 
											</a>
										</div>
									</div>
									<!-- shop-image-wrapper -->
									<a href="product-single.html" class="text-decoration-none">
										<div class="shopping-info-wrapper mt-3 mt-lg-4 d-flex justify-content-between">
											<div class="shopping-item-details">
												<h5 class="fw-semibold product-title">SX Bathtubs</h5>
												<span class="product-price fs-5">$499.99</span>
											</div>
											<div>
											<span class="star-rating" >										
												<span class="star-fill" style="width: 100%;"></span>
											</span>
										</div>
										</div>
									</a>
								</div>									
							</div>
							<!-- swiper-slide-->		
															
						</div>
						<!-- swiper-wrapper -->
					</div>
					<!-- swiper -->		
					<div class="container">
						<div class="shop-swiper-pagination-wrapper">
							<div class="shop-swiper-pagination"></div>						
							<div class="swiper-button-progress">	
								<div class="shop-progress-button-prev">
									<svg class="arrow-reverse" width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
									</svg>
								</div>							
								<div class="shop-progress-button-next">
									<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
									</svg> 
								</div>																
							</div>
						</div>							
					</div>										
				</div>		
			</section>
			<!--Shop Section ======================-->


			<!--Blog Section ======================-->
			<section class="section-blog blog-1">	
				<div class="section-full-width">
					<div class="section-title-wrapper position-relative">
						<div class="scroll-move">
							<span class="scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-primary lh-1">Blog</span>
						</div>					
						
						<div class="container">	
							<div class="section-title section-separator">
								<h2 class="fw-extra-bold heading-title separator lh-1">Design Insights & Inspiration</h2>								
								<p class="fs-4 fw-semibold mb-0 subtitle subtitle-width">Unveil the Secrets to Transforming Spaces</p>
							</div>
						</div>						
					</div>
				</div>			
				<div class="container">
					<div class="swiper-custom-progress position-relative">
						<div class="swiper blog-swiper">
							<div class="swiper-wrapper"> 
								<div class="swiper-slide">
									<div class="blog-wrapper">
										<div class="blog-image">
											<img src="{{ asset('user_assets/assets/images/blog-image-1.jpg')}}" class="img-fluid" alt="img">
										</div>
										<div class="blog-details">
											<p>14 December '23 / Interior</p>
											<h5 class="blog-title fs-5 fw-semibold"><a href="blog-single.html" class="link-hover-animation-1 stretched-link text-decoration-none">The Art of Harmonious Color Schemes in Interior Design</a></h5>
										</div>
									</div>									
								</div>
								<!-- swiper-slide-->
								<div class="swiper-slide">
									<div class="blog-wrapper">
										<div class="blog-image">
											<img src="{{ asset('user_assets/assets/images/blog-image-2.jpg')}}" class="img-fluid" alt="img">
										</div>
										<div class="blog-details">
											<p>23 November '23 / Interior</p>
											<h5 class="blog-title fs-5 fw-semibold"><a href="blog-single.html" class="link-hover-animation-1 stretched-link text-decoration-none">Creating Timeless Elegance: Classic vs. Contemporary Styles</a></h5>
										</div>
									</div>									
								</div>
								<!-- swiper-slide-->
								<div class="swiper-slide">
									<div class="blog-wrapper">
										<div class="blog-image">
											<img src="{{ asset('user_assets/assets/images/blog-image-3.jpg')}}" class="img-fluid" alt="img">
										</div>
										<div class="blog-details">
											<p>15 November '23 / Interior</p>
											<h5 class="blog-title fs-5 fw-semibold"><a href="blog-single.html" class="link-hover-animation-1 stretched-link text-decoration-none">Maximizing Small Spaces: Tips for Cozy Apartment Living</a></h5>
										</div>
									</div>									
								</div>
								<!-- swiper-slide-->
								<div class="swiper-slide">
									<div class="blog-wrapper">
										<div class="blog-image">
											<img src="{{ asset('user_assets/assets/images/blog-image-2.jpg')}}" class="img-fluid" alt="img">
										</div>
										<div class="blog-details">
											<p>23 November '23 / Interior</p>
											<h5 class="blog-title fs-5 fw-semibold"><a href="blog-single.html" class="link-hover-animation-1 stretched-link text-decoration-none">Creating Timeless Elegance: Classic vs. Contemporary Styles</a></h5>
										</div>
									</div>									
								</div>
								<!-- swiper-slide-->			
							</div>
							<!-- swiper-wrapper -->
						</div>
						<!-- swiper -->							
						<div class="blog-swiper-pagination-wrapper">
							<div class="blog-swiper-pagination"></div>						
							<div class="swiper-button-progress">	
								<div class="blog-progress-button-prev">
									<svg class="arrow-reverse" width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
									</svg>
								</div>							
								<div class="blog-progress-button-next">
									<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
									</svg> 
								</div>																
							</div>
						</div>									
					</div>	
				</div>	
			</section>
			<!--Blog Section ======================-->


			@endsection

			@push('styles')
			<style>
			.bg-something {
				background-color: rgb(37 59 47) !important;
			}
			</style>
			@endpush