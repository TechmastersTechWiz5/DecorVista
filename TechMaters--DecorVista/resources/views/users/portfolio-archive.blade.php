@extends('users.layout')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title', 'Portfolio')

@section('main')
<!-- Full-Screen-Modal (Search-Modal) -->
<!-- (kept unchanged) -->

<!-- Banner Section -->
<section class="section-banner position-relative pt-60">
	<div class="section-full-width">
		<div class="section-title-wrapper position-relative">
			<div class="scroll-move">
				<span class="scrolling-text display-1 fw-extra-bold stroke-title text-stroke stroke-opacity-20 stroke-width-1 stroke-primary lh-1">Portfolio</span>
			</div>
			<div class="container">
				<div class="section-title section-separator">
					<h2 class="fw-extra-bold heading-title separator lh-1">A Journey Through Our Past Projects</h2>
					<div class="d-flex flex-column flex-lg-row gap-4 align-items-lg-end justify-content-lg-between">
						<p class="fs-4 fw-semibold mb-0 subtitle subtitle-width">Exploring the Tapestry of Our Design Legacy</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Banner Section -->

<!-- Project Overview Section -->
@foreach($portfolios as $portfolio)
@if($loop->iteration % 2 != 0) <!-- Odd iteration: project-overview-1 -->
<div class="project-overview-1 project-overview-padding">
	<div class="row align-items-center gx-0">
		<div class="col-lg-6">
			<div class="project-overview-image float-right">
				<img src="{{ asset('storage/'.$portfolio['image_path']) }}" alt="{{ $portfolio['title'] }}">
			</div>
		</div>
		<!-- col-6 -->
		<div class="col-lg-6 overflow-hidden">
			<div class="project-overview-details bg-primary text-secondary wow slideInLeft">
				<div>
					<h5 class="display-5 fw-extra-bold mb-0" style="color: white !important; ">{{ $portfolio['title'] }}</h5>
					<p class="project-overview-description mb-0">{{ $portfolio['description'] }}</p>
					<ul class="project-overview-list list-unstyled mb-0 d-flex flex-column gap-10">
						<li class="d-flex align-items-center">
							<span class="fw-extra-bold">Designer:</span> {{ $portfolio['designer']['name'] }}
						</li>
						<li class="d-flex align-items-center">
							<span class="fw-extra-bold">Date:</span> {{ $portfolio['created_date'] }}
						</li>
						<!-- Display Consultant Timings -->
						<li class="d-flex align-items-center">
							<span class="fw-extra-bold">Consultant Timings:</span>
							<!-- Assuming multiple consultant times are attached to the portfolio -->
							@foreach($portfolio['consultants'] as $consultant)
							{{ $consultant['available_at'] }}<br>
							@endforeach
						</li>
					</ul>
					<div class="mt-4 mt-lg-30 mt-xxl-40">
						<!-- View Portfolio Button -->
						<a href="{{ $portfolio['portfolio_link'] }}" class="btn btn-link link-hover-animation-1 d-inline-flex gap-10 align-items-center" target="_blank">View Portfolio
							<span>
								<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z" />
								</svg>
							</span>
						</a>
						<!-- Book Appointment Button -->
						<button type="submit" onclick="BookAppointment('{{ route('users.appointments.store', ['id' => $portfolio['id']]) }}')" id="btnId" class="btn btn-primary d-inline-flex align-items-center gap-10">
							Book Appointment
						</button>




					</div>
				</div>
			</div>
		</div>
		<!-- col-6 -->
	</div>
	<!-- row -->
</div>
<!-- project-overview-1 -->
@else <!-- Even iteration: project-overview-2 -->
<div class="project-overview-2 project-overview-padding">
	<div class="row flex-row-reverse align-items-center gx-0">
		<div class="col-lg-6">
			<div class="project-overview-image">
				<img src="{{ asset('storage/'.$portfolio['image_path']) }}" alt="{{ $portfolio['title'] }}">
			</div>
		</div>
		<!-- col-6 -->
		<div class="col-lg-6 overflow-hidden">
			<div class="project-overview-details bg-primary text-secondary position-relative wow slideInRight">
				<div>
					<h5 class="display-5 fw-extra-bold mb-0" style="color: white !important;">{{ $portfolio['title'] }}</h5>
					<p class="project-overview-description mb-0">{{ $portfolio['description'] }}</p>
					<ul class="project-overview-list list-unstyled mb-0 d-flex flex-column gap-10">
						<li class="d-flex align-items-center">
							<span class="fw-extra-bold">Designer:</span> {{ $portfolio['designer']['name'] }}
						</li>
						<li class="d-flex align-items-center">
							<span class="fw-extra-bold">Date:</span> {{ $portfolio['created_date'] }}
						</li>
						<!-- Display Consultant Timings -->
						<li class="d-flex align-items-center">
							<span class="fw-extra-bold">Consultant Timings:</span>
							@foreach($portfolio['consultants'] as $consultant)
							{{ $consultant['available_at'] }}<br>
							@endforeach
						</li>
					</ul>
					<div class="mt-4 mt-lg-30 mt-xxl-40">
						<!-- View Portfolio Button -->
						<a href="{{ $portfolio['portfolio_link'] }}" class="btn btn-link link-hover-animation-1 d-inline-flex gap-10 align-items-center" target="_blank">View Portfolio
							<span>
								<svg width="35" height="22" viewBox="0 0 35 22" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" clip-rule="evenodd" d="M24 0.585815L34.4142 10.9999L24 21.4142L22.5858 20L30.5857 12L0 12L2.38419e-07 10L30.5858 10L22.5858 2.00003L24 0.585815Z" />
								</svg>
							</span>
						</a>
						<!-- Book Appointment Button -->
						<button type="submit" onclick="BookAppointment('{{ route('users.appointments.store', ['id' => $portfolio['id']]) }}')" id="btnId" class="btn btn-primary d-inline-flex align-items-center gap-10">
							Book Appointment
						</button>
					</div>
				</div>
			</div>
		</div>
		<!-- col-6 -->
	</div>
	<!-- row -->
</div>
<!-- project-overview-2 -->
@endif
@endforeach
@endsection

@push('styles')
<style>
	.bg-primary {
		--bs-bg-opacity: 1;
		background-color: rgb(36 58 46) !important;
	}

	</style>
@endpush