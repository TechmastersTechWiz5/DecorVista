@extends('InteriorDesignerDashboard.layouts.layout')

@section('main-section')

		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="d-flex mb-3">
					<div class="mb-3 align-items-center me-auto">
						<h4 class="card-title">Consultations</h4>
						<span class="fs-12">Here, Proffesional Interior Designers will view the consulations requests</span>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="table-responsive fs-14">
							<table class="table card-table display mb-4 dataTablesCard " id="example5">
								<thead>
									<tr>
										<th>Review time</th>
										<th>Recipient</th>
										<th>Email</th>
                                        <th>Review</th>
										<th class="text-end">Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><span class="text-black text-nowrap">08:22 AM</span></td>
										<td>
											<div class="d-flex align-items-center">
												<div>
													<h6 class="fs-16 text-black font-w600 mb-0 text-nowrap">XYZ Store ID</h6>
												</div>
											</div>
										</td>
										<td><span class="text-black">xyzstore@mail.com</span></td>
										<td><span class="text-black">Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, corporis, quidem alias saepe recusandae accusantium aliquam tenetur rerum numquam, eius impedit animi modi totam blanditiis quas accusamus eaque corrupti non. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic provident unde amet molestias corporis sunt, numquam optio officiis, cum illo nesciunt temporibus laborum laboriosam pariatur aliquid porro. Provident, ut consequatur.</span></td>
										<td class="text-end">
											<div class="dropdown">
												<a href="javascript:void(0);" class="btn-link" data-bs-toggle="dropdown" aria-expanded="false">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
														<path d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
														<path d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z" stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
													</svg>
												</a>
												<div class="dropdown-menu dropdown-menu-right">
													<button class="dropdown-item" href="">Remove</button>
												</div>
											</div>
										</td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
				</div>
            </div>
			<div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Review</a></li>
					</ol>
                </div>
                <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Response</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="">
                                    @csrf
                                        <div class="mb-3">
                                            <textarea class="form-control" rows="7" id="comment"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit Review</button>
                                    </form>
                                </div>
                            </div>
                        </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
		
		
	

@endsection