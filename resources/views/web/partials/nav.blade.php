<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Conan's <span>Liquor</span></a>
        
        <div class="order-lg-last btn-group">
            <a href="#" class="btn-cart dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="flaticon-shopping-bag"></span>
                <div class="d-flex justify-content-center align-items-center"><small>3</small></div>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-item d-flex align-items-start" href="#">
                    <div class="img" style="background-image: url('{{ asset('images/web/black.jpg') }}');"></div>
                    <div class="text pl-3">
                        <h4>Bacardi 151</h4>
                        <p class="mb-0"><a href="#" class="price">$25.99</a><span class="quantity ml-3">Quantity: 01</span></p>
                    </div>
                </div>

                <div class="dropdown-item d-flex align-items-start" href="#">
                    <div class="img" style="background-image: url(images/prod-2.jpg);"></div>
                    <div class="text pl-3">
                        <h4>Jim Beam Kentucky Straight</h4>
                        <p class="mb-0"><a href="#" class="price">$30.89</a><span class="quantity ml-3">Quantity: 02</span></p>
                    </div>
                </div>
                
                <div class="dropdown-item d-flex align-items-start" href="#">
                    <div class="img" style="background-image: url(images/prod-3.jpg);"></div>
                    
                    <div class="text pl-3">
                        <h4>Citadelle</h4>
                        <p class="mb-0"><a href="#" class="price">$22.50</a><span class="quantity ml-3">Quantity: 01</span></p>
                    </div>
                </div>

                <a class="dropdown-item text-center btn-link d-block w-100" href="cart.html">
                    View All
                    <span class="ion-ios-arrow-round-forward"></span>
                </a>
            </div>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="{{ route('web.index') }}" class="nav-link">Home</a>
                </li>
                
                <li class="nav-item">
                    <a href="about.html" class="nav-link">About</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
                    
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="product.html">Products</a>
                        <a class="dropdown-item" href="product-single.html">Single Product</a>
                        <a class="dropdown-item" href="cart.html">Cart</a>
                        <a class="dropdown-item" href="checkout.html">Checkout</a>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="blog.html" class="nav-link">Blog</a>
                </li>
                
                <li class="nav-item">
                    <a href="contact.html" class="nav-link">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->