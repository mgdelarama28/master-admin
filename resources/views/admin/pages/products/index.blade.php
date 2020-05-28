@extends('admin.layouts.master')

@section('pageTitle', 'Product')

@section('content')
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	        <div class="container-fluid">
	            <div class="row mb-2">
	                <div class="col-sm-6">
	                    <h1 class="m-0 text-dark">Products</h1>

	                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mt-2"><i class="nav-icon fa fa-plus"></i> Add Product</a>
	                </div><!-- /.col -->
	                
	                <div class="col-sm-6">
	                    <ol class="breadcrumb float-sm-right">
	                        <li class="breadcrumb-item"><a href="#">Products</a></li>
	                        <li class="breadcrumb-item active"><a href="#">Index</a></li>
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
	                                Products
	                            </p>

	                            <div class="row">
	                            	<div class="col-md-12">
										@if(session('status'))
											<div class="alert alert-success text-center">{{ session('status') }}</div>
										@endif
										
	                            		<table id="products" class="table table text-center">
						            		<thead>
						            			<tr>
						            				<th>ID</th>
						            				<th>Image</th>
						            				<th>Name</th>
						            				<th>Category</th>
						            				<th>Stock</th>
						            				<th>Sold</th>
						            				<th>Actions</th>
						            			</tr>
						            		</thead>

						            		<tbody>
						            			@foreach($products as $product)
													<tr>
														<td>{{ $product->id }}</td>
														<td><img src="{{ $product->renderImage() }}" alt="" height="100px" width="100px"></td>
														<td>{{ $product->name }}</td>
														<td>{{ $product->category->name }}</td>
														<td>{{ $product->stock }}</td>
														<td>{{ $product->sold }}</td>
														<td>
															<a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-primary"><i class="far fa-eye"></i></a>
															<a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary"><i class="far fa-edit"></i></a>
															<a href="{{ route('admin.products.destroy', $product->id) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
														</td>
													</tr>
						            			@endforeach
						            		</tbody>
						            	</table>
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

@section('scripts')
	<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#products').dataTable();
		});
	</script>
@endsection