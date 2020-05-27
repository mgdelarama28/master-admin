@extends('admin.layouts.master')

@section('pageTitle', 'Category')

@section('content')
	<div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	        <div class="container-fluid">
	            <div class="row mb-2">
	                <div class="col-sm-6">
	                    <h1 class="m-0 text-dark">Edit Category</h1>
	                </div><!-- /.col -->
	                
	                <div class="col-sm-6">
	                    <ol class="breadcrumb float-sm-right">
	                        <li class="breadcrumb-item"><a href="#">Categories</a></li>
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
	                                Category
	                            </p>

	                            <div class="row">
	                            	<div class="col-md-12">
	                            		<form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
	                            			@csrf

	                            			<div class="row">
	                            				<div class="col-md-6">
	                            					<div class="form-group">
				                                        <label for="name">Name</label>
				                                        <input name="name" type="text" class="form-control" id="name" placeholder="Name" value="{{ $category->name }}" required>
				                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
	                            				<div class="col-md-6">
	                            					<div class="form-group">
				                                        <label for="image_path">Image</label>
				                                        
				                                        <div class="row mb-1">
				                                        	<div class="col-md-12">
				                                        		<img id="image" src="{{ $category->renderImage() }}" alt="Category Image" width="20%">
				                                        	</div>
				                                        
				                                        </div>
				                                        <input name="image_path" type="file" accept="image/x-png,image/gif,image/jpeg" class="form-control" id="image_path" placeholder="Image" value="{{ old('image_path') }}">
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