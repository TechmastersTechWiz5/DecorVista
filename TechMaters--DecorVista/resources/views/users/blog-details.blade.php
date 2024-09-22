@extends('users.layout')

@section('title')

Blog Details

@endsection
@section('main')

			<!--Banner Section ======================-->			
			<div class="blog-single-image position-relative max-width">
				<div class="overlay">					
					<picture>						
						<source media="(max-width:530px)" srcset="assets/images/blog-single-image-sm.jpg')}}">
						<img src="{{ asset('user_assets/assets/images/blog-single-image.jpg')}}" class="w-100 h-100 object-fit-cover" alt="hero-image">
					</picture> 
				</div>
				<div class="container">
					<div class="blog-single-text position-absolute">
						<h5 class="display-3 fw-extra-bold mb-0">{{$blog->title}}</h5>
						<ul class="contact-lists list-unstyled mb-0 d-flex">
                            <li>{{ \Carbon\Carbon::parse($blog->date)->format('d F \'y') }} / {{ $blog->created_by }}</li>
							<li>Interior</li>
							<li>5 min read</li>
						</ul>
					</div>
				</div>
			</div>			
			<!--Banner Section ======================-->


			<!--Blog-single Section ======================-->
			<section class="section-blog-single position-relative">
				<div class="container">
					<div class="row gy-5 justify-content-between">
						<div class="col-lg-7">
							<div class="blog-inner">
                                {!! $blog->body !!}

								<div class="wp-block-tag-cloud d-flex pt-30 pt-lg-70 flex-wrap mb-30">
									<a href="#" class="text-decoration-none tag-cloud-link btn-hover-animation-3">Art and Decor</a>
									<a href="#" class="text-decoration-none tag-cloud-link btn-hover-animation-3">Modern Living</a>
									<a href="#" class="text-decoration-none tag-cloud-link btn-hover-animation-3">Renovations</a>
									<a href="#" class="text-decoration-none tag-cloud-link btn-hover-animation-3">Vintage Style</a>									
								</div>

								<div class="d-flex gap-30 align-items-center">

									<h6 class="mb-0">Share on:</h6>
									<a href="#" class="text-decoration-none link-hover-animation-1 text-uppercase fw-semibold">fb</a>
									<a href="#" class="text-decoration-none link-hover-animation-1 text-uppercase fw-semibold">be</a>
									<a href="#" class="text-decoration-none link-hover-animation-1 text-uppercase fw-semibold">tw</a>
									<a href="#" class="text-decoration-none link-hover-animation-1 text-uppercase fw-semibold">li</a>

								</div>
								
							</div>
							<!-- blog-inner -->
						</div>
						<!-- col-7 -->
						<div class="col-lg-4">
							<div class="d-flex flex-column gap-5 gap-lg-70 sticky-elements pb-lg-4">

								<div class="widget">
									<h5 class="display-5 fw-semibold mb-30 lh-1">Search</h5>
									<form action="#" class="contact-form">
										<div>
											<input type="text" class="form-control" id="formInput" placeholder="Type & Hit Enter">
										</div>										  
									</form>
								</div>
								<!-- widget -->

								<div class="widget">
									<h5 class="display-5 fw-semibold mb-30 lh-1">Categories</h5>
									<ul class="category-lists list-unstyled mb-0 d-flex flex-column gap-20">
										<li class="d-flex align-items-center gap-4">
											<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
											</svg>	
											<a href="#" class="text-decoration-none link-hover-animation-1">Design Inspiration<span class="fw-bold"> (15)</span></a> 
										</li>
										<li class="d-flex align-items-center gap-4">
											<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
											</svg>	
											<a href="#" class="text-decoration-none link-hover-animation-1">Sustainable Design<span class="fw-bold"> (4)</span></a> 
										</li>
										<li class="d-flex align-items-center gap-4">
											<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
											</svg>	
											<a href="#" class="text-decoration-none link-hover-animation-1">Art and Decor<span class="fw-bold"> (9)</span></a> 
										</li>
										<li class="d-flex align-items-center gap-4">
											<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z"/>
											</svg>	
											<a href="#" class="text-decoration-none link-hover-animation-1">Space Planning<span class="fw-bold"> (15)</span></a> 
										</li>
									</ul>
								</div>
								<!-- widget -->

								<div class="widget">
									<h5 class="display-5 fw-semibold mb-30 lh-1">Tags</h5>
									<div class="wp-block-tag-cloud d-flex flex-wrap">
										<a href="#" class="text-decoration-none tag-cloud-link btn-hover-animation-3">Color Schemes</a>
										<a href="#" class="text-decoration-none tag-cloud-link btn-hover-animation-3">Furniture Design</a>
										<a href="#" class="text-decoration-none tag-cloud-link btn-hover-animation-3">DIY Projects</a>
										<a href="#" class="text-decoration-none tag-cloud-link btn-hover-animation-3">Space Planning</a>
									</div>
								</div>
							</div>
						</div>
						<!-- col-4 -->
					</div>
				</div>
			</section>
			<!--Blog-single Section ======================-->

			<!--Comment Section ======================-->
			<section class="section-comment position-relative pb-4 pb-lg-40">
				<div class="container">
					<div class="row gy-40 gy-lg-70">
						<div class="col-lg-7">
							<div class="section-comment-inner">
								<h4 class="display-5 mb-4 mb-lg-30 pt-lg-70">Comments (32)</h4>
								<div class="d-flex gap-10 gap-md-3 gap-lg-4">
									<div class="author-image-wrapper">
										<img src="{{ asset('user_assets/assets/images/author-1.png')}}" alt="image">
									</div>
									<div>
										<h5 class="mb-2"><a href="#" class="text-decoration-none link-hover-animation-1">Philip Reyes</a></h5>
										<p class="mb-10">
											Small apartments can be a canvas for creativity and innovation. By following these tips and making thoughtful design choices, you can transform your compact living space into a int functional, inviting home that combines style and comfort.
										</p>
										<h6 class="mb-30"><a href="#" class="text-decoration-none link-hover-animation-1">Reply</a></h6>
										<div class="d-flex gap-10 gap-md-3 gap-lg-4">
											<div class="author-image-wrapper">
												<img src="{{ asset('user_assets/assets/images/author-2.png')}}" alt="image">
											</div>
											<div>
												<h5 class="mb-2"><a href="#" class="text-decoration-none link-hover-animation-1">Melissa McClone</a></h5>
												<p class="mb-10">
													By following these tips and making thoughtful design choices, you can transform your compact living space into a int functiona.
												</p>
												<h6 class="mb-2"><a href="#" class="text-decoration-none link-hover-animation-1">Reply</a></h6>												
											</div>
										</div>										
									</div>
								</div>
							</div>
							
						</div>
						<!-- col-8 -->

						<div class="col-lg-7">
							<h4 class="display-5 mb-4 mb-lg-30">Leave a comment</h4>

							<form id="contactForm" class="contact-form row g-4">										
								<div class="col-12">
									<textarea class="form-control" id="InputMessage" name="InputMessage" rows="5" placeholder="Write your comment"></textarea>
								</div>		
								<div class="col-md-6">
									<input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Your email*" required>
								</div>
								<div class="col-md-6">
									<input type="text" class="form-control" id="InputName" name="InputName" placeholder="Your name*" required>
								</div>
								<div class="col-12">
									<div class="text-lg-end">
										<button type="submit" class="btn btn-primary gap-10">Submit 							
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
					<!-- row -->
				</div>
				<!-- container -->			
			</section>
			<!--Comment Section ======================-->


			
<!-- Blog Swiper ====================== -->
<div class="container">				
    <h4 class="mb-4 mb-lg-30 position-relative">Related Posts</h4>
    <div class="swiper blog-swiper">
        <div class="swiper-wrapper"> 
            @foreach($RelatedBlog as $blog)
                <div class="swiper-slide">
                    <div class="blog-wrapper">
                        <div class="blog-image">
                            @if($blog->images->isNotEmpty())
                                <img src="{{ env('ASSET2_URL').$blog->images->first()->image_path }}" class="img-fluid blog-fixed-size" alt="Blog Image">
                            @else
                                <img src="{{ asset('user_assets/assets/images/default-blog-image.jpg') }}" class="img-fluid blog-fixed-size" alt="No Image Available">
                            @endif
                        </div>
                        <div class="blog-details">
                            <p>{{ \Carbon\Carbon::parse($blog->date)->format('d F Y') }} / {{ $blog->created_by }}</p>
                            <h5 class="blog-title fs-5 fw-semibold">
                                <a href="{{ route('users.blogs.show', $blog->id) }}" class="link-hover-animation-1 stretched-link text-decoration-none">
                                    {{ $blog->title }}
                                </a>
                            </h5>
                        </div>
                    </div>									
                </div>
                <!-- swiper-slide -->
            @endforeach
        </div>
        <!-- swiper-wrapper -->
    </div>
    <!-- swiper -->	
</div>
<!-- Blog Swiper ====================== -->

@endsection


@push('styles')
<style>
.blog-fixed-size {
    width: 100%; 
    height: 200px; 
    object-fit: cover; 
}
</style>
@endpush