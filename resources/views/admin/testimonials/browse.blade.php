
@extends('layouts.adminlayout')
@section('content')

<div class="container-fluid page-body-wrapper">
      @include('../includes.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
        <a href="{{route('testimonial.create')}}" class="btn btn-primary text-white m-2 "><i class="mdi mdi-plus"></i></a>
        <div class="col-lg-12 grid-margin stretch-card">
            
              <div class="card">
                
                <div class="card-body">

                  <h4 class="card-title">Testimonials</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            customerName
                          </th>
                          <th>
                            customerNote
                          </th>
                          
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($testimonials as $item)
                      <tr>
                          <td>
                           {{$item->customerName}}
                          </td>
                          <td>
                           {{$item->customerNote}}
                          </td>
                          <td>
                          <a href="{{route('testimonial.edit',['id' => $item->id])}}" class="btn btn-success"><i class="mdi mdi-grease-pencil"></i></a>
                          <a href="{{route('testimonial.delete',['id' => $item->id])}}" class="btn btn-danger"><i class="mdi mdi-delete-variant"></i></a>                                                   
                        </td>
                        </tr>
    
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>


        </div>
        @include('../includes.footer')
      </div>
    </div>
    @endsection