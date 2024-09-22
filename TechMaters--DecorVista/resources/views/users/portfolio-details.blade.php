@extends('users.layout')
@section('title')
Portfolio Detail
@endsection
   
@section('main')



<!--Hero Section ======================-->
<div class="section-hero hero-2 section-padding-xxl position-relative max-width">
	<img src="{{ env('ASSET2_URL') . $portfolio->images->where('type', 'hero')->first()->image_path}}" class="img-fluid"
		alt="hero-image">
</div>
<!--Hero Section ======================-->



<!--Section ======================-->
<section class="section-full-width position-relative">
	<div class="container">
		<div class="section-padding-xxl">
			<div class="position-relative">
				<div class="row g-40">
					<div class="col-lg-7 col-xxl-8">
						<div class="section-title section-separator">
							<h2 class="fw-extra-bold heading-title separator lh-1">{{ $portfolio->title }}</h2>
							<p class="fs-4 mb-0 subtitle">{{ $portfolio->description }}</p>
						</div>
					</div>
					<div class="col-lg-5 col-xxl-4">
						<div class="project-details-wrapper project-details-style bg-primary text-secondary">
							<h4 class="project-details-title fw-semibold">{{ $portfolio->title }}</h4>
							<ul
								class="project-details-list list-unstyled mb-0 d-flex flex-row flex-lg-column flex-wrap flex-lg-nowrap">
								<li class="d-flex flex-column gap-2 gap-xxl-10">
									<span class="fs-5 fw-bold">Designer:</span>
									<span>{{ $portfolio->designer->name }}</span>
								</li>
								<li class="d-flex flex-column gap-2 gap-xxl-10">
									<span class="fs-5 fw-bold">Status:</span>
									<span>{{ $portfolio->status == 1 ? 'Active' : 'Inactive' }}</span>
								</li>
								<li class="d-flex flex-column gap-2 gap-xxl-10">
									<span class="fs-5 fw-bold">Created Date:</span>
									<span>{{ $portfolio->created_date }}</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- container -->

	<div
		class="image-contents d-flex flex-column flex-xl-row align-items-xl-center gap-4 section-padding-md position-relative px-10 px-lg-0">
		<img src="{{ env('ASSET2_URL') . $portfolio->images->where('type', 'main')->first()->image_path }}"
			class="img-fluid wow fadeIn" alt="Main Image" data-wow-delay=".3s">
	</div>

	<div class="section-padding-md">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="section-title section-separator">
						<p class="mb-0 subtitle py-2 py-lg-4">{{ $portfolio->description }}</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Carousel Gallery -->
	<div class="project-gallery-1 section-padding-lg">
		<div class="swiper-custom-progress position-relative">
			<div class="swiper project-gallery-swiper">
				<div class="swiper-wrapper">
					@foreach($portfolio->images->where('type', 'carousel') as $carouselImage)
						<div class="swiper-slide">
							<div>
								<a href="{{ env('ASSET2_URL') . $carouselImage->image_path}}" class="image-link">
									<img src="{{ env('ASSET2_URL') . $carouselImage->image_path}}" alt="carousel image">
								</a>
							</div>
						</div>
					@endforeach
				</div>
				<!-- swiper-wrapper -->
			</div>
			<!-- swiper -->
			<div class="container">
				<div class="project-swiper-pagination-wrapper mt-xl-3">
					<div class="project-swiper-pagination"></div>
					<div class="swiper-button-progress">
						<div class="project-progress-button-prev">
							<svg class="arrow-reverse" width="35" height="22" viewBox="0 0 35 22" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd"
									d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z" />
							</svg>
						</div>
						<div class="project-progress-button-next">
							<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd"
									d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z" />
							</svg>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Consultants Section -->
	<div class="section-padding-md">
		<div class="container">
			<h3>Consultant Timings</h3>
			<ul class="list-unstyled">
				@foreach($portfolio->consultants as $consultant)
					<li>Available at: {{ $consultant->available_at }} - Message: {{ $consultant->message }}</li>
				@endforeach
			</ul>
		</div>
	</div>
</section>
<!--Section ======================-->

@endsection