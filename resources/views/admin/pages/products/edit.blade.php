@extends('admin.layouts.master')

@section('pageTitle', 'Product')

@section('content')
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	        <div class="container-fluid">
	            <div class="row mb-2">
	                <div class="col-sm-6">
	                    <h1 class="m-0 text-dark">Edit Product</h1>
	                </div><!-- /.col -->
	                
	                <div class="col-sm-6">
	                    <ol class="breadcrumb float-sm-right">
	                        <li class="breadcrumb-item"><a href="#">Products</a></li>
	                        <li class="breadcrumb-item active"><a href="#">Edit</a></li>
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
	                                Product
	                            </p>

	                            <div class="row">
	                            	<div class="col-md-12">
	                            		<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
	                            			@csrf

	                            			<div class="row">
	                            				<div class="col-md-6">
													@error('name')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror

	                            					<div class="form-group">
				                                        <label for="name">Name</label>
				                                        <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{ $product->name }}" required autocomplete="off">
				                                    </div>
	                            				</div>

                                                <div class="col-md-6">
													@error('category_id')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror

													<div class="form-group">
														<label for="category_id">Category</label>
														<select name="category_id" id="category_id" class="form-control" required>
                                                            @foreach ($categories as $category)
                                                                @if ($category->id == $product->category_id)
                                                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                                                @else
                                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                @endif;
															@endforeach
														</select>
													</div>
												</div>
	                            			</div>
                                            
                                            <div class="row">
                                                <div class="col-md-4">
													@error('price')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror

                                                    <div class="form-group">
                                                        <label for="price">Price</label>
                                                        <input name="price" type="string" class="form-control" id="price" placeholder="Price" value="{{ $product->price }}" required autocomplete="off">
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
													@error('stock')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror

	                            					<div class="form-group">
				                                        <label for="stock">Stock</label>
				                                        <input name="stock" type="number" min="0" class="form-control" id="stock" placeholder="Stock" value="{{ $product->stock }}" required>
				                                    </div>
	                            				</div>

	                            				<div class="col-md-4">
													@error('sold')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror

	                            					<div class="form-group">
				                                        <label for="sold">Sold</label>
				                                        <input name="sold" type="number" min="0" class="form-control" id="sold" placeholder="Sold" value="{{ $product->sold }}" required>
				                                    </div>
	                            				</div>
	                            			</div>
                                            
                                            <div class="row">
                                                <div class="col-md-12">
													@error('description')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror

                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <textarea class="form-control" name="description" id="" cols="30" rows="5">{{ $product->description }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

	                            			<div class="row">
                                                <div class="col-md-6">
													@error('image_path')
														<div class="alert alert-danger">{{ $message }}</div>
													@enderror

	                            					<div class="form-group">
				                                        <label for="image_path">Image</label>
                                                        <input name="image_path" type="file" class="form-control mb-2" id="image_path" placeholder="Image">
                                                        <img src="{{ $product->renderImage() }}" id="image" alt="Product Image" height="200px" width="200px">
				                                    </div>
	                            				</div>
                                            </div>

	                            			<div class="row">
												<div class="col-md-1">
	                            				<div class="form-group">
	                            					<button class="btn btn-primary form-control">Submit</button>
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

@section('scripts')
	@section('scripts')
	<script>
		$(document).ready(function(){
			$('#image_path').change(function() {
				var input = this;
			    var url = $(this).val();
			    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

			    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
			     {
			        var reader = new FileReader();

			        reader.onload = function (e) {
			           $('#image').attr('src', e.target.result);
			        }

			       reader.readAsDataURL(input.files[0]);
			    } else
			    {
			      $('#image').attr('src', '/storage/default_images/no-image.png');
			    }
			});
		});
	</script>
@endsection