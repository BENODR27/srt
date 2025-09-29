@extends('layouts.adminlayout')
@section('content')

<div class="container-fluid page-body-wrapper">
    @include('../includes.sidebar')
    <div class="main-panel">
        
        <div class="content-wrapper">
            <a href="{{route('product.images.add')}}" class="btn btn-primary text-white m-2 "><i class="mdi mdi-plus"></i></a>

            <div class="image-grid">
                @foreach ($images as $image)
                    <div class="image-item">
                        <div class="image-buttons">
                            <label class="switch">
                              <form action="{{route('toggleLatest',['product_id'=>$image->id])}}" method="post">
                                @csrf
                                <input type="checkbox" onchange="form.submit()" {{$image->isLatest ? "checked" : "unchecked"}} >
                                <span class="slider round"></span>
                            </form>
                                
                              </label>                     
                        <a href="{{route('product.edit',['id' => $image->id])}}"><button class="btn btn-sm btn-success"><i class="mdi mdi-grease-pencil"></i></button></a>
                        <a href="{{route('product.delete',['id' => $image->id])}}"><button class="btn btn-sm btn-danger"><i class="mdi mdi-delete-variant"></i></button></a>
                        </div>
                        <img class="image" src="{{ Storage::disk('s3')->url('product/images/' . $image->imageName) }}" alt="Image 1">
                        <div class="image-title">{{$image->imageTitle}}</div>
                    </div>
                @endforeach
            </div>
        
            @include('../includes.footer')
        </div>
    </div>
    <style>
        .image-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            grid-gap: 20px;
        }

        .image-item {
            position: relative;
            overflow: hidden;
            border: 1px solid #ddd;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .image {
            max-width: 100%;
            height: auto;
            display: block;
        }

        .image-title {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 10px;
            font-size: 14px;
            text-align: center;
            opacity: 0.8;
            transition: opacity 0.3s;
        }

        .image-item:hover .image-title {
            opacity: 1;
        }

        .image-buttons {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 5px;
        }
    </style>
    <style>
        .switch {
          position: relative;
          display: inline-block;
          width: 60px;
          height: 34px;
        }
        
        .switch input { 
          opacity: 0;
          width: 0;
          height: 0;
        }
        
        .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          -webkit-transition: .4s;
          transition: .4s;
        }
        
        .slider:before {
          position: absolute;
          content: "";
          height: 26px;
          width: 26px;
          left: 4px;
          bottom: 4px;
          background-color: white;
          -webkit-transition: .4s;
          transition: .4s;
        }
        
        input:checked + .slider {
          background-color: #2196F3;
        }
        
        input:focus + .slider {
          box-shadow: 0 0 1px #2196F3;
        }
        
        input:checked + .slider:before {
          -webkit-transform: translateX(26px);
          -ms-transform: translateX(26px);
          transform: translateX(26px);
        }
        
        /* Rounded sliders */
        .slider.round {
          border-radius: 34px;
        }
        
        .slider.round:before {
          border-radius: 50%;
        }
        </style>
@endsection
