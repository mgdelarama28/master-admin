<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Our Delightful offerings</span>
                <h2>Tastefully Yours</h2>
            </div>
        </div>
            
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-3 d-flex">
                    <div class="product ftco-animate">
                        <div class="img d-flex align-items-center justify-content-center" style="background-image: url({{ $product->renderImage() }});">
                            <div class="desc">
                                <p class="meta-prod d-flex">
                                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag"></span></a>
                                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-heart"></span></a>
                                    <a href="#" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>
                                </p>
                            </div>
                        </div>
                        
                        <div class="text text-center">
                            <span class="category">{{ $product->category->name }}</span>
                            <h2>{{ $product->name }}</h2>
                            <span class="price">${{ $product->price }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
            
        <div class="row justify-content-center">
            <div class="col-md-4">
                <a href="{{ route('web.products.index') }}" class="btn btn-primary d-block">View All Products <span class="fa fa-long-arrow-right"></span></a>
            </div>
        </div>
    </div>
</section>