@extends('layouts.websitelayout')

@section('content')
@include('includes.style')
<?php 
 use App\Models\Product;

?>

    @include('includes.webslider')


    <!--video section start-->
    {{-- <div class="video-box position-relative z-1 overflow-hidden" data-background="assets/images/about/video-bg.jpg">
        <a href="https://www.youtube.com/watch?v=6WZOxnYi4Cs" data-fancybox class="template-video-btn"><i
                class="fas fa-play"></i></a>
    </div> --}}

        <!--latest arrival start-->
        <section class="ur-latest-arrival ptb-120 bg-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center">
                            <h2 class="h1 mb-50" style="color:black">Browse Latest Arrivals</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-4 justify-content-center">
                    @if(count($images)!=0)
                    @foreach ($images as $image)
                    @include('includes.productitem')
                    @endforeach
                    @else
                        <h1 class="row g-4 justify-content-center p-5" style="color:black !important">
                            COMMING SOON
                        </h1>
                    @endif
    
    
    
    
                </div>
                <div class="text-center mt-60">
                    <a href="{{route('products',['id'=>-1])}}" class="template-btn primary-btn"><span>View All</span></a>
                </div>
            </div>
        </section>
        <!--latest arrival end-->
    <!--ab feature section start-->

    {{-- <section class="ab-feature-section primary-bg-color ptb-120 overflow-hidden">
        <div class="container">
            <div class="row align-items-center justify-content-center g-5">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="ab-feature-box text-center">
                        <span class="icon-wrapper">
                           <img src="assets/images/about/shipping.png" alt="" class="img-fluid" width="80" height="80">
                        </span>
                        <h6 class=" mt-4 mb-3">World Wide Shipping</h6>
                        <!-- <p class="mb-30 fw-light">Proin hac augue integer tempor porta fringilla sapien</p> -->
                        <!-- <a href="#" class="explore-btn">Learn More <span class="ms-2"><i
                                    class="fas fa-arrow-right"></i></span></a> -->
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="ab-feature-box text-center">
                        <span class="icon-wrapper">
                            <img src="assets/images/about/gitag.png" alt="" class="img-fluid" width="80" height="80">
                        </span>
                        <h6 class=" mt-4 mb-3">GI Tag Product</h6>
                        <!-- <p class="mb-30 fw-light">Proin hac augue integer tempor porta fringilla sapien</p>
                        <a href="#" class="explore-btn">Learn More <span class="ms-2"><i
                                    class="fas fa-arrow-right"></i></span></a> -->
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="ab-feature-box text-center">
                        <span class="icon-wrapper">
                            <img src="assets/images/about/jewellery_maker.png" alt="" class="img-fluid" width="80" height="80">
                        </span>
                        <h6 class=" mt-4 mb-3">Authorised Jewellery Maker</h6>
                        <!-- <p class="mb-30 fw-light">Proin hac augue integer tempor porta fringilla sapien</p>
                        <a href="#" class="explore-btn">Learn More <span class="ms-2"><i
                                    class="fas fa-arrow-right"></i></span></a> -->
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="ab-feature-box text-center">
                        <span class="icon-wrapper">
                            <img src="assets/images/about/quality.png" alt="" class="img-fluid" width="80" height="80">
                        </span>
                        <h6 class=" mt-4 mb-3">100% Quality
                        </h6>
                        <!-- <p class="mb-30 fw-light">Proin hac augue integer tempor porta fringilla sapien</p>
                        <a href="#" class="explore-btn">Learn More <span class="ms-2"><i
                                    class="fas fa-arrow-right"></i></span></a> -->
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--ab feature section end-->
<!--cart drawer start-->
    <div class="cart-drawer position-fixed">
        <div
            class="drawer-close d-flex align-items-center justify-content-between position-absolute start-0 top-0 w-100 px-4 py-4 border-bottom">
            <h6 class="mb-0">Shopping Cart</h6>
            <a href="javascript:void(0)" class="drawer-close"><i class="fas fa-xmark"></i></a>
        </div>
        <ul class="cart-list">
            <li class="d-flex align-items-center gap-3">
                <div class="feature-image light-bg">
                    <a href="product-details.html"><img src="assets/images/products/product-1.png" alt="feature image"
                            class="img-fluid"></a>
                </div>
                <div class="d-flex justify-content-between gap-3 w-100">
                    <div>
                        <a href="product-details.html">
                            <h6 class="mb-1">Weeding Rings</h6>
                        </a>
                        <span class="price fw-medium secondary-text-color d-block mb-1 fs-sm">$250.00</span>
                        <div class="quantity d-flex align-items-center">
                            <input type="text" value="1">
                            <div class="step-btns">
                                <button class="increment"><i class="fa-solid fa-angle-up"></i></button>
                                <button class="decrement"><i class="fa-solid fa-angle-down"></i></button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="javascript:void(0)" class="close"><i class="fas fa-xmark"></i></a>
                    </div>
                </div>
            </li>
            <li class="d-flex align-items-center gap-4">
                <div class="feature-image light-bg">
                    <a href="product-details.html"><img src="assets/images/products/product-2.png" alt="feature image"
                            class="img-fluid"></a>
                </div>
                <div class="d-flex justify-content-between gap-3 w-100">
                    <div>
                        <a href="product-details.html">
                            <h6 class="mb-1">Diamond Rings</h6>
                        </a>
                        <span class="price fw-medium secondary-text-color d-block mb-1 fs-sm">$250.00</span>
                        <div class="quantity d-flex align-items-center">
                            <input type="text" value="1">
                            <div class="step-btns">
                                <button class="increment"><i class="fa-solid fa-angle-up"></i></button>
                                <button class="decrement"><i class="fa-solid fa-angle-down"></i></button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="javascript:void(0)" class="close"><i class="fas fa-xmark"></i></a>
                    </div>
                </div>
            </li>
            <li class="d-flex align-items-center gap-4">
                <div class="feature-image light-bg">
                    <a href="product-details.html"><img src="assets/images/products/product-3.png" alt="feature image"
                            class="img-fluid"></a>
                </div>
                <div class="d-flex justify-content-between gap-3 w-100">
                    <div>
                        <a href="product-details.html">
                            <h6 class="mb-1">Bracelets Gold</h6>
                        </a>
                        <span class="price fw-medium secondary-text-color d-block mb-1 fs-sm">$250.00</span>
                        <div class="quantity d-flex align-items-center">
                            <input type="text" value="1">
                            <div class="step-btns">
                                <button class="increment"><i class="fa-solid fa-angle-up"></i></button>
                                <button class="decrement"><i class="fa-solid fa-angle-down"></i></button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <a href="#" class="close"><i class="fas fa-xmark"></i></a>
                    </div>
                </div>
            </li>
        </ul>
        <div class="drawer-bottom border-top">
            <div class="d-flex align-items-center justify-content-between mt-4">
                <h6 class="mb-0">Total:</h6>
                <span class="fw-medium secondary-text-color">$750.00</span>
            </div>
            <a href="cart.html"
                class="template-btn primary-btn text-uppercase fw-medium w-100 text-center mt-4"><span>View Cart & Check
                    Out</span></a>
        </div>
    </div>
    <!--cart drawer end-->


 

    <!--category section start-->
    <section class="ptb-120 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center mb-60">
                        <h2 class="h1 fw-normal mb-4 wow fadeInUp" data-wow-duration="0.5s" style="color:black">Browse
                            By Category</h2>
                        <p class="mb-0 fw-light wow wow fadeInUp" data-wow-delay="0.5s" data-wow-duration="0.5s" style="color:black !important">Our
                            jewellery completely handmade by skilled craftsman, focused on quality & Finishing, perfect
                            for
                            bharathanatyam, Kuchipudi, Mohiniyattam, etc., and cherished for years.</p>
                    </div>
                </div>
            </div>
            <div class="ur-category-slider slider-spacing">
        @foreach ($categories as $item)
        <?php  
        $image=Product::where('categoryId',$item->id)->first();

        ?>
        @if($image!=null)
        <div class="position-relative pp-overlay-card overflow-hidden">
           
            <img src="{{ Storage::disk('s3')->url('product/images/' . $image->imageName) }}" alt="{{$image->imageName}}" class="img-fluid">
            <!-- <span class="category-title position-absolute">Bangles</span> -->
            <a href="{{route('products',['id'=>$item->id])}}" class="pp-overlay position-absolute">
                <span class="text-center">{{$item->categoryName}}</span>
            </a>
        </div>
        @endif
        @endforeach
                
            </div>
        </div>
    </section>
    <!--category section end-->

    <!--newsticker area start-->
    <div class="ur-ticker-area overflow-hidden">
        <div class="ur-ticker-wrapper primary-bg-color">
            <div class="ur-ticker">
                <span class=" text-uppercase">100% Quality Assured</span>
                <span class=" text-uppercase">World Wide Shipping </span>
                <span class=" text-uppercase">Geographical Indication products</span>
                <span class=" text-uppercase">100% Quality Assured</span>
                <span class=" text-uppercase">World Wide Shipping </span>
                <span class=" text-uppercase">Geographical Indication products</span>
            </div>
        </div>
    </div>
    <!--newsticker area end-->

   








 


   


    <!--history section start-->
    <section id="about_us" class="company-history bg-white ptb-120 overflow-hidden">
        <div class="container">
            <div class="row g-5 g-lg-4 align-items-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="image-wrapper">
                        <img src="{{asset('about.jpg')}}" alt="not found" class="img-fluid">
                    </div>
                </div>
                <div class="ps-xl-5 col-xl-5 col-lg-6">
                    <div class="history-content" style="color: black;">
                        <h4 class="fw-light text-uppercase d-block mb-4" style="color: black;">About</h4>
                        <h2 class="display-4 mb-5" style="color: black;">SR Temple Jewellery</h2>
                        <p class="mb-2 fw-light">We SR Temple Jewellery (Proprietor) : S. Nagalingom (Ramesh Achari)
                            making Temple Jewellery for the past 30 Years.
                            We are manufacturing all type of antique orginal temple jewellery used for classical dancers
                            like Headset, Rakodi, Mattal, Earings, Jimky, Necklace, Long Chain, Pearl Chain,Ottiyanam
                            and other collections.</p>
                        <p class="mb-5 fw-light">We are specialist in making custom made temple jewellery for clients on
                            order basis.
                            We are authorised geographical indication & Handicrafts - Ministry of Textiles, Gov of India, jewellery maker.
                        </p>
                        <h5 class=" mb-5" style="color: black;">Registration No : AU/6999/GI/65/123</h5>
                        <a href="/#contactfooter" class="template-btn primary-btn text-uppercase"><span>Contact
                                Us</span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--history section end-->
    
    @endsection
