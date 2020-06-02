<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center pb-5">
            <div class="col-md-7 heading-section text-center">
                <span class="subheading">Our Delightful offerings</span>
                <h2>Tastefully Yours</h2>
            </div>
        </div>
            
        <products
            :products="{{ $products }}"
        ></products>
            
        <div class="row justify-content-center">
            <div class="col-md-4">
                <a href="{{ route('web.products.index') }}" class="btn btn-primary d-block">View All Products <span class="fa fa-long-arrow-right"></span></a>
            </div>
        </div>
    </div>
</section>