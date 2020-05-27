@extends('admin.layouts.master')

@section('pageTitle', 'Category')

@section('content')
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	        <div class="container-fluid">
	            <div class="row mb-2">
	                <div class="col-sm-6">
	                    <h1 class="m-0 text-dark">Show Category</h1>

	                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary mt-2">Edit Category</a>
	                </div><!-- /.col -->
	                
	                <div class="col-sm-6">
	                    <ol class="breadcrumb float-sm-right">
	                        <li class="breadcrumb-item"><a href="#">Categories</a></li>
	                        <li class="breadcrumb-item active"><a href="#">Show</a></li>
	                    </ol>
	                </div><!-- /.col -->
	            </div><!-- /.row -->
	        </div><!-- /.container-fluid -->
	    </div>
	    <!-- /.content-header -->

	    <!-- Main content -->
	    <div class="content">
	        <div class="container-fluid">
	            <div class="row">
	                <div class="col-md-12">
	                    <div class="card card-primary card-outline">
	                        <div class="card-body">
	                            <p class="card-text">
	                                {{-- Category --}}
	                            </p>

	                            <div class="row">
	                            	<div class="col-md-12">
	                            		<form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
	                            			@csrf

	                            			<div class="row">
	                            				<div class="col-md-6">
				                                    <p><strong>Name</strong></p>
				                                    <p>{{ $category->name }}</p>
												</div>
												
												<div class="col-md-6">
													<div class="form-group">
														<label for="image_path">Image</label>
														
														<div class="row mb-1">
															<div class="col-md-12">
																<img id="image" src="{{ $category->renderImage() }}" alt="Category Image" width="20%">
															</div>
														
														</div>
													</div>
												</div>
											</div>
	                            		</form>
	                            	</div>
	                            	<!-- /.col-md-12 -->
					            </div>
					            <!-- /.row -->
	                        </div>
	                    </div>
	                    <!-- /.card -->
	                </div>
	                <!-- /.col-md-12 -->
	            </div>
	            <!-- /.row -->
	        </div>
	        <!-- /.container-fluid -->
	    </div>
	    <!-- /.content -->
	</div>
@endsection