<div class="col-xl-3 col-lg-4 col-sm-6">
    <div class="ur-product-card position-relative card-sm-small">
        <a class="position-absolute ur-badge coupon-badge" 
           href="https://api.whatsapp.com/send?phone=918122937639&text=Hi%20I%20want%20this%20product:%20{{$image->imageTitle}}%0A%0A%20Image:%20{{Storage::disk('s3')->url('product/images/' . $image->imageName) }}" 
           target="_blank" style="color:green !important">
            Enquiry Via <i class="fab fa-whatsapp"></i>
        </a>
       
        <div class="feature-image d-flex align-items-center justify-content-center light-bg position-relative">
            <a href="{{route('product',['product_id'=>$image->id])}}">
                <img src="{{ Storage::disk('s3')->url('product/images/' . $image->imageName) }}" 
                     alt="{{$image->imageTitle}}" 
                     class="img-fill img-fluid">
            </a>
        </div>
        <div class="mt-4">
            <div class="secondary-text-color text-uppercase" style="margin-left:20px !important">
                {{$image->imageTitle}}
            </div>
        </div>
    </div>
</div>

<style>
/* Style for filling image in the container */
.img-fill {
    width: 100%; /* Make it responsive */
    height: 300px; /* Fixed height for all images */
    object-fit: cover; /* Ensure the image fills the area, cropping if necessary */
    border-radius: 10px; /* Optional: Adds rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: Adds shadow for better aesthetics */
}

/* Responsive adjustments */
@media (max-width: 1200px) {
    .img-fill {
        height: 250px;
    }
}

@media (max-width: 768px) {
    .img-fill {
        height: 250px;
    }
}

@media (max-width: 576px) {
    .img-fill {
        height: 250px;
    }
}
.feature-image{
    background-color: black
}
</style>
