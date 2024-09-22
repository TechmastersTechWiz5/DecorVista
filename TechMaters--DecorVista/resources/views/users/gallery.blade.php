<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tech Masters | Gallery</title>
    <link rel="shortcut icon" type="images/png" href="{{ asset('user_assets/assets/images/fav-icon/favicon.ico') }}">
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.11.2/toastify.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastify-js/1.11.2/toastify.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">
    <!-- Additional CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.21.1/tagify.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/css/bootstrap-select.min.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('user_assets/assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user_assets/assets/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('user_assets/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('user_assets/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('user_assets/assets/css/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('user_assets/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('user_assets/assets/css/theme.css') }}">



    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> <!-- Ensure this is the only jQuery inclusion -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.18/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tagify/4.21.1/tagify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    @stack('styles')


    <!-- Isotope CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <!-- Custom CSS -->
    <style>
        /* Custom CSS */
        .portfolio-item img {
            width: 100%;
            height: auto;
        }


        @media (max-width: 768px) {
            #portfolio-items .col-md-3 {
                max-width: 50%;
                flex: 0 0 50%;
            }
        }

        @media (max-width: 576px) {
            #portfolio-items .col-md-3 {
                max-width: 100%;
                flex: 0 0 100%;
            }
        }
    </style>
</head>

<body>

			<!--Header Section ======================-->
			<header class="section-header header-1 architronix-nav sticky-navbar header-bg-2 header-shadow">	
				<nav class="navbar navbar-expand-xl navbar-light nav-border hover-menu" aria-label="Offcanvas navbar large">	
					<div class="container-fluid max-width">										
						<div class="d-flex align-items-end">
							<a class="navbar-brand py-0" href="{{route('home')}}">
								<span class="logo">
													<img src="{{asset('user_assets/assets/images/fav-icon/favicon.png')}}" height="75px"  width="400px"    alt="logo">

									</span>
							</a>
							
						</div>
						<a href="javascript:void(0)" class="toggler-icon text-decoration-none d-block d-xl-none" data-bs-toggle="offcanvas" data-bs-target="#architronixNavbar" aria-controls="architronixNavbar" aria-label="Toggle navigation">
							<svg width="40" height="23" viewBox="0 0 40 23" fill="none" xmlns="http://www.w3.org/2000/svg">
								<line x1="1.5" y1="1.5" x2="38.5" y2="1.5" stroke="#253B2F" stroke-width="3" stroke-linecap="round"/>
								<line x1="1.5" y1="11.5" x2="38.5" y2="11.5" stroke="#253B2F" stroke-width="3" stroke-linecap="round"/>
								<line x1="21.5" y1="21.5" x2="38.5" y2="21.5" stroke="#253B2F" stroke-width="3" stroke-linecap="round"/>
							</svg> 
						</a>
						<div class="offcanvas offcanvas-end" data-bs-backdrop="static" tabindex="-1" id="architronixNavbar" aria-labelledby="architronixNavbarLabel">
							<div class="offcanvas-header">
								<span class="offcanvas-title" id="architronixNavbarLabel">
									<span class="logo">
											<img src="{{ asset('user_assets/assets/images/fav-icon/favicon.ico')}}" alt="logo">										
										<svg width="219" height="31" viewBox="0 0 219 31" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M196.212 30.2799L203.852 19.3199L196.172 8.43994H203.132L208.892 16.9199H205.852L211.612 8.43994H218.572L210.892 19.3199L218.492 30.2799H211.572L205.932 21.7999H208.812L203.172 30.2799H196.212Z"/>
										<path d="M187.541 30.28V8.43998H193.541V30.28H187.541ZM187.541 6.47998V0.47998H193.541V6.47998H187.541Z"/>
										<path d="M163.596 30.28V8.43996H169.196V12.76L168.876 11.8C169.383 10.4933 170.196 9.5333 171.316 8.91996C172.463 8.27996 173.796 7.95996 175.316 7.95996C176.969 7.95996 178.409 8.30663 179.636 8.99996C180.889 9.69329 181.863 10.6666 182.556 11.92C183.249 13.1466 183.596 14.5866 183.596 16.24V30.28H177.596V17.52C177.596 16.6666 177.423 15.9333 177.076 15.32C176.756 14.7066 176.289 14.2266 175.676 13.88C175.089 13.5333 174.396 13.36 173.596 13.36C172.823 13.36 172.129 13.5333 171.516 13.88C170.903 14.2266 170.423 14.7066 170.076 15.32C169.756 15.9333 169.596 16.6666 169.596 17.52V30.28H163.596Z"/>
										<path d="M148.381 30.76C146.221 30.76 144.248 30.2666 142.461 29.28C140.701 28.2933 139.288 26.9466 138.221 25.24C137.181 23.5066 136.661 21.5466 136.661 19.36C136.661 17.1466 137.181 15.1866 138.221 13.48C139.288 11.7733 140.701 10.4266 142.461 9.43996C144.248 8.4533 146.221 7.95996 148.381 7.95996C150.541 7.95996 152.501 8.4533 154.261 9.43996C156.021 10.4266 157.421 11.7733 158.461 13.48C159.528 15.1866 160.061 17.1466 160.061 19.36C160.061 21.5466 159.528 23.5066 158.461 25.24C157.421 26.9466 156.021 28.2933 154.261 29.28C152.501 30.2666 150.541 30.76 148.381 30.76ZM148.381 25.36C149.474 25.36 150.421 25.1066 151.221 24.6C152.048 24.0933 152.688 23.3866 153.141 22.48C153.621 21.5733 153.861 20.5333 153.861 19.36C153.861 18.1866 153.621 17.16 153.141 16.28C152.688 15.3733 152.048 14.6666 151.221 14.16C150.421 13.6266 149.474 13.36 148.381 13.36C147.288 13.36 146.328 13.6266 145.501 14.16C144.674 14.6666 144.021 15.3733 143.541 16.28C143.088 17.16 142.861 18.1866 142.861 19.36C142.861 20.5333 143.088 21.5733 143.541 22.48C144.021 23.3866 144.674 24.0933 145.501 24.6C146.328 25.1066 147.288 25.36 148.381 25.36Z"/>
										<path d="M122.112 30.28V8.43995H127.712V13.68L127.312 12.92C127.792 11.08 128.578 9.83995 129.672 9.19995C130.792 8.53329 132.112 8.19995 133.632 8.19995H134.912V13.4H133.032C131.565 13.4 130.378 13.8533 129.472 14.76C128.565 15.64 128.112 16.8933 128.112 18.52V30.28H122.112Z"/>
										<path d="M115.796 30.52C113.156 30.52 111.102 29.8133 109.636 28.4C108.196 26.96 107.476 24.96 107.476 22.4V13.64H103.796V8.43998H103.996C105.116 8.43998 105.969 8.15998 106.556 7.59998C107.169 7.03998 107.476 6.19998 107.476 5.07998V3.47998H113.476V8.43998H118.596V13.64H113.476V22C113.476 22.7466 113.609 23.3733 113.876 23.88C114.142 24.36 114.556 24.72 115.116 24.96C115.676 25.2 116.369 25.32 117.196 25.32C117.382 25.32 117.596 25.3066 117.836 25.28C118.076 25.2533 118.329 25.2266 118.596 25.2V30.28C118.196 30.3333 117.742 30.3866 117.236 30.44C116.729 30.4933 116.249 30.52 115.796 30.52Z"/>
										<path d="M94.885 30.28V8.43998H100.885V30.28H94.885ZM94.885 6.47998V0.47998H100.885V6.47998H94.885Z"/>
										<path d="M70.9397 30.28V0H76.9397V12.76L76.2197 11.8C76.7264 10.4933 77.5397 9.53333 78.6597 8.92C79.8064 8.28 81.1397 7.96 82.6597 7.96C84.313 7.96 85.753 8.30667 86.9797 9C88.233 9.69333 89.2064 10.6667 89.8997 11.92C90.593 13.1467 90.9397 14.5867 90.9397 16.24V30.28H84.9397V17.52C84.9397 16.6667 84.7664 15.9333 84.4197 15.32C84.0997 14.7067 83.633 14.2267 83.0197 13.88C82.433 13.5333 81.7397 13.36 80.9397 13.36C80.1664 13.36 79.473 13.5333 78.8597 13.88C78.2464 14.2267 77.7664 14.7067 77.4197 15.32C77.0997 15.9333 76.9397 16.6667 76.9397 17.52V30.28H70.9397Z"/>
										<path d="M57.2064 30.76C55.0198 30.76 53.0464 30.2666 51.2864 29.28C49.5531 28.2666 48.1664 26.8933 47.1264 25.16C46.1131 23.4266 45.6064 21.48 45.6064 19.32C45.6064 17.16 46.1131 15.2266 47.1264 13.52C48.1398 11.7866 49.5264 10.4266 51.2864 9.43996C53.0464 8.4533 55.0198 7.95996 57.2064 7.95996C58.8331 7.95996 60.3398 8.23996 61.7264 8.79996C63.1131 9.35996 64.2998 10.1466 65.2864 11.16C66.2731 12.1466 66.9798 13.32 67.4064 14.68L62.2064 16.92C61.8331 15.8266 61.1931 14.96 60.2864 14.32C59.4064 13.68 58.3798 13.36 57.2064 13.36C56.1664 13.36 55.2331 13.6133 54.4064 14.12C53.6064 14.6266 52.9664 15.3333 52.4864 16.24C52.0331 17.1466 51.8064 18.1866 51.8064 19.36C51.8064 20.5333 52.0331 21.5733 52.4864 22.48C52.9664 23.3866 53.6064 24.0933 54.4064 24.6C55.2331 25.1066 56.1664 25.36 57.2064 25.36C58.4064 25.36 59.4464 25.04 60.3264 24.4C61.2064 23.76 61.8331 22.8933 62.2064 21.8L67.4064 24.08C67.0064 25.36 66.3131 26.5066 65.3264 27.52C64.3398 28.5333 63.1531 29.3333 61.7664 29.92C60.3798 30.48 58.8598 30.76 57.2064 30.76Z"/>
										<path d="M31.0569 30.28V8.43995H36.6569V13.68L36.2569 12.92C36.7369 11.08 37.5236 9.83995 38.6169 9.19995C39.7369 8.53329 41.0569 8.19995 42.5769 8.19995H43.8569V13.4H41.9769C40.5102 13.4 39.3236 13.8533 38.4169 14.76C37.5102 15.64 37.0569 16.8933 37.0569 18.52V30.28H31.0569Z"/>
										<path d="M0 30.28L10.08 0.47998H18.32L28.4 30.28H21.64L19.64 24.2H8.72L6.72 30.28H0ZM10.44 18.8H17.92L13.36 4.71998H15.04L10.44 18.8Z"/>
										</svg>
									</span>
								</span>
								<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
							</div>
							<div class="offcanvas-body">
							<ul class="navbar-nav justify-content-end flex-grow-1 align-items-xl-center">

							
								<li class="nav-item">
									<a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{route('home')}}">
										Home										   
									</a>									
								</li>	
								<li class="nav-item">
								
									<a class="nav-link  {{ Route::currentRouteName() == 'users.portfolios.index' ? 'active' : '' }}" href="{{ route('users.portfolios.index') }}">
										Portfolio										   
									</a>									
								</li>	
                                <li class="nav-item">
								
                                <a class="nav-link  {{ Route::currentRouteName() == 'users.gallery.index' ? 'active' : '' }}" href="{{ route('users.gallery.index') }}">
                                    Gallery										   
                                </a>									
                            </li>
                            
                            <li class="nav-item">
								
                                <a class="nav-link  {{ Route::currentRouteName() == 'users.about.index' ? 'active' : '' }}" href="{{ route('users.about.index') }}">
                                    About Us										   
                                </a>									
                            </li>
                            
								<li class="nav-item">
								
									<a class="nav-link  {{ Route::currentRouteName() == 'users.products.index' ? 'active' : '' }}" href="{{ route('users.products.index') }}">
										Shop										   
									</a>									
								</li>	
								

								<li class="nav-item">
									<a class="nav-link  {{ Route::currentRouteName() == 'users.blogs.index' ? 'active' : '' }}" href="{{ route('users.blogs.index') }}">
										Blog										   
									</a>									
								</li>	
								

								<li class="nav-item">
									<a class="nav-link  {{ Route::currentRouteName() == 'users.contact.index' ? 'active' : '' }}" href="{{ route('users.contact.index') }}">
									Contact										   
									</a>									
								</li>
	
								
									<li class="nav-item">
										<div class="d-flex gap-4 align-items-center">
			
											<a class="nav-link nav-link-icon d-block d-xl-none" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart" aria-expanded="false" aria-label="Toggle navigation">
												<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
													<g clip-path="url(#clip0_142_452)">
													<path d="M21 6H18C18 4.4087 17.3679 2.88258 16.2426 1.75736C15.1174 0.632141 13.5913 0 12 0C10.4087 0 8.88258 0.632141 7.75736 1.75736C6.63214 2.88258 6 4.4087 6 6H3C2.20435 6 1.44129 6.31607 0.87868 6.87868C0.31607 7.44129 0 8.20435 0 9L0 19C0.00158786 20.3256 0.528882 21.5964 1.46622 22.5338C2.40356 23.4711 3.67441 23.9984 5 24H19C20.3256 23.9984 21.5964 23.4711 22.5338 22.5338C23.4711 21.5964 23.9984 20.3256 24 19V9C24 8.20435 23.6839 7.44129 23.1213 6.87868C22.5587 6.31607 21.7956 6 21 6ZM12 2C13.0609 2 14.0783 2.42143 14.8284 3.17157C15.5786 3.92172 16 4.93913 16 6H8C8 4.93913 8.42143 3.92172 9.17157 3.17157C9.92172 2.42143 10.9391 2 12 2ZM22 19C22 19.7956 21.6839 20.5587 21.1213 21.1213C20.5587 21.6839 19.7956 22 19 22H5C4.20435 22 3.44129 21.6839 2.87868 21.1213C2.31607 20.5587 2 19.7956 2 19V9C2 8.73478 2.10536 8.48043 2.29289 8.29289C2.48043 8.10536 2.73478 8 3 8H6V10C6 10.2652 6.10536 10.5196 6.29289 10.7071C6.48043 10.8946 6.73478 11 7 11C7.26522 11 7.51957 10.8946 7.70711 10.7071C7.89464 10.5196 8 10.2652 8 10V8H16V10C16 10.2652 16.1054 10.5196 16.2929 10.7071C16.4804 10.8946 16.7348 11 17 11C17.2652 11 17.5196 10.8946 17.7071 10.7071C17.8946 10.5196 18 10.2652 18 10V8H21C21.2652 8 21.5196 8.10536 21.7071 8.29289C21.8946 8.48043 22 8.73478 22 9V19Z" />
													</g>
													<defs>
													<clipPath id="clip0_142_452">
													<rect width="24" height="24"/>
													</clipPath>
													</defs>
												</svg> 
											</a>
										</div>									
									</li>
								<li class="nav-item dropdown ">
									<a class="nav-link d-flex gap-2 align-items-center" href="#" aria-label="nav-links" data-bs-toggle="dropdown" aria-expanded="false">
									<i class="fa-regular fa-user"></i>
										<span class="dropdown-icon">
											<svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M11 8L6 2L1 8"/>
											</svg> 
										</span> 
									</a>
									<div class="dropdown-menu dropdown-menu-lg">
										<div class="row">
										<div class="col-lg-12">
											<div class="d-flex flex-column">
													@if(Auth::check()) 
															 <button class="dropdown-item" onclick="UserLogout('{{ route('auth.logout') }}')" aria-label="single-pages">
																	<span class="link-hover-animation-1">Logout</span>
															</button>     
													@else                                    
															<a class="dropdown-item" href="{{ route('users.login') }}" aria-label="single-pages">
																	<span class="link-hover-animation-1">Login</span>
															</a>                                        
															<a class="dropdown-item" href="{{ route('users.register') }}" aria-label="single-pages">
																	<span class="link-hover-animation-1">Register</span>
															</a>        
													@endif                                
											</div>
										</div>
										</div>						
									</div>						
								</li>	 
								<li class="nav-item d-none d-xl-block">
									<a class="nav-link nav-link-icon {{ Route::currentRouteName() == 'users.cart.index' ? 'active' : '' }}" href="{{ route('users.cart.index') }}">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_142_452)">
										<path d="M21 6H18C18 4.4087 17.3679 2.88258 16.2426 1.75736C15.1174 0.632141 13.5913 0 12 0C10.4087 0 8.88258 0.632141 7.75736 1.75736C6.63214 2.88258 6 4.4087 6 6H3C2.20435 6 1.44129 6.31607 0.87868 6.87868C0.31607 7.44129 0 8.20435 0 9L0 19C0.00158786 20.3256 0.528882 21.5964 1.46622 22.5338C2.40356 23.4711 3.67441 23.9984 5 24H19C20.3256 23.9984 21.5964 23.4711 22.5338 22.5338C23.4711 21.5964 23.9984 20.3256 24 19V9C24 8.20435 23.6839 7.44129 23.1213 6.87868C22.5587 6.31607 21.7956 6 21 6ZM12 2C13.0609 2 14.0783 2.42143 14.8284 3.17157C15.5786 3.92172 16 4.93913 16 6H8C8 4.93913 8.42143 3.92172 9.17157 3.17157C9.92172 2.42143 10.9391 2 12 2ZM22 19C22 19.7956 21.6839 20.5587 21.1213 21.1213C20.5587 21.6839 19.7956 22 19 22H5C4.20435 22 3.44129 21.6839 2.87868 21.1213C2.31607 20.5587 2 19.7956 2 19V9C2 8.73478 2.10536 8.48043 2.29289 8.29289C2.48043 8.10536 2.73478 8 3 8H6V10C6 10.2652 6.10536 10.5196 6.29289 10.7071C6.48043 10.8946 6.73478 11 7 11C7.26522 11 7.51957 10.8946 7.70711 10.7071C7.89464 10.5196 8 10.2652 8 10V8H16V10C16 10.2652 16.1054 10.5196 16.2929 10.7071C16.4804 10.8946 16.7348 11 17 11C17.2652 11 17.5196 10.8946 17.7071 10.7071C17.8946 10.5196 18 10.2652 18 10V8H21C21.2652 8 21.5196 8.10536 21.7071 8.29289C21.8946 8.48043 22 8.73478 22 9V19Z" />
										</g>
										<defs>
										<clipPath id="clip0_142_452">
										<rect width="24" height="24"/>
										</clipPath>
										</defs>
									</svg> 
									</a>
								</li>		
			

								<!-- <li class="nav-item dropdown text-uppercase fw-semibold d-none d-xl-block">
									<a href="#" class="nav-link nav-link-icon d-flex align-items-center gap-1" aria-label="nav-links" data-bs-toggle="dropdown" aria-expanded="false">
										en 
										<span class="dropdown-icon">
											<svg width="12" height="9" viewBox="0 0 12 9" fill="none" xmlns="http://www.w3.org/2000/svg">
												<path d="M11 8L6 2L1 8"/>
											</svg> 
										</span>
									</a>
									
									<ul class="dropdown-menu dropdown-menu-style-2">
										<li >
											<a href="#" class="dropdown-item d-flex gap-1 align-items-center"><img src="{{ asset('user_assets/assets/images/flag-us.png')}}" alt="flag-us">
												<span class="text-uppercase">en</span>
											</a>											
										</li>	
										<li >
											<a href="#" class="dropdown-item d-flex gap-1 align-items-center"><img src="{{ asset('user_assets/assets/images/flag-de.png')}}" alt="flag-de">
												<span class="text-uppercase">de</span>
											</a>											
										</li>
										<li >
											<a href="#" class="dropdown-item d-flex gap-1 align-items-center"><img src="{{ asset('user_assets/assets/images/flag-fr.png')}}" alt="flag-fr">
												<span class="text-uppercase">fr</span>
											</a>											
										</li>
										<li >
											<a href="#" class="dropdown-item d-flex gap-1 align-items-center"><img src="{{ asset('user_assets/assets/images/flag-ar.png')}}" alt="flag-ar">
												<span class="text-uppercase">ar</span>
											</a>											
										</li>										
									</ul>
								</li> -->
							</ul>						  
							</div>
						</div>
					</div>	
					<!-- container-fluid -->
				</nav>	
			</header>
			<!--Header Section ======================-->		







    <br>
    <br>
    <br>
    <br>
    <!-- 
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Gallery</h2>
                <div id="portfolio-filters" class="button-group">
                    <button class="btn" data-filter="*">All</button>
                    <button class="btn" data-filter=".web-design">Web Design</button>
                    <button class="btn" data-filter=".graphic-design">Graphic Design</button>
                </div>
            </div>
        </div>
        <br><br>
        <div class="row" id="portfolio-items">
            <div class="col-md-3 col-sm-6 portfolio-item web-design">
                <img src="assets/img/portfolio/portfolio-1.jpg" alt="Portfolio Item 1">
            </div>
            <div class="col-md-3 col-sm-6 portfolio-item web-design">
                <img src="assets/img/portfolio/portfolio-2.jpg" alt="Portfolio Item 2">
            </div>
            <div class="col-md-3 col-sm-6 portfolio-item graphic-design">
                <img src="assets/img/portfolio/portfolio-3.jpg" alt="Portfolio Item 3">
            </div>
            <div class="col-md-3 col-sm-6 portfolio-item graphic-design">
                <img src="assets/img/portfolio/portfolio-4.jpg" alt="Portfolio Item 4">
            </div>
        </div>
    </div> -->

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Gallery</h2>
                <div id="portfolio-filters" class="button-group">
                    <!-- Button to show all images -->
                    <button class="btn" data-filter="*">All</button>

                    <!-- Loop over categories to display them in the filter navigation -->
                    @foreach ($categories as $category)
                    <button class="btn" data-filter=".category-{{ $category->id }}">{{ $category->name }}</button>
                    @endforeach
                </div>
            </div>
        </div>
        <br><br>
        <div class="row" id="portfolio-items">
            <!-- Loop over the galleries to display the images -->
            @foreach ($galleries as $items)
            @foreach ($items as $gallery)
            <div class="col-md-3 col-sm-6 portfolio-item category-{{ $gallery->category_id }}" style="position: relative;">
                <!-- Heart Icon Overlay -->

                <!-- Image -->
                <img src="{{ env('ASSET2_URL') . $gallery->name }}" alt="Gallery Image" style="width: 100%; height: auto;">
                <div class="shop-image-hover">
                    <button href="javascript:void(0)" data-gallery-id="${item.id}" onclick="Wishlist(event)" style="color: black !important;" class="wish-btn btn btn-sm btn-outline-secondary gap-10">
                        Add to Wishlist

                        <i class="fa fa-heart"></i>
                    </button>
                </div>
            </div>
            @endforeach
            @endforeach
        </div>
    </div>



    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


			
			<!--Footer Section ======================-->
			<footer class="section-footer section-full-width bg-secondary position-relative">
				<div class="container">
					<div class="footer-contents">
						<div class="row gy-5 gy-lg-0 align-items-center justify-content-between">
							<div class="col-lg-4">
								<div>
									<a class="navbar-brand py-0" href="{{route('home')}}">
									<span class="logo">
											<img src="{{ asset('user_assets/assets/images/fav-icon/favicon.png')}}" height="75px"  width="400px"alt="logo">

									</span>
									</a>
									<p class="py-10 py-lg-3 mb-0 fw-semibold">Shaping Interior Excellence</p>
									<ul class="contact-lists list-unstyled mb-0 d-flex">
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">fb</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">in</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">tw</a></li>
										<li><a href="#" class="link-hover-animation-1 text-decoration-none text-uppercase" aria-label="top-bar-link">li</a></li>
									</ul>
								</div>
							</div>
							<!-- col-4 -->
							<div class="col-lg-4 col-xxl-3">
								<div class="address-details">
									<h5 class="fw-extra-bold separator">Address Spain:</h5>
									<div class="footer-address">
										<p class="fw-semibold mb-0">Architronix,</p>
										<p>Avda. Valencia, 3, 46891, Palomar (Valencia), SPAIN</p>
									</div>
									<div class="d-flex flex-column">
										<p class="mb-0 d-flex align-items-center gap-2">Phone: <a href="tel:34962398486" class="text-decoration-none link-hover-animation-1">34 96 239 84 86</a></p>
										<p class="mb-0 d-flex align-items-center gap-2">Email: <a href="mailto:hello@architronix.com" class="text-decoration-none link-hover-animation-1">hello@architronix.com</a></p>
									</div>									
								</div>
							</div>
							<!-- col-3 -->
							<div class="col-lg-4 col-xxl-3">
								<div class="address-details">
									<h5 class="fw-extra-bold separator">Address USA:</h5>
									<div class="footer-address">
										<p class="fw-semibold mb-0">Architronix Inc. ,</p>
										<p>208 English Road, High Point, NC 27262, USA</p>
									</div>
									<div class="d-flex flex-column">
										<p class="mb-0 d-flex align-items-center gap-2">Phone: <a href="tel:3368856670" class="text-decoration-none link-hover-animation-1">336 885 6670</a></p>
										<p class="mb-0 d-flex align-items-center gap-2">Email: <a href="mailto:hello@architronix.com" class="text-decoration-none link-hover-animation-1">techmasters@gmail.com</a></p>
									</div>									
								</div>
							</div>
							<!-- col-3 -->
						</div>
					</div>
					<div class="copyright d-flex flex-column gap-2 flex-lg-row justify-content-lg-between align-items-lg-center text-center text-sm-start">
						<p class="mb-0">Made with Love by <a href="https://themeperch.net/" class="text-decoration-none link-hover-animation-1" target="_blank">DecorVista</a></p>
						<p class="mb-0">&copy; <span class="dynamic-year"></span>, TechMasters, All Rights Reserved</p>
					</div>
				</div>
				<!-- container -->
			</footer>
			<!--Footer Section ======================-->



    <!-- Bootstrap JS and jQuery (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Isotope JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="https://cdn.jsdelivr.net/gh/studio-freight/lenis@1.0.29/bundled/lenis.min.js"></script>
    <script src="{{ asset('user_assets/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('user_assets/assets/js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('user_assets//assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('user_assets/assets/js/anime.min.js') }}"></script>
    <script src="{{ asset('user_assets/assets/js/animate.js') }}"></script>
    <script src="{{ asset('user_assets/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('user_assets/assets/js/odometer.js') }}"></script>
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js')}}"></script>
    <script src="{{ asset('user_assets/assets/js/jquery.progressScroll.min.js') }}"></script>
    <script src="{{ asset('user_assets/assets/js/script.js') }}"></script>
    <script src="{{ asset('customize/presets.js') }}"></script>


    <!-- Custom Scripts -->
    <script src="{{ URL::asset('admin_assets/assets/js/hummingbird-treeview.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/assets/js/custom/ajaxPost.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/assets/js/custom/status-update.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/assets/js/custom/form-upload.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/assets/js/custom/image-preview.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/assets/js/custom/pagination.js') }}"></script>
    <script src="{{ URL::asset('admin_assets/assets/js/custom/filemanager.js') }}"></script>


    @stack('scripts')


<script>
$(document).ready(function () {
    // Add to Wishlist functionality


            // Initialize Isotope
            var $grid = $('#portfolio-items').isotope({
                itemSelector: '.portfolio-item',
                layoutMode: 'fitRows'
            });

            // Filter items on button click
            $('#portfolio-filters').on('click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
            });
        });



        
    </script>
</body>

</html>