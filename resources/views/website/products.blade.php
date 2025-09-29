@extends('layouts.websitelayout')

@section('content')

        <section class="ur-latest-arrival ptb-120 bg-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-sm-12">
                        <div class="text-center">
                            <h2 class="h1 mb-50" style="color:black">{{$categoryName}}</h2>
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
            </div>
        </section>

        <div style="position:absolute;right:30px;margin-top:-50px;">
            @if(count($images)!=0)
            
            {{ $images->appends(['id' => $categoryName=="ALL PRODUCTS"?null: $images[0]->categoryId])->links('pagination::bootstrap-4') }}
            @endif
        </div>


        <style>
            /* Style for consistent image size */
            .img-fixed-size {
                width: 100%; /* Adjust to the container width */
                height: 300px; /* Fixed height for all images */
                object-fit: cover; /* Ensures the image covers the area without distortion */
                border-radius: 5px; /* Optional: Rounded corners */
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: Adds a shadow */
            }
        </style>
    <button type="button" class="scroll-top-btn"><i class="fa-solid fa-hand-pointer"></i></button>
@endsection