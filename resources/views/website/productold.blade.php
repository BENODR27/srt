@extends('layouts.websitelayout')

@section('content')

<div class="container my-5">
    <div class="row">
        <!-- Product Image Section -->
        <div class="col-md-5 col-sm-12">
            <div class="main-img">
                <div class="zoom-container">
                    <img class="img-fluid zoom-image" src="{{ Storage::disk('s3')->url('product/images/' . $product->imageName) }}" alt="{{ $product->imageTitle }}">
                </div>
            </div>
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
                    <h6 class="text-black mt-2">T&C Apply</h6>
                    <ul>
                        <li>All items are sold in good condition.</li>
                        <li>In case of damages during transport, returns will be accepted for replacement or repair.</li>
                        <p id="policyButton"><b>( View More )</b></p>
                    </ul>

                </div>
    
            </div>
        </div>
    </div>
</div>

<!-- Modal for Policy -->


<!-- Styles for Zoom Effect -->
<style>
.zoom-container {
    position: relative;
    width: 100%;
    overflow: hidden;
    max-width: 500px;
    height: 400px;
    cursor: crosshair;
    background-color: #f7f7f7;
}

.zoom-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    object-position: center;
    transition: transform 0.2s ease-in-out, object-position 0.2s ease-in-out;
}

.zoom-container:hover .zoom-image {
    transform: scale(1.5);
    object-fit: cover;
}

@media (max-width: 767.98px) {
    .zoom-container {
        max-width: 100%;
        height: auto;
    }

    .zoom-container:hover .zoom-image {
        transform: none;
    }
}
</style>

<!-- Script for Interactive Zoom and Modal -->
<script>
document.querySelectorAll('.zoom-container').forEach(container => {
    const image = container.querySelector('.zoom-image');

    container.addEventListener('mousemove', (e) => {
        const rect = container.getBoundingClientRect();
        const x = (e.clientX - rect.left) / rect.width * 100;
        const y = (e.clientY - rect.top) / rect.height * 100;

        image.style.objectPosition = `${x}% ${y}%`;
    });

    container.addEventListener('mouseleave', () => {
        image.style.objectPosition = 'center';
    });
});


</script>

@endsection
