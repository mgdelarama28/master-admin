@extends('admin.layouts.master')

@section('pageTitle', 'Product')

@section('content')
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	        <div class="container-fluid">
	            <div class="row mb-2">
	                <div class="col-sm-6">
	                    <h1 class="m-0 text-dark">Show Product</h1>

	                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary mt-2">Edit Product</a>
	                </div><!-- /.col -->
	                
	                <div class="col-sm-6">
	                    <ol class="breadcrumb float-sm-right">
	                        <li class="breadcrumb-item"><a href="#">Products</a></li>
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
	                                {{-- Product --}}
	                            </p>

	                            <div class="row">
	                            	<div class="col-md-12">
	                            		<form action="#" method="POST" enctype="multipart/form-data">
	                            			@csrf

	                            			<div class="row">
	                            				<div class="col-md-6">
				                                    <p><strong>Name</strong></p>
				                                    <p>{{ $product->name }}</p>
	                            				</div>
                                                
                                                <div class="col-md-6">
				                                    <p><strong>Category</strong></p>
				                                    <p>{{ $product->category->name }}</p>
	                            				</div>
                                            </div>
                                            
                                            <div class="row">
												<div class="col-md-6">
				                                    <p><strong>Price</strong></p>
				                                    <p>{{ $product->price }}</p>
												</div>
												
	                            				<div class="col-md-6">
				                                    <p><strong>Stock</strong></p>
				                                    <p>{{ $product->stock }}</p>
	                            				</div>
                                                
                                            </div>
                                            
	                            			<div class="row">
												<div class="col-md-6">
													<p><strong>Sold</strong></p>
													<p>{{ $product->sold }}</p>
												</div>

                                                <div class="col-md-6">
													<div class="form-group">
														   <p><strong>Description</strong></p>
														<p>{{ $product->renderDescription() }}</p>
													</div>
                                                </div>
											</div>
											
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<p><strong>Image</strong></p>
														<img src="{{ $product->renderImage() }}" alt="" width="200px" height="200px">
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