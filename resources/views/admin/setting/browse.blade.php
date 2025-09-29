
@extends('layouts.adminlayout')
@section('content')

<div class="container-fluid page-body-wrapper">
      @include('../includes.sidebar')
      <div class="main-panel">
        
        <div class="content-wrapper">
        <a href="{{route('slide.images.add')}}" class="btn btn-primary text-white m-2 "><i class="mdi mdi-plus"></i></a>

       
        <div class="image-grid">

       

 
 

  
  <!-- Add more image items here -->
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
    @endsection