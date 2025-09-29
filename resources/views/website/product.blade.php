@extends('layouts.websitelayout')

@section('content')

<div class="container my-5">
    <div class="row">
        <!-- Product Image Section -->
        <div class="col-md-5 col-sm-12 position-relative">
            <!-- Main Image -->
            <div class="zoom-container" id="zoomTarget">
                <img class="img-fluid zoom-image" 
                     src="{{ Storage::disk('s3')->url('product/images/' . $product->imageName) }}" 
                     alt="{{ $product->imageTitle }}">
            </div>

            <!-- Zoom Popup Box -->
            <div class="zoom-popup" id="zoomPopup"></div>
        </div>

        <!-- Product Description Section -->
        <div class="col-md-7 col-sm-12">
            <div class="main-description">
                <div class="product-title text-black my-3">
                    {{ $product->imageTitle }}
                </div>

                <!-- Enquiry Button -->
                <div class="mt-4">
                    <a class="btn btn-outline-success" 
                       href="https://api.whatsapp.com/send?phone=918122937639&text=Hi%20I%20want%20this%20product:%20{{ $product->imageTitle }}%0A%0A%20Image:%20{{ urlencode(Storage::disk('s3')->url('product/images/' . $product->imageName)) }}" 
                       target="_blank" 
                       style="color:green !important">
                        Enquiry Via <i class="fab fa-whatsapp"></i>
                    </a>
                </div>

                <!-- Product Details -->
                <div class="product-details mt-4">
                    <p class="details-title text-color mb-1 text-black">Product Details</p>
                    <p class="description text-black">{{ $product->description }}</p>
                </div>

                <!-- Additional Information -->
                <div class="additional-info mt-4">
                    <h6 class="text-black">Materials & Stones:</h6>
                    <p>Silver , Gold & Kemp Stones</p>

                    <p class="d-inline-flex gap-1">
                        <a class="text-black" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Care Instructions <i class="bi bi-chevron-down"></i>
                        </a>
                    </p>

                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <ul>
                                <li>Apply cosmetics, hair products, lotions, perfumes & powders prior to donning your jewelry.</li>
                                <li>Prevent your items from being exposed to moisture.</li>
                                <li>Clean the backside of jewelry with 100% cotton cloth to wipe off excess dirt.</li>
                                <li>Avoid velvet box to store jewelry; use plastic cover or box in a dry, dark, and cool place.</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Styles for Zoom Popup -->
<style>
.zoom-container {
    width: 100%;
    max-width: 400px;
    height: 400px;
    overflow: hidden;
    cursor: pointer;
    background-color: #f7f7f7;
}

.zoom-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: center;
}

.zoom-popup {
    position: absolute;
    top: 10px;
    left: 420px;
    width: 400px;
    height: 400px;
    border: 1px solid #ccc;
    background-repeat: no-repeat;
    background-size: 200%;
    display: none;
    z-index: 999;
    pointer-events: none;
}

@media (max-width: 768px) {
    .zoom-popup {
        position: fixed;
        top: 70%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 300px;
        height: 300px;
    }


}

@media (max-width: 576px) {
    .zoom-popup {
        width: 250px;
        height: 250px;
    }

 
}
</style>

<!-- Script for Zoom Popup -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const zoomTarget = document.getElementById('zoomTarget');
    const zoomPopup = document.getElementById('zoomPopup');
    const image = zoomTarget.querySelector('.zoom-image');

    zoomTarget.addEventListener('mouseenter', () => {
        zoomPopup.style.display = 'block';
        zoomPopup.style.backgroundImage = `url('${image.src}')`;
    });

    zoomTarget.addEventListener('mousemove', (e) => {
        const rect = zoomTarget.getBoundingClientRect();
        const x = ((e.clientX - rect.left) / rect.width) * 100;
        const y = ((e.clientY - rect.top) / rect.height) * 100;
        zoomPopup.style.backgroundPosition = `${x}% ${y}%`;
    });

    zoomTarget.addEventListener('mouseleave', () => {
        zoomPopup.style.display = 'none';
    });
});
</script>

@endsection
