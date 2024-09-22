@extends('InteriorDesignerDashboard.layouts.layout')

@section('main-section')    
<div class="content-body">
<div class="container-fluid">
				<div class="row page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Inspiration Gallery Image</a></li>
					</ol>
                </div>
                <div class="row">
                <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Inspiration Gallery Image</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form>
                                        <div class="row">

                                <div class="col-sm-6">                                        
                                    <div class="mb-3">
								            <label for="formFile" class="form-label">Upload Image (Optional)</label>
								            <input class="form-control" type="file" id="formFile">
								        </div></div>

                                        
                                            <div class="col-sm-6">
                                            <div class="mb-3">
                                            <label class="form-label">Category</label>
                                            <select class="default-select  form-control wide" >
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </div>
                                        </div> 
                                        </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Add</button>
                                    </form>


</div>
                            </div>
                        </div>
					</div>
                    </div>
</div>

@endsection