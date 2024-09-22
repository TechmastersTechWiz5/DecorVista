@extends('users.layout')

@section('title')

Blog

@endsection
@section('main')
			<!--Banner Section ======================-->
			<section class="section-banner position-relative pt-60">
				<div class="section-full-width">
					<div class="section-title-wrapper position-relative">	
						<div class="scroll-move">
							<span class="scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-primary lh-1">Blog</span>
						</div>				
						
						<div class="container">	
							<div class="section-title section-separator">
								<h2 class="fw-extra-bold heading-title separator lh-1">Design Insights & Inspiration</h2>
								<div class="d-flex flex-column flex-lg-row gap-4 align-items-lg-end justify-content-lg-between">
									<p class="fs-4 fw-semibold mb-0 subtitle subtitle-width">Unveil the Secrets to Transforming Spaces</p>
								</div>
							</div>
						</div>
					</div>
					<!-- section-title-wrapper -->	
				</div>
				<!-- section-full-width -->	
			</section>
			<!--Banner Section ======================-->
            <!-- Blog Section ====================== -->
<section class="section-blog position-relative">
    <div class="container">
        <div class="position-relative section-padding-xxl">
            <div class="row gx-20 gy-30 gy-lg-70">
                @foreach($blogs as $blog)
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-wrapper">
                            <div class="blog-image">
                                @if($blog->images->isNotEmpty())
                                    <img src="{{ env('ASSET2_URL').$blog->images->first()->image_path }}" class="img-fluid blog-fixed-size" alt="img">
                                @else
                                    <img src="{{ asset('user_assets/assets/images/default-blog-image.jpg') }}" class="img-fluid blog-fixed-size" alt="No Image Available">
                                @endif
                            </div>
                            <div class="blog-details">
                                <p>{{ \Carbon\Carbon::parse($blog->date)->format('d F \'y') }} / {{ $blog->created_by }}</p>
                                <h5 class="blog-title fs-5 fw-semibold">
                                    <a href="{{ route('users.blogs.show', $blog->id) }}" class="link-hover-animation-1 stretched-link text-decoration-none">
                                        {{ $blog->title }}
                                    </a>
                                </h5>
                            </div>
                        </div>  
                    </div>
                @endforeach
            </div>
        </div>
    </div>  
    <!-- container -->
    
    <!-- Pagination -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center align-items-end position-relative">
            {{ $blogs->links('pagination::bootstrap-4') }}
        </ul>
    </nav>	
</section>
<!-- Blog Section ====================== -->






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