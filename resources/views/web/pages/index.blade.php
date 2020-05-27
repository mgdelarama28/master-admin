@extends('web.layouts.app')

@section('content')
	@include('web.partials.banner')

	@include('web.partials.services')

	@include('web.partials.about')

	@include('web.partials.categories')

	@include('web.partials.products')

	@include('web.partials.testimonials')
		
	@include('web.partials.recent_blogs')
@endsection