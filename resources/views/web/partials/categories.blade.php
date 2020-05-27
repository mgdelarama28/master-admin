<section class="ftco-section ftco-no-pb">
    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-lg-2 col-md-4 ">
                    <div class="sort w-100 text-center ftco-animate">
                        <div class="img" style="background-image: url({{ $category->renderImage() }});"></div>
                        <h3>{{ $category->name }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>